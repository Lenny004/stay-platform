(function () {
    const initDashboard = () => {
        const sidenav = document.getElementById('sidenav');
        if (!sidenav) {
            return;
        }
        const sectionItems = Array.from(document.querySelectorAll('.sidenav-button[data-section]'));
        const sectionButtons = sectionItems
            .map((item) => item.querySelector('button'))
            .filter((button) => button instanceof HTMLElement);
        const accordionToggles = Array.from(document.querySelectorAll('.sidenav-accordion-toggle'));
        const accordions = Array.from(document.querySelectorAll('.sidenav-accordion'));
        const sectionTitle = document.getElementById('section-title');
        const themeToggleLink = document.getElementById('theme-toggle-link');
        const themeIcon = document.getElementById('theme-icon');
        const menuToggle = document.getElementById('menu-toggle');
        const overlay = document.getElementById('modal-overlay');
        const modal = document.getElementById('modal');
        const modalTriggers = Array.from(document.querySelectorAll('[data-open-modal]'));
        const modalClosers = Array.from(document.querySelectorAll('[data-close-modal]'));
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '';
        const loginUrl = document.body?.dataset?.loginUrl ?? '/login';
        const searchInput = document.getElementById('search');
        const refreshButton = document.getElementById('refresh-table');
        const tableRows = Array.from(document.querySelectorAll('.data-table tbody tr'));

        const sectionTitles = {
            dashboard: 'Dashboard',
            profile: 'Configuración personal',
            hotels: 'Hotel',
            'room-types': 'Tipos de Habitaciones',
            rooms: 'Habitaciones',
            activities: 'Actividades',
            tags: 'Tags',
            services: 'Servicios',
            foods: 'Comidas',
            'payment-methods': 'Métodos de pago',
            'accommodation-types': 'Tipos de alojamiento',
            'nearby-areas': 'Zonas cercanas',
            users: 'Usuarios',
            'hotel-status': 'Estado de Hotel',
            nationalities: 'Nacionalidades',
            'usa-states': 'Estados EE.UU',
            departments: 'Departamentos',
            currencies: 'Divisas',
            'payment-status': 'Estados de Pago',
            logout: 'Cerrar sesión'
        };

        const updateIcon = (element, isActive) => {
            if (!element) {
                return;
            }
            const icon = element.querySelector('.icon--image');
            if (!icon) {
                return;
            }
            const activeSrc = icon.dataset.iconActive;
            const inactiveSrc = icon.dataset.iconInactive;
            if (!activeSrc || !inactiveSrc) {
                return;
            }
            icon.src = isActive ? activeSrc : inactiveSrc;
        };

        const clearActiveButtons = () => {
            sectionItems.forEach((item) => {
                item.classList.remove('active');
                updateIcon(item, false);
            });
        };

        const toggleAccordion = (accordion, forceState = null) => {
            if (!accordion) {
                return;
            }
            const toggle = accordion.querySelector('.sidenav-accordion-toggle');
            const sublist = accordion.querySelector('.sidenav-sublist');
            if (!toggle || !sublist) {
                return;
            }

            const shouldExpand =
                typeof forceState === 'boolean' ? forceState : !accordion.classList.contains('expanded');

            accordion.classList.toggle('expanded', shouldExpand);
            toggle.setAttribute('aria-expanded', shouldExpand ? 'true' : 'false');
            sublist.hidden = !shouldExpand;
            updateIcon(accordion, shouldExpand);
        };

        const setActiveButton = (item) => {
            if (!item) {
                return;
            }
            clearActiveButtons();
            item.classList.add('active');
            updateIcon(item, true);

            const parentAccordion = item.closest('.sidenav-accordion');
            if (parentAccordion) {
                toggleAccordion(parentAccordion, true);
            }
        };

        const isSidenavCollapsed = () => sidenav.classList.contains('collapsed');

        const openModal = () => {
            if (modal) {
                modal.classList.add('show');
                modal.setAttribute('aria-hidden', 'false');
            }
            if (overlay) {
                overlay.classList.add('show');
            }
            document.body.classList.add('no-scroll');
        };

        const closeModal = () => {
            if (modal) {
                modal.classList.remove('show');
                modal.setAttribute('aria-hidden', 'true');
            }
            document.body.classList.remove('no-scroll');
            if (overlay && !isSidenavCollapsed()) {
                overlay.classList.remove('show');
            }
        };

        const closeSidenav = () => {
            sidenav.classList.remove('collapsed');
            if (overlay && !modal?.classList.contains('show')) {
                overlay.classList.remove('show');
            }
        };

        const handleLogout = async (url) => {
            if (!url) {
                return;
            }
            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest',
                        Accept: 'application/json'
                    }
                });

                if (!response.ok) {
                    throw new Error(`Error HTTP ${response.status}`);
                }

                const payload = await response.json();
                const message = payload.message ?? 'Sesión cerrada con éxito';

                if (payload.estado === 1) {
                    if (typeof sweetAlert === 'function') {
                        sweetAlert(1, message, loginUrl, 'top-end', 2000);
                    } else {
                        window.location.href = loginUrl;
                    }
                } else if (typeof sweetAlert === 'function') {
                    sweetAlert(3, payload.exception ?? 'No fue posible cerrar la sesión', null, 'top-end', 4000);
                }
            } catch (error) {
                console.error('Error al cerrar sesión:', error);
                if (typeof sweetAlert === 'function') {
                    sweetAlert(2, 'Ocurrió un incidente al cerrar sesión', null, 'top-end', 4000);
                }
            }
        };

        // Inicializar iconos según estado actual
        sectionItems.forEach((item) => updateIcon(item, item.classList.contains('active')));
        accordions.forEach((accordion) => updateIcon(accordion, accordion.classList.contains('expanded')));

        // Listeners para la navegación lateral
        sectionButtons.forEach((button) => {
            button.addEventListener('click', (event) => {
                event.preventDefault();
                event.stopPropagation();
                const item = button.closest('.sidenav-button');
                if (!item) {
                    return;
                }

                const section = item.dataset.section;
                if (!section) {
                    return;
                }

                if (section === 'logout') {
                    handleLogout(button.dataset.url);
                    return;
                }

                setActiveButton(item);
                if (sectionTitle) {
                    sectionTitle.textContent = sectionTitles[section] ?? section;
                }
            });
        });

        accordionToggles.forEach((toggle) => {
            toggle.addEventListener('click', (event) => {
                event.preventDefault();
                event.stopPropagation();
                const accordion = toggle.closest('.sidenav-accordion');
                toggleAccordion(accordion);
            });
        });

        // Búsqueda en tabla
        const filterTable = (value) => {
            const normalized = value.trim().toLowerCase();
            tableRows.forEach((row) => {
                if (!normalized) {
                    row.style.removeProperty('display');
                    return;
                }
                const matches = row.textContent?.toLowerCase().includes(normalized);
                row.style.display = matches ? '' : 'none';
            });
        };

        if (searchInput) {
            searchInput.addEventListener('input', () => filterTable(searchInput.value));
        }

        if (refreshButton) {
            refreshButton.addEventListener('click', (event) => {
                event.preventDefault();
                if (searchInput) {
                    searchInput.value = '';
                }
                filterTable('');
            });
        }

        // Modal handlers
        modalTriggers.forEach((trigger) => {
            trigger.addEventListener('click', (event) => {
                event.preventDefault();
                openModal();
            });
        });

        modalClosers.forEach((closer) => {
            closer.addEventListener('click', (event) => {
                event.preventDefault();
                closeModal();
            });
        });

        // Overlay interactions
        if (overlay) {
            overlay.addEventListener('click', () => {
                closeModal();
                closeSidenav();
            });
        }

        // Tema
        const applyTheme = (theme) => {
            const sanitized = theme === 'dark' ? 'dark' : 'light';
            document.body.classList.toggle('dark-theme', sanitized === 'dark');

            if (themeIcon) {
                const sunSrc = themeIcon.dataset.sunIcon;
                const moonSrc = themeIcon.dataset.moonIcon;
                if (sanitized === 'dark' && moonSrc) {
                    themeIcon.src = moonSrc;
                } else if (sunSrc) {
                    themeIcon.src = sunSrc;
                }
            }
        };

        const savedTheme = localStorage.getItem('admin-theme') ?? 'light';
        applyTheme(savedTheme);

        if (themeToggleLink) {
            themeToggleLink.addEventListener('click', (event) => {
                event.preventDefault();
                const isDark = document.body.classList.contains('dark-theme');
                const nextTheme = isDark ? 'light' : 'dark';
                applyTheme(nextTheme);
                localStorage.setItem('admin-theme', nextTheme);
            });
        }

        // Sidenav toggle
        if (menuToggle) {
            menuToggle.addEventListener('click', (event) => {
                event.preventDefault();
                const isMobile = window.innerWidth <= 768;
                sidenav.classList.toggle('collapsed');
                if (overlay) {
                    if (isMobile && sidenav.classList.contains('collapsed')) {
                        overlay.classList.add('show');
                    } else if (!modal?.classList.contains('show')) {
                        overlay.classList.remove('show');
                    }
                }
            });
        }

        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                closeSidenav();
            }
        });
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initDashboard);
    } else {
        initDashboard();
    }
})();
