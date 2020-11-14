//#region Ajax
const url1 = "/dianproject/";
const url2 = "/dianproject/parametros/listar";
let loading;
let loader = document.getElementById("loader");

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

function loadingfunction() {
  if (loading === false) {
    loader.style.opacity = "1";
    loader.style.visibility = "visible";
  } else if (loading === true) {
    loader.style.opacity = "0";
    loader.style.visibility = "hidden";
  }
}
//#endregion

//#region Creación de la tabla
const dt = new DataTable('#datatable', 'parametros', [
    {
        id: 'bAdd',
        text: 'Crear Parametros',
        icon: 'fas fa-paste',
        type: 'button',
        action: function(){
            /* console.log(dt.getSelected()); */
        }
    },
    /* {
        id: 'bDelete',
        text: 'Eliminar',
        icon: 'far fa-trash-alt',
        type: 'button',
        action: function(){
            console.log('Acción de eliminar');
        }
    } */
]);

dt.parse();
//#endregion

//#region Inicializar editar
function editar(datos)
{
  document.getElementById('idpr').value = datos[0]['idparametro'];
  document.getElementById('anioeditar').value = datos[0]['annoperiodo'];
  document.getElementById('marcoleditar').value = datos[0]['marcolegal'];
  document.getElementById('marcoceditar').value = datos[0]['marcocalendario'];
  document.getElementById('valoreditar').value = datos[0]['valortributario'];
  document.getElementById('tope1editar').value = datos[0]['tope1'];
  document.getElementById('tope2editar').value = datos[0]['tope2'];
}
//#endregion

//#region Traer Eliminar Parametro
function eliminarparametro(e, myid) {

  let modaldelete = document.getElementById('modal-delete');

  modaldelete.style.opacity = 1;
  modaldelete.style.visibility = 'visible';

  modaldelete.children[0].classList.remove('modal-close');

  myid = myid.replace('delete-', '');
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
      url: `./parametros/editar/${myid}`,
      method: "POST",
      // async: true,
      // responseType: 'json',
      done: eliminar,
      error: rendererror,
      form: formData,
    });

  e.preventDefault();

}
//#endregion

//#region Eliminar parametros
function eliminar(datos){
  document.getElementById('h2-header').innerHTML = `Eliminar Parametro del Anno ${datos[0]['annoperiodo']}`;
  document.getElementById('modal-body').innerHTML = `<p>¿ Estas seguro que deseas eliminar el Parametro del Anno ${datos[0]['annoperiodo']}?,
                                                          eliminaras todo lo relacionado con este parametro. </p>`;
  document.getElementById('modal-footer').innerHTML = `<a href="#" id="si-eliminar" class="btn-modal btn-block-modal btn-delete"> Si </a> <a href="#" id="no-eliminar" class="btn-modal btn-block-modal btn-delete"> No </a>`;

  let sieliminar = document.getElementById("si-eliminar");
  let noeliminar = document.getElementById("no-eliminar");

  noeliminar.addEventListener('click', (e) => {
    e.preventDefault(); 

    let modaldelete = document.getElementById('modal-delete');

    modaldelete.children[0].classList.add('modal-close');

    setTimeout(() => {
      modaldelete.style.opacity = 0;
      modaldelete.style.visibility = 'hidden';
  }, 500);
  });

  sieliminar.addEventListener('click', (e) => {
    e.preventDefault();
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    /* formData.append('iduser', datos[0]['idusuario']); */
    ajax({
      url: `./parametros/eliminar/${datos[0]['idparametro']}`,
      method: "POST",
      // async: true,
      // responseType: 'json',
      done: setTimeout(() => {location.reload();}, 200),
      error: rendererror,
      form: formData,
    });
  });
}
//#endregion

//#region Inicializar variables
const crearparametro = document.getElementById('bAdd');
const closemodalcrear = document.getElementById('close-modal-crear');
const closemodaleditar = document.getElementById('close-modal-editar');
const clodemodaldelete = document.getElementById('close-modal-delete');
let cont = 0;
let cont2 = 0;
//#endregion

