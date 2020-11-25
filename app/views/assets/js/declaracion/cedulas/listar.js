//#region Creación de la tabla Cedulas
const dtcedulas = new DataTable('#datatable-cedulas', 'Cedulas', [
    {
        id: 'bAddcedulas',
        text: 'Crear Cedulas',
        icon: 'fas fa-paste',
        type: 'button',
        action: function () {
            let modalcrear = document.getElementById("modal-crear-cedulas");

            //#region Cerrar modal editar
            modalcrear.children[0].children[0].children[0].children[0].addEventListener(
                "click",
                () => {
                    modalcrear.children[0].classList.add("modal-close");

                    setTimeout(() => {
                        modalcrear.style.opacity = 0;
                        modalcrear.style.visibility = "hidden";
                    }, 500);
                }
            );

            //#endregion

            modalcrear.style.opacity = 1;
            modalcrear.style.visibility = "visible";
            modalcrear.children[0].classList.remove("modal-close");
        }
    }
]);

dtcedulas.parse();
//#endregion

//#region Dentro del modal crear cedulas

const nextBtnFirstcedulas = document.querySelector(".firstNextcedulas");
const prevBtnFirstcedulas = document.querySelector(".firstPrevcedulas");
const slidePagecedulas = document.querySelector(".slide-page-crear-cedulas");
const slidePage2cedulas = document.querySelector(".slide-page-crear-2-cedulas");
let currentcedulas = 1;
slidePage2cedulas.style.display = "none";

prevBtnFirstcedulas.addEventListener("click", function (event) {
    event.preventDefault();
    slidePagecedulas.style.display = "block";
    slidePage2cedulas.style.display = "none";
});


//#endregion

//#region Llenar tipo cedula

let cedulacrear = document.getElementById('rentacedulascrear');
let tipocedulacrear = document.getElementById('tipocedulacrear');
let divtiporentacrearcedula = document.getElementById('divtiporentacrearcedula');
let tiporentacedulacrear = document.getElementById('tiporentacedulacrear');
let divaspectoscrearcedula = document.getElementById('divaspectoscrearcedula'); 
let aspectoscedulascrear = document.getElementById('aspectoscedulascrear');
let tipoaspectoscedulascrear = document.getElementById('tipoaspectoscedulascrear');
let divtiposubaspectoscrearcedula = document.getElementById('divtiposubaspectoscrearcedula');
let tiposubaspectoscedulascrear = document.getElementById('tiposubaspectoscedulascrear');
let divmesessalariocedulascrear = document.getElementById('divmesessalariocedulascrear');
let divnombrecrearcedulas = document.getElementById('divnombrecrearcedulas');
let divvalorcedulascrear = document.getElementById('divvalorcedulascrear');

cedulacrear.addEventListener('change', (e) => {

    e.preventDefault();
    divtiporentacrearcedula.classList.add("scond");
    tiporentacedulacrear.setAttribute('disabled', 'disabled');
    nextBtnFirstcedulas.classList.add('isdisabled');
    divaspectoscrearcedula.classList.add('scond');
    aspectoscedulascrear.setAttribute('disabled', 'disabled');
    divtiposubaspectoscrearcedula.classList.add('scond');
    tiposubaspectoscedulascrear.setAttribute('disabled', 'disabled');

    if (cedulacrear.value == "cedulageneral") {

        tipocedulacrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el tipo de Cedula</option>
        <option value="rentatrabajo">Renta de trabajo</option>
        <option value="rentacapital">Renta de capital</option>
        <option value="rentanolaboral">Renta no laboral</option>`;
        
    } else if (cedulacrear.value == "cedulapensiones") {

        tipocedulacrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el tipo de Cedula</option>
        <option value="ingresobruto">Ingreso Bruto</option>
        <option value="ingresonoconse">Ingreso no constitutivo</option>
        <option value="rentaexenta">Renta exenta</option>`;
        
    } else if (cedulacrear.value == "ceduladividendosyparticipaciones") {

        tipocedulacrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el tipo de Cedula</option>
        <option value="dividendosyparticipaciones">Dividendos y participaciones 2016</option>
        <option value="subcedula1a">Subcedula 1a</option>
        <option value="subcedula2a">Subcedula 2a</option>
        <option value="ingresosnoconse">Ingresos no Constitutivos</option>
        <option value="rentaliquidaece">Renta liquida ECE</option>`;
        
    }

    tipocedulacrear.removeAttribute('disabled');

});

//#endregion

//#region Llenar tipo de renta

tipocedulacrear.addEventListener('change', () => {

    nextBtnFirstcedulas.classList.add('isdisabled');
    divaspectoscrearcedula.classList.add('scond');
    aspectoscedulascrear.setAttribute('disabled', 'disabled');
    divtiposubaspectoscrearcedula.classList.add('scond');
    tiposubaspectoscedulascrear.setAttribute('disabled', 'disabled');

    if (cedulacrear.value === "cedulageneral") {
        
        if (tipocedulacrear.value === "rentatrabajo") {
            
            tiporentacedulacrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione la Renta</option>
            <option value="ingresobruto">Ingreso bruto</option>
            <option value="ingresosnoconse">Ingreso no Constitutivos</option>
            <option value="deducciones">Deducciones</option>
            <option value="rentaexenta">Renta exenta</option>`
            
        } else if (tipocedulacrear.value === "rentacapital") {
            
            tiporentacedulacrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione la Renta</option>
            <option value="ingresobrutocapital">Ingreso bruto</option>
            <option value="ingresosnoconsecapital">Ingreso no Constitutivos</option>
            <option value="costogastoproce">Costos y gastos procedentes</option>
            <option value="rentaliqpasece">Rentas líquidas pasivas de capital - ECE</option>
            <option value="rentaexentadeduccion">Rentas Exenta de deducción</option>`
            
        } else if (tipocedulacrear.value === "rentanolaboral") {
            
            tiporentacedulacrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione la Renta</option>
            <option value="ingresobrutonolaboral">Ingreso bruto</option>
            <option value="devdescreb">Devoluciones rebajas y descuentos</option>
            <option value="ingresosnoconsenolaboral">Ingreso no Constitutivos</option>
            <option value="costogastoproce">Costos y gastos procedentes</option>
            <option value="rentaliqpasece">Rentas líquidas pasivas de capital - ECE</option>
            <option value="rentaexentadeduccion">Renta exenta de deducción</option>`
            
        }

        divtiporentacrearcedula.classList.remove("scond");
        tiporentacedulacrear.removeAttribute('disabled');

    } else if (cedulacrear.value === "cedulapensiones") {

        if (tipocedulacrear.value === "ingresobruto") {
            
            tiporentacedulacrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el tipo de Renta</option>
            <option value="ingresopensiones">Ingreso de pensiones</option>
            <option value="devolucionesahorro">Devoluciones de ahorro</option>
            <option value="indemnizacionsustitutas">Indemnización sustitutas</option>
            <option value="pensionesexterior">Pensiones exterior</option>`
            
        } else if (tipocedulacrear.value === "ingresonoconse") {
            
            tiporentacedulacrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el tipo de Renta</option>
            <option value="aportesobligatorios">Aportes obligatorios</option>`
            
        } else if (tipocedulacrear.value === "rentaexenta") {
            
            divtiporentacrearcedula.classList.add("scond");
            tiporentacedulacrear.setAttribute('disabled', 'disabled');
            nextBtnFirstcedulas.classList.remove('isdisabled');
            
        }

        if (tipocedulacrear.value !== "rentaexenta") {

            divtiporentacrearcedula.classList.remove("scond");
            tiporentacedulacrear.removeAttribute('disabled');
            
        }
        
    } else if (cedulacrear.value === "ceduladividendosyparticipaciones") {

        nextBtnFirstcedulas.classList.remove('isdisabled');
        
    }

});

//#endregion

//#region Llenar Tipo Renta

