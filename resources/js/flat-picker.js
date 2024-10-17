import flatpickr from "flatpickr";

async function getReservedSlots() {
    const response = await fetch('http://127.0.0.1:8000/reserved-slots');
    const data = await response.json();

    const reservedSlots = data.map(slot => {
        const reservedDate = new Date(slot);
        return new Date(reservedDate.getFullYear(), reservedDate.getMonth(), reservedDate.getDate());
    });

    return reservedSlots;
}

document.addEventListener('DOMContentLoaded', async function() {
    const reservedSlots = await getReservedSlots();

    flatpickr("#appointment_date", {
        inline: true,
        dateFormat: "Y-m-d",
        minDate: "today",

        disable: [
            function(date) {
                if (date.getDay() === 0 || date.getDay() === 1) {
                    return true;
                }
                return reservedSlots.some(reservedDate => {
                    return reservedDate.getTime() === date.getTime();
                });
            }
        ]
    });
});
