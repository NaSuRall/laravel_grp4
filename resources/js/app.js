import './bootstrap.js';
import flatpickr from "flatpickr";
import "flatpickr/dist/themes/material_blue.css";

document.addEventListener("DOMContentLoaded", () => {
    if (typeof schedules === 'undefined' || !Array.isArray(schedules)) {
        console.error('Schedules data is not properly loaded');
        return;
    }

    flatpickr("#datepicker", {
        enableTime: true,
        minDate: "today",
        time_24hr: true,
        dateFormat: "Y-m-d H:i",
        minuteIncrement: 60,

        disable: [
            function(date) {
                const dayOfWeek = date.toLocaleDateString('en-US', { weekday: 'long' });
                return !schedules.find(s => s.day_of_week === dayOfWeek);
            }
        ],

        onReady: function(selectedDates, dateStr, instance) {
            let date = selectedDates[0] || instance.currentDateObj;
            let dayOfWeek = date.toLocaleDateString('en-US', { weekday: 'long' });
            let daySchedule = schedules.find(s => s.day_of_week === dayOfWeek);
            if(daySchedule) {
                let [endHour, endMinute] = daySchedule.end_time.split(':').map(Number);
                let adjustedEndHour = endHour - 1;
                if (adjustedEndHour < 0) adjustedEndHour = 0;
                let newEndTime = `${adjustedEndHour}:${endMinute.toString().padStart(2, '0')}`;

                instance.set('minTime', daySchedule.start_time);
                instance.set('maxTime', newEndTime);

                let [startHour, startMinute] = daySchedule.start_time.split(':').map(Number);
                if (date.getHours() < startHour) {
                    date.setHours(startHour, startMinute);
                    instance.setDate(date, false);
                }
            }
        },

        onChange: function(selectedDates, dateStr, instance) {
            if (selectedDates.length) {
                let date = selectedDates[0];
                let dayOfWeek = date.toLocaleDateString('en-US', { weekday: 'long' });
                let daySchedule = schedules.find(s => s.day_of_week === dayOfWeek);
                if(daySchedule) {
                    let [endHour, endMinute] = daySchedule.end_time.split(':').map(Number);
                    let adjustedEndHour = endHour - 1;
                    if (adjustedEndHour < 0) adjustedEndHour = 0;
                    let newEndTime = `${adjustedEndHour}:${endMinute.toString().padStart(2, '0')}`;

                    instance.set('minTime', daySchedule.start_time);
                    instance.set('maxTime', newEndTime);

                    let [startHour, startMinute] = daySchedule.start_time.split(':').map(Number);
                    let currentTime = date.getHours() * 60 + date.getMinutes();
                    let scheduleStart = startHour * 60 + startMinute;
                    let scheduleEnd = adjustedEndHour * 60 + endMinute;

                    if (currentTime < scheduleStart || currentTime > scheduleEnd) {
                        date.setHours(startHour, startMinute);
                        instance.setDate(date, true);
                    }
                }
            }
        }
    });
});
