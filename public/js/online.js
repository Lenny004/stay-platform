// Usar rutas de Laravel en lugar de API antigua
const API_USUARIOS = '/api/usuario';

window.loadOnlineReady = (async () => {
    await loadContentOnline();
})();

async function loadContentOnline() {
    const botones = document.getElementById('menu-drop');
    
    // Verificar si el usuario está autenticado (usando meta tag o cookie)
    const isAuthenticated = document.querySelector('meta[name="user-authenticated"]');
    
    let content;
    if (isAuthenticated && isAuthenticated.content === 'true') {
        // Usuario autenticado
        content = `
            <ul>
                <li>
                    <a href="/perfil" class="tittle" role="menuitem">Perfil</a>
                    <a href="#" class="tittle" role="menuitem" onclick="logOut()">Cerrar Sesión</a>
                </li>
                <hr>
                <li>
                    <a href="#" class="tittle" role="menuitem">Centro de Ayuda</a>
                </li>
            </ul>`;
    } else {
        // Usuario no autenticado
        content = `
            <ul>
                <li>
                    <a href="/registro" class="tittle" role="menuitem"><b>Regístrate</b></a>
                    <a href="/login" class="tittle" role="menuitem">Iniciar Sesión</a>
                </li>
                <hr>
                <li>
                    <a href="#" class="tittle" role="menuitem">Centro de Ayuda</a>
                </li>
            </ul>`;
    }
    botones.innerHTML = content;
}

async function logOut() {
    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        
        const response = await fetch('/logout', {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrfToken
            },
            credentials: 'same-origin'
        });

        if (!response.ok) {
            throw new Error(`Error HTTP: ${response.status}`);
        }

        const data = await response.json();

        if (data.estado) {
            sweetAlert(1, data.message || 'Sesión cerrada exitosamente', '/login', 'top-end', 2000);
        } else {
            throw new Error(data.exception || 'Error al cerrar sesión');
        }

    } catch (error) {
        console.error('Error al cerrar sesión:', error);
        sweetAlert(2, 'Error al cerrar sesión: ' + error.message, false, 'top', 4000);
    }
}

function openMenu() {
    const isMobile = window.innerWidth <= 768;
    if (isMobile) {
        document.getElementById('sidenav').classList.toggle('show');
        document.getElementById('overlay').style.display = "block";
    } else {
        document.getElementById('menu-drop').classList.toggle('show');
    }
}

function closeSidenav() {
    document.getElementById('sidenav').classList.remove('show');
    document.getElementById('overlay').classList.remove('show');
    document.getElementById('overlay').style.display = "none";
}