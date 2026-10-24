<?php

require 'auxiliar.php';

$errores = [];

$pdo = conectar();
session_start();
$email = $_SESSION['email']; 

$id = obtener_id($pdo, $email);

$filas = todos_usuarios($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim(obtener_post('nombre'));
    validar_nombre( $nombre , $errores);
    
    if(!$errores) {
        $filas = buscar_usuario( $pdo, $nombre);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body id="body_usuarios">
    <header id="cabecera_usuarios">
        <h1>Registro de usuarios</h1>
    </header>
    <main id="main_usuarios">
        <form id="form_usuarios" action="" method="post">
            <label>
                Buscar por nombre: <br>
                <input type="text" id="nombre" name="nombre"
                value="<?= $nombre ?? ''?>"><br>
            </label>
            <button type="submit">Buscar</button>
        </form>
        <ul id="errores_usuarios">
            <?php
                foreach ($errores as $error) {
                ?> <li><?= $error?></li> <?php
                }
            ?>
        </ul>
        <?php 
        if (empty($errores)) {
            ?> <p id="registros">Se encontraron <?= count($filas) ?> registros</p> <?php
        }
        if (!empty($filas) and empty($errores)) {
        
        ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($filas as $usuario) {
                    ?>
                    <tr <?= ($usuario['email'] === $email) ? 'class="cuenta_actual"' : ''?>>
                        <td><?= $usuario['nombre'] ?></td>
                        <td><?= $usuario['apellidos'] ?></td>
                        <td><?= $usuario['email'] ?></td>
                    </tr>
                    <?php
                }
                ?>
                <tr></tr>
            </tbody>
        </table>
        <?php } ?>
        <a href="index.php" class="botones_admin" id="volver">Volver</a>
        <a href="usuarios.php" id="mostrar_todos" class="botones_admin">Mostrar Todo</a>
        <a href="borrar.php" id="cerrar_sesion" class="botones_admin">Cerrar Sesion</a>
    </main>
</body>
</html>

