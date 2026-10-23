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
        <form action="usuarios.php" method="post">
            <fieldset id="form_principal">
                <legend>Inicio de sesión</legend>
                <label>
                    <input type="email" id="email" name="email" placeholder="Correo Electrónico" required>
                </label>
                <br>
                <label>
                    <input type="password" id="password" name="password" placeholder="Contraseña" required>
                </label>
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
        <?php

        $errores = [];

        require 'auxiliar.php';

        $pdo = conectar();




        ?>
    </main>
</body>

</html>