const express = require('express');
const sqlite3 = require('sqlite3').verbose();
const bodyParser = require('body-parser');
const fs = require('fs');

const app = express();
const PORT = 3000;

// Middleware
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// Conexión a la base de datos
const db = new sqlite3.Database(':memory:', (err) => {
    if (err) {
        console.error(err.message);
    }
});

// Inicializar la base de datos
fs.readFile('datos.sql', (err, data) => {
    if (err) {
        console.error(err);
    } else {
        db.exec(data.toString(), (err) => {
            if (err) {
                console.error(err.message);
            }
        });
    }
});

// Ruta para la raíz
app.get('/', (req, res) => {
    res.send('Bienvenido a la API de usuarios. Usa /usuarios para listar todos los usuarios.');
});

// Rutas

// Leer todos los usuarios
app.get('/usuarios', (req, res) => {
    db.all('SELECT * FROM usuarios', [], (err, rows) => {
        if (err) {
            res.status(500).send(err.message);
            return;
        }
        res.json(rows);
    });
});

// Leer un usuario específico
app.get('/usuarios/:usuario', (req, res) => {
    const usuario = req.params.usuario;
    db.get('SELECT * FROM usuarios WHERE usuario = ?', [usuario], (err, row) => {
        if (err) {
            res.status(500).send(err.message);
            return;
        }
        res.json(row);
    });
});

// Crear un nuevo usuario
app.post('/usuarios', (req, res) => {
    const { nombre, usuario, email, contrasena } = req.body;
    db.run('INSERT INTO usuarios (nombre, usuario, email, contrasena) VALUES (?, ?, ?, ?)', 
        [nombre, usuario, email, contrasena], 
        function(err) {
            if (err) {
                res.status(500).send(err.message);
                return;
            }
            res.status(201).json({ id: this.lastID, nombre, usuario, email });
        });
});

// Actualizar un usuario
app.put('/usuarios/:usuario', (req, res) => {
    const usuario = req.params.usuario;
    const { nombre, email, contrasena } = req.body;
    db.run('UPDATE usuarios SET nombre = ?, email = ?, contrasena = ? WHERE usuario = ?', 
        [nombre, email, contrasena, usuario], 
        function(err) {
            if (err) {
                res.status(500).send(err.message);
                return;
            }
            if (this.changes === 0) {
                res.status(404).send('Usuario no encontrado');
            } else {
                res.send('Usuario actualizado correctamente');
            }
        });
});

// Eliminar un usuario
app.delete('/usuarios/:usuario', (req, res) => {
    const usuario = req.params.usuario;
    db.run('DELETE FROM usuarios WHERE usuario = ?', [usuario], function(err) {
        if (err) {
            res.status(500).send(err.message);
            return;
        }
        if (this.changes === 0) {
            res.status(404).send('Usuario no encontrado');
        } else {
            res.send('Usuario eliminado correctamente');
        }
    });
});

// Iniciar servidor
app.listen(PORT, () => {
    console.log(`Servidor corriendo en http://localhost:${PORT}`);
});