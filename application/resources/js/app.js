import '../css/app.css';
import './bootstrap';

import '@fortawesome/fontawesome-free/css/all.css';
import { Link, createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist';

// const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    // title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('inertia-link', Link)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
    progress: {
        showSpinner: true,
        delay: 1,
        color: '#6875F5',
    },
});

