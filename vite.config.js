// import { defineConfig } from 'vite';
// import laravel from 'laravel-vite-plugin';
// import vue from '@vitejs/plugin-vue';
// import path from 'path';

// export default defineConfig({
//     plugins: [
//         laravel({
//             input: [
//                 'resources/sass/app.scss',
//                 'resources/js/app.js',
//                 'resources/vendors/js/vendor.bundle.base.js'
//             ],
//             refresh: true,
//         }),
//         vue({
//             template: {
//                 transformAssetUrls: {
//                     base: null,
//                     includeAbsolute: false,
//                 },
//             },
//         }),
//     ],
//     server: {
//         host: '0.0.0.0',
//         hmr: {
//             host: '127.0.0.1',
//         },
//     },
//     resolve: {
//         alias: {
//             vue: 'vue/dist/vue.esm-bundler.js',
//             '$': 'jquery',
//             'jQuery': 'jquery',
//             'window.jQuery': 'jquery',
//         },
//     },
//     optimizeDeps: {
//         include: ['jquery'],
//         exclude: ['jquery.cookie'],
//     },
// });

import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/vendors/js/vendor.bundle.base.js'
            ],
            refresh: [
                ...refreshPaths,
                'app/Livewire/**',
            ],
        }),
    ],
});