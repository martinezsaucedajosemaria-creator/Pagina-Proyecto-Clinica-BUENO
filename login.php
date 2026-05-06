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
$bandera = '';
if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row['password'])) {
        header("Location: dashboard.html");
        exit();
        $bandera = 'correcta';
    } else {
        header("Location: index.html");
        exit();
        $bandera = 'contraseña';
    }
} else {
    header("Location: index.html");
    exit();
    $bandera = 'usuario';
}