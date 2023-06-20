<!-- Travelers lightbox -->
<div
    id="travelers_box"
    class="rounded-md w-full h-full overflow-auto bg-white p-3 lity-hide break-words border-gray-100 border-2 px-4 md:px-8 py-5 rounded-lg"
>
    <article class="prose max-w-none flex flex-col h-full">
        <h2 class="border-b-gray-300 border-b">Travelers</h2>
        <div class="grid grid-cols-2 gap-4">
            <div>Adults</div>
            <div class="text-right">
                <button
                onClick="updateAdults(-1);"
                    class="rounded-full border-2 border-gray-300 hover:border-gray-400 w-9 font-bold text-gray-300 hover:text-gray-400"
                >
                    -
                </button>
                <span id="total_adults" class="mx-4">0</span>
                <button
                    onClick="updateAdults(1);"
                    class="rounded-full border-2 border-primary w-9 font-bold text-primary hover:text-primary-dark hover:border-primary-dark"
                >
                    +
                </button>
            </div>
            <div>
                Children<br />
                <span class="text-sm">Ages 0 to 17</span>
            </div>

            <div class="pt-2 text-right">
                <button
                onClick="updateChildren(-1);"
                    class="rounded-full border-2 border-gray-300 hover:border-gray-400 w-9 font-bold text-gray-300 hover:text-gray-400"
                >
                    -
                </button>
                <span id="total_children" class="mx-4">0</span>
                <button
                    onClick="updateChildren(1);"
                    class="rounded-full border-2 border-primary w-9 font-bold text-primary hover:text-primary-dark hover:border-primary-dark"
                >
                    +
                </button>
            </div>

            @for ($i = 1; $i <= 6; $i++)
            <div id="infant_{{ $i }}_age_box" class="child_age col-span-1 hidden">
                <label for=""infant_{{ $i }}_age">Child {{ $i }} age</label>
                <select 
                    id="infant_{{ $i }}_age"
                    class="border-2 mt-2 block w-full bg-white rounded-md border-gray-300 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    onChange="storeChildrenAges();"
                >
                    @for ($a = 0; $a <= 17; $a++)
                    <option>{{ $a }}</option>
                    @endfor
                </select>
            </div>
            @endfor

        </div>

        <div class="my-5"></div>

        <button
            class="w-full sm:mt-10 mt-auto rounded-lg bg-primary hover:bg-primary-dark hover:shadow-sm font-bold text-white p-3 mt-10"
            onClick="submitTravelers();"
        >
            Done
        </button>
    </article>
</div>

<script>
    
    function openTravelers() {
        travelersLightbox = lity("#travelers_box");
        return false;
    }

    function updateAdults(additional) {
        document.getElementById("total_adults").innerHTML = Number(document.getElementById("total_adults").innerHTML) + Number(additional);
        if(Number(document.getElementById("total_adults").innerHTML) < 0) document.getElementById("total_adults").innerHTML = 0;
        saveTravelers();
    }

    function updateChildren(additional) {
        document.getElementById("total_children").innerHTML = Number(document.getElementById("total_children").innerHTML) + Number(additional);
        if(Number(document.getElementById("total_children").innerHTML) < 0) document.getElementById("total_children").innerHTML = 0;
        if(Number(document.getElementById("total_children").innerHTML) >= 6) document.getElementById("total_children").innerHTML = 6;
        saveTravelers();
        showChildAges(Number(document.getElementById("total_children").innerHTML));
    }

    function showChildAges(toAge) {
        $(".child_age").hide();
        for (let index = 0; index < toAge + 1; index++) {
            $("#infant_" + index + "_age_box").show();
        }
    }

    function getAndDisplayTravlers() {
        var adults = localStorage.getItem("total_adults");
        var children = localStorage.getItem("total_children");

        document.getElementById("total_adults").innerHTML = adults ? adults : 2;
        document.getElementById("total_children").innerHTML = children
            ? children
            : 0;        
    }

    function saveTravelers() {
        localStorage.setItem(
            "total_adults",
            document.getElementById("total_adults").innerHTML
        );
        localStorage.setItem(
            "total_children",
            document.getElementById("total_children").innerHTML
        );
        storeChildrenAges();
    }

    function setButtonText() {
        var totalTravelers = Number(document.getElementById("total_adults").innerHTML) + Number(document.getElementById("total_children").innerHTML);
        document.getElementById("travelers_button_text").innerHTML = totalTravelers + " Travelers";
    }

    function submitTravelers() {
        setButtonText();
        saveTravelers();
        travelersLightbox.close();
        return false;
    }

    function storeChildrenAges() {
        var total_children = document.getElementById("total_children").innerHTML;
        var ages = $.map($(".child_age select"), function(e, k) {
              if ((k + 1) <= total_children) return Number(e.value)
        });
        localStorage.setItem("children_ages", JSON.stringify(ages));
        return false;
    }

    function setChildrenAgesFromLS() {
        var ages = $.map(JSON.parse(localStorage.getItem('children_ages')), function(e, k) {
            if(Number(e) >= 0 && Number(e) < 18) {
                $("#infant_" + (k+1) + "_age").val(e);
            } else {
                $("#infant_" + (k+1) + "_age").val(0);
            }
        })
    }

    // Run to prefill for the first time
    getAndDisplayTravlers();
    setButtonText();
    showChildAges(Number(localStorage.getItem("total_children") ? localStorage.getItem("total_children") : 0));
    setChildrenAgesFromLS();
    saveTravelers();
    
</script>
