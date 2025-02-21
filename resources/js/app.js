import './bootstrap.js';

document.addEventListener("DOMContentLoaded", () => {
    if (!Array.isArray(schedules) || !Array.isArray(appointments)) {
        console.error('Schedules or Appointments data is not properly loaded');
        return;
    }

    const dateInput = document.getElementById('appointment_date');
    const hourSelect = document.getElementById('appointment_hour');

    const dayNames = {
        1: 'Monday',
        2: 'Tuesday',
        3: 'Wednesday',
        4: 'Thursday',
        5: 'Friday',
        6: 'Saturday',
        7: 'Sunday'
    };

    dateInput.addEventListener('change', () => {
        hourSelect.innerHTML = '<option value="">Sélectionnez une heure</option>';

        const selectedDate = new Date(dateInput.value);
        if (isNaN(selectedDate)) {
            console.error("Invalid date selected");
            return;
        }

        const jsDay = selectedDate.getDay();
        const adjustedDay = (jsDay === 0 ? 7 : jsDay);
        console.log("Selected day (adjusted):", adjustedDay);

        const dayName = dayNames[adjustedDay];
        console.log("Converted day name:", dayName);

        const scheduleForDay = schedules.find(schedule => {
            console.log("Comparing schedule day:", schedule.day_of_week, "with day name:", dayName);
            return schedule.day_of_week === dayName;
        });

        if (!scheduleForDay) {
            alert("Aucun horaire disponible pour cette date.");
            return;
        }

        const [startHour] = scheduleForDay.start_time.split(':').map(Number);
        const [endHour] = scheduleForDay.end_time.split(':').map(Number);

        let availableHours = [];
        for (let hour = startHour; hour <= endHour - 1; hour++) {
            availableHours.push(hour);
        }

        const selectedDateStr = dateInput.value;
        const bookedHours = appointments
            .filter(appt => appt.date === selectedDateStr)
            .map(appt => parseInt(appt.hour.split(':')[0], 10));

        availableHours = availableHours.filter(hour => !bookedHours.includes(hour));
        console.log("Available hours after filtering booked ones:", availableHours);

        if (availableHours.length === 0) {
            const option = document.createElement('option');
            option.value = "";
            option.text = "Aucune heure disponible";
            hourSelect.appendChild(option);
        } else {
            availableHours.forEach(hour => {
                const option = document.createElement('option');
                // Format hour as "HH:00"
                const hourStr = ('0' + hour).slice(-2) + ":00";
                option.value = hourStr;
                option.text = hourStr;
                hourSelect.appendChild(option);
            });
        }
    });
});
