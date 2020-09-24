let cerrar = document.querySelectorAll(".close")[0],
  cerrar2 = document.querySelectorAll(".close")[1],
  abrir = document.querySelectorAll(".cta")[0],
  abrir2 = document.querySelectorAll(".cta2")[0],
  modal = document.querySelectorAll(".container")[0],
  modalC = document.querySelectorAll(".modal-container")[0],
  cont = 0;
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
let loading = false,
  alertdanger = document.getElementById("alert-danger"),
  alertsuccess = document.getElementById("alert-success"),
  logalertsuccess = document.getElementById("logalert-success");
const nombres = document.getElementById("nombresregistro"),
  apellidos = document.getElementById("apellidosregistro"),
  correo = document.getElementById("correosregistro"),
  contra = document.getElementById("contraregistro"),
  ccontra = document.getElementById("ccontraregistro");

dataregister.addEventListener("submit", (event) => {
  var form = new FormData(dataregister);
  loadingfunction();
  let estados;
  xhr.open("POST", "./registro");
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
            nombres.value = "";
            apellidos.value = "";
            correo.value = "";
            contra.value = "";
            ccontra.value = "";
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
    document.getElementById(
      "correoerror"
    ).innerHTML = `<p>El Campo Correo esta vacío.</p>`;
  } else if (loading === true) {
    document.getElementById("correoerror").innerHTML = ``;
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