//#region Creación de la tabla declarante
const dtinformacionpersonal = new DataTable('#datatable-informacionpersonal', 'información personal', [
    {
        id: 'bAdd',
        text: 'Crear Información personal',
        icon: 'fas fa-paste',
        type: 'button',
        action: function () {
            let modalcrear = document.getElementById("modal-crear-informacionpersonal");

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

dtinformacionpersonal.parse();
  //#endregion

//#region Insertar Tipos de Información Personal

let tipoinformacionpersonal = document.getElementById('tipoinformacionpersonalcrear');

tipoinformacionpersonal.addEventListener('change', () => {

    let formData = new FormData();
    let param = true;
    formData.append("param", param);

    let tipoinfo = tipoinformacionpersonal.value;

    if (tipoinfo === "actividadeconomica") {
        document.getElementById('spantipoactividadeconomicacrear').innerHTML = "Actividad Economica";
        ajax({
            url: `./declaracion/traertipo/informacionpersonal/${tipoinfo}`,
            method: 'POST',
            done: llenartipoinformacionpersonal,
            error: rendererror,
            form: formData,
            urlactual: location.href,
        });
    } else if (tipoinfo === "direccionseccional"){
        document.getElementById('spantipoactividadeconomicacrear').innerHTML = "Dirección Seccional";
        ajax({
            url: `./declaracion/traertipo/informacionpersonal/${tipoinfo}`,
            method: 'POST',
            done: llenartipoinformacionpersonal,
            error: rendererror,
            form: formData,
            urlactual: location.href,
        });

    }

});

//#endregion

//#region Llenar DropDownList de Información Personal

function llenartipoinformacionpersonal(datos){
    
    let creartiposif = document.getElementById('tipo1informacionpersonalcrear');
    let divtipoinformacionpersonalcrear = document.getElementById('divtipoinformacionpersonalcrear');
    let id;
    let tipo;
    
    datos[0]['idtipodireccionseccional'] ?  tipo = "Dirección Seccional" : tipo = "Actividad Economica";

    creartiposif.innerHTML = `
    <option selected="true" disabled="disabled" class="noselected">Seleccione el tipo de ${tipo}</option>`;
    datos.forEach(tipos => {
        tipos['idtipodireccionseccional'] ? id = tipos['idtipodireccionseccional'] : id = tipos['idtipoactividad'];
        creartiposif.innerHTML += `<option value="${id}">${tipos['nombre']}</option>`;
    });

    divtipoinformacionpersonalcrear.classList.remove('scond');
    creartiposif.removeAttribute('disabled');

}

//#endregion

//#region Crear Información Personal

    let formcrearinformacionpersonal = document.getElementById('form-crear-informacionpersonal');

    formcrearinformacionpersonal.addEventListener('submit', (e) => {
        e.preventDefault();

        let formData = new FormData(formcrearinformacionpersonal);
        let param = true;
        formData.append("param", param);
        let claseif = formcrearinformacionpersonal['tipoinformacionpersonalcrear'].value;
        let id = formcrearinformacionpersonal['tipo1informacionpersonalcrear'].value;
        ajax({
            url: `./declaracion/creardeclaracion/informacionpersonal/${claseif}/${id}`,
            method: 'POST',
            done: setTimeout(() => {location.reload();}, 200),
            error: rendererror,
            form: formData,
            urlactual: location.href,
        });

    });

//#endregion

//#region Acción del botón editar informacion personal

function editarinformacionpersonal(e, id) {
    e.preventDefault();
    let modaleditar = document.getElementById("modal-editar-informacionpersonal");

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
    document.getElementById('tipo-editar-informacionpersonal').innerHTML = etiqueta[2];
    document.getElementById('spantipoactividadeconomicaeditar').innerHTML = etiqueta[2];
    let clase = quitaracentosfun(etiqueta[2].replace(" ",'').toLowerCase().replace(" ",''));
    id = etiqueta[1];
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
        url: `./declaracion/traertipo/informacionpersonal/${clase}`,
        method: "POST",
        done: inicializartipos,
        error: rendererror,
        form: formData,
        urlactual: location.href,
    });
    ajax({
        url: `./declaracion/editardecla/informacionpersonal/${clase}/${id}`,
        method: "POST",
        done: inicializareditar,
        error: rendererror,
        form: formData,
        urlactual: location.href,
    });
}
//#endregion

//#region Inicialziar tipos

function inicializartipos(datos) {
    
    let editartiposif = document.getElementById('tipo1informacionpersonaleditar');
    let id;
    let tipo;
    
    datos[0]['idtipodireccionseccional'] ?  tipo = "Dirección Seccional" : tipo = "Actividad Economica";

    editartiposif.innerHTML = `
    <option selected="true" disabled="disabled" class="noselected">Seleccione el tipo de ${tipo}</option>`;
    datos.forEach(tipos => {
        tipos['idtipodireccionseccional'] ? id = tipos['idtipodireccionseccional'] : id = tipos['idtipoactividad'];
        editartiposif.innerHTML += `<option value="${id}">${tipos['nombre']}</option>`;
    });

}

//#endregion

//#region Inicializar editar

function inicializareditar(datos) {
    
    tipo1informacionpersonaleditar.value = datos[0]['tipo'];
    document.getElementById('idip').value = datos[0]['id'];

}

//#endregion

//#region Editar

let formeditarinformacionpersonal = document.getElementById('form-editar-informacionpersonal');

formeditarinformacionpersonal.addEventListener('submit', (e) => {

    e.preventDefault();

    let formData = new FormData(formeditarinformacionpersonal);
    let param = true;
    formData.append("param", param);
    let clase = quitaracentosfun(document.getElementById('spantipoactividadeconomicaeditar').innerHTML.replace(" ",'').toLowerCase().replace(" ",'').toLowerCase());
    let id = formeditarinformacionpersonal['idip'].value;
    console.log(formeditarinformacionpersonal['tipo1informacionpersonaleditar']);
    ajax({
        url: `./declaracion/editardeclaracion/informacionpersonal/${clase}/${id}`,
        method: "POST",
        done: setTimeout(() => {location.reload();}, 200),
        error: rendererror,
        form: formData,
        urlactual: location.href,
    });

});

//#endregion

//#region Modal Eliminar

function eliminarinformacionpersonal(e, id) {
    
    e.preventDefault();

    let modaldelete = document.getElementById("modal-delete-informacionpersonal");

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
    document.getElementById('tipo-editar-informacionpersonal').innerHTML = etiqueta[2];
    document.getElementById('spantipoactividadeconomicaeditar').innerHTML = etiqueta[2];
    let tipo = etiqueta[3];
    
    document.getElementById("h2-header-informacionpersonal").innerHTML = `Eliminar la Información Personal ${etiqueta[2]}`;
    document.getElementById("modal-body-informacionpersonal").innerHTML = `<p>¿ Estas seguro que deseas eliminar la Información Personal de la clase ${etiqueta[2]} con el tipo ${tipo}?</p>`;
    let clase = quitaracentosfun(etiqueta[2].replace(" ",'').toLowerCase().replace(" ",''));
    document.getElementById('claseeliminarinformacionpersonal').value = clase;
    id = etiqueta[1];
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
        url: `./declaracion/editardecla/informacionpersonal/${clase}/${id}`,
        method: "POST",
        done: inicializareliminar,
        error: rendererror,
        form: formData,
        urlactual: location.href,
    });
    //#endregion


}

