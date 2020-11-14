let loading;
const loader = document.getElementById("loader");

const url1 = "/dianproject/";
const url2 = "/dianproject/declaracion/listar";

function ajax({
    url,
    method = "GET",
    async = true,
    done = () => {},
    error = () => {},
    responseType = "json",
    form = null,
  }) {
    loading = false;
    loadingfunction();
    function status(readyState) {
      switch (readyState) {
        case 0:
          return "uninitilized";
        case 1:
          return "loading";
        case 2:
          return "loaded";
        case 3:
          return "interactive";
        case 4:
          return "completed";
      }
    }
    const request = new XMLHttpRequest();
    request.responseType = responseType;
    /*     console.log(status(request.readyState), request.readyState) */
  
    request.onreadystatechange = () => {
      /* console.log(status(request.readyState), request.readyState) */
      if (request.readyState === 4) {
        if (request.status === 200) {
          loading = true;
          loadingfunction();
          done(request.response);
        } else {
          loading = true;
          loadingfunction();
          error(request.status);
        }
      }
    };
    history.pushState(null, "", url1);
    request.open(method, url, async);
    request.send(form);
    history.pushState(null, "", url2);
  }

  function loadingfunction() {
    if (loading === false) {
      loader.style.opacity = "1";
      loader.style.visibility = "visible";
    } else if (loading === true) {
      loader.style.opacity = "0";
      loader.style.visibility = "hidden";
    }
  }


  const dt = new DataTable('#datatable', 'declaraciones' , [
    {
        id: 'bAdd',
        text: 'Crear Declaracion',
        icon: 'fas fa-paste',
        type: 'button',
        action: function(){
            console.log(dt.getSelected());
        }
    },
    {
        id: 'bDelete',
        text: 'Eliminar',
        icon: 'far fa-trash-alt',
        type: 'button',
        action: function(){
            console.log('Acción de eliminar');
        }
    }
]);

dt.parse();