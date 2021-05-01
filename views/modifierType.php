<?PHP
include "../entities/type.php";
include "../core/animalerieC.php";
$typeC=new TypeC();
if (isset($_POST['modifier'])){

    $type=new type($_POST['id_type'],$_POST['type']);
    $typeC->modifierType($type,$_POST['id_ini']);
    echo $_POST['id_ini'];
    header('Location: afficher.php');
}else{
    echo "vérifier les champs";
}