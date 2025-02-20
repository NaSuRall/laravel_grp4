import './bootstrap.js';

document.addEventListener("DOMContentLoaded", () => {
    if (!Array.isArray(schedules) || !Array.isArray(appointments)) {
        console.error('Schedules or Appointments data is not properly loaded');
        return;
    }

    const dateInput = document.getElementById('appointment_date');
    const hourSelect = document.getElementById('appointment_hour');

    // Map numeric day (1-7) to day name in English.
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
        // Clear previous options
        hourSelect.innerHTML = '<option value="">Sélectionnez une heure</option>';

        const selectedDate = new Date(dateInput.value);
        if (isNaN(selectedDate)) {
            console.error("Invalid date selected");
            return;
        }

        // Get the day of week from the date input
        const jsDay = selectedDate.getDay(); // 0 (Sunday) to 6 (Saturday)
        // Adjust: if Sunday (0) then use 7, otherwise use the number as is.
        const adjustedDay = (jsDay === 0 ? 7 : jsDay);
        console.log("Selected day (adjusted):", adjustedDay);

        // Convert adjusted day to day name using the mapping
        const dayName = dayNames[adjustedDay];
        console.log("Converted day name:", dayName);

        // Find the schedule for the selected day by comparing the day name
        const scheduleForDay = schedules.find(schedule => {
            console.log("Comparing schedule day:", schedule.day_of_week, "with day name:", dayName);
            return schedule.day_of_week === dayName;
        });

        if (!scheduleForDay) {
            alert("Aucun horaire disponible pour cette date.");
            return;
        }

        // Assume scheduleForDay.start_time and end_time are in "HH:mm" format.
        const [startHour] = scheduleForDay.start_time.split(':').map(Number);
        const [endHour] = scheduleForDay.end_time.split(':').map(Number);

        // Generate available hourly slots (assuming 1-hour appointments)
        let availableHours = [];
        for (let hour = startHour; hour <= endHour - 1; hour++) {
            availableHours.push(hour);
        }

        // Filter out hours already booked on the selected date.
        const selectedDateStr = dateInput.value; // format: "YYYY-MM-DD"
        const bookedHours = appointments
            .filter(appt => appt.date === selectedDateStr)
            .map(appt => parseInt(appt.hour.split(':')[0], 10));

        availableHours = availableHours.filter(hour => !bookedHours.includes(hour));
        console.log("Available hours after filtering booked ones:", availableHours);

        // Populate the select with available hours.
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
