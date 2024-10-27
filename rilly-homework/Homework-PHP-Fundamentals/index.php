<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket Bioskop</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container">
        <h1>Pemesanan Tiket Bioskop</h1>

        <form action="" method="POST">
            <label for="jenisTiket">Jenis Tiket:</label>
            <select name="jenisTiket" id="jenisTiket" required>
                <option value="dewasa">Dewasa</option>
                <option value="anak-anak">Anak-anak</option>
            </select>

            <label for="jumlahTiket">Jumlah Tiket:</label>
            <input type="number" name="jumlahTiket" id="jumlahTiket" min="1" required>

            <label for="hariPesan">Hari Pemesanan:</label>
            <select name="hariPesan" id="hariPesan" required>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
                <option value="Minggu">Minggu</option>
            </select>

            <input type="submit" value="Pesan Tiket">
        </form>

        <?php
        // Fungsi untuk menghitung total harga tiket
        function hitungTotalHarga($jenisTiket, $jumlahTiket, $hariPesan) {
            $hargaDewasa = 50000; // Harga tiket dewasa
            $hargaAnak = 30000; // Harga tiket anak-anak
            $totalHarga = 0;

            // Menentukan harga berdasarkan jenis tiket
            if ($jenisTiket == "dewasa") {
                $totalHarga = $hargaDewasa * $jumlahTiket;
            } elseif ($jenisTiket == "anak-anak") {
                $totalHarga = $hargaAnak * $jumlahTiket;
            }

            // Tambahan biaya untuk akhir pekan (Sabtu dan Minggu)
            if ($hariPesan == "Sabtu" || $hariPesan == "Minggu") {
                $totalHarga += 10000 * $jumlahTiket;
            }

            // Diskon jika total melebihi Rp150.000
            if ($totalHarga > 150000) {
                $diskon = $totalHarga * 0.10; // Diskon 10%
                $totalHarga -= $diskon;
            }

            return $totalHarga;
        }

        // Proses form setelah submit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $jenisTiket = $_POST['jenisTiket'];
            $jumlahTiket = (int)$_POST['jumlahTiket'];
            $hariPesan = $_POST['hariPesan'];

            // Menghitung total harga
            $totalHarga = hitungTotalHarga($jenisTiket, $jumlahTiket, $hariPesan);

            // Tampilkan hasil dalam bentuk tiket
            echo "
            <div class='ticket'>
                <h2>Tiket Bioskop</h2>
                <p>Jenis Tiket: " . ucfirst($jenisTiket) . "</p>
                <p>Jumlah Tiket: " . $jumlahTiket . "</p>
                <p>Hari Pemesanan: " . $hariPesan . "</p>
                <p class='price'>Total Harga: Rp" . number_format($totalHarga, 0, ',', '.') . "</p>
            </div>";
        }
        ?>
    </div>

</body>
</html>