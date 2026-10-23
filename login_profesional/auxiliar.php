<?php

function conectar(): PDO {
    return new PDO('pgsql:host=localhost;dbname=login', 'login','login');
}

function todos_usuarios(PDO $pdo): array {
    $sent = $pdo->query('SELECT * FROM usuarios');
    return $sent->fetchAll();
}

function obtener_post($campo): ?string{
      $elemento = $_POST[$campo];
      return $elemento;
}

function obtener_email($campo, $pdo): array{
    $sent = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sent->execute([':email'=>$campo]);
    return $sent->fetchAll();
}

function obtener_password($campo, $pdo): array{
    $sent = $pdo->prepare("SELECT * FROM usuarios WHERE contrasena = :contrasena");
    $sent->execute([':contrasena'=>$campo]);
    return $sent->fetchAll();
}

function mover ($lugar) {
    header("Location:$lugar");
}