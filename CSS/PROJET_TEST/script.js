/*sticky navbar */

window.onscroll = function() {myFunction()};

var navBar = document.querySelector('.midNav');
var midNavBar =document.querySelector('.midNavBar');
var sticky = navBar.offsetTop;

function myFunction(){
    if(window.pageYOffset >= sticky){
        navBar.classList.add("sticky");
        midNavBar.style.backgroundColor="white";
    }else{
        navBar.classList.remove('sticky');
        midNavBar.style.backgroundColor ="";
    }
}
