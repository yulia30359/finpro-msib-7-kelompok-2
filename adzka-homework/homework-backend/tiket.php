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
    <title>Invoice</title>
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="relative bg-violet-200">
    <nav class="flex justify-between items-center p-10">
        <svg width="180" viewBox="0 0 673 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_1113_4336)">
                <path d="M92.8398 151.7C82.3898 147.59 67.2298 98.31 75.8398 92.14C84.4398 86 135 100 138.21 109.16C142.15 120.33 103.29 155.81 92.8398 151.7Z" fill="#742BFF" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M164.07 55.19C180 65.34 189.7 85.32 191.28 111.44C192.54 132.27 188.26 154 180.12 168.12C179.93 168.48 179.73 168.8 179.53 169.12C172.18 180.46 159.24 188.87 141.06 194.12C124.2 199 107 200 95.5396 200C76.8596 200 59.6696 197.33 47.1496 192.49L46.9996 192.43C25.7496 184 13.0796 164 9.27963 132.93C9.22963 132.79 9.22963 132.65 9.22963 132.51C7.64963 116.9 7.14963 87.58 21.6496 66.69L21.8896 66.35C32.3296 51.94 49.0496 44.89 65.8896 41.71L38.2896 20.32C35.9106 18.4781 34.3608 15.7665 33.981 12.7819C33.793 11.3041 33.8979 9.80365 34.2897 8.36634C34.6815 6.92903 35.3526 5.58297 36.2646 4.40501C38.1066 2.02602 40.8181 0.476168 43.8027 0.0964068C45.2806 -0.0916318 46.781 0.0132539 48.2183 0.405075C49.6556 0.796897 51.0017 1.46798 52.1796 2.38001C52.3596 2.52001 52.5596 2.68001 52.7296 2.83001L91.7996 37.25L122.36 11.56C124.899 9.42767 128.182 8.39146 131.485 8.67933C134.788 8.96719 137.842 10.5556 139.975 13.095C142.107 15.6345 143.143 18.917 142.855 22.2204C142.567 25.5239 140.979 28.5777 138.44 30.71C138.04 31.04 137.57 31.38 137.16 31.66L121.6 41.66C138.15 44.26 153.37 48.89 163.37 54.76L164.07 55.19ZM95.5396 177.92C122.65 177.92 151.71 171.47 161 157.11C173.07 136.16 173.87 87.58 152.24 73.85C140.33 66.89 116.06 61.47 92.6596 61.47C70.5396 61.47 50.3696 66.3 40.9996 79.3C32.4396 91.63 29.3396 111.77 31.2296 130.3C33.4696 148.83 39.4996 165.75 55.1096 171.92C65.2596 175.83 80.0796 177.92 95.5396 177.92Z" fill="#742BFF" />
                <path d="M508 108.289C508 116.279 506.918 123.368 504.755 129.558C502.592 135.747 499.457 140.951 495.353 145.171C491.248 149.391 486.283 152.598 480.458 154.793C474.634 156.931 468.061 158 460.738 158C453.915 158 447.647 156.931 441.933 154.793C436.275 152.598 431.338 149.391 427.123 145.171C422.907 140.951 419.634 135.747 417.304 129.558C415.03 123.368 413.893 116.279 413.893 108.289C413.893 97.711 415.779 88.7647 419.551 81.4501C423.378 74.1355 428.814 68.5652 435.859 64.7391C442.96 60.913 451.419 59 461.238 59C470.279 59 478.323 60.913 485.368 64.7391C492.413 68.5652 497.932 74.1355 501.926 81.4501C505.975 88.7647 508 97.711 508 108.289ZM446.926 108.289C446.926 113.747 447.397 118.361 448.34 122.13C449.283 125.844 450.781 128.685 452.834 130.655C454.942 132.568 457.687 133.524 461.071 133.524C464.455 133.524 467.145 132.568 469.142 130.655C471.139 128.685 472.581 125.844 473.469 122.13C474.412 118.361 474.884 113.747 474.884 108.289C474.884 102.831 474.412 98.2737 473.469 94.6164C472.581 90.9591 471.111 88.202 469.059 86.3453C467.062 84.4885 464.344 83.5601 460.905 83.5601C455.968 83.5601 452.39 85.6419 450.171 89.8056C448.008 93.9693 446.926 100.13 446.926 108.289Z" fill="#742BFF" />
                <path d="M404.443 108.289C404.443 116.279 403.362 123.368 401.198 129.558C399.035 135.747 395.901 140.951 391.796 145.171C387.691 149.391 382.726 152.598 376.902 154.793C371.077 156.931 364.504 158 357.182 158C350.359 158 344.09 156.931 338.377 154.793C332.719 152.598 327.782 149.391 323.566 145.171C319.35 140.951 316.077 135.747 313.747 129.558C311.473 123.368 310.336 116.279 310.336 108.289C310.336 97.711 312.222 88.7647 315.994 81.4501C319.822 74.1355 325.258 68.5652 332.303 64.7391C339.403 60.913 347.862 59 357.681 59C366.723 59 374.766 60.913 381.811 64.7391C388.856 68.5652 394.375 74.1355 398.369 81.4501C402.419 88.7647 404.443 97.711 404.443 108.289ZM343.369 108.289C343.369 113.747 343.841 118.361 344.784 122.13C345.727 125.844 347.224 128.685 349.277 130.655C351.385 132.568 354.131 133.524 357.514 133.524C360.898 133.524 363.589 132.568 365.585 130.655C367.582 128.685 369.025 125.844 369.912 122.13C370.855 118.361 371.327 113.747 371.327 108.289C371.327 102.831 370.855 98.2737 369.912 94.6164C369.025 90.9591 367.555 88.202 365.502 86.3453C363.505 84.4885 360.787 83.5601 357.348 83.5601C352.411 83.5601 348.833 85.6419 346.614 89.8056C344.451 93.9693 343.369 100.13 343.369 108.289Z" fill="#742BFF" />
                <path d="M304.048 156.312H226V137.491L265.024 85.9233H228.247V60.688H302.218V81.1125L264.858 131.077H304.048V156.312Z" fill="#742BFF" />
            </g>
            <defs>
                <clipPath id="clip0_1113_4336">
                    <rect width="673" height="200" fill="white" />
                </clipPath>
            </defs>
        </svg>
        <div class="flex flex-row px-4 py-2 rounded-full border-2 border-[#742BFF] text-[#742BFF] font-medium">
            <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z" />
            </svg>

            <p>CGV Palembang Indah Mall</p>
        </div>
    </nav>
    <div class="flex flex-col justify-center items-center">
        <div class="text-xl p-10 font-bold">SCAN QR ini untuk pembayaran pada kasir teater.</div>
        <div class="w-[920px] h-[343px] bg-white rounded-xl p-10 flex flex-row relative items-center">
            <img class="QR" src="images/QR.png" alt="QR Code">
            <div>
                <div class="w-[50px] h-[50px] rounded-full absolute bg-violet-200 top-[-25px]"></div>

                <div class="w-[50px] h-[50px] rounded-full absolute bg-violet-200 bottom-[-25px]"></div>
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
                <div class="flex flex-row justify-center items-center gap-2">
                    <p>Selected Seats</p>
                    <div class="flex flex-wrap gap-2">
                        <?php foreach ($seat_selected as $seats => $value) { ?>
                            <div class="bg-violet-500 text-white px-4 py-1 rounded-xl">
                                <?= $value; ?>
                            </div>
                        <?php } ?>
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
            <button onclick="window.location.href='index.php'" class="px-4 py-2 text-white bg-violet-700 rounded-full flex">
                <svg class="w-6 h-6 mr-2 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 12H5m14 0-4 4m4-4-4-4" />
                </svg>
                Back
            </button>
        </div>
    </div>
</body>

</html>
