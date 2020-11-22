//#region Ajax
const url1 = "/dianproject/";
let loading;
let loader = document.getElementById("loader");

function ajax({ url, method = "GET", async = true, done = () => { }, error = () => { }, responseType = "json", form = null, urlactual }) {
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
    history.pushState(null, "", urlactual);
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

//#region Alerta
let cont = 0;
let cont2 = 0;
function alerta($text, $nombre) {

    document.querySelector('.msg').innerHTML = $text;
    cont = cont + 1;
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
        alerta.children[2].addEventListener('click', () => {
            cont2 = cont2 + 1;
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

  //#region Quitar Acentos

function quitaracentosfun(cadena){
	const acentos = {'á':'a','é':'e','í':'i','ó':'o','ú':'u','Á':'A','É':'E','Í':'I','Ó':'O','Ú':'U'};
	return cadena.split('').map( letra => acentos[letra] || letra).join('').toString();	
}

//#endregion