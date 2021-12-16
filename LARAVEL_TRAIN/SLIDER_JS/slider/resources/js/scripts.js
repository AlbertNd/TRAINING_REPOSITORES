var slideIndex = 1;

showSlides(slideIndex);

const prev = document.getElementById('prevbtn');
const next = document.getElementById('nextbtn'); 

prev.addEventListener('click', event =>{
    showSlides( slideIndex += -1)
})

next.addEventListener('click', event =>{
    showSlides( slideIndex += 1 )
})

function showSlides(n){
    var i;
    var slides = document.getElementsByClassName('mySlide');
    if(n> slides.length){
        slideIndex = 1
    }
    if(n<1){
        slideIndex = slides.length
    }
    for(i=0;i<slides.length;i++){
        slides[i].classList.replace('block','hidden');
    }
    slides[slideIndex -1].classList.replace('hidden','block');
    console.log(slides[slideIndex -1]);
    
}