function verif() {
    var x = 0;
    var validimg=/^\w+(\.png)+$/;
    var validimg1=/^\w+(\.jpg)+$/;
    var validimg2=/^\w+(\.jpeg)+$/;
   if(document.getElementById("nom").value == "" )
    {

        document.getElementById("nom").style.backgroundColor = "#FFA07A";
        document.getElementById("nom_1").textContent = "*nom obligatoire";
        if (x == 0) {
            x = 1;
        }

    }
    if(document.getElementById("type").value == ""){
        document.getElementById("type").style.backgroundColor = "#FFA07A" ;
        document.getElementById("type_1").textContent = "champs type obligatoire" ;
        if(x == 0){
            x=1;
        }
    }

    if ((validimg.test(document.getElementById("image").value)==false)&&(validimg1.test(document.getElementById("image").value)==false)&&(validimg2.test(document.getElementById("image").value)==false))
    {
        document.getElementById("image").style.backgroundColor = "#FFA07A";
        document.getElementById("image_1").textContent = "image non valide ! *.png *.jpg *.jpeg";
        if (x == 0) {
            x = 1;
        }
    }




    if(x==1){return false ;}else{return true;}
}