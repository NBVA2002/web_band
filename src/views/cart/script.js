const btnSendOrder = document.getElementById("btn-order");
let a = JSON.parse(getCookie("cart"));
if(a.length == 0) {
    btnSendOrder.style.display = "none";
}