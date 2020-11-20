//#region Creación de la tabla tipo bienes y activar el botón crear

const dtcedulageneral = new DataTable("#datatable-cedulageneral", "Tipos de Cedulas Generales",
    [
        {
            id: "bAddcedulageneral",
            text: "Crear Tipo de Cedula General",
            icon: "fas fa-paste",
            type: "button",
            action: function () {
                let modalcrear = document.getElementById("modal-crear-cedulageneral");

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

dtcedulageneral.parse();

//#endregion

//#region Dentro del modal crear cedula general

const nextBtnFirst = document.querySelector(".firstNextgeneral");
const prevBtnFirst = document.querySelector(".firstPrevgeneral");
const progressText = document.querySelectorAll(".step .stepcreargeneral");
const progressCheck = document.querySelectorAll(".step .checkcreargeneral");
const bullet = document.querySelectorAll(".step .bulletcreargeneral");
const slidePage = document.querySelector(".slide-page-crear-general");
const slidePage2 = document.querySelector(".slide-page-crear-2-general");
const formSubmit = document.getElementById('form-crear-cedulageneral');
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

//#region Llenado del DropDownList interactivo

let rentacedulageneral = document.getElementById('rentacedulageneralcrear');
let tiporenta = document.getElementById('tiporentacedulageneralcrear');
let divaspectocedulageneral = document.getElementById('divaspectocedulageneral');
let aspectocedulageneral = document.getElementById('aspectoscedulageneralcrear');

rentacedulageneral.addEventListener('change', (e) => {

    e.preventDefault();

    nextBtnFirst.classList.add('isdisabled');
    divaspectocedulageneral.classList.add('scond');
    aspectocedulageneral.setAttribute('disabled', 'disabled');
    aspectocedulageneral.innerHTML = `
            <option selected="true" disabled="disabled" class="noselected">Seleccione el aspecto</option>`;

    if (rentacedulageneral.value.toLowerCase() === "rentatrabajo") {

        tiporenta.innerHTML = `
        <option selected="true" disabled="disabled" class="noselected">Seleccione el tipo renta</option>
        <option value="ingresobruto">Ingreso bruto</option>
        <option value="ingresosnoconstitutivos">Ingresos no constitutivos</option>
        <option value="deducciones">Deducciones</option>
        <option value="rentaexenta">Renta exenta</option>`;

    } else if (rentacedulageneral.value.toLowerCase() === "rentacapital") {

        tiporenta.innerHTML = `
        <option selected="true" disabled="disabled" class="noselected">Seleccione el tipo renta</option>
        <option value="ingresobruto">Ingreso bruto</option>
        <option value="ingresosnoconstitutivos">Ingresos no constitutivos</option>
        <option value="costosydeducciones">Costos y deducciones procedentes</option>
        <option value="rentaexentadeduccion">Renta exenta deducción</option>`;

    } else if (rentacedulageneral.value.toLowerCase() === "rentanolaborales") {

        tiporenta.innerHTML = `
        <option selected="true" disabled="disabled" class="noselected">Seleccione el tipo renta</option>
        <option value="ingresobruto">Ingreso bruto</option>
        <option value="ingresosnoconstitutivos">Ingresos no constitutivos</option>
        <option value="costesdeduccionesprocedentes">Costos y deducciones procedentes</option>
        <option value="rentaexentadeduccion">Renta exenta deducción</option>`;

    } else {

        tiporenta.innerHTML = `
        <option selected="true" disabled="disabled" class="noselected">Seleccione el tipo renta</option>`;

    }

    tiporenta.removeAttribute('disabled');
});

tiporenta.addEventListener('change', () => {

    if (rentacedulageneral.value.toLowerCase() === "rentatrabajo") {

        if (tiporenta.value.toLowerCase() === "ingresobruto") {

            aspectocedulageneral.innerHTML = `
            <option selected="true" disabled="disabled" class="noselected">Seleccione el aspecto</option>
            <option value="tipoprestacion">Tipo prestación</option>`;

        } else if (tiporenta.value.toLowerCase() === "ingresosnoconstitutivos") {

            aspectocedulageneral.innerHTML = `
            <option selected="true" disabled="disabled" class="noselected">Seleccione el aspecto</option>
            <option value="tipoaporteobligatorio">Tipo aporte obligatorio</option>
            <option value="tipoaportevoluntario">Tipo aporte voluntario</option>
            <option value="tipopagoalimentacion">Tipo pago de alimentación</option>`;

        } else if (tiporenta.value.toLowerCase() === "deducciones") {

            aspectocedulageneral.innerHTML = `
            <option selected="true" disabled="disabled" class="noselected">Seleccione el aspecto</option>
            <option value="tipodeduccion">Tipo de deducción</option>`;

        } else if (tiporenta.value.toLowerCase() === "rentaexenta") {

            aspectocedulageneral.innerHTML = `
            <option selected="true" disabled="disabled" class="noselected">Seleccione el aspecto</option>
            <option value="tipoindemnizacion">Tipo de indemnización</option>
            <option value="tipoprima">Tipo de prima</option>`;

        }
        divaspectocedulageneral.classList.remove('scond');
        aspectocedulageneral.removeAttribute('disabled');

    } else if (rentacedulageneral.value.toLowerCase() === "rentacapital") {

        if (tiporenta.value.toLowerCase() === "ingresobruto") {

            aspectocedulageneral.innerHTML = `
            <option selected="true" disabled="disabled" class="noselected">Seleccione el aspecto</option>
            <option value="tipointeresesrendimientos">Tipo intereses de rendimientos</option>
            <option value="tipootrosingresos">Tipo otros ingresos</option>`;

        } else if (tiporenta.value.toLowerCase() === "ingresosnoconstitutivos") {

            aspectocedulageneral.innerHTML = `
            <option selected="true" disabled="disabled" class="noselected">Seleccione el aspecto</option>
            <option value="tipoaporteobligatorio">Tipo aporte obligatorio</option>
            <option value="tipoaportevoluntario">Tipo aporte voluntario</option>`;

        } else if (tiporenta.value.toLowerCase() === "costosydeducciones") {

            aspectocedulageneral.innerHTML = `
            <option selected="true" disabled="disabled" class="noselected">Seleccione el aspecto</option>
            <option value="tipocostosgastos">Tipo de otros costos de gastos</option>`;

        } else if (tiporenta.value.toLowerCase() === "rentaexentadeduccion") {

            aspectocedulageneral.innerHTML = `
            <option selected="true" disabled="disabled" class="noselected">Seleccione el aspecto</option>
            <option value="tiporentaexentadeduccion">Tipo de renta exenta deducción</option>`;

        }

        divaspectocedulageneral.classList.remove('scond');
        aspectocedulageneral.removeAttribute('disabled');
        nextBtnFirst.classList.add('isdisabled');

    } else if (rentacedulageneral.value.toLowerCase() === "rentanolaborales") {

        if (tiporenta.value.toLowerCase() === "ingresobruto") {

            aspectocedulageneral.innerHTML = `
            <option selected="true" disabled="disabled" class="noselected">Seleccione el aspecto</option>
            <option value="tipovalorbruto">Tipo valor bruto de ventas</option>`;

        } else if (tiporenta.value.toLowerCase() === "ingresosnoconstitutivos") {

            aspectocedulageneral.innerHTML = `
            <option selected="true" disabled="disabled" class="noselected">Seleccione el aspecto</option>
            <option value="tipoaporteobligatorio">Tipo de porte obligatorio</option>`;

        } else if (tiporenta.value.toLowerCase() === "costesdeduccionesprocedentes") {

            aspectocedulageneral.innerHTML = `
            <option selected="true" disabled="disabled" class="noselected">Seleccione el aspecto</option>
            <option value="tipootroscostosgastos">Tipo otros costos de gastos</option>`;

        } else if (tiporenta.value.toLowerCase() === "rentaexentadeduccion") {

            aspectocedulageneral.innerHTML = `
            <option selected="true" disabled="disabled" class="noselected">Seleccione el aspecto</option>
            <option value="tiporentaexentadeduccion">Tipo de renta exenta deducción</option>`;

        }

        divaspectocedulageneral.classList.remove('scond');
        aspectocedulageneral.removeAttribute('disabled');
        nextBtnFirst.classList.add('isdisabled');

    }

});

aspectocedulageneral.addEventListener('change', () => {

    nextBtnFirst.classList.remove('isdisabled');

});

//#endregion

//#region Crear una cedula general

formSubmit.addEventListener("submit", (e) => {
    e.preventDefault();
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;


    let formData = new FormData(formSubmit);
    let param = true;
    formData.append("param", param);

    ajax({
        url: `./cedulas/crear/cedulageneral`,
        method: 'POST',
        done: setTimeout(() => { location.reload(); }, 200),
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/cedulas/listar",
    });
});

//#endregion

//#region Crear el modal editar

function editarcedulageneral(e, id) {

    let modaleditar = document.getElementById('modal-editar-cedulageneral');

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
    let aspecto = quitarAcentos(etiqueta[4].replace(" ",'').toLowerCase().replace(" ",''));
    let tiporenta = quitarAcentos(etiqueta[3].replace(" ",'').toLowerCase().replace(" ",''));
    let renta = quitarAcentos(etiqueta[2].replace(" ",'').toLowerCase().replace(" ",''));
    id = etiqueta[1];
    let formData = new FormData();
    let param = true;
    formData.append("param", param);

    ajax({
        url: `./cedulas/editar/cedulageneral/${renta}/${tiporenta}/${aspecto}/${id}`,
        method: 'POST',
        done: inicializareditar,
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/cedulas/listar",
    });

}

//#endregion

//#region Inicializar editar

function inicializareditar(datos){  

    document.getElementById('idcg').value = datos[0]['id'];
    document.getElementById('rentaeditargeneral').innerHTML = datos[0]['renta'];
    document.getElementById('tiporentaeditargeneral').innerHTML = datos[0]['tiporenta'];
    document.getElementById('aspectoeditargeneral').innerHTML = datos[0]['aspecto'];
    document.getElementById('nombrecedulageneraleditar').value = datos[0]['nombre'];
    document.getElementById('descripcioncedulageneraleditar').value = datos[0]['descripcion'];
    document.getElementById('ayudacedulageneraleditar').value = datos[0]['ayuda'];
    
}

//#endregion

//#region Editar Cedulas generales

let formcedulageneraleditar = document.getElementById("form-editar-cedulageneral");

formcedulageneraleditar.addEventListener("submit", (e) => {
  e.preventDefault();
  let formData = new FormData(formcedulageneraleditar);
  let param = true;
  formData.append("param", param);
  let renta = quitarAcentos(document.getElementById('rentaeditargeneral').innerHTML.replace(" ",'').toLowerCase().replace(" ",''));
  let tiporenta = quitarAcentos(document.getElementById('tiporentaeditargeneral').innerHTML.replace(" ",'').toLowerCase().replace(" ",''));
  let aspecto = quitarAcentos(document.getElementById('aspectoeditargeneral').innerHTML.replace(" ",'').toLowerCase().replace(" ",''));
  let id = formcedulageneraleditar["idcg"].value;
  ajax({
    url: `./cedulas/editarcedulas/cedulageneral/${renta}/${tiporenta}/${aspecto}/${id}`,
    method: 'POST',
    done: setTimeout(() => { location.reload();}, 200),
    error: rendererror,
    form: formData,
    urlactual: "/dianproject/cedulas/listar",
});
});

//#endregion

//#region Quitar Acentos

function quitarAcentos(cadena){
	const acentos = {'á':'a','é':'e','í':'i','ó':'o','ú':'u','Á':'A','É':'E','Í':'I','Ó':'O','Ú':'U'};
	return cadena.split('').map( letra => acentos[letra] || letra).join('').toString();	
}

//#endregion

//#region Acción del botón eliminar Cedula General

function eliminarcedulageneral(e, id) {

    let modaldeletecedulageneral = document.getElementById("modal-delete-cedulageneral");

    modaldeletecedulageneral.style.opacity = 1;
    modaldeletecedulageneral.style.visibility = "visible";
    modaldeletecedulageneral.children[0].classList.remove("modal-close");

    //#region Cerrar modal eliminar
    modaldeletecedulageneral.children[0].children[0].children[1].addEventListener("click", () => {
        modaldeletecedulageneral.children[0].classList.add("modal-close");

        setTimeout(() => {
            modaldeletecedulageneral.style.opacity = 0;
            modaldeletecedulageneral.style.visibility = "hidden";
        }, 500);
    }
    );
    //#endregion

    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    let etiqueta = id.trim().split('-');
    let aspecto = quitarAcentos(etiqueta[4].replace(" ",'').toLowerCase().replace(" ",''));
    let tiporenta = quitarAcentos(etiqueta[3].replace(" ",'').toLowerCase().replace(" ",''));
    let renta = quitarAcentos(etiqueta[2].replace(" ",'').toLowerCase().replace(" ",''));
    id = etiqueta[1];
    ajax({
        url: `./cedulas/editar/cedulageneral/${renta}/${tiporenta}/${aspecto}/${id}`,
        method: 'POST',
        done: inicializareliminar,
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/cedulas/listar",
    });

}

//#endregion

//#region Inicializar eliminar

function inicializareliminar(datos) {
    
    document.getElementById("h2-header-cedulageneral").innerHTML = `Eliminar la cedula general ${datos[0]["nombre"]}`;
    document.getElementById("modal-body-cedulageneral").innerHTML = `<p>¿ Estas seguro que deseas eliminar la cedula general de la ${datos[0]["renta"]}, con tipo de renta ${datos[0]['tiporenta']}, con aspecto ${datos[0]['aspecto']} y con nombre ${datos[0]["nombre"]}?</p>`;
    document.getElementById("modal-footer-cedulageneral").innerHTML = `<a href="#" id="si-eliminar-cedulageneral" class="btn-modal btn-block-modal btn-delete"> Si </a> <a href="#" id="no-eliminar-cedulageneral" class="btn-modal btn-block-modal btn-delete"> No </a>`;

    let sieliminarcedulageneral = document.getElementById("si-eliminar-cedulageneral");
    let noeliminarcedulageneral = document.getElementById("no-eliminar-cedulageneral");

    noeliminarcedulageneral.addEventListener("click", (e) => {
        e.preventDefault();

        let modaldeletecedulageneral = document.getElementById("modal-delete-cedulageneral");

        modaldeletecedulageneral.children[0].classList.add("modal-close");

        setTimeout(() => {
            modaldeletecedulageneral.style.opacity = 0;
            modaldeletecedulageneral.style.visibility = "hidden";
        }, 500);
    });

    sieliminarcedulageneral.addEventListener("click", (e) => {
        e.preventDefault();
        let formData = new FormData();
        let param = true;
        formData.append("param", param);
        let renta = quitarAcentos(datos[0]['renta'].replace(" ",'').toLowerCase().replace(" ",''));
        let tiporenta = quitarAcentos(datos[0]['tiporenta'].replace(" ",'').toLowerCase().replace(" ",''));
        let aspecto = quitarAcentos(datos[0]['aspecto'].replace(" ",'').toLowerCase().replace(" ",''));
        let id = datos[0]['id'];
        ajax({
            url: `./cedulas/eliminar/cedulageneral/${renta}/${tiporenta}/${aspecto}/${id}`,
            method: "POST",
            done: setTimeout(() => { location.reload();}, 200),
            error: rendererror,
            form: formData,
            urlactual: "/dianproject/cedulas/listar",
        });
    });

}

//#endregion