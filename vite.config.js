import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/siswa.js',
                'resources/js/homepage.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        host: '127.0.0.1',
        port: 3000, // Anda dapat menyesuaikan port jika diperlukan
    },
    build: {
        target: 'es2018', // Menentukan target build modern browser
        minify: 'esbuild', // Menggunakan esbuild untuk build cepat
    },
});
