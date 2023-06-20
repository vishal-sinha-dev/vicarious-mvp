import Lightpick from "lightpick";
import "/resources/css/lightpick.css";

function getStartDate() {
    var lsStartDate = localStorage.getItem('date_start');
    if (lsStartDate) {
        return moment(lsStartDate, 'YYYY-MM-DD')
    } else {
        return moment().add(1, 'day') // Tomorrow
    }
}

function getEndDate() {
    var lsEndDate = localStorage.getItem('date_end');
    if (lsEndDate) {
        return moment(lsEndDate, 'YYYY-MM-DD')
    } else {
        return moment().add(1, 'week').add(1, 'day') // One week from tomorrow (default)
    }
}

var picker = new Lightpick({
    field: document.getElementById("datepicker"),
    inline: true,
    singleDate: false,
    parentEl: document.getElementById("datepicker_parent"),
    separator: " → ",
    format: "MMM D, YYYY",
    selectForward: true,
    tooltipNights: true,
    startDate: getStartDate(),
    endDate: getEndDate(),
    locale: {
        tooltip: {
            one: 'night',
            other: 'nights'
        }
    },
    onSelect: function (start, end) {
        saveDates(start, end);
    },
});

function saveDates(start, end) {
    localStorage.removeItem('date_end');

    localStorage.setItem('date_start', start.format('YYYY-MM-DD'));
    if (end.isAfter(start)) {
        localStorage.setItem('date_end', end.format('YYYY-MM-DD'));
    }

    setDatesLabel(start, end);
}

function setDatesLabel(start, end) {
    var str = "";
    str += start ? start.format("MMM D") + " → " : "";
    str += end ? end.format("MMM D") : "...";
    document.getElementById("date_button_text").innerHTML = str;
}

// Run on load
setDatesLabel(getStartDate(), getEndDate());
saveDates(getStartDate(), getEndDate());
