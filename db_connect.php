<?php
// db_connect.php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=biblioteca_db', 'root', '');
    // Configurar el modo de errores de PDO para manejar excepciones
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}
?>
