let cerrar = document.getElementById("close-modal-crear"),
  cerrar2 = document.getElementById("close-modal-delete"),
  cerrar3 = document.getElementById("close-modal-edit"),
  modal = document.getElementById("cont-modal-crear"),
  modal2 = document.getElementById("cont-modal-delete"),
  modal3 = document.getElementById("cont-modal-edit"),
  modalc = document.getElementById("modal-crear"),
  modaldel = document.getElementById("modal-delete"),
  modaledit = document.getElementById("modal-edit"),
  abrir,
  contlist = 0;


  function abrircrear(e) {
    e.preventDefault(); abrirmodal(modal, modalc);
  }

function abrirmodal(modal, modalabrir) {
    modalabrir.style.opacity = "1";
    modalabrir.style.visibility = "visible";
    modal.classList.toggle("modal-close");
}

cerrar.addEventListener('click', () => { cerrarmodal(modal, modalc);});
cerrar2.addEventListener('click', () => { cerrarmodal(modal2, modaldel);});
cerrar3.addEventListener('click', () => { cerrarmodal(modal3, modaledit);});

function cerrarmodal(modal, modalcerrar) {
  modal.classList.toggle("modal-close");
  setTimeout(() => {
    modalcerrar.style.opacity = "0";
    modalcerrar.style.visibility = "hidden";
  }, 600);
}

/* window.addEventListener("click", (e) => { closeclick(e, modal, modalc); })
window.addEventListener("click", (e) => { closeclick(e, modal2, modaldel); })
window.addEventListener("click", (e) => { closeclick(e, modal3, modaledit); })

function closeclick(e, modal, modalcerrar)
{
    if (e.target === modalcerrar) {
      contlist++;
        if (contlist === 1) {
          modal.classList.toggle("modal-close");
          setTimeout(() => {
            modalcerrar.style.opacity = "0";
            modalcerrar.style.visibility = "hidden";
            contlist = contlist - contlist;
          }, 600);
        }
      }
} */