//#endregion


function inicializareliminar(datos) {
    
    console.log(datos);
    document.getElementById("modal-footer-informacionpersonal").innerHTML = `<a href="#" id="si-eliminar-informacionpersonal" class="btn-modal btn-block-modal btn-delete"> Si </a> <a href="#" id="no-eliminar-informacionpersonal" class="btn-modal btn-block-modal btn-delete"> No </a>`;

    let sieliminarinformacionpersonal = document.getElementById("si-eliminar-informacionpersonal");
    let noeliminarinformacionpersonal = document.getElementById("no-eliminar-informacionpersonal");

    noeliminarinformacionpersonal.addEventListener("click", (e) => {
        e.preventDefault();

        let modaldelete = document.getElementById("modal-delete-informacionpersonal");

        modaldelete.children[0].classList.add("modal-close");

        setTimeout(() => {
            modaldelete.style.opacity = 0;
            modaldelete.style.visibility = "hidden";
        }, 500);
    });

    sieliminarinformacionpersonal.addEventListener("click", (e) => {
        e.preventDefault();
        let formData = new FormData();
        let param = true;
        formData.append("param", param);
        let clase = document.getElementById('claseeliminarinformacionpersonal').value;
        ajax({
            url: `./declaracion/eliminardeclaracion/informacionpersonal/${clase}/${datos[0]["id"]}`,
            method: "POST",
            done: setTimeout(() => { location.reload(); }, 200),
            error: rendererror,
            form: formData,
            urlactual: location.href,
        });
    });

}
