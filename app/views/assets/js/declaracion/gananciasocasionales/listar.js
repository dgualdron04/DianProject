//#region Creación de la tabla Ganancias Ocasionales
const dtgananciasocasionales = new DataTable('#datatable-gananciasocasionales', 'Ganancias Ocasionales', [
    {
        id: 'bAddgananciasocasionales',
        text: 'Crear Ganancias Ocasionales',
        icon: 'fas fa-paste',
        type: 'button',
        action: function () {
            let modalcrear = document.getElementById("modal-crear-gananciasocasionales");

            //#region Cerrar modal editar
            modalcrear.children[0].children[0].children[0].children[0].addEventListener(
                "click",
                () => {
                    modalcrear.children[0].classList.add("modal-close");

                    setTimeout(() => {
                        modalcrear.style.opacity = 0;
                        modalcrear.style.visibility = "hidden";
                    }, 500);
                }
            );

            //#endregion

            modalcrear.style.opacity = 1;
            modalcrear.style.visibility = "visible";
            modalcrear.children[0].classList.remove("modal-close");
        }
    }
]);

dtgananciasocasionales.parse();
  //#endregion

//#region Dentro del modal crear ganancias ocasionales

const nextBtnFirstgananciasocasionales = document.querySelector(".firstNextgananciasocasionales");
const prevBtnFirstgananciasocasionales = document.querySelector(".firstPrevgananciasocasionales");
const progressTextgananciasocasionales = document.querySelectorAll(".step .stepcreargananciasocasionales");
const progressCheckgananciasocasionales = document.querySelectorAll(".step .checkcreargananciasocasionales");
const bulletgananciasocasionales = document.querySelectorAll(".step .bulletcreargananciasocasionales");
const slidePagegananciasocasionales = document.querySelector(".slide-page-crear-gananciasocasionales");
const slidePage2gananciasocasionales = document.querySelector(".slide-page-crear-2-gananciasocasionales");
let currentgananciasocasionales = 1;
slidePage2gananciasocasionales.style.display = "none";

nextBtnFirstgananciasocasionales.addEventListener("click", function (event) {
    event.preventDefault();
    slidePagegananciasocasionales.style.display = "none";
    slidePage2gananciasocasionales.style.display = "block";
    bulletgananciasocasionales[currentgananciasocasionales - 1].classList.add("active");
    progressCheckgananciasocasionales[currentgananciasocasionales - 1].classList.add("active");
    progressTextgananciasocasionales[currentgananciasocasionales - 1].classList.add("active");
    currentgananciasocasionales += 1;
});

prevBtnFirstgananciasocasionales.addEventListener("click", function (event) {
    event.preventDefault();
    slidePagegananciasocasionales.style.display = "block";
    slidePage2gananciasocasionales.style.display = "none";

    if (currentgananciasocasionales === 3) {
        bulletgananciasocasionales[currentgananciasocasionales - 2].classList.remove("active");
        progressCheckgananciasocasionales[currentgananciasocasionales - 2].classList.remove("active");
        progressTextgananciasocasionales[currentgananciasocasionales - 2].classList.remove("active");
        currentgananciasocasionales -= 2;
        bulletgananciasocasionales[currentgananciasocasionales - 1].classList.remove("active");
        progressCheckgananciasocasionales[currentgananciasocasionales - 1].classList.remove("active");
        progressTextgananciasocasionales[currentgananciasocasionales - 1].classList.remove("active");
    } else {
        bulletgananciasocasionales[currentgananciasocasionales - 2].classList.remove("active");
        progressCheckgananciasocasionales[currentgananciasocasionales - 2].classList.remove("active");
        progressTextgananciasocasionales[currentgananciasocasionales - 2].classList.remove("active");
        currentgananciasocasionales -= 1;
    }
});


//#endregion

//#region Insertar Tipos de Ganancias Ocasionales

let tipogananciasocasionales = document.getElementById('tipogananciasocasionalescrear');

tipogananciasocasionales.addEventListener('change', () => {

    let formData = new FormData();
    let param = true;
    formData.append("param", param);

    let tipoganancias = tipogananciasocasionales.value;

    if (tipoganancias === "ingresosganancias") {
        document.getElementById('spantipogananciasocasionalescrear').innerHTML = "de Ganancias ocasionales";
        ajax({
            url: `./declaracion/traertipo/gananciasocasionales/${tipoganancias}`,
            method: 'POST',
            done: llenartipogananciasocasionales,
            error: rendererror,
            form: formData,
            urlactual: location.href,
        });
    } else if (tipoganancias === "ingresosnoconse") {

        nextBtnFirstgananciasocasionales.classList.remove('isdisabled');
        document.getElementById('tipo1gananciasocasionalescrear').setAttribute('disabled', 'disabled');
        document.getElementById('divtipogananciasocasionalescrear').classList.add('scond');
        
    } else if (tipoganancias === "gananciasnogravadas") {
        document.getElementById('spantipogananciasocasionalescrear').innerHTML = "de Ganancias no gravadas";
        ajax({
            url: `./declaracion/traertipo/gananciasocasionales/${tipoganancias}`,
            method: 'POST',
            done: llenartipogananciasocasionales,
            error: rendererror,
            form: formData,
            urlactual: location.href,
        });

    }

});

