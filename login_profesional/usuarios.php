<?php

require 'auxiliar.php';

$errores = [];

$pdo = conectar();
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
                $filas = todos_usuarios($pdo);
                foreach ($filas as $usuario) {
                    ?>
                    <tr>
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
        <a href="index.php" class="volver">Volver</a>
    </main>
</body>

</html>