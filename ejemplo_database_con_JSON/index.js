 // Función para cargar y desplegar los productos
 async function loadProducts() {
    try {
        const response = await fetch('data.json');
        const data = await response.json();

        const container = document.getElementById('productos');
        data.forEach(product => {
            // Creación de la estructura de la tarjeta
            const productCard = document.createElement('div');
            productCard.classList.add('col-md-6', 'col-lg-4', 'd-flex', 'justify-content-center', 'mb-4');

            productCard.innerHTML = `
                <div class="card text-center shadow-sm">
                    <img src="${product.image}" class="card-img-top product-image" alt="${product.title}">
                    <div class="card-body">
                        <h5 class="card-title">${product.title}</h5>
                        <p class="card-text">${product.description}</p>
                        <p class="card-text"><strong>Cost:</strong> $${product.cost}</p>
                    </div>
                </div>
            `;

            container.appendChild(productCard);
        });
    } catch (error) {
        console.error("Error al cargar el archivo JSON:", error);
    }
}

// Llamada a la función para cargar los productos cuando el contenido se haya cargado
document.addEventListener("DOMContentLoaded", loadProducts);