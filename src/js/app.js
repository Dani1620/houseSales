document.addEventListener('DOMContentLoaded', function () {
    menuAnimation();

    darkMode();

    removeAlert();
});

function darkMode() {

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    // console.log(prefiereDarkMode.matches);

    if(prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');

    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function() {
        if(prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');

            // Hace que el dark mode se quede guardado en el local storage
            if(document.body.classList.contains('dark-mode')) {
                localStorage.setItem('modo-oscuro', 'true');

            } else {
                localStorage.setItem('modo-oscuro', 'false');
            }

        } else {
            document.body.classList.remove('dark-mode');

            // Elimina el dark mode del local storage
            if(document.body.classList.contains('dark-mode')) {
                localStorage.setItem('modo-oscuro', 'true');

            } else {
                localStorage.setItem('modo-oscuro', 'false');
            }
        }
    });

    const botonDarkMode = document.querySelectorAll('.dark-mode-boton');

    botonDarkMode.forEach(darkBoton => {
        darkBoton.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');

            // Hace que la preferencia del color se quede guardado en local-Storage
            if (document.body.classList.contains('dark-mode')) {
                localStorage.setItem('modo-oscuro', 'true');
            } else {
                localStorage.setItem('modo-oscuro', 'false');
            }
        });
    });

    // Aplicando a la pagina actual el modo elegido
    if(localStorage.getItem('modo-oscuro') === 'true') {
        document.body.classList.add('dark-mode');
        
    } else {
        document.body.classList.remove('dark-mode');
    }
}


function menuAnimation() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    if (navegacion.classList.contains('mostrar')) {
        navegacion.classList.remove('mostrar');
    } else {
        navegacion.classList.add('mostrar');
    }

    /* toggle: agrega la clase si no la tiene, y la quita si la tiene  */
    // navegacion.classList.toggle('mostrar');
}


function removeAlert() {
    const alertaError = document.querySelectorAll('.alerta.error');
    const alertaCrud = document.querySelector('.alerta.crud');

    if(alertaError) {
        setTimeout(() => {
            alertaError.forEach(error => {
                error.remove();
            });
        }, 10000);
    }

    if(alertaCrud) {
        setTimeout(() => {
            alertaCrud.remove();
        }, 4000);
    }
}