<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework Pembelian Tiket Bioskop Online</title>
    <link rel="stylesheet" href="./style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav class="navbar">
        <div class="nav-brand">
            <img class="logo" src="./img/WatcXXIng.png" alt="Logo-WatcXXIng">
        </div>
        <div class="location">
            <i class="fa-solid fa-location-dot text-orange-500" style="font-size: 20px; margin-right: 10px"></i>
            ECO Plaza Citra Raya
        </div>
    </nav>

    <div class="main-content">
        <!-- Gambar Film -->
        <div class="card-thumbnail">
            <img class="thumbnail" src="./img/poster-eternals.jpg" alt="poster-Eternals">
            <div class="body-card-thumbnail">
                <div class="title">Eternals</div>
                <div class="bottom-side">
                    <div class="rating"><i class="fa-solid fa-star" style="font-size: 18px; color: #FFCD29; padding-right: 5px;"></i>9.7</div>
                    <div class="tahun">2021</div>
                    <div class="duration">2h 30m</div>
                    <div class="category">Superhero</div>
                </div>
            </div>
        </div>

        <!-- Form input untuk pemesanan tiket -->
        <div class="detail-order">
            <form action="invoice.php" method="POST">
                <div class="header">Tickets:</div>
                <div class="ticket-type">
                    <div class="card-ticket-type">
                        <!-- Adult Tickets -->
                        <div class="max-w-xs mx-auto">
                            <label for="ticket_adult" class="title-ticket-type">Adult:</label>
                            <div class="relative flex items-center max-w-[8rem]">
                                <!-- Tombol Decrement -->
                                <button type="button" id="decrement-adult" class="decrement rounded-s-lg p-3 h-11 focus:outline-none">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                    </svg>
                                </button>
                                <!-- Input untuk jumlah tiket dewasa -->
                                <input type="text" id="ticket_adult" name="ticket_adult" data-input-counter-min="0" class="input-number h-11 text-center text-black text-sm block w-full py-2.5" value="0" min="0" required />
                                <!-- Tombol Increment -->
                                <button type="button" id="increment-adult" class="increment rounded-e-lg p-3 h-11 focus:outline-none">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-ticket-type">
                        <!-- Child Tickets -->
                        <div class="max-w-xs mx-auto">
                            <label for="ticket_child" class="title-ticket-type">Child:</label>
                            <div class="relative flex items-center max-w-[8rem]">
                                <!-- Tombol Decrement -->
                                <button type="button" id="decrement-child" class="decrement rounded-s-lg p-3 h-11 focus:outline-none">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                    </svg>
                                </button>
                                <!-- Input untuk jumlah tiket anak-anak -->
                                <input type="text" id="ticket_child" name="ticket_child" data-input-counter data-input-counter-min="0" class="input-number h-11 text-center text-black text-sm block w-full py-2.5" value="0" min="0" required />
                                <!-- Tombol Increment -->
                                <button type="button" id="increment-child" class="increment rounded-e-lg p-3 h-11 focus:outline-none">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header">Date:</div>
                <!-- Pemilihan Hari -->
                <div class="schedule">
                    <div class="day-card" onclick="selectDay(this, '2024-10-21')">
                        <div class="date">21<br>Mon</div>
                    </div>
                    <div class="day-card" onclick="selectDay(this, '2024-10-22')">
                        <div class="date">22<br>Tue</div>
                    </div>
                    <div class="day-card" onclick="selectDay(this, '2024-10-23')">
                        <div class="date">23<br>Wed</div>
                    </div>
                    <div class="day-card" onclick="selectDay(this, '2024-10-24')">
                        <div class="date">24<br>Thu</div>
                    </div>
                    <div class="day-card" onclick="selectDay(this, '2024-10-25')">
                        <div class="date">25<br>Fri</div>
                    </div>
                    <div class="day-card" onclick="selectDay(this, '2024-10-26')">
                        <div class="date">26<br>Sat</div>
                    </div>
                    <div class="day-card" onclick="selectDay(this, '2024-10-27')">
                        <div class="date">27<br>Sun</div>
                    </div>
                </div>
                <input type="hidden" id="selected_day" name="selected_day" value="">

                <div class="header">Time:</div>
                <!-- Pemilihan Waktu -->
                <div class="time-container">
                    <div class="time-card" onclick="selectTime(this)">13:00</div>
                    <div class="time-card" onclick="selectTime(this)">15:10</div>
                    <div class="time-card" onclick="selectTime(this)">17:15</div>
                    <div class="time-card" onclick="selectTime(this)">20:05</div>
                    <div class="time-card" onclick="selectTime(this)">22:45</div>
                </div>
                <input type="hidden" id="selected_time" name="selected_time" value="">

                <div class="button-container">
                    <!-- Tombol Checkout -->
                    <button type="submit" class="checkout-btn w-full" id="checkout-btn">
                        ORDER NOW
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Konfirmasi -->
    <div id="confirmation-modal" class="hidden fixed z-50 inset-0 overflow-y-auto">
        <div class="overlay fixed inset-0 bg-black opacity-60"></div>
        <div class="flex items-center justify-center min-h-screen">
            <div class="modal-content bg-white rounded-lg shadow-lg p-6 max-w-md w-full relative z-10">
                <h2 class="headline-modal font-bold mb-4">Apakah Pesanan Sudah Benar?</h2>
                <p id="modal-body" class="message-modal mb-4">Memesan x Adult Ticket & x Child Ticket<br>Pada hari x, Pukul x?</p>
                <div class="flex justify-center mt-6">
                    <button id="cancel-checkout" class="cancel-button text-black rounded-lg w-full py-2">Cancel</button>
                    <button id="confirm-checkout" class="confirm-button text-black rounded-lg w-full py-2 ml-2">Iya, Benar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Peringatan -->
    <div id="warning-modal" class="hidden fixed z-50 inset-0 overflow-y-auto">
        <div class="overlay fixed inset-0 bg-black opacity-60"></div>
        <div class="flex items-center justify-center min-h-screen">
            <div class="modal-content bg-white rounded-lg shadow-lg p-6 max-w-md w-full relative z-10">
                <h2 class="headline-modal font-bold mb-4">Warning!</h2>
                <p class="message-modal mb-4">Semua bagian harus terisi<br>untuk melanjutkan proses selanjutnya, ya!</p>
                <div class="flex justify-center mt-6">
                    <button id="ok-warning" class="ok-button text-black rounded-lg w-full py-2">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>