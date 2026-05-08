<?php

if (!isset($_POST['usuario']) || !isset($_POST['pass'])) {
    echo "error";
    exit();
}

$conn = new mysqli("localhost", "root", "", "clinicapaginaweb");

$usuario = $_POST['usuario'];
$password = $_POST['pass'];

$sql = "SELECT * FROM usuario WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row['password'])) {
        // AQUI ESTÁ EL CAMBIO: Evaluamos el idRol en lugar de solo imprimir "ok"
        if ($row['idRol'] == 1) {
            echo "admin";
        } else if ($row['idRol'] == 2) {
            echo "usuario";
        } else {
            echo "rol_desconocido";
        }
    } else {
        echo "pass_error";
    }
} else {
    echo "user_error";
}