//#endregion

//#region Llenar tipo de ganancias

function llenartipogananciasocasionales(datos) {
    
    nextBtnFirstgananciasocasionales.classList.add('isdisabled');
    let creartiposganancias = document.getElementById('tipo1gananciasocasionalescrear');
    let divtipoganancias = document.getElementById('divtipogananciasocasionalescrear');
    let id;
    let tipo;

    if (datos.length !== 0) {
        if (datos[0]['idtipogananciasnogravadas']) { tipo = "Ganancias no Gravadas" } else { tipo = "Ingresos" };
    }

    creartiposganancias.innerHTML = `
    <option selected="true" disabled="disabled" class="noselected">Seleccione el tipo de ${tipo}</option>`;
    datos.forEach(tipos => {
        tipos['idtipogananciasnogravadas'] ? id = tipos['idtipogananciasnogravadas'] : id = tipos['idtipoingresosganancias'];
        creartiposganancias.innerHTML += `<option value="${id}">${tipos['nombre']}</option>`;
    });

    if (datos.length !== 0) {
        divtipoganancias.classList.remove('scond');
        creartiposganancias.removeAttribute('disabled');
    } else {
        divtipoganancias.classList.add('scond');
        creartiposganancias.setAttribute('disabled', 'disabled');
    }

}

let creartiposganancias = document.getElementById('tipo1gananciasocasionalescrear');

creartiposganancias.addEventListener('change', (e) => {
    e.preventDefault();

    nextBtnFirstgananciasocasionales.classList.remove('isdisabled');
});

//#endregion

//#region Crear Ganancias Ocasionales

let formcreargananciasocasionales = document.getElementById('form-crear-gananciasocasionales');

formcreargananciasocasionales.addEventListener('submit', (e) => {

    bulletgananciasocasionales[currentgananciasocasionales - 1].classList.add("active");
    progressCheckgananciasocasionales[currentgananciasocasionales - 1].classList.add("active");
    progressTextgananciasocasionales[currentgananciasocasionales - 1].classList.add("active");
    currentgananciasocasionales += 1;

    e.preventDefault();

    let formData = new FormData(formcreargananciasocasionales);
    let param = true;
    formData.append("param", param);
    let claseg = formcreargananciasocasionales['tipogananciasocasionalescrear'].value;

    let id = formcreargananciasocasionales['tipo1gananciasocasionalescrear'].value;
    let idgananciasocasionales = document.getElementById('idganancias').innerHTML;
    formData.append("idgananciasocasionales", idgananciasocasionales);
    if (claseg != "ingresosnoconse") {
        ajax({
            url: `./declaracion/creardeclaracion/gananciasocasionales/${claseg}/${id}`,
            method: 'POST',
            done: setTimeout(() => { location.reload(); }, 200),
            error: rendererror,
            form: formData,
            urlactual: location.href,
        });
    } else {
        ajax({
            url: `./declaracion/creardeclaracion/gananciasocasionales/${claseg}`,
            method: 'POST',
            done: setTimeout(() => { location.reload(); }, 200),
            error: rendererror,
            form: formData,
            urlactual: location.href,
        });
    }

});

//#endregion

//#region Editar Ganancias Ocasionales

function editargananciasocasionales(e, id) {
    
    e.preventDefault();
    let modaleditar = document.getElementById("modal-editar-gananciasocasionales");

    modaleditar.style.opacity = 1;
    modaleditar.style.visibility = "visible";
    modaleditar.children[0].classList.remove("modal-close");

    //#region Cerrar modal editar

    modaleditar.children[0].children[0].children[0].children[0].addEventListener(
        "click",
        () => {
            modaleditar.children[0].classList.add("modal-close");

            setTimeout(() => {
                modaleditar.style.opacity = 0;
                modaleditar.style.visibility = "hidden";
            }, 500);
        }
    );

    //#endregion

    let etiqueta = id.trim().split('-');
    document.getElementById('tipopatrimonioeditar').innerHTML = etiqueta[2];
    let tipo = quitaracentosfun(etiqueta[3].replace(" ", '').toLowerCase().replace(" ", ''));
    let clase = quitaracentosfun(etiqueta[2].replace(" ", '').toLowerCase().replace(" ", ''));
    id = etiqueta[1];

    document.getElementById('tipogananciasocasionaleseditar').innerHTML = etiqueta[2];
    document.getElementById('tipo2gananciasocasionaleseditar').innerHTML = etiqueta[3];
    
    let formData = new FormData(formcreargananciasocasionales);
    let param = true;
    formData.append("param", param);

    ajax({
        url: `./declaracion/editardecla/gananciasocasionales/${clase}/${id}`,
        method: "POST",
        done: inicializargananciasocasionales,
        error: rendererror,
        form: formData,
        urlactual: location.href,
    });

}

