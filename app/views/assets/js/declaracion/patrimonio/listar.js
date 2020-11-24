//#region Creación de la tabla patrimonio
const dtpatrimonio = new DataTable('#datatable-patrimonio', 'información personal', [
    {
        id: 'bAddpatrimonio',
        text: 'Crear Patrimonio',
        icon: 'fas fa-paste',
        type: 'button',
        action: function () {
            let modalcrear = document.getElementById("modal-crear-patrimonio");

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
    },
    {
        id: 'totalpatrimonioliquido',
        text: document.getElementById('idtotalpatrimonio').innerHTML,
        type: 'p',
    },
    {
        id: 'totaldeudaspatrimonio',
        text: document.getElementById('idtotaldeuda').innerHTML,
        type: 'p',
    },
    {
        id: 'totalbienespatrimonio',
        text: document.getElementById('idtotalbien').innerHTML,
        type: 'p2',
    }
]);

dtpatrimonio.parse();
//#endregion

//#region Insertar Tipos de Patrimonio

let tipopatrimonio = document.getElementById('tipopatrimoniocrear');

tipopatrimonio.addEventListener('change', () => {

    let formData = new FormData();
    let param = true;
    formData.append("param", param);

    let tipopatri = tipopatrimonio.value;

    if (tipopatri === "bienes") {
        document.getElementById('spantipopatrimoniocrear').innerHTML = "de Bienes";
        ajax({
            url: `./declaracion/traertipo/patrimonio/${tipopatri}`,
            method: 'POST',
            done: llenartipopatrimonio,
            error: rendererror,
            form: formData,
            urlactual: location.href,
        });
    } else if (tipopatri === "deudas") {
        document.getElementById('spantipopatrimoniocrear').innerHTML = "de Deudas";
        ajax({
            url: `./declaracion/traertipo/patrimonio/${tipopatri}`,
            method: 'POST',
            done: llenartipopatrimonio,
            error: rendererror,
            form: formData,
            urlactual: location.href,
        });

    }

});

//#endregion

//#region Llenar DropDownList de tipo de patrimonio

function llenartipopatrimonio(datos) {
    nextBtnFirst.classList.add('isdisabled');
    let creartipospatri = document.getElementById('tipo1patrimoniocrear');
    let divtipopatrimoniocrear = document.getElementById('divtipopatrimoniocrear');
    let id;
    let tipo;

    if (datos.length !== 0) {
        if (datos[0]['idtipobien']) { tipo = "Bien" } else { tipo = "Deuda" };
    }

    creartipospatri.innerHTML = `
    <option selected="true" disabled="disabled" class="noselected">Seleccione el tipo de ${tipo}</option>`;
    datos.forEach(tipos => {
        tipos['idtipobien'] ? id = tipos['idtipobien'] : id = tipos['idtipodeuda'];
        creartipospatri.innerHTML += `<option value="${id}">${tipos['nombre']}</option>`;
    });

    if (datos.length !== 0) {
        divtipopatrimoniocrear.classList.remove('scond');
        creartipospatri.removeAttribute('disabled');
    } else {
        divtipopatrimoniocrear.classList.add('scond');
        creartipospatri.setAttribute('disabled', 'disabled');
    }

}

let creartipospatrimonio = document.getElementById('tipo1patrimoniocrear');

creartipospatrimonio.addEventListener('change', (e) => {
    e.preventDefault();

    nextBtnFirst.classList.remove('isdisabled');
});

//#endregion

//#region Dentro del modal crear patrimonio

const nextBtnFirst = document.querySelector(".firstNextpatrimonio");
const prevBtnFirst = document.querySelector(".firstPrevpatrimonio");
const progressText = document.querySelectorAll(".step .stepcrearpatrimonio");
const progressCheck = document.querySelectorAll(".step .checkcrearpatrimonio");
const bullet = document.querySelectorAll(".step .bulletcrearpatrimonio");
const slidePage = document.querySelector(".slide-page-crear-patrimonio");
const slidePage2 = document.querySelector(".slide-page-crear-2-patrimonio");
let current = 1;
slidePage2.style.display = "none";

nextBtnFirst.addEventListener("click", function (event) {
    event.preventDefault();
    slidePage.style.display = "none";
    slidePage2.style.display = "block";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
        url: `./declaracion/traertipo/patrimonio/moneda`,
        method: 'POST',
        done: llenartipomoneda,
        error: rendererror,
        form: formData,
        urlactual: location.href,
    });
    ajax({
        url: `./declaracion/traertipo/patrimonio/modelo`,
        method: 'POST',
        done: llenartipomodelo,
        error: rendererror,
        form: formData,
        urlactual: location.href,
    });
});

