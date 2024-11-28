<?php
session_start(); // Esto debe ir antes de cualquier salida al navegador

// Configuración de conexión a la base de datos
$host = 'localhost';
$user = 'Cache3815';
$password = 'z1fVrI&ZVfyonsZ';
$db = 'carconnect';

$conn = mysqli_connect($host, $user, $password, $db);
if (!$conn) {
    die("Error al conectar al servidor: " . mysqli_connect_error());
}

if (isset($_POST['Registro'])) {
    //! Hacemos el request de los campos del formulario 
    //* htmlspecialchars convierte caracteres especiales como estos:
    //*    < → &lt;
    //*    > → &gt;
    //*    & → &amp;
    //*    " → &quot;
    //*    ' → &#039; (opcional)
    //* Trim sirve para eliminar campos en blanco
    $usuario = htmlspecialchars(trim($_POST['email_registro']));
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $apellidos = htmlspecialchars(trim($_POST['apellidos']));
    $telefono = htmlspecialchars(trim($_POST['telefono']));
    $password = htmlspecialchars(trim($_POST['pwd_registro']));

    //! creamos una variable para guardar la contraseña encriptada
    $contrasena_hash = password_hash($password, PASSWORD_DEFAULT);
    //! Creamos la consulta pero en lugar de poner los vaules escribimos un ? 
    //* Se hace para prepara la consulta y segurizarlo
    $sql = "INSERT INTO usuarios(email, nombre, apellidos, telefono, contrasena) VALUES (?, ?, ?, ?, ?)";
    //! Preparamos la consulta con el $conn 
    if ($stmt = mysqli_prepare($conn, $sql)) {
        //! Pasamos los parametros que queremos insertar con la varaible al principio $stmt y s 
        //* Se pone la variable $stmt para que sepa donde van las variables
        //* Y se ponen tantas S como variables se vayan a añadir
        mysqli_stmt_bind_param($stmt, "sssss", $usuario, $nombre, $apellidos, $telefono, $contrasena_hash);
        //! Si se ejecuta la variable $stmt 
        if (mysqli_stmt_execute($stmt)) {
            //! Envia un alert de acceptacion 
            //* Tambien se puede hacer sin alert 
            echo "<script>alert('Usuario registrado con éxito');</script>";
        } else {
            //! En caso de error
            echo "<script>alert('Error en el registro: " . mysqli_error($conn) . "');</script>";
        }
        //! En caso de error cierra la variable $stmt
        mysqli_stmt_close($stmt);
    } else {
        //! mensje en caso de que algo en la preparacion no haya funcionado
        echo "<script>alert('Error al preparar la consulta');</script>";
    }
}

