-- Crear un nuevo usuario
INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES (?, ?, ?, ?);

-- Leer todos los usuarios
SELECT * FROM usuarios;

-- Leer un usuario específico
SELECT * FROM usuarios WHERE usuario = ?;

-- Actualizar un usuario
UPDATE usuarios SET nombre = ?, email = ?, contrasena = ? WHERE usuario = ?;

-- Eliminar un usuario
DELETE FROM usuarios WHERE usuario = ?;