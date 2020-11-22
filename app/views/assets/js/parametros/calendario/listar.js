//#region Creación de la tabla
const cdt = new DataTable("#datatable-calendario", "calendarios", [
  {
    id: "crearcalendario",
    text: "Crear Calendario",
    icon: "far fa-calendar-plus",
    type: "button",
    action: function (e) {
      if (!document.getElementById("modal-crear-calendario")) {
        alerta(
          `Solo puedes crear un calendario por anno de declaración.`,
          ".alertbasic"
        );
      } else {
        let modalcrear = document.getElementById("modal-crear-calendario");

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

        let formcrearcalendario = document.getElementById(
          "form-calendario-crear"
        );

        formcrearcalendario.addEventListener("submit", (ev) => {
          myid = formcrearcalendario["aniocalendario"].id;
          myid = myid.replace("aniocalendario-", "");
          let formData = new FormData(formcrearcalendario);
          let param = true;
          formData.append("param", param);
          ajax({
            url: `./parametros/crearcalendario/${myid}`,
            method: "POST",
            // async: true,
            // responseType: 'json',
            done: setTimeout(() => {
              location.reload();
            }, 200),
            error: rendererror,
            form: formData,
          });
          ev.preventDefault();
        });

        e.preventDefault();
      }
    },
  },
]);

cdt.parse();
//#endregion

//#region Editar Calendario
function editarcalendario(e, myid) {
  let modaleditar = document.getElementById("modal-editar-calendario");

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

  myid = myid.replace("editc-", "");
  let formData = new FormData();
  let param = true;
  formData.append("param", param);
  ajax({
    url: `./parametros/editarcal/${myid}`,
    method: "POST",
    // async: true,
    // responseType: 'json',
    done: traereditarcal,
    error: rendererror,
    form: formData,
  });

  e.preventDefault();
}
//#endregion

//#region Inicializar modal Editar
function traereditarcal(datos) {
  document.getElementById("idcal").value = datos[0]["idcalendario"];
  document.getElementById("dia1").value = datos[0]["dia1"];
  document.getElementById("dia2").value = datos[0]["dia2"];
}
//#endregion

//#region Editar Calendario

let formcalendarioeditar = document.getElementById("form-calendario-editar");

formcalendarioeditar.addEventListener("submit", (e) => {
  e.preventDefault();
  let formData = new FormData(formcalendarioeditar);
  let param = true;
  formData.append("param", param);
  let id = formcalendarioeditar["idcal"].value;
  ajax({
    url: `./parametros/editarcalendario/${id}`,
    method: "POST",
    // async: true,
    // responseType: 'json',
    done: setTimeout(() => {
      location.reload();
    }, 200),
    error: rendererror,
    form: formData,
  });
});

//#endregion

//#region Eliminar Calendario

function eliminarcalendario(e, id) {
  let modaldeletecalendario = document.getElementById(
    "modal-delete-calendario"
  );

  //#region Cerrar modal eliminar
  modaldeletecalendario.children[0].children[0].children[1].addEventListener(
    "click",
    () => {
      modaldeletecalendario.children[0].classList.add("modal-close");

      setTimeout(() => {
        modaldeletecalendario.style.opacity = 0;
        modaldeletecalendario.style.visibility = "hidden";
      }, 500);
    }
  );
  //#endregion

  modaldeletecalendario.style.opacity = 1;
  modaldeletecalendario.style.visibility = "visible";
  modaldeletecalendario.children[0].classList.remove("modal-close");
  id = id.replace("deletec-", "");
  let formData = new FormData();
  let param = true;
  formData.append("param", param);
  ajax({
    url: `./parametros/editarcal/${id}`,
    method: "POST",
    // async: true,
    // responseType: 'json',
    done: eliminarcalendario1,
    error: rendererror,
    form: formData,
  });

  e.preventDefault();
}

//#endregion

//#region Finalizar Eliminar Calendario

