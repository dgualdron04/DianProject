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
    /* setTimeout(function () {

        let formData = new FormData(formSubmit);
        let param = true;
        formData.append("param", param);
        ajax({
            url: `./parametros/crear`,
            method: "POST",
            // async: true,
            // responseType: 'json',
            done: setTimeout(() => { location.reload(); }, 200),
            error: rendererror,
            form: formData,
        });
        if (current === 3) {
            slidePage.style.display = "block";
            slidePage2.style.display = "none";
            bullet[current - 2].classList.remove("active");
            progressCheck[current - 2].classList.remove("active");
            progressText[current - 2].classList.remove("active");
            current -= 2;
            bullet[current - 1].classList.remove("active");
            progressCheck[current - 1].classList.remove("active");
            progressText[current - 1].classList.remove("active");
        }
    }, 800); */

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