prevBtnFirst.addEventListener("click", function (event) {
    event.preventDefault();
    slidePage.style.display = "block";
    slidePage2.style.display = "none";

    if (current === 3) {
        bullet[current - 2].classList.remove("active");
        progressCheck[current - 2].classList.remove("active");
        progressText[current - 2].classList.remove("active");
        current -= 2;
        bullet[current - 1].classList.remove("active");
        progressCheck[current - 1].classList.remove("active");
        progressText[current - 1].classList.remove("active");
    } else {
        bullet[current - 2].classList.remove("active");
        progressCheck[current - 2].classList.remove("active");
        progressText[current - 2].classList.remove("active");
        current -= 1;
    }
});


//#endregion

//#region Llenar tipo de moneda

function llenartipomoneda(datos) {
    let crertipomoneda = document.getElementById('tipomonedacrearpatrimonio');

    crertipomoneda.innerHTML = `
    <option selected="true" disabled="disabled" class="noselected">Seleccione el tipo de Moneda</option>`;
    datos.forEach(tipos => {
        crertipomoneda.innerHTML += `<option value="${tipos['idtipomoneda']}">${tipos['nombre']}</option>`;
    });
}

//#endregion

//#region Llenar tipo de modelo

function llenartipomodelo(datos) {
    let crertipomodelo = document.getElementById('tipomodelocrearpatrimonio');

    crertipomodelo.innerHTML = `
    <option selected="true" disabled="disabled" class="noselected">Seleccione el Modelo</option>`;
    datos.forEach(tipos => {
        crertipomodelo.innerHTML += `<option value="${tipos['idmodelo']}">${tipos['tipomodelo']}</option>`;
    });
}

//#endregion

//#region Crear Patrimonio

let formcrearpatrimonio = document.getElementById('form-crear-patrimonio');

formcrearpatrimonio.addEventListener('submit', (e) => {

    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;

    e.preventDefault();

    let formData = new FormData(formcrearpatrimonio);
    let param = true;
    formData.append("param", param);
    let clasep = formcrearpatrimonio['tipopatrimoniocrear'].value;
    let id = formcrearpatrimonio['tipo1patrimoniocrear'].value;
    let idpatri = document.getElementById('idpatrimonio').innerHTML;
    formData.append("idpatri", idpatri);
    ajax({
        url: `./declaracion/creardeclaracion/patrimonio/${clasep}/${id}`,
        method: 'POST',
        done: setTimeout(() => { location.reload(); }, 200),
        error: rendererror,
        form: formData,
        urlactual: location.href,
    });

});

//#endregion

//#region Dentro del modal editar patrimonio

const nextBtnFirsteditar = document.querySelector(".firstNexteditarpatrimonio");
const prevBtnFirsteditar = document.querySelector(".firstPreveditarpatrimonio");
const progressTexteditar = document.querySelectorAll(".step .stepeditarpatrimonio");
const progressCheckeditar = document.querySelectorAll(".step .checkeditarpatrimonio");
const bulleteditar = document.querySelectorAll(".step .bulleteditarpatrimonio");
const slidePageeditar = document.querySelector(".slide-page-editar-patrimonio");
const slidePage2editar = document.querySelector(".slide-page-editar-2-patrimonio");
let currenteditar = 1;
slidePage2editar.style.display = "none";

nextBtnFirsteditar.addEventListener("click", function (event) {
    event.preventDefault();
    slidePageeditar.style.display = "none";
    slidePage2editar.style.display = "block";
    bulleteditar[currenteditar - 1].classList.add("active");
    progressCheckeditar[currenteditar - 1].classList.add("active");
    progressTexteditar[currenteditar - 1].classList.add("active");
    currenteditar += 1;
});

