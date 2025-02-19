import './bootstrap.js';
import flatpickr from "flatpickr";
import "flatpickr/dist/themes/material_blue.css";

document.addEventListener("DOMContentLoaded", () => {
    // Check if schedules data is defined and valid
    if (typeof schedules === 'undefined' || !Array.isArray(schedules)) {
        console.error('Schedules data is not properly loaded');
        return;
    }

    flatpickr("#datepicker", {
        enableTime: true,
        inline: true,
        minDate: "today",
        time_24hr: true,
        dateFormat: "Y-m-d H:i",
        minuteIncrement: 60,

        enable: [function(date) {
            // Get the full weekday name (e.g., Monday, Tuesday)
            const dayOfWeek = date.toLocaleDateString('en-US', { weekday: 'long' });

            // Filter schedules for the current day
            const daySchedules = schedules.filter(s => s.day_of_week === dayOfWeek);

            // If no schedule is available on this day, disable the day entirely
            if (daySchedules.length === 0) return false;

            // Convert selected time to minutes since midnight
            const timeInMinutes = date.getHours() * 60 + date.getMinutes();

            // Check if the selected time falls within any valid schedule
            return daySchedules.some(schedule => {
                const [startH, startM] = schedule.start_time.split(':').map(Number);
                const [endH, endM] = schedule.end_time.split(':').map(Number);

                const start = startH * 60 + (startM || 0);
                const end = endH * 60 + (endM || 0);

                // Log debug information
                console.log(`Checking ${dayOfWeek} ${date.getHours()}:${date.getMinutes()} against schedule ${startH}:${startM}-${endH}:${endM}`);

                return timeInMinutes >= start && timeInMinutes <= end;
            });
        }],

        onChange: function(selectedDates, dateStr) {
            console.log("Selected date/time:", dateStr);
        }
    });
});
