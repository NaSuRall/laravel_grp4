import './bootstrap.js';
import flatpickr from "flatpickr";
import "flatpickr/dist/themes/material_blue.css";
document.addEventListener("DOMContentLoaded", () => {
    flatpickr("#datepicker", {
        enableTime: true,
        time_24hr: true,
        dateFormat: "Y-m-d H:i",
    });
});
