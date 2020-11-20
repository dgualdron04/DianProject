const nav1 = document.getElementById("nav-1");
const nav2 = document.getElementById("nav-2");
const direccionseccional = document.getElementById("direccionseccional");
const actividadeconomico = document.getElementById("actividadeconomico");

nav1.addEventListener("click", (e) => {
    e.preventDefault();

    nav1.classList.add("active");
    nav2.classList.remove("active");
    direccionseccional.classList.add("active");
    actividadeconomico.classList.remove("active");
});

nav2.addEventListener("click", (e) => {
    e.preventDefault();

    nav1.classList.remove("active");
    nav2.classList.add("active");
    direccionseccional.classList.remove("active");
    actividadeconomico.classList.add("active");
});
