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
                    <li class="nav-item"><a class="nav-link" href="#contact">SUSCRIBETE</a></li>
                    <li class="nav-item"><a class="nav-link" href="./sesion.php">INICIAR SESION</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead">
        <div class="container">
            <form method="post">
                <h1>CREAR CUENTA</h1>
                <input class="nombrelogin" type="text" name="name" placeholder="Nombre completo">
                <input class="emaillogin" type="email" name="email" placeholder="Email">
                <input class="contralogin" type="password" name="contra" placeholder="Contraseña">
                <input class="btn btn-primary btn-xl text-uppercase" type="submit" name="register" value="Registrarse">
            </form>

            <!-- Incluye el archivo PHP para registrar -->
            <?php include("registrar.php"); ?>
            <?php if (!empty($mensaje)) echo $mensaje; ?>
        </div>
    </header>
</body>
</html>