//#endregion

//#region Inicializar Editar

function inicializargananciasocasionales(datos) {
    
    document.getElementById('idgo').value = datos[0]['id'];
    document.getElementById('valorgananciasocasionaleseditar').value = datos[0]['valor'];

}

//#endregion

//#region Editar patrimonio

let formeditargananciasocasionales = document.getElementById('form-editar-gananciasocasionales');

formeditargananciasocasionales.addEventListener('submit', (e) => {

    e.preventDefault();

    let formData = new FormData(formeditargananciasocasionales);
    let param = true;
    formData.append("param", param);
    let clasego = quitaracentosfun(document.getElementById('tipogananciasocasionaleseditar').innerHTML.replace(" ", '').toLowerCase().replace(" ", ''));

    let id = formeditargananciasocasionales['idgo'].value;
    ajax({
        url: `./declaracion/editardeclaracion/gananciasocasionales/${clasego}/${id}`,
        method: 'POST',
        done: setTimeout(() => { location.reload(); }, 200),
        error: rendererror,
        form: formData,
        urlactual: location.href,
    });

});

//#endregion

//#region Eliminar patrimonio

function eliminargananciasocasionales(e, id) {

    e.preventDefault();

    let modaldelete = document.getElementById("modal-delete-gananciasocasionales");

    modaldelete.style.opacity = 1;
    modaldelete.style.visibility = "visible";
    modaldelete.children[0].classList.remove("modal-close");

    //#region Cerrar modal eliminar
    modaldelete.children[0].children[0].children[1].addEventListener("click", () => {
        modaldelete.children[0].classList.add("modal-close");

        setTimeout(() => {
            modaldelete.style.opacity = 0;
            modaldelete.style.visibility = "hidden";
        }, 500);
    }
    );
    //#endregion


    let etiqueta = id.trim().split('-');
    let valor = quitaracentosfun(etiqueta[4].replace(" ", '').toLowerCase().replace(" ", ''));
    let tipo = quitaracentosfun(etiqueta[3].replace(" ", '').toLowerCase().replace(" ", ''));
    let clase = quitaracentosfun(etiqueta[2].replace(" ", '').toLowerCase().replace(" ", ''));
    id = etiqueta[1];

    document.getElementById("h2-header-gananciasocasionales").innerHTML = `Eliminar la ganancia ocasional ${etiqueta[2]} con valor ${etiqueta[4]}`;
    document.getElementById("modal-body-gananciasocasionales").innerHTML = `<p>¿ Estas seguro que deseas eliminar la ganancia ocasional ${etiqueta[2]} con tipo ${etiqueta[3]} con un valor de ${etiqueta[4]}?</p>`;
    document.getElementById("modal-footer-gananciasocasionales").innerHTML = `<a href="#" id="si-eliminar-gananciasocasionales" class="btn-modal btn-block-modal btn-delete"> Si </a> <a href="#" id="no-eliminar-gananciasocasionales" class="btn-modal btn-block-modal btn-delete"> No </a>`;
    
    let sieliminargananciasocasionales = document.getElementById("si-eliminar-gananciasocasionales");
    let noeliminargananciasocasionales = document.getElementById("no-eliminar-gananciasocasionales");
    
    
    noeliminargananciasocasionales.addEventListener("click", (e) => {
        e.preventDefault();

        let modaldelete = document.getElementById("modal-delete-gananciasocasionales");

        modaldelete.children[0].classList.add("modal-close");

        setTimeout(() => {
            modaldelete.style.opacity = 0;
            modaldelete.style.visibility = "hidden";
        }, 500);
    });
    
    sieliminargananciasocasionales.addEventListener("click", (e) => {
        e.preventDefault();
        let formData = new FormData();
        let param = true;
        formData.append("param", param);
        ajax({
            url: `./declaracion/eliminardeclaracion/gananciasocasionales/${clase}/${id}`,
            method: "POST",
            done: setTimeout(() => { location.reload(); }, 200),
            error: rendererror,
            form: formData,
            urlactual: location.href,
        });
    }); 

}

//#endregion
