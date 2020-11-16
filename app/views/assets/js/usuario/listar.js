let tableplace = document.getElementById("table-place"),
  loading,
  loader = document.getElementById("loader");

const url1 = "/dianproject/",
  url2 = "/dianproject/usuario/listar";

let formData = new FormData();
let param = true;
formData.append("param", param);

function ajax({
  url,
  method = "GET",
  async = true,
  done = () => { },
  error = () => { },
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

ajax({
  url: `./usuario/listarusuarios`,
  method: "POST",
  // async: true,
  // responseType: 'json',
  done: rendertabla,
  error: rendererror,
  form: formData,
});

function rendererror(status) {
  console.log(`${status} Ha ocurrido un error`);
}
function rendertabla(datos) {
  loading = false;
  loadingfunction();
  let cont = 0;
  let newdata = [];

  datos.forEach((obj) => {
    cont++;
    newdata.push([
      "" + cont + "",
      "" + obj["nombre"] + "",
      "" + obj["apellido"] + "",
      "" + obj["correo"] + "",
      "" + obj["rol"] + "",
      "" + obj["estado"] + "",
      "<a href='#' id='edit-" + obj["idusuario"] + "' onclick='useredit(event, this.id)' class='user-edit iconslink'><i class='fas fa-user-edit'></i></a>",
      "<a href='#' id='delete-" + obj["idusuario"] + "' onclick='userdelete(event, this.id)' class='user-delete iconslink'><i class='fas fa-trash-alt'></i></a>",
    ]);
  });

  const t = document.createElement("table");
  const data = {
    headings: [
      "#",
      "Nombre",
      "Apellido",
      "Correo",
      "Rol",
      "Estado",
      "<i class='fas fa-user-edit'></i>",
      "<i class='fas fa-trash-alt'></i>",
    ],
    data: newdata,
  };
  if (tableplace.children.length === 1) {
    /* tableplace.removeChild(tableplace.children[0]); */
    tableplace.replaceChild(t, tableplace.children[0]);
  } else {
    tableplace.appendChild(t);
  }
  loading = true;
  loadingfunction();

  setTimeout(() => {

    window.dt = new simpleDatatables.DataTable(t, {
      data,
      labels: {
        placeholder: "Buscar...",
        perPage: "{select} entradas por página.",
        noRows: "No se encontraron entradas..",
        info: "Mostrando {start} a {end} de {rows} entradas encontradas.",
      },
      layout: {
        top: `
    <div class='card-header'>
      <div class='filausuarios'>
        <div class='columna-5'>
          {select}
        </div>
        <div class='columna-5'>
          {search}
        </div>
        <div class='columna-2'>
          <a class="btn btn-block btn-usuarios" id="open-modal-crear" onclick='abrircrear(event)'>Crear Usuarios</a>
        </div>
      </div>
    </div>  
      `,
        bottom: "{info}{pager}",
      },
      perPage: 5,
      perPageSelect: [1, 5, 10, 15, 20, 25],
    });
  }, 100);
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

/*-- Formulario de creacion de usuario --*/

let formcreate = document.getElementById("form-create");

formcreate.addEventListener("submit", (e) => {
  e.preventDefault();

  crearusuario();
});

function crearusuario() {
  let datos = new FormData(formcreate);

  if (
    validacion(
      datos.get("nombrecrear"),
      datos.get("apellidocrear"),
      datos.get("emailcrear"),
      datos.get("telefonocrear"),
      datos.get("cedulacrear"),
      datos.get("passcrear"),
      datos.get("cpasscrear"),
      datos.get("rolcrear"),
      datos.get("estadocrear")
    )
  ) {
    datos.append("param", param);
    ajax({
      url: `./usuario/crear`,
      method: "POST",
      // async: true,
      // responseType: 'json',
      done: recreartable,
      error: rendererror,
      form: datos,
    });
  } else {
    //Aqui van los errores reflejados
  }
}

function validacion(
  $nombre,
  $apellido,
  $correo,
  $telefono,
  $cedula,
  $pass,
  $cpass,
  $rol,
  $estado
) {
  if ($rol === null) {
    return false;
  } else if ($estado === null) {
    return false;
  } else {
    return true;
  }
}

function recreartable() {
  ajax({
    url: `./usuario/listarusuarios`,
    method: "POST",
    // async: true,
    // responseType: 'json',
    done: rendertabla,
    error: rendererror,
    form: formData,
  });
}

/*-- Fin Formulario de creacion de usuario --*/

/*------Eliminar usuario-------*/

function userdelete(e, myid) {
  myid = myid.replace('delete-', '');

  /* formData.append('iduser', myid); */
  ajax({
    url: `./usuario/editar/${myid}`,
    method: "POST",
    // async: true,
    // responseType: 'json',
    done: eliminar,
    error: rendererror,
    form: formData,
  });

  abrirmodal(modal2, modaldel);

  e.preventDefault();
}


function eliminar(datos) {
  let modalheader = document.getElementById('h2-header'),
    modalbody = document.getElementById('modal-body'),
    modalfooter = document.getElementById('modal-footer');

  let nombre = datos[0]['nombre'].split(' '),
    apellido = datos[0]['apellido'].split(' ');

  modalheader.innerHTML = 'Eliminar usuario llamado ' + nombre[0] + ' ' + apellido[0];
  modalbody.innerHTML = '<p> Estas seguro que deseas eliminar el usuario llamado ' + nombre[0] + ' ' + apellido[0] + ' ? </p>';
  modalfooter.innerHTML = `<a href="#" id="si-delete" class="btn-modal btn-block-modal btn-delete"> Si </a> <a href="#" id="no-delete" class="btn-modal btn-block-modal btn-delete"> No </a>`;

  let sieliminar = document.getElementById("si-delete"),
    noeliminar = document.getElementById("no-delete");

  noeliminar.addEventListener('click', (e) => {
    e.preventDefault(); cerrarmodal(modal2, modaldel);
  });

  sieliminar.addEventListener('click', (e) => {
    e.preventDefault();

    /* formData.append('iduser', datos[0]['idusuario']); */
    ajax({
      url: `./usuario/eliminar/${datos[0]['idusuario']}`,
      method: "POST",
      // async: true,
      // responseType: 'json',
      done: recreartable,
      error: rendererror,
      form: formData,
    });

    cerrarmodal(modal2, modaldel);

  });
}

/*------Fin Eliminar usuario-------*/


/*------Editar Usuario-------*/

function useredit(e, myid) {
  myid = myid.replace('edit-', '');

  formData.append('iduser', myid);
  ajax({
    url: `./usuario/editar/${myid}`,
    method: "POST",
    // async: true,
    // responseType: 'json',
    done: editar,
    error: rendererror,
    form: formData,
  });

  abrirmodal(modal3, modaledit);

  e.preventDefault();
}

function editar(datos) {
  document.getElementById('codeditar').value = datos[0]['idusuario'];
  document.getElementById('nombreeditar').value = datos[0]['nombre'];
  document.getElementById('apellidoeditar').value = datos[0]['apellido'];
  document.getElementById('emaileditar').value = datos[0]['correo'];
  document.getElementById('telefonoeditar').value = datos[0]['telefono'];
  document.getElementById('cedulaeditar').value = datos[0]['cedula'];
  /* document.getElementById('passeditar').value = '-0p1a2s3s4w5o6r7d89-'; */
  if (datos[0]['rol'].toLowerCase() === 'declarante') {
    document.getElementById('roleditar').selectedIndex = 3;
  } else if (datos[0]['rol'].toLowerCase() === 'contador') {
    document.getElementById('roleditar').selectedIndex = 2;
  } else if (datos[0]['rol'].toLowerCase() === 'coordinador') {

    document.getElementById('roleditar').selectedIndex = 1;

  }
  if (datos[0]['estado'].toLowerCase() === 'inactivo') {
    document.getElementById('estadoeditar').selectedIndex = 2;
  } else if (datos[0]['estado'].toLowerCase() === 'activo') {
    document.getElementById('estadoeditar').selectedIndex = 1;
  }

  /* if (formedit['passeditar'].value == '-0p1a2s3s4w5o6r7d89-') {
    formedit['passeditar'].value = datos[0]['password'];
  }

/*
  let formedit = document.getElementById('form-edit');

  formedit.addEventListener("submit", (e) => {
    e.preventDefault();
    
    c
    let formdatos = new FormData(formedit);
    formdatos.append('iduser', datos[0]['idusuario']);
    formdatos.append("param", param);
    
    ajax({
      url: `./usuario/editarusuariosid`,
      method: "POST",
      // async: true,
      // responseType: 'json',
      done: recreartable,
      error: rendererror,
      form: datos,
    });
    
  }); */

}

let formedit = document.getElementById("form-edit");




formedit.addEventListener("submit", (e) => {
  e.preventDefault();
  let formdatos = new FormData(formedit);
  formdatos.append("param", param);
  /*   formdatos.append("codeditar", formedit['ideditar'].value); */
  let formid = formedit['codeditar'].value;
  ajax({
    url: `./usuario/editarusuarios/${formid}`,
    method: "POST",
    // async: true,
    // responseType: 'json',
    done: recreartable,
    error: rendererror,
    form: formdatos,
  });


});

