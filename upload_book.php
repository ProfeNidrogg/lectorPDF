<?php
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['pdf_libro'])) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $descripcion = $_POST['descripcion'];
    $fecha_subida = date('Y-m-d H:i:s');

    // Validación y procesamiento del archivo PDF
    $pdf_libro = $_FILES['pdf_libro'];
    $nombre_archivo = basename($pdf_libro['name']);
    $ruta_destino = "uploads/" . $nombre_archivo;

    if (move_uploaded_file($pdf_libro['tmp_name'], $ruta_destino)) {
        // Guardar la información del libro en la base de datos
        $stmt = $pdo->prepare('INSERT INTO libro (titulo, autor, descripcion, ruta_pdf, fecha_subida) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$titulo, $autor, $descripcion, $ruta_destino, $fecha_subida]);
        echo "<div class='alert alert-success'>Libro subido exitosamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al subir el archivo.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Nuevo Libro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include ("menu.php"); ?>
    <div class="container mt-5">
        <h1>Subir Nuevo Libro</h1>
        <form action="upload_book.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="autor">Autor</label>
                <input type="text" name="autor" id="autor" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="pdf_libro">Archivo PDF</label>
                <input type="file" name="pdf_libro" id="pdf_libro" class="form-control-file" accept=".pdf" required>
            </div>
            <button type="submit" class="btn btn-primary">Subir Libro</button>
        </form>
    </div>
</body>
</html>
