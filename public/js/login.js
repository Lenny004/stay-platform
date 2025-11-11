const loginForm = document.getElementById('login_form');

if (loginForm) {
    loginForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(loginForm);
        
        // Validación básica
        const user = formData.get('user');
        const password = formData.get('password');
        
        if (!user.trim() || !password.trim()) {
            sweetAlert(2, 'Complete todos los campos del formulario', null, 'top-end', 4000);
            return;
        }
        
        try {
            const response = await fetch('/login', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            
            if (!response.ok) {
                throw new Error(`Error del servidor: ${response.status}`);
            }
            
            const data = await response.json();
            
            if (data.estado === 1) {
                sweetAlert(1, data.message, data.redirect, 'top-end', 2000);
            } else {
                sweetAlert(3, data.exception, null, 'top-end', 4000);
            }
        } catch (error) {
            console.error('Error:', error);
            sweetAlert(2, 'Error de conexión', null, 'top-end', 4000);
        }
    });
}

// Función para mostrar/ocultar contraseña
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