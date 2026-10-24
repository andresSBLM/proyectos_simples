<?php 

require 'auxiliar.php';

session_start();
$email = $_SESSION["email"];

$pdo = conectar();

darse_de_baja($pdo, $email);

mover('index.php');
?>