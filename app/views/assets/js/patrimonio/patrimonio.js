const nav1 = document.getElementById("nav-1");
const nav2 = document.getElementById("nav-2");
const bienes = document.getElementById("bienes");
const deudas = document.getElementById("deudas");

nav1.addEventListener("click", (e) => {
    e.preventDefault();

    nav1.classList.add("active");
    nav2.classList.remove("active");
    bienes.classList.add("active");
    deudas.classList.remove("active");
});

nav2.addEventListener("click", (e) => {
    e.preventDefault();

    nav1.classList.remove("active");
    nav2.classList.add("active");
    bienes.classList.remove("active");
    deudas.classList.add("active");
});
