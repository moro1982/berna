document.addEventListener('DOMContentLoaded', function() {
    const url = window.location.pathname;
    iniciarApp(url);
});

function iniciarApp(url) {
    switch (url) {
        case '/':
            resaltarActual('home');
            carpetas = [
                {ruta : 'cafeSanJorge', cantidad : 6},
                {ruta : 'cTree', cantidad : 3},
                {ruta : 'culturaEnJuego', cantidad : 2},
                {ruta : 'danielC', cantidad : 2},
                {ruta : 'golfArgentino', cantidad : 3},
                {ruta : 'marcosYordanoff', cantidad : 3},
                {ruta : 'misTarimas', cantidad : 3},
                {ruta : 'perfumeriaVenecia', cantidad : 2},
                {ruta : 'plotz', cantidad : 3},
                {ruta : 'ursulaEllena', cantidad : 8},
                {ruta : 'vitaMarket', cantidad : 3}
            ];
            crearMiniaturas("seccion00", carpetas, 11);
            break;
        case '/servicios':
            resaltarActual('servicios');
            break;
        case '/portfolio':
            resaltarActual('portfolio');
            carpetas = [
                {ruta : 'cafeSanJorge', cantidad : 6},
                {ruta : 'cTree', cantidad : 3},
                {ruta : 'culturaEnJuego', cantidad : 2},
                {ruta : 'danielC', cantidad : 2},
                {ruta : 'golfArgentino', cantidad : 3},
                {ruta : 'marcosYordanoff', cantidad : 3},
                {ruta : 'misTarimas', cantidad : 3},
                {ruta : 'perfumeriaVenecia', cantidad : 2},
                {ruta : 'plotz', cantidad : 3},
                {ruta : 'ursulaEllena', cantidad : 8},
                {ruta : 'vitaMarket', cantidad : 3}
            ];
            crearMiniaturas("seccion00", carpetas, 11);
            break;
        case '/blog':
            resaltarActual('blog');
            escucharBusqueda();
            traerPopulares();
            break;
        case '/login':
            resaltarActual('login');
            break;
        case '/contacto':
            resaltarActual('contacto');
            break;
    }
}

function resaltarActual(mainLink, secLink = null) {
    const enlacePpal = document.querySelector(`#${mainLink}`);
    const enlaceSec = document.querySelector(`#${secLink}`);

    enlacePpal.classList.add('active');

    if (enlaceSec) {
        enlaceSec.classList.add('active');
        enlaceSec.setAttribute('aria-current', 'page');
    }
}

function mostrarTextoOculto() {
    const botonMostrar = document.querySelector('#display-hidden');
    const hiddenText = document.querySelector('#hidden-text');
    const botonOcultar = document.querySelector('#hide-text');
    
    botonMostrar.classList.add("texto-oculto", "d-none");
    hiddenText.classList.remove("texto-oculto");
    hiddenText.classList.add("texto-visible");
    botonOcultar.classList.remove("texto-oculto");
    botonOcultar.classList.add("texto-visible");
}

function ocultarTexto() {
    const botonMostrar = document.querySelector('#display-hidden');
    const hiddenText = document.querySelector('#hidden-text');
    const botonOcultar = document.querySelector('#hide-text');
    
    botonMostrar.classList.remove("texto-oculto");
    botonMostrar.classList.remove("d-none");
    hiddenText.classList.add("texto-oculto");
    hiddenText.classList.remove("texto-visible");
    botonOcultar.classList.add("texto-oculto");
    botonOcultar.classList.remove("texto-visible");
}

/** PARALLAX **/
const parallax = document.querySelector('#parallax');

window.addEventListener('scroll', () => {
    const scrollY = window.pageYOffset;
    window.requestAnimationFrame(() => {
        parallax.style.transform = `translate3d(0, ${scrollY * 0.15}px, 0)`;
    });
});


