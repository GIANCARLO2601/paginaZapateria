<?php
include("con_db.php");  // Incluye la conexión a la base de datos

$mensaje = "";  // Inicializa el mensaje vacío

if (isset($_POST['iniciarsesion'])) {  // Verifica si se ha enviado el formulario
    $email = mysqli_real_escape_string($conex, trim($_POST['emailsesion']));
    $password = mysqli_real_escape_string($conex, trim($_POST['contrasesion']));

    if (!empty($email) && !empty($password)) {
        // Consulta SQL para verificar email y contraseña
        $consulta = "SELECT * FROM cuentanueva WHERE email = '$email' AND contra = '$password'";
        $resultado = mysqli_query($conex, $consulta);  // Ejecuta la consulta

        if ($resultado) {  // Verifica si la consulta se ejecutó correctamente
            if (mysqli_num_rows($resultado) > 0) {  // Si hay coincidencias
                $mensaje = '<h3 class="ok">¡Inicio de sesión exitoso!</h3>';
            } else {  // Si no hay coincidencias
                $mensaje = '<h3 class="bad">¡Email o contraseña incorrectos!</h3>';
            }
        } else {
            $mensaje = '<h3 class="bad">Error en la consulta: ' . mysqli_error($conex) . '</h3>';
        }
    } else {
        $mensaje = '<h3 class="bad">¡Por favor, completa todos los campos!</h3>';
    }
}
?>
