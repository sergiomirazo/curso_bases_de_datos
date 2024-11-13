-- Crear la base de datos
CREATE DATABASE ventas_db;
USE ventas_db;

-- Tabla de usuarios
CREATE TABLE usuarios (
    id INT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Tabla de inventario
CREATE TABLE inventario (
    id INT PRIMARY KEY,
    nombre_producto VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL
);

-- Tabla de ventas
CREATE TABLE ventas (
    id INT PRIMARY KEY,
    usuario_id INT NOT NULL,
    nombre_cliente VARCHAR(100) NOT NULL,
    cita_agendada DATETIME NOT NULL,
    fecha_venta DATE NOT NULL,
    productos TEXT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);