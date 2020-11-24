const url1 = '/dianproject/';

let cerrar = document.querySelectorAll(".close")[0],
  cerrar2 = document.querySelectorAll(".close")[1],
  cerrarform = document.getElementById("close-modal-encuesta"),
  cerrarencuesta = document.getElementById("close-modal-encuesta-2"),
  cerrarnodeclara = document.getElementById("close-modal-encuesta-3"),
  cerrarsideclara = document.getElementById("close-modal-encuesta-4"),
  abrir = document.querySelectorAll(".cta")[0],
  abrir2 = document.querySelectorAll(".cta2")[0],
  abrir3 = document.getElementById('register-btn'),
  abrirform = document.getElementById('formulario-btn'),
  modal = document.querySelectorAll(".container")[0],
  modal2 = document.getElementById("cont-modal-encuesta"),
  modalC = document.querySelectorAll(".modal-container")[0],
  modalform = document.getElementById("modal-encuesta"),
  modalencuesta = document.getElementById('cont-modal-encuesta-2'),
  modalnodeclara = document.getElementById('cont-modal-encuesta-3'),
  modalsideclara = document.getElementById('cont-modal-encuesta-4'),
  cont = 0,
  loading,
  loader = document.getElementById("loader");
const register = document.getElementById("register"),
  btnlogin = document.getElementById("boton-register"),
  btnregister = document.getElementById("boton-login"),
  login = document.getElementById("login"),
  registerencuesta = document.getElementById("register-4");
let booleanlogin = false;

abrir.addEventListener("click", (e) => {abrirmodal(e); login.classList.remove("collapse"); register.classList.add("collapse");});
abrir2.addEventListener("click",(e) => {abrirmodal(e); login.classList.remove("collapse"); register.classList.add("collapse");});
abrir3.addEventListener("click", (e) => {abrirmodal(e); login.classList.add("collapse"); register.classList.remove("collapse");});

registerencuesta.addEventListener("click", (e) => {

  cerrardeclara();

  setTimeout(() => {
    abrirmodal(e); 
  }, 600);

  login.classList.add("collapse"); 

  register.classList.remove("collapse");

});

abrirform.addEventListener("click", (e) => {
  e.preventDefault();  
  modal2.classList.remove("collapse"); 
  modal2.classList.remove("collapse2");
  modalencuesta.classList.remove("collapse"); 
  modalencuesta.classList.remove("transition"); 
  modalencuesta.classList.remove("modal-close"); 
  setTimeout(() => {
    abrirmodal2(modal2, modalform);
  }, 100);
});

function abrirmodal(e) {
  modalC.style.opacity = "1";
  modalC.style.visibility = "visible";
  modal.classList.toggle("modal-close");
  e.preventDefault();
}

function abrirmodal2(modal, modalabrir) {
  modalabrir.style.opacity = "1";
  modalabrir.style.visibility = "visible";
  modal.classList.toggle("modal-close");
}

cerrar.addEventListener("click", cerrarmodal);
cerrar2.addEventListener("click", cerrarmodal);
cerrarform.addEventListener('click', () => { cerrarmodal2(modal2, modalform);});

cerrarencuesta.addEventListener('click', () => {
  modalencuesta.classList.add("modal-close"); 
  cerrarmodal2(modal2, modalform);
});

cerrarnodeclara.addEventListener('click', () => {
  modalencuesta.classList.add("modal-close");
  modalnodeclara.classList.add("modal-close");
  cerrarmodal2(modal2, modalform);
  setTimeout(() => {
    modalnodeclara.classList.remove("collapse");
    modalnodeclara.classList.remove("transition");
  }, 600);
});


cerrarsideclara.addEventListener('click', () => {
  cerrardeclara();
});

function cerrardeclara()
{
  modalencuesta.classList.add("modal-close");
  modalsideclara.classList.add("modal-close");
  cerrarmodal2(modal2, modalform);
  setTimeout(() => {
    modalsideclara.classList.remove("collapse");
    modalsideclara.classList.remove("transition");
  }, 600);
}

function cerrarmodal() {
  modal.classList.add("modal-close");
  setTimeout(() => {
    modalC.style.opacity = "0";
    modalC.style.visibility = "hidden";
  }, 600);
}

function cerrarmodal2(modal, modalcerrar) {
  modal.classList.toggle("modal-close");
  setTimeout(() => {
    modalcerrar.style.opacity = "0";
    modalcerrar.style.visibility = "hidden";
  }, 600);
}

/* window.addEventListener("click", function (e) {
  if (e.target === modalC) {
    cont++;
    if (cont === 1) {
      modal.classList.toggle("modal-close");
      setTimeout(() => {
        modalC.style.opacity = "0";
        modalC.style.visibility = "hidden";
        cont = cont - cont;
      }, 600);
    }
  }
}); */

btnlogin.addEventListener("click", (e) => {
  e.preventDefault();
  changelogin();
});
btnregister.addEventListener("click", (e) => {
  e.preventDefault();
  changelogin();
});

