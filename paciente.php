<?php

$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "clinicapaginaweb";

$enlace = mysqli_connect ($servidor,$usuario,$clave,$baseDeDatos);

if(isset($_POST['registro'])){
    $nombre = $_POST['nombre'];
    $fecha = $_POST['nacimiento'];
    $genero = $_POST['genero'];
    $eCivil = $_POST['estadoc'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['email'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $cpostal = $_POST['cp'];
    $tsangre = $_POST['tsangre'];
    $alergias = $_POST['alergias'];

    $insertarDatos1 = "INSERT INTO paciente VALUES('','$nombre','$fecha','$genero','$eCivil','$telefono','$correo', '$direccion','$ciudad','$cpostal','$tsangre','$alergias',NOW(),'')";

    $ejecutarInsertar = mysqli_query ($enlace,$insertarDatos1);

    if($ejecutarInsertar) {
    echo "<script>
            alert('Enviado correctamente');
            window.location.href = 'pacientes.html';
          </script>";
}
}

if(isset($_POST['registro'])){
    $nombre = $_POST['nameuser'];
    $contraseña = $_POST['passuser'];

    $insertarDatos2 = "INSERT INTO usuario VALUES('','$nombre','$contraseña','2')";

    $ejecutarInsertar = mysqli_query ($enlace,$insertarDatos2);

    if($ejecutarInsertar) {
    echo "<script>
            alert('Enviado correctamente');
            window.location.href = 'pacientes.html';
          </script>";
}
}
