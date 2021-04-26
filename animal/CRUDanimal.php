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
            echo " id= ".$this->id;
        }
        else
        {
            $this->id=$id;
        }
    }
    public  function setImage_link($image_link)
    {
        if(isset($_FILES['image_link']['name']))
        {
            $link = "uploads/" ;
            $link = $link . $this->id . "." ;
            $FileExt = explode('.',$_FILES['image_link']['name']);
            $link = $link . end($FileExt);
            $link = strtolower($link);
            echo $link;
            $this->image_link = $link;
        }
        else
        {
            $this->image_link = $image_link;
        }

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
        $TMPfile= $_FILES['image_link']['tmp_name'];
        move_uploaded_file($TMPfile, $this->image_link);
    }

    public function Create($pdo)
    {
        try
        {
            
            $query =$pdo->prepare("INSERT INTO `animals` (`id_animal`, `id_owner`, `image_link`, `for_adoption`, `type`, `name`, `race`, `birthday`, `gender`, `details`) VALUES (NULL, '" . $this->getId_owner() . "', '" . $this->getImage_link() ."', '". $this->getFor_adoption() ."', '". $this->getType() ."', '". $this->getName() ."', '". $this->getRace() ."', '". $this->getBirthday() ."', '". $this->getGender() ."', '". $this->getDetails() ."')");
            $query->execute();
            $this->upload_image();
            include 'AfficheAnimal.php';
        }catch(PDOException $error){$error->getMessage();}
    }

 
}
$DeclareClassAnimal = 1 ;
}
if(isset($_POST['location']))
{
    if($_POST['location'] == "AjoutAnimal")
    {

            $ANIMAL = new Animal($pdo, 0, 0, $_FILES['image_link']['name'], $_POST['for_adoption'], $_POST['type'], $_POST['name'], $_POST['race'], $_POST['birthday'], $_POST['gender'], $_POST['details']);
            $ANIMAL->Create($pdo);

    }

}
else
{
    include 'AfficheAnimal.php';
}

?>