function changelogin() {
  booleanlogin = !booleanlogin;
  if (booleanlogin === true) {
    login.classList.toggle("collapse");
    register.classList.toggle("collapse");
  } else {
    login.classList.toggle("collapse");
    register.classList.toggle("collapse");
  }
}

/*---- Loading -----*/

function loadingfunction() {
  if (loading === false) {
    loader.style.opacity = "1";
    loader.style.visibility = "visible";
  } else if (loading === true) {
    loader.style.opacity = "0";
    loader.style.visibility = "hidden";
  }
}

/*---- Fin Loading -----*/

/*---- Ajax ----*/

var formData = new FormData();
let param = true;
formData.append("param", param);

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
}

/*----- Fin Ajax -----*/

/*---- Registro -----*/

var dataregister = document.getElementById("form-register");
let alertdanger = document.getElementById("alert-danger"),
  alertsuccess = document.getElementById("alert-success"),
  logalertsuccess = document.getElementById("logalert-success");
const nombresregistro = document.getElementById("nombresregistro"),
  apellidosregistro = document.getElementById("apellidosregistro"),
  correoregistro = document.getElementById("correosregistro"),
  contraregistro = document.getElementById("contraregistro"),
  ccontraregistro = document.getElementById("ccontraregistro");

dataregister.addEventListener("submit", (event) => {

  var formregister = new FormData(dataregister);
  formregister.append("param", param);

  ajax({
    url: `./usuario/registrarusuario`,
    method: "POST",
    // async: true,
    // responseType: 'json',
    done: registro,
    error: rendererror,
    form: formregister,
  });

  event.preventDefault();
});

function rendererror(status) {
  console.log(`${status} Ha ocurrido un error`);
}

function registro(datos){

  for (var key in datos) {

    console.log(key);
    if (key !== "loading") {
      alertsuccess.classList.add("collapse");
      alertdanger.classList.add("collapse");
      if (key === "registron-error") {
        alertsuccess.classList.remove("collapse");
        alertsuccess.innerHTML = datos['registron-error'];
        nombresregistro.value = "";
        apellidosregistro.value = "";
        correoregistro.value = "";
        contraregistro.value = "";
        ccontraregistro.value = "";
        setTimeout(() => {
          changelogin();
          logalertsuccess.classList.remove("collapse");
          logalertsuccess.innerHTML = datos['registron-error'];
        }, 400);
      } else {
        alertdanger.classList.remove("collapse");
        alertdanger.innerHTML = datos[''+key+''];
      }
    }

  }

}



/* if (form.get('correoregistro') === "" &&
form.get('nombreregistro') === "" &&
form.get('apellidoregistro') === "" &&
form.get('passwordregistro') === "") {
alert("El formulario esta vacío");
} else {

if (form.get('correoregistro') === "") {

document.getElementById("correoerror").innerHTML = `<p class="errores">El Campo Correo esta vacío.</p>`;

} else if (form.get('nombreregistro') === "") {

document.getElementById("nombreerror").innerHTML = `<p class="errores">El Campo Nombres esta vacío.</p>`;

} else if (form.get('apellidoregistro') === "") {

document.getElementById("apellidoerror").innerHTML = `<p class="errores">El Campo Apellido esta vacío.</p>`;

} else if (form.get('passwordregistro') === "") {

document.getElementById("passworderror").innerHTML = `<p class="errores">El Campo password esta vacío.</p>`;

} else { */

/* document.getElementById("correoerror").innerHTML = ``;
document.getElementById("nombreerror").innerHTML = ``;
document.getElementById("apellidoerror").innerHTML = ``;
document.getElementById("passworderror").innerHTML = ``; */

/*---- Login -----*/

var xhr = new XMLHttpRequest();
var datalogin = document.getElementById("form-login");
let logalertdanger = document.getElementById("logalert-danger");
const correolog = document.getElementById("correologin"),
      contralog = document.getElementById("contralogin");

datalogin.addEventListener("submit", (event) => {

  var formlogin = new FormData(datalogin);
  formlogin.append("param", param);
  logalertdanger.classList.add("collapse");
  ajax({
    url: `./usuario/iniciarsesion`,
    method: "POST",
    // async: true,
    // responseType: 'json',
    done: loginfunction,
    error: rendererror,
    form: formlogin,
  });

  event.preventDefault();

});


function loginfunction(datos)
{

  console.log(datos);

  for (var key in datos) {

    if (key==="user-login") {
      window.location="./";
    } else if (key === "user-active"){
      logalertdanger.classList.remove("collapse");
      logalertdanger.innerHTML = datos['user-active'];
    } else if (key === "user-error") {
      logalertdanger.classList.remove("collapse");
      logalertdanger.innerHTML = datos['user-error'];
    }

  }

}



/*---- Encuesta -----*/

  /*- Opciones -*/

