const nav1 = document.getElementById("nav-1");
const nav2 = document.getElementById("nav-2");
const gananciasnogravadas = document.getElementById("gananciasnogravadas");
const ingresosganancias = document.getElementById("ingresosganancias");

nav1.addEventListener("click", (e) => {
    e.preventDefault();

    nav1.classList.add("active");
    nav2.classList.remove("active");
    gananciasnogravadas.classList.add("active");
    ingresosganancias.classList.remove("active");
});

nav2.addEventListener("click", (e) => {
    e.preventDefault();

    nav1.classList.remove("active");
    nav2.classList.add("active");
    gananciasnogravadas.classList.remove("active");
    ingresosganancias.classList.add("active");
});
