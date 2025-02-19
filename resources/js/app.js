import './bootstrap.js';
import flatpickr from "flatpickr";
import "flatpickr/dist/themes/material_blue.css";
document.addEventListener("DOMContentLoaded", () => {
    flatpickr("#datepicker", {
        dateFormat: "Y-m-d",
        altInput: true,
        altFormat: "F j, Y"
    });
});
