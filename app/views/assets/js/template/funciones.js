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

