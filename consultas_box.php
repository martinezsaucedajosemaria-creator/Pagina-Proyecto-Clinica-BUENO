<?php
date_default_timezone_set('America/Mexico_City');
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "clinicapaginaweb";
$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

$resTotal = mysqli_query($enlace, "SELECT COUNT(*) as total FROM paciente");
$total = mysqli_fetch_assoc($resTotal)['total'];

$hoy = date('Y-m-d');
$resNuevos = mysqli_query($enlace, "SELECT COUNT(*) as nuevos FROM paciente WHERE fecha_alta >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)");
    $nuevos = mysqli_fetch_assoc($resNuevos)['nuevos'];

echo json_encode([
    "total" => $total,
    "nuevos" => $nuevos
]);
?>