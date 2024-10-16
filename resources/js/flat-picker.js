import flatpickr from "flatpickr";

async function getReservedSlots() {
    const response = await fetch('http://127.0.0.1:8000/admin/reserved-slots');
    const data = await response.json();

    console.log(data);
    
    // Mapper les créneaux réservés en objets Date
    const reservedSlots = data.map(slot => {
        return {
            date: slot.appointment_date,
            startTime: slot.appointment_time,
            endTime: slot.appointment_end
        };
    });

    return reservedSlots;
}

document.addEventListener('DOMContentLoaded', async function() {
    const reservedSlots = await getReservedSlots();

    flatpickr("#appointment_date_time", {
        enableTime: true,
        inline: true,
        time_24hr: true,
        minuteIncrement: 15,
        dateFormat: "Y-m-d H:i",
        // Empêche la sélection des dates passées
        minDate: "today",
        enable: [
            function(date) {
                return (date.getDay() !== 0 && date.getDay() !== 1);
            }
        ],
        onChange: function(selectedDates, dateStr, instance) {
            const selectedDate = selectedDates[0];

            const daySlots = reservedSlots.filter(slot => {
                const slotDate = new Date(slot.date);
                return slotDate.toDateString() === selectedDate.toDateString();
            });

            // Si aucun créneau n'est réservé pour cette date, ne rien désactiver
            if (daySlots.length === 0) {
                // Réinitialisation des créneaux désactivés
                instance.set('disable', []);
                return;
            }

            const disabledTimes = daySlots.map(slot => {
                const startTime = new Date(`${slot.date}T${slot.startTime}`);
                const endTime = new Date(`${slot.date}T${slot.endTime}`);

                // Convertir les heures en minutes pour une comparaison facile
                const startMinutes = startTime.getHours() * 60 + startTime.getMinutes();
                const endMinutes = endTime.getHours() * 60 + endTime.getMinutes();

                return { from: startMinutes, to: endMinutes };
            });

            // Réinitialiser les heures désactivées dans l'instance Flatpickr
            instance.set({
                disable: [
                    function(time) {
                        const selectedMinutes = time.getHours() * 60 + time.getMinutes();
                        return disabledTimes.some(timeRange => {
                            return selectedMinutes >= timeRange.from && selectedMinutes <= timeRange.to;
                        });
                    }
                ]
            });
        }
    });
});
