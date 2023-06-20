import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/datepicker.js",
                "resources/js/gallery.js",
                "resources/js/priceSearch.js",
            ],
            refresh: true,
        }),
    ],
    build: {
        minify: false,
    },
    esbuild: {
        minifyIdentifiers: false,
        keepNames: true,
    },
});
