<?php

$usuario = 'root';
$senha = '';
$database = 'osces_login';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error) {
    die("Falha ao conectar a database: " . $mysqli->error);
}

