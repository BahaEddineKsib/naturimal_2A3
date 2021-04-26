<?php


//CONNECT TO DATABASE
$connect = mysqli_connect("127.0.0.1","root","root","naturimal");
if($connect->connect_error)
{
    die("MOCHKLET CONNECTION CHOUF DATABASECONNECT.PHP". mysqli_connect_error());
}
else
{
    echo "CONNECTED";
}



//CREATE CLASS ANIMAL
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

    public  function setId($connect)
    {
        $query ="SELECT `id_animal` FROM `animals`";
        $result = mysqli_query($connect,$query);
        if(!$result){echo "error";}
        while($row= mysqli_fetch_assoc($result))
        {
            $this->id = $row['id_animal'];
        }
        $this->id++;
        echo " id= ".$this->id;
    }
    public  function setImage_link()
    {
        $link = "uploads/" ;
        $link = $link . $this->id . "." ;
        $FileExt = explode('.',$_FILES['image_link']['name']);
        $link = $link . end($FileExt);
        $link = strtolower($link);
        echo $link;
        $this->image_link = $link;
    }
    public  function setId_owner()                 {$this->id_owner     = 0            ;}
    public  function setFor_adoption($for_adoption){$this->for_adoption = $for_adoption;}
    public  function setType($type)                {$this->type         = $type        ;}
    public  function setName($name)                {$this->name         = $name        ;}
    public  function setRace($race)                {$this->race         = $race        ;}
    public  function setBirthday($birthday)        {$this->birthday     = $birthday    ;}
    public  function setGender($gender)            {$this->gender       = $gender      ;}
    public  function setDetails($details)          {$this->details     = $details      ;}

            function __construct($connect)
            {
                $this->setId($connect);
                $this->id_owner     = 0                     ;
                $this->setImage_link();
                $this->for_adoption = $_POST['for_adoption'];
                $this->type         = $_POST['type']        ;
                $this->name         = $_POST['name']        ;
                $this->race         = $_POST['race']        ;
                $this->birthday     = $_POST['birthday']    ;
                $this->gender       = $_POST['gender']      ;
                $this->details      = $_POST['details']     ;
                
            }

    public function upload_image()
    {
        $TMPfile= $_FILES['image_link']['tmp_name'];
        move_uploaded_file($TMPfile, $this->image_link);
    }

    public function Create($connect)
    {
        
        $this->upload_image();
        $query ="INSERT INTO `animals` (`id_animal`, `id_owner`, `image_link`, `for_adoption`, `type`, `name`, `race`, `birthday`, `gender`, `details`) VALUES (NULL, '" . $this->getId_owner() . "', '" . $this->getImage_link() ."', '". $this->getFor_adoption() ."', '". $this->getType() ."', '". $this->getName() ."', '". $this->getRace() ."', '". $this->getBirthday() ."', '". $this->getGender() ."', '". $this->getDetails() ."')";
        $result = mysqli_query($connect,$query);
        if($result)
        {
            echo "DATA INSERTED";
            include 'AfficheAnimal.php';
        }
        else
        {
            echo "ERROR";
            echo $query;
            include 'AjoutAnimal.php';
        }
    }
}

if(isset($_POST['location']))
{
    if($_POST['location'] == "AjoutAnimal")
    {
        
        $ANIMAL = new Animal($connect);
        $ANIMAL->Create($connect);
    }

}
else
{
    include 'AfficheAnimal.php';
}

mysqli_close($connect);
?>