/*
*   CONTROLADOR DE USO GENERAL EN TODAS LAS PÁGINAS WEB.
*/
/*Constante para establecer la ruta del servidor.*/
const SERVER = '/';

/**
 * Función mejorada para obtener registros de diferentes tablas
 * @param {string} api - Ruta del servidor para obtener los datos
 * @param {string} endpoint - Endpoint específico (por defecto 'readAll')
 * @param {function} fillTableCallback - Función callback para llenar la tabla específica
 * @param {Object} params - Parámetros adicionales para la petición (opcional)
 */
async function readRows(api, endpoint = 'readAll', fillTableCallback, params = null) {

    // Construir la URL con parámetros si existen
    let url = api + endpoint;
    if (params) {
        const queryParams = new URLSearchParams(params);
        url += (url.includes('?') ? '&' : '?') + queryParams.toString();
    }
    // Configurar opciones de la petición
    const options = {
        method: 'get',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        credentials: 'same-origin'
    };
    // Realizar la petición
    const request = await fetch(url, options);
    // Verificar si la petición fue exitosa
    if (!request.ok) {
        throw new Error(`Error HTTP: ${request.status} ${request.statusText}`);
    }
    // Obtener y procesar respuesta
    const response = await request.json();
    let data = [];
    if (response.estado) {
        data = response.dataset;
    } else {
        sweetAlert(3, response.exception || 'Error al cargar los datos', null);
        return; // Salir de la función si hay un error
    }
    // Llamar a la función de llenado de tabla correspondiente
    if (typeof fillTableCallback === 'function') {
        fillTableCallback(data);
    } else {
        sweetAlert(3, 'No se proporcionó una función válida para llenar la tabla', null);
    }
}

/*
*   Función para obtener los resultados de una búsqueda en los mantenimientos de tablas (operación search).
*   Parámetros: api (ruta del servidor para obtener los datos) y form (identificador del formulario de búsqueda).
*   Retorno: ninguno.
*/
async function searchRows(api, validationResult, fillTableCallback) {
    // Configuración común para todas las peticiones
    const controller = new AbortController();
    const timeoutId = setTimeout(() => controller.abort(), 10000);
    // Preparar FormData con los datos validados
    const formData = new FormData();
    Object.entries(validationResult.data).forEach(([key, value]) => {
        formData.append(key, value);
    });
    // Configuración de la petición
    const options = {
        method: 'POST',
        body: formData,
        credentials: 'same-origin',
        signal: controller.signal,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    };
    // Realizar la petición
    const response = await fetch(api + encodeURIComponent('searchRow'), options);
    clearTimeout(timeoutId);
    // Manejar errores de HTTP
    if (!response.ok) {
        const errorText = await response.text();
        throw new Error(`Petición fallida: ${response.status} ${response.statusText}${errorText ? ' - ' + errorText : ''}`);
    }
    // Procesar la respuesta
    const data = await response.json();
    if (data.estado) {
        sweetAlert(1, data.message, null, 'top-end', 4000);
        fillTableCallback(data.dataset);
    } else {
        sweetAlert(4, data.exception, null, 'bottom-end', 4000);
    }
}

