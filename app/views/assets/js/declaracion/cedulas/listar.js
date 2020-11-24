//#region Creación de la tabla Cedulas
const dtcedulas = new DataTable('#datatable-cedulas', 'Cedulas', [
    {
        id: 'bAddcedulas',
        text: 'Crear Cedulas',
        icon: 'fas fa-paste',
        type: 'button',
        action: function () {
            let modalcrear = document.getElementById("modal-crear-cedulas");

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

dtcedulas.parse();
//#endregion

//#region Dentro del modal crear cedulas

const nextBtnFirstcedulas = document.querySelector(".firstNextcedulas");
const prevBtnFirstcedulas = document.querySelector(".firstPrevcedulas");
const slidePagecedulas = document.querySelector(".slide-page-crear-cedulas");
const slidePage2cedulas = document.querySelector(".slide-page-crear-2-cedulas");
let currentcedulas = 1;
slidePage2cedulas.style.display = "none";

nextBtnFirstcedulas.addEventListener("click", function (event) {
    event.preventDefault();
    slidePagecedulas.style.display = "none";
    slidePage2cedulas.style.display = "block";
    currentcedulas += 1;
});

prevBtnFirstcedulas.addEventListener("click", function (event) {
    event.preventDefault();
    slidePagecedulas.style.display = "block";
    slidePage2cedulas.style.display = "none";
});


//#endregion

//#region Llenar tipo cedula

let cedulacrear = document.getElementById('rentacedulascrear');

cedulacrear.addEventListener('change', (e) => {

    e.preventDefault();
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    let tipocedulacrear = document.getElementById('tipocedulacrear');

    if (cedulacrear.value == "cedulageneral") {

        tipocedulacrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el tipo de Cedula</option>
        <option value="rentatrabajo">Renta de trabajo</option>
        <option value="rentacapital">Renta de capital</option>
        <option value="rentanolaboral">Renta no laboral</option>`;
        
    } else if (cedulacrear.value == "cedulapensiones") {

        tipocedulacrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el tipo de Cedula</option>
        <option value="ingresobruto">Ingreso Bruto</option>
        <option value="ingresonoconse">Ingreso no consecutivo</option>
        <option value="rentaexenta">Renta exenta</option>`;
        
    } else if (cedulacrear.value == "ceduladividendosyparticipaciones") {

        tipocedulacrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el tipo de Cedula</option>
        <option value="ingresobruto">Dividendos y participaciones 2016</option>
        <option value="ingresonoconse">Subcedula 1a</option>
        <option value="rentaexenta">Renta liquida ECE</option>`;
        
    }

    tipocedulacrear.removeAttribute('disabled');

});

//#endregion

//#region Traer tipo de renta

    

//#endregion
