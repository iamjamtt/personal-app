import Alpine from 'alpinejs'
import AlpineFloatingUI from '@awcodes/alpine-floating-ui'
import NotificationsAlpinePlugin from '../../vendor/filament/notifications/dist/module.esm'
import 'flowbite';
import NProgress from 'nprogress';
import 'nprogress/nprogress.css';

Alpine.plugin(AlpineFloatingUI)
Alpine.plugin(NotificationsAlpinePlugin)

window.Alpine = Alpine

Alpine.start()

// Inicializa NProgress
NProgress.configure({
    showSpinner: false, // Oculta el spinner
    trickleSpeed: 500, // Velocidad del efecto de carga
    ease: 'ease', // Efecto de transición
    speed: 500, // Velocidad de la transición
    minimum: 0.1, // Mínimo de la barra de carga
    trickle: true, // Efecto de carga
    trickleRate: 0.1, // Velocidad del efecto de carga
});

// Muestra la barra de carga en cada cambio de página
window.addEventListener('beforeunload', function() {
    NProgress.start();
    NProgress.set(0.4);
    NProgress.inc();
});

// Oculta la barra de carga después de que la página se ha cargado completamente
window.addEventListener('load', function() {
    NProgress.done();
});
