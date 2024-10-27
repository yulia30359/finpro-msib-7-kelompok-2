<?php
// Mendapatkan jenis & jumlah tiket dari request POST
$ticket_adult = isset($_POST['ticket_adult']) ? intval($_POST['ticket_adult']) : 0;
$ticket_child = isset($_POST['ticket_child']) ? intval($_POST['ticket_child']) : 0;

// Mendapatkan tanggal dan waktu dari request POST
$date_selected = isset($_POST['selected_day']) ? $_POST['selected_day'] : '';
$time_selected = isset($_POST['selected_time']) ? $_POST['selected_time'] : '';

// Deklarasi harga tiket berdasarkan jenis tiket
$price_adult = 50000; // Harga tiket dewasa
$price_child = 30000; // Harga tiket anak-anak

// Menambahkan biaya tambahan untuk tiket jika hari akhir pekan
if (!empty($date_selected)) {
    $day_of_week = date('N', strtotime($date_selected)); // N: 1 (Senin) sampai 7 (Minggu)
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

// Fungsi untuk mengonversi tanggal menjadi format "Day, Date Month Year" pada modal
function formatDate($dateString) {
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
    <title>Invoice</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav class="navbar">
        <div class="nav-brand">
            <img class="logo" src="./image/logo_bioskop.png" alt="Cinema24">
        </div>
        <div class="location">
            <i class="fa-solid fa-location-dot" style="font-size: 20px; margin-right: 10px"></i>
            Ciputra World Surabaya
        </div>
    </nav>

    <button onclick="window.location.href='index.php'" class="back-button">
        <i class="fa-solid fa-arrow-left"></i>
    </button>
    
    <div class="main-content-invoice">
        <div class="information-page">SCAN QR ini untuk pembayaran pada kasir teater.</div>
        <div class="card-ticket">
            <img class="QR" src="image/QR.png" alt="QR Code">
            <div class="decoration">
                <div class="circle top-circle"></div>
                <div class="circle bottom-circle"></div>
                <div class="line-decoration"></div>
            </div>
            <div class="content-card-ticket">
                <div class="time-container-ticket">
                    <div class="time-ticket"><?= $time_selected; ?></div>
                    <div class="date-ticket"><?= $formatted_date_selected; ?></div>
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
</body>
</html>