const boton = document.getElementById('btnAgregar');

function mostrarpopup(msg) {
    document.getElementById("popup").style.display = "flex";
    document.getElementById("pop-up-text").innerText = msg;
}
function cerrarPopup() {
    document.getElementById("popup").style.display = "none";
}

boton.addEventListener("click",function(e){
    e.preventDefault();
    mostrarpopup();
})

