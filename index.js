const formulario = document.getElementById('formlogin');

function mostrarError(msg) {
    document.getElementById("pop-up-text").innerText = msg;
    document.getElementById("popup").style.display = "flex";
}
function cerrarPopup() {
    document.getElementById("popup").style.display = "none";
}

formulario.addEventListener('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(formulario);

    fetch("login.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.text())
.then(data => {
        // 1. Aquí declaramos la variable 'respuesta' para que JS sepa qué es
        let respuesta = data.trim(); 
        
        console.log("RESPUESTA:", JSON.stringify(respuesta));

        // 2. Ahora ya podemos usarla en los 'if' sin que marque error
        if (respuesta === "admin") {
            window.location.href = "dashboard.html";
        } else if (respuesta === "usuario") {
            window.location.href = "./usuario/dashboard.html"; 
        } else if (respuesta === "pass_error") {
            mostrarError("Contraseña incorrecta");
        } else if (respuesta === "user_error") {
            mostrarError("Usuario incorrecto");
        } else if (respuesta === "rol_desconocido") {
            mostrarError("El usuario no tiene un rol asignado válido");
        } else {
            mostrarError("Respuesta rara: " + data);
        }
    });
});