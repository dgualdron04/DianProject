//#region Creación de la tabla Información personal
const dtliquidacionprivada = new DataTable('#datatable-liquidacionprivada', 'liquidación privada', [
    {
        id: 'bAddliquidacionprivada',
        text: 'Crear Liquidacion privada',
        icon: 'fas fa-paste',
        type: 'button',
        action: function () {
            let modalcrear = document.getElementById("modal-crear-liquidacionprivada");

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

dtliquidacionprivada.parse();
  //#endregion

//#region Dentro del modal crear liquidacionprivada

const nextBtnFirstliquidacionprivada = document.querySelector(".firstNextliquidacionprivada");
const prevBtnFirstliquidacionprivada = document.querySelector(".firstPrevliquidacionprivada");
const progressTextliquidacionprivada = document.querySelectorAll(".step .stepcrearliquidacionprivada");
const progressCheckliquidacionprivada = document.querySelectorAll(".step .checkcrearliquidacionprivada");
const bulletliquidacionprivada = document.querySelectorAll(".step .bulletcrearliquidacionprivada");
const slidePageliquidacionprivada = document.querySelector(".slide-page-crear-liquidacionprivada");
const slidePage2liquidacionprivada = document.querySelector(".slide-page-crear-2-liquidacionprivada");
let currentliquidacionprivada = 1;
slidePage2liquidacionprivada.style.display = "none";

nextBtnFirstliquidacionprivada.addEventListener("click", function (event) {
    event.preventDefault();
    slidePageliquidacionprivada.style.display = "none";
    slidePage2liquidacionprivada.style.display = "block";
    bulletliquidacionprivada[currentliquidacionprivada - 1].classList.add("active");
    progressCheckliquidacionprivada[currentliquidacionprivada - 1].classList.add("active");
    progressTextliquidacionprivada[currentliquidacionprivada - 1].classList.add("active");
    currentliquidacionprivada += 1;
});

prevBtnFirstliquidacionprivada.addEventListener("click", function (event) {
    event.preventDefault();
    slidePageliquidacionprivada.style.display = "block";
    slidePage2liquidacionprivada.style.display = "none";

    if (currentliquidacionprivada === 3) {
        bulletliquidacionprivada[currentliquidacionprivada - 2].classList.remove("active");
        progressCheckliquidacionprivada[currentliquidacionprivada - 2].classList.remove("active");
        progressTextliquidacionprivada[currentliquidacionprivada - 2].classList.remove("active");
        currentliquidacionprivada -= 2;
        bulletliquidacionprivada[currentliquidacionprivada - 1].classList.remove("active");
        progressCheckliquidacionprivada[currentliquidacionprivada - 1].classList.remove("active");
        progressTextliquidacionprivada[currentliquidacionprivada - 1].classList.remove("active");
    } else {
        bulletliquidacionprivada[currentliquidacionprivada - 2].classList.remove("active");
        progressCheckliquidacionprivada[currentliquidacionprivada - 2].classList.remove("active");
        progressTextliquidacionprivada[currentliquidacionprivada - 2].classList.remove("active");
        currentliquidacionprivada -= 1;
    }
});

let tipoliquidacionprivadacrear = document.getElementById('tipoliquidacionprivadacrear');

tipoliquidacionprivadacrear.addEventListener('change', (e) => {

    e.preventDefault();
    nextBtnFirstliquidacionprivada.classList.remove('isdisabled');

});


//#endregion

//#region Crear liquidación privada

let formcrearliquidacionprivada = document.getElementById('form-crear-liquidacionprivada');

formcrearliquidacionprivada.addEventListener('submit', (e) => {

    e.preventDefault();

    let formData = new FormData(formcrearliquidacionprivada);
    let param = true;
    formData.append("param", param);
    clase = formcrearliquidacionprivada['tipoliquidacionprivadacrear'].value;
    idliqu = document.getElementById('idliquidacionprivada').innerHTML;
    formData.append("idliqu", idliqu);
    ajax({
        url: `./declaracion/creardeclaracion/liquidacionprivada/${clase}`,
        method: 'POST',
        done: setTimeout(() => { location.reload(); }, 200),
        error: rendererror,
        form: formData,
        urlactual: location.href,
    });

});

//#endregion

//#region Modal editar liquidación privada

function editarliquidacionprivada(e, id) {
    
    e.preventDefault();
    let modaleditar = document.getElementById("modal-editar-liquidacionprivada");

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
    document.getElementById('tipoliquidacionprivadaeditar').innerHTML = etiqueta[2];
    let clase = quitaracentosfun(etiqueta[2].replace(" ", '').toLowerCase().replace(" ", ''));
    id = etiqueta[1];

    let formData = new FormData(formcrearliquidacionprivada);
    let param = true;
    formData.append("param", param);

    ajax({
        url: `./declaracion/editardecla/liquidacionprivada/${clase}/${id}`,
        method: 'POST',
        done: llenareditarliquidacionprivada,
        error: rendererror,
        form: formData,
        urlactual: location.href,
    });

}

//#endregion

//#region Llenar editar
function llenareditarliquidacionprivada(datos) {

    document.getElementById('idlp').value = datos[0]['id'];
    document.getElementById('valorliquidacionprivadaeditar').value = datos[0]['valor'];
    document.getElementById('descripcionliquidacionprivadaeditar').value = datos[0]['descripcion'];
    
}
//#endregion

//#region Editar liquidacion privada

let formeditarliquidacionprivada = document.getElementById('form-editar-liquidacionprivada');

formeditarliquidacionprivada.addEventListener('submit', (e) => {

    e.preventDefault();

    let formData = new FormData(formeditarliquidacionprivada);
    let param = true;
    formData.append("param", param);
    let tipo = quitaracentosfun(document.getElementById('tipoliquidacionprivadaeditar').innerHTML.replace(" ", '').toLowerCase().replace(" ", ''));
    let id = formeditarliquidacionprivada['idlp'].value;

    ajax({
        url: `./declaracion/editardeclaracion/liquidacionprivada/${tipo}/${id}`,
        method: 'POST',
        done: setTimeout(() => { location.reload(); }, 200),
        error: rendererror,
        form: formData,
        urlactual: location.href,
    });

});

//#endregion

//#region Eliminar Liquidacion Privada

function eliminarliquidacionprivada(e, id) {

    e.preventDefault();

    let modaldelete = document.getElementById("modal-delete-liquidacionprivada");

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
    let valor = quitaracentosfun(etiqueta[3].replace(" ", '').toLowerCase().replace(" ", ''));
    let clase = quitaracentosfun(etiqueta[2].replace(" ", '').toLowerCase().replace(" ", ''));
    id = etiqueta[1];

    document.getElementById("h2-header-liquidacionprivada").innerHTML = `Eliminar el tipo ${etiqueta[2]} y con valor ${etiqueta[3]}`;
    document.getElementById("modal-body-liquidacionprivada").innerHTML = `<p>¿ Estas seguro que deseas eliminar la liquidación privada con tipo ${etiqueta[2]} y con un valor de ${etiqueta[3]}?</p>`;
    document.getElementById("modal-footer-liquidacionprivada").innerHTML = `<a href="#" id="si-eliminar-liquidacionprivada" class="btn-modal btn-block-modal btn-delete"> Si </a> <a href="#" id="no-eliminar-liquidacionprivada" class="btn-modal btn-block-modal btn-delete"> No </a>`;

    let sieliminarliquidacionprivada = document.getElementById("si-eliminar-liquidacionprivada");
    let noeliminarliquidacionprivada = document.getElementById("no-eliminar-liquidacionprivada");

    noeliminarliquidacionprivada.addEventListener("click", (e) => {
        e.preventDefault();

        let modaldelete = document.getElementById("modal-delete-liquidacionprivada");

        modaldelete.children[0].classList.add("modal-close");

        setTimeout(() => {
            modaldelete.style.opacity = 0;
            modaldelete.style.visibility = "hidden";
        }, 500);
    });
    
    sieliminarliquidacionprivada.addEventListener("click", (e) => {
        e.preventDefault();
        let formData = new FormData();
        let param = true;
        formData.append("param", param);
        ajax({
            url: `./declaracion/eliminardeclaracion/liquidacionprivada/${clase}/${id}`,
            method: "POST",
            done: setTimeout(() => { location.reload(); }, 200),
            error: rendererror,
            form: formData,
            urlactual: location.href,
        });
    });

}

//#endregion
