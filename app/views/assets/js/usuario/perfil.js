const nav1 = document.getElementById("nav-1");
const nav2 = document.getElementById("nav-2");
const perfil = document.getElementById("perfil");
const editarperfil = document.getElementById("editar-perfil");

nav1.addEventListener("click", (e) => {
  e.preventDefault();

  nav1.classList.add("active");
  nav2.classList.remove("active");
  perfil.classList.add("active");
  editarperfil.classList.remove("active");
});

nav2.addEventListener("click", (e) => {
  e.preventDefault();

  nav1.classList.remove("active");
  nav2.classList.add("active");
  perfil.classList.remove("active");
  editarperfil.classList.add("active");
});

const url1 = "/dianproject/";
const url2 = "/dianproject/usuario/perfil";
let loading;
const loader = document.getElementById("loader");

  function loadingfunction() {
    if (loading === false) {
      loader.style.opacity = "1";
      loader.style.visibility = "visible";
    } else if (loading === true) {
      loader.style.opacity = "0";
      loader.style.visibility = "hidden";
    }
  }

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

  function rendererror(status) {
    console.log(`${status} Ha ocurrido un error`);
  }

  /* -- Inicio Perfil -- */

  const formperfil = document.getElementById("formperfil");
  const nombre = document.getElementById('nombreperfil');
  const cedula = document.getElementById('cedulaperfil');
  const telefono = document.getElementById('telefonoperfil');
  formperfil.addEventListener('submit', (e) => {
    e.preventDefault();

    let formData = new FormData(formperfil);
    let param = true;
    formData.append("param", param);
    
    ajax({
        url: `./usuario/editarperfil`,
        method: "POST",
        // async: true,
        // responseType: 'json',
        done: setTimeout(() => {location.reload();}, 200),
        error: rendererror,
        form: formData,
    });

  });

  /* function actualizardatos(){
    let nombres = formperfil['nombresperfil'].value.split(' ');
    let apellidos =  formperfil['apellidosperfil'].value.split(' ');
    nombre.innerHTML = nombres[0] + ' ' + apellidos[0];
    cedula.innerHTML = formperfil['cedulaperfil'].value;
    telefono.innerHTML = formperfil['telefonoperfil'].value;
  } */
  
    /* -- Fin Perfil -- */

    /* -- Inicio Others -- */

    const formpss = document.getElementById("formpass");

    formpss.addEventListener('submit', (e) => {

      let formData = new FormData(formperfil);
      let param = true;
      formData.append("param", param);

      ajax({
        url: `./usuario/cambiarpass`,
        method: "POST",
        // async: true,
        // responseType: 'json',
        done: setTimeout(() => {location.reload();}, 200),
        error: rendererror,
        form: formData,
    });

    });

    /* -- Fin Others -- */
