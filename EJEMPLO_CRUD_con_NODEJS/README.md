# Ejemplo sencillo de consultas sql en un servidor de node.js

Primero, asegúrate de tener Node.js instalado en tu máquina. Lo puedes instalar aquí: <a href="https://nodejs.org/en/download/package-manager">https://nodejs.org/en/download/package-manager</a>

En este repositorio ya están los paquetes necesarios de Node, pero también puedes crear tu proyecto Node de cero, solo asegurate de borrar los dos archivos package.json. 

1. Puedes crear un nuevo directorio para tu proyecto y navega a él usando la consola. Si das click derecho, puedes poner en **Abrir una Terminal** para abrir la consola en el directorio que deseas. Ingresas lo siguiente en la consola:

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

4.  **Ejecuta el archivo con Node.js**: Ahi mismo en la terminal, ejecuta el archivo `server.js` utilizando el siguiente comando:

   ```bash
   node server.js
   ```

   Esto iniciará el proceso que está definido en `server.js`.
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

