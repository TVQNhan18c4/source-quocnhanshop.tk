
const Cr_Btns = document.querySelector(".btn_Cr"); 
const modalCr = document.querySelector(".modal");

const modalContent = document.querySelector(".modal-content"); 
const modalClose = document.querySelector(".modal-close"); 

// ADMIN
function showModal() {
    modalCr.classList.add("open");
}
function closeModal() {
    modalCr.classList.remove("open");
}

if(Cr_Btns!=null && modalCr!=null && modalContent!=null && modalClose!=null){
    Cr_Btns.addEventListener("click", showModal);
    modalClose.addEventListener("click", closeModal);
    modalCr.addEventListener("click", closeModal);
    modalContent.addEventListener("click", function (event) {
        event.stopPropagation();
    });
}

