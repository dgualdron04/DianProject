//#region Creación de la tabla direccion seccional y activar el botón crear

const dttdireccionseccional = new DataTable("#datatable-direccionseccional", "Tipos de Direcciones Seccionales",
    [
        {
            id: "bAdddireccionseccional",
            text: "Crear Tipo de Dirección Seccional",
            icon: "fas fa-paste",
            type: "button",
            action: function () {
                let modalcrear = document.getElementById("modal-crear-direccionseccional");

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

dttdireccionseccional.parse();

//#endregion

//#region Acción del botón crear tipo de dirección seccional

const formcreartipodireccionseccional = document.getElementById('form-crear-direccionseccional');

formcreartipodireccionseccional.addEventListener('submit', (e) => {

    e.preventDefault();

    let formData = new FormData(formcreartipodireccionseccional);
    let param = true;
    formData.append('param', param);

    ajax({
        url: `./informacionpersonal/crear/direccionseccional`,
        method: 'POST',
        done: setTimeout(() => { location.reload(); }, 200),
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/informacionpersonal/listar",
    });

});

//#endregion

//#region Acción del botón editar tipo de direccion seccional

function editartipodireccionseccional(e, id) {

    e.preventDefault();
    let modaleditar = document.getElementById("modal-editar-direccionseccional");

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

    id = id.replace("editds-", "");
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
        url: `./informacionpersonal/editar/direccionseccional/${id}`,
        method: "POST",
        done: iniciareditardireccionseccional,
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/informacionpersonal/listar",
    });

}

//#endregion

//#region Inicializar campos de Editar Tipo de dirección seccional

function iniciareditardireccionseccional(datos) {

    document.getElementById("idds").value = datos[0]["idtipodireccionseccional"]
    document.getElementById("nombretipodireccionseccional").value = datos[0]["nombre"];
    document.getElementById("descripciontipodireccionseccional").value = datos[0]["descripcion"];
    document.getElementById("ayudatipodireccionseccional").value = datos[0]["ayuda"];

}

//#endregion

//#region Submit Editar tipo de dirección seccional

let formeditartipodireccionseccional = document.getElementById('form-editar-direccionseccional');

formeditartipodireccionseccional.addEventListener('submit', (e) => {

    e.preventDefault();

    let formData = new FormData(formeditartipodireccionseccional);
    let param = true;
    formData.append("param", param);
    let id = formeditartipodireccionseccional["idds"].value;
    ajax({
        url: `./informacionpersonal/editarinformacionpersonal/direccionseccional/${id}`,
        method: "POST",
        done: setTimeout(() => { location.reload(); }, 200),
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/informacionpersonal/listar",
    });
});

//#endregion

//#region Acción del botón eliminar tipo direccion seccional

function eliminartipodireccionseccional(e, id) {

    let modaldeletedireccionseccional = document.getElementById("modal-delete-direccionseccional");

    modaldeletedireccionseccional.style.opacity = 1;
    modaldeletedireccionseccional.style.visibility = "visible";
    modaldeletedireccionseccional.children[0].classList.remove("modal-close");

    //#region Cerrar modal eliminar
    modaldeletedireccionseccional.children[0].children[0].children[1].addEventListener("click", () => {
        modaldeletedireccionseccional.children[0].classList.add("modal-close");

        setTimeout(() => {
            modaldeletedireccionseccional.style.opacity = 0;
            modaldeletedireccionseccional.style.visibility = "hidden";
        }, 500);
    }
    );
    //#endregion

    id = id.replace("deleteds-", "");
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
        url: `./informacionpersonal/editar/direccionseccional/${id}`,
        method: "POST",
        done: iniciareliminardireccionseccional,
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/informacionpersonal/listar",
    });

}

//#endregion

//#region Inicializar eliminar tipo de direccion seccional

function iniciareliminardireccionseccional(datos) {

    document.getElementById("h2-header-direccionseccional").innerHTML = `Eliminar el tipo de Direccion Seccional ${datos[0]["nombre"]}`;
    document.getElementById("modal-body-direccionseccional").innerHTML = `<p>¿ Estas seguro que deseas eliminar el tipo de Direccion Seccional ${datos[0]["nombre"]}?</p>`;
    document.getElementById("modal-footer-direccionseccional").innerHTML = `<a href="#" id="si-eliminar-direccionseccional" class="btn-modal btn-block-modal btn-delete"> Si </a> <a href="#" id="no-eliminar-direccionseccional" class="btn-modal btn-block-modal btn-delete"> No </a>`;

    let sieliminardireccionseccional = document.getElementById("si-eliminar-direccionseccional");
    let noeliminardireccionseccional = document.getElementById("no-eliminar-direccionseccional");

    noeliminardireccionseccional.addEventListener("click", (e) => {
        e.preventDefault();

        let modaldeletedireccionseccional = document.getElementById("modal-delete-direccionseccional");

        modaldeletedireccionseccional.children[0].classList.add("modal-close");

        setTimeout(() => {
            modaldeletedireccionseccional.style.opacity = 0;
            modaldeletedireccionseccional.style.visibility = "hidden";
        }, 500);
    });

    sieliminardireccionseccional.addEventListener("click", (e) => {
        e.preventDefault();
        let formData = new FormData();
        let param = true;
        formData.append("param", param);
        ajax({
            url: `./informacionpersonal/eliminar/direccionseccional/${datos[0]["idtipodireccionseccional"]}`,
            method: "POST",
            done: setTimeout(() => { location.reload(); }, 200),
            error: rendererror,
            form: formData,
            urlactual: "/dianproject/informacionpersonal/listar",
        });
    });

}

//#endregion