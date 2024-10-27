let selectedSeat = [];
let totalAdult = document.getElementById("total-adult");
let totalChild = document.getElementById("total-child");
let totalSeat = document.getElementById("total-seat");
let checkedDate = document.getElementById("checked-date");
let checkedTime = document.getElementById("checked-time");
// Harga tiket anak-anak
let totalPrice = document.getElementById("total-price"); // Harga tiket anak-anak
let totalDiscount = document.getElementById("total-discount"); // Harga tiket anak-anak
let totalAdultChild = document.getElementById("total-adult-child"); // Harga tiket anak-anak
let adultPrice = document.getElementById("adult-price"); // Harga tiket anak-anak
let childPrice = document.getElementById("child-price"); // Harga tiket anak-anak

const triggerButton = document
  .getElementById("trigger-button")
  .addEventListener("click", () => {
    let price_adult = 50000; // Harga tiket dewasa
    let price_child = 30000;
    totalAdult.innerHTML = parseInt(
      document.getElementById("adult-input").value || 0
    );
    totalChild.innerHTML = parseInt(
      document.getElementById("child-input").value || 0
    );
    totalSeat.innerHTML = selectedSeat;

    if (selectedDate.getDay() == 6 || selectedDate.getDay() == 0) {
      price_adult += 10000; // Tambahan untuk tiket dewasa
      price_child += 10000; // Tambahan untuk tiket anak-anak
    }

    // Menghitung total harga sebelum diskon
    let total_before_discount =
      document.getElementById("adult-input").value * price_adult +
      document.getElementById("child-input").value * price_child;

    // Menghitung grand total harga
    let discount_percentage = 0; // Deklarasi diskon default = 0%
    if (total_before_discount > 150000) {
      discount_percentage = 10; // Memberikan Diskon 10%
    }
    let discount_amount = (total_before_discount * discount_percentage) / 100;
    let total_after_discount = total_before_discount - discount_amount;
    totalPrice.innerHTML = total_after_discount;
    totalDiscount.innerHTML = discount_amount;
    adultPrice.innerHTML =
      document.getElementById("adult-input").value * price_adult;
    childPrice.innerHTML =
      document.getElementById("child-input").value * price_child;
    totalAdultChild.innerHTML =
      parseInt(document.getElementById("adult-input").value) +
      parseInt(document.getElementById("child-input").value);
  });

function changeValue(inputId, increment) {
  let input = document.getElementById(inputId);
  let newValue = parseInt(input.value) + increment;
  input.value = newValue > 0 ? newValue : 0; // Ensure value is not negative
  updateCheckboxes();
}

function updateCheckboxes() {
  let input1 = parseInt(document.getElementById("adult-input").value) || 0;
  let input2 = parseInt(document.getElementById("child-input").value) || 0;
  let maxChecked = input1 + input2;
  let checkboxes = document.querySelectorAll('input[type="checkbox"]');
  let checkedCount = 0;
  selectedSeat = [];

  checkboxes.forEach((checkbox) => {
    if (checkbox.checked) {
      checkedCount++;
      selectedSeat.push(checkbox.value);
    }
    checkbox.disabled = false;
  });

  checkboxes.forEach((checkbox) => {
    if (!checkbox.checked && checkedCount >= maxChecked) {
      checkbox.disabled = true;
    }
  });
}

const days = [
  "Sunday",
  "Monday",
  "Tuesday",
  "Wednesday",
  "Thursday",
  "Friday",
  "Saturday",
];
const Options = {
  weekday: "long",
  month: "long",
  day: "numeric",
};

let now = new Date();
const dateSelectHeader = document.getElementById("date-header");
dateSelectHeader.innerHTML = new Intl.DateTimeFormat("en-GB", Options).format(
  now
);
let selectedDate = new Date();
const dateEl = document
  .querySelectorAll('input[name="date-opt"]')
  .forEach((radio) => {
    radio.addEventListener("click", () => {
      selectedDate = new Date(radio.value);
      const formatDate = new Intl.DateTimeFormat("en-GB", Options).format(
        selectedDate
      );
      dateSelectHeader.innerHTML = formatDate;
      checkedDate.innerHTML = formatDate;
      if (
        selectedDate.getDate() == now.getDate() &&
        selectedDate.getMonth() == now.getMonth()
      ) {
        // Same day, use current time + 30 minutes
        let checkTime = new Date(now.getTime() + 30 * 60000);
        updateRadios(checkTime);
      } else {
        updateRadios(selectedDate);
      }
    });
  });

function updateRadios(checkTime) {
  const radioButtons = document.querySelectorAll('input[name="time"]');

  radioButtons.forEach((radio) => {
    let [hour, minute] = radio.value.split(":");
    let radioTime = new Date(checkTime);
    radioTime.setHours(hour);
    radioTime.setMinutes(minute);

    if (radioTime < checkTime) {
      checkedTime.innerHTML = "";
      radio.checked = false;
      radio.disabled = true;
    } else {
      checkedTime.innerHTML = "";
      radio.checked = false;
      radio.disabled = false;
    }
  });
}

document.querySelectorAll('input[type="checkbox"]').forEach((checkbox) => {
  checkbox.addEventListener("change", updateCheckboxes);
});
document.querySelectorAll('input[name="time"]').forEach((radio) => {
  radio.addEventListener("click", () => {
    if (radio.checked) {
      checkedTime.innerHTML = radio.value;
    }
  });
});
updateCheckboxes();
