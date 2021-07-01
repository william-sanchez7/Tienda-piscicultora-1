const menu = document.querySelector(".menu");
const navOpen = document.querySelector(".hamburguer");
const navClose = document.querySelector(".close");
const navBar = document.querySelector(".nav");

const navLeft = menu.getBoundingClientRect().left;

navOpen.addEventListener("click", () => {
    if  (navLeft < 0) {
        menu.classList.add("show");
        document.body.classList.add("show");
        navBar.classList.add("show");
    }
}); 

navClose.addEventListener("click", () => {
    if  (navLeft < 0) {
        menu.classList.remove("show");
        document.body.classList.remove("show");
        navBar.classList.remove("show");
    }
}); 

//Fix nav
const navHeight = navBar.getBoundingClientRect().height;

window.addEventListener("scroll", () => {
    const scrollHeight = window.pageYOffset;
    if(scrollHeight > navHeight) {
        navBar.classList.add("fix-nav");
    } else{
        navBar.classList.remove("fix-nav");
    }
});