<?php

function conectar(): PDO {
    return new PDO('pgsql:host=localhost;dbname=login', 'login','login');
}

function todos_usuarios(PDO $pdo): array {
    $sent = $pdo->query('SELECT * FROM usuarios');
    return $sent->fetchAll();
}