
const toast = document.getElementById("snackbar");

function f_toast() {
    toast.className = "show";
    setTimeout(function () {
        toast.className = toast.className.replace("show", "");
    }, 2000);
}

if (toast.textContent != "") {
    // if(toast.textContent == "thêm thành công"){
    //     toast.style.background = "green";
    // }else{
    //     toast.style.background = "red";
    // }
    toast.style.background = "orange";
    f_toast()
}




