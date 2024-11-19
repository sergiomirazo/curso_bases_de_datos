# Ejemplo sencillo de consultas sql en un servidor de node.js

Primero, asegúrate de tener Node.js instalado en tu máquina. Lo puedes instalar aquí: <a href="https://nodejs.org/en/download/package-manager">https://nodejs.org/en/download/package-manager</a>

1. Crea un nuevo directorio para tu proyecto y navega a él:

   ```bash
   mkdir mi-app
   cd mi-app
   ```

2. Inicializa un nuevo proyecto Node.js:

   ```bash
   npm init -y
   ```

3. Instala las dependencias necesarias:

   ```bash
   npm install express sqlite3 body-parser
   ```

### Rutas CRUD Explicadas

1. **Crear un nuevo usuario (POST `/usuarios`)**: Envía un JSON con `nombre`, `usuario`, `email`, y `contrasena` para crear un nuevo usuario.
   
   Ejemplo de cuerpo de la solicitud:
   ```json
   {
       "nombre": "Carlos López",
       "usuario": "carlosl",
       "email": "carlos@example.com",
       "contrasena": "password456"
   }
   ```

2. **Leer todos los usuarios (GET `/usuarios`)**: Obtiene la lista de todos los usuarios.

3. **Leer un usuario específico (GET `/usuarios/:usuario`)**: Obtiene la información del usuario que se especifique en la URL.

4. **Actualizar un usuario (PUT `/usuarios/:usuario`)**: Envía un JSON con `nombre`, `email`, y `contrasena` para actualizar la información del usuario.

   Ejemplo de cuerpo de la solicitud para actualización:
   ```json
   {
       "nombre": "Carlos López Actualizado",
       "email": "carlos_nuevo@example.com",
       "contrasena": "nuevacontraseña"
   }
   ```

5. **Eliminar un usuario (DELETE `/usuarios/:usuario`)**: Elimina el usuario que se especifique en la URL.

### Probar el CRUD

Puedes usar herramientas como Postman o cURL para probar las rutas CRUD que hemos agregado. Asegúrate de reiniciar tu servidor después de realizar los cambios. Puedes descargar Postman desde aquí: 
<a href="https://www.postman.com/downloads/">https://www.postman.com/downloads/</a>

<hr>

### Centro de Bachillerato Tecnológico Industrial y de Servicios N°132
**Módulo2:** Bases de datos avanzadas
**Profesor:** Sergio Mirazo

