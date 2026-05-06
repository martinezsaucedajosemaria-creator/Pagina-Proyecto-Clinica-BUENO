const formulario = document.getElementById('formlogin');
<<<<<<< HEAD
=======
<<<<<<< HEAD
const inputusuario = document.getElementById('usuario');
const inputpass = document.getElementById('pass');
>>>>>>> 18652f2 (Cambio de direccion)

formulario.addEventListener('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(formulario);

    fetch("login.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.text())
    .then(data => {

<<<<<<< HEAD
=======
    let usuarioingresado = inputusuario.value.trim();
    let passwordingresada = inputpass.value;

    if (usuarioingresado == USUARIOV && passwordingresada == passV){
        window.location.href = "dashboard.html";
    }
});
=======

formulario.addEventListener('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(formulario);

    fetch("login.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.text())
    .then(data => {

>>>>>>> 18652f2 (Cambio de direccion)
        if (data === "ok") {
            window.location.href = "dashboard.html";
        } 
        else if (data === "pass_error") {
            mostrarError("Contraseña incorrecta");
        } 
        else if (data === "user_error") {
            mostrarError("Usuario no existe");
        }
    });
});
<<<<<<< HEAD
=======
>>>>>>> 7131217 (Cambio de direccion)
>>>>>>> 18652f2 (Cambio de direccion)
