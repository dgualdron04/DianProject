//#region Creación de la tabla tipo bienes y activar el botón crear

const dtcedulapensiones = new DataTable("#datatable-cedulapensiones", "Tipos de cedulas de Pensiones",
    [
        {
            id: "bAddcedulapensiones",
            text: "Crear Tipo de Cedula de Pensiones",
            icon: "fas fa-paste",
            type: "button",
            action: function () {
                let modalcrear = document.getElementById("modal-crear-cedulapensiones");

                modalcrear.style.opacity = 1;
                modalcrear.style.visibility = "visible";
                modalcrear.children[0].classList.remove("modal-close");

                //#region Cerrar modal crear tipo Bien
                modalcrear.children[0].children[0].children[0].children[0].addEventListener("click", () => {
                    modalcrear.children[0].classList.add("modal-close");

                    setTimeout(() => {
                        modalcrear.style.opacity = 0;
                        modalcrear.style.visibility = "hidden";
                    }, 500);
                });

                //#endregion
            },
        },
    ]
);

dtcedulapensiones.parse();

//#endregion

//#region Dentro del modal crear cedula de pensiones

const nextBtnFirstpensiones = document.querySelector(".firstNextpensiones");
const prevBtnFirstpensiones = document.querySelector(".firstPrevpensiones");
const progressTextpensiones = document.querySelectorAll(".step .stepcrearpensiones");
const progressCheckpensiones = document.querySelectorAll(".step .checkcrearpensiones");
const bulletpensiones = document.querySelectorAll(".step .bulletcrearpensiones");
const slidePagepensiones = document.querySelector(".slide-page-crear-pensiones");
const slidePage2pensiones = document.querySelector(".slide-page-crear-2-pensiones");
const formSubmitpensiones = document.getElementById('form-crear-cedulapensiones');
let currentpensiones = 1;
slidePage2pensiones.style.display = "none";

nextBtnFirstpensiones .addEventListener("click", function (event) {
    event.preventDefault();
    slidePagepensiones.style.display = "none";
    slidePage2pensiones.style.display = "block";
    bulletpensiones[currentpensiones - 1].classList.add("active");
    progressCheckpensiones[currentpensiones - 1].classList.add("active");
    progressTextpensiones[currentpensiones - 1].classList.add("active");
    currentpensiones += 1;
});

prevBtnFirstpensiones.addEventListener("click", function (event) {
    event.preventDefault();
    slidePagepensiones.style.display = "block";
    slidePage2pensiones.style.display = "none";

    if (currentpensiones === 3) {
        bulletpensiones[currentpensiones - 2].classList.remove("active");
        progressCheckpensiones[currentpensiones - 2].classList.remove("active");
        progressTextpensiones[currentpensiones - 2].classList.remove("active");
        currentpensiones -= 2;
        bulletpensiones[currentpensiones - 1].classList.remove("active");
        progressCheckpensiones[currentpensiones - 1].classList.remove("active");
        progressTextpensiones[currentpensiones - 1].classList.remove("active");
    } else {
        bulletpensiones[currentpensiones - 2].classList.remove("active");
        progressCheckpensiones[currentpensiones - 2].classList.remove("active");
        progressTextpensiones[currentpensiones - 2].classList.remove("active");
        currentpensiones -= 1;
    }
});


formSubmitpensiones.addEventListener("submit", (e) => {
    e.preventDefault();
    bulletpensiones[currentpensiones - 1].classList.add("active");
    progressCheckpensiones[currentpensiones - 1].classList.add("active");
    progressTextpensiones[currentpensiones - 1].classList.add("active");
    currentpensiones += 1;

    let formData = new FormData(formSubmitpensiones);
    let param = true;
    formData.append("param", param);

    ajax({
        url: `./cedulas/crear/cedulapensiones`,
        method: 'POST',
        done: setTimeout(() => { location.reload(); }, 200),
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/cedulas/listar",
    });

});

//#endregion

//#region Llenado del DropDownList interactivo

