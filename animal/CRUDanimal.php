<?php


//CONNECT TO DATABASE
require_once 'DatabaseConnection.php';
$pdo=getConnexion ();



//CREATE CLASS ANIMAL
$DeclareClassAnimal = 0;
if($DeclareClassAnimal == 0)
{
class Animal
{
    private $id           ;
    private $id_owner     ;
    private $image_link   ;
    private $for_adoption ;
    private $type         ;
    private $name         ;
    private $race         ;
    private $birthday     ;
    private $gender       ;
    private $details      ;

    public  function getId()           {return $this->id          ;}
    public  function getId_owner()     {return $this->id_owner    ;}
    public  function getImage_link()   {return $this->image_link  ;}
    public  function getFor_adoption() {return $this->for_adoption;}
    public  function getType()         {return $this->type        ;}
    public  function getName()         {return $this->name        ;}
    public  function getRace()         {return $this->race        ;}
    public  function getBirthday()     {return $this->birthday    ;}
    public  function getGender()       {return $this->gender      ;}
    public  function getDetails()      {return $this->details     ;}

    public  function getAnimalById($pdo, $id)
    {
        try{
            $query =$pdo->prepare("SELECT * FROM `animals` WHERE `id_animal` = :id_animal");
            $query->bindValue(':id_animal',     $id);
            $query->execute();
            $list = $query->fetchAll();
        }catch(PDOException $error){$error->getMessage();}

        foreach ($list as $an) {
            $ANIMAL = new Animal($pdo, $an['id_animal'], $an['id_owner'], $an['image_link'], $an['for_adoption'], $an['type'], $an['name'], $an['race'], $an['birthday'], $an['gender'], $an['details']);
            return $ANIMAL;
       }
    }

    public  function setId($pdo, $id)
    {
        if($id == 0)
        {
            try
            {
                $query =$pdo->prepare("SELECT `id_animal` FROM `animals`");
                $query->execute();
                $list = $query->fetchAll();
                

            }catch(PDOException $error){$error->getMessage();}

            foreach ($list as $animal) {
                $this->id = $animal['id_animal'];
            }
            $this->id++;
            //echo " id= ".$this->id;
        }
        else
        {
            $this->id=$id;
        }
    }
    public  function setImage_link($image_link)
    {
        $this->image_link = $image_link;
    }
    public  function setId_owner()                 {$this->id_owner     = 0            ;}
    public  function setFor_adoption($for_adoption){$this->for_adoption = $for_adoption;}
    public  function setType($type)                {$this->type         = $type        ;}
    public  function setName($name)                {$this->name         = $name        ;}
    public  function setRace($race)                {$this->race         = $race        ;}
    public  function setBirthday($birthday)        {$this->birthday     = $birthday    ;}
    public  function setGender($gender)            {$this->gender       = $gender      ;}
    public  function setDetails($details)          {$this->details     = $details      ;}

    function __construct($pdo, $id, $id_owner, $image_link, $for_adoption, $type, $name, $race, $birthday, $gender, $details)
    {
                
        $this->setId_owner($id_owner)        ;
        $this->setId($pdo,$id)               ;
        $this->setImage_link($image_link)    ;
        $this->setFor_adoption($for_adoption);
        $this->setType($type)                ;
        $this->setName($name)                ;
        $this->setRace($race)                ;
        $this->setBirthday($birthday)        ;
        $this->setGender($gender)            ;
        $this->setDetails($details)          ;
    }

    public function upload_image()
    {
        if(isset($_FILES['image_link']['name']) && $_FILES['image_link']['name'] != "")
        {

            //echo "*d5al*";
            $link = "uploads/" ;
            $link = $link . $this->id . "." ;
            $FileExt = explode('.',$_FILES['image_link']['name']);
            $link = $link . end($FileExt);
            $link = strtolower($link);
           /* echo $link;*/
            $this->image_link = $link;
            //echo "///radineeh ".$this->image_link;
            
            //unlink($this->image_link);
            $TMPfile= $_FILES['image_link']['tmp_name'];
            move_uploaded_file($TMPfile, $this->image_link);
        }
    }

    public function Create($pdo)
    {
        /*echo "create";*/
        try
        {
            $query =$pdo->prepare("INSERT INTO `animals` (`id_animal`, `id_owner`, `image_link`, `for_adoption`, `type`, `name`, `race`, `birthday`, `gender`, `details`) VALUES (:id_animal, :id_owner, :image_link, :for_adoption, :type, :name, :race, :birthday, :gender, :details)");
            
            $query->bindValue(':id_animal',     NULL);
            $query->bindValue(':id_owner',      $this->getId_owner());
            $query->bindValue(':image_link',    $this->getImage_link());
            $query->bindValue(':for_adoption',  $this->getFor_adoption());
            $query->bindValue(':type',          $this->getType());
            $query->bindValue(':name',          $this->getName());
            $query->bindValue(':race',          $this->getRace());
            $query->bindValue(':birthday',      $this->getBirthday());
            $query->bindValue(':gender',        $this->getGender());
            $query->bindValue(':details',       $this->getDetails());
            $query->execute();
            $this->upload_image();
            
        }catch(PDOException $error){$error->getMessage();}
    }

    public function ReadOne()
    {
        echo '
        <div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
        <div class="product">
        <form action="CRUDanimal" method="POST" enctype="multipart/form-data">
            <a href="#" class="img-prod"><img class="img-fluid" src="'. $this->getImage_link() .'" alt="'. $this->getImage_link() .'">
                <div class="overlay"></div>
            </a>
            <div class="text py-3 pb-4 px-3 text-center">
                <h3><a href="#">'. $this->getName() .'</a></h3>
                <div class="d-flex">
                    <div class="pricing">
                        <p class="price"><span>'. $this->getBirthday() .'</span></p>
                    </div>
                </div>
                
                <div class="bottom-area d-flex px-3">
                    <div class="m-auto d-flex">
                        <a href="ModifierAnimal.php?id_animal='.$this->getId().'" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                            <span><i class="ion-ios-menu"></i></span>
                        </a>
                        
                        <a href="AjoutAnimal" class=" d-flex justify-content-center align-items-center mx-1">
                            <span><i class=""></i>x</span>
                        </a>
                    </div>
                </div>
            </div>
            </form>
        </div>
        </div>';
    }
 
    public function ReadAll($pdo)
    {
        try{
            $query =$pdo->prepare("SELECT * FROM `animals`");
            $query->execute();
            $list = $query->fetchAll();
        }catch(PDOException $error){$error->getMessage();}

        echo '<div class="container"><div class="row">';
        foreach ($list as $an)
        {
            $ANIMAL = new Animal($pdo, $an['id_animal'], $an['id_owner'], $an['image_link'], $an['for_adoption'], $an['type'], $an['name'], $an['race'], $an['birthday'], $an['gender'], $an['details']);
            $ANIMAL->ReadOne();
        }
        echo '</div></div>';
    }

    public  function Update($pdo)
    {
        $this->upload_image();
        try
        {
            $query =$pdo->prepare("UPDATE `animals` SET `image_link` = :image_link, `for_adoption` = :for_adoption, `type` = :type, `name` = :name, `race` = :race, `birthday` = :birthday, `gender` = :gender, `details` = :details WHERE `animals`.`id_animal` = :id_animal");
            #$query =$pdo->prepare("UPDATE `animals` SET `name` = :name");

            $query->bindValue(':id_animal',     $this->getId());
            $query->bindValue(':image_link',    $this->getImage_link());
            $query->bindValue(':for_adoption',  $this->getFor_adoption());
            $query->bindValue(':type',          $this->getType());
            $query->bindValue(':name',          $this->getName());
            $query->bindValue(':race',          $this->getRace());
            $query->bindValue(':birthday',      $this->getBirthday());
            $query->bindValue(':gender',        $this->getGender());
            $query->bindValue(':details',       $this->getDetails());
            $query->execute();
            
            
        }catch(PDOException $error){$error->getMessage();}
    }
}
$DeclareClassAnimal = 1 ;
}
/*echo "--f crude--";*/
if(isset($_POST['location']))
{
    /*echo "--location t3abet ema =". $_POST['location']."--";*/
    if($_POST['location'] == "AjoutAnimal")
    {
           /* echo "--location == AjoutAnimal--";*/
        if(isset($_POST['for_adoption']))
        {    $for_adoption =   "checked";}
        else{$for_adoption = "unchecked";}

        $ANIMAL = new Animal($pdo, 0, 0, $_FILES['image_link']['name'], $for_adoption, $_POST['type'], $_POST['name'], $_POST['race'], $_POST['birthday'], $_POST['gender'], $_POST['details']);
        $ANIMAL->Create($pdo);

        include 'AfficheAnimal.php';
            
    }
    elseif ($_POST['location'] == "ModifierAnimal") 
    {
       if ($_FILES['image_link']['tmp_name'] == "" )
       {$image_link = $_POST['old_image'];}
       else{$image_link = $_FILES['image_link']['name'];}
      //echo "--location == ModifierAnimal". $_POST['id_animal'] ."--".$_POST['name']."  --".$image_link;
       if(isset($_POST['for_adoption']))
       {    $for_adoption =   "checked";}
       else{$for_adoption = "unchecked";}

       $ANIMAL = new Animal($pdo, $_POST['id_animal'], 0, $image_link, $for_adoption, $_POST['type'], $_POST['name'], $_POST['race'], $_POST['birthday'], $_POST['gender'], $_POST['details']);
       $ANIMAL->Update($pdo);
       include 'AfficheAnimal.php';
    }

}
else
{
    /*echo "enta fiiin ?";*/
}


?>