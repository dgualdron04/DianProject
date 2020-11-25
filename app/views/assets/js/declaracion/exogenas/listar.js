//#region Creación de la tabla declarante
const dtexogena = new DataTable('#datatable-exogenas', 'Exogenas', [
    {
      id: 'bAddexogenas',
      text: 'Crear Exogenas',
      icon: 'fas fa-paste',
      type: 'button',
      action: function () {

      }
    }
  ]);
  
  dtexogena.parse();
  //#endregion
  
  