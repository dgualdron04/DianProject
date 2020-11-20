const nav1 = document.getElementById("nav-1");
const nav2 = document.getElementById("nav-2");
const cedulageneral = document.getElementById("cedulageneral");
const cedulapensiones = document.getElementById("cedulapensiones");

nav1.addEventListener("click", (e) => {
    e.preventDefault();

    nav1.classList.add("active");
    nav2.classList.remove("active");
    cedulageneral.classList.add("active");
    cedulapensiones.classList.remove("active");
});

nav2.addEventListener("click", (e) => {
    e.preventDefault();

    nav1.classList.remove("active");
    nav2.classList.add("active");
    cedulageneral.classList.remove("active");
    cedulapensiones.classList.add("active");
});

