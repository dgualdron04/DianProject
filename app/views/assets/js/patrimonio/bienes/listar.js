//#region Creación de la tabla tipo bienes y activar el botón crear

const dttipobienes = new DataTable("#datatable-tipobienes", "Tipos de bienes",
    [
        {
            id: "bAddtipobienes",
            text: "Crear Tipo de Bien",
            icon: "fas fa-paste",
            type: "button",
            action: function () {
                let modalcrear = document.getElementById("modal-crear-tipobien");

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

dttipobienes.parse();

//#endregion

//#region Acción del botón crear tipo de bienes

const formcreartipobien = document.getElementById('form-crear-tipobien');

formcreartipobien.addEventListener('submit', (e) => {

    e.preventDefault();

    let formData = new FormData(formcreartipobien);
    let param = true;
    formData.append('param', param);

    ajax({
        url: `./patrimonio/crear/tipobien`,
        method: 'POST',
        done: setTimeout(() => { location.reload(); }, 200),
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/patrimonio/listar",
    });

});

//#endregion

//#region Acción del botón editar tipo de bien

function editartipobien(e, id) {

    e.preventDefault();
    let modaleditar = document.getElementById("modal-editar-tipobien");

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

    id = id.replace("editb-", "");
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
        url: `./patrimonio/editar/tipobien/${id}`,
        method: "POST",
        done: iniciareditarbienes,
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/patrimonio/listar",
    });

}

//#endregion

//#region Inicializar campos de Editar Tipo de bien

function iniciareditarbienes(datos) {

    document.getElementById("idtb").value = datos[0]["idtipobien"]
    document.getElementById("nombretipobieneditar").value = datos[0]["nombre"];
    document.getElementById("descripciontipobieneditar").value = datos[0]["descripcion"];
    document.getElementById("ayudatipobieneditar").value = datos[0]["ayuda"];

}

//#endregion

//#region Submit Editar tipo de bien

let formeditartipobien = document.getElementById('form-editar-tipobien');

formeditartipobien.addEventListener('submit', (e) => {

    e.preventDefault();

    let formData = new FormData(formeditartipobien);
    let param = true;
    formData.append("param", param);
    let id = formeditartipobien["idtb"].value;
    ajax({
        url: `./patrimonio/editarpatrimonio/tipobien/${id}`,
        method: "POST",
        done: setTimeout(() => { location.reload(); }, 200),
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/patrimonio/listar",
    });
});

//#endregion

//#region Acción del botón eliminar tipo de bien

function eliminartipobien(e, id) {

    let modaldeletetipobien = document.getElementById("modal-delete-tipobien");

    modaldeletetipobien.style.opacity = 1;
    modaldeletetipobien.style.visibility = "visible";
    modaldeletetipobien.children[0].classList.remove("modal-close");

    //#region Cerrar modal eliminar
    modaldeletetipobien.children[0].children[0].children[1].addEventListener("click", () => {
        modaldeletetipobien.children[0].classList.add("modal-close");

        setTimeout(() => {
            modaldeletetipobien.style.opacity = 0;
            modaldeletetipobien.style.visibility = "hidden";
        }, 500);
    }
    );
    //#endregion

    id = id.replace("deleteb-", "");
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
        url: `./patrimonio/editar/tipobien/${id}`,
        method: "POST",
        done: iniciareliminarbienes,
        error: rendererror,
        form: formData,
        urlactual: "/dianproject/patrimonio/listar",
    });

}

//#endregion

//#region Inicializar eliminar tipo de bienes

function iniciareliminarbienes(datos) {

    document.getElementById("h2-header-tipobien").innerHTML = `Eliminar el tipo de Bien ${datos[0]["nombre"]}`;
    document.getElementById("modal-body-tipobien").innerHTML = `<p>¿ Estas seguro que deseas eliminar el tipo de Bien ${datos[0]["nombre"]}?</p>`;
    document.getElementById("modal-footer-tipobien").innerHTML = `<a href="#" id="si-eliminar-tipobien" class="btn-modal btn-block-modal btn-delete"> Si </a> <a href="#" id="no-eliminar-tipobien" class="btn-modal btn-block-modal btn-delete"> No </a>`;

    let sieliminartipobien = document.getElementById("si-eliminar-tipobien");
    let noeliminartipobien = document.getElementById("no-eliminar-tipobien");

    noeliminartipobien.addEventListener("click", (e) => {
        e.preventDefault();

        let modaldeletetipobien = document.getElementById("modal-delete-tipobien");

        modaldeletetipobien.children[0].classList.add("modal-close");

        setTimeout(() => {
            modaldeletetipobien.style.opacity = 0;
            modaldeletetipobien.style.visibility = "hidden";
        }, 500);
    });

    sieliminartipobien.addEventListener("click", (e) => {
        e.preventDefault();
        let formData = new FormData();
        let param = true;
        formData.append("param", param);
        ajax({
            url: `./patrimonio/eliminar/tipobien/${datos[0]["idtipobien"]}`,
            method: "POST",
            done: setTimeout(() => { location.reload(); }, 200),
            error: rendererror,
            form: formData,
            urlactual: "/dianproject/patrimonio/listar",
        });
    });

}

//#endregion