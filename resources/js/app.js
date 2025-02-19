import './bootstrap.js';
import flatpickr from "flatpickr";
import "flatpickr/dist/themes/material_blue.css";
document.addEventListener("DOMContentLoaded", () => {
    flatpickr("#datepicker", {
        enableTime: true,
        inline: true,
        minDate: "today",
        time_24hr: true,
        dateFormat: "Y-m-d H:00",
        minuteIncrement: 60
    });
});
