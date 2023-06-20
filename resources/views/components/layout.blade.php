<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"
        />
        <title>{{ $pageTitle }}</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
        @vite(['resources/css/app.css'])

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

        <!-- Google Tag Manager -->
        <script>
            (function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    "gtm.start": new Date().getTime(),
                    event: "gtm.js",
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != "dataLayer" ? "&l=" + l : "";
                j.async = true;
                j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, "script", "dataLayer", "GTM-N93LWTL");
        </script>
        <!-- End Google Tag Manager -->
    </head>

    <body class="px-2 md:px-8 pt-2 pb-2 md:pb-12 bg-gray-100">
        <!-- Google Tag Manager (noscript) -->
        <noscript
            ><iframe
                src="https://www.googletagmanager.com/ns.html?id=GTM-N93LWTL"
                height="0"
                width="0"
                style="display: none; visibility: hidden"
            ></iframe
        ></noscript>
        <!-- End Google Tag Manager (noscript) -->

        <!-- Announcement Area Start -->
        <div class="max-w-4xl mx-auto px-6 mb-2 text-gray-600">
            <a href="/" class="no-underline hover:underline text-sm md:text-xs"
                >Powered by <strong>Vicarious</strong></a
            >
        </div>
        <!-- Announcement Area End -->

        <div id="main_content" class="max-w-7xl mx-auto bg-white rounded-xl">
            <!-- CONTENT -->
            {{ $slot }}
        </div>

        <div class="mt-4 max-w-7xl mx-auto p-6 text-center text-xs">
            <p>
                All trademarks, logos and brand names are the property of their
                respective owners. All company, product and service names used
                in this website are for identification purposes only.
            </p>
        </div>

        <div class="mt-4 max-w-7xl mx-auto p-6">
            <a
                href="/privacy"
                class="no-underline hover:underline text-sm md:text-xs"
                >Privacy Policy</a
            >
        </div>

        <!-- Date picker -->
        @vite(['resources/js/datepicker.js'])

        <!-- Lity Modal -->
        <script src="/js/lity.js"></script>

        <!-- CSS for Lity and Datepicker -->
        <link rel="stylesheet" href="/css/lity.min.css" />
        <link rel="stylesheet" href="/css/css.overrides.css" />

        <!-- Gallery Lightbox -->
        @vite(['resources/js/gallery.js'])

        <!-- Price seach -->
        @vite(['resources/js/priceSearch.js'])

        <!-- Font Awesome -->
        <script
            src="https://kit.fontawesome.com/c52dd6a1da.js"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
