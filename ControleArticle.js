
/*function verif(){
    //var IdCategorieArticle=document.getElementById("IdCategorieArticle");
    var NomArticle=document.getElementById("NomArticle");
    var ImageArticle=document.getElementById("ImageArticle");
    var Description=document.getElementById("Description");
    var PrixArticle=document.getElementById("PrixArticle");
    var QuantiteArticle=document.getElementById("QuantiteArticle");
    






    alert("ajout effectué!!");
}*/


/*var IdCategorieArticle=document.querySelector('#IdCategorieArticle').value;
var NomArticle=document.querySelector('#NomArticle').value;



document.getElementById("article").addEventListener("submit",function(e){ 
    e.preventDefault();
    var erreur;
    var IdCategorieArticle=document.querySelector('#IdCategorieArticle').value;
    var NomArticle=document.getElementById("NomArticle");
    var ImageArticle=document.getElementById("ImageArticle");
    var Description=document.getElementById("Description");
    var PrixArticle=document.getElementById("PrixArticle");
    var QuantiteArticle=document.getElementById("QuantiteArticle");
    if(NomArticle.value<3)


    var prenom = document.querySelector('#prenom').value;
    var dateNais = document.querySelector('#dateNais').value;
    var tel = document.querySelector('#tel').value;
    var prof = document.querySelector('#prof').value
    var pref = document.querySelectorAll('input[type=checkbox]'), nb = 0, p = "";
    var pass = document.querySelector('#pass').value
    var pass1 = document.querySelector('#pass1').value;

    if(erreur){
        document.getElementById("erreur").innerHTML=erreur;
    }
    
    
});*/

/*const IdCategorieArticle=document.querySelector('#IdCategorieArticle')
const NomArticle=document.getElementById("NomArticle")
const ImageArticle=document.getElementById("ImageArticle")
const Description=document.getElementById("Description")
const PrixArticle=document.getElementById("PrixArticle")
const stringprix=String(PrixArticle).value
const QuantiteArticle=document.getElementById("QuantiteArticle")
const erreur=document.getElementById("erreur")
const form=document.getElementById("article")
var allowedExtensions = /(\.png)$/i

form.addEventListener('submit',(e)=>{
    let messages=[]
    if(IdCategorieArticle.value.length>3){
        messages.push('Id ne doit pas passer 3 chiffres')
        console.log("idddddd");
    } 
    if(NomArticle.value.charAt(0)<'A' || NomArticle.value.charAt(0)>'Z'){
        messages.push("Le nom de l'article doit commencer par une majuscule")
    }
    if (!allowedExtensions.exec(ImageArticle.value)){
        messages.push("Image doit etre extension png ou jpg")
    }
    if(stringprix.substring(stringprix.length-2,stringprix.length)=="Dt" ||stringprix.substring(stringprix.length-2,stringprix.length)=="DT"
      ||stringprix.substring(stringprix.length-2,stringprix.length)=="dt"){
          messages.push("le prix de l'article doit contenir seulement des chiffres")
      }
    if(QuantiteArticle.value>10){
        messages.push("la quantite ne doit pas dépasser 10")
    }


    if (messages.length>0){
        e.preventDefault()
        erreur.innerText=messages.join(',')
    }



})*/


    var IdCategorie=AjoutArticle.IdCategorie.value;
    var NomArticle=AjoutArticle.NomArticle.value;
    var ImageArticle=AjoutArticle.ImageArticle.value;
    var Description=AjoutArticle.Description.value;
    var PrixArticle=AjoutArticle.PrixArticle.value;
    var QuantiteArticle=AjoutArticle.QuantiteArticle.value;
    var allowedExtensions = /(\.png)$/i


    if(IdCategorie.length>3){
        alert('Id ne doit pas passer 3 chiffres');
    }
    if(NomArticle.charAt(0)<'A' || NomArticle.charAt(0)>'Z'){
        alert("Le nom de l'article doit commencer par une majuscule");
    }
    if (!allowedExtensions.exec(ImageArticle)){
        alert("Image doit etre extension png ou jpg");
    }
    if(QuantiteArticle>10){
        alert("la quantite ne doit pas dépasser 10");
    }

