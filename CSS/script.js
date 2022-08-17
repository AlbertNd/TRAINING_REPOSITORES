const hamBar = document.querySelector(".ham-bar");
const navMenu = document.querySelector(".nav-menu"); 
const respNav = document.querySelector(".navbar");

hamBar.addEventListener("click", ()=>{
    hamBar.classList.toggle("active");
    navMenu.classList.toggle("active"); 
    respNav.classList.toggle("active");
});

const navBarScroll = document.querySelector(".navbar"); 

window.addEventListener("scroll", ()=>{
    navBarScroll.style.backgroundColor="green";
})