//#region Modal crear parametro
crearparametro.addEventListener('click', () => {

    if (document.querySelector('.alertbasic')) {
      alerta("Solo puedes crear un parametro por Anno de declaración.", '.alertbasic');
    }else{
      let modalcrear = document.getElementById('modal-crear');
      modalcrear.style.opacity = 1;
      modalcrear.style.visibility = 'visible';
      modalcrear.children[0].classList.remove('modal-close');
    }

});
//#endregion

//#region Cerrar modal crear

if (!document.querySelector('.alertbasic')) {
closemodalcrear.addEventListener('click', () => {

    let modalcrear = document.getElementById('modal-crear');

    modalcrear.children[0].classList.add('modal-close');

    setTimeout(() => {
        modalcrear.style.opacity = 0;
        modalcrear.style.visibility = 'hidden';
    }, 500);

});
}
//#endregion

//#region Cerrar modal editar

closemodaleditar.addEventListener('click', () => {

  let modaleditar = document.getElementById('modal-editar');

    modaleditar.children[0].classList.add('modal-close');

    setTimeout(() => {
      modaleditar.style.opacity = 0;
      modaleditar.style.visibility = 'hidden';
  }, 500);

});

//#endregion

//#region Cerrar modal delete
clodemodaldelete.addEventListener('click', () => {

  let modaldelete = document.getElementById('modal-delete');

    modaldelete.children[0].classList.add('modal-close');

    setTimeout(() => {
      modaldelete.style.opacity = 0;
      modaldelete.style.visibility = 'hidden';
  }, 500);

});
//#endregion

//#region Dentro del modal crear
/* --- Dentro del modal crear --- */
if (!document.querySelector('.alertbasic')) {
const nextBtnFirst = document.querySelector(".firstNext");
const prevBtnFirst = document.querySelector(".firstPrev");
const progressText = document.querySelectorAll(".step .stepcrear");
const progressCheck = document.querySelectorAll(".step .checkcrear");
const bullet = document.querySelectorAll(".step .bulletcrear");
const slidePage = document.querySelector(".slide-page-crear");
const slidePage2 = document.querySelector(".slide-page-crear-2");
const formSubmit = document.getElementById('form-crear');
let current = 1;
slidePage2.style.display = "none";

nextBtnFirst.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.display = "none";
  slidePage2.style.display = "block";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
});

prevBtnFirst.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.display = "block";
  slidePage2.style.display = "none";
  
  if (current === 3) {
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -=2;
    bullet[current - 1].classList.remove("active");
    progressCheck[current - 1].classList.remove("active");
    progressText[current - 1].classList.remove("active");
  }else{
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -= 1;
  }
});


formSubmit.addEventListener("submit", (e) => {
  e.preventDefault();
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
  setTimeout(function(){

    let formData = new FormData(formSubmit);
    let param = true;
    formData.append("param", param);
    /* if (formSubmit['estadoparametro'].checked === true) {
      formData.append("estadoparametro", 1)
    }else{
      formData.append("estadoparametro", 0)
    } */
    ajax({
      url: `./parametros/crear`,
      method: "POST",
      // async: true,
      // responseType: 'json',
      done: setTimeout(() => {location.reload();}, 200),
      error: rendererror,
      form: formData,
    });   
    if (current === 3) {
      slidePage.style.display = "block";
      slidePage2.style.display = "none";
      bullet[current - 2].classList.remove("active");
      progressCheck[current - 2].classList.remove("active");
      progressText[current - 2].classList.remove("active");
      current -=2;
      bullet[current - 1].classList.remove("active");
      progressCheck[current - 1].classList.remove("active");
      progressText[current - 1].classList.remove("active");
    }
  },800);
  
});
}
/* ----------------------- */

//#endregion 

//#region Dentro del modal editar
/*--- Dentro del modal editar ---*/

