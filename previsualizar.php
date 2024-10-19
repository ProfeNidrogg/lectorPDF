<?php
// previsualizar.php
if (isset($_GET['ruta_pdf'])) {
    $ruta_pdf = urldecode($_GET['ruta_pdf']);
} else {
    die("Ruta de PDF no proporcionada.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previsualización de Libro</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Previsualización de Libro</h1>
        <embed src="<?= htmlspecialchars($ruta_pdf); ?>" type="application/pdf" width="100%" height="600px" />
    </div>
</body>
</html>
