// Usar rutas de Laravel
const API_DIVISA = '/api/divisas';
const API_STATE = '/api/estados-usa';
const API_NATION = '/api/nacionalidades';
const API_SUFFIX = '/api/sufijo-telefono';
const REGISTER_URL = '/registro';

document.addEventListener('DOMContentLoaded', async function () {
    await fillSelect(API_DIVISA, "una divisa", 'divisa', null);
    await searchState();
    await searchNation();

    document.getElementById('toggleNationsButton').addEventListener('click', function (e) {
        e.stopPropagation();
        toggleNations();
    });

    document.getElementById('toggleStateButton').addEventListener('click', function (e) {
        e.stopPropagation();
        toggleStates();
    });

    document.addEventListener('click', function (e) {
        const popup = document.getElementById('optionsNations');
        if (!e.target.closest('.select--wrap')) {
            popup.classList.remove('select--visiblePopup');
        }
    });
});

function toggleNations() {
    const popup = document.getElementById('optionsNations');
    popup.classList.toggle('select--visiblePopup');
}

function toggleStates() {
    const popup = document.getElementById('optionsStates');
    popup.classList.toggle('select--visiblePopup');
}

async function searchState() {
    const popup = document.getElementById('optionsStates');
    const searchInput = popup.querySelector('.select--search input');

    try {
        const response = await fetch(API_STATE);
        if (!response.ok) throw new Error(`Error: ${response.status}`);

        const data = await response.json();

        if (data.estado && Array.isArray(data.dataset)) {
            const oldItems = popup.querySelectorAll('.select--item');
            oldItems.forEach(item => item.remove());

            data.dataset.forEach(state => {
                const item = document.createElement('div');
                item.classList.add('select--item');
                item.dataset.id = state.id_estado_usa;
                item.textContent = state.nombre_estado;

                item.addEventListener('click', function () {
                    document.querySelector('#toggleStateButton span').textContent = state.nombre_estado;
                    document.getElementById('id_state').value = state.id_estado_usa;
                    popup.classList.remove('select--visiblePopup');
                    
                    const sufijoSpan = document.getElementById('phone-suffix');
                    if (sufijoSpan) {
                        sufijoSpan.value = "+1 (" + state.codigo_estado + ")";
                    }
                });
                popup.appendChild(item);
            });

            searchInput.addEventListener('input', function () {
                const filter = this.value.toLowerCase();
                popup.querySelectorAll('.select--item').forEach(item => {
                    item.style.display = item.textContent.toLowerCase().includes(filter) ? '' : 'none';
                });
            });
        }
    } catch (error) {
        sweetAlert(3, 'Error al cargar estados: ' + error.message, null, 'top-end', 4000);
    }
}

async function searchNation() {
    const popup = document.getElementById('optionsNations');
    const searchInput = popup.querySelector('.select--search input');

    try {
        const response = await fetch(API_NATION);
        if (!response.ok) throw new Error(`Error: ${response.status}`);

        const data = await response.json();

        if (data.estado && Array.isArray(data.dataset)) {
            const oldItems = popup.querySelectorAll('.select--item');
            oldItems.forEach(item => item.remove());

            data.dataset.forEach(nation => {
                const item = document.createElement('div');
                item.classList.add('select--item');
                item.dataset.id = nation.id_nacionalidad;
                item.textContent = nation.nombre_pais;

                item.addEventListener('click', function () {
                    document.querySelector('#toggleNationsButton span').textContent = nation.nombre_pais;
                    document.getElementById('id_nacionalidad').value = nation.id_nacionalidad;
                    popup.classList.remove('select--visiblePopup');
                    onNationalityChange(nation.id_nacionalidad);
                });
                popup.appendChild(item);
            });

            searchInput.addEventListener('input', function () {
                const filter = this.value.toLowerCase();
                popup.querySelectorAll('.select--item').forEach(item => {
                    item.style.display = item.textContent.toLowerCase().includes(filter) ? '' : 'none';
                });
            });
        }
    } catch (error) {
        sweetAlert(3, 'Error al cargar nacionalidades: ' + error.message, null, 'top-end', 4000);
    }
}

async function onNationalityChange(nationalityId) {
    try {
        if (nationalityId == 2) {
            document.getElementById('stateContainer').classList.remove('visually-hidden');
        } else {
            document.getElementById('stateContainer').classList.add('visually-hidden');
        }

        const formData = new FormData();
        formData.append('nationalityId', nationalityId);
        
        // CSRF token de Laravel
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (csrfToken) {
            formData.append('_token', csrfToken.content);
        }

        const response = await fetch(API_SUFFIX, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const data = await response.json();
        
        if (data.estado == 1 && data.codigo_pais) {
            const sufijoSpan = document.getElementById('phone-suffix');
            if (sufijoSpan) {
                sufijoSpan.value = data.codigo_pais.startsWith('+') ? data.codigo_pais : '+' + data.codigo_pais;
                sufijoSpan.style.display = 'flex';
            }
        }
    } catch (error) {
        console.error('Error:', error);
        sweetAlert(3, 'Error al cargar sufijo telefónico', null, 'top-end', 3000);
    }
}

// Submit del formulario
document.getElementById('register_form').addEventListener('submit', async function (event) {
    event.preventDefault();

    const formData = new FormData(this);

    try {
        const response = await fetch(REGISTER_URL, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        // Manejo específico de errores de validación de Laravel (422)
            if (response.status === 422) {
                const errorPayload = await response.json().catch(() => ({}));
                console.log('Laravel 422 error payload:', errorPayload);
                let errorMsg = '';
                if (errorPayload && errorPayload.errors) {
                    Object.entries(errorPayload.errors).forEach(([field, messages]) => {
                        errorMsg += `${Array.isArray(messages) ? messages.join(' ') : messages}`;
                    });
                    sweetAlert(3, errorMsg, null, 'top-end', 7000);
                } else {
                    sweetAlert(3, 'Datos inválidos. Verifica el formulario.', null, 'top-end', 5000);
                }
                return;
            }

        if (!response.ok) {
            const errText = await response.text().catch(() => '');
            throw new Error(`Error del servidor: ${response.status}${errText ? ' - ' + errText : ''}`);
        }

        const data = await response.json();
        
        if (data.estado === 1) {
            sweetAlert(1, data.message, data.redirect, 'top-end', 2000);
        } else {
            // Compatibilidad con respuestas personalizadas
            const msg = data.exception || data.message || 'No se pudo completar el registro';
            sweetAlert(3, msg, null, 'top-end', 4000);
        }
    } catch (error) {
        sweetAlert(2, 'Error al registrar: ' + (error && error.message ? error.message : error), null, 'top-end', 4000);
    }
});