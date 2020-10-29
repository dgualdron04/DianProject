/*--Inicializamos constantes, estas constantes seran las etiquetas button o las etiquetas a, las cuales tienen la funcionalidad
de redirigir hacia un vinculo o a afectar el funcionamiento de la web cuando a estos se les de click, otra cosa que sera constante
son los submenu, estos seran los divs que estan dentro de los menus principales, traemos todas estas cosas segun su id, entonces
le decimos que vaya al documento actual y con la funcion .getElementById() me traiga el elemento que deseeamos, por ejemplo
en la constante perfil, podemos observar que declaramos esta varible llamada perfil como una constante y le asignamos toda la informacion
de lo encontrado segun la id perfil, por eso queda de esta forma, const = document.getElementById("perfil");

Existen 3 tipos de declaraciones en JavaScript, var, let y const, la primera ultimamente no se utiliza mucho, utilizan más que todo
let y const, let es declarar una varible que se pueda editar más adelante, osea que su valor no sea constante, const es declarar una variblae que no se pueda
editar más adelante, osea a esta variable se le asigna un valor y este valor no se podrá cambiar, por lo cual este valor siempre sera constante y será el mismo, 
var se usa para declarar una variable, sin importar el funcionamiento de esta osea, no importa si es constante o si se cambiara frecuentemente, tanto var como let 
se inicializan opcionalmente, ya que a estas se les podrá cambiar el valor más adelante.--*/

/* const perfil = document.getElementById("perfil"), 
mensajes = document.getElementById("mensajes"),
opciones = document.getElementById("opciones"),
dashboard = document.getElementById("dashboard"),
about = document.getElementById("about"),
submenuperfil = document.getElementById("submenuperfil"), 
submenumensajes = document.getElementById("submenumensajes"), 
submenuopciones = document.getElementById("submenuopciones"); */


/* const ayudaboton = document.getElementById("ayudaboton") ,
submenuayudabtn = document.getElementById("submenuayudabtn"),
flecha = document.getElementById("flecha"); */
 /* inicioboton = document.getElementById("inicioboton"),
perfilboton = document.getElementById("perfilboton"),
usuariosboton = document.getElementById("usuariosboton"),
declaracionboton = document.getElementById("declaracionboton"),
graficosboton = document.getElementById("graficosboton"),*/


/*Aquí declaramos los estados como let ya que estos si van a cambiar más adelante, aunque como son booleanos solo tendran dos valores, true o false, pero esto solo
lo sabemos nosotros, las variables de javascript pueden tomar cualquier valor, cada submenu tiene un estado, esto para saber si el usuario ya abrio esta botonera, osea
ya desplego este submenu, por eso estos se inicializan como false, ya que el usuario al entrar al sistema nunca va a tener estos submenus abiertos. */
/* let estadoperfil = false,
estadomensajes = false,
estadoopciones = false; */

/* let estadoayuda = false; */

/*Aquí lo que hacemos es una funcion llamada .addEventListener(), a esta funcion hay que pasarle dos parametros, el primero es el evento y el segundo parametro
es lo que va a hacer cuando pase ese evento, en este caso yo pongo el evento "click" y llamo dos funciones a la hora de que este evento se inicie.
Entonces vamos a ver más a fondo la linea 42 y 46, entonces en la linea 36 tenemos la variable perfil, esta hace referencia a un objeto <a> aunque también puede hacer
referencia a cualquier otro objeto, luego nosotros le agregamos la funcion .addEventListener(), entonces quedaria perfil.addEventListener(), anteriormente hablabamos que
esta funcion necesitaba 2 parametros, entonces vamos a pasarle dos parametros, los cuales seran el evento y lo que hara cuando este evento se inicie, entonces el evento
que pondremos va a ser 'click', quedaria así, perfil.addEventListener('click',), luego pondremos el otro parametro, en este caso llamaremos dos funciones,
perfil.addEventListener('click', function(){cambiarestado("perfil"), submenuopen(estadoperfil, submenuperfil, submenumensajes, submenuopciones)}), estas dos funciones
que le pasamos piden sus propios parametros, por eso a la primera le pasamos un texto en este caso el texto era "perfil", luego a la segunda funcion le pasamos 4 parametros
el primero es el estado del submenu que vamos a activar, luego le pasamos los otros 3 submenus teniendo en cuenta que el primer submenu es el que vamos a activar y los otros
2 son los que vamos a desactivar, esto por si los menus estan activos.
En la linea 45 y 46 volvemos a utilizar el .addEventListener con el evento 'click' y una funcion llamada cerrarsubmenus(), aquí solo usamos una sola funcion.*/
/* perfil.addEventListener('click', function(){cambiarestado("perfil"), submenuopen(estadoperfil, submenuperfil, submenumensajes, submenuopciones)});
mensajes.addEventListener('click', function(){cambiarestado("mensaje"), submenuopen(estadomensajes, submenumensajes, submenuperfil, submenuopciones)});
opciones.addEventListener('click', function(){cambiarestado("opciones"), submenuopen(estadoopciones, submenuopciones, submenuperfil, submenumensajes)});
dashboard.addEventListener('click', function(){cerrarsubmenus()});
about.addEventListener('click', function(){cerrarsubmenus()}); */