let pregunta1 = document.getElementById('pregunta-1'),
    pregunta2 = document.getElementById('pregunta-2'),
    pregunta3 = document.getElementById('pregunta-3'),
    pregunta4 = document.getElementById('pregunta-4'),
    soption1 = document.getElementById('s-option-1'),
    noption1 = document.getElementById('n-option-1'),
    soption2 = document.getElementById('s-option-2'),
    noption2 = document.getElementById('n-option-2'),
    soption3 = document.getElementById('s-option-3'),
    noption3 = document.getElementById('n-option-3'),
    soption4 = document.getElementById('s-option-4'),
    noption4 = document.getElementById('n-option-4');


    function iniciarencuesta() {
      pregunta1.classList.remove('encuesta-border');
      pregunta2.classList.add('collapse');
      pregunta3.classList.add('collapse');
      pregunta4.classList.add('collapse');
      continuar2.classList.add('isdisabled');
      soption1.checked = false;
      noption1.checked = false;
      soption2.checked = false;
      noption2.checked = false;
      soption3.checked = false;
      noption3.checked = false;
      soption4.checked = false;
      noption4.checked = false;
    }

soption1.addEventListener("change", () => {

  pregunta1.classList.remove('encuesta-border');
  pregunta2.classList.add('collapse');
  pregunta3.classList.add('collapse');
  pregunta4.classList.add('collapse');
  continuar2.classList.remove('isdisabled');
  soption2.checked = false;
  noption2.checked = false;
  soption3.checked = false;
  noption3.checked = false;
  soption4.checked = false;
  noption4.checked = false;

});

noption1.addEventListener("change", () => {

  pregunta1.classList.add('encuesta-border');
  pregunta2.classList.remove('collapse');
  continuar2.classList.add('isdisabled');

});

soption2.addEventListener("change", () => {

  pregunta2.classList.remove('encuesta-border');
  pregunta3.classList.add('collapse');
  pregunta4.classList.add('collapse');
  continuar2.classList.remove('isdisabled');
  soption3.checked = false;
  noption3.checked = false;
  soption4.checked = false;
  noption4.checked = false;

});

noption2.addEventListener("change", () => {

  pregunta2.classList.add('encuesta-border');
  pregunta3.classList.remove('collapse');
  continuar2.classList.add('isdisabled');

});


soption3.addEventListener("change", () => {

  pregunta3.classList.remove('encuesta-border');
  pregunta4.classList.add('collapse');
  continuar2.classList.remove('isdisabled');
  soption4.checked = false;
  noption4.checked = false;

});

noption3.addEventListener("change", () => {

  pregunta3.classList.add('encuesta-border');
  pregunta4.classList.remove('collapse');
  continuar2.classList.add('isdisabled');

});


soption4.addEventListener("change", () => {

  continuar2.classList.remove('isdisabled');

});

noption4.addEventListener("change", () => {

  continuar2.classList.remove('isdisabled');

});

  /*--Fin Opciones--*/

  let continuar1 = document.getElementById('continuar-1'),
    continuar2 = document.getElementById('continuar-2'),
    aceptar1 = document.getElementById('aceptar-1');

continuar1.addEventListener('click', (e) => {
  iniciarencuesta();
  e.preventDefault(); 
  modal2.classList.add("collapse2");
  setTimeout(() => {
    modal2.classList.toggle("collapse");
    modalencuesta.classList.toggle("collapse");
    setTimeout(() => {
      modalencuesta.classList.toggle("transition");
    }, 100)
  }, 600);

});

continuar2.addEventListener('click', (e) => {
  e.preventDefault(); 

  if (soption1.checked === true || soption2.checked === true || soption3.checked === true || soption4.checked === true) 
  {
      modal2.classList.add("collapse2");
      modalencuesta.classList.toggle("transition");
      setTimeout(() => {
        modalencuesta.classList.toggle("collapse");
        modalsideclara.classList.remove("modal-close");
        modalsideclara.classList.toggle("collapse");
        setTimeout(() => {
          modalsideclara.classList.add("transition");
        }, 100)
      }, 600);
  } 
  else
  {
      modal2.classList.add("collapse2");
      modalencuesta.classList.toggle("transition");
      setTimeout(() => {
        modalencuesta.classList.toggle("collapse");
        modalnodeclara.classList.remove("modal-close");
        modalnodeclara.classList.toggle("collapse");
        setTimeout(() => {
          modalnodeclara.classList.add("transition");
        }, 100)
      }, 600);
  }

});

aceptar1.addEventListener('click', (e) => {
  e.preventDefault();
  modalencuesta.classList.add("modal-close");
  modalnodeclara.classList.add("modal-close");
  cerrarmodal2(modal2, modalform);
  setTimeout(() => {
    modalnodeclara.classList.remove("collapse");
    modalnodeclara.classList.remove("transition");
  }, 600);
});


/*---- Fin Encuesta ----*/


