// Fungsi untuk menambah jumlah tiket pada tombol increment
function incrementValue(inputId) {
    const inputField = document.getElementById(inputId);
    let currentValue = parseInt(inputField.value);
    if (!isNaN(currentValue)) {
        inputField.value = currentValue + 1;
    }
}

// Fungsi untuk mengurangi jumlah tiket pada tombol decrement
function decrementValue(inputId) {
    const inputField = document.getElementById(inputId);
    let currentValue = parseInt(inputField.value);
    if (!isNaN(currentValue) && currentValue > 0) {
        inputField.value = currentValue - 1;
    }
}

// Fungsi untuk memilih hari & tanggal
function selectDay(element, date) {
    const selectedDay = document.getElementById('selected_day');

    if (selectedDay.value === date) {
        selectedDay.value = '';
        element.classList.remove('selected');
        return;
    }

    selectedDay.value = date;

    const cards = document.querySelectorAll('.day-card');
    cards.forEach(card => {
        card.classList.remove('selected');
    });

    element.classList.add('selected');
}

// Fungsi untuk memilih jam/waktu nonton
function selectTime(element) {
    const selectedTime = document.getElementById('selected_time');

    if (element.classList.contains('selected')) {
        element.classList.remove('selected');
        element.style.backgroundColor = '';
        element.style.border = '2px solid black';
        selectedTime.value = '';
        return;
    }

    const timeCards = document.querySelectorAll('.time-card');
    timeCards.forEach(card => {
        card.classList.remove('selected');
        card.style.backgroundColor = '';
        card.style.border = '2px solid black';
    });

    element.classList.add('selected');
    element.style.backgroundColor = '#FFCC00';
    element.style.border = '2px solid #FFCC00';
    selectedTime.value = element.textContent.trim();
}

// Menambahkan event listener untuk tombol increment dan decrement
document.getElementById('increment-adult').addEventListener('click', function () {
    incrementValue('ticket_adult');
});

document.getElementById('decrement-adult').addEventListener('click', function () {
    decrementValue('ticket_adult');
});

document.getElementById('increment-child').addEventListener('click', function () {
    incrementValue('ticket_child');
});

document.getElementById('decrement-child').addEventListener('click', function () {
    decrementValue('ticket_child');
});

// Modal konfirmasi dan alert
document.addEventListener('DOMContentLoaded', () => {
    const checkoutBtn = document.getElementById('checkout-btn');
    const confirmationModal = document.getElementById('confirmation-modal');
    const warningModal = document.getElementById('warning-modal');
    const cancelCheckout = document.getElementById('cancel-checkout');
    const confirmCheckout = document.getElementById('confirm-checkout');
    const okWarning = document.getElementById('ok-warning');
    const modalBody = document.getElementById('modal-body');

    // Fungsi untuk mengonversi tanggal menjadi format "Day, date Month year"
    function formatDate(dateString) {
        const daysOfWeek = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        const date = new Date(dateString);
        const dayOfWeek = daysOfWeek[date.getDay()];
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear();

        return `${dayOfWeek}, ${day} ${month} ${year}`;
    }

    checkoutBtn.addEventListener('click', (e) => {
        e.preventDefault();

        const ticketAdult = document.getElementById('ticket_adult')?.value;
        const ticketChild = document.getElementById('ticket_child')?.value;
        const selectedDay = document.getElementById('selected_day')?.value;
        const selectedTime = document.getElementById('selected_time')?.value;

        if (ticketAdult === undefined || ticketChild === undefined || selectedDay === undefined || selectedTime === undefined ||
            ticketAdult === '' || ticketChild === '' || selectedDay === '' || selectedTime === '') {
            warningModal.classList.remove('hidden');
        } else {
            const formattedDate = formatDate(selectedDay);
            modalBody.innerHTML = `Memesan ${ticketAdult} Adult Ticket & ${ticketChild} Child Ticket<br>pada hari ${formattedDate}, pukul ${selectedTime}?`;
            confirmationModal.classList.remove('hidden');
        }
    });

    cancelCheckout.addEventListener('click', () => {
        confirmationModal.classList.add('hidden');
    });

    confirmCheckout.addEventListener('click', () => {
        const form = document.querySelector('form');
        form.submit();
    });

    okWarning.addEventListener('click', () => {
        warningModal.classList.add('hidden');
    });
});