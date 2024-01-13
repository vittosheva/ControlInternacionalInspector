import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('alpine:init', () => {
    window.Alpine.store('sidebar', {
        isOpen: window.Alpine.$persist(false).as('isOpen'),
    });
});
