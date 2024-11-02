<?php

// Importar la conexion a la BD
require 'includes/app.php';

$db = conectarDB();

// Crear un email y password
$email = "dannrod071@gmail.com";
$password = "1234567";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

// Query para crear al usuario
$query = " INSERT INTO usuarios (email, password) VALUES ('{$email}', '{$passwordHash}'); ";

// echo $query;

// Agregarlo a la base de datos
mysqli_query($db, $query);