function eliminarcalendario1(datos) {
  document.getElementById("h2-header-calendario").innerHTML = `Eliminar Calendario del Anno ${datos[0]["annoperiodo"]}`;
  document.getElementById("modal-body-calendario").innerHTML = `<p>¿ Estas seguro que deseas eliminar el Calendario del Anno ${datos[0]["annoperiodo"]}?,
                                                          eliminaras todo lo relacionado con este calendario. </p>`;
  document.getElementById("modal-footer-calendario").innerHTML = `<a href="#" id="si-eliminar-calendario" class="btn-modal btn-block-modal btn-delete"> Si </a> <a href="#" id="no-eliminar-calendario" class="btn-modal btn-block-modal btn-delete"> No </a>`;

  let sieliminarcalendario = document.getElementById("si-eliminar-calendario");
  let noeliminarcalendario = document.getElementById("no-eliminar-calendario");

  noeliminarcalendario.addEventListener("click", (e) => {
    e.preventDefault();

    let modaldeletecalendario = document.getElementById(
      "modal-delete-calendario"
    );

    modaldeletecalendario.children[0].classList.add("modal-close");

    setTimeout(() => {
      modaldeletecalendario.style.opacity = 0;
      modaldeletecalendario.style.visibility = "hidden";
    }, 500);
  });

  sieliminarcalendario.addEventListener("click", (e) => {
    e.preventDefault();
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
      url: `./parametros/eliminarcalendario/${datos[0]["idcalendario"]}`,
      method: "POST",
      // async: true,
      // responseType: 'json',
      done: setTimeout(() => {
        location.reload();
      }, 200),
      error: rendererror,
      form: formData,
    });
  });
}
//#endregion

//#region Inicializar NITS
let idc;
function agregarnits(e, id) {
  e.preventDefault();

  let modalperiodo = document.getElementById("modal-listar-periodo");

  //#region Cerrar modal editar
  modalperiodo.children[0].children[0].children[0].children[0].addEventListener(
    "click",
    () => {
      modalperiodo.children[0].classList.add("modal-close");

      setTimeout(() => {
        modalperiodo.style.opacity = 0;
        modalperiodo.style.visibility = "hidden";
      }, 500);
    }
  );

  //#endregion

  modalperiodo.style.opacity = 1;
  modalperiodo.style.visibility = "visible";
  modalperiodo.children[0].classList.remove("modal-close");

  id = id.replace("agregarnit-", "");
  idc = id;
  let formData = new FormData();
  let param = true;
  formData.append("param", param);
  ajax({
    url: `./parametros/listarperiodo/${id}`,
    method: "POST",
    // async: true,
    // responseType: 'json',
    done: listarperiodo,
    error: rendererror,
    form: formData,
  });
}

//#endregion

//#region Construir modal Periodo

function listarperiodo(datos) {
  let periododeclarante = document.getElementById("periododeclarante");
  periododeclarante.innerHTML = `
    <table id="datatable-periodo" class="datatable">
                        <thead>
                            <tr>
                                <th>Digito 1</th>
                                <th>Digito 2</th>
                                <th>Día</th>
                                <th>icon:far fa-edit</th>
                                <th>icon:far fa-trash-alt</th>
                            </tr>
                        </thead>

                        <tbody id="bodyperiodo">
                            
                        </tbody>
                    </table>
    `;
  document.getElementById("bodyperiodo").innerHTML = "";
  datos.forEach((periodo) => {
    document.getElementById("bodyperiodo").innerHTML += `
        <tr>
            <td>${periodo["digito1"]}</td>
            <td>${periodo["digito2"]}</td>
            <td>${periodo["dia"]}</td>
            <td>actionlink:user-edit simbollink;icon:far fa-edit;name:Editar;id:editp-${periodo["idperiododeclarante"]};onclick:editarperiodo;class:datecolumn</td>
            <td>actionlink:user-edit simbollink;icon:far fa-trash-alt;name:Eliminar;id:deletep-${periodo["idperiododeclarante"]};onclick:eliminarperiodo;class:datecolumn;</td>
        </tr>
        `;
  });

  const dtperiodo = new DataTable(
    "#datatable-periodo",
    "Periodos de Declaración",
    [
      {
        id: "bAddperiodo",
        text: "Crear Periodo",
        icon: "fas fa-paste",
        type: "button",
        action: function () {

          //#region Cerrar modal periodo
          let modalperiodo = document.getElementById("modal-listar-periodo");

          modalperiodo.children[0].classList.add("modal-close");

          setTimeout(() => {
            modalperiodo.style.opacity = 0;
            modalperiodo.style.visibility = "hidden";
          }, 500);
          //#endregion

          //#region Abrir modal crear periodo

          document.getElementById('primerdigitocrear').value = '';
          document.getElementById('segundodigitocrear').value = '';
          document.getElementById('fechacrear').value = null;
          let formParam = new FormData();
          let param = true;
          formParam.append("param", param);
          ajax({
            url: `./parametros/editarcal/${idc}`,
            method: "POST",
            // async: true,
            // responseType: 'json',
            done: maxandmin,
            error: rendererror,
            form: formParam,
          });

          let modalcrearperiodo = document.getElementById(
            "modal-crear-periodo"
          );
          setTimeout(() => {
            modalcrearperiodo.style.opacity = 1;
            modalcrearperiodo.style.visibility = "visible";
            modalcrearperiodo.children[0].classList.remove("modal-close");
          }, 500);

          //#region Cerrar modal crear parametro
          modalcrearperiodo.children[0].children[0].children[0].children[0].addEventListener(
            "click",
            () => {
              modalcrearperiodo.children[0].classList.add("modal-close");
              agregarnits(event, "agregarnit-" + idc);
              setTimeout(() => {
                modalcrearperiodo.style.opacity = 0;
                modalcrearperiodo.style.visibility = "hidden";
              }, 150);
            }
          );
          //#endregion

          //#endregion

        },
      },
    ]
  );

  dtperiodo.parse();
}
//#region Crear periodo
let contadorperiodo = 0;
if (document.querySelector('.modal-container-crear')) {
let formcrearperiodo = document.getElementById('form-periodo-crear');

formcrearperiodo.addEventListener('submit', (e) => {

  e.preventDefault();
  contadorperiodo++;
  if (contadorperiodo === 1) {
    let formData = new FormData(formcrearperiodo);
    let param = true;
    formData.append("param", param);
    ajax({
      url: `./parametros/crearperiodo/${idc}`,
      method: "POST",
      // async: true,
      // responseType: 'json',
      done: () => { cerrarmodal(idc); contadorperiodo = 0; },
      error: rendererror,
      form: formData,
    });
  }


});
}
//#endregion