/** BARRA DE BÚSQUEDA con JS fetch **/
// Escuchar Barra de Búsqueda
function escucharBusqueda() {
    const busqueda = document.querySelector('#search');
    const resultsContainer = document.querySelector('#resultsContainer');
    const errorsContainer = document.querySelector('.errors-container');
    const placeholder = document.querySelector('.message-placeholder');
    
    let patronBusqueda = '';

    if (busqueda) {
        busqueda.addEventListener('input', event => {
            placeholder.style.display = 'none';
            patronBusqueda = event.target.value;
            mostrarResultados();
        });
    }

    // Función para mostrar los datos
    const mostrarResultados = () => {
        searchData()
            .then(dataResults => {
                resultsContainer.innerHTML = '';
                if (typeof dataResults.data !== undefined && dataResults.data) {
                    errorsContainer.style.display = 'block';
                    errorsContainer.querySelector('p').innerHTML = `
                        No hay resultados para el criterio de búsqueda
                         "<span>${patronBusqueda}</span>"
                    `;
                    resultsContainer.style.display = 'none';
                } else {
                    resultsContainer.style.display = 'block';
                    errorsContainer.style.display = 'none';
                    for(const resultado of dataResults) {
                        const articulo = document.createElement('ARTICLE');
                        articulo.classList.add("entrada-blog");
                        articulo.innerHTML = `
                            <!-- Imagen -->
                            <picture class="imagen-blog">
                                <source srcset="/imagenes/${resultado.image}" type="image/avif">
                                <source srcset="/imagenes/${resultado.image}" type="image/webp">
                                <img class="imagen-small" loading="lazy" src="/imagenes/${resultado.image}" alt="Imagen Entrada Blog">
                            </picture>
                            <!-- Texto -->
                            <div class="texto-blog">
                                <a href="/entrada?id=${resultado.id}">
                                    <h3> ${resultado.title} </h3>
                                    <p class="info-meta"> 
                                        Escrito el: <span> ${resultado.created_at} </span> 
                                        por: <span> Admin </span> 
                                    </p>
                                    <p class="texto">${resultado.brief}</p>
                                </a>
                            </div> <!-- FIN Texto -->
                        `;
                        resultsContainer.appendChild(articulo);
                    }
                }
            });
    }

    // Funcion de consulta a la API
    const searchData = async () => {
        let buscarData = new FormData();
        buscarData.append('patron_busqueda', patronBusqueda);
        try {
            const url = `${location.origin}/blog/buscar`;
            const response = await fetch(url, {
                method : 'POST',
                body : buscarData
            });
            return response.json();
        } catch (error) {
            alert(`
                ${'Hubo un error y no se puede procesar la solicitud en este momento. Razones: '}
                ${error.message} 
            `);
            console.log(error);
        }
    }
}

// Buscar por Etiqueta
function fetchByTag( tag ) {
    const busqueda = document.querySelector('#search');
    busqueda.value = tag.split('#')[1];
    busqueda.dispatchEvent(new Event('input'));
}


/** GALERÍA DE IMÁGENES DE PROYECTOS **/
function crearMiniaturas(idSeccion, folders, nroGalerias) {
    const miniaturas = document.querySelector(`#${idSeccion}`);
    for (let i = 0; i < nroGalerias; i++) {
        const imagen = document.createElement('picture');
        imagen.innerHTML = `
            <source srcset="build/img/portfolio/${folders[i].ruta}/1.avif" type="image/avif">
            <source srcset="build/img/portfolio/${folders[i].ruta}/1.webp" type="image/webp">
            <img loading="lazy" height="200" src="build/img/portfolio/${folders[i].ruta}/1.jpg" alt="Miniatura_Galeria">
        `;
        imagen.onclick = function() {
            abrirGaleria( folders, i+1 );   // --> Asociamos la función abrirGaleria() como callback del evento.
        }
        miniaturas.appendChild(imagen);
    }
}

