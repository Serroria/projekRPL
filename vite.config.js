import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/hamburger.css', 'resources/css/category.css', 'resources/css/posterSlide.css','resources/css/adminSidebar.css', 'resources/css/cart.css', 'resources/css/checkout.css',
                'resources/js/app.js', 'resources/js/hamburger.js', 'resources/js/category.js', 'resources/js/posterSlide.js',  'resources/js/adminSidebar.js', 'resources/js/cart.js', 'resources/js/cart2.js',],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
