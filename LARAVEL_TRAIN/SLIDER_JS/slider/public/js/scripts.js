/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/scripts.js ***!
  \*********************************/
var slideIndex = 1;
showSlides(slideIndex);
var prev = document.getElementById('prevbtn');
var next = document.getElementById('nextbtn');
prev.addEventListener('click', function (event) {
  showSlides(slideIndex += -1);
});
next.addEventListener('click', function (event) {
  showSlides(slideIndex += 1);
});

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName('mySlide');

  if (n > slides.length) {
    slideIndex = 1;
  }

  if (n < 1) {
    slideIndex = slides.length;
  }

  for (i = 0; i < slides.length; i++) {
    slides[i].classList.replace('block', 'hidden');
  }

  slides[slideIndex - 1].classList.replace('hidden', 'block');
  console.log(slides[slideIndex - 1]);
}
/******/ })()
;