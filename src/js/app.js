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
            testimonios = [
                {
                    ruta : 'testimonios/retrato_01', 
                    nombre : 'Cliente_01', 
                    texto : 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium"'
                },
                {
                    ruta : 'testimonios/retrato_02',
                    nombre : 'Cliente_02',
                    texto : 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit"'
                },
                {
                    ruta : 'testimonios/retrato_03',
                    nombre : 'Cliente_03',
                    texto : 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit"'
                }
            ];
            crearTestimonios("opiniones", testimonios, 3);
            break;
        // case '/servicios':
        //     resaltarActual('servicios');
        //     break;
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


/** BRANDOMATIC **/
const botonBrandomatic = document.querySelector('#brandomatic');
botonBrandomatic.addEventListener( 'click', () => abrirBrandomatic() );

function abrirBrandomatic() {
    /* OVERLAY */
    const overlay = document.createElement('DIV');  // --> Crea el elemento.
    overlay.classList.add('overlay');   // --> Le asigna una clase.

    // Evento de click
    overlay.onclick = function(e) {
        if (e.target === overlay) {
            // Quitamos clase 'show' para transición de salida.
            overlay.classList.remove('show');
            // Pequeña espera para esperar que termine la animación.
            setTimeout(() => {
                overlay.remove();           // Eliminar el overlay.
            }, 500);
        }
    }

    /* CUESTIONARIO */
    const cuestionario = document.createElement('DIV');
    cuestionario.classList.add('bg-black');
    cuestionario.classList.add('my-5');
    cuestionario.innerHTML = `
        <!-- ENCABEZADO -->
        <div class="bg-black py-4">
            <h1 class="container text-center text-light"> Brand 'O Matic </h1>
            <p class="container text-center px-5 py-3 text-light"> Completa la siguiente encuesta para obtener un diagnóstico sobre tu marca de forma inmediata. </p>
        </div>

        <!-- FORMULARIO -->
        <div class="bg-black">
            <form class="container formulario bg-black" id="cuestionario">
                <legend class="mb-5"> 
                    Responda las siguientes preguntas para obtener un diagnóstico al instante
                </legend>
                <!-- PREGUNTAS -->
                <ul class="list-group">
                    <!-- PREGUNTA 1 -->
                    <li class="pregunta list-group-item bg-black text-light mb-5">
                        <div class="square-marker d-flex align-items-center">
                            <img class="image-fluid" width="50px" src="build/img/Berna_Logo-tiza-Mesa_de_trabajo_1-copia.png">
                        </div>
                        <div>
                            ¿La identidad de marca está presente y aplicada en todos los productos y espacios de la empresa?
                        </div>
                        <div></div>
                        <div class="d-flex gap-3 align-items-center">
                            <label for="si01" class="form-label mb-1"> Sí </label>
                            <input id="si01" type="radio" name="preg01" value="1" required>
                            <label for="no01" class="form-label mb-1"> No </label>
                            <input id="no01" type="radio" name="preg01" value="0" required>
                        </div>
                    </li>
                    <!-- PREGUNTA 2 -->
                    <li class="pregunta list-group-item bg-black text-light mb-5">
                        <div class="square-marker d-flex align-items-center">
                            <img class="image-fluid" width="50px" src="build/img/Berna_Logo-tiza-Mesa_de_trabajo_1-copia.png">
                        </div>
                        <div>
                            ¿Qué porcentaje de la audiencia general reconoce la marca sin ayuda?
                        </div>
                        <div></div>
                        <div class="d-flex gap-3 align-items-center">
                            <label for="valor02" class="form-label mb-1"> Porcentaje </label>
                            <input id="valor02" type="range" value="0" min="0" max="1" step=".25" oninput="this.nextElementSibling.value = this.value * 100" name="preg02" required>
                            <output> 0 </output>
                        </div>
                    </li>
                    <!-- PREGUNTA 3 -->
                    <li class="pregunta list-group-item bg-black text-light mb-5">
                        <div class="square-marker d-flex align-items-center">
                            <img class="image-fluid" width="50px" src="build/img/Berna_Logo-tiza-Mesa_de_trabajo_1-copia.png">
                        </div>
                        <div>
                            ¿Actualmente hay campañas activas financiadas para aumentar el reconocimiento de marca?
                        </div>
                        <div></div>
                        <div class="d-flex gap-3 align-items-center">
                            <label for="si03" class="form-label mb-1"> Sí </label>
                            <input id="si03" type="radio" name="preg03" value="1" required>
                            <label for="no03" class="form-label mb-1"> No </label>
                            <input id="no03" type="radio" name="preg03" value="0" required>
                        </div>
                    </li>
                    <!-- PREGUNTA 4 -->
                    <li class="pregunta list-group-item bg-black text-light mb-5">
                        <div class="square-marker d-flex align-items-center">
                            <img class="image-fluid" width="50px" src="build/img/Berna_Logo-tiza-Mesa_de_trabajo_1-copia.png">
                        </div>
                        <div>
                            ¿Cómo es percibida la calidad de los productos o servicios de la marca?
                        </div>
                        <div></div>
                        <div class="d-flex gap-3 align-items-center">
                            <label for="mala04" class="form-label mb-1"> Mala </label>
                            <input id="mala04" type="radio" name="preg04" value="0" required>
                            <label for="regular04" class="form-label mb-1"> Regular </label>
                            <input id="regular04" type="radio" name="preg04" value=".25" required>
                            <label for="buena04" class="form-label mb-1"> Buena </label>
                            <input id="buena04" type="radio" name="preg04" value=".5" required>
                            <label for="muyBuena04" class="form-label mb-1"> Muy Buena </label>
                            <input id="muyBuena04" type="radio" name="preg04" value="1" required>
                        </div>
                    </li>
                    <!-- PREGUNTA 5 -->
                    <li class="pregunta list-group-item bg-black text-light mb-5">
                        <div class="square-marker d-flex align-items-center">
                            <img class="image-fluid" width="50px" src="build/img/Berna_Logo-tiza-Mesa_de_trabajo_1-copia.png">
                        </div>
                        <div>
                            ¿La marca ofrece algún producto o servicio de categoría Premium?
                        </div>
                        <div></div>
                        <div class="d-flex gap-3 align-items-center">
                            <label for="si05" class="form-label mb-1"> Sí </label>
                            <input id="si05" type="radio" name="preg05" value="1" required>
                            <label for="no05" class="form-label mb-1"> No </label>
                            <input id="no05" type="radio" name="preg05" value="0" required>
                        </div>
                    </li>
                    <!-- PREGUNTA 6 -->
                    <li class="pregunta list-group-item bg-black text-light mb-5">
                        <div class="square-marker d-flex align-items-center">
                            <img class="image-fluid" width="50px" src="build/img/Berna_Logo-tiza-Mesa_de_trabajo_1-copia.png">
                        </div>
                        <div>
                            ¿Existe una Propuesta de Valor Única (PVU) que diferencie claramente a la marca de su competencia?
                        </div>
                        <div></div>
                        <div>
                            <div class="d-flex gap-3 align-items-center">
                                <label for="si06" class="form-label mb-1"> Sí </label>
                                <input id="si06" type="radio" name="preg06" value="1" required>
                                <label for="no06" class="form-label mb-1"> No </label>
                                <input id="no06" type="radio" name="preg06" value="0" required>
                            </div>
                            <p class="text-light mb-1">
                                **(No puede basarse únicamente en precio, calidad o servicio)**
                            </p>
                        </div>
                    </li>
                    <!-- PREGUNTA 7 -->
                    <li class="pregunta list-group-item bg-black text-light mb-5">
                        <div class="square-marker d-flex align-items-center">
                            <img class="image-fluid" width="50px" src="build/img/Berna_Logo-tiza-Mesa_de_trabajo_1-copia.png">
                        </div>
                        <div>
                            ¿El público siente un vínculo emocional con la marca y la recomienda de forma espontánea (boca en boca)?
                        </div>
                        <div></div>
                        <div class="d-flex gap-3 align-items-center">
                            <label for="si07" class="form-label mb-1"> Sí </label>
                            <input id="si07" type="radio" name="preg07" value="1" required>
                            <label for="no07" class="form-label mb-1"> No </label>
                            <input id="no07" type="radio" name="preg07" value="0" required>
                        </div>
                    </li>
                    <!-- PREGUNTA 8 -->
                    <li class="pregunta list-group-item bg-black text-light mb-5">
                        <div class="square-marker d-flex align-items-center">
                            <img class="image-fluid" width="50px" src="build/img/Berna_Logo-tiza-Mesa_de_trabajo_1-copia.png">
                        </div>
                        <div>
                            ¿El mensaje de marca es claro y coherente en todos los canales de comunicación?
                        </div>
                        <div></div>
                        <div class="d-flex gap-3 align-items-center">
                            <label for="si08" class="form-label mb-1"> Sí </label>
                            <input id="si08" type="radio" name="preg08" value="1" required>
                            <label for="no08" class="form-label mb-1"> No </label>
                            <input id="no08" type="radio" name="preg08" value="0" required>
                        </div>
                    </li>
                    <!-- PREGUNTA 9 -->
                    <li class="pregunta list-group-item bg-black text-light mb-5">
                        <div class="square-marker d-flex align-items-center">
                            <img class="image-fluid" width="50px" src="build/img/Berna_Logo-tiza-Mesa_de_trabajo_1-copia.png">
                        </div>
                        <div>
                            ¿Los consumidores consideran que el precio es justo en relación con los beneficios que perciben?
                        </div>
                        <div></div>
                        <div class="d-flex gap-3 align-items-center">
                            <label for="si09" class="form-label mb-1"> Sí </label>
                            <input id="si09" type="radio" name="preg09" value="1" required>
                            <label for="no09" class="form-label mb-1"> No </label>
                            <input id="no09" type="radio" name="preg09" value="0" required>
                        </div>
                    </li>
                    <!-- PREGUNTA 10 -->
                    <li class="pregunta list-group-item bg-black text-light mb-5">
                        <div class="square-marker d-flex align-items-center">
                            <img class="image-fluid" width="50px" src="build/img/Berna_Logo-tiza-Mesa_de_trabajo_1-copia.png">
                        </div>
                        <div>
                            ¿La comunicación de marca posiciona al cliente como protagonista y a la marca como la guía que lo ayuda a lograr sus objetivos?
                        </div>
                        <div></div>
                        <div class="d-flex gap-3 align-items-center">
                            <label for="si10" class="form-label mb-1"> Sí </label>
                            <input id="si10" type="radio" name="preg10" value="1" required>
                            <label for="parcial10" class="form-label mb-1"> Parcialmente </label>
                            <input id="parcial10" type="radio" name="preg10" value=".5" required>
                            <label for="no10" class="form-label mb-1"> No </label>
                            <input id="no10" type="radio" name="preg10" value="0" required>
                        </div>
                    </li>
                </ul>
                <button 
                    name="enviar_respuestas"
                    class="boton-transparente contorno mt-5 mb-3"
                    id="enviar_respuestas"
                >
                    Enviar Respuestas
                </button>
            </form>
        </div>
    `;
    overlay.appendChild(cuestionario);

    // Añade el overlay al HTML.
    const body = document.querySelector('body');    // --> Selecciona el elemento.
    body.appendChild(overlay);             // --> Incorpora al body el elemento "overlay".

    setTimeout(() => {
        overlay.classList.add('show');
    }, 100);

    /* DIAGNÓSTICO */
    const botonEnviarRespuestas = document.querySelector('#enviar_respuestas');
    if (botonEnviarRespuestas !== null) {
        botonEnviarRespuestas.addEventListener('click', (e) => {
            e.preventDefault();
            const form = document.querySelector('#cuestionario');
            const inputs = form.querySelectorAll(
                'input[type="radio"]:checked, input[type="range"]'
            );
            let total = 0;
            let cantPreguntas = 0;
            inputs.forEach(input => {
                const valor = parseFloat(input.value);
                // Aquí debería chequearse que el valor exista, además de ser un número válido.
                if (!isNaN(valor)) {
                    total += valor;
                    cantPreguntas++;
                }
            });
            const diagnostico = document.createElement('DIV');
            const puntaje = cantPreguntas > 0 ? ((total / cantPreguntas) * 100).toFixed(2) : 0;
            diagnostico.classList.add('bg-black');
            diagnostico.classList.add('my-5');
            diagnostico.innerHTML = `
                <div class="bg-black py-4">
                    <h1 class="container text-center text-light"> Su Diagnóstico </h1>
                    <p class="container text-center px-5 py-3 text-light">
                        Usted ha obtenido el siguiente puntaje:
                    </p>
                    <h2 class="text-light"> ${puntaje} % </h2>
                    <div class="container d-flex justify-content-center">
                        <a href="/" class="boton-amarillo my-3"> Volver </a>
                    </div>
                </div>
            `;
            overlay.appendChild(diagnostico);
            overlay.removeChild(cuestionario);
        });
    }
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
            overlay.classList.remove('show');
            setTimeout(() => {
                overlay.remove();   // Eliminar el overlay.
            }, 500);
        }
    }
    
    // Evento de tecla
    overlay.onkeydown = (e) => {
        overlay.classList.remove('show');
        setTimeout(() => {
            overlay.remove();   // Eliminar el overlay.
        }, 500);
    }

    // Añade el overlay al HTML.
    const body = document.querySelector('body');    // --> Selecciona el elemento.
    body.appendChild(overlay);  // --> Incorpora al body el elemento "overlay" como elemento descendiente.

    setTimeout(() => {
        overlay.classList.add('show');
    }, 100);
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


