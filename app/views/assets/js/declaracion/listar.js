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

