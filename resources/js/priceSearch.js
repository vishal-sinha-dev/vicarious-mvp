// Price search AJAX
$(document).ready(function () {
    $("#get_prices").click(function () {
        $("#spinner").show();

        $('[id^="engine-"]').addClass("hidden");
        $('[id^="engine-"]').removeClass("flex");
        $.ajax({
            url: "/hotels/prices", // Replace with your actual Ajax endpoint URL
            method: "GET",
            data: {
                url_hash: $("#get_prices").attr("data-hotel-url"),
                checkin_from: localStorage.getItem("date_start"),
                checkin_to: localStorage.getItem("date_end"),
                children_ages: localStorage.getItem("children_ages"),
                total_adults: localStorage.getItem("total_adults"),
                total_children: localStorage.getItem("total_children"),
            },
            dataType: "json",
            success: function (response) {
                $("#spinner").hide();
                $(".available").hide();
                $(".not-available").hide();
                $("#disclaimer").show();

                // Iterate through the response array and append each item to the container
                $.each(response.data, function (index, item) {
                    $("#engine-" + item.booking_engine).removeClass("hidden");
                    $("#engine-" + item.booking_engine).addClass("flex");

                    $("#engine-" + item.booking_engine + " .price").html(
                        "$" + item.nightly_price + "/night"
                    );

                    $("#engine-" + item.booking_engine + " .total-price").html(
                        "$" + item.total_price + " total"
                    );

					$("#engine-" + item.booking_engine + " .link-out").attr('href', item.link);

                    if (item.is_available == 1) {
                        $("#engine-" + item.booking_engine + " .price").show();
                        $(
                            "#engine-" + item.booking_engine + " .available"
                        ).show();
                    } else {
                        $("#engine-" + item.booking_engine + " .price").hide();
                        $(
                            "#engine-" + item.booking_engine + " .not-available"
                        ).show();
                    }
                });
            },
            error: function () {
                console.log("Error occurred when pulling prices.");
            },
        });
    });
});

