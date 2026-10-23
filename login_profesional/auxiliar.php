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

function mover ($lugar) {
    header("Location:$lugar");
    exit;
}

function comprobar_usuario_contrasena(PDO $pdo, string $email, string $password, &$errores):void {
    $sent = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email and contrasena = :contrasena");
    $sent->execute([':email' => $email, ':contrasena'=> $password]);
    if (empty($sent->fetchAll())) {
        $errores[] = 'Email o contraseña incorrectos';
    }
}