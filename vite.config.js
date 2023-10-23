import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // 'resources/sass/app.scss',
                // 'resources/js/app.js',

                'resources/css/landing/style.css',
                'resources/sass/landing_custom.scss',
                'resources/vendor/bootstrap/css/bootstrap.min.css',
                'resources/vendor/bootstrap-icons/bootstrap-icons.css',
                'resources/vendor/boxicons/css/boxicons.min.css',
                'resources/vendor/glightbox/css/glightbox.min.css',
                'resources/vendor/remixicon/remixicon.css',
                'resources/vendor/swiper/swiper-bundle.min.css',

                'resources/vendor/bootstrap/js/bootstrap.bundle.min.js',
                'resources/vendor/glightbox/js/glightbox.min.js',
                'resources/vendor/isotope-layout/isotope.pkgd.min.js',
                'resources/vendor/swiper/swiper-bundle.min.js',
                'resources/vendor/php-email-form/validate.js',
                'resources/js/landing_page.js',

                'resources/sass/login.scss',

                'resources/adminlte/css/adminlte.css',
            ],
            refresh: true,
        }),
    ],
});
