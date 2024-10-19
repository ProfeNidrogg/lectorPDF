-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS biblioteca_db;
USE biblioteca_db;

-- Crear la tabla para almacenar los libros
CREATE TABLE IF NOT EXISTS libro (
    id_libro INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    ruta_pdf VARCHAR(255) NOT NULL,
    fecha_subida DATETIME NOT NULL
);