/* inicioboton.addEventListener('click', () => {cerrarsubmenus();})
perfilboton.addEventListener('click', () => {cerrarsubmenus();});
usuariosboton.addEventListener('click', () => {cerrarsubmenus();});
declaracionboton.addEventListener('click', () => {cerrarsubmenus();});
graficosboton.addEventListener('click', () => {cerrarsubmenus();}); */
/* ayudaboton.addEventListener('click', (e) => {e.preventDefault(); cambiarestado("ayuda"); openmenu(estadoayuda, submenuayudabtn);}); */

/* Esta funcion cambia el estado de los submenus, dependiendo del submenu que se active con el evento "click", esta funcion recibe el nombre de ese submenu
por medio de un texto, luego dependiendo del texto que se le pase, este cambia el estado de ese submenu.*/
/* function cambiarestado(texto) { */
    /* if (texto === "perfil") {
    estadoperfil = !estadoperfil;
    estadomensajes = false;
    estadoopciones = false;  
    } else if (texto === "mensaje") {
        estadomensajes = !estadomensajes;
        estadoperfil = false;
        estadoopciones = false;
    } else {
        estadoopciones = !estadoopciones;
        estadoperfil = false;
        estadomensajes = false;
    } */
    
    /* if (texto === "ayuda") {
        estadoayuda = !estadoayuda;
    } */
/* } */


/*Esta funcion se usa para abrir el submenu, recibe 4 parametros, el estado del submenu, si es true es que el submenu esta abierto, si es false es que el submenu se
encuentra cerrado, luego recibe otro parametro llamado submenu1 este sera el submenu que se desea abrir o cerrar, luego se reciben otros dos parametros que son 
submenu2 y submenu3, estos son los dos submenus que se cerraran en caso de que se encuentren abiertos.*/
/* function submenuopen(estado, submenu1, submenu2, submenu3){

    if (estado === true) {
        submenu1.style.maxHeight= '500px';
        submenu2.style.maxHeight= '0px';
        submenu3.style.maxHeight= '0px';
    }else{
        submenu1.style.maxHeight= '0px';
    }

} */

/* function openmenu(estado, submenu1){
    if (estado === true) {
        submenu1.style.maxHeight = '500px';
        flecha.classList.add("collapse");
    }else{
        submenu1.style.maxHeight= '0px';
        flecha.classList.remove("collapse");
    }
} */

/*Esta funcion no tiene parametros, pero si tiene un uso, esta funcion cierra todos los submenus que se encuentren abiertos, por decir si el usuario le da click
a un boton que no tenga un submenu, se cerraran todos los submenus. */
/* function cerrarsubmenus(){ */
        /* submenuperfil.style.maxHeight= '0px';
        submenumensajes.style.maxHeight= '0px';
        submenuopciones.style.maxHeight= '0px'; */
        /* submenuayudabtn.style.maxHeight = '0px';
        estadoayuda = false; */
        /* estadoopciones = false;
        estadoperfil = false;
        estadomensajes = false; */
/* } */




const itemlist = document.querySelectorAll(".item-list");


for (let i = 0; i < itemlist.length; i++) {
    
    itemlist[i].children[0].addEventListener('click', (e) => { 
        e.preventDefault(); 

        itemlist[i].children[0].children[1].children[0].classList.toggle("collapse");

        if(itemlist[i].children[1].style.maxHeight === "500px"){

            itemlist[i].children[1].style.maxHeight = '0px';

        }else{

            itemlist[i].children[1].style.maxHeight = '500px';

        }

        });
    
}