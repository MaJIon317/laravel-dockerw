import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js', 
                'resources/js/barcode-scanner.js', 
                
                'resources/css/admin/style.css', 
                'resources/js/admin/script.js',
                'resources/js/admin/editor.js',
                'resources/js/admin/charts.js',
            ],
            refresh: true,
        }),
    ],
    build: { 
        chunkSizeWarningLimit: 1600
    }
});

 