function abrirGaleria(carpetas, indiceGaleria) {

    // <div class="galeria pt-3 p-lg-4">
    const galeria = document.createElement('DIV');
    galeria.classList.add('galeria');
    galeria.classList.add('pt-3'); 
    galeria.classList.add('p-lg-4');

    // <div id="galeria0i" class="carousel slide">
    const atributoID = 'galeria0' + indiceGaleria;
    const contenedor = document.createElement('DIV');
    contenedor.setAttribute('id', atributoID);
    contenedor.classList.add('carousel');
    contenedor.classList.add('slide');

    // <div class="carousel-indicators"></div>
    const indicadores = document.createElement('DIV');
    indicadores.classList.add('carousel-indicators');

    // <div class="carousel-inner"></div>
    const interior = document.createElement('DIV');
    interior.classList.add('carousel-inner');

    // Botones
    const botonIzq = document.createElement('BUTTON');
    botonIzq.classList.add('carousel-control-prev');
    botonIzq.setAttribute('type', 'button');
    botonIzq.setAttribute('data-bs-target', `#${atributoID}`);
    botonIzq.setAttribute('data-bs-slide', 'prev');
    botonIzq.innerHTML = `
        <span class="carousel-control-prev-icon d-none" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    `;
    const botonDer = document.createElement('BUTTON');
    botonDer.classList.add('carousel-control-next');
    botonDer.setAttribute('type', 'button');
    botonDer.setAttribute('data-bs-target', `#${atributoID}`);
    botonDer.setAttribute('data-bs-slide', 'next');
    botonDer.innerHTML = `
        <span class="carousel-control-next-icon d-none" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    `;
    
    // Agrego cada elemento a su respectivo padre
    contenedor.appendChild(indicadores);
    contenedor.appendChild(interior);
    contenedor.appendChild(botonIzq);
    contenedor.appendChild(botonDer);
    galeria.appendChild(contenedor);
    
    // Crea el Overlay con la imagen.
    const overlay = document.createElement('DIV');  // --> Crea el elemento.
    overlay.classList.add('overlay');   // --> Le asigna una clase.
    overlay.appendChild(galeria);

    insertarCarousel(overlay, carpetas[indiceGaleria-1], atributoID, carpetas[indiceGaleria-1].cantidad);

    // Evento de click
    overlay.onclick = function(e) {
        if (e.target === overlay) {
            const body = document.querySelector('body');    // Seleccionar elemento body.
            body.classList.remove('fijar-body');    // Quitar la clase al body.
            overlay.remove();   // Eliminar el overlay.
        }
    }
    
    // Le asigno un evento de tecla para que ejecute una función que:
    overlay.onkeydown = (e) => {
        const body = document.querySelector('body');    // Seleccione el elemento body.
        body.classList.remove('fijar-body');    // Le quite la clase al body.
        overlay.remove();   // Elimine el overlay.
    }

    // Añade el overlay al HTML.
    const body = document.querySelector('body');    // --> Selecciona el elemento.
    body.classList.add('fijar-body');   // --> Le asigna una clase.
    body.appendChild(overlay);  // --> Incorpora al body el elemento "overlay" como elemento descendiente.
}

function insertarCarousel(element, folder, target, slidesNr) {
    const indicadores = element.querySelector('.carousel-indicators');
    const contenedor = element.querySelector('.carousel-inner');

    for (let i = 1; i <= slidesNr; i++) {
        // Indicadores
        indicadores.insertAdjacentHTML('beforeend', `<button type="button" class="d-none" data-bs-target="#${target}" data-bs-slide-to="${i-1}" aria-label="Slide ${i}"></button>`);
        // Item <- Imagen
        const item = document.createElement('div');
        item.classList.add('carousel-item');
        const imagen = document.createElement('picture');
        imagen.innerHTML = `
            <source srcset="build/img/portfolio/${folder.ruta}/${i}.avif" type="image/avif">
            <source srcset="build/img/portfolio/${folder.ruta}/${i}.webp" type="image/webp">
            <img width="auto" class="d-block img-fluid mx-auto" src="build/img/portfolio/${folder.ruta}/${i}.jpg" alt="Foto0${i}">
        `;
        item.appendChild(imagen);
        contenedor.appendChild(item);
        // Agregar clases y atributos a los primeros elementos
        if (i === 1) {
            indicadores.lastChild.classList.add('active');
            indicadores.lastChild.setAttribute('aria-current', 'true');
            item.classList.add('active');
        }
    }
}

function crearGaleria(folder, target, q) {
    const indicadores = document.querySelector(`#${target} .carousel-indicators`); //----> <div>
    const contenedor = document.querySelector(`#${target} .carousel-inner`); //----> <div>
    for (let i = 1; i <= q; i++) {
        // Indicadores
        indicadores.insertAdjacentHTML('beforeend', `<button type="button" class="d-none" data-bs-target="#${target}" data-bs-slide-to="${i-1}" aria-label="Slide ${i}"></button>`);
        // Galería
        const item = document.createElement('div');
        item.classList.add('carousel-item');
        const imagen = document.createElement('picture');
        imagen.innerHTML = `
            <source srcset="build/img/${folder}/${i}.avif" type="image/avif">
            <source srcset="build/img/${folder}/${i}.webp" type="image/webp">
            <img width="auto" height="auto" loading="lazy" class="d-block w-100" src="build/img/${folder}/${i}.jpg" alt="Foto0${i}">
        `;
        item.appendChild(imagen);
        contenedor.appendChild(item);
        // Agregar clases y atributos a los primeros elementos
        if (i === 1) {
            indicadores.lastChild.classList.add('active');
            indicadores.lastChild.setAttribute('aria-current', 'true');
            item.classList.add('active');
        }
    }
}