tiporentacedulacrear.addEventListener('change', () => {

    divaspectoscrearcedula.classList.remove('scond');
    aspectoscedulascrear.removeAttribute('disabled');
    nextBtnFirstcedulas.classList.add('isdisabled');
    divtiposubaspectoscrearcedula.classList.add('scond');
    tiposubaspectoscedulascrear.setAttribute('disabled', 'disabled');

    if (cedulacrear.value === "cedulageneral") {

        if (tipocedulacrear.value === "rentatrabajo") {

            if (tiporentacedulacrear.value === "ingresobruto") {
                
                aspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Aspecto</option>
                <option value="salario">Salario</option>
                <option value="honorarios">Honorarios</option>
                <option value="prestasociales">Prestaciones Sociales</option>
                <option value="otrospagos">Otros Pagos</option>
                <option value="viaticos">Viaticos</option>
                <option value="cesantiaintereses">Cesantía de intereses</option>`;
                
            } else if (tiporentacedulacrear.value === "ingresosnoconse") {

                aspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Aspecto</option>
                <option value="aportesobligatorios">Aportes Obligatorios</option>
                <option value="aportesvoluntarios">Aportes Voluntarios</option>
                <option value="aporteseconoedu">Aportes economicos de educación</option>
                <option value="pagosalimen">Pagos Alimentación</option>`;
                
            } else if (tiporentacedulacrear.value === "deducciones") {

                let formData = new FormData();
                let param = true;
                formData.append("param", param);
                ajax({
                    url: `./declaracion/traertipo/cedulas/cedulageneral/rentatrabajo/deducciones`,
                    method: 'POST',
                    done: llenardeduccionescedula,
                    error: rendererror,
                    form: formData,
                    urlactual: location.href,
                });

                
            } else if (tiporentacedulacrear.value === "rentaexenta") {

                aspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Aspecto</option>
                <option value="indemnizacion">Indemnización</option>
                <option value="gastosrepresentacion">Gastos representación</option>
                <option value="primacancilleria">Prima Cancilleria</option>
                <option value="fuerzapublica">Fuerza Pública</option>`;
                
            }
            
        } else if(tipocedulacrear.value === "rentacapital"){

            if (tiporentacedulacrear.value === "ingresobrutocapital") {
                
                aspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Aspecto</option>
                <option value="interesesrendimientos">Intereses Rendimientos</option>
                <option value="otrosingresos">Otros Ingresos</option>`;

            } else if (tiporentacedulacrear.value === "ingresosnoconsecapital") {
                
                aspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Aspecto</option>
                <option value="aportesobligatorios">Aportes Obligatorios</option>
                <option value="aportesvoluntarios">Aportes Voluntarios</option>`;

            } else if (tiporentacedulacrear.value === "costogastoproce") {
                
                aspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Aspecto</option>
                <option value="interesesprestamos">Intereses Prestamos</option>
                <option value="otroscostogastos">Otros Costo de Gastos</option>`;

            } else if (tiporentacedulacrear.value === "rentaliqpasece") {
                
                nextBtnFirstcedulas.classList.remove('isdisabled');
                divaspectoscrearcedula.classList.add('scond');
                aspectoscedulascrear.setAttribute('disabled');

            } else if (tiporentacedulacrear.value === "rentaexentadeduccion") {
                
                let formData = new FormData();
                let param = true;
                formData.append("param", param);
                ajax({
                    url: `./declaracion/traertipo/cedulas/cedulageneral/rentacapital/rentaexentadeduccion`,
                    method: 'POST',
                    done: llenarrentaexentadeduccion,
                    error: rendererror,
                    form: formData,
                    urlactual: location.href,
                });

            }

        } else if (tipocedulacrear.value === "rentanolaboral") {

            if (tiporentacedulacrear.value === "ingresobrutonolaboral") {
                
                aspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Aspecto</option>
                <option value="ingresosnoclasifican">Ingresos que no clasifican</option>
                <option value="indemnizacionnolabo">Indemnizacion no laboral</option>
                <option value="recompensas">Recompensas</option>
                <option value="derechosexplotpropie">Derechos de explotacion de propiedad</option>
                <option value="explotfranquicias">Explotación de franquicias</option>
                <option value="recibidosgananciales">Recibidos Gananciales</option>
                <option value="retirodinerosfondovolu">Retiros de Dinero del fondo Voluntario</option>
                <option value="apoyoseconoestado">Apoyos economicos del estado</option>
                <option value="campanniaspoliticas">Campannias politicas</option>
                <option value="valorbrutoventas">Valor bruto de ventas</option>`;
                
            } else if (tiporentacedulacrear.value === "devdescreb") {
                
                nextBtnFirstcedulas.classList.remove('isdisabled');
                divaspectoscrearcedula.classList.add('scond');
                aspectoscedulascrear.setAttribute('disabled');

            } else if (tiporentacedulacrear.value === "ingresosnoconsenolaboral") {
                
                aspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Aspecto</option>
                <option value="aportesobligatorios">Aportes Obligatorios</option>
                <option value="aportesvoluntarios">Aportes voluntarios</option>
                <option value="recompensas">Recompensas</option>
                <option value="recibidosgananciales">Recibidos gananciales</option>
                <option value="honorariosdesaproyec">Honorarios desarrollo de proyecto</option>
                <option value="aporteseconoedu">Aportes economicos de educacion</option>
                <option value="campanniaspoliticas">Campannias politicas</option>
                <option value="indemnizaaseguradores">Indemnizacion de aseguradoras</option>
                <option value="agroingresoseguro">Agro ingreso seguro</option>`;

            } else if (tiporentacedulacrear.value === "costogastoproce") {
                
                aspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Aspecto</option>
                <option value="interesesprestamos">Intereses de prestamos</option>
                <option value="otroscostogastos">Otros costos de gastos</option>
                <option value="costofiscal">Costo fiscal</option>`;

            } else if (tiporentacedulacrear.value === "rentaliqpasece") {
                
                nextBtnFirstcedulas.classList.remove('isdisabled');
                divaspectoscrearcedula.classList.add('scond');
                aspectoscedulascrear.setAttribute('disabled');

            } else if (tiporentacedulacrear.value === "rentaexentadeduccion") {
                
                let formData = new FormData();
                let param = true;
                formData.append("param", param);
                ajax({
                    url: `./declaracion/traertipo/cedulas/cedulageneral/rentanolaboral/rentaexentadeduccion`,
                    method: 'POST',
                    done: llenarrentaexentadeduccionnolaboral,
                    error: rendererror,
                    form: formData,
                    urlactual: location.href,
                });
            }
            
        }
        
    } else if (cedulacrear.value === "cedulapensiones") {

        if (tipocedulacrear.value === "ingresobruto") {
            
            if (tiporentacedulacrear.value === "ingresopensiones") {
                
                let formData = new FormData();
                let param = true;
                formData.append("param", param);
                ajax({
                    url: `./declaracion/traertipo/cedulas/cedulapensiones/ingresobruto/ingresopensiones`,
                    method: 'POST',
                    done: llenaringresopensiones,
                    error: rendererror,
                    form: formData,
                    urlactual: location.href,
                });
                
            } else if (tiporentacedulacrear.value === "devolucionesahorro") {

                nextBtnFirstcedulas.classList.remove('isdisabled');
                divaspectoscrearcedula.classList.add('scond');
                aspectoscedulascrear.setAttribute('disabled');
                
            } else if (tiporentacedulacrear.value === "indemnizacionsustitutas") {

                nextBtnFirstcedulas.classList.remove('isdisabled');
                divaspectoscrearcedula.classList.add('scond');
                aspectoscedulascrear.setAttribute('disabled');
                
            } else if (tiporentacedulacrear.value === "pensionesexterior") {

                nextBtnFirstcedulas.classList.remove('isdisabled');
                divaspectoscrearcedula.classList.add('scond');
                aspectoscedulascrear.setAttribute('disabled');
                
            }
            
        } else if (tipocedulacrear.value === "ingresonoconse") {
            
            if (tiporentacedulacrear.value === "aportesobligatorios") {
                
                let formData = new FormData();
                let param = true;
                formData.append("param", param);
                ajax({
                    url: `./declaracion/traertipo/cedulas/cedulapensiones/ingresonoconse/aportesobligatorios`,
                    method: 'POST',
                    done: llenaraportesobligatorios,
                    error: rendererror,
                    form: formData,
                    urlactual: location.href,
                });

            }
            
        }
        
    }

});

//#endregion

//#region Dropdownlist aspectoscedulascrear

aspectoscedulascrear.addEventListener('change', () => {

    divtiposubaspectoscrearcedula.classList.add('scond');
    tiposubaspectoscedulascrear.setAttribute('disabled', 'disabled');
    nextBtnFirstcedulas.classList.add('isdisabled');

    if (cedulacrear.value === "cedulageneral") {

        if (tipocedulacrear.value === "rentatrabajo") {

            if (tiporentacedulacrear.value === "ingresobruto") {

                if (aspectoscedulascrear.value === "salario") {
                    
                    nextBtnFirstcedulas.classList.remove('isdisabled');

                } else if (aspectoscedulascrear.value === "honorarios") {
                    
                    nextBtnFirstcedulas.classList.remove('isdisabled');

                } else if (aspectoscedulascrear.value === "viaticos") {

                    nextBtnFirstcedulas.classList.remove('isdisabled');
                    
                } else if (aspectoscedulascrear.value === "otrospagos") {

                    nextBtnFirstcedulas.classList.remove('isdisabled');
                    
                } else if (aspectoscedulascrear.value === "prestasociales") {
                    
                    let formData = new FormData();
                    let param = true;
                    formData.append("param", param);
                    ajax({
                        url: `./declaracion/traertipo/cedulas/cedulageneral/rentatrabajo/ingresobruto/prestasociales`,
                        method: 'POST',
                        done: llenarprestasociales,
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                } else if (aspectoscedulascrear.value === "cesantiaintereses") {
                    nextBtnFirstcedulas.classList.remove('isdisabled');
                }
                
            } else if (tiporentacedulacrear.value === "ingresosnoconse") {

                if (aspectoscedulascrear.value === "aportesobligatorios") {

                    let formData = new FormData();
                    let param = true;
                    formData.append("param", param);
                    ajax({
                        url: `./declaracion/traertipo/cedulas/cedulageneral/rentatrabajo/ingresosnoconse/aportesobligatorios`,
                        method: 'POST',
                        done: llenaraportesobligatoriosgeneral,
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                    
                } else if (aspectoscedulascrear.value === "aportesvoluntarios") {

                    let formData = new FormData();
                    let param = true;
                    formData.append("param", param);
                    ajax({
                        url: `./declaracion/traertipo/cedulas/cedulageneral/rentatrabajo/ingresosnoconse/aportesvoluntarios`,
                        method: 'POST',
                        done: llenaraportesvoluntariosgeneral,
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });
                    
                } else if (aspectoscedulascrear.value === "aporteseconoedu") {

                    nextBtnFirstcedulas.classList.remove('isdisabled');
                    
                } else if (aspectoscedulascrear.value === "pagosalimen") {

                    let formData = new FormData();
                    let param = true;
                    formData.append("param", param);
                    ajax({
                        url: `./declaracion/traertipo/cedulas/cedulageneral/rentatrabajo/ingresosnoconse/pagosalimen`,
                        method: 'POST',
                        done: llenarpagoalimentacion,
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });
                    
                }

            } else if (tiporentacedulacrear.value === "rentaexenta") {

                if (aspectoscedulascrear.value === "indemnizacion") {

                    let formData = new FormData();
                    let param = true;
                    formData.append("param", param);
                    ajax({
                        url: `./declaracion/traertipo/cedulas/cedulageneral/rentatrabajo/rentaexenta/indemnizacion`,
                        method: 'POST',
                        done: llenarindemnizacion,
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });
                    
                } else if (aspectoscedulascrear.value === "gastosrepresentacion") {

                    nextBtnFirstcedulas.classList.remove('isdisabled');
                    
                } else if (aspectoscedulascrear.value === "primacancilleria") {

                    let formData = new FormData();
                    let param = true;
                    formData.append("param", param);
                    ajax({
                        url: `./declaracion/traertipo/cedulas/cedulageneral/rentatrabajo/rentaexenta/primacancilleria`,
                        method: 'POST',
                        done: llenarprimacancilleria,
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });
                    
                } else if (aspectoscedulascrear.value === "fuerzapublica") {

                    divtiposubaspectoscrearcedula.classList.remove('scond');
                    tiposubaspectoscedulascrear.removeAttribute('disabled');
                    tiposubaspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Aspecto</option>
                    <option value="seguromuerte">Seguro de muerte</option>
                    <option value="excesosalariobasico">Exceso salario básico</option>`;
                    
                    tiposubaspectoscedulascrear.addEventListener('change', () => {
                        if (aspectoscedulascrear.value === "fuerzapublica" && tiposubaspectoscedulascrear.value == "seguromuerte") {
                            nextBtnFirstcedulas.classList.remove('isdisabled');
                        } else if (aspectoscedulascrear.value === "fuerzapublica" && tiposubaspectoscedulascrear.value == "excesosalariobasico") {
                            nextBtnFirstcedulas.classList.remove('isdisabled');
                        }
                    });
                }

            }

        } else if(tipocedulacrear.value === "rentacapital"){

            if (tiporentacedulacrear.value === "ingresobrutocapital") {

                if (aspectoscedulascrear.value === "interesesrendimientos") {

                    let formData = new FormData();
                    let param = true;
                    formData.append("param", param);
                    ajax({
                        url: `./declaracion/traertipo/cedulas/cedulageneral/rentacapital/ingresobrutocapital/interesesrendimientos`,
                        method: 'POST',
                        done: llenarinteresesrendimientos,
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });
                    
                } else if (aspectoscedulascrear.value === "otrosingresos") {
                    let formData = new FormData();
                    let param = true;
                    formData.append("param", param);
                    ajax({
                        url: `./declaracion/traertipo/cedulas/cedulageneral/rentacapital/ingresobrutocapital/otrosingresos`,
                        method: 'POST',
                        done: llenarotrosingresos,
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });
                }

            } else if (tiporentacedulacrear.value === "ingresosnoconsecapital") {

                if (aspectoscedulascrear.value === "aportesobligatorios") {

                    let formData = new FormData();
                    let param = true;
                    formData.append("param", param);
                    ajax({
                        url: `./declaracion/traertipo/cedulas/cedulageneral/rentacapital/ingresosnoconsecapital/aportesobligatorios`,
                        method: 'POST',
                        done: llenaraportesobligatorioscapital,
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });
                    
                } else if (aspectoscedulascrear.value === "aportesvoluntarios") {

                    let formData = new FormData();
                    let param = true;
                    formData.append("param", param);
                    ajax({
                        url: `./declaracion/traertipo/cedulas/cedulageneral/rentacapital/ingresosnoconsecapital/aportesvoluntarios`,
                        method: 'POST',
                        done: llenaraportesvoluntarioscapital,
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });
                    
                }
                
            } else if (tiporentacedulacrear.value === "costogastoproce") {

                if (aspectoscedulascrear.value === "interesesprestamos") {

                    nextBtnFirstcedulas.classList.remove('isdisabled');

                } else if (aspectoscedulascrear.value === "otroscostogastos") {

                    let formData = new FormData();
                    let param = true;
                    formData.append("param", param);
                    ajax({
                        url: `./declaracion/traertipo/cedulas/cedulageneral/rentacapital/costogastoproce/otroscostogastos`,
                        method: 'POST',
                        done: llenarotroscostosgastoscapital,
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });
                    
                }

            } 

        } else if (tipocedulacrear.value === "rentanolaboral") {

            if (tiporentacedulacrear.value === "ingresobrutonolaboral") {

                if (aspectoscedulascrear.value === "ingresosnoclasifican") {

                    nextBtnFirstcedulas.classList.remove('isdisabled');

                } else if (aspectoscedulascrear.value === "indemnizacionnolabo") {
                    
                    nextBtnFirstcedulas.classList.remove('isdisabled');

                } else if (aspectoscedulascrear.value === "recompensas") {

                    nextBtnFirstcedulas.classList.remove('isdisabled');
                    
                } else if (aspectoscedulascrear.value === "derechosexplotpropie") {
                    
                    nextBtnFirstcedulas.classList.remove('isdisabled');

                } else if (aspectoscedulascrear.value === "explotfranquicias") {

                    nextBtnFirstcedulas.classList.remove('isdisabled');
                    
                } else if (aspectoscedulascrear.value === "recibidosgananciales") {
                    
                    nextBtnFirstcedulas.classList.remove('isdisabled');

                } else if (aspectoscedulascrear.value === "retirodinerosfondovolu") {

                    nextBtnFirstcedulas.classList.remove('isdisabled');
                    
                } else if (aspectoscedulascrear.value === "apoyoseconoestado") {

                    nextBtnFirstcedulas.classList.remove('isdisabled');
                    
                } else if (aspectoscedulascrear.value === "campanniaspoliticas") {

                    nextBtnFirstcedulas.classList.remove('isdisabled');
                    
                } else if (aspectoscedulascrear.value === "valorbrutoventas") {
                    
                    let formData = new FormData();
                    let param = true;
                    formData.append("param", param);
                    ajax({
                        url: `./declaracion/traertipo/cedulas/cedulageneral/rentanolaboral/ingresobrutonolaboral/valorbrutoventas`,
                        method: 'POST',
                        done: llenarvalorbrutosdeventas,
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                }

            } else if (tiporentacedulacrear.value === "ingresosnoconsenolaboral") {

                if (aspectoscedulascrear.value === "aportesobligatorios") {
                    
                    let formData = new FormData();
                    let param = true;
                    formData.append("param", param);
                    ajax({
                        url: `./declaracion/traertipo/cedulas/cedulageneral/rentanolaboral/ingresosnoconsenolaboral/aportesobligatorios`,
                        method: 'POST',
                        done: llenaraportesobligatoriosnolaboral,
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                } else if (aspectoscedulascrear.value === "aportesvoluntarios") {
                    
                    nextBtnFirstcedulas.classList.remove('isdisabled');

                } else if (aspectoscedulascrear.value === "recompensas") {
                    
                    nextBtnFirstcedulas.classList.remove('isdisabled');

                } else if (aspectoscedulascrear.value === "recibidosgananciales"){

                    nextBtnFirstcedulas.classList.remove('isdisabled');

                } else if (aspectoscedulascrear.value === "honorariosdesaproyec") {

                    nextBtnFirstcedulas.classList.remove('isdisabled');

                } else if (aspectoscedulascrear.value === "aporteseconoedu") {

                    nextBtnFirstcedulas.classList.remove('isdisabled');

                } else if (aspectoscedulascrear.value === "campanniaspoliticas") {
                    
                    nextBtnFirstcedulas.classList.remove('isdisabled');

                } else if (aspectoscedulascrear.value === "indemnizaaseguradores") {
                    
                    nextBtnFirstcedulas.classList.remove('isdisabled');

                } else if (aspectoscedulascrear.value === "agroingresoseguro") {
                    
                    nextBtnFirstcedulas.classList.remove('isdisabled');

                }

            } else if (tiporentacedulacrear.value === "costogastoproce") {

                if (aspectoscedulascrear.value === "interesesprestamos") {

                    nextBtnFirstcedulas.classList.remove('isdisabled');

                } else if (aspectoscedulascrear.value === "otroscostogastos") {
                    
                    let formData = new FormData();
                    let param = true;
                    formData.append("param", param);
                    ajax({
                        url: `./declaracion/traertipo/cedulas/cedulageneral/rentanolaboral/costogastoproce/otroscostogastos`,
                        method: 'POST',
                        done: llenarotroscostosgastosnolaboral,
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                } else if (aspectoscedulascrear.value === "costofiscal") {

                    nextBtnFirstcedulas.classList.remove('isdisabled');
                    
                }

            }

        }

    }

});

//#endregion

//#region llenar deducciones 
function llenardeduccionescedula(datos) {
    if (datos !== null) {
    aspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Aspecto</option>`;
    datos.forEach(tipos => {
        aspectoscedulascrear.innerHTML += `<option value="${tipos['idtipodeduccion']}">${tipos['nombre']}</option>`;

        aspectoscedulascrear.addEventListener('change', () => {
            if (tiporentacedulacrear.value === "deducciones" && aspectoscedulascrear.value == `${tipos['idtipodeduccion']}`) {
                nextBtnFirstcedulas.classList.remove('isdisabled');
            }
        });
        
    });
    }

}

//#endregion

//#region llenar renta exenta deduccion capital

function llenarrentaexentadeduccion(datos) {
    if (datos !== null) {
    aspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Aspecto</option>`;
    datos.forEach(tipos => {
        aspectoscedulascrear.innerHTML += `<option value="${tipos['idtiporentaexededuccioncapital']}">${tipos['nombre']}</option>`;

        aspectoscedulascrear.addEventListener('change', () => {
            if (tiporentacedulacrear.value === "rentaexentadeduccion" && aspectoscedulascrear.value == `${tipos['idtiporentaexededuccioncapital']}`) {
                nextBtnFirstcedulas.classList.remove('isdisabled');
            }
        });
        
    });
    }
}

//#endregion

//#region llenar renta exenta deduccion no laboral

function llenarrentaexentadeduccionnolaboral(datos) {
    if (datos !== null) {
    aspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Aspecto</option>`;
    datos.forEach(tipos => {
        aspectoscedulascrear.innerHTML += `<option value="${tipos['idtiporentaexededuccionlaboral']}">${tipos['nombre']}</option>`;

        aspectoscedulascrear.addEventListener('change', () => {
            if (tiporentacedulacrear.value === "rentaexentadeduccion" && aspectoscedulascrear.value == `${tipos['idtiporentaexededuccionlaboral']}`) {
                nextBtnFirstcedulas.classList.remove('isdisabled');
            }
        });
        
    });
    }
    
}

//#endregion

//#region llenar Ingresos pensiones

function llenaringresopensiones(datos) {
    if (datos !== null) {
    aspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Aspecto</option>`;
    datos.forEach(tipos => {
        aspectoscedulascrear.innerHTML += `<option value="${tipos['idtipoingresospensiones']}">${tipos['nombre']}</option>`;

        aspectoscedulascrear.addEventListener('change', () => {
            if (tiporentacedulacrear.value === "ingresopensiones" && aspectoscedulascrear.value == `${tipos['idtipoingresospensiones']}`) {
                nextBtnFirstcedulas.classList.remove('isdisabled');
            }
        });
        
    });
    }
}

//#endregion

//#region Llenar aportes obligatorios

function llenaraportesobligatorios(datos) {
    if (datos !== null) {
    aspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Aspecto</option>`;
    datos.forEach(tipos => {
        aspectoscedulascrear.innerHTML += `<option value="${tipos['idtipoaportesobligatoriospensiones']}">${tipos['nombre']}</option>`;

        aspectoscedulascrear.addEventListener('change', () => {
            if (tiporentacedulacrear.value === "aportesobligatorios" && aspectoscedulascrear.value == `${tipos['idtipoaportesobligatoriospensiones']}`) {
                nextBtnFirstcedulas.classList.remove('isdisabled');
            }
        });
        
    });
    }

}

//#endregion

//#region Llenar prestaciones sociales

function llenarprestasociales(datos) {
    if (datos !== null) {
        divtiposubaspectoscrearcedula.classList.remove('scond');
        tiposubaspectoscedulascrear.removeAttribute('disabled');
        tiposubaspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Tipo del Sub Aspecto</option>`;
        datos.forEach(tipos => {
            tiposubaspectoscedulascrear.innerHTML += `<option value="${tipos['idtipoprestacion']}">${tipos['nombre']}</option>`;
            
            tiposubaspectoscedulascrear.addEventListener('change', () => {
                if (aspectoscedulascrear.value === "prestasociales" && tiposubaspectoscedulascrear.value == `${tipos['idtipoprestacion']}`) {
                    nextBtnFirstcedulas.classList.remove('isdisabled');
                }
            });
            
        });
    }
        

}

//#endregion

//#region Llenar aportes obligatorios General

function llenaraportesobligatoriosgeneral(datos) {
    
    if (datos !== null) {
        divtiposubaspectoscrearcedula.classList.remove('scond');
        tiposubaspectoscedulascrear.removeAttribute('disabled');
        tiposubaspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Tipo del Sub Aspecto</option>`;
        datos.forEach(tipos => {
            tiposubaspectoscedulascrear.innerHTML += `<option value="${tipos['idtipoaporteobligatorio']}">${tipos['nombre']}</option>`;
            
            tiposubaspectoscedulascrear.addEventListener('change', () => {
                if (aspectoscedulascrear.value === "aportesobligatorios" && tiposubaspectoscedulascrear.value == `${tipos['idtipoaporteobligatorio']}`) {
                    nextBtnFirstcedulas.classList.remove('isdisabled');
                }
            });
            
        });
    }

}

//#endregion

//#region Llenar aportes voluntarios general

function llenaraportesvoluntariosgeneral(datos) {

    if (datos !== null) {
        divtiposubaspectoscrearcedula.classList.remove('scond');
        tiposubaspectoscedulascrear.removeAttribute('disabled');
        tiposubaspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Tipo del Sub Aspecto</option>`;
        datos.forEach(tipos => {
            tiposubaspectoscedulascrear.innerHTML += `<option value="${tipos['idtipoaportevoluntario']}">${tipos['nombre']}</option>`;
            
            tiposubaspectoscedulascrear.addEventListener('change', () => {
                if (aspectoscedulascrear.value === "aportesvoluntarios" && tiposubaspectoscedulascrear.value == `${tipos['idtipoaportevoluntario']}`) {
                    nextBtnFirstcedulas.classList.remove('isdisabled');
                }
            });
            
        });
    }
    
}

//#endregion

//#region Llenar pagos alimentacion

function llenarpagoalimentacion(datos) {
    
    if (datos !== null) {
        divtiposubaspectoscrearcedula.classList.remove('scond');
        tiposubaspectoscedulascrear.removeAttribute('disabled');
        tiposubaspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Tipo del Sub Aspecto</option>`;
        datos.forEach(tipos => {
            tiposubaspectoscedulascrear.innerHTML += `<option value="${tipos['idtipopagoalimen']}">${tipos['parentesco']}</option>`;
            
            tiposubaspectoscedulascrear.addEventListener('change', () => {
                if (aspectoscedulascrear.value === "pagosalimen" && tiposubaspectoscedulascrear.value == `${tipos['idtipopagoalimen']}`) {
                    nextBtnFirstcedulas.classList.remove('isdisabled');
                }
            });
            
        });
    }
    
}

//#endregion

//#region Llenar indemnizacion

function llenarindemnizacion(datos) {
    
    if (datos !== null) {
        divtiposubaspectoscrearcedula.classList.remove('scond');
        tiposubaspectoscedulascrear.removeAttribute('disabled');
        tiposubaspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Tipo del Sub Aspecto</option>`;
        datos.forEach(tipos => {
            tiposubaspectoscedulascrear.innerHTML += `<option value="${tipos['idtipoindemnizacion']}">${tipos['nombre']}</option>`;
            
            tiposubaspectoscedulascrear.addEventListener('change', () => {
                if (aspectoscedulascrear.value === "indemnizacion" && tiposubaspectoscedulascrear.value == `${tipos['idtipoindemnizacion']}`) {
                    nextBtnFirstcedulas.classList.remove('isdisabled');
                }
            });
            
        });
    }
    
}

//#endregion

//#region Llenar Prima cancilleria

function llenarprimacancilleria(datos) {
    if (datos !== null) {
        divtiposubaspectoscrearcedula.classList.remove('scond');
        tiposubaspectoscedulascrear.removeAttribute('disabled');
        tiposubaspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Tipo del Sub Aspecto</option>`;
        datos.forEach(tipos => {
            tiposubaspectoscedulascrear.innerHTML += `<option value="${tipos['idtipoprimacancilleria']}">${tipos['nombre']}</option>`;
            
            tiposubaspectoscedulascrear.addEventListener('change', () => {
                if (aspectoscedulascrear.value === "primacancilleria" && tiposubaspectoscedulascrear.value == `${tipos['idtipoprimacancilleria']}`) {
                    nextBtnFirstcedulas.classList.remove('isdisabled');
                }
            });
            
        });
    }
}

//#endregion

//#region Llenar Intereses Rendi Capital

function llenarinteresesrendimientos(datos) {
    if (datos !== null) {
        divtiposubaspectoscrearcedula.classList.remove('scond');
        tiposubaspectoscedulascrear.removeAttribute('disabled');
        tiposubaspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Tipo del Sub Aspecto</option>`;
        datos.forEach(tipos => {
            tiposubaspectoscedulascrear.innerHTML += `<option value="${tipos['idtipointeresesrendicapital']}">${tipos['nombre']}</option>`;
            
            tiposubaspectoscedulascrear.addEventListener('change', () => {
                if (aspectoscedulascrear.value === "interesesrendimientos" && tiposubaspectoscedulascrear.value == `${tipos['idtipointeresesrendicapital']}`) {
                    nextBtnFirstcedulas.classList.remove('isdisabled');
                }
            });
            
        });
    }
}

//#endregion

//#region  Llenar otros ingresos

function llenarotrosingresos(datos) {
    
    if (datos !== null) {
        divtiposubaspectoscrearcedula.classList.remove('scond');
        tiposubaspectoscedulascrear.removeAttribute('disabled');
        tiposubaspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Tipo del Sub Aspecto</option>`;
        datos.forEach(tipos => {
            tiposubaspectoscedulascrear.innerHTML += `<option value="${tipos['idtipootrosingresoscapital']}">${tipos['nombre']}</option>`;
            
            tiposubaspectoscedulascrear.addEventListener('change', () => {
                if (aspectoscedulascrear.value === "otrosingresos" && tiposubaspectoscedulascrear.value == `${tipos['idtipootrosingresoscapital']}`) {
                    nextBtnFirstcedulas.classList.remove('isdisabled');
                }
            });
            
        });
    }
}
//#endregion

//#region Llenar Aportes obligatorios capital

function llenaraportesobligatorioscapital(datos) {
    if (datos !== null) {
        divtiposubaspectoscrearcedula.classList.remove('scond');
        tiposubaspectoscedulascrear.removeAttribute('disabled');
        tiposubaspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Tipo del Sub Aspecto</option>`;
        datos.forEach(tipos => {
            tiposubaspectoscedulascrear.innerHTML += `<option value="${tipos['idtipoaporteobligatoriocapital']}">${tipos['nombre']}</option>`;
            
            tiposubaspectoscedulascrear.addEventListener('change', () => {
                if (aspectoscedulascrear.value === "aportesobligatorios" && tiposubaspectoscedulascrear.value == `${tipos['idtipoaporteobligatoriocapital']}`) {
                    nextBtnFirstcedulas.classList.remove('isdisabled');
                }
            });
            
        });
    }
}

//#endregion

//#region Llenar Aportes Voluntarios capital

function llenaraportesvoluntarioscapital(datos) {
    if (datos !== null) {
        divtiposubaspectoscrearcedula.classList.remove('scond');
        tiposubaspectoscedulascrear.removeAttribute('disabled');
        tiposubaspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Tipo del Sub Aspecto</option>`;
        datos.forEach(tipos => {
            tiposubaspectoscedulascrear.innerHTML += `<option value="${tipos['idtipoaportevoluntariocapital']}">${tipos['nombre']}</option>`;
            
            tiposubaspectoscedulascrear.addEventListener('change', () => {
                if (aspectoscedulascrear.value === "aportesvoluntarios" && tiposubaspectoscedulascrear.value == `${tipos['idtipoaportevoluntariocapital']}`) {
                    nextBtnFirstcedulas.classList.remove('isdisabled');
                }
            });
            
        });
    }
}

//#endregion

//#region Llenar valor bruto de ventas

function llenarvalorbrutosdeventas(datos) {
    if (datos !== null) {
        divtiposubaspectoscrearcedula.classList.remove('scond');
        tiposubaspectoscedulascrear.removeAttribute('disabled');
        tiposubaspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Tipo del Sub Aspecto</option>`;
        datos.forEach(tipos => {
            tiposubaspectoscedulascrear.innerHTML += `<option value="${tipos['idtipovalorbrutoventaslaboral']}">${tipos['nombre']}</option>`;
            
            tiposubaspectoscedulascrear.addEventListener('change', () => {
                if (aspectoscedulascrear.value === "valorbrutoventas" && tiposubaspectoscedulascrear.value == `${tipos['idtipovalorbrutoventaslaboral']}`) {
                    nextBtnFirstcedulas.classList.remove('isdisabled');
                }
            });
            
        });
    }
}

//#endregion

//#region Llenar aportes obligatorios no laborales

function llenaraportesobligatoriosnolaboral(datos) {
    if (datos !== null) {
        divtiposubaspectoscrearcedula.classList.remove('scond');
        tiposubaspectoscedulascrear.removeAttribute('disabled');
        tiposubaspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Tipo del Sub Aspecto</option>`;
        datos.forEach(tipos => {
            tiposubaspectoscedulascrear.innerHTML += `<option value="${tipos['idtipoaporteobligatoriolaboralnoconse']}">${tipos['nombre']}</option>`;
            
            tiposubaspectoscedulascrear.addEventListener('change', () => {
                if (aspectoscedulascrear.value === "aportesobligatorios" && tiposubaspectoscedulascrear.value == `${tipos['idtipoaporteobligatoriolaboralnoconse']}`) {
                    nextBtnFirstcedulas.classList.remove('isdisabled');
                }
            });
            
        });
    }
}

//#endregion

//#region Llenar otros costos de gastos laborales

function llenarotroscostosgastosnolaboral(datos) {
    if (datos !== null) {
        divtiposubaspectoscrearcedula.classList.remove('scond');
        tiposubaspectoscedulascrear.removeAttribute('disabled');
        tiposubaspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Tipo del Sub Aspecto</option>`;
        datos.forEach(tipos => {
            tiposubaspectoscedulascrear.innerHTML += `<option value="${tipos['idtipootroscostogastolaboral']}">${tipos['nombre']}</option>`;
            
            tiposubaspectoscedulascrear.addEventListener('change', () => {
                if (aspectoscedulascrear.value === "otroscostogastos" && tiposubaspectoscedulascrear.value == `${tipos['idtipootroscostogastolaboral']}`) {
                    nextBtnFirstcedulas.classList.remove('isdisabled');
                }
            });
            
        });
    }
}

//#endregion

//#region Llenar otros costos de gastos capitales

function llenarotroscostosgastoscapital(datos) {
    if (datos !== null) {
        divtiposubaspectoscrearcedula.classList.remove('scond');
        tiposubaspectoscedulascrear.removeAttribute('disabled');
        tiposubaspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Tipo del Sub Aspecto</option>`;
        datos.forEach(tipos => {
            tiposubaspectoscedulascrear.innerHTML += `<option value="${tipos['idtipootroscostogastocapital']}">${tipos['nombre']}</option>`;
            
            tiposubaspectoscedulascrear.addEventListener('change', () => {
                if (aspectoscedulascrear.value === "otroscostogastos" && tiposubaspectoscedulascrear.value == `${tipos['idtipootroscostogastocapital']}`) {
                    nextBtnFirstcedulas.classList.remove('isdisabled');
                }
            });
            
        });
    }
}

//#endregion

//#region Elegir los campos a presentar

nextBtnFirstcedulas.addEventListener('click', (e) => {
    e.preventDefault();
    slidePagecedulas.style.display = "none";
    slidePage2cedulas.style.display = "block";
    currentcedulas += 1;
    if (cedulacrear.value === "cedulageneral") {
        if (aspectoscedulascrear.value === "salario") {

            divnombrecrearcedulas.classList.remove('scond');
            divmesessalariocedulascrear.classList.remove('scond');
            divvalorcedulascrear.classList.remove('scond');

        }else if (aspectoscedulascrear.value === "honorarios" || 
        aspectoscedulascrear.value === "otrospagos" || 
        aspectoscedulascrear.value === "viaticos" || 
        aspectoscedulascrear.value === "prestasociales" ||
        aspectoscedulascrear.value === "aportesobligatorios" ||
        aspectoscedulascrear.value === "aportesvoluntarios" ||
        aspectoscedulascrear.value === "aporteseconoedu" ||
        aspectoscedulascrear.value === "indemnizacion" ||
        aspectoscedulascrear.value === "interesesrendimientos" || 
        aspectoscedulascrear.value === "otrosingresos" ||
        aspectoscedulascrear.value === "interesesprestamos" || 
        aspectoscedulascrear.value === "otroscostogastos" ||
        aspectoscedulascrear.value === "recompensas" ||
        aspectoscedulascrear.value === "derechosexplotpropie" ||
        aspectoscedulascrear.value === "explotfranquicias" ||
        aspectoscedulascrear.value === "apoyoseconoestado" || 
        aspectoscedulascrear.value === "campanniaspoliticas" ||
        aspectoscedulascrear.value === "honorariosdesaproyec" || 
        aspectoscedulascrear.value === "indemnizaaseguradores" ||
        aspectoscedulascrear.value === "agroingresoseguro" ||
        aspectoscedulascrear.value === "cesantiaintereses" ||
        aspectoscedulascrear.value === "valorbrutoventas") {
            
            divnombrecrearcedulas.classList.remove('scond');
            divmesessalariocedulascrear.classList.add('scond');
            divvalorcedulascrear.classList.remove('scond');

        } else if (aspectoscedulascrear.value === "pagosalimen") {
            
            divnombrecrearcedulas.classList.remove('scond');
            divmesessalariocedulascrear.classList.remove('scond');
            divvalorcedulascrear.classList.remove('scond');

        } else if (tiporentacedulacrear.value === "deducciones" ||
        tiporentacedulacrear.value === "rentaexentadeduccion") {
            
            divnombrecrearcedulas.classList.remove('scond');
            divmesessalariocedulascrear.classList.add('scond');
            divvalorcedulascrear.classList.remove('scond');

        } else if (aspectoscedulascrear.value === "gastosrepresentacion" ||
        aspectoscedulascrear.value == "primacancilleria" ||
        aspectoscedulascrear.value === "fuerzapublica" ||
        aspectoscedulascrear.value === "ingresosnoclasifican" ||
        aspectoscedulascrear.value === "indemnizacionnolabo" ||
        aspectoscedulascrear.value === "retirodinerosfondovolu" ||
        aspectoscedulascrear.value === "recibidosgananciales" ||
        aspectoscedulascrear.value === "costofiscal") {
            
            divnombrecrearcedulas.classList.add('scond');
            divmesessalariocedulascrear.classList.add('scond');
            divvalorcedulascrear.classList.remove('scond');

        } else if (tiporentacedulacrear.value ===  "devdescreb") {

            divnombrecrearcedulas.classList.remove('scond');
            divmesessalariocedulascrear.classList.add('scond');
            divvalorcedulascrear.classList.remove('scond');

        }

        if (aspectoscedulascrear.value === "recibidosgananciales" && tiporentacedulacrear.value === "ingresosnoconsenolaboral") {
            divnombrecrearcedulas.classList.remove('scond');
            divmesessalariocedulascrear.classList.add('scond');
            divvalorcedulascrear.classList.remove('scond');
        }

        if (tiporentacedulacrear.value ===  "rentaliqpasece") {
            
            divnombrecrearcedulas.classList.add('scond');
            divmesessalariocedulascrear.classList.add('scond');
            divvalorcedulascrear.classList.remove('scond');

        }
        
        
    }  else if (cedulacrear.value == "cedulapensiones") {

        if (tiporentacedulacrear.value === "ingresopensiones" ||
        tiporentacedulacrear.value === "devolucionesahorro" ||
        tiporentacedulacrear.value === "indemnizacionsustitutas" ||
        tiporentacedulacrear.value === "pensionesexterior" ||
        tiporentacedulacrear.value === "aportesobligatorios") {
            
            divnombrecrearcedulas.classList.remove('scond');
            divmesessalariocedulascrear.classList.add('scond');
            divvalorcedulascrear.classList.remove('scond');

        }

        if (tipocedulacrear.value ===  "rentaexenta") {
            
            divnombrecrearcedulas.classList.add('scond');
            divmesessalariocedulascrear.classList.add('scond');
            divvalorcedulascrear.classList.remove('scond');

        }
        
    } else if (cedulacrear.value == "ceduladividendosyparticipaciones") {
        
            divnombrecrearcedulas.classList.add('scond');
            divmesessalariocedulascrear.classList.add('scond');
            divvalorcedulascrear.classList.remove('scond');

    }
    

});

//#endregion

//#region Crear Cedula

let formcrearcedulas = document.getElementById('form-crear-cedulas');

formcrearcedulas.addEventListener('submit', (e) => {

    e.preventDefault();

    if (cedulacrear.value == "cedulageneral") {
        
        if (tipocedulacrear.value === "rentatrabajo") {

            if (tiporentacedulacrear.value === "ingresobruto") {

                if (aspectoscedulascrear.value === "salario") {

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresobrutorentatrabajo = document.getElementById('idingresobrutorentatrabajo').innerHTML;
                    formData.append("idingresobrutorentatrabajo", idingresobrutorentatrabajo);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentatrabajo/ingresobruto/salario`,
                        method: 'POST',
                        done: setTimeout(() => {location.reload();}, 200),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                } else if (aspectoscedulascrear.value === "honorarios")  {

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresobrutorentatrabajo = document.getElementById('idingresobrutorentatrabajo').innerHTML;
                    formData.append("idingresobrutorentatrabajo", idingresobrutorentatrabajo);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentatrabajo/ingresobruto/honorarios`,
                        method: 'POST',
                        done: setTimeout(() => {location.reload();}, 200),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                } else if (aspectoscedulascrear.value === "viaticos") {

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresobrutorentatrabajo = document.getElementById('idingresobrutorentatrabajo').innerHTML;
                    formData.append("idingresobrutorentatrabajo", idingresobrutorentatrabajo);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentatrabajo/ingresobruto/viaticos`,
                        method: 'POST',
                        done: setTimeout(() => {location.reload();}, 200),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                } else if (aspectoscedulascrear.value === "otrospagos") {

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresobrutorentatrabajo = document.getElementById('idingresobrutorentatrabajo').innerHTML;
                    formData.append("idingresobrutorentatrabajo", idingresobrutorentatrabajo);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentatrabajo/ingresobruto/otrospagos`,
                        method: 'POST',
                        done: setTimeout(() => {location.reload();}, 200),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                } else if (aspectoscedulascrear.value === "prestasociales"){

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresobrutorentatrabajo = document.getElementById('idingresobrutorentatrabajo').innerHTML;
                    formData.append("idingresobrutorentatrabajo", idingresobrutorentatrabajo);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentatrabajo/ingresobruto/prestasociales`,
                        method: 'POST',
                        done: setTimeout(() => {location.reload();}, 200),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                } else if (aspectoscedulascrear.value === "cesantiaintereses") {
                    
                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresobrutorentatrabajo = document.getElementById('idingresobrutorentatrabajo').innerHTML;
                    let idrentaexentarentatrabajo = document.getElementById('idrentaexentarentatrabajo').innerHTML;
                    formData.append("idingresobrutorentatrabajo", idingresobrutorentatrabajo);
                    formData.append("idrentaexentarentatrabajo", idrentaexentarentatrabajo);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentatrabajo/ingresobruto/cesantiaintereses`,
                        method: 'POST',
                        done: setTimeout(() => {location.reload();}, 200),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                }

            } else if (tiporentacedulacrear.value === "ingresosnoconse") {

                if (aspectoscedulascrear.value === "aportesobligatorios") {

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresonoconserentatrabajo = document.getElementById('idingresonoconserentatrabajo').innerHTML;
                    formData.append("idingresonoconserentatrabajo", idingresonoconserentatrabajo);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentatrabajo/ingresosnoconse/aportesobligatorios`,
                        method: 'POST',
                        done: setTimeout(() => {location.reload();}, 200),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });
                    
                }  else if (aspectoscedulascrear.value === "aportesvoluntarios"){

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresonoconserentatrabajo = document.getElementById('idingresonoconserentatrabajo').innerHTML;
                    let idrentaexentarentatrabajo = document.getElementById('idrentaexentarentatrabajo').innerHTML;
                    formData.append("idingresonoconserentatrabajo", idingresonoconserentatrabajo);
                    formData.append("idrentaexentarentatrabajo", idrentaexentarentatrabajo);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentatrabajo/ingresosnoconse/aportesvoluntarios`,
                        method: 'POST',
                        done: setTimeout(() => {location.reload();}, 200),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                } else if (aspectoscedulascrear.value === "aporteseconoedu") {

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresonoconserentatrabajo = document.getElementById('idingresonoconserentatrabajo').innerHTML;
                    formData.append("idingresonoconserentatrabajo", idingresonoconserentatrabajo);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentatrabajo/ingresosnoconse/aporteseconoedu`,
                        method: 'POST',
                        done: setTimeout(() => {location.reload();}, 200),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                } else if (aspectoscedulascrear.value === "pagosalimen") {

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresonoconserentatrabajo = document.getElementById('idingresonoconserentatrabajo').innerHTML;
                    formData.append("idingresonoconserentatrabajo", idingresonoconserentatrabajo);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentatrabajo/ingresosnoconse/pagosalimen`,
                        method: 'POST',
                        done: setTimeout(() => {location.reload();}, 200),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                }

            }  else if (tiporentacedulacrear.value === "deducciones"){

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idrentatrabajo = document.getElementById('idrentatrabajo').innerHTML;
                    formData.append("idrentatrabajo", idrentatrabajo);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentatrabajo/deducciones`,
                        method: 'POST',
                        done: setTimeout(() => {location.reload();}, 200),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });


            } else if (tiporentacedulacrear.value === "rentaexenta") {

                if (aspectoscedulascrear.value === "indemnizacion") {

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idrentaexentarentatrabajo = document.getElementById('idrentaexentarentatrabajo').innerHTML;
                    formData.append("idrentaexentarentatrabajo", idrentaexentarentatrabajo);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentatrabajo/rentaexenta/indemnizacion`,
                        method: 'POST',
                        done: setTimeout(() => {location.reload();}, 200),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                } else if (aspectoscedulascrear.value === "gastosrepresentacion"){

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idrentaexentarentatrabajo = document.getElementById('idrentaexentarentatrabajo').innerHTML;
                    formData.append("idrentaexentarentatrabajo", idrentaexentarentatrabajo);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentatrabajo/rentaexenta/gastosrepresentacion`,
                        method: 'POST',
                        done: setTimeout(() => {location.reload();}, 200),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                } else if (aspectoscedulascrear.value === "primacancilleria") {

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idrentaexentarentatrabajo = document.getElementById('idrentaexentarentatrabajo').innerHTML;
                    formData.append("idrentaexentarentatrabajo", idrentaexentarentatrabajo);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentatrabajo/rentaexenta/primacancilleria`,
                        method: 'POST',
                        done: setTimeout(() => {location.reload();}, 200),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                } else if (aspectoscedulascrear.value === "fuerzapublica") {

                    if (tiposubaspectoscedulascrear.value === "seguromuerte") {
                        
                        let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idfuerzapublica = document.getElementById('idfuerzapublica').innerHTML;
                        formData.append("idfuerzapublica", idfuerzapublica);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentatrabajo/rentaexenta/fuerzapublica/seguromuerte`,
                            method: 'POST',
                            done: setTimeout(() => {location.reload();}, 200),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

                    } else if (tiposubaspectoscedulascrear.value === "excesosalariobasico") {
                        
                        let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idfuerzapublica = document.getElementById('idfuerzapublica').innerHTML;
                        formData.append("idfuerzapublica", idfuerzapublica);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentatrabajo/rentaexenta/fuerzapublica/excesosalariobasico`,
                            method: 'POST',
                            done: setTimeout(() => {location.reload();}, 200),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

                    }

                }

            }

        } else if (tipocedulacrear.value === "rentacapital") {

            if (tiporentacedulacrear.value === "ingresobrutocapital") {

                if (aspectoscedulascrear.value === "interesesrendimientos") {

                        let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idingresobrutorentacapital = document.getElementById('idingresobrutorentacapital').innerHTML;
                        formData.append("idingresobrutorentacapital", idingresobrutorentacapital);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentacapital/ingresobrutocapital/interesesrendimientos`,
                            method: 'POST',
                            done: setTimeout(() => {location.reload();}, 200),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

                } else if (aspectoscedulascrear.value === "otrosingresos"){

                        let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idingresobrutorentacapital = document.getElementById('idingresobrutorentacapital').innerHTML;
                        formData.append("idingresobrutorentacapital", idingresobrutorentacapital);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentacapital/ingresobrutocapital/otrosingresos`,
                            method: 'POST',
                            done: setTimeout(() => {location.reload();}, 200),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

                }

            } else if (tiporentacedulacrear.value === "ingresosnoconsecapital") {

                if (aspectoscedulascrear.value === "aportesobligatorios") {

                    let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idingresosnoconsecapital = document.getElementById('idingresosnoconsecapital').innerHTML;
                        formData.append("idingresosnoconsecapital", idingresosnoconsecapital);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentacapital/ingresosnoconsecapital/aportesobligatorios`,
                            method: 'POST',
                            done: setTimeout(() => {location.reload();}, 200),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

                } else if (aspectoscedulascrear.value === "aportesvoluntarios") {

                    let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idingresosnoconsecapital = document.getElementById('idingresosnoconsecapital').innerHTML;
                        formData.append("idingresosnoconsecapital", idingresosnoconsecapital);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentacapital/ingresosnoconsecapital/aportesvoluntarios`,
                            method: 'POST',
                            done: setTimeout(() => {location.reload();}, 200),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

                }

            } else if (tiporentacedulacrear.value === "costogastoproce"){

                if (aspectoscedulascrear.value === "interesesprestamos") {

                        let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idcostogastosprocecapital = document.getElementById('idcostogastosprocecapital').innerHTML;
                        formData.append("idcostogastosprocecapital", idcostogastosprocecapital);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentacapital/costogastoproce/interesesprestamos`,
                            method: 'POST',
                            done: setTimeout(() => {location.reload();}, 200),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

                } else if (aspectoscedulascrear.value === "otroscostogastos") {

                        let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idcostogastosprocecapital = document.getElementById('idcostogastosprocecapital').innerHTML;
                        formData.append("idcostogastosprocecapital", idcostogastosprocecapital);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentacapital/costogastoproce/otroscostogastos`,
                            method: 'POST',
                            done: setTimeout(() => {location.reload();}, 200),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

                }

            } else if (tiporentacedulacrear.value === "rentaliqpasece") {

                        let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idrentacapital = document.getElementById('idcostogastosprocecapital').innerHTML;
                        formData.append("idrentacapital", idrentacapital);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentacapital/rentaliqpasece`,
                            method: 'POST',
                            done: setTimeout(() => {location.reload();}, 200),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

            } else if (tiporentacedulacrear.value === "rentaexentadeduccion") {

                        let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idrentacapital = document.getElementById('idcostogastosprocecapital').innerHTML;
                        formData.append("idrentacapital", idrentacapital);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentacapital/rentaexentadeduccion`,
                            method: 'POST',
                            done: console.log('si'),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

            }
            
        } else if (tipocedulacrear.value === "rentanolaboral") {

            if (tiporentacedulacrear.value === "ingresobrutonolaboral") {

                if (aspectoscedulascrear.value === "ingresosnoclasifican") {
                
                    let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idingresobrutolaboral = document.getElementById('idingresobrutolaboral').innerHTML;
                        formData.append("idingresobrutolaboral", idingresobrutolaboral);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/ingresobrutonolaboral/ingresosnoclasifican`,
                            method: 'POST',
                            done: console.log('si'),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

                } else if (aspectoscedulascrear.value === "indemnizacionnolabo") {

                    let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idingresobrutolaboral = document.getElementById('idingresobrutolaboral').innerHTML;
                        formData.append("idingresobrutolaboral", idingresobrutolaboral);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/ingresobrutonolaboral/indemnizacionnolabo`,
                            method: 'POST',
                            done: console.log('si'),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

                } else if (aspectoscedulascrear.value === "recompensas") {

                    let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idingresobrutolaboral = document.getElementById('idingresobrutolaboral').innerHTML;
                        formData.append("idingresobrutolaboral", idingresobrutolaboral);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/ingresobrutonolaboral/recompensas`,
                            method: 'POST',
                            done: console.log('si'),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

                } else if (aspectoscedulascrear.value === "derechosexplotpropie"){

                    let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idingresobrutolaboral = document.getElementById('idingresobrutolaboral').innerHTML;
                        formData.append("idingresobrutolaboral", idingresobrutolaboral);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/ingresobrutonolaboral/derechosexplotpropie`,
                            method: 'POST',
                            done: console.log('si'),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

                } else if (aspectoscedulascrear.value === "explotfranquicias"){

                    let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idingresobrutolaboral = document.getElementById('idingresobrutolaboral').innerHTML;
                        formData.append("idingresobrutolaboral", idingresobrutolaboral);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/ingresobrutonolaboral/explotfranquicias`,
                            method: 'POST',
                            done: console.log('si'),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

                }  else if (aspectoscedulascrear.value === "recibidosgananciales"){

                    let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idingresobrutolaboral = document.getElementById('idingresobrutolaboral').innerHTML;
                        formData.append("idingresobrutolaboral", idingresobrutolaboral);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/ingresobrutonolaboral/recibidosgananciales`,
                            method: 'POST',
                            done: console.log('si'),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

                }  else if (aspectoscedulascrear.value === "retirodinerosfondovolu") {
                    
                    let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idingresobrutolaboral = document.getElementById('idingresobrutolaboral').innerHTML;
                        formData.append("idingresobrutolaboral", idingresobrutolaboral);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/ingresobrutonolaboral/retirodinerosfondovolu`,
                            method: 'POST',
                            done: console.log('si'),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

                } else if (aspectoscedulascrear.value === "apoyoseconoestado") {

                    let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idingresobrutolaboral = document.getElementById('idingresobrutolaboral').innerHTML;
                        formData.append("idingresobrutolaboral", idingresobrutolaboral);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/ingresobrutonolaboral/apoyoseconoestado`,
                            method: 'POST',
                            done: console.log('si'),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

                } else if (aspectoscedulascrear.value === "campanniaspoliticas"){

                    let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idingresobrutolaboral = document.getElementById('idingresobrutolaboral').innerHTML;
                        formData.append("idingresobrutolaboral", idingresobrutolaboral);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/ingresobrutonolaboral/campanniaspoliticas`,
                            method: 'POST',
                            done: console.log('si'),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

                } else if (aspectoscedulascrear.value === "valorbrutoventas"){

                    let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idingresobrutolaboral = document.getElementById('idingresobrutolaboral').innerHTML;
                        formData.append("idingresobrutolaboral", idingresobrutolaboral);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/ingresobrutonolaboral/valorbrutoventas`,
                            method: 'POST',
                            done: console.log('si'),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

                }

            }  else if (tiporentacedulacrear.value === "devdescreb") {
                
                let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idrentanolaboral = document.getElementById('idrentanolaboral').innerHTML;
                        formData.append("idrentanolaboral", idrentanolaboral);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/devdescreb`,
                            method: 'POST',
                            done: console.log('si'),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

            } else if (tiporentacedulacrear.value === "ingresosnoconsenolaboral") {

                if (aspectoscedulascrear.value === "aportesobligatorios") {

                    let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idingresosnoconselaboral = document.getElementById('idingresosnoconselaboral').innerHTML;
                        formData.append("idingresosnoconselaboral", idingresosnoconselaboral);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/ingresosnoconsenolaboral/aportesobligatorios`,
                            method: 'POST',
                            done: console.log('si'),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

                }  else if (aspectoscedulascrear.value === "aportesvoluntarios") {

                    let formData = new FormData(formcrearcedulas);
                        let param = true;
                        formData.append("param", param);
                        let idingresosnoconselaboral = document.getElementById('idingresosnoconselaboral').innerHTML;
                        formData.append("idingresosnoconselaboral", idingresosnoconselaboral);
                        ajax({
                            url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/ingresosnoconsenolaboral/aportesvoluntarios`,
                            method: 'POST',
                            done: console.log('si'),
                            error: rendererror,
                            form: formData,
                            urlactual: location.href,
                        });

                }  else if (aspectoscedulascrear.value === "recompensas") {

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresosnoconselaboral = document.getElementById('idingresosnoconselaboral').innerHTML;
                    formData.append("idingresosnoconselaboral", idingresosnoconselaboral);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/ingresosnoconsenolaboral/recompensas`,
                        method: 'POST',
                        done: console.log('si'),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                }  else if (aspectoscedulascrear.value === "recibidosgananciales") {

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresosnoconselaboral = document.getElementById('idingresosnoconselaboral').innerHTML;
                    formData.append("idingresosnoconselaboral", idingresosnoconselaboral);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/ingresosnoconsenolaboral/recibidosgananciales`,
                        method: 'POST',
                        done: console.log('si'),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                } else if (aspectoscedulascrear.value === "honorariosdesaproyec") {

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresosnoconselaboral = document.getElementById('idingresosnoconselaboral').innerHTML;
                    formData.append("idingresosnoconselaboral", idingresosnoconselaboral);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/ingresosnoconsenolaboral/honorariosdesaproyec`,
                        method: 'POST',
                        done: console.log('si'),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                } else if (aspectoscedulascrear.value === "aporteseconoedu") {

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresosnoconselaboral = document.getElementById('idingresosnoconselaboral').innerHTML;
                    formData.append("idingresosnoconselaboral", idingresosnoconselaboral);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/ingresosnoconsenolaboral/aporteseconoedu`,
                        method: 'POST',
                        done: console.log('si'),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                } else if (aspectoscedulascrear.value === "campanniaspoliticas"){

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresosnoconselaboral = document.getElementById('idingresosnoconselaboral').innerHTML;
                    formData.append("idingresosnoconselaboral", idingresosnoconselaboral);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/ingresosnoconsenolaboral/campanniaspoliticas`,
                        method: 'POST',
                        done: console.log('si'),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                } else if (aspectoscedulascrear.value === "indemnizaaseguradores"){

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresosnoconselaboral = document.getElementById('idingresosnoconselaboral').innerHTML;
                    formData.append("idingresosnoconselaboral", idingresosnoconselaboral);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/ingresosnoconsenolaboral/indemnizaaseguradores`,
                        method: 'POST',
                        done: console.log('si'),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                } else if (aspectoscedulascrear.value === "agroingresoseguro"){

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresosnoconselaboral = document.getElementById('idingresosnoconselaboral').innerHTML;
                    formData.append("idingresosnoconselaboral", idingresosnoconselaboral);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/ingresosnoconsenolaboral/agroingresoseguro`,
                        method: 'POST',
                        done: console.log('si'),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                }

            } else if (tiporentacedulacrear.value === "costogastoproce") {

                if (aspectoscedulascrear.value === "interesesprestamos") {

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idcostogastosprocelaboral = document.getElementById('idcostogastosprocelaboral').innerHTML;
                    formData.append("idcostogastosprocelaboral", idcostogastosprocelaboral);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/costogastoproce/interesesprestamos`,
                        method: 'POST',
                        done: console.log('si'),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                } else if (aspectoscedulascrear.value === "otroscostogastos") {

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idcostogastosprocelaboral = document.getElementById('idcostogastosprocelaboral').innerHTML;
                    formData.append("idcostogastosprocelaboral", idcostogastosprocelaboral);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/costogastoproce/otroscostogastos`,
                        method: 'POST',
                        done: console.log('si'),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                }  else if (aspectoscedulascrear.value === "costofiscal") {

                    let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idcostogastosprocelaboral = document.getElementById('idcostogastosprocelaboral').innerHTML;
                    formData.append("idcostogastosprocelaboral", idcostogastosprocelaboral);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/costogastoproce/costofiscal`,
                        method: 'POST',
                        done: console.log('si'),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

                }

            } else if (tiporentacedulacrear.value === "rentaliqpasece"){

                let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idrentanolaboral = document.getElementById('idrentanolaboral').innerHTML;
                    formData.append("idrentanolaboral", idrentanolaboral);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/rentaliqpasece`,
                        method: 'POST',
                        done: console.log('si'),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

            } else if (tiporentacedulacrear.value === "rentaexentadeduccion"){

                let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idrentanolaboral = document.getElementById('idrentanolaboral').innerHTML;
                    formData.append("idrentanolaboral", idrentanolaboral);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulageneral/rentanolaboral/rentaexentadeduccion`,
                        method: 'POST',
                        done: console.log('si'),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

            }

        }
        
    } else if (cedulacrear.value === "cedulapensiones") {

        if (tipocedulacrear.value === "ingresobruto") {
            
            if (tiporentacedulacrear.value === "ingresopensiones") {

                let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresobrutopensiones = document.getElementById('idingresobrutopensiones').innerHTML;
                    formData.append("idingresobrutopensiones", idingresobrutopensiones);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulapensiones/ingresobruto/ingresopensiones`,
                        method: 'POST',
                        done: console.log('si'),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

            } else if (tiporentacedulacrear.value === "devolucionesahorro"){

                let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresobrutopensiones = document.getElementById('idingresobrutopensiones').innerHTML;
                    formData.append("idingresobrutopensiones", idingresobrutopensiones);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulapensiones/ingresobruto/devolucionesahorro`,
                        method: 'POST',
                        done: console.log('si'),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

            } else if (tiporentacedulacrear.value === "indemnizacionsustitutas"){

                let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresobrutopensiones = document.getElementById('idingresobrutopensiones').innerHTML;
                    formData.append("idingresobrutopensiones", idingresobrutopensiones);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulapensiones/ingresobruto/indemnizacionsustitutas`,
                        method: 'POST',
                        done: console.log('si'),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

            } else if (tiporentacedulacrear.value === "pensionesexterior") {
                
                let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresobrutopensiones = document.getElementById('idingresobrutopensiones').innerHTML;
                    formData.append("idingresobrutopensiones", idingresobrutopensiones);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulapensiones/ingresobruto/pensionesexterior`,
                        method: 'POST',
                        done: console.log('si'),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

            }

        } else if (tipocedulacrear.value === "ingresonoconse") {

            if (tiporentacedulacrear.value === "aportesobligatorios") {

                let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idingresonoconsepensiones = document.getElementById('idingresonoconsepensiones').innerHTML;
                    formData.append("idingresonoconsepensiones", idingresonoconsepensiones);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulapensiones/ingresonoconse/aportesobligatorios`,
                        method: 'POST',
                        done: console.log('si'),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

            }

        } else if (tipocedulacrear.value === "rentaexenta") {

            let formData = new FormData(formcrearcedulas);
                    let param = true;
                    formData.append("param", param);
                    let idcedulapensiones = document.getElementById('idcedulapensiones').innerHTML;
                    formData.append("idcedulapensiones", idcedulapensiones);
                    ajax({
                        url: `./declaracion/creardeclaracion/cedulapensiones/rentaexenta`,
                        method: 'POST',
                        done: console.log('si'),
                        error: rendererror,
                        form: formData,
                        urlactual: location.href,
                    });

        }

    } else if (cedulacrear.value === "ceduladividendosyparticipaciones") {

        if (tipocedulacrear.value === "dividendosyparticipaciones") {
            
            let formData = new FormData(formcrearcedulas);
            let param = true;
            formData.append("param", param);
            let idceduladiviparti = document.getElementById('idceduladiviparti').innerHTML;
            formData.append("idceduladiviparti", idceduladiviparti);
            ajax({
                url: `./declaracion/creardeclaracion/ceduladividendosyparticipaciones/dividendosyparticipaciones`,
                method: 'POST',
                done: console.log('si'),
                error: rendererror,
                form: formData,
                urlactual: location.href,
            });


        } else if (tipocedulacrear.value === "subcedula1a") {

            let formData = new FormData(formcrearcedulas);
            let param = true;
            formData.append("param", param);
            let idceduladiviparti = document.getElementById('idceduladiviparti').innerHTML;
            formData.append("idceduladiviparti", idceduladiviparti);
            ajax({
                url: `./declaracion/creardeclaracion/ceduladividendosyparticipaciones/subcedula1a`,
                method: 'POST',
                done: console.log('si'),
                error: rendererror,
                form: formData,
                urlactual: location.href,
            });
            
        }else if (tipocedulacrear.value === "subcedula2a") {

            let formData = new FormData(formcrearcedulas);
            let param = true;
            formData.append("param", param);
            let idceduladiviparti = document.getElementById('idceduladiviparti').innerHTML;
            formData.append("idceduladiviparti", idceduladiviparti);
            ajax({
                url: `./declaracion/creardeclaracion/ceduladividendosyparticipaciones/subcedula2a`,
                method: 'POST',
                done: console.log('si'),
                error: rendererror,
                form: formData,
                urlactual: location.href,
            });
            
        }else if (tipocedulacrear.value === "ingresosnoconse") {
            
            let formData = new FormData(formcrearcedulas);
            let param = true;
            formData.append("param", param);
            let idceduladiviparti = document.getElementById('idceduladiviparti').innerHTML;
            formData.append("idceduladiviparti", idceduladiviparti);
            ajax({
                url: `./declaracion/creardeclaracion/ceduladividendosyparticipaciones/ingresosnoconse`,
                method: 'POST',
                done: console.log('si'),
                error: rendererror,
                form: formData,
                urlactual: location.href,
            });

        }else if (tipocedulacrear.value === "rentaliquidaece") {

            let formData = new FormData(formcrearcedulas);
            let param = true;
            formData.append("param", param);
            let idceduladiviparti = document.getElementById('idceduladiviparti').innerHTML;
            formData.append("idceduladiviparti", idceduladiviparti);
            ajax({
                url: `./declaracion/creardeclaracion/ceduladividendosyparticipaciones/rentaliquidaece`,
                method: 'POST',
                done: console.log('si'),
                error: rendererror,
                form: formData,
                urlactual: location.href,
            });
            
        }
        
    }

});

//#endregion