prevBtnFirsteditar.addEventListener("click", function (event) {
    event.preventDefault();
    slidePageeditar.style.display = "block";
    slidePage2editar.style.display = "none";

    if (currenteditar === 3) {
        bulleteditar[currenteditar - 2].classList.remove("active");
        progressCheckeditar[currenteditar - 2].classList.remove("active");
        progressTexteditar[currenteditar - 2].classList.remove("active");
        currenteditar -= 2;
        bulleteditar[currenteditar - 1].classList.remove("active");
        progressCheckeditar[currenteditar - 1].classList.remove("active");
        progressTexteditar[currenteditar - 1].classList.remove("active");
    } else {
        bulleteditar[currenteditar - 2].classList.remove("active");
        progressCheckeditar[currenteditar - 2].classList.remove("active");
        progressTexteditar[currenteditar - 2].classList.remove("active");
        currenteditar -= 1;
    }
});


//#endregion

//#region Botón editar

function editarpatrimonio(e, id) {

    e.preventDefault();
    let modaleditar = document.getElementById("modal-editar-patrimonio");

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

    let formData = new FormData();
    let param = true;
    formData.append("param", param);

    let etiqueta = id.trim().split('-');
    document.getElementById('tipopatrimonioeditar').innerHTML = etiqueta[2];
    let clase = quitaracentosfun(etiqueta[2].replace(" ", '').toLowerCase().replace(" ", ''));
    id = etiqueta[1];

    if (clase === "bien") {
        ajax({
            url: `./declaracion/traertipo/patrimonio/${clase}`,
            method: 'POST',
            done: llenareditarpatrimonio,
            error: rendererror,
            form: formData,
            urlactual: location.href,
        });
    } else if (clase === "deuda") {
        ajax({
            url: `./declaracion/traertipo/patrimonio/${clase}`,
            method: 'POST',
            done: llenareditarpatrimonio,
            error: rendererror,
            form: formData,
            urlactual: location.href,
        });

    }

    formData.append("param", param);
    ajax({
        url: `./declaracion/traertipo/patrimonio/moneda`,
        method: 'POST',
        done: llenartipomonedaeditar,
        error: rendererror,
        form: formData,
        urlactual: location.href,
    });
    ajax({
        url: `./declaracion/traertipo/patrimonio/modelo`,
        method: 'POST',
        done: llenartipomodeloeditar,
        error: rendererror,
        form: formData,
        urlactual: location.href,
    });

    ajax({
        url: `./declaracion/editardecla/patrimonio/${clase}/${id}`,
        method: "POST",
        done: inicializareditarpatrimonio,
        error: rendererror,
        form: formData,
        urlactual: location.href,
    });
    slidePageeditar.style.display = "block";
    slidePage2editar.style.display = "none";
    bulleteditar[0].classList.remove("active");
    progressCheckeditar[0].classList.remove("active");
    progressTexteditar[0].classList.remove("active");
    currenteditar = 1;

}

//#endregion

//#region Llenar tipo de moneda editar

function llenartipomonedaeditar(datos) {
    let editartipomoneda = document.getElementById('tipomonedaeditarpatrimonio');

    editartipomoneda.innerHTML = `
    <option selected="true" disabled="disabled" class="noselected">Seleccione el tipo de Moneda</option>`;
    datos.forEach(tipos => {
        editartipomoneda.innerHTML += `<option value="${tipos['idtipomoneda']}">${tipos['nombre']}</option>`;
    });
}

//#endregion

//#region Llenar tipo de modelo editar

function llenartipomodeloeditar(datos) {
    let editartipomodelo = document.getElementById('tipomodeloeditarpatrimonio');

    editartipomodelo.innerHTML = `
    <option selected="true" disabled="disabled" class="noselected">Seleccione el Modelo</option>`;
    datos.forEach(tipos => {
        editartipomodelo.innerHTML += `<option value="${tipos['idmodelo']}">${tipos['tipomodelo']}</option>`;
    });
}

//#endregion

//#region Llenar DropDownList de editar patrimonio

function llenareditarpatrimonio(datos) {

    let editartipospatri = document.getElementById('tipo1patrimonioeditar');
    let id;
    let tipo;

    if (datos.length !== 0) {
        if (datos[0]['idtipobien']) { tipo = "Bien" } else { tipo = "Deuda" };
    }

    editartipospatri.innerHTML = `
    <option selected="true" disabled="disabled" class="noselected">Seleccione el tipo de ${tipo}</option>`;
    datos.forEach(tipos => {
        tipos['idtipobien'] ? id = tipos['idtipobien'] : id = tipos['idtipodeuda'];
        editartipospatri.innerHTML += `<option value="${id}">${tipos['nombre']}</option>`;
    });


}

