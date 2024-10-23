<?php
include("con_db.php");  // Incluye la conexión a la base de datos

$mensaje = "";  // Inicializa el mensaje vacío

if (isset($_POST['agregarItem'])) {  // Verifica si se ha enviado el formulario
    // Obtén los datos ingresados en el formulario
    $nombre = mysqli_real_escape_string($conex, trim($_POST['nombre']));
    $tipo = mysqli_real_escape_string($conex, trim($_POST['tipo']));
    $sexo = mysqli_real_escape_string($conex, trim($_POST['sexo']));
    $precio = mysqli_real_escape_string($conex, trim($_POST['precio']));
    $pormayor = mysqli_real_escape_string($conex, trim($_POST['pormayor']));
    $foto = mysqli_real_escape_string($conex, trim($_POST['foto']));  // URL de la foto

    // Verifica que los campos no estén vacíos
    if (!empty($nombre) && !empty($tipo) && !empty($sexo) && !empty($precio) && !empty($pormayor) && !empty($foto)) {
        // Consulta SQL para insertar el nuevo item
        $consulta = "INSERT INTO registraritems (nombre, tipo, sexo, precio, pormayor, foto) 
                     VALUES ('$nombre', '$tipo', '$sexo', '$precio', '$pormayor', '$foto')";
        $resultado = mysqli_query($conex, $consulta);  // Ejecuta la consulta

        if ($resultado) {  // Verifica si la inserción fue exitosa
            $mensaje = '<h3 class="ok">¡Item agregado correctamente!</h3>';
        } else {
            $mensaje = '<h3 class="bad">¡Error al agregar el item!</h3>';
        }
    } else {
        $mensaje = '<h3 class="bad">¡Por favor, completa todos los campos!</h3>';
    }
}

// Consulta para mostrar los items registrados
$items_result = mysqli_query($conex, "SELECT * FROM registraritems");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>J&S Calzados y Accesorios</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">J&S Calzados y Accesorios</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="./index.html">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="./login.php">SUSCRIBETE</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">INICIAR SESION</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead">
        <div class="container mt-5">
            <h1 class="text-center">Agregar Nuevo Item</h1>

            <!-- Mostrar mensaje -->
            <?php if (!empty($mensaje)) echo $mensaje; ?>

            <!-- Formulario para agregar item -->
            <form method="post" class="mt-4">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre del item" required>
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <input type="text" name="tipo" class="form-control" placeholder="Tipo del item" required>
                </div>

                <div class="form-group">
                    <label for="sexo">Sexo:</label>
                    <input type="text" name="sexo" class="form-control" placeholder="Sexo (Hombre/Mujer/Unisex)" required>
                </div>

                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="number" step="0.01" name="precio" class="form-control" placeholder="Precio del item" required>
                </div>

                <div class="form-group">
                    <label for="pormayor">Precio por Mayor:</label>
                    <input type="text" name="pormayor" class="form-control" placeholder="¿Disponible por mayor? (Sí/No)" required>
                </div>

                <div class="form-group">
                    <label for="foto">Foto (URL):</label>
                    <input type="text" name="foto" class="form-control" placeholder="URL de la foto" required>
                </div>

                <button type="submit" name="agregarItem" class="btn btn-primary btn-block">Agregar Item</button>
            </form>

            <h2 class="mt-5">Items Registrados</h2>

            <!-- Tabla de Items Registrados -->
            <table class="table table-striped mt-3" style="color:cornflowerblue">
                <thead class="thead-dark" >
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Sexo</th>
                        <th>Precio</th>
                        <th>Por Mayor</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($item = mysqli_fetch_assoc($items_result)): ?>
                        <tr style="color:cornflowerblue">
                            <td><?php echo $item['id']; ?></td>
                            <td><?php echo $item['nombre']; ?></td>
                            <td><?php echo $item['tipo']; ?></td>
                            <td><?php echo $item['sexo']; ?></td>
                            <td><?php echo $item['precio']; ?></td>
                            <td><?php echo $item['pormayor']; ?></td>
                            <td><img src="<?php echo $item['foto']; ?>" alt="Foto" style="width: 50px; height: 50px;"></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <a href="index.html" class="btn btn-secondary mt-3">Volver a Inicio</a>
        </div>
    </header>
</body>
</html>