let ingresocedulapensiones = document.getElementById('ingresoscedulapensionescrear');
let tipoingreso = document.getElementById('tipoingresopensionescrear');
let divtipoingreso = document.getElementById('divtipoingreso');

ingresocedulapensiones.addEventListener('change', (e) => {

    e.preventDefault();

    nextBtnFirstpensiones.classList.add('isdisabled');

    if (ingresocedulapensiones.value.toLowerCase() === "ingresobruto") {

        tipoingreso.innerHTML = `
        <option selected="true" disabled="disabled" class="noselected">Seleccione el tipo renta</option>
        <option value="tipoingresopensiones">Tipo de ingresos de pensiones</option>`;
        tipoingreso.removeAttribute('disabled');
        divtipoingreso.classList.remove('scond');
        
    } else if (ingresocedulapensiones.value.toLowerCase() === "ingresonoconstitutivo") {

        tipoingreso.innerHTML = `
        <option selected="true" disabled="disabled" class="noselected">Seleccione el tipo renta</option>
        <option value="tipoaporteobligatorio">Tipo de aporte obligatorio</option>`;
        tipoingreso.removeAttribute('disabled', 'disabled');
        divtipoingreso.classList.remove('scond');
        
    } else {

        divtipoingreso.classList.add('scond');
        tipoingreso.setAttribute('disabled');
        tipoingreso.innerHTML = `
        <option selected="true" disabled="disabled" class="noselected">Seleccione el tipo renta</option>`;

    }
    
});

tipoingreso.addEventListener('change', () => {

    nextBtnFirstpensiones.classList.remove('isdisabled');

});

//#endregion

//#region Crear el modal editar

function editarcedulapensiones(e, id) {

    let modaleditar = document.getElementById('modal-editar-pensiones');

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

    modaleditar.style.opacity = 1;
    modaleditar.style.visibility = "visible";
    modaleditar.children[0].classList.remove("modal-close");

    e.preventDefault();

    let etiqueta = id.trim().split('-');
    let tiporenta = quitarAcentos(etiqueta[3].replace(" ",'').toLowerCase().replace(" ",''));
    let renta = quitarAcentos(etiqueta[2].replace(" ",'').toLowerCase().replace(" ",''));
    id = etiqueta[1];
    let formData = new FormData();
    let param = true;
    formData.append("param", param);

    ajax({
        url: `./cedulas/editar/cedulapensiones/${renta}/${tiporenta}/pensiones/${id}`,
        method: 'POST',
        done: inicializareditarpensiones,
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/cedulas/listar",
    });

}

//#endregion

//#region Inicializar Editar

function inicializareditarpensiones(datos) {
    
    document.getElementById('idcp').value = datos[0]['id'];
    document.getElementById('rentaeditarpensiones').innerHTML = datos[0]['renta'];
    document.getElementById('tiporentaeditarpensiones').innerHTML = datos[0]['tiporenta'];
    document.getElementById('nombrecedulapensioneseditar').value = datos[0]['nombre'];
    document.getElementById('descripcioncedulapensioneseditar').value = datos[0]['descripcion'];
    document.getElementById('ayudacedulapensioneseditar').value = datos[0]['ayuda'];

}

//#endregion

//#region Editar Cedulas de pensiones

let formcedulapensioneseditar = document.getElementById("form-editar-pensiones");

formcedulapensioneseditar.addEventListener("submit", (e) => {
  e.preventDefault();
  let formData = new FormData(formcedulapensioneseditar);
  let param = true;
  formData.append("param", param);
  let renta = quitarAcentos(document.getElementById('rentaeditarpensiones').innerHTML.replace(" ",'').toLowerCase().replace(" ",''));
  let tiporenta = quitarAcentos(document.getElementById('tiporentaeditarpensiones').innerHTML.replace(" ",'').toLowerCase().replace(" ",''));
  let id = formcedulapensioneseditar["idcp"].value;
  ajax({
    url: `./cedulas/editarcedulas/cedulapensiones/${renta}/${tiporenta}/pensiones/${id}`,
    method: 'POST',
    done: setTimeout(() => { location.reload();}, 200),
    error: rendererror,
    form: formData,
    urlactual: "/dianproject/cedulas/listar",
});
});

