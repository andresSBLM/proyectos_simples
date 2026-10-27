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

/* borrar.php */

function darse_de_baja(PDO $pdo, string $email): void {
    $sent = $pdo->prepare('DELETE FROM usuarios WHERE email = :email');
    $sent->execute([':email'=>$email]);
}

/*registrarse.php */

function validar_nombre_registro($nombre, &$errores): void {
    if ($nombre == '') {
        $errores['nombre'][] = 'El nombre no puede estar vacío';
    } elseif (strlen($nombre) > 255) {
        $errores['nombre'][] = 'El nombre es muy largo';
    }
}

function validar_apellidos_registro($apellidos, &$errores): void {
    if ($apellidos == '') {
        $errores['apellidos'][] = 'El apellido no puede estar vacío';
    } elseif (strlen($apellidos) > 255) {
        $errores['apellidos'][] = 'El apellido es muy largo';
    }
}

function validar_email_registro($email, &$errores): void {
    if ($email == '') {
        $errores['email'][] = 'El email no puede estar vacío';
    } elseif (strlen($email) > 255) {
        $errores['email'][] = 'El email es muy largo';
    }
    if ((!filter_var($email, FILTER_VALIDATE_EMAIL)) and $email != '') {
        $errores['email'][] = 'El email no es válido';
    }
}

function validar_contrasena_registro($contrasena, &$errores): void {
    if ($contrasena == '') {
        $errores['contrasena'][] = 'La contraseña no puede estar vacía';
    } elseif (strlen($contrasena) > 255) {
        $errores['contrasena'][] = 'La contraseña es muy larga';
    }
}

function comparar_contrasenas($confirmar_contrasena,$contrasena,  &$errores): void {
    if (!($confirmar_contrasena == $contrasena)) {
        $errores['confirmar_contrasena'][] = 'Las contraseñas no coinciden';
    }
}

function confirmar_usuario_nuevo(PDO $pdo, string $email , array &$errores): void {
    $sent = $pdo->prepare('SELECT * FROM usuarios WHERE email = :email');
    $sent->execute([':email' => $email]);
    if ($sent->fetchAll()) {
        $errores['otros'][] = 'Se encontro que este usuario ya esta registrado';
    }
}

function insertar_usuario(PDO $pdo, string $nombre, string $apellidos, string $email, string $contrasena): void {
    $sent = $pdo->prepare('INSERT INTO usuarios (nombre, apellidos, email, contrasena)
                            VALUES (:nombre, :apellidos, :email, :contrasena)');
    $sent->execute([
        ':nombre' => $nombre,
        ':apellidos' => $apellidos,
        ':email' => $email,
        ':contrasena' => $contrasena
    ]);
}

function obtener_contrasena(PDO $pdo, string $email): ?string {
    $sent = $pdo->prepare('SELECT contrasena FROM usuarios WHERE email = :email');
    $sent->execute([':email'=>$email]);
    return $sent->fetchColumn() ?: null;
}