// Inicio de sesión
if (isset($_POST['Iniciar'])) {
    //! Hacemos el request de los campos del formulario 
    //* htmlspecialchars convierte caracteres especiales como estos:
    //*    < → &lt;
    //*    > → &gt;
    //*    & → &amp;
    //*    " → &quot;
    //*    ' → &#039; (opcional)
    //* Trim sirve para eliminar campos en blanco
    $email = htmlspecialchars(trim($_POST['email_iniciar']));
    $pwd = trim($_POST['pwd_inicar']);

    //! Creamos la consulta pero el parametro buscado se cambia por un ? 
    $sql = "SELECT email, contrasena FROM usuarios WHERE email = ?";
     //! Preparamos la consulta con el $conn
    if ($stmt = mysqli_prepare($conn, $sql)) {
        //! Pasamos el parametro
        //* Como en este caso buscamos por correo solo pasamos un parametro
        mysqli_stmt_bind_param($stmt, "s", $email);
        //! Ejecutamos
        mysqli_stmt_execute($stmt);
        //! Y guardamos el correo y la contraseña con dos variables diferentes
        mysqli_stmt_bind_result($stmt, $email_db, $password_hash);
        if (mysqli_stmt_fetch($stmt)) {
            //! Verificamos la contraseña
            if (password_verify($pwd, $password_hash)) {
                //! Verificamos correo admin
                if ($email === "admin@carconnect.com") {
                    //! Redirigir a la página de administrador
                    $_SESSION['email_iniciar'] = $email;
                    header("Location: ../ADMIN/index.html");
                    //! Cualquier otro correo 
                } else {
                    //! Redirigir a la página de usuario normal
                    $_SESSION['email_iniciar'] = $email;
                    header("Location: ../inicio.php");
                }
                exit();
            } else {
                echo "<script>alert('Contraseña incorrecta');</script>";
            }
        } else {
            echo "<script>alert('Correo no registrado');</script>";
        }
        mysqli_stmt_close($stmt);
    } else {
        error_log("Error al preparar la consulta: " . mysqli_error($conn));
        echo "<script>alert('Error interno. Por favor, intenta más tarde.');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-translate="title">CarConnect | Inicio Registro</title>
    <link rel="stylesheet" href="../CSS/REGIN/estilos.css">
    <link rel="shortcut icon" href="../IMG/LOGO/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="../JS/REGIN/animacion.js" defer></script>
    <script src="../JS/REGIN/contraseña.js" defer></script>
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-- Formulario de Inicio de Sesión -->
                <form action="" method="post" class="sign-in-form">
                    <h2 class="title" data-translate="iniciarsesion">Iniciar Sesión</h2>
                   <!-- Campo para el correo electrónico -->
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email_iniciar" id="email_iniciar" placeholder="Correo electrónico" data-translate="email-placeholder-iniciar" required maxlength="100">
                    </div>
                    <!-- Campo para la contraseña -->
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="pwd_inicar" id="pwd_inicar" placeholder="Introduce tu contraseña" data-translate="contrasena-placeholder-iniciar" required>
                    </div>
                    <!-- Checkbox para mostrar/ocultar la contraseña -->
                    <div class="checkbox">
                        <input type="checkbox" id="show-password"> 
                        <label for="show-password" data-translate="mostrar-contrasena">Mostrar Contraseña</label>
                    </div>
                    <!-- Enlace para "Contraseña Olvidada" -->
                    <div class="link">
                        <p data-translate="contrasena-olvidada"><a href="">¿Contraseña Olvidada?</a></p>
                    </div>
                    <!-- Botón de submit -->
                    <input type="submit" name="Iniciar" value="Iniciar Sesión" data-translate="boton-iniciar" class="btn">
                </form>

                <!-- Formulario de Registro -->
                <form action="" method="post" class="sign-up-form">
                    <h2 class="title" data-translate="registro">Registro</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email_registro" id="email_registro" placeholder="Correo electrónico" data-translate="email-placeholder-registro" required maxlength="100">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="nombre" id="nombre" placeholder="Introduce tu nombre" data-translate="nombre-placeholder" required maxlength="50">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="apellidos" id="apellidos" placeholder="Introduce tus apellidos" data-translate="apellidos-placeholder" required maxlength="80">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="tel" name="telefono" id="telefono" placeholder="Introduce tu teléfono" data-translate="telefono-placeholder" required pattern="[0-9]{9}">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="pwd_registro" id="pwd_registro" placeholder="Introduce contraseña" data-translate="contrasena-placeholder-registro" required minlength="15" maxlength="27">
                    </div>
                    <input type="submit" class="btn" value="Registro" name="Registro" data-translate="boton-registro">
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3 data-translate="h3">Bienvenido de nuevo</h3>
                    <p data-translate="p">
                        Nos alegra volverte a ver, esperemos que la comunidad se agrande.
                    </p>
                    <button class="btn transparent" id="sign-up-btn" data-translate="btn-registrar">
                        Registrarte
                    </button>
                </div>
                <img src="../IMG/LOGO/logo.png" class="image" alt="Logo">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3 data-translate="h3-bienvenida">Bienvenido a CarConnect</h3>
                    <p data-translate="p-bienvenida">
                        Queremos darte la bienvenida a la mejor comunidad de protección del vehículo.
                    </p>
                    <button class="btn transparent" id="sign-in-btn" data-translate="btn-iniciar">
                        Iniciar Sesión
                    </button>
                </div>
                <img src="../IMG/LOGO/logo.png" alt="Logo" class="image">
            </div>
        </div>
    </div>
</body>
</html>