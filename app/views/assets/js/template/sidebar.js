const bars = document.getElementById("bars"),
closebars = document.getElementById("closebars"),
fondocontainer = document.getElementById("fondo-container"),
wrapper = document.getElementById("wrapper");
var boolean = true;
bars.addEventListener('click', function(){sidebar()});
closebars.addEventListener('click', function(){sidebar()});


function sidebar(){
    boolean = !boolean;
    if (boolean === true) {
        fondocontainer.classList.add("collapse");
        wrapper.classList.add("collapse");

    }else{

        wrapper.classList.remove("collapse");
        fondocontainer.classList.remove("collapse");

    }
    
}