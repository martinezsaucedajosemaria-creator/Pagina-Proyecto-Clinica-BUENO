<?php
$enlace = mysqli_connect("localhost", "root", "", "clinicapaginaweb");

// Corregido a 'paciente' (singular) según tu phpMyAdmin
$consulta = "SELECT * FROM paciente"; 
$result = mysqli_query($enlace, $consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <style>
        table { width: 80%; border-collapse: collapse; font-family: sans-serif; background-color: #fdf8cf; }
        th { background: #a18262; color: white; padding: 12px; }
        td { padding: 10px; border-bottom: 1px solid #ddd; text-align: center; color: #653a02; }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha de Nacimiento</th>
                <th>Genero</th>
                <th>Estado Civil</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Direccion</th>
                <th>Ciudad</th>
                <th>Codigo Postal</th>
                <th>Tipo de Sangre</th>
                <th>Alergias</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($colum = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo $colum['idPaciente']; ?></td>
                <td><?php echo $colum['nombre']; ?></td>
                <td><?php echo $colum['fecha']; ?></td>
                <td><?php echo $colum['genero']; ?></td>
                <td><?php echo $colum['estadocivil']; ?></td>
                <td><?php echo $colum['telefono']; ?></td>
                <td><?php echo $colum['correo']; ?></td>
                <td><?php echo $colum['dirrecion']; ?></td>
                <td><?php echo $colum['ciudad']; ?></td>
                <td><?php echo $colum['cpostal']; ?></td>
                <td><?php echo $colum['sangre']; ?></td>
                <td><?php echo $colum['alergias']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>