//#endregion

//#region Inicializar editar patrimonio

function inicializareditarpatrimonio(datos) {
    setTimeout(() => {
        document.getElementById('iddob').value = datos[0]['id'];
        document.getElementById('nombrepatrimonioeditar').value = datos[0]['nombre'];
        document.getElementById('tipo1patrimonioeditar').value = datos[0]['tipo'];
        document.getElementById('valorpatrimonioeditar').value = datos[0]['valor'];
        document.getElementById('tipomonedaeditarpatrimonio').value = datos[0]['tipomoneda'];
        document.getElementById('tipomodeloeditarpatrimonio').value = datos[0]['modelo'];
    }, 200);
}

//#endregion

//#region Editar patrimonio

let formeditarpatrimonio = document.getElementById('form-editar-patrimonio');

formeditarpatrimonio.addEventListener('submit', (e) => {

    bulleteditar[currenteditar - 1].classList.add("active");
    progressCheckeditar[currenteditar - 1].classList.add("active");
    progressTexteditar[currenteditar - 1].classList.add("active");
    currenteditar += 1;

    e.preventDefault();

    let formData = new FormData(formeditarpatrimonio);
    let param = true;
    formData.append("param", param);
    let clasep = document.getElementById('tipopatrimonioeditar').innerHTML.toLowerCase();
    let id = formeditarpatrimonio['iddob'].value;
    ajax({
        url: `./declaracion/editardeclaracion/patrimonio/${clasep}/${id}`,
        method: 'POST',
        done: setTimeout(() => { location.reload(); }, 200),
        error: rendererror,
        form: formData,
        urlactual: location.href,
    });

});

//#endregion

//#region Eliminar patrimonio

function eliminarpatrimonio(e, id) {

    e.preventDefault();

    let modaldelete = document.getElementById("modal-delete-patrimonio");

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
    document.getElementById('tipopatrimonioeditar').innerHTML = etiqueta[2];
    let valor = quitaracentosfun(etiqueta[4].replace(" ", '').toLowerCase().replace(" ", ''));
    let tipo = quitaracentosfun(etiqueta[3].replace(" ", '').toLowerCase().replace(" ", ''));
    let clase = quitaracentosfun(etiqueta[2].replace(" ", '').toLowerCase().replace(" ", ''));
    id = etiqueta[1];

    document.getElementById("h2-header-patrimonio").innerHTML = `Eliminar el patrimonio ${etiqueta[2]} con valor ${etiqueta[4]}`;
    document.getElementById("modal-body-patrimonio").innerHTML = `<p>¿ Estas seguro que deseas eliminar el patrimonio ${etiqueta[2]} con tipo ${etiqueta[3]} con un valor de ${etiqueta[4]}?</p>`;
    document.getElementById("modal-footer-patrimonio").innerHTML = `<a href="#" id="si-eliminar-patrimonio" class="btn-modal btn-block-modal btn-delete"> Si </a> <a href="#" id="no-eliminar-patrimonio" class="btn-modal btn-block-modal btn-delete"> No </a>`;
    
    let sieliminarpatrimonio = document.getElementById("si-eliminar-patrimonio");
    let noeliminarpatrimonio = document.getElementById("no-eliminar-patrimonio");

    noeliminarpatrimonio.addEventListener("click", (e) => {
        e.preventDefault();

        let modaldelete = document.getElementById("modal-delete-patrimonio");

        modaldelete.children[0].classList.add("modal-close");

        setTimeout(() => {
            modaldelete.style.opacity = 0;
            modaldelete.style.visibility = "hidden";
        }, 500);
    });
    
    sieliminarpatrimonio.addEventListener("click", (e) => {
        e.preventDefault();
        let formData = new FormData();
        let param = true;
        formData.append("param", param);
        ajax({
            url: `./declaracion/eliminardeclaracion/patrimonio/${clase}/${id}`,
            method: "POST",
            done: setTimeout(() => { location.reload(); }, 200),
            error: rendererror,
            form: formData,
            urlactual: location.href,
        });
    });

}

//#endregion