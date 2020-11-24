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

nextBtnFirstcedulas.addEventListener("click", function (event) {
    event.preventDefault();
    slidePagecedulas.style.display = "none";
    slidePage2cedulas.style.display = "block";
    currentcedulas += 1;
});

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

cedulacrear.addEventListener('change', (e) => {

    e.preventDefault();
    divtiporentacrearcedula.classList.add("scond");
    tiporentacedulacrear.setAttribute('disabled', 'disabled');
    nextBtnFirstcedulas.classList.add('isdisabled');
    divaspectoscrearcedula.classList.add('scond');
    aspectoscedulascrear.setAttribute('disabled', 'disabled');

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

    let formData = new FormData();
    let param = true;
    formData.append("param", param);
    nextBtnFirstcedulas.classList.add('isdisabled');
    divaspectoscrearcedula.classList.add('scond');
    aspectoscedulascrear.setAttribute('disabled', 'disabled');

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

    if (cedulacrear.value === "cedulageneral") {

        if (tipocedulacrear.value === "rentatrabajo") {

            if (tiporentacedulacrear.value === "ingresobruto") {
                
                aspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Aspecto</option>
                <option value="salario">Salario</option>
                <option value="honorarios">Honorarios</option>
                <option value="prestasociales">Prestaciones Sociales</option>
                <option value="otrospagos">Otros Pagos</option>
                <option value="viaticos">Viaticos</option>`;
                
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

            } else if (tiporentacedulacrear.value === "rentaexentadeduccion") {
                
                let formData = new FormData();
                let param = true;
                formData.append("param", param);

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

            }else if (tiporentacedulacrear.value === "ingresosnoconsenolaboral") {
                
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

            }else if (tiporentacedulacrear.value === "costogastoproce") {
                
                aspectoscedulascrear.innerHTML = `<option selected="true" disabled="disabled" class="noselected">Seleccione el Aspecto</option>
                <option value="recompensas">Recompensas</option>
                <option value="recibidosgananciales">Recibidos Gananciales</option>
                <option value="aporteseconoedu">Aportes economicos de educacion</option>
                <option value="indemnizaaseguradores">Indemnización de Aseguradoras</option>
                <option value="campanniaspoliticas">Campannias politicas</option>
                <option value="agroingresoseguro">Agro ingreso seguro</option>
                <option value="honorariosdesaproyec">Honorarios </option>
                <option value="apoyoseconoestado">Apoyos economicos del estado</option>
                <option value="campanniaspoliticas">Campannias politicas</option>
                <option value="valorbrutoventas">Valor bruto de ventas</option>`;

            }else if (tiporentacedulacrear.value === "rentaliqpasece") {
                


            }else if (tiporentacedulacrear.value === "rentaexentadeduccion") {
                


            }
            
        }
        
    } else if (cedulacrear.value === "cedulapensiones") {

        if (tipocedulacrear.value === "ingresobruto") {
            
            if (tiporentacedulacrear.value === "ingresopensiones") {
                
            } else if (tiporentacedulacrear.value === "devolucionesahorro") {
                
            } else if (tiporentacedulacrear.value === "indemnizacionsustitutas") {
                
            } else if (tiporentacedulacrear.value === "pensionesexterior") {
                
            }
            
        } else if (tipocedulacrear.value === "ingresonoconse") {
            
            if (tiporentacedulacrear.value === "aportesobligatorios") {
                
            }
            
        }
        
    }

});

//#endregion

