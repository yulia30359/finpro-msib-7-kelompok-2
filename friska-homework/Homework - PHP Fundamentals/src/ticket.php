<?php


$ticket_adult = isset($_POST['adult']) ? intval($_POST['adult']) : 0;
$ticket_child = isset($_POST['child']) ? intval($_POST['child']) : 0;
$date_selected = isset($_POST['date-opt']) ? $_POST['date-opt'] : '';
$time_selected = isset($_POST['time']) ? $_POST['time'] : '';
$seat_selected = isset($_POST['seats']) ? $_POST['seats'] : [];

// Deklarasi harga tiket berdasarkan jenis tiket
$price_adult = 50000; // Harga tiket dewasa
$price_child = 30000; // Harga tiket anak-anak

// Menambahkan biaya tambahan untuk tiket jika hari akhir pekan
if (!empty($date_selected)) {
    $day_of_week = date('N', strtotime($date_selected));
    if ($day_of_week == 6 || $day_of_week == 7) { // 6: Sabtu, 7: Minggu
        $price_adult += 10000; // Tambahan untuk tiket dewasa
        $price_child += 10000;  // Tambahan untuk tiket anak-anak
    }
}

// Menghitung total harga sebelum diskon
$total_before_discount = ($ticket_adult * $price_adult) + ($ticket_child * $price_child);

// Menghitung grand total harga
$discount_percentage = 0; // Deklarasi diskon default = 0%
if ($total_before_discount > 150000) {
    $discount_percentage = 10; // Memberikan Diskon 10%
}
$discount_amount = ($total_before_discount * $discount_percentage) / 100;
$total_after_discount = $total_before_discount - $discount_amount;

// Menentukan kelas CSS untuk jumlah sebelum diskon
$discount_class = $discount_percentage > 0 ? 'discounted' : '';

// Fungsi untuk mengonversi tanggal menjadi format "Day, Date Month Year"
function formatDate($dateString)
{
    $daysOfWeek = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
    $months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

    $date = new DateTime($dateString);
    $dayOfWeek = $daysOfWeek[$date->format('w')];
    $day = $date->format('d');
    $month = $months[$date->format('n') - 1];
    $year = $date->format('Y');

    return "$dayOfWeek, $day $month $year";
}

// Mengonversi tanggal yang dipilih
$formatted_date_selected = formatDate($date_selected);

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema - Your tickets</title>

    <link rel="icon" href="../public/cinema-logo.png" type="image/png">
    <link rel="stylesheet" href="../styles/input.css">
    <link rel="stylesheet" href="../styles/custom.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="relative bg-gray-900 font-sans">

    <!-- header -->
    <header>
        <!-- navbar -->
        <nav class="top-0 left-0 right-0 z-10 p-6 flex justify-between items-center">
            <a class="text-xl font-bold text-white" href="index.html">Cinema</a>
            <button class="flex px-4 py-2 justify-between items-center font-medium text-white">
                <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z" />
                </svg>
                <p class="text-white">Cinema Ciputra World</p>
            </button>
        </nav>
    </header>

    <div class="justify-center items-center">

        <div class="flex flex-col justify-center items-center">
            <div class="text-xl p-10 font-bold text-white">Scan the QR code to make payment.</div>
            <div class="w-[920px] h-[343px] bg-white rounded-xl p-10 flex flex-row relative items-center">
                <img class="QR" src="../public/qr-code.png" alt="QR Code">
                <div>
                    <div class="w-[50px] h-[50px] rounded-full absolute bg-gray-900 top-[-25px]"></div>

                    <div class="w-[50px] h-[50px] rounded-full absolute bg-gray-900 bottom-[-25px]"></div>
                    <div class="line-decoration"></div>
                </div>
                <div class="flex flex-col justify-center items-center gap-[5px]">
                    <div class="flex flex-row gap-5">
                        <div class="text-2xl font-bold"><?= $time_selected; ?></div>
                        <div class="text-2xl"><?= $formatted_date_selected; ?></div>
                    </div>
                    <div class="info-ticket-type">
                        <div class="adult-ticket">
                            Adult Tickets
                            <div class="jumlah-adult-ticket">
                                <?= $ticket_adult; ?>
                            </div>
                        </div>
                        <div class="child-ticket">
                            Child Tickets
                            <div class="jumlah-child-ticket">
                                <?= $ticket_child; ?>
                            </div>
                        </div>
                    </div>
                    <div class="jumlah-harga">
                        <div class="jumlah-before-discount <?= $discount_class; ?>">
                            IDR <?= number_format($total_before_discount, 0, ',', '.'); ?>
                        </div>
                        <div class="discount">
                            Discount <?= $discount_percentage; ?>%
                        </div>
                    </div>
                    <div class="total-harga">
                        <div class="jumlah-after-discount">
                            TOTAL: IDR <?= number_format($total_after_discount, 0, ',', '.'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" flex flex-col justify-center items-center mt-6">
            <div class="flex justify-end mt-6">
                <button onclick="window.location.href='booking.php'"
                    class="px-4 py-2 text-white bg-red-600 rounded-full flex">
                    Back
                </button>
            </div>
        </div>
</body>

</html>