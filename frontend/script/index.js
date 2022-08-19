const menu = document.querySelector(".menu");
const navOpen = document.querySelector(".hamburguer");
const navClose = document.querySelector(".close");
const navBar = document.querySelector(".nav");

const navLeft = menu.getBoundingClientRect().left;
//Menu de navegacion para el modo movil - botón abrir
navOpen.addEventListener("click", () => {
    if  (navLeft < 0) {
        menu.classList.add("show");
        document.body.classList.add("show");
        navBar.classList.add("show");
    }
}); 
//Menu de navegacion para el modo movil - botón cerrar
navClose.addEventListener("click", () => {
    if  (navLeft < 0) {
        menu.classList.remove("show");
        document.body.classList.remove("show");
        navBar.classList.remove("show");
    }
}); 

//Fix nav
const navHeight = navBar.getBoundingClientRect().height;
//Header o encabezado fijo, con un nuevo diseño diferente al header normal
window.addEventListener("scroll", () => {
    const scrollHeight = window.pageYOffset;
    if(scrollHeight > navHeight) {
        navBar.classList.add("fix-nav");
    } else{
        navBar.classList.remove("fix-nav");
    }
});