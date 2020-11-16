const bars = document.getElementById("bars");
const closebars = document.getElementById("closebars");
const fondocontainer = document.getElementById("fondo-container");
const wrapper = document.getElementById("wrapper");
const footer = document.getElementById("footer");
let boolean = true;
bars.addEventListener('click', function () { sidebar() });
closebars.addEventListener('click', function () { sidebar() });


function sidebar() {
    boolean = !boolean;
    if (boolean === true) {
        fondocontainer.classList.add("collapse");
        wrapper.classList.add("collapse");
        footer.classList.add("collapse");
    } else {

        wrapper.classList.remove("collapse");
        fondocontainer.classList.remove("collapse");
        footer.classList.remove("collapse");
    }

}