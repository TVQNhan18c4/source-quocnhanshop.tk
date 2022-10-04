
const orderBtns = document.querySelector(".btn-dathang"); 
const modalOrder = document.querySelector(".modal-order");

const modalContent = document.querySelector(".modal-content"); 
const modalClose = document.querySelector(".modal-close"); 

// CUSTOMER
function showModal() {
    modalOrder.classList.add("open");
}
function closeModal() {
    modalOrder.classList.remove("open");
}
if(orderBtns!=null && modalOrder!=null && modalContent!=null && modalClose!=null){
    orderBtns.addEventListener("click", showModal);
    modalClose.addEventListener("click", closeModal);
    modalOrder.addEventListener("click", closeModal);
    modalContent.addEventListener("click", function (event) {
        event.stopPropagation();
    }); 
}