const nextBtnFirstEdit = document.querySelector(".firstNextEditar");
const prevBtnFirstEdit = document.querySelector(".firstPrevEditar");
const progressTextEdit = document.querySelectorAll(".step .stepeditar");
const progressCheckEdit = document.querySelectorAll(".step .checkeditar");
const bulletEdit = document.querySelectorAll(".step .bulleteditar");
const slidePageEdit = document.querySelector(".slide-page-editar");
const slidePage2Edit = document.querySelector(".slide-page-editar-2");
const formSubmitEdit = document.getElementById('form-editar');
let currentEdit = 1;
slidePage2Edit.style.display = "none";

nextBtnFirstEdit.addEventListener("click", function(event){
  event.preventDefault();
  slidePageEdit.style.display = "none";
  slidePage2Edit.style.display = "block";
  bulletEdit[currentEdit - 1].classList.add("active");
  progressCheckEdit[currentEdit - 1].classList.add("active");
  progressTextEdit[currentEdit - 1].classList.add("active");
  currentEdit += 1;
});

prevBtnFirstEdit.addEventListener("click", function(event){
  event.preventDefault();
  slidePageEdit.style.display = "block";
  slidePage2Edit.style.display = "none";
  
  if (currentEdit === 3) {
    bulletEdit[currentEdit - 2].classList.remove("active");
    progressCheckEdit[currentEdit - 2].classList.remove("active");
    progressTextEdit[currentEdit - 2].classList.remove("active");
    currentEdit -=2;
    bulletEdit[currentEdit - 1].classList.remove("active");
    progressCheckEdit[currentEdit - 1].classList.remove("active");
    progressTextEdit[currentEdit - 1].classList.remove("active");
  }else{
    bulletEdit[currentEdit - 2].classList.remove("active");
    progressCheckEdit[currentEdit - 2].classList.remove("active");
    progressTextEdit[currentEdit - 2].classList.remove("active");
    currentEdit -= 1;
  }
});


formSubmitEdit.addEventListener("submit", (e) => {
  e.preventDefault();
  bulletEdit[currentEdit - 1].classList.add("active");
  progressCheckEdit[currentEdit - 1].classList.add("active");
  progressTextEdit[currentEdit - 1].classList.add("active");
  currentEdit += 1;
  setTimeout(function(){
    
    let formData = new FormData(formSubmitEdit);
    let param = true;
    formData.append("param", param);
    /* if (formSubmitEdit['estadoeditar'].checked === true) {
      formData.append("estadoeditar", 1)
    }else{
      formData.append("estadoeditar", 0)
    } */
    let id = formSubmitEdit['idpr'].value;
    id = id.replace('edit-', '');
    ajax({
      url: `./parametros/editarparametros/${id}`,
      method: "POST",
      // async: true,
      // responseType: 'json',
      done: setTimeout(() => {location.reload();}, 200),
      error: rendererror,
      form: formData,
    });
    if (currentEdit === 3) {
      slidePageEdit.style.display = "block";
      slidePage2Edit.style.display = "none";
      bulletEdit[currentEdit - 2].classList.remove("active");
      progressCheckEdit[currentEdit - 2].classList.remove("active");
      progressTextEdit[currentEdit - 2].classList.remove("active");
      currentEdit -=2;
      bulletEdit[currentEdit - 1].classList.remove("active");
      progressCheckEdit[currentEdit - 1].classList.remove("active");
      progressTextEdit[currentEdit - 1].classList.remove("active");
    }
  },800);
  
});


/*--------------------------------*/
//#endregion

