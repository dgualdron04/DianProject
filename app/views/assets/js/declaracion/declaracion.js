const nav1 = document.getElementById("nav-1");
    const nav2 = document.getElementById("nav-2");
    const nav3 = document.getElementById("nav-3");
    const nav4 = document.getElementById("nav-4");
    const nav5 = document.getElementById("nav-5");
    const nav6 = document.getElementById("nav-6");
    const informacionpersonal = document.getElementById("informacionpersonal");
    const patrimonio = document.getElementById("patrimonio");
    const cedulas = document.getElementById("cedulas");
    const liquidacionprivada = document.getElementById("liquidacionprivada");
    const gananciasocasionales = document.getElementById("gananciasocasionales");
    const exogenas = document.getElementById("exogenas");

    nav1.addEventListener('click', (e) => {
        e.preventDefault();

        activarboton(nav1, nav2, nav3, nav4, nav5, nav6);
        activartab(informacionpersonal, patrimonio, cedulas, liquidacionprivada, gananciasocasionales,exogenas);

    });

    nav2.addEventListener('click', (e) => {
        e.preventDefault();

        activarboton(nav2, nav1, nav3, nav4, nav5, nav6);
        activartab(patrimonio, informacionpersonal, cedulas, liquidacionprivada, gananciasocasionales, exogenas);

    });

    nav3.addEventListener('click', (e) => {
        e.preventDefault();

        activarboton(nav3, nav1, nav2, nav4, nav5, nav6);
        activartab(cedulas, informacionpersonal, patrimonio, liquidacionprivada, gananciasocasionales, exogenas);

    });

    nav4.addEventListener('click', (e) => {
        e.preventDefault();

        activarboton(nav4, nav1, nav2, nav3, nav5, nav6);
        activartab(liquidacionprivada, informacionpersonal, patrimonio, cedulas, gananciasocasionales, exogenas);

    });

    nav5.addEventListener('click', (e) => {
        e.preventDefault();

        activarboton(nav5, nav1, nav2, nav3, nav4, nav6);
        activartab(gananciasocasionales, informacionpersonal, patrimonio, cedulas, liquidacionprivada, exogenas);

    });

    nav6.addEventListener('click', (e) => {
        e.preventDefault();

        activarboton(nav6, nav1, nav2, nav3, nav4, nav5);
        activartab(exogenas, informacionpersonal, patrimonio, cedulas, liquidacionprivada, gananciasocasionales);

    });

    function activarboton(botonactivo, botoninactivo1, botoninactivo2, botoninactivo3, botoninactivo4, botoninactivo5){

        botonactivo.classList.add("active");
        botoninactivo1.classList.remove("active");
        botoninactivo2.classList.remove("active");
        botoninactivo3.classList.remove("active");
        botoninactivo4.classList.remove("active");
        botoninactivo5.classList.remove("active");

    }



    function activartab (tabactivo, tabinactivo1, tabinactivo2, tabinactivo3, tabinactivo4, tabinactivo5) {

        tabactivo.classList.add("active");
        tabinactivo1.classList.remove("active");
        tabinactivo2.classList.remove("active");
        tabinactivo3.classList.remove("active");
        tabinactivo4.classList.remove("active");
        tabinactivo5.classList.remove('active');

    }