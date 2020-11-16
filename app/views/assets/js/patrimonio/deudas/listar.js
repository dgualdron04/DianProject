//#region Creación de la tabla tipo de deudas y activar el botón crear

const dttipodeudas = new DataTable("#datatable-tipodeudas", "Tipos de deudas",
    [
        {
            id: "bAddtipodeudas",
            text: "Crear Tipo de Deudas",
            icon: "fas fa-paste",
            type: "button",
            action: function () {
                let modalcrear = document.getElementById("modal-crear-tipodeudas");

                modalcrear.style.opacity = 1;
                modalcrear.style.visibility = "visible";
                modalcrear.children[0].classList.remove("modal-close");

                //#region Cerrar modal crear tipo Deudas
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

dttipodeudas.parse();

//#endregion

//#region Acción del botón crear tipo de deudas

const formcreartipodeuda = document.getElementById('form-crear-tipodeuda');

formcreartipodeuda.addEventListener('submit', (e) => {

    e.preventDefault();

    let formData = new FormData(formcreartipodeuda);
    let param = true;
    formData.append('param', param);

    ajax({
        url: `./patrimonio/crear/tipodeuda`,
        method: 'POST',
        done: setTimeout(() => {location.reload();}, 200),
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/patrimonio/listar",
    });

});

//#endregion

//#region Acción de Editar tipo de deuda

function editartipodeuda(e, id) {
    
    e.preventDefault();
    let modaleditar = document.getElementById("modal-editar-tipodeuda");

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

    id = id.replace("editd-", "");
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
        url: `./patrimonio/editar/tipodeuda/${id}`,
        method: "POST",
        done: iniciareditardeudas,
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/patrimonio/listar",
    });

}

//#endregion

//#region Inicializar campos de Editar Tipo de bien

function iniciareditardeudas(datos) {
    
    document.getElementById("idtd").value = datos[0]["idtipodeuda"]
    document.getElementById("nombretipodeudaeditar").value = datos[0]["nombre"];
    document.getElementById("descripciontipodeudaeditar").value = datos[0]["descripcion"];
    document.getElementById("ayudatipodeudaeditar").value = datos[0]["ayuda"];

}

//#endregion

//#region Submit Editar tipo de deduda

let formeditartipodeuda = document.getElementById('form-editar-tipodeuda');

formeditartipodeuda.addEventListener('submit', (e) => {

    e.preventDefault();

    let formData = new FormData(formeditartipodeuda);
    let param = true;
    formData.append("param", param);
    let id = formeditartipodeuda["idtd"].value;
    ajax({
        url: `./patrimonio/editarpatrimonio/tipodeuda/${id}`,
        method: "POST",
        done: setTimeout(() => { location.reload(); }, 200),
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/patrimonio/listar",
    });

});

//#endregion

//#region Acción del botón eliminar tipo de deuda

function eliminartipodeuda(e, id) {

    let modaldeletetipodeuda = document.getElementById("modal-delete-tipodeuda");

    modaldeletetipodeuda.style.opacity = 1;
    modaldeletetipodeuda.style.visibility = "visible";
    modaldeletetipodeuda.children[0].classList.remove("modal-close");

    //#region Cerrar modal eliminar
    modaldeletetipodeuda.children[0].children[0].children[1].addEventListener("click", () => {
        modaldeletetipodeuda.children[0].classList.add("modal-close");

            setTimeout(() => {
                modaldeletetipodeuda.style.opacity = 0;
                modaldeletetipodeuda.style.visibility = "hidden";
            }, 500);
        }
    );
    //#endregion

    id = id.replace("deleted-", "");
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
        url: `./patrimonio/editar/tipodeuda/${id}`,
        method: "POST",
        done: iniciareliminardeudas,
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/patrimonio/listar",
    });

}

//#endregion

//#region Inicializar eliminar tipo de deuda

function iniciareliminardeudas(datos) {
    
    document.getElementById("h2-header-tipodeuda").innerHTML = `Eliminar el tipo de Deuda ${datos[0]["nombre"]}`;
    document.getElementById("modal-body-tipodeuda").innerHTML = `<p>¿ Estas seguro que deseas eliminar el tipo de Deuda ${datos[0]["nombre"]}?</p>`;
    document.getElementById("modal-footer-tipodeuda").innerHTML = `<a href="#" id="si-eliminar-tipodeuda" class="btn-modal btn-block-modal btn-delete"> Si </a> <a href="#" id="no-eliminar-tipodeuda" class="btn-modal btn-block-modal btn-delete"> No </a>`;

    let sieliminartipodeuda = document.getElementById("si-eliminar-tipodeuda");
    let noeliminartipodeuda = document.getElementById("no-eliminar-tipodeuda");

    noeliminartipodeuda.addEventListener("click", (e) => {
        e.preventDefault();

        let modaldeletetipodeuda = document.getElementById("modal-delete-tipodeuda");

        modaldeletetipodeuda.children[0].classList.add("modal-close");

        setTimeout(() => {
            modaldeletetipodeuda.style.opacity = 0;
            modaldeletetipodeuda.style.visibility = "hidden";
        }, 500);
    });

    sieliminartipodeuda.addEventListener("click", (e) => {
        e.preventDefault();
        let formData = new FormData();
        let param = true;
        formData.append("param", param);
        ajax({
            url: `./patrimonio/eliminar/tipodeuda/${datos[0]["idtipodeuda"]}`,
            method: "POST",
            done: setTimeout(() => { location.reload(); }, 200),
            error: rendererror,
            form: formData,
            urlactual: "/dianproject/patrimonio/listar",
        });
    });

}

//#endregion