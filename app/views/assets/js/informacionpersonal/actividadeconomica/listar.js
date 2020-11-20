//#region Creación de la tabla direccion seccional y activar el botón crear

const dttactividadeconomica = new DataTable("#datatable-actividadeconomico", "Tipos de Actividades Economicas",
    [
        {
            id: "bAddactividadeconomica",
            text: "Crear Tipo de Actividades Economicas",
            icon: "fas fa-paste",
            type: "button",
            action: function () {
                let modalcrear = document.getElementById("modal-crear-actividadeconomica");

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

dttactividadeconomica.parse();

//#endregion

//#region Acción del botón crear tipo de actividad economica

const formcreartipoactividadeconomica = document.getElementById('form-crear-actividadeconomica');

formcreartipoactividadeconomica.addEventListener('submit', (e) => {

    e.preventDefault();

    let formData = new FormData(formcreartipoactividadeconomica);
    let param = true;
    formData.append('param', param);

    ajax({
        url: `./informacionpersonal/crear/actividadeconomica`,
        method: 'POST',
        done: setTimeout(() => { location.reload(); }, 200),
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/informacionpersonal/listar",
    });

});

//#endregion

//#region Acción del botón editar tipo de actividad economica

function editartipoactividadeconomica(e, id) {

    e.preventDefault();
    let modaleditar = document.getElementById("modal-editar-actividadeconomica");

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

    id = id.replace("editac-", "");
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
        url: `./informacionpersonal/editar/actividadeconomica/${id}`,
        method: "POST",
        done: iniciareditaractividadeconomica,
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/informacionpersonal/listar",
    });

}

//#endregion

//#region Inicializar campos de Editar Tipo de actividad economica

function iniciareditaractividadeconomica(datos) {

    document.getElementById("idtae").value = datos[0]["idtipoactividad"]
    document.getElementById("nombretipoactividadeconomica").value = datos[0]["nombre"];
    document.getElementById("descripciontipoactividadeconomica").value = datos[0]["descripcion"];
    document.getElementById("ayudatipoactividadeconomica").value = datos[0]["ayuda"];

}

//#endregion

//#region Submit Editar tipo de actividad economica

let formeditartipoactividadeconomica = document.getElementById('form-editar-actividadeconomica');

formeditartipoactividadeconomica.addEventListener('submit', (e) => {

    e.preventDefault();

    let formData = new FormData(formeditartipoactividadeconomica);
    let param = true;
    formData.append("param", param);
    let id = formeditartipoactividadeconomica["idtae"].value;
    ajax({
        url: `./informacionpersonal/editarinformacionpersonal/actividadeconomica/${id}`,
        method: "POST",
        done: setTimeout(() => { location.reload(); }, 200),
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/informacionpersonal/listar",
    });
});

//#endregion

//#region Acción del botón eliminar tipo direccion seccional

function eliminartipoactividadeconomica(e, id) {

    let modaldeleteactividadeconomica = document.getElementById("modal-delete-actividadeconomica");

    modaldeleteactividadeconomica.style.opacity = 1;
    modaldeleteactividadeconomica.style.visibility = "visible";
    modaldeleteactividadeconomica.children[0].classList.remove("modal-close");

    //#region Cerrar modal eliminar
    modaldeleteactividadeconomica.children[0].children[0].children[1].addEventListener("click", () => {
        modaldeleteactividadeconomica.children[0].classList.add("modal-close");

        setTimeout(() => {
            modaldeleteactividadeconomica.style.opacity = 0;
            modaldeleteactividadeconomica.style.visibility = "hidden";
        }, 500);
    }
    );
    //#endregion

    id = id.replace("deleteac-", "");
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
        url: `./informacionpersonal/editar/actividadeconomica/${id}`,
        method: "POST",
        done: iniciareliminaractividadeconomica,
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/informacionpersonal/listar",
    });

}

//#endregion

//#region Inicializar eliminar tipo de actividad economica

function iniciareliminaractividadeconomica(datos) {

    document.getElementById("h2-header-actividadeconomica").innerHTML = `Eliminar el tipo de Direccion Seccional ${datos[0]["nombre"]}`;
    document.getElementById("modal-body-actividadeconomica").innerHTML = `<p>¿ Estas seguro que deseas eliminar el tipo de Direccion Seccional ${datos[0]["nombre"]}?</p>`;
    document.getElementById("modal-footer-actividadeconomica").innerHTML = `<a href="#" id="si-eliminar-actividadeconomica" class="btn-modal btn-block-modal btn-delete"> Si </a> <a href="#" id="no-eliminar-actividadeconomica" class="btn-modal btn-block-modal btn-delete"> No </a>`;

    let sieliminaractividadeconomica = document.getElementById("si-eliminar-actividadeconomica");
    let noeliminaractividadeconomica = document.getElementById("no-eliminar-actividadeconomica");

    noeliminaractividadeconomica.addEventListener("click", (e) => {
        e.preventDefault();

        let modaldeleteactividadeconomica = document.getElementById("modal-delete-actividadeconomica");

        modaldeleteactividadeconomica.children[0].classList.add("modal-close");

        setTimeout(() => {
            modaldeleteactividadeconomica.style.opacity = 0;
            modaldeleteactividadeconomica.style.visibility = "hidden";
        }, 500);
    });

    sieliminaractividadeconomica.addEventListener("click", (e) => {
        e.preventDefault();
        let formData = new FormData();
        let param = true;
        formData.append("param", param);
        ajax({
            url: `./informacionpersonal/eliminar/actividadeconomica/${datos[0]["idtipoactividad"]}`,
            method: "POST",
            done: setTimeout(() => { location.reload(); }, 200),
            error: rendererror,
            form: formData,
            urlactual: "/dianproject/informacionpersonal/listar",
        });
    });

}

//#endregion