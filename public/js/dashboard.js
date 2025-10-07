// Definir URL base como una constante y asegurar que termine con '/'
const BASE_URL = SERVER.endsWith('/') ? SERVER : SERVER + '/';
// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_HOTEL = SERVER + 'private/api_hotel.php?action=';

document.addEventListener("DOMContentLoaded", async function () {
	// *Obtenemos los valores de las tablas padres, selects
	// *Función para inicializar las tablas
    await window.loadOnlineReady;
    await readRows(API_HOTEL, 'readActividades', loadActividades, null);
    await readRows(API_HOTEL, 'readServicios', loadServicios, null);
    await readRows(API_HOTEL, 'readTipoPago', loadTipoPago, null);
    await readRows(API_HOTEL, 'readZonaCercana', loadZonaC, null);
    await readRows(API_HOTEL, 'readHabitaciones', loadHabitaciones, null);
	modalFiltro();
});

async function loadActividades(dataset) {
    const tableBody = document.getElementById('actividades-container');
    if (!tableBody) {
        sweetAlert(3, 'Elemento actividades-container no encontrado en el DOM', null, 'bottom-end', 4000);
        return;
    }
    let content = '';
    // Validar que dataset sea un array
    if (!Array.isArray(dataset)) {
        sweetAlert(3, 'Los datos recibidos no son un array válido', null, 'bottom-end', 4000);
        return;
    }
    // Recorrer el conjunto de registros
    dataset.forEach(row => {
        // Validar datos para prevenir XSS
        const id_actividad = escapeHTML(row.id_actividad || '');
        const actividad = escapeHTML(row.nombre_actividad || 'No establecido');
        const img = escapeHTML(row.img_actividad || '');
        // *Crear fila con los datos
        content += 
        `<a href="#" class="content-pill_stage">
            <img src="${SERVER}images/actividades/${img}" alt="${actividad}"> ${actividad}
        </a>`;
    });
    // Agregar contenido al cuerpo de la tabla
    tableBody.innerHTML = content;
}

async function loadZonaC(dataset) {
    const tableBody = document.getElementById('zonaC-container');
    if (!tableBody) {
        sweetAlert(3, 'Elemento zonaC-container no encontrado en el DOM', null, 'bottom-end', 4000);
        return;
    }
    let content = '';
    // Validar que dataset sea un array
    if (!Array.isArray(dataset)) {
        sweetAlert(3, 'Los datos recibidos no son un array válido', null, 'bottom-end', 4000);
        return;
    }
    // Recorrer el conjunto de registros
    dataset.forEach(row => {
        // Validar datos para prevenir XSS
        const id_zona_cercana = escapeHTML(row.id_zona_cercana || '');
        const zona_cercana = escapeHTML(row.zona_cercana || '');

        // *Crear fila con los datos
        content += 
        `<a href="#" class="content-pill_stage">
            ${zona_cercana}
        </a>`;
    });
    // Agregar contenido al cuerpo de la tabla
    tableBody.innerHTML = content;
}

