const url = '/dianproject/';

let cerrar = document.querySelectorAll(".close")[0],
  cerrar2 = document.querySelectorAll(".close")[1],
  abrir = document.querySelectorAll(".cta")[0],
  abrir2 = document.querySelectorAll(".cta2")[0],
  modal = document.querySelectorAll(".container")[0],
  modalC = document.querySelectorAll(".modal-container")[0],
  cont = 0,
  loading,
  loader = document.getElementById("loader");
const register = document.getElementById("register"),
  btnlogin = document.getElementById("boton-register"),
  btnregister = document.getElementById("boton-login"),
  login = document.getElementById("login");
let booleanlogin = false;

abrir.addEventListener("click", abrirmodal);
abrir2.addEventListener("click", abrirmodal);

function abrirmodal(e) {
  e.preventDefault();
  modalC.style.opacity = "1";
  modalC.style.visibility = "visible";
  modal.classList.toggle("modal-close");
}

cerrar.addEventListener("click", cerrarmodal);
cerrar2.addEventListener("click", cerrarmodal);

function cerrarmodal() {
  modal.classList.toggle("modal-close");
  setTimeout(() => {
    modalC.style.opacity = "0";
    modalC.style.visibility = "hidden";
  }, 600);
}

window.addEventListener("click", function (e) {
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
});

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

/*---- Registro -----*/

var xhr = new XMLHttpRequest();
var dataregister = document.getElementById("form-register");
loading = false;
let alertdanger = document.getElementById("alert-danger"),
  alertsuccess = document.getElementById("alert-success"),
  logalertsuccess = document.getElementById("logalert-success");
const nombresregistro = document.getElementById("nombresregistro"),
  apellidosregistro = document.getElementById("apellidosregistro"),
  correoregistro = document.getElementById("correosregistro"),
  contraregistro = document.getElementById("contraregistro"),
  ccontraregistro = document.getElementById("ccontraregistro");

dataregister.addEventListener("submit", (event) => {
  var form = new FormData(dataregister);
  loadingfunction();
  let estados;
  history.pushState(null, "", url);
  xhr.open("POST", "./usuario/registro");
  xhr.onload = () => {
    if (xhr.status === 200) {
      /* console.log("Conexión Establecida"); */
      estados = JSON.parse(xhr.responseText);
      loading = estados["loading"];
      loadingfunction();
      for (var key in estados) {
        if (key !== "loading") {
          alertsuccess.classList.add("collapse");
          alertdanger.classList.add("collapse");
          if (key === "registron-error") {
            alertsuccess.classList.remove("collapse");
            alertsuccess.innerHTML = estados["registron-error"];
            nombresregistro.value = "";
            apellidosregistro.value = "";
            correoregistro.value = "";
            contraregistro.value = "";
            ccontraregistro.value = "";
            setTimeout(() => {
              changelogin();
              logalertsuccess.classList.remove("collapse");
              logalertsuccess.innerHTML = estados["registron-error"];
            }, 400);
          } else {
            alertdanger.classList.remove("collapse");
            alertdanger.innerHTML = estados[key];
          }
        }
      }
    } else {
      alertdanger.classList.remove("collapse");
      alertdanger.innerHTML = "Error 418";
    }
  };
  xhr.send(form);

  event.preventDefault();
});

function loadingfunction() {
  if (loading === false) {
    loader.style.opacity = "1";
    loader.style.visibility = "visible";
  } else if (loading === true) {
    loader.style.opacity = "0";
    loader.style.visibility = "hidden";
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
loading = false;
let logalertdanger = document.getElementById("logalert-danger");

const correolog = document.getElementById("correologin"),
      contralog = document.getElementById("contralogin");

datalogin.addEventListener("submit", (event) => {
  var form = new FormData(datalogin);
  loadingfunction();
  let estados;

  history.pushState(null, "", url);

  xhr.open("POST", "./usuario/login");
  xhr.onload = () => {
    if (xhr.status === 200) {
      /* console.log("Conexión Establecida"); */
      estados = /* JSON.parse( */xhr.responseText/* ) */;
      loading = true;
      loadingfunction();
      console.log(estados);
      if (estados==="el usuario esta logeado") {
        window.location="./";
      }
      /* for (var key in estados) {
        if (key !== "loading") {
        }
      } */
    } else {
      alertdanger.classList.remove("collapse");
      alertdanger.innerHTML = "Error 418";
    }
  };
  xhr.send(form);

  event.preventDefault();
});
