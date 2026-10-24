<?php
require 'auxiliar.php';

$errores = [];

$pdo = conectar();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = obtener_post("nombre");
    $apellidos = obtener_post("apellidos");
    $email = obtener_post("email");
    $contrasena = obtener_post("contrasena");
    $confirmar_contrasena = obtener_post("confirmar_contrasena");

    validar_nombre_registro($nombre, $errores);
    validar_apellidos_registro($apellidos, $errores);
    validar_email_registro($email, $errores);
    validar_contrasena_registro($contrasena, $errores);

    comparar_contrasenas($confirmar_contrasena, $contrasena, $errores);
    confirmar_usuario_nuevo($pdo, $email, $errores);

    if (empty($errores)) {
        insertar_usuario($pdo, $nombre, $apellidos, $email, $contrasena);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Registrarse</title>
</head>
<body id="body_registro">
    <header id="cabecera_registro">
        <h1>Zona de Registro</h1>
    </header>
    <main id="main_registro">
        <form action="registro.php" method="post">
            <fieldset>
                <legend>Relllena todos los campos para registrate</legend>
                <label>
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre"
                    value="<?= $nombre ?? ''?>"><br>
                    <ul class="errores">
                        <?php
                        foreach ($errores['nombre'] ?? [] as $error) { ?>
                            <li><?= $error?></li> <?php
                        } ?>
                    </ul>
                </label>
                <label>
                    <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos"
                    value="<?= $apellidos ?? ''?>"><br>
                    <ul class="errores">
                        <?php
                        foreach ($errores['apellidos'] ?? [] as $error) { ?>
                            <li><?= $error?></li> <?php
                        } ?>
                    </ul>
                </label>
                <label>
                    <input type="text" id="email" name="email" placeholder="Correo Electrónico"
                    value="<?= $email ?? ''?>"><br>
                    <ul class="errores">
                        <?php
                        foreach ($errores['email'] ?? [] as $error) { ?>
                            <li><?= $error?></li> <?php
                        } ?>
                    </ul>
                </label>
                <label>
                    <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña"><br>
                    <ul class="errores">
                        <?php
                        foreach ($errores['contrasena'] ?? [] as $error) { ?>
                            <li><?= $error?></li> <?php
                        } ?>
                    </ul>
                </label>
                <label>
                    <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" placeholder="Repite la contraseña"><br>
                    <ul class="errores">
                        <?php
                        foreach ($errores['confirmar_contrasena'] ?? [] as $error) { ?>
                            <li><?= $error?></li> <?php
                        } ?>
                    </ul>
                </label>
                <ul class="errores">
                    <?php
                    foreach ($errores['otros'] ?? [] as $error) { ?>
                        <li><?= $error?></li> <?php
                    } ?>
                </ul>
                <button type="submit" id="registrarme">Registrarme</button>
            </fieldset>
        </form>
        <a href="index.php" class="botones_admin" id="volver">Volver</a>
    </main>
</body>
</html>