/* const slidePage = document.querySelector(".slide-page");
const nextBtnFirst = document.querySelector(".firstNext");
const prevBtnSec = document.querySelector(".prev-1");
const submitBtn = document.querySelector(".submit");
const progressText = document.querySelectorAll(".step p");
const progressCheck = document.querySelectorAll(".step .check");
const bullet = document.querySelectorAll(".step .bullet");
let current = 1;

nextBtnFirst.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "-25%";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
});

submitBtn.addEventListener("click", function(){
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
  setTimeout(function(){
    alert("Your Form Successfully Signed up");
    location.reload();
  },800);
});

prevBtnSec.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "0%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});
 */

 /*--- Inicio Modal Crear Parametros ---*/

const nextBtnFirst = document.querySelector(".firstNext");
const prevBtnFirst = document.querySelector(".firstPrev");
const progressText = document.querySelectorAll(".step .stepcrear");
const progressCheck = document.querySelectorAll(".step .checkcrear");
const bullet = document.querySelectorAll(".step .bulletcrear");
const slidePage = document.querySelector(".slide-page-crear");
const slidePage2 = document.querySelector(".slide-page-crear-2");
const formSubmit = document.getElementById('form-crear');
let current = 1;
slidePage2.style.display = "none";

nextBtnFirst.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.display = "none";
  slidePage2.style.display = "block";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
});

prevBtnFirst.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.display = "block";
  slidePage2.style.display = "none";
  
  if (current === 3) {
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -=2;
    bullet[current - 1].classList.remove("active");
    progressCheck[current - 1].classList.remove("active");
    progressText[current - 1].classList.remove("active");
  }else{
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -= 1;
  }
});


formSubmit.addEventListener("submit", (e) => {
  e.preventDefault();
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
  setTimeout(function(){
    alert("Your Form Successfully Signed up");
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -=2;
    bullet[current - 1].classList.remove("active");
    progressCheck[current - 1].classList.remove("active");
    progressText[current - 1].classList.remove("active");
  },800);
});

/*--- Fin Modal Crear Parametros ---*/


const nextBtnFirstEdit = document.querySelector(".firstNextEditar");
const prevBtnFirstEdit = document.querySelector(".firstPrevEditar");
const progressTextEdit = document.querySelectorAll(".step .stepeditar");
const progressCheckEdit = document.querySelectorAll(".step .checkeditar");
const bulletEdit = document.querySelectorAll(".step .bulleteditar");
const slidePageEdit = document.querySelector(".slide-page-editar");
const slidePage2Edit = document.querySelector(".slide-page-editar-2");
const formSubmitEdit = document.getElementById('form-editar');
let currentEdit = 1;
slidePage2Edit.style.display = "none";

nextBtnFirstEdit.addEventListener("click", function(event){
  event.preventDefault();
  slidePageEdit.style.display = "none";
  slidePage2Edit.style.display = "block";
  bulletEdit[currentEdit - 1].classList.add("active");
  progressCheckEdit[currentEdit - 1].classList.add("active");
  progressTextEdit[currentEdit - 1].classList.add("active");
  currentEdit += 1;
});

prevBtnFirstEdit.addEventListener("click", function(event){
  event.preventDefault();
  slidePageEdit.style.display = "block";
  slidePage2Edit.style.display = "none";
  
  if (currentEdit === 3) {
    bulletEdit[currentEdit - 2].classList.remove("active");
    progressCheckEdit[currentEdit - 2].classList.remove("active");
    progressTextEdit[currentEdit - 2].classList.remove("active");
    currentEdit -=2;
    bulletEdit[currentEdit - 1].classList.remove("active");
    progressCheckEdit[currentEdit - 1].classList.remove("active");
    progressTextEdit[currentEdit - 1].classList.remove("active");
  }else{
    bulletEdit[currentEdit - 2].classList.remove("active");
    progressCheckEdit[currentEdit - 2].classList.remove("active");
    progressTextEdit[currentEdit - 2].classList.remove("active");
    currentEdit -= 1;
  }
});


formSubmitEdit.addEventListener("submit", (e) => {
  e.preventDefault();
  bulletEdit[currentEdit - 1].classList.add("active");
  progressCheckEdit[currentEdit - 1].classList.add("active");
  progressTextEdit[currentEdit - 1].classList.add("active");
  currentEdit += 1;
  setTimeout(function(){
    alert("Your Form Successfully Signed up");
    bulletEdit[currentEdit - 2].classList.remove("active");
    progressCheckEdit[currentEdit - 2].classList.remove("active");
    progressTextEdit[currentEdit - 2].classList.remove("active");
    currentEdit -=2;
    bulletEdit[currentEdit - 1].classList.remove("active");
    progressCheckEdit[currentEdit - 1].classList.remove("active");
    progressTextEdit[currentEdit - 1].classList.remove("active");
  },800);
});