//#region Creación de la tabla declarante
const dtexogena = new DataTable('#datatable-exogenas', 'Exogenas', [
    {
      id: 'bAddexogenas',
      text: 'Crear Exogenas',
      icon: 'fas fa-paste',
      type: 'button',
      action: function () {
        let modalcrear = document.getElementById("modal-crear-exogenas");

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
  
  dtexogena.parse();
  //#endregion
  
  //#region Crear exogenas

  let formcrearexogenas = document.getElementById('form-crear-exogenas');

  formcrearexogenas.addEventListener('submit', (e) => {
    e.preventDefault();

    let formData = new FormData(formcrearexogenas);
    let param = true;
    formData.append("param", param);
    let iddeclaracion = document.getElementById('iddeclaracion').innerHTML;

    ajax({
        url: `./declaracion/creardeclaracion/exogenas/${iddeclaracion}`,
        method: 'POST',
        done: console.log('hola'),
        error: rendererror,
        form: formData,
        urlactual: location.href,
    });
  });


  //#endregion

  function eliminarexogenas(e, id) {

    e.preventDefault();

    let modaldelete = document.getElementById("modal-eliminar-exogenas");

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
  }

  