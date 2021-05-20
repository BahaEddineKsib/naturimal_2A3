
<?php

require 'Model/Connection.php' ;
 $Login = 0 ;
            session_start();
               //  echo $_SESSION["newsession"];

                 if(empty($_SESSION["newsession"])){
                     $Login=0 ;
                 }
                    else{
                     $Login=1 ;

                 }
                
               // unset($_SESSION["newsession"]);

                 //echo $Login ;

               
                 function decnnect(){

                 // unset($_SESSION["newsession"]); 
                }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="Style/StyleAceuil.css">
    <link rel="stylesheet" href="Style/StyleLogin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css"
        integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>

    <!--NavBAr-->

    <div class="sidebaroff">
        <nav class="navbar" id="top">
            <div class="navbar-container">
                <div class="navbar-logo">
                    <a href="#">
                        <img src="./assessts/logoo.png" alt="logo error">
                    </a>
                </div>

                <ul class="nav-menu">
                    <li class='nav-item'>
                        <a  id="profilLink"  style="cursor: pointer;">
                            <i class="far fa-user" 
                            onclick="LoginTest(<?=$Login?>)"  >
                            </i>

                        </a>

                    </li>
                    <li class='nav-item'>
                        <a href="#">
                            Aide

                        </a>

                    </li>
                    <li class='nav-item'>
                        <a href="#">
                            Magasins

                        </a>
                    </li>
                    <li class='nav-item'>
                        <a href="#">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </li>
                    <li class='nav-item' id="decon" >
                         <a class="fas fa-sign-out-alt" href="http://firstpage/Projet/" onclick="<?php  ?>"></a>
                    </li>
                  <!--  <li class='nav-item bars'>
                        <a>
                            <i class="fas fa-bars" onclick="openNav()">
                            </i>
                        </a>

                    </li>-->
                </ul>

            </div>

        </nav>

        <!--Publicite sention-->

        <section class="Pub">



            <!-- Slideshow container -->
            <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                    <img src="./assessts/pub 1.PNG" alt="pub1 error">
                </div>

                <div class="mySlides fade">
                    <img src="./assessts/pub2.jpg" alt="pub2 error">
                </div>

                <div class="mySlides fade">
                    <img src="./assessts/pub3.PNG" alt="pub1 error">
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>

            <!-- The dots/circles -->
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(0)"></span>
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
            </div>




        </section>

        <!--Products && Services Links -->

        <div class="Products-Links">
            <ul>
                <li>
                    <img src="./assessts/animals.jpg" alt="jardinage">
                    <a href="#">

                        <button class="btn">Nos Produits</button>
                    </a>
                </li>
                <li>
                    <img src="./assessts/jardinier.jpg" alt="jardinage">
                    <a href="#">

                        <button class="btn">Nos Produits</button>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <img src="./assessts/jardinage.jpg" alt="jardinage">
                    <a href="#">

                        <button class="btnj btn">Service Jardinage</button>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <img src="./assessts/Hebergement.jpg" alt="jardinage">
                    <a href="#">

                        <button class="btn">Hebergement</button>
                    </a>
                </li>
                <li>
                    <img src="./assessts/Veterinaire.jpg" alt="jardinage">
                    <a href="#">

                        <button class="btn">Veterinere</button>
                    </a>
                </li>
                <li>
                    <img src="./assessts/Adoption.png" alt="jardinage">
                    <a href="#">

                        <button class="btn">Adoption</button>
                    </a>
                </li>
                <li>
                    <img src="./assessts/Hygene.jpg" alt="jardinage">
                    <a href="#">

                        <button class="btn">Hygene</button>
                    </a>
                </li>
            </ul>
        </div>






        <!-- GO Top btn-->

        <div class="Top">
            <a href="#Top">

                <button>&raquo;</button>
            </a>
        </div>


    </div>


    <!--Side NavBar-->
    <div id="mySidenav" class="sidenav">

        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a id="Loginbtn">
            <i onclick="login() ;OpenLoginForm()">Login</i> </a>
        <div class="SideBar-Links">
            <a href="#" onclick="closeNav()">Accessoires Animalerie</a>
            <a href="#" onclick="closeNav()">Vétèrinaire</a>
            <a href="#" onclick="closeNav()">Adoption</a>
            <a href="#" onclick="closeNav()">Hebergement</a>
            <a href="#" onclick="closeNav()">Hygéne</a>
            <a href="#" onclick="closeNav()">Materiel Jardinage</a>
            <a href="#" onclick="closeNav()">Services Jardinage</a>
            <a href="#" onclick="closeNav()">Services ApresVente</a>
        </div>

    </div>

    <!--Login window-->

    <div class="Loginwindow">
        <button onclick=" login() ; OpenLoginForm() ">Connexion</button>
        <h4>Vous etes nouveaux ?
            <a>
                <i onclick="register() ; OpenLoginForm() ; " style="cursor: pointer;">Inscrivez-vous ici</i>
            </a>
        </h4>
    </div>





    <!--Login Form-->
    <div class="LoginForm">
        <div class="form-box">
            <a class="Loginclosebtn" style="cursor: pointer;">
                <i onclick="CloseLoginForm()">&times;</i>
            </a>

            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>

            <form method="post" action="Controlleur/Login.php" id="login" class="input-group"  >
                <input type="email" class="input-field" placeholder="Your Email" name="Email" required>
                <input type="password" class="input-field" placeholder="Enter Password" name="Password" required>
                <input type="checkbox" class="check-box" placeholder="Enter Password" required><span>Remember
                    Pass</span>
                <button type="submit" class="submit-btn" onSubmit="LoginTest(true) ; CloseLoginForm() ;">Login</button>

                <a href="Vue/Oublie.php" style="color:red; font-size: 15px; text-decoration: none;" >Mot depasse Oublie ? </a>
            </form>

            <form method="post" action="Controlleur/Signup.php" id="register" class="input-group"  >
                <input type="text" class="input-field" placeholder="Nom" name="Nom" required>
                <input type="text" class="input-field" placeholder="Prenom" name="Prenom" required>
                <input type="email" class="input-field" placeholder="Email" name="Email" required>
                <input type="password" class="input-field" placeholder="Enter Password" name="Password" required>
                <input type="checkbox" class="check-box" placeholder="Enter Password" required><span
                    style="top: 171px;">I agree to the
                    terms & conditions</span>
                <button type="submit" class="submit-btn" onSubmit="LoginTest(true);CloseLoginForm() ;">Register</button>
            </form>
        </div>

    </div>




























    <!--Footer-->


    <footer>

        <div class="footer-container">
            <section class="footer-subscription">

                <p class="footer-subscription-heading">
                    THANKS FOR VISINTING US
                </p>

                <p class="footer-subscription-text">
                    You can unsubscribe at any time
                </p>

                <div class="imput-areas">
                    <input type="email" name="email" placeholder="Put Your email" className="footer-input" />
                    <Button buttonStyle="btn--outline">Subscribe</Button>
                </div>

            </section>

            <div class="footer-as">
                <div class='footer-a-wrapper'>
                    <div class='footer-a-items'>
                        <h2>About Us</h2>
                        <a href='#'>How it works</a>
                        <a href='#'>Testimonials</a>
                        <a href='#'>Careers</a>
                        <a href='#'>Investors</a>
                        <a href='#'>Terms of Service</a>
                    </div>
                    <div class='footer-a-items'>
                        <h2>Contact Us</h2>
                        <a href='#'>Contact</a>
                        <a href='#'>Support</a>
                        <a href='#'>Destinations</a>
                        <a href='#'>Sponsorships</a>
                    </div>
                </div>
                <div class='footer-a-wrapper'>
                    <div class='footer-a-items'>
                        <h2>Videos</h2>
                        <a href='#'>Submit Video</a>
                        <a href='#'>Ambassadors</a>
                        <a href='#'>Agency</a>
                        <a href='#'>Influencer</a>
                    </div>
                    <div class='footer-a-items'>
                        <h2>Social Media</h2>
                        <a href='#'>Instagram</a>
                        <a href='#'>Facebook</a>
                        <a href='#'>Youtube</a>
                        <a href='#'>Twitter</a>
                    </div>
                </div>
            </div>


        </div>
        <section class='social-media'>
            <div class='social-media-wrap'>
                <div class='footer-logo'>
                    <a href='#' class='social-logo'>
                        <img src="./assessts/logoo.png" alt="Logo error">
                    </a>
                </div>

                <div>
                    <small class='website-rights'>The Debbagers © 2021</small>
                </div>

                <div class='social-icons'>
                    <a class='social-icon-a facebook' href='#' target='_blank' aria-label='Facebook'>
                        <i class='fab fa-facebook-f'></i>
                    </a>
                    <a class='social-icon-a instagram' href='#' target='_blank' aria-label='Instagram'>
                        <i class='fab fa-instagram'></i>
                    </a>
                    <a class='social-icon-a youtube' href='#' target='_blank' aria-label='Youtube'>
                        <i class='fab fa-youtube'></i>
                    </a>
                    <a class='social-icon-a twitter' href='#' target='_blank' aria-label='Twitter'>
                        <i class='fab fa-twitter'></i>
                    </a>
                    <a class='social-icon-a twitter' href='#' target='_blank' aria-label='aedIn'>
                        <i class='fab fa-aedin'></i>
                    </a>
                </div>

            </div>
        </section>

    </footer>

  <script>
 // document.getElementById("decon").style.visibility = "hidden";
function showlogout(){
      document.getElementById("decon").style.visibility = "hidden";

}
  </script>
  

</body>
<script type="text/javascript" src="Script/ScriptAceuil.js"></script>
    <script type="text/javascript" src="Script/LoginForm1.js"></script>
</html>