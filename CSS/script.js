/* Nava bar sticky on top */
window.onscroll = function() {myFunction()};
var navbar = document.getElementById("box-nav");
var sticky = navbar.offsetTop;
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

/* Responsive burger button */ 