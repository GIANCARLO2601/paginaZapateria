<?php
include("con_db.php");  // Incluye la conexión a la base de datos

$mensaje = "";  // Inicializa el mensaje vacío

if (isset($_POST['register'])) {  // Verifica si se ha enviado el formulario
    if (strlen($_POST['name']) > 0 && strlen($_POST['email']) > 0) {  // Verifica que los campos no estén vacíos
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['contra']);
        $fechareg = date("Y-m-d");  // Fecha de registro

        // Consulta SQL para insertar los datos
        $consulta = "INSERT INTO cuentanueva(nombre, email, contra, fecha_reg) 
                     VALUES ('$name', '$email', '$password', '$fechareg')";
        $resultado = mysqli_query($conex, $consulta);  // Ejecuta la consulta

        if ($resultado) {  // Verifica si la consulta fue exitosa
            $mensaje = '<h3 class="ok">¡Te has inscrito correctamente!</h3>';
        } else {
            $mensaje = '<h3 class="bad">¡Ups, ha ocurrido un error!</h3>';
        }
    } else {
        $mensaje = '<h3 class="bad">¡Por favor, completa todos los campos!</h3>';
    }
}
?>
