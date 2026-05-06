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
        console.log("RESPUESTA:", JSON.stringify(data));

        if (data.trim() === "ok") {
            window.location.href = "dashboard.html";
        } else if (data.trim() === "pass_error") {
            mostrarError("Contraseña incorrecta");
        } else if (data.trim() === "user_error") {
            mostrarError("Usuario incorrecto");
        } else {
            mostrarError("Respuesta rara: " + data);
        }
    });
});