/*
*   Función para crear o actualizar un registro en los mantenimientos de tablas (operación create y update).
*   Parámetros: api (ruta del servidor para enviar los datos), form (identificador del formulario) y modal (identificador de la caja de dialogo).
*   Retorno: ninguno.
*/
async function saveRow(api, form, action, fillTable) {
    try {
        const response = await fetch(api + action, {
            method: 'POST',
            body: form,
            credentials: 'same-origin',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        // *Manejar diferentes códigos de estado HTTP apropiadamente
        if (!response.ok) {
            const errorText = await response.text();
            throw new Error(`Petición fallida: ${response.status} ${response.statusText}${errorText ? ' - ' + errorText : ''}`);
        }
        //* Convertir la respuesta a JSON
        let data = await response.json();
        //* Comprobar el estado de la respuesta
        if (data.estado == 1) {
            sweetAlert(1, data.message, null, 'top-end', 4000);
            closeModal();
            //* Función para inicializar las tablas
            if (fillTable !== null) {
                readRows(api, 'readAll', fillTable);
            }
        } else if (data.estado == 2) {
            sweetAlert(3, data.message, null, 'bottom-end', 4000);
        } else {
            sweetAlert(2, data.exception, null, 'bottom-end', 4000);
        }
    } catch (error) {
        sweetAlert(2, 'Error al guardar el registro: ' + error.message, null, 'bottom-end', 4000);
    }
}

/*
*   Función para cargar las opciones en un select de formulario.
*   Parámetros: endpoint (ruta específica del servidor para obtener los datos), select (identificador del select en el formulario) y selected (valor seleccionado).
*   Retorno: ninguno.
*/
async function fillSelect(endpoint, opcion, selectId, selected) {
    try {
        // Hacer la petición al servidor para obtener datos.
        const response = await fetch(endpoint);
        // Verificar si la respuesta es correcta.
        if (!response.ok) throw new Error(`Error en la API: ${response.status} ${response.statusText}`);
        // Convertir la respuesta en formato JSON.
        const data = await response.json();
        // Buscar el <select> en el HTML.
        const select = document.getElementById(selectId);
        if (!select) throw new Error(`No se encontró el select con ID '${selectId}'`);
        // Agregar una opción predeterminada con valor null.
        let content = `<option value="" ${selected === null ? 'selected' : ''}>Seleccione ${opcion}</option>`;
        // Si los datos son válidos, recorrer la lista y agregar opciones.
        if (data.estado && Array.isArray(data.dataset)) {
            data.dataset.forEach(row => {
                const values = Object.values(row);
                if (values.length < 2) return; // Evitar errores si faltan datos.
                const value = values[0]; // ID
                const text = values[1];  // Nombre
                const isSelected = value == selected ? 'selected' : ''; // Marcar como seleccionado si aplica.
                content += `<option value="${value}" ${isSelected}>${text}</option>`;
            });
        } else {
            content += '<option value="" disabled>No hay opciones disponibles</option>';
        }
        // Insertar las opciones en el select.
        select.innerHTML = content;
    } catch (error) {
        sweetAlert(3, 'Error en fillSelect:' + error, null);
    }
}

function sweetAlert(type, text, url, position, timer) {
    // Se compara el tipo de mensaje a mostrar.
    let title = '';
    let icon = '';
    switch (type) {
        case 1:
            title = 'Éxito';
            icon = 'success';
            break;
        case 2:
            title = 'Error';
            icon = 'error';
            break;
        case 3:
            title = 'Advertencia';
            icon = 'warning';
            break;
        case 4:
            title = 'Aviso';
            icon = 'info';
            break;
        case 5:
            title = 'Campos Vacios';
            icon = 'warning';
            break;
        case 6:
            title = 'Fechas Erroneas';
            icon = 'warning';
            break;
    }
    // Configuración común para todos los toasts
    let toastConfig = {
        toast: true,
        position: position || 'top-end',
        timer: timer || 5000,
        timerProgressBar: true,
        title: title,
        text: text,
        icon: icon,
        color: '#ffffff',
        background: '#1e293b',
        showConfirmButton: false,
        allowEscapeKey: false,
        stopKeydownPropagation: false,
        customClass: {
            title: 'toast-title-font',
            htmlContainer: 'toast-content-font'
        }
    };
    if (typeof Swal === 'undefined') {
        if (url) {
            window.location.href = url;
            return;
        }

        const fallbackTitle = title ? title + ': ' : '';
        window.alert(fallbackTitle + (text || ''));
        return;
    }

    // Si existe una ruta definida, se añade el evento para redireccionar después del toast
    if (url) {
        toastConfig.didClose = function () {
            location.href = url;
        };
        Swal.fire(toastConfig);
    } else {
        Swal.fire(toastConfig);
    }
}

function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('togglePassword');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.src = '/resources/icons/show.png';
        toggleIcon.alt = 'ocultar';
    } else {
        passwordInput.type = 'password';
        toggleIcon.src = '/resources/icons/hidden.png';
        toggleIcon.alt = 'mostrar';
    }
}

/**
 * Función de utilidad para escapar HTML y prevenir XSS
 * @param {string} value - Valor a escapar
 * @returns {string} - Valor escapado
 */
function escapeHTML(value) {
    if (typeof value !== 'string') {
        return String(value);
    }
    const div = document.createElement('div');
    div.textContent = value;
    return div.innerHTML;
}