async function loadTipoPago(dataset) {
    const tableBody = document.getElementById('container_tipo');
    if (!tableBody) {
        sweetAlert(3, 'Elemento container_tipo no encontrado en el DOM', null, 'bottom-end', 4000);
        return;
    }
    let content = '';
    // Validar que dataset sea un array
    if (!Array.isArray(dataset)) {
        sweetAlert(3, 'Los datos recibidos no son un array válido', null, 'bottom-end', 4000);
        return;
    }
    // Recorrer el conjunto de registros
    dataset.forEach(row => {
        // Validar datos para prevenir XSS
        const id_tipo_pago = escapeHTML(row.id_tipo_pago || '');
        const tipo = escapeHTML(row.tipo_pago || 'No establecido');
    
        // *Crear fila con los datos
        content += 
        `<div class="checkbox-container">
            <label class="left-label">${tipo}</label>
            <input type="checkbox">
        </div>`;
    });
    // Agregar contenido al cuerpo de la tabla
    tableBody.innerHTML = content;
}
async function loadServicios(dataset) {
    const tableBody = document.getElementById('container_servicio');
    if (!tableBody) {
        sweetAlert(3, 'Elemento container_servicios no encontrado en el DOM', null, 'bottom-end', 4000);
        return;
    }
    let content = '';
    // Validar que dataset sea un array
    if (!Array.isArray(dataset)) {
        sweetAlert(3, 'Los datos recibidos no son un array válido', null, 'bottom-end', 4000);
        return;
    }
    // Recorrer el conjunto de registros
    dataset.forEach(row => {
        // Validar datos para prevenir XSS
        const id_servicio = escapeHTML(row.id_servicio || '');
        const servicio = escapeHTML(row.nombre_servicio || 'No establecido');
        const img = escapeHTML(row.img_servicio || '');
    
        // *Crear fila con los datos
        content += 
        `<a href="#" class="content-pill_stage">
            <img src="${SERVER}images/servicios/${img}" alt="${servicio}">${servicio}
                </a>`;
    });
    // Agregar contenido al cuerpo de la tabla
    tableBody.innerHTML = content;
}
async function loadHabitaciones(dataset) {
    const tableBody = document.getElementById('cards-container');
    if (!tableBody) {
        sweetAlert(3, 'Elemento cards-container no encontrado en el DOM', null, 'bottom-end', 4000);
        return;
    }
    
    // Validar que dataset sea un array
    if (!Array.isArray(dataset)) {
        sweetAlert(3, 'Los datos recibidos no son un array válido', null, 'bottom-end', 4000);
        return;
    }
    
    let content = '';
    
    // Usar Promise.all para manejar todas las peticiones asíncronas en paralelo
    try {
        const roomsWithComments = await Promise.all(
            dataset.map(async (row) => {
                // Validar datos para prevenir XSS
                const id = escapeHTML(row.id_habitacion || '');
                const idhotel = escapeHTML(row.id_hotel || '');
                const tipoHabitacion = escapeHTML(row.tipo_habitacion || 'No establecido');
                const descripcion = escapeHTML(row.descripcion || '');
                const precio = escapeHTML(row.precio_noche || 'No disponible');
                const estrella = escapeHTML(row.estrellas || '0');
                const img = escapeHTML(row.img_habitacion);
                
                let imagen;
                if (img === "null" || !img) {
                    imagen = `/resources/imgs/no_available.jpg`;
                } else {
                    imagen = `${SERVER}images/habitaciones/${img}`;
                }
                
                let countComments = 0;
                let servicios = '';
                
                // Solo hacer la petición si tenemos un ID válido
                if (idhotel) {
                    try {
                        // Llamar método para obtener valores de servicios
                        servicios = await getServices(idhotel);
                        
                        const form = new FormData();
                        form.append('id_hotel', idhotel);
                        
                        const response = await fetch(API_HOTEL + 'countComments', {
                            method: 'POST',
                            body: form,
                            credentials: 'same-origin',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        });
                        
                        if (!response.ok) {
                            const errorText = await response.text();
                            console.error(`Error al obtener comentarios para habitación ${id}: ${response.status} ${response.statusText}${errorText ? ' - ' + errorText : ''}`);
                            // No lanzar error, solo continuar con countComments = 0
                        } else {
                            const data = await response.json();
                            if (data.estado == 1) {
                                countComments = data.dataset.totalComments || 0;
                            } else {
                                console.warn(`Error en respuesta para habitación ${id}: ${data.message}`);
                            }
                        }
                    } catch (fetchError) {
                        console.error(`Error de red al obtener comentarios para habitación ${id}:`, fetchError);
                        // Continuar con countComments = 0
                    }
                }
                
                return {
                    id,
                    idhotel,
                    tipoHabitacion,
                    descripcion,
                    precio,
                    estrella,
                    imagen,
                    countComments,
                    servicios
                };
            })
        );
        
        // Generar el HTML con todos los datos
        roomsWithComments.forEach(room => {
            content += 
            `<div class="card" bis_skin_checked="1">
                <img src="${room.imagen}" alt="hotel_img">
                <div class="card-content" bis_skin_checked="1">
                    <h1>${room.tipoHabitacion}</h1>
                    <p>${room.descripcion}</p>
                    <div class="card-opinion2" bis_skin_checked="1">
                        <div class="score" bis_skin_checked="1">
                            <span>${room.estrella}</span>
                            <span><img src="/resources/icons/star.png" alt="start"></span>
                        </div>
                        <a href="#" class="comments"><u>${room.countComments} comentarios</u></a>
                        <div class="tags" bis_skin_checked="1" id="tags_habitacion">
                            ${room.servicios}
                        </div>
                    </div>
                </div>
                <div class="card-action" bis_skin_checked="1">
                    <div class="card-opinion" bis_skin_checked="1">
                        <div class="score" bis_skin_checked="1">
                            <span>${room.estrella}</span>
                            <span><img src="/resources/icons/star.png" alt="start"></span>
                        </div>
                        <a href="#" class="comments"><u>${room.countComments} comentarios</u></a>
                        <div class="tags" bis_skin_checked="1" id="tags_habitacionMobile">
                            ${room.servicios}
                        </div>
                    </div>
                    <div class="card-price" bis_skin_checked="1">
                        <h1>$${room.precio}</h1>
                        <h2>Por noche</h2>
                        <a class="btn primary-button" href="detalle.html?id=${room.id}&idhotel=${room.idhotel}">Seleccionar</a>
                    </div>
                </div>
            </div>`;
        });
        
        // Agregar contenido al contenedor
        tableBody.innerHTML = content;
        
    } catch (error) {
        console.error('Error al cargar habitaciones:', error);
        sweetAlert(3, 'Error al cargar las habitaciones. Por favor, intenta de nuevo.', null, 'bottom-end', 4000);
    }
}

