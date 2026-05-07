<?php
date_default_timezone_set('America/Mexico_City');
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "clinicapaginaweb";
$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

// 1. Contar Total
$resTotal = mysqli_query($enlace, "SELECT COUNT(*) as total FROM paciente");
$total = mysqli_fetch_assoc($resTotal)['total'];

// 2. Contar Nuevos (de hoy)
$hoy = date('Y-m-d');
// Cuenta pacientes de los últimos 7 días
// Cambia la línea de $resNuevos por esta:
$resNuevos = mysqli_query($enlace, "SELECT COUNT(*) as nuevos FROM paciente WHERE fecha_alta >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)");
$nuevos = mysqli_fetch_assoc($resNuevos)['nuevos'];

// Enviamos los datos en formato JSON para que JavaScript los entienda
echo json_encode([
    "total" => $total,
    "nuevos" => $nuevos
]);
?>