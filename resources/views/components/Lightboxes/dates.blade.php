<!-- Date picker lightbox -->
<div
    id="date_box"
    class="rounded-md w-full h-full overflow-auto bg-white p-3 lity-hide break-words border-gray-100 border-2 px-4 md:px-8 py-5 rounded-lg"
>
    <article class="prose max-w-none flex flex-col h-full">
        <h2 class="border-b-gray-300 border-b">Travel Dates</h2>
        <input
            type="text"
            id="datepicker"
            class="w-full mb-2 text-lg text-center"
            placeholder="Select dates..."
        />
        <div id="datepicker_parent" class="mt-4"></div>

        <button
            class="sm:mt-10 mt-auto w-full rounded-lg bg-primary hover:bg-primary-dark hover:shadow-sm font-bold text-white p-3"
            onClick="submitDates();"
        >
            Done
        </button>
    </article>
</div>

<script>
    function openDates() {
        datesLightbox = lity("#date_box");
        return false;
    }

    function submitDates() {
        datesLightbox.close();
        return false;
    }
</script>
