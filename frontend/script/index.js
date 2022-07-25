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
// let nombre = 'william', edad = 21;
// const persona = {
//     nombre,
//     edad,
// }
// const people = new Map(); 
// people.set('ciudad', 'ibagué');
// const funcionFlecha = () => 'gola';
// const mayorEdad = persona.edad > 17 ? 'eres mayor de edad' : 'eres menor de edad'; 

// console.log(`Usando los maps: ${people} y los ifs recortados: ${mayorEdad}, también funcion flecha: ${funcionFlecha}`);