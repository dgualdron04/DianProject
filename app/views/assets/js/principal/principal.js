const bars = document.getElementById("bars"),
closebars = document.getElementById("closebars"),
wrapper = document.getElementById("wrapper");
var boolean = true;
bars.addEventListener('click', function(e){e.preventDefault(); sidebar()});
closebars.addEventListener('click', function(e){e.preventDefault(); sidebar()});

function sidebar(){
    boolean = !boolean;
    if (boolean === true) {
        wrapper.classList.add("collapse");

    }else{

        wrapper.classList.remove("collapse");

    }
    
}

function resize() {
  if (window.innerWidth > 842) {
    wrapper.classList.add("collapse");
  }
  else if (boolean === false && window.innerWidth < 842) {
    wrapper.classList.remove("collapse");
  }
}

window.onresize = resize;