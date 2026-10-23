<?php
require 'auxiliar.php';

$pdo = conectar();

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = obtener_post('email');
    $password = obtener_post('password');

    if (!$email) {
        $errores[] = 'El email está vacío';
    } elseif(empty(obtener_email($email, $pdo))) {
        $errores[] = 'El email no está registrado';
    } elseif (empty(obtener_password($password, $pdo))) {
        $errores[] = 'La contraseña es incorrecta.';
    }

    if (!$password) {
        $errores[] = 'La contraseña está vacía.';
    } 

    if (!$errores) {
        mover('usuarios.php');
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Profesional</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body id="body_index">
    <header id="cabecera_index">
        <h1>Bienvenido de nuevo.</h1>
        <p id="eslogan">Inicie sesión o registrese.</p>
    </header>
    <main id="main_index">
        <form action="index.php" method="post">
            <fieldset id="form_principal">
                <legend>Inicio de sesión</legend>
                <label>
                    <input type="text" id="email" name="email" placeholder="Correo Electrónico">
                </label>
                <br>
                <label>
                    <input type="password" id="password" name="password" placeholder="Contraseña">
                </label>
                <div id="errores_index">
                    <ul>
                        <?php foreach($errores as $error) { ?> 
                        <li><?= $error ?></li> <?php
                        }?>
                    </ul>
                </div>
                <br>
                <button id="bot_inicio" type="submit">Iniciar Sesión</button><br>
            </fieldset>
        </form>
        <form action="registrarse.php" method="post">
            <fieldset id="form_registrarse">
                <legend>No estoy registrado</legend><br>
                <button id="bot_registro" type="submit">Registrarse</button>
            </fieldset>
        </form>
    </main>
</body>

</html>