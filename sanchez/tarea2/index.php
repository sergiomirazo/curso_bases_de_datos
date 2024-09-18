<?php
// Nombre de la marca aleatorio
$brand_name = "Microsoft";

// Procesar formulario
$data_file = 'data.txt';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    $entry = "Nombre: $name | Email: $email | Mensaje: $message\n";
    
    // Guardar la entrada en el archivo
    file_put_contents($data_file, $entry, FILE_APPEND | LOCK_EX);
}

// Leer datos del archivo
$data_list = file_exists($data_file) ? file($data_file) : [];

?>

<<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta de Tinacos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>La Tinaqueria</h1>
            <nav>
                <ul>
                    <li><a href="#home">Inicio</a></li>
                    <li><a href="#products">Productos</a></li>
                    <li><a href="#testimonials">Testimonios</a></li>
                    <li><a href="#contact">Contacto</a></li>
                    <li><a href="#location">Ubicación</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section id="home" class="hero">
            <div class="container">
                <h2>¡Encuentra el tinaco perfecto para tus necesidades!</h2>
                <p>Explora nuestra variedad de tinacos de alta calidad.</p>
            </div>
        </section>

        <section id="products" class="products">
            <div class="container">
                <h2>Productos Destacados</h2>

                <!-- Tinaco Premium de 1000 Litros -->
                <div class="product">
                    <img src="Tinaco Premium.jpeg" alt="Tinaco de 1000 Litros">
                    <div class="product-info">
                        <h3>Tinaco Premium de 1000 Litros</h3>
                        <p>Ideal para familias grandes y almacenamiento eficiente de agua.</p>
                        <ul>
                            <li><strong>Capacidad:</strong> 1000 litros (1 metro cúbico)</li>
                            <li><strong>Altura:</strong> Aproximadamente 1.80 a 2.00 metros</li>
                            <li><strong>Diámetro:</strong> Aproximadamente 1.20 a 1.50 metros</li>
                            <li><strong>Peso vacío:</strong> Entre 25 y 45 kg</li>
                            <li><strong>Material:</strong> Polietileno, Fibra de Vidrio, o Acero Inoxidable</li>
                            <li><strong>Aislamiento:</strong> Opcional, para mantener la temperatura del agua</li>
                            <li><strong>Tapa:</strong> Hermética para evitar contaminaciones</li>
                            <li><strong>Salidas y Entradas:</strong> Conexiones estándar para tuberías</li>
                            <li><strong>Escotilla de Inspección:</strong> Para limpieza y mantenimiento</li>
                            <li><strong>Instalación:</strong> Requiere base firme o soporte adecuado</li>
                            <li><strong>Certificaciones:</strong> Cumple con normativas de calidad y seguridad</li>
                        </ul>
                        <p class="price">$1500</p>
                        <button>Comprar</button>
                    </div>
                </div>

                <!-- Tinaco Plus de 500 Litros -->
                <div class="product">
                    <img src="Tinaco Plus.jpeg" alt="Tinaco de 500 Litros">
                    <div class="product-info">
                        <h3>Tinaco Plus de 500 Litros</h3>
                        
                        <ul>
                            <li><strong>Capacidad:</strong> 500 litros</li>
                            <li><strong>Altura:</strong> Aproximadamente 1.30 a 1.50 metros</li>
                            <li><strong>Diámetro:</strong> Aproximadamente 1.00 a 1.20 metros</li>
                            <li><strong>Peso vacío:</strong> Entre 15 y 30 kg</li>
                            <li><strong>Material:</strong> Polietileno, Fibra de Vidrio, o Acero Inoxidable</li>
                            <li><strong>Aislamiento:</strong> Opcional</li>
                            <li><strong>Tapa:</strong> Hermética para evitar contaminaciones</li>
                            <li><strong>Salidas y Entradas:</strong> Conexiones estándar para tuberías</li>
                            <li><strong>Escotilla de Inspección:</strong> Para limpieza y mantenimiento</li>
                            <li><strong>Instalación:</strong> Requiere base firme o soporte adecuado</li>
                            <li><strong>Certificaciones:</strong> Cumple con normativas de calidad y seguridad</li>
                        </ul>
                        <p class="price">$800</p>
                        <button>Comprar</button>
                    </div>
                </div>
            </div>
        </section>

        <section id="testimonials" class="testimonials">
            <div class="container">
                <h2>Testimonios</h2>
                <div class="testimonial">
                    <p>"Excelente calidad y servicio. Muy contento con mi compra." - Pepito Lagarda</p>
                </div>
                <div class="testimonial">
                    <p>"El tinaco llegó a tiempo y en perfectas condiciones. Recomendado." - Maria de los Angeles</p>
                </div>
            </div>
        </section>

        <section id="contact" class="contact">
            <div class="container">
                <h2>Contacto</h2>
                <form action="" method="post">
                    <label for="name">Nombre:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="message">Mensaje:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>

                    <button type="submit">Enviar</button>
                </form>
            </div>
        </section>

        <section id="location" class="location">
            <div class="container">
                <h2>Ubicación</h2>
                <p>Visítanos en nuestra ubicación:</p>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55793.67234629749!2d-110.9856959!3d29.073056199999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86ce8444fbc6085f%3A0x26cd852443ed0613!2sGaler%C3%ADa%20Cesaretti!5e0!3m2!1ses!2smx!4v1726551125908!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            width="100%" 
                            height="400" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy"></iframe>
                </div>
                <p>Dirección:Galerias Mall</p>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; Profesor:Sergio Mirazo</p>
        </div>
    </footer>
</body>
</html>
