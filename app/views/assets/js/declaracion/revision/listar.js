//#region Creación de la tabla declarante
const dt = new DataTable('#datatable-revision', 'declaraciones', [
    {
      id: 'bAddrevision',
      text: 'Crear Revisión',
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
  


  
function denegardeclaracion(event, id){

  let formData = new FormData();
  let param = true;
  formData.append("param", param);
  let etiqueta = id.trim().split('-');
  id = etiqueta[1];
ajax({
          url: `./declaracion/denegarrevision/${id}`,
          method: 'POST',
          done: setTimeout(() => { location.reload()}, 200),
          error: rendererror,
          form: formData,
          urlactual: location.href,
      });

}
  

function aceptardeclaracion(event, id){

  let formData = new FormData();
  let param = true;
  formData.append("param", param);
  let etiqueta = id.trim().split('-');
  id = etiqueta[1];
ajax({
          url: `./declaracion/aceptarrevision/${id}`,
          method: 'POST',
          done: setTimeout(() => { location.reload()}, 200),
          error: rendererror,
          form: formData,
          urlactual: location.href,
      });

}
  
