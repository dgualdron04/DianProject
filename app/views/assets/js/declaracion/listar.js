//#region Creación de la tabla declarante
const dt = new DataTable('#datatable', 'declaraciones', [
  {
    id: 'bAdd',
    text: 'Crear Declaracion',
    icon: 'fas fa-paste',
    type: 'button',
    action: function () {
      if (document.querySelector('.alertbasic')) {
        alerta("Solo puedes crear una declaración por Anno de declaración.", '.alertbasic');
      }else{
      history.pushState(null, "", url1);
      location.href='./declaracion/crear';
      }
    }
  }
]);

dt.parse();
//#endregion



//#region modal eliminar

function eliminardeclaracion(e, id) {
    
  e.preventDefault();

  let modaldelete = document.getElementById("modal-eliminar-declaracion");

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


//#endregion


function revisiondeclaracion(event, id){

  let formData = new FormData();
  let param = true;
  formData.append("param", param);
  let etiqueta = id.trim().split('-');
  id = etiqueta[1];
ajax({
          url: `./declaracion/solicitarrevision/${id}`,
          method: 'POST',
          done: setTimeout(() => { location.reload()}, 200),
          error: rendererror,
          form: formData,
          urlactual: location.href,
      });

}