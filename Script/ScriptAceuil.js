var slideIndex = 0;
var dotIndex = 1;
var timer;


document.getElementsByClassName("Loginwindow")[0].style.visibility = "hidden"



showSlides();

// Next/previous controls
function plusSlides(n) {
    clearTimeout(timer);
    console.log(n)

    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    clearTimeout(timer);

    showSlides(slideIndex = n);

}

function showSlides() {

    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    if (slideIndex > 2) {

        dots[2].style.backgroundColor = "rgb(204, 239, 65)";

    }
    if (slideIndex > 2) { slideIndex = 0 }
    if (slideIndex < 0) { slideIndex = 0 }

    dots[slideIndex].style.backgroundColor = "rgb(156, 140, 143)";

    if (slideIndex > 0) {

        dots[slideIndex - 1].style.backgroundColor = "rgb(204, 239, 65)";
    }
    slideIndex++;



    slides[slideIndex - 1].style.display = "block";
    timer = setTimeout(showSlides, 3500); // Change image every 2 seconds

}


function ClickBars() {
    // document.getElementById("top").classList.add('Clicked');
}


/* Set the width of the side navigation to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "400px";
    document.getElementsByClassName("sidebaroff")[0].classList.add("Clicked")

    const sidebar = document.getElementById("mySidenav");

    sidebar.addEventListener("mouseleave", e => { closeNav() })

}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementsByClassName("sidebaroff")[0].classList.remove("Clicked")

}

