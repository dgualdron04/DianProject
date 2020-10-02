const bars = document.getElementById("bars"),
closebars = document.getElementById("closebars"),
fondocontainer = document.getElementById("fondo-container"),
wrapper = document.getElementById("wrapper"),
footer = document.getElementById("footer");
var boolean = true;
bars.addEventListener('click', function(){sidebar()});
closebars.addEventListener('click', function(){sidebar()});


function sidebar(){
    boolean = !boolean;
    if (boolean === true) {
        fondocontainer.classList.add("collapse");
        wrapper.classList.add("collapse");
        footer.classList.add("collapse");
    }else{

        wrapper.classList.remove("collapse");
        fondocontainer.classList.remove("collapse");
        footer.classList.remove("collapse");
    }
    
}