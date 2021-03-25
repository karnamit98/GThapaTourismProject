// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
//var navbar = document.getElementById("navbar");
var navbar = document.querySelector(".nav");
//Back To Top Button
//Get the button:
var btnBackToTop = document.getElementById("btnBackToTop");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() { console.log("scrolled!");
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
    btnBackToTop.style.display = "block";
  } else {
    navbar.classList.remove("sticky");
    btnBackToTop.style.display = "none";
  }
}

//var mybutton = document.querySelector("#btnBackToTop");

// When the user scrolls down 20px from the top of the document, show the button
/*window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    btnBackToTop.style.display = "block";
  } else {
    btnBackToTop.style.display = "none";
  }
} */

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
} 