//#region Editar parametro
function editarparametro(e, myid){
  let modaleditar = document.getElementById('modal-editar');

  //#region Poner el modal en orden
    
  slidePageEdit.style.display = "block";
  slidePage2Edit.style.display = "none";
  

  if (currentEdit === 3) {
    bulletEdit[currentEdit - 2].classList.remove("active");
    progressCheckEdit[currentEdit - 2].classList.remove("active");
    progressTextEdit[currentEdit - 2].classList.remove("active");
    currentEdit -=2;
    bulletEdit[currentEdit - 1].classList.remove("active");
    progressCheckEdit[currentEdit - 1].classList.remove("active");
    progressTextEdit[currentEdit - 1].classList.remove("active");
  }else if(currentEdit === 2){
    bulletEdit[currentEdit - 2].classList.remove("active");
    progressCheckEdit[currentEdit - 2].classList.remove("active");
    progressTextEdit[currentEdit - 2].classList.remove("active");
    currentEdit -= 1;
  }else{
    bulletEdit[currentEdit - 1].classList.remove("active");
    progressCheckEdit[currentEdit - 1].classList.remove("active");
    progressTextEdit[currentEdit - 1].classList.remove("active");
  }

  //#endregion

    modaleditar.style.opacity = 1;
    modaleditar.style.visibility = 'visible';

    modaleditar.children[0].classList.remove('modal-close');
    myid = myid.replace('edit-', '');
    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    ajax({
      url: `./parametros/editar/${myid}`,
      method: "POST",
      // async: true,
      // responseType: 'json',
      done: editar,
      error: rendererror,
      form: formData,
    });

  e.preventDefault();
}
//#endregion 


/* let mischecks = document.querySelectorAll('.checkbox-1');
for (let i = 0; i < mischecks.length; i++){
  mischecks[i].children[1].addEventListener('click', () => {
    
    if (mischecks[i].children[0].checked === true) {
      mischecks[i].children[1].style.left = '5px';
      mischecks[i].children[1].style.right = '0';
    }else{
      
      mischecks[i].children[1].style.left = 'auto';
      mischecks[i].children[1].style.right = '5px';
    }
  }) 
} */

//#region Navegaciones

    const nav1 = document.getElementById("nav-1");
    const nav2 = document.getElementById("nav-2");
    const parametros = document.getElementById("parametros");
    const calendario = document.getElementById("calendario");

    nav1.addEventListener('click', (e) => {
      e.preventDefault();
      activarboton(nav1, nav2);
      activartab(parametros, calendario);
    });

    nav2.addEventListener('click', (e) => {
      let fecha = new Date().getFullYear();

      if (!document.querySelector('.alertbasic')) {
        document.getElementById('alertas').innerHTML = `
        <div class="alertaway hide displaynone">
        <span class="fas fa-exclamation-circle"></span>
        <span class="msg"></span>
        <div id="close-btn" class="close-btn">
            <span class="fas fa-times"></span>
        </div>
        </div>
        `;
        alerta(`Debes tener al menos un parametro del anno de declaración ${fecha - 1}.`, '.alertaway');
      } else{
        e.preventDefault();
        activarboton(nav2, nav1);
        activartab(calendario, parametros);
      }
    });

    function activarboton(botonactivo, botoninactivo1){
      botonactivo.classList.add("active");
      botoninactivo1.classList.remove("active");
    }



    function activartab (tabactivo, tabinactivo1) {
      tabactivo.classList.add("active");
      tabinactivo1.classList.remove("active");
    }

//#endregion

//#region Alerta
function alerta($text, $nombre) {
  
  document.querySelector('.msg').innerHTML = $text;
      cont = cont+1;
        if (cont === 1) {
          let alerta = document.querySelector($nombre);
            alerta.classList.remove('displaynone');
            alerta.classList.add('show');
            alerta.classList.remove('hide');
            alerta.classList.add('showAlert');
            setTimeout(() => {
            alerta.classList.remove('show');
            alerta.classList.add('hide');
            setTimeout(() => {
              alerta.classList.add('displaynone');
              cont = 0;
            }, 1000);
        }, 5000);
          alerta.children[2].addEventListener('click', () =>{
              cont2 = cont2+1;
              if (cont2 === 1) {
                alerta.classList.remove('show');
                alerta.classList.add('hide');
                setTimeout(() => {
                  alerta.classList.add('displaynone');
                  cont = 0;
                  cont2 = 0;
                }, 1000);
                
              }
        });
        }

}

//#endregion