$(document).ready(function () {
    const warningModal = $('#warning-modal'); 
    const warningMessage = $('#warning-message'); 

    // hamburger menu
    $('#hamburger').click(function () {
        $('#mobile-menu')
            .removeClass('hidden opacity-0 pointer-events-none')
            .addClass('flex opacity-100 pointer-events-auto');
    });

    $('#close-menu').click(function () {
        $('#mobile-menu')
            .removeClass('flex opacity-100 pointer-events-auto')
            .addClass('hidden opacity-0 pointer-events-none');
    });

    $('#trailer-button').click(function () {
        $('#trailer-modal').removeClass('hidden');
    });

    $('#close-modal').click(function () {
        closeModal();
    });

    $('#cancel-button').click(function () {
        closeModal();
    });

    $('#close-warning-modal').click(function () {
        closeModal();
    });

    $('#trailer-modal').click(function (event) {
        if ($(event.target).closest('.overflow-hidden').length === 0) {
            closeModal();
        }
    });

    function closeModal() {
        $('#trailer-modal').addClass('hidden');
        $('#confirm-modal').addClass('hidden');
        $('#warning-modal').addClass('hidden');
        warningModal.addClass('hidden');
    }

    $('#order-button').click(function (event) {
        event.preventDefault();

        const totalAdult = parseInt($('#adult-input').val() || 0);
        const totalChild = parseInt($('#child-input').val() || 0);
        const selectedDate = $('input[name="date-opt"]:checked');
        const selectedTime = $('input[name="time"]:checked');

        if (totalAdult === 0 && totalChild === 0) {
            warningMessage.text('Enter the number of tickets.');
            warningModal.removeClass('hidden');
            return;
        }

        if (!selectedDate.length) {
            warningMessage.text('Select a show date.');
            warningModal.removeClass('hidden');
            return;
        }

        if (!selectedTime.length) {
            warningMessage.text('Select a show time.');
            warningModal.removeClass('hidden');
            return;
        }

        let priceAdult = 50000;
        let priceChild = 30000;

        let totalAdultPrice = totalAdult * priceAdult;
        let totalChildPrice = totalChild * priceChild;
        let totalBeforeDiscount = totalAdultPrice + totalChildPrice;

        let discountPercentage = totalBeforeDiscount > 150000 ? 10 : 0;
        let discountAmount = (totalBeforeDiscount * discountPercentage) / 100;
        let totalAfterDiscount = totalBeforeDiscount - discountAmount;

        $('#total-adult').text(totalAdult);
        $('#adult-price').text(totalAdultPrice);
        $('#total-child').text(totalChild);
        $('#child-price').text(totalChildPrice);
        $('#total-price').text(totalAfterDiscount);
        $('#total-discount').text(discountAmount);
        $('#checked-date').text(selectedDate.val());
        $('#checked-time').text(selectedTime.val());

        $('#confirm-modal').removeClass('hidden');

        $('#confirm-button').click(function () {
            $('#form-ticket').submit(); 
        });
    });
});

function changeValue(inputId, increment) {
    let input = document.getElementById(inputId);
    let currentValue = parseInt(input.value) || 0;
    let newValue = currentValue + increment;
    input.value = newValue < 0 ? 0 : newValue;
}