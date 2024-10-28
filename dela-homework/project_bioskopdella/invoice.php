<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Invoice Pemesanan Tiket</title>
</head>
<body>
    <div class="container">
        <h1>Invoice Pemesanan Tiket</h1>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mendapatkan data dari form
            $dewasa = $_POST['dewasa'];
            $anak = $_POST['anak'];
            $tanggal = $_POST['tanggal'];

            // Harga tiket
            $hargaDewasa = 50000;
            $hargaAnak = 30000;

            // Hitung total tiket
            $total = ($dewasa * $hargaDewasa) + ($anak * $hargaAnak);

            // Cek hari untuk diskon dan tambahan biaya
            $dayOfWeek = date('N', strtotime($tanggal));
            $isWeekend = ($dayOfWeek == 6 || $dayOfWeek == 7);

            if ($total >= 130000) {
                $total *= 0.90; // Diskon 10%
            }

            if ($isWeekend) {
                $total += ($dewasa + $anak) * 10000; // Tambahan Rp. 10.000 per tiket
            }

            // Cetak invoice
            echo "<p><strong>Tiket Dewasa:</strong> $dewasa x Rp. " . number_format($hargaDewasa, 0, ',', '.') . " = Rp. " . number_format($dewasa * $hargaDewasa, 0, ',', '.') . "</p>";
            echo "<p><strong>Tiket Anak-anak:</strong> $anak x Rp. " . number_format($hargaAnak, 0, ',', '.') . " = Rp. " . number_format($anak * $hargaAnak, 0, ',', '.') . "</p>";
            echo "<p><strong>Total Sebelum Diskon:</strong> Rp. " . number_format(($dewasa * $hargaDewasa) + ($anak * $hargaAnak), 0, ',', '.') . "</p>";

            if ($total < (($dewasa * $hargaDewasa) + ($anak * $hargaAnak))) {
                echo "<p><strong>Diskon 10% diterapkan!</strong></p>";
            }

            if ($isWeekend) {
                echo "<p><strong>Biaya Tambahan Akhir Pekan:</strong> Rp. " . number_format(($dewasa + $anak) * 10000, 0, ',', '.') . "</p>";
            }

            echo "<h2>Total Pembayaran: Rp. " . number_format($total, 0, ',', '.') . "</h2>";
        } else {
            echo "<p>Data tidak valid. Silakan kembali dan coba lagi.</p>";
        }
        ?>
    </div>
</body>
</html>