//#endregion

//#region Abrir periodo y cerrar crear periodo
function cerrarmodal($idcalendario) {
  let modalcrearperiodo = document.getElementById("modal-crear-periodo");
  modalcrearperiodo.children[0].classList.add("modal-close");
  abrirperiodo($idcalendario);
  setTimeout(() => { modalcrearperiodo.style.opacity = 0; modalcrearperiodo.style.visibility = "hidden"; }, 150);
}

function abrirperiodo(id) {
  setTimeout(() => {
    let modalperiodo = document.getElementById("modal-listar-periodo");

    //#region Cerrar modal editar
    modalperiodo.children[0].children[0].children[0].children[0].addEventListener(
      "click",
      () => {
        modalperiodo.children[0].classList.add("modal-close");

        setTimeout(() => {
          modalperiodo.style.opacity = 0;
          modalperiodo.style.visibility = "hidden";
        }, 500);
      }
    );

    //#endregion

    modalperiodo.style.opacity = 1;
    modalperiodo.style.visibility = "visible";
    modalperiodo.children[0].classList.remove("modal-close");
    idc = id;
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
      url: `./parametros/listarperiodo/${id}`,
      method: "POST",
      // async: true,
      // responseType: 'json',
      done: listarperiodo,
      error: rendererror,
      form: formData,
    });
  }, 400);
}
//#endregion

//#region Poner max and mins

function maxandmin(datos) {
  document.getElementById('fechacrear').setAttribute("min", `${datos[0]['dia1']}`);
  document.getElementById('fechacrear').setAttribute("max", `${datos[0]['dia2']}`);
}

//#endregion


//#region Eliminar periodo

function eliminarperiodo(event, id) {
  event.preventDefault();
  //#region Cerrar modal periodo
  let modalperiodo = document.getElementById("modal-listar-periodo");

  modalperiodo.children[0].classList.add("modal-close");

  setTimeout(() => {
    modalperiodo.style.opacity = 0;
    modalperiodo.style.visibility = "hidden";
  }, 500);
  //#endregion

  //#region Abrir modal eliminar
  setTimeout(() => {

    let modaldeleteperiodo = document.getElementById("modal-delete-periodo");

    modaldeleteperiodo.style.opacity = 1;
    modaldeleteperiodo.style.visibility = "visible";
    modaldeleteperiodo.children[0].classList.remove("modal-close");

    id = id.replace("deletep-", "");
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
      url: `./parametros/editarper/${id}`,
      method: "POST",
      // async: true,
      // responseType: 'json',
      done: eliminarper,
      error: rendererror,
      form: formData,
    });

    //#region Cerrar modal eliminar
    modaldeleteperiodo.children[0].children[0].children[1].addEventListener(
      "click",
      () => {
        modaldeleteperiodo.children[0].classList.add("modal-close");
        abrirperiodo(idc);
        setTimeout(() => {
          modaldeleteperiodo.style.opacity = 0;
          modaldeleteperiodo.style.visibility = "hidden";
        }, 500);
      }
    );
    //#endregion
  }, 500);
  //#endregion


}

//#endregion

//#region Llenar Periodo

