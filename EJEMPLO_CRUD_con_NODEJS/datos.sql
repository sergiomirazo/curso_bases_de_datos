-- datos.sql
CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre TEXT NOT NULL,
    usuario TEXT NOT NULL UNIQUE,
    email TEXT NOT NULL UNIQUE,
    contrasena TEXT NOT NULL
);

INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES ('Juan Pérez', 'juanp', 'juan@example.com', 'contraseña123');
INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES ('Ana Gómez', 'anag', 'ana@example.com', 'contraseña123');
INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES ('Carlos López', 'carlosl', 'carlos@example.com', 'contraseña123');
INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES ('Marta Rodríguez', 'martar', 'marta@example.com', 'contraseña123');
INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES ('Luis Fernández', 'luisf', 'luis@example.com', 'contraseña123');
INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES ('Elena Sánchez', 'elenas', 'elena@example.com', 'contraseña123');
INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES ('Miguel Torres', 'miguelt', 'miguel@example.com', 'contraseña123');
INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES ('Laura Ramírez', 'laurar', 'laura@example.com', 'contraseña123');
INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES ('Pedro Díaz', 'pedrod', 'pedro@example.com', 'contraseña123');
INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES ('Andrea Castro', 'andreac', 'andrea@example.com', 'contraseña123');
INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES ('Fernando Gómez', 'fernandog', 'fernando@example.com', 'contraseña123');
INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES ('Sara Ruiz', 'sarar', 'sara@example.com', 'contraseña123');
INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES ('Javier Moreno', 'javierm', 'javier@example.com', 'contraseña123');
INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES ('Natalia Vega', 'nataliav', 'natalia@example.com', 'contraseña123');
INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES ('Raúl Méndez', 'raulm', 'raul@example.com', 'contraseña123');
INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES ('Patricia Herrera', 'patriciah', 'patricia@example.com', 'contraseña123');
INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES ('Diego Flores', 'diegof', 'diego@example.com', 'contraseña123');
INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES ('Isabel Ortiz', 'isabelo', 'isabel@example.com', 'contraseña123');
INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES ('Samuel León', 'samuell', 'samuel@example.com', 'contraseña123');
INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES ('Valentina Silva', 'valentinas', 'valentina@example.com', 'contraseña123');
INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES ('Pablo Navarro', 'pablon', 'pablo@example.com', 'contraseña123');