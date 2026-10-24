<?php

function conectar(): PDO {
    return new PDO('pgsql:host=localhost;dbname=login', 'login','login');
}

function obtener_id(PDO $pdo, string $email): ?int {
    $sent = $pdo->prepare('SELECT id FROM usuarios WHERE email = :email');
    $sent->execute([':email'=> $email]);
    return $sent->fetchColumn();
}

function todos_usuarios(PDO $pdo): array {
    $sent = $pdo->query('SELECT * FROM usuarios');
    return $sent->fetchAll();
}

function obtener_post($campo): ?string{
      return trim($_POST[$campo] ?? '');
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

/* Archivo usuarios.php */

function validar_nombre($nombre, &$errores): void {
    if ($nombre == '') {
        $errores[] = 'El nombre está vacío';
    }
}

function buscar_usuario(PDO $pdo, string $nombre): ?array {
    $sent = $pdo->prepare('SELECT * FROM usuarios WHERE nombre ilike :nombre');
    $sent->execute([':nombre' => "%$nombre%"]);
    return $sent->fetchAll();
    
}

/* Borrar.php */

function darse_de_baja(PDO $pdo, string $email): void {
    $sent = $pdo->prepare('DELETE FROM usuarios WHERE email = :email');
    $sent->execute([':email'=>$email]);
}