function eliminarper(datos) {

  document.getElementById("h2-header-periodo").innerHTML = `Eliminar Periodo del día ${datos[0]["dia"]}`;
  document.getElementById("modal-body-periodo").innerHTML = `<p>¿ Estas seguro que deseas eliminar el Periodo del día ${datos[0]["dia"]}?</p>`;
  document.getElementById("modal-footer-periodo").innerHTML = `<a href="#" id="si-eliminar-periodo" class="btn-modal btn-block-modal btn-delete"> Si </a> <a href="#" id="no-eliminar-periodo" class="btn-modal btn-block-modal btn-delete"> No </a>`;

  let sieliminarperiodo = document.getElementById("si-eliminar-periodo");
  let noeliminarperiodo = document.getElementById("no-eliminar-periodo");

  //#region No eliminar
  noeliminarperiodo.addEventListener("click", (e) => {
    e.preventDefault();

    let modaldeleteperiodo = document.getElementById("modal-delete-periodo");

    modaldeleteperiodo.children[0].classList.add("modal-close");
    abrirperiodo(idc);
    setTimeout(() => {
      modaldeleteperiodo.style.opacity = 0;
      modaldeleteperiodo.style.visibility = "hidden";
    }, 500);
  });
  //#endregion

  //#region Si eliminar
  sieliminarperiodo.addEventListener("click", (e) => {
    e.preventDefault();
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
      url: `./parametros/eliminarperiodo/${datos[0]["idperiododeclarante"]}`,
      method: "POST",
      // async: true,
      // responseType: 'json',
      done: () => {
        let modaldeleteperiodo = document.getElementById("modal-delete-periodo"); modaldeleteperiodo.children[0].classList.add("modal-close");
        abrirperiodo(idc);
        setTimeout(() => {
          modaldeleteperiodo.style.opacity = 0;
          modaldeleteperiodo.style.visibility = "hidden";
        }, 500);
      },
      error: rendererror,
      form: formData,
    });
  });
  //#endregion

}

//#endregion

//#region Editar Periodo

function editarperiodo(event, idperiodo) {

  event.preventDefault();
  //#region Cerrar modal periodo
  let modalperiodo = document.getElementById("modal-listar-periodo");

  modalperiodo.children[0].classList.add("modal-close");

  setTimeout(() => {
    modalperiodo.style.opacity = 0;
    modalperiodo.style.visibility = "hidden";
  }, 500);
  //#endregion

  //#region Abrir modal editar
  setTimeout(() => {

    let modaleditarperiodo = document.getElementById("modal-editar-periodo");

    modaleditarperiodo.style.opacity = 1;
    modaleditarperiodo.style.visibility = "visible";
    modaleditarperiodo.children[0].classList.remove("modal-close");

    idperiodo = idperiodo.replace("editp-", "");
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
      url: `./parametros/editarper/${idperiodo}`,
      method: "POST",
      // async: true,
      // responseType: 'json',
      done: traereditarper,
      error: rendererror,
      form: formData,
    });

    //#region Cerrar modal eliminar
    modaleditarperiodo.children[0].children[0].children[0].children[0].addEventListener(
      "click",
      () => {
        modaleditarperiodo.children[0].classList.add("modal-close");
        abrirperiodo(idc);
        setTimeout(() => {
          modaleditarperiodo.style.opacity = 0;
          modaleditarperiodo.style.visibility = "hidden";
        }, 500);
      }
    );
    //#endregion
  }, 500);
  //#endregion


}

//#endregion

//#region Inicializar editar

function traereditarper(datos) {

  document.getElementById('primerdigitoeditar').value = datos[0]['digito1'];
  document.getElementById('segundodigitoeditar').value = datos[0]['digito2'];
  document.getElementById('fechaeditar').value = datos[0]['dia'];
  document.getElementById('idper').value = datos[0]['idperiododeclarante'];

}

//#endregion

//#region Editar
let contadorperiodoeditar = 0;
if (!document.querySelector('.modal-crear-calendario')) {
let formperiodoeditar = document.getElementById('form-periodo-editar');

formperiodoeditar.addEventListener('submit', (e) => {
  e.preventDefault();
  contadorperiodoeditar++;
  if (contadorperiodoeditar === 1) {
    let formData = new FormData(formperiodoeditar);
    let param = true;
    formData.append("param", param);
    id = formperiodoeditar['idper'].value;
    ajax({
      url: `./parametros/editarperiodo/${id}`,
      method: "POST",
      // async: true,
      // responseType: 'json',
      done: () => {
        let modaleditarperiodo = document.getElementById("modal-editar-periodo");
        modaleditarperiodo.children[0].classList.add("modal-close");
        abrirperiodo(idc);
        setTimeout(() => {
          modaleditarperiodo.style.opacity = 0;
          modaleditarperiodo.style.visibility = "hidden";
        }, 500); contadorperiodoeditar = 0;
      },
      error: rendererror,
      form: formData,
    });
  }
});
}
//#endregion