/* TESTIMONIOS DE CLIENTES */
function crearTestimonios(idSeccion, testimonios, nroTestimonios) {
    const contenedor = document.querySelector(`#${idSeccion}`);
    for (let index = 0; index < nroTestimonios; index++) {
        const testimonio = document.createElement('DIV');
        testimonio.classList.add('opinion');
        const imagen = document.createElement('picture');
        imagen.classList.add('retrato-container');
        imagen.innerHTML = `
            <source srcset="build/img/${testimonios[index].ruta}.avif" type="image/avif">
            <source srcset="build/img/${testimonios[index].ruta}.webp" type="image/webp">
            <img class="retrato" loading="lazy" width="200px" height="200px" src="build/img/${testimonios[index].ruta}.jpg" alt="Foto_Testimonio_Cliente">
        `;
        testimonio.appendChild(imagen);
        const texto = document.createElement('DIV');
        texto.innerHTML = `
            <img class="comillas" src="/build/img/comillas_quote.png" width="60px" alt="Imagen_Comillas">
            <p class="opinion-texto">
                ${testimonios[index].texto}
            </p>
        `;
        const contacto = document.createElement('DIV');
        contacto.classList.add('contacto');
        contacto.innerHTML = `
            <span class="fs-6 badge">
                <a href="https://www.instagram.com/${testimonios[index].nombre}" target="_blank" class="text-decoration-none text-light">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                    </svg>
                </a>
            </span>
        `;
        testimonio.appendChild(texto);
        testimonio.appendChild(contacto);
        contenedor.appendChild(testimonio);
    }
}