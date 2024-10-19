<?php
// list_books.php
require 'db_connect.php';

$stmt = $pdo->query('SELECT * FROM libro ORDER BY fecha_subida DESC');
$libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Libros</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include ("menu.php"); ?>
    <div class="container mt-5">
        <h2>Libros Disponibles</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Descripción</th>
                    <th>Fecha de Subida</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($libros as $libro): ?>
                <tr>
                    <td><?= htmlspecialchars($libro['titulo']); ?></td>
                    <td><?= htmlspecialchars($libro['autor']); ?></td>
                    <td><?= htmlspecialchars($libro['descripcion']); ?></td>
                    <td><?= htmlspecialchars($libro['fecha_subida']); ?></td>
                    <td>
                        <a href="<?= htmlspecialchars($libro['ruta_pdf']); ?>" class="btn btn-success" download>Descargar</a>
                        <a href="previsualizar.php?ruta_pdf=<?= urlencode($libro['ruta_pdf']); ?>" class="btn btn-info">Previsualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
