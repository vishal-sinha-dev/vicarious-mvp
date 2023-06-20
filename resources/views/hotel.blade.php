<x-layout pageTitle="{{ $hotel_name }}">
    <header>
        <!-- Header Section Start -->
        <section
            class="max-w-4xl mx-auto px-6 pt-6 flex flex-col justify-center md:flex-row md:justify-between items-center"
        >
            <div class="mb-4 md:mb-0">
                <h1
                    class="text-2xl md:text-4xl font-bold mb-2 text-center md:text-left"
                >
                    {{ $hotel_name }}
                </h1>
                <div class="flex justify-center md:justify-start items-center">
                    <img
                        src="{{ Vite::asset('resources/icons/comment-dots-regular.svg') }}"
                        class="text-secondary mr-2"
                        width="16"
                        height="auto"
                        alt="Location"
                    />

                    <!-- <a
                        href="#"
                        target="_blank"
                        class="text-secondary font-semibold no-underline hover:underline"
                    >
                        1326 people reviewed this place
                    </a> -->
                    <span class="text-secondary font-semibold no-underline"
                        >{{ $review_count }} people reviewed this place</span
                    >
                </div>
            </div>

            <div class="w-52">
                <img
                    src="{{ Vite::asset('resources/images/logo-dark.png') }}"
                    width="100%"
                    height="auto"
                    alt="Logo"
                />
            </div>
        </section>
        <!-- Header Section End -->
    </header>

    <main>
        <!-- Hero Section Start -->
        <section id="gallery" class="grid grid-cols-4 py-6">
            <div class="col-span-4 md:col-span-2">
                <a
                    href="{{ Vite::asset('resources/images/hotel_galleries/' . $url_hash . '/' . $image_1) }}"
                    data-pswp-width="1150"
                    data-pswp-height="618"
                >
                    <img
                        src="{{ Vite::asset('resources/images/hotel_galleries/' . $url_hash . '/' . $image_1) }}"
                        width="100%"
                        height="auto"
                        class="w-full h-full object-cover"
                        alt="Hero Image 1"
                /></a>
            </div>

            <div class="col-span-2 md:col-span-1">
                <div class="h-1/2">
                    <a
                        href="{{ Vite::asset('resources/images/hotel_galleries/' . $url_hash . '/' . $image_2) }}"
                        data-pswp-width="1150"
                        data-pswp-height="650"
                    >
                        <img
                            src="{{ Vite::asset('resources/images/hotel_galleries/' . $url_hash . '/' . $image_2) }}"
                            width="100%"
                            height="auto"
                            class="w-full h-full object-cover"
                            alt="Hero Image 2"
                    /></a>
                </div>
                <div class="h-1/2">
                    <a
                        href="{{ Vite::asset('resources/images/hotel_galleries/' . $url_hash . '/' . $image_3) }}"
                        class="relative group"
                        data-pswp-width="1150"
                        data-pswp-height="654"
                    >
                        <img
                            src="{{ Vite::asset('resources/images/hotel_galleries/' . $url_hash . '/' . $image_3) }}"
                            width="100%"
                            height="auto"
                            class="w-full h-full object-cover"
                            alt="Hero Image 3"
                        />
                        <img
                            src="{{ Vite::asset('resources/icons/grip-solid.svg') }}"
                            width="24"
                            height="auto"
                            class="relative float-right -top-[30px] -left-[5px] opacity-60 group-hover:opacity-100"
                            alt="Grip"
                        />
                    </a>
                </div>
            </div>

            <div class="col-span-2 md:col-span-1">
                <iframe
                    src="{{ $google_map_url }}"
                    width="100%"
                    height="100%"
                    style="border: 0"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>
        </section>
        <!-- Hero Section End -->

        <!-- Search Section Start -->
        <section class="max-w-4xl mx-auto px-6 py-6">
            <h3 class="text-xl font-bold mb-4">Check availability for</h3>

            <div class="flex gap-4">
                <div class="flex flex-col md:flex-row flex-grow gap-4">
                    <!-- Travelers selector -->
                    <div
                        id="travelers"
                        class="flex items-center gap-4 md:w-1/2 border-gray-100 hover:border-gray-200 border-2 cursor-pointer px-2 md:px-8 py-3 rounded-lg"
                        onClick="openTravelers();"
                    >
                        <p class="text-lg font-bold align-middle">
                            <!-- Users icon -->
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="w-6 h-6 mr-2 inline text-primary"
                                style="margin-top: -4px"
                            >
                                <path
                                    d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z"
                                />
                            </svg>

                            <span id="travelers_button_text">2 Travelers</span>
                        </p>

                        <p class="flex-1 w-1/3">
                            <!-- Down arrow -->
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6 mr-1 md:mr-2 float-right"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                                />
                            </svg>
                        </p>
                    </div>

                    <!-- Dates selector -->
                    <div
                        class="flex items-center gap-4 md:w-1/2 border-gray-100 hover:border-gray-200 border-2 cursor-pointer px-2 md:px-8 py-3 rounded-lg"
                        onClick="openDates();"
                    >
                        <p class="text-lg font-bold align-middle">
                            <!-- Calendar icon -->
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="w-6 h-6 mr-2 inline text-primary"
                                style="margin-top: -4px"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z"
                                    clip-rule="evenodd"
                                />
                            </svg>

                            <span id="date_button_text">...</span>
                        </p>

                        <p class="flex-1 w-1/3">
                            <!-- Down arrow -->
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6 mr-1 md:mr-2 float-right"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                                />
                            </svg>
                        </p>
                    </div>
                </div>

                <div
                    class="w-20 sm:w-28 rounded-lg flex justify-center items-center flex-shrink-0"
                >
                    <button
                        data-hotel-url="{{ $hotel_url_hash }}"
                        id="get_prices"
                        class="w-full sm:w-20 h-full sm:h-20 pt-1.5 rounded-lg sm:rounded-full bg-primary hover:bg-primary-dark hover:shadow-sm text-2xl font-bold text-white"
                    >
                        GO
                    </button>
                </div>
            </div>
        </section>
        <!-- Search Section End -->

        <!-- Booking List Section Start -->
        <section id="booking_engines" class="max-w-4xl mx-auto px-6 py-6">
            <div id="spinner" class="hidden text-6xl text-primary text-center">
                <i class="fa-solid fa-loader fa-spin"></i>
            </div>
            <div
                id="engine-BOOKINGCOM"
                class="hidden w-full bg-gray-100 px-4 md:px-8 py-5 mb-5 rounded-lg flex-col md:flex-row justify-between md:items-center gap-2 md:gap-8"
            >
                <div class="mb-4 md:mb-0">
                    <img
                        src="{{ Vite::asset('resources/images/booking_engines/booking.com_logo.png') }}"
                        class="mb-2"
                        width="160"
                        height="auto"
                        alt="Booking.com"
                    />

                    <div class="flex gap-2">
                        <div
                            class="flex-shrink-0 w-8 md:w-10 h-8 md:h-10 rounded-full overflow-hidden"
                        >
                            <img
                                src="{{ Vite::asset('resources/images/people-1.png') }}"
                                class="mb-6"
                                width="100%"
                                height="auto"
                                alt="Lia"
                            />
                        </div>

                        <div
                            class="px-4 py-3 md:max-w-sm bg-teal-50 rounded-lg"
                        >
                            <p class="font-semibold">Lia & Jeremy's Pick</p>
                            <p class="text-sm">
                                We book all of our hotels through Booking.com!
                                We love their flexible cancellation policy and
                                detailed hotel ratings.
                            </p>
                        </div>
                    </div>
                </div>

                <div
                    class="flex-shrink-0 w-full md:w-64 flex justify-between items-center"
                >
                    <div>
                        <p class="font-bold text-lg price"></p>
                        <p class="text-sm total-price"></p>
                        <div class="flex items-center">
                            <p class="hidden available">
                                <i
                                    class="fa-solid fa-circle-check text-green-400"
                                ></i>
                                Available
                            </p>
                            <p class="hidden not-available">
                                <i
                                    class="fa-solid fa-circle-xmark text-red-400"
                                ></i>
                                No rooms
                            </p>
                        </div>
                    </div>

                    <a
                        href="#"
                        target="_blank"
                        class="link-out flex-shrink-0 px-5 py-1 flex justify-center rounded-full bg-secondary hover:bg-secondary-dark hover:shadow-sm text-lg font-medium text-white"
                        onClick="storeEvent({'engine':'bookingcom'});"
                    >
                        See Rooms
                    </a>
                </div>
            </div>

            <div
                id="engine-EXPEDIA"
                class="hidden w-full bg-gray-100 px-4 md:px-8 py-5 mb-5 rounded-lg flex-col md:flex-row justify-between md:items-center gap-2 md:gap-8"
            >
                <div class="mb-4 md:mb-0">
                    <img
                        src="{{ Vite::asset('resources/images/booking_engines/expedia_logo.png') }}"
                        width="140"
                        height="auto"
                        alt="Expedia"
                    />
                </div>

                <div class="w-full md:w-64 flex justify-between items-center">
                    <div>
                        <p class="font-bold text-lg price">$295/night</p>
                        <p class="text-sm total-price">$100 total</p>
                        <div class="flex items-center">
                            <p class="hidden available">
                                <i
                                    class="fa-solid fa-circle-check text-green-400"
                                ></i>
                                Available
                            </p>
                            <p class="hidden not-available">
                                <i
                                    class="fa-solid fa-circle-xmark text-red-400"
                                ></i>
                                No rooms
                            </p>
                        </div>
                    </div>

                    <a
                        href="#"
                        target="_blank"
                        class="link-out flex-shrink-0 px-5 py-1 flex justify-center rounded-full bg-secondary hover:bg-secondary-dark hover:shadow-sm text-lg font-medium text-white"
                        onClick="storeEvent({'engine':'expedia'});"
                    >
                        See Rooms
                    </a>
                </div>
            </div>

            <div
                id="engine-HOTELSCOM"
                class="hidden w-full bg-gray-100 px-4 md:px-8 py-5 mb-5 rounded-lg flex-col md:flex-row justify-between md:items-center gap-2 md:gap-8"
            >
                <div class="mb-4 md:mb-0">
                    <img
                        src="{{ Vite::asset('resources/images/booking_engines/hotels.com_logo.png') }}"
                        width="160"
                        height="auto"
                        alt="Hotels.com"
                    />
                </div>

                <div class="w-full md:w-64 flex justify-between items-center">
                    <div>
                        <p class="font-bold text-lg price">$295/night</p>
                        <p class="text-sm total-price">$100 total</p>
                        <div class="flex items-center">
                            <p class="hidden available">
                                <i
                                    class="fa-solid fa-circle-check text-green-400"
                                ></i>
                                Available
                            </p>
                            <p class="hidden not-available">
                                <i
                                    class="fa-solid fa-circle-xmark text-red-400"
                                ></i>
                                No rooms
                            </p>
                        </div>
                    </div>

                    <a
                        href="#"
                        target="_blank"
                        class="link-out flex-shrink-0 px-5 py-1 flex justify-center rounded-full bg-secondary hover:bg-secondary-dark hover:shadow-sm text-lg font-medium text-white"
                        onClick="storeEvent({'engine':'hotelscom'});"
                    >
                        See Rooms
                    </a>
                </div>
            </div>

            <div
                id="engine-TRIPADVISOR"
                class="hidden w-full bg-gray-100 px-4 md:px-8 py-5 mb-5 rounded-lg flex-col md:flex-row justify-between md:items-center gap-2 md:gap-8"
            >
                <div class="mb-4 md:mb-0">
                    <img
                        src="{{ Vite::asset('resources/images/booking_engines/tripadvisor_logo.png') }}"
                        width="160"
                        height="auto"
                        alt="Tripadvisor"
                    />
                </div>

                <div class="w-full md:w-64 flex justify-between items-center">
                    <div>
                        <p class="font-bold text-lg price">$295/night</p>
                        <p class="text-sm total-price">$100 total</p>
                        <div class="flex items-center">
                            <p class="hidden available">
                                <i
                                    class="fa-solid fa-circle-check text-green-400"
                                ></i>
                                Available
                            </p>
                            <p class="hidden not-available">
                                <i
                                    class="fa-solid fa-circle-xmark text-red-400"
                                ></i>
                                No rooms
                            </p>
                        </div>
                    </div>

                    <a
                        href="#"
                        target="_blank"
                        class="link-out flex-shrink-0 px-5 py-1 flex justify-center rounded-full bg-secondary hover:bg-secondary-dark hover:shadow-sm text-lg font-medium text-white"
                        onClick="storeEvent({'engine':'tripadvisor'});"
                    >
                        See Rooms
                    </a>
                </div>
            </div>

            <div
                id="engine-KAYAK"
                class="hidden w-full bg-gray-100 px-4 md:px-8 py-5 mb-5 rounded-lg flex-col md:flex-row justify-between md:items-center gap-2 md:gap-8"
            >
                <div class="mb-4 md:mb-0">
                    <img
                        src="{{ Vite::asset('resources/images/booking_engines/kayak_logo.png') }}"
                        width="160"
                        height="auto"
                        alt="Hotels.com"
                    />
                </div>

                <div class="w-full md:w-64 flex justify-between items-center">
                    <div>
                        <p class="font-bold text-lg price">$295/night</p>
                        <p class="text-sm total-price">$100 total</p>
                        <div class="flex items-center">
                            <p class="hidden available">
                                <i
                                    class="fa-solid fa-circle-check text-green-400"
                                ></i>
                                Available
                            </p>
                            <p class="hidden not-available">
                                <i
                                    class="fa-solid fa-circle-xmark text-red-400"
                                ></i>
                                No rooms
                            </p>
                        </div>
                    </div>

                    <a
                        href="#"
                        target="_blank"
                        class="link-out flex-shrink-0 px-5 py-1 flex justify-center rounded-full bg-secondary hover:bg-secondary-dark hover:shadow-sm text-lg font-medium text-white"
                        onClick="storeEvent({'engine':'kayak'});"
                    >
                        See Rooms
                    </a>
                </div>
            </div>

            <p id="disclaimer" class="hidden text-xs mt-5">
                * Prices are approximated and are subject to change. For final
                pricing, please select a booking site.
            </p>
        </section>
        <!-- Booking List Section End -->
    </main>

    <footer>
        <!-- About Section Start -->
        <section
            class="max-w-4xl mx-auto px-6 py-6 grid grid-cols-12 gap-0 md:gap-16"
        >
            <div class="col-span-12 md:col-span-7">
                <h2 class="text-xl font-bold">About {{ $hotel_name }}</h2>
                <h5 class="text-lg text-gray-400 font-medium">
                    {{ $address }}
                </h5>

                <p class="my-8 lg:max-w-md">
                    {{ $description }}
                </p>
            </div>

            <div class="col-span-12 md:col-span-5">
                <h3 class="text-lg font-bold mb-6">What this place offers</h3>

                @foreach ($offerings as $offering)
                <div class="flex items-center mb-2">
                    <p>
                        <i class="{{ $offering->icon_font_awesome_class }}"></i>
                        {{ $offering->label }}
                    </p>
                </div>
                @endforeach
            </div>
        </section>
        <!-- About Section End -->
    </footer>

    <script>
        function storeEvent(eventData) {
            $.ajax({
                url: "/events/store", // Replace with your actual Ajax endpoint URL
                method: "GET",
                data: { event: eventData },
                dataType: "json",
                success: function (response) {},
                error: function () {
                    console.log("Error occurred sending the event.");
                },
            });
        }
    </script>

    <x-lightboxes.travelers />
    <x-lightboxes.dates />
</x-layout>
