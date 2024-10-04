# ACID

conjunto de propiedades de las transacciones de bases de datos destinadas a garantizar su validez incluso en caso de errores, cortes de energía, etc.
Los principios ACID (Atomicidad, Consistencia, Aislamiento, Durabilidad) son un conjunto de reglas que garantizan que las transacciones de bases de datos se procesan de forma fiable y segura. Estos principios son esenciales para mantener la integridad y consistencia de los datos en los sistemas de gestión de bases de datos relacionales (RDBMS) como SQL Server.

### 1. Atomicidad
La atomicidad garantiza que las transacciones de bases de datos se traten como una unidad única e indivisible. Si alguna parte de la transacción falla, se revierte toda la transacción y la base de datos vuelve a su estado anterior. Este principio garantiza que o se realizan todos los cambios o no se realiza ninguno, manteniendo la coherencia de los datos.

### 2. Consistencia
La coherencia garantiza que la base de datos permanece en un estado válido durante toda la transacción. La base de datos debe pasar de un estado válido a otro, respetando las reglas y restricciones definidas en el esquema de la base de datos. Este principio impide que se escriban datos incoherentes en la base de datos.

### 3. Aislamiento
El aislamiento garantiza que las transacciones concurrentes no interfieran entre sí. Cada transacción funciona de forma independiente, como si fuera la única transacción que se está ejecutando. Este principio evita las «lecturas sucias» y las «lecturas no repetibles», asegurando que cada transacción vea una visión consistente de los datos.

### 4. Durabilidad
La durabilidad garantiza que, una vez que una transacción se consigna, sus efectos son permanentes y sobreviven incluso en caso de fallo del sistema. Los cambios realizados por la transacción se guardan en un almacenamiento no volátil, lo que garantiza que se conserven incluso si el sistema se reinicia o se bloquea.

* Ejemplo: 

Consideremos un sistema sencillo de comercio electrónico en el que los clientes pueden hacer pedidos. El concepto de coherencia garantiza que el sistema pase de un estado válido a otro al procesar un pedido. Por ejemplo, si un cliente intenta pedir un producto que está agotado, la transacción se anula y el sistema permanece en un estado válido.
