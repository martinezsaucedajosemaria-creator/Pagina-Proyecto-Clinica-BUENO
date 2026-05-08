<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "clinicapaginaweb";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

if(isset($_POST['registro'])){
    // 1. RECOGER DATOS DEL PACIENTE
    $nombre_paciente = $_POST['nombre'];
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

    // 2. RECOGER DATOS DE LA CUENTA DE USUARIO
    // Asegúrate de que estos nombres coincidan con los 'name' de tus <input>
    $user_login = $_POST['nameuser']; 
    $pass_plana = $_POST['passuser'];

    // 3. CREAR EL HASH DE LA CONTRASEÑA
    $hash = password_hash($pass_plana, PASSWORD_DEFAULT);

    // 4. PRIMERO: INSERTAR EN LA TABLA USUARIO
    // Usamos prepared statements para mayor seguridad
    $stmtUser = $enlace->prepare("INSERT INTO usuario (usuario, password, idRol) VALUES (?, ?, '2')");
    $stmtUser->bind_param("ss", $user_login, $hash);
    
    if($stmtUser->execute()){
        // 5. OBTENER EL ID DEL USUARIO QUE SE ACABA DE CREAR
        $ultimo_id_usuario = $enlace->insert_id;

        $sqlPaciente = "INSERT INTO paciente (nombre, fecha, genero, estadocivil, telefono, correo, dirrecion, ciudad, cpostal, sangre, alergias, fecha_alta, idusuario) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)";
        
        $stmtPac = $enlace->prepare($sqlPaciente);
        $stmtPac->bind_param("sssssssssssi", 
            $nombre_paciente, $fecha, $genero, $eCivil, $telefono, 
            $correo, $direccion, $ciudad, $cpostal, $tsangre, $alergias, $ultimo_id_usuario
        );

        if($stmtPac->execute()){
            echo "<script>
                    alert('Usuario y Paciente registrados correctamente');
                    window.location.href = 'pacientes.html';
                  </script>";
        } else {
            echo "Error al registrar paciente: " . $enlace->error;
        }
    } else {
        echo "Error al crear cuenta de usuario: " . $enlace->error;
    }
}
?>