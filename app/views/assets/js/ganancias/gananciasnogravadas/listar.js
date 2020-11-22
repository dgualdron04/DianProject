//#region Creación de la tabla tipo gananciasnogravadas y activar el botón crear

const dtgananciasnogravadas = new DataTable("#datatable-gananciasnogravadas", "Tipos de Ganancias no Gravadas",
    [
        {
            id: "bAddgananciasnogravadas",
            text: "Crear Gananacias no Gravadas",
            icon: "fas fa-paste",
            type: "button",
            action: function () {
                let modalcrear = document.getElementById("modal-crear-gananciasnogravadas");

                modalcrear.style.opacity = 1;
                modalcrear.style.visibility = "visible";
                modalcrear.children[0].classList.remove("modal-close");

                //#region Cerrar modal crear tipo gananciasnogravadas
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

dtgananciasnogravadas.parse();

//#endregion

//#region Acción del botón crear tipo de gananciasnogravadas

const formcreargananciasnogravadas = document.getElementById('form-crear-gananciasnogravadas');

formcreargananciasnogravadas.addEventListener('submit', (e) => {

    e.preventDefault();

    let formData = new FormData(formcreargananciasnogravadas);
    let param = true;
    formData.append('param', param);

    ajax({
        url: `./ganancias/crear/nogravadas`,
        method: 'POST',
        done: setTimeout(() => { location.reload(); }, 200),
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/ganancias/listar",
    });

});

//#endregion

//#region Acción del botón editar tipo de ganancias no gravada

function editargananciasnogravadas(e, id) {

    e.preventDefault();
    let modaleditar = document.getElementById("modal-editar-gananciasnogravadas");

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

    id = id.replace("editgng-", "");
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
        url: `./ganancias/editar/nogravadas/${id}`,
        method: "POST",
        done: iniciargananciasnogravadas,
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/ganancias/listar",
    });

}

//#endregion

//#region Inicializar campos de Editar Tipo de ganancias no gravada

function iniciargananciasnogravadas(datos) {

    document.getElementById("idtgng").value = datos[0]["idtipogananciasnogravadas"]
    document.getElementById("nombregananciasnogravadaseditar").value = datos[0]["nombre"];
    document.getElementById("descripciongananciasnogravadaseditar").value = datos[0]["descripcion"];
    document.getElementById("ayudagananciasnogravadaseditar").value = datos[0]["ayuda"];

}

//#endregion

//#region Submit Editar tipo de de ganancias no gravada

let formeditartipogananciasnogravadas = document.getElementById('form-editar-gananciasnogravadas');

formeditartipogananciasnogravadas.addEventListener('submit', (e) => {

    e.preventDefault();

    let formData = new FormData(formeditartipogananciasnogravadas);
    let param = true;
    formData.append("param", param);
    let id = formeditartipogananciasnogravadas["idtgng"].value;
    ajax({
        url: `./ganancias/editarganancias/nogravadas/${id}`,
        method: "POST",
        done: setTimeout(() => { location.reload(); }, 200),
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/ganancias/listar",
    });
});

//#endregion

//#region Acción del botón eliminar tipo de ganancia no gravada

function eliminargananciasnogravadas(e, id) {

    let modaldelete = document.getElementById("modal-delete-gananciasnogravadas");

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

    id = id.replace("deletegng-", "");
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
        url: `./ganancias/editar/nogravadas/${id}`,
        method: "POST",
        done: iniciareleminarnogravadas,
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/ganancias/listar",
    });

}

//#endregion

//#region Inicializar eliminar tipo de bienes

function iniciareleminarnogravadas(datos) {
    document.getElementById("h2-header-gananciasnogravadas").innerHTML = `Eliminar el tipo de ganancia no gravada ${datos[0]['nombre']}`;
    document.getElementById("modal-body-gananciasnogravadas").innerHTML = `<p>¿ Estas seguro que deseas eliminar el tipo de Ganancia no Gravada ${datos[0]['nombre']}?</p>`;
    document.getElementById("modal-footer-gananciasnogravadas").innerHTML = `<a href="#" id="si-eliminar-gananciasnogravadas" class="btn-modal btn-block-modal btn-delete"> Si </a> <a href="#" id="no-eliminar-gananciasnogravadas" class="btn-modal btn-block-modal btn-delete"> No </a>`;

    let sieliminargananciasnogravadas = document.getElementById("si-eliminar-gananciasnogravadas");
    let noeliminargananciasnogravadas = document.getElementById("no-eliminar-gananciasnogravadas");

    noeliminargananciasnogravadas.addEventListener("click", (e) => {
        e.preventDefault();

        let modaldelete = document.getElementById("modal-delete-gananciasnogravadas");

        modaldelete.children[0].classList.add("modal-close");

        setTimeout(() => {
            modaldelete.style.opacity = 0;
            modaldelete.style.visibility = "hidden";
        }, 500);
    });

    sieliminargananciasnogravadas.addEventListener("click", (e) => {
        e.preventDefault();
        let formData = new FormData();
        let param = true;
        formData.append("param", param);
        ajax({
            url: `./ganancias/eliminar/nogravadas/${datos[0]["idtipogananciasnogravadas"]}`,
            method: "POST",
            done: setTimeout(() => { location.reload(); }, 200),
            error: rendererror,
            form: formData,
            urlactual: "/dianproject/ganancias/listar",
        });
    });

}

//#endregion