//#endregion

//#region Acción del botón eliminar Cedula de Pensiones

function eliminarcedulapensiones(e, id) {

    let modaldeletecedulapensiones = document.getElementById("modal-delete-cedulapensiones");

    modaldeletecedulapensiones.style.opacity = 1;
    modaldeletecedulapensiones.style.visibility = "visible";
    modaldeletecedulapensiones.children[0].classList.remove("modal-close");

    //#region Cerrar modal eliminar
    modaldeletecedulapensiones.children[0].children[0].children[1].addEventListener("click", () => {
        modaldeletecedulapensiones.children[0].classList.add("modal-close");

        setTimeout(() => {
            modaldeletecedulapensiones.style.opacity = 0;
            modaldeletecedulapensiones.style.visibility = "hidden";
        }, 500);
    }
    );
    //#endregion

    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    let etiqueta = id.trim().split('-');
    let tiporenta = quitarAcentos(etiqueta[3].replace(" ",'').toLowerCase().replace(" ",''));
    let renta = quitarAcentos(etiqueta[2].replace(" ",'').toLowerCase().replace(" ",''));
    id = etiqueta[1];
    ajax({
        url: `./cedulas/editar/cedulapensiones/${renta}/${tiporenta}/pensiones/${id}`,
        method: 'POST',
        done: inicializareliminarpensiones,
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/cedulas/listar",
    });

}

//#endregion

//#region Inicializar eliminar

function inicializareliminarpensiones(datos) {
    
    document.getElementById("h2-header-cedulapensiones").innerHTML = `Eliminar la cedula general ${datos[0]["nombre"]}`;
    document.getElementById("modal-body-cedulapensiones").innerHTML = `<p>¿ Estas seguro que deseas eliminar la cedula general de la ${datos[0]["renta"]}, con tipo de renta ${datos[0]['tiporenta']} y con nombre ${datos[0]["nombre"]}?</p>`;
    document.getElementById("modal-footer-cedulapensiones").innerHTML = `<a href="#" id="si-eliminar-cedulapensiones" class="btn-modal btn-block-modal btn-delete"> Si </a> <a href="#" id="no-eliminar-cedulapensiones" class="btn-modal btn-block-modal btn-delete"> No </a>`;

    let sieliminarcedulapensiones = document.getElementById("si-eliminar-cedulapensiones");
    let noeliminarcedulapensiones = document.getElementById("no-eliminar-cedulapensiones");
    
    noeliminarcedulapensiones.addEventListener("click", (e) => {
        e.preventDefault();

        let modaldeletecedulapensiones = document.getElementById("modal-delete-cedulapensiones");

        modaldeletecedulapensiones.children[0].classList.add("modal-close");

        setTimeout(() => {
            modaldeletecedulapensiones.style.opacity = 0;
            modaldeletecedulapensiones.style.visibility = "hidden";
        }, 500);
    });

    sieliminarcedulapensiones.addEventListener("click", (e) => {
        e.preventDefault();
        let formData = new FormData();
        let param = true;
        formData.append("param", param);
        let renta = quitarAcentos(datos[0]['renta'].replace(" ",'').toLowerCase().replace(" ",''));
        let tiporenta = quitarAcentos(datos[0]['tiporenta'].replace(" ",'').toLowerCase().replace(" ",''));
        let id = datos[0]['id'];
        ajax({
            url: `./cedulas/eliminar/cedulapensiones/${renta}/${tiporenta}/pensiones/${id}`,
            method: "POST",
            done: setTimeout(() => { location.reload();}, 200),
            error: rendererror,
            form: formData,
            urlactual: "/dianproject/cedulas/listar",
        });
    }); 

}

//#endregion