async function getServices(idhotel) {
    try {
        const form = new FormData();
        form.append('id_hotel', idhotel);
        
        const response = await fetch(API_HOTEL + 'getServiciosHabitacion', {
            method: 'POST',
            body: form,
            credentials: 'same-origin',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        
        if (!response.ok) {
            const errorText = await response.text();
            console.error(`Error al obtener servicios: ${response.status} ${response.statusText}${errorText ? ' - ' + errorText : ''}`);
            return "";
        }
        
        const data = await response.json();
        if (data.estado == 1) {
            let serviciosContent = '';
            // Recorrer el conjunto de registros
            data.dataset.forEach(row => {
                // Validar datos para prevenir XSS
                const nombre = escapeHTML(row.nombre_servicio || '');
                // Crear span con el nombre del servicio real
                serviciosContent += `<span>${nombre}</span>`;
            });
            return serviciosContent;
        } else {
            console.warn(`Error en respuesta de servicios: ${data.message || 'Sin mensaje'}`);
            return "";
        }
    } catch (error) {
        console.error('Error al obtener servicios:', error);
        return "";
    }
}

function changeValue(id, change, event) {
    if (event) event.stopPropagation();
    let valueSpan = document.getElementById(id + "-value");
    let currentValue = parseInt(valueSpan.innerText) || 0;
    let newValue = currentValue + change;
    if (newValue >= 0) {
        valueSpan.innerText = newValue;
    }
}

function closeModal() {
    const modal = document.getElementById("modal");
    const modalOverlay = document.getElementById("overlay");
    modal.style.display = "none";
    modalOverlay.style.display = "none";
    document.body.classList.remove("no-scroll");
}

function openModal() {
    const modal = document.getElementById("modal");
    const modalOverlay = document.getElementById("overlay");

    if (modal && modalOverlay) {
        modal.style.display = "flex";
        modalOverlay.style.display = "block";
        document.body.classList.add("no-scroll");
    }
}

function modalFiltro() {
    // Modal de Filtro
    const btnFilter = document.querySelector('.btn-filter a');
    const fondoOscuro = document.getElementById('overlay');
    const demoModal = document.getElementById('modal');

    if (btnFilter) {
        btnFilter.addEventListener('click', function (event) {
            event.preventDefault();
            if (fondoOscuro && demoModal) {
                fondoOscuro.style.display = 'block';
                demoModal.style.display = 'flex';
            }
        });
    }

    if (fondoOscuro) {
        fondoOscuro.addEventListener('click', function () {
            fondoOscuro.style.display = 'none';
            if (demoModal) demoModal.style.display = 'none';
        });
    }

    // Pills - Fix the pill selection functionality
    const pills = document.querySelectorAll('.content-pill_stage');
    pills.forEach(pill => {
        pill.addEventListener('click', function (event) {
            event.preventDefault();
            pill.classList.toggle('selected');
            console.log('Pill clicked:', pill.textContent.trim(), 'Selected:', pill.classList.contains('selected'));
        });
    });

    // Stop propagation for buttons in pills
    document.querySelectorAll(".content-pill_stage button, .btn-plus, .btn-minus").forEach(button => {
        button.addEventListener("click", function (e) {
            e.stopPropagation();
        });
    });

    // Valoraciones
    const valoraciones = document.querySelectorAll(".valoracion");
    valoraciones.forEach(valoracion => {
        valoracion.addEventListener("click", function (event) {
            event.preventDefault();
            valoraciones.forEach(v => v.classList.remove("seleccionada"));
            this.classList.add("seleccionada");
        });
    });

    // Eliminar Filtro
    const btnEliminar = document.getElementById('btn-eliminar');
    if (btnEliminar) {
        btnEliminar.addEventListener("click", function (event) {
            event.preventDefault();

            // Reset counter values
            const camas = document.getElementById("camas-value");
            const banos = document.getElementById("banos-value");
            if (camas) camas.innerText = "0";
            if (banos) banos.innerText = "0";

            // Reset pill selections
            document.querySelectorAll(".content-pill_stage").forEach(pill => {
                pill.classList.remove("selected");
            });

            // Reset checkboxes
            document.querySelectorAll("input[type='checkbox']").forEach(checkbox => {
                checkbox.checked = false;
            });

            // Reset ratings
            document.querySelectorAll(".valoracion").forEach(valoracion => {
                valoracion.classList.remove("seleccionada");
            });

            console.log("Todos los filtros han sido eliminados");
        });
    }
};
