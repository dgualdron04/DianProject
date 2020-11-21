//#region Creación de la tabla tipo ingresos y activar el botón crear

const dtingresosganancias = new DataTable("#datatable-ingresosganancias", "Tipos de Ingresos",
    [
        {
            id: "bAddingresosganancias",
            text: "Crear Ingresos de Ganancias",
            icon: "fas fa-paste",
            type: "button",
            action: function () {
                let modalcrear = document.getElementById("modal-crear-ingresos");

                modalcrear.style.opacity = 1;
                modalcrear.style.visibility = "visible";
                modalcrear.children[0].classList.remove("modal-close");

                //#region Cerrar modal crear tipo ingresos
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

dtingresosganancias.parse();

//#endregion

//#region Acción del botón crear tipo de ingresos

const formcrearingresos = document.getElementById('form-crear-ingresos');

formcrearingresos.addEventListener('submit', (e) => {

    e.preventDefault();

    let formData = new FormData(formcrearingresos);
    let param = true;
    formData.append('param', param);

    ajax({
        url: `./ganancias/crear/ingresos`,
        method: 'POST',
        done: setTimeout(() => { location.reload(); }, 200),
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/ganancias/listar",
    });

});

//#endregion

//#region Acción del botón editar tipo de ingresos

function editartipoingresosganancias(e, id) {

    e.preventDefault();
    let modaleditar = document.getElementById("modal-editar-ingresos");

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

    id = id.replace("editig-", "");
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
        url: `./ganancias/editar/ingresos/${id}`,
        method: "POST",
        done: iniciareditaringresos,
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/ganancias/listar",
    });

}

//#endregion

//#region Inicializar campos de Editar Tipo de ingresos

function iniciareditaringresos(datos) {

    document.getElementById("idti").value = datos[0]["idtipoingresosganancias"]
    document.getElementById("nombreingresoseditar").value = datos[0]["nombre"];
    document.getElementById("descripcioningresoseditar").value = datos[0]["descripcion"];
    document.getElementById("ayudaingresoseditar").value = datos[0]["ayuda"];

}

//#endregion

//#region Submit Editar tipo de ingreso

let formeditartipoingresos = document.getElementById('form-editar-ingresos');

formeditartipoingresos.addEventListener('submit', (e) => {

    e.preventDefault();

    let formData = new FormData(formeditartipoingresos);
    let param = true;
    formData.append("param", param);
    let id = formeditartipoingresos["idti"].value;
    ajax({
        url: `./ganancias/editarganancias/ingresos/${id}`,
        method: "POST",
        done: setTimeout(() => { location.reload(); }, 200),
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/ganancias/listar",
    });
});

//#endregion

//#region Acción del botón eliminar tipo de Gananacia no gravada

function eliminartipoingresosganancias (e, id) {

    let modaldelete = document.getElementById("modal-delete-ingresos");

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

    id = id.replace("deleteig-", "");
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
        url: `./ganancias/editar/ingresos/${id}`,
        method: "POST",
        done: iniciareliminaringresos,
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/ganancias/listar",
    });

}

//#endregion

//#region Inicializar eliminar tipo de bienes

function iniciareliminaringresos(datos) {

    document.getElementById("h2-header-ingresos").innerHTML = `Eliminar el tipo de Ingreso ${datos[0]["nombre"]}`;
    document.getElementById("modal-body-ingresos").innerHTML = `<p>¿ Estas seguro que deseas eliminar el tipo de Ingreso ${datos[0]["nombre"]}?</p>`;
    document.getElementById("modal-footer-ingresos").innerHTML = `<a href="#" id="si-eliminar-ingresos" class="btn-modal btn-block-modal btn-delete"> Si </a> <a href="#" id="no-eliminar-ingresos" class="btn-modal btn-block-modal btn-delete"> No </a>`;

    let sieliminaringresos = document.getElementById("si-eliminar-ingresos");
    let noeliminaringresos = document.getElementById("no-eliminar-ingresos");

    noeliminaringresos.addEventListener("click", (e) => {
        e.preventDefault();

        let modaldelete = document.getElementById("modal-delete-ingresos");

        modaldelete.children[0].classList.add("modal-close");

        setTimeout(() => {
            modaldelete.style.opacity = 0;
            modaldelete.style.visibility = "hidden";
        }, 500);
    });

    sieliminaringresos.addEventListener("click", (e) => {
        e.preventDefault();
        let formData = new FormData();
        let param = true;
        formData.append("param", param);
        ajax({
            url: `./ganancias/eliminar/ingresos/${datos[0]["idtipoingresosganancias"]}`,
            method: "POST",
            done: setTimeout(() => { location.reload(); }, 200),
            error: rendererror,
            form: formData,
            urlactual: "/dianproject/ganancias/listar",
        });
    });

}

//#endregion
