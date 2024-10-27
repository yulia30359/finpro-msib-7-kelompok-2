<?php
$total = null;
$diskon = 0; // Deklarasi variabel diskon secara global

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jumlahTiketDewasa = (int)$_POST['jumlah_tiket_dewasa'];
    $jumlahTiketAnak = (int)$_POST['jumlah_tiket_anak'];
    $hariPemesan = $_POST['hari_pemesanan'];
    $total = hitungHarga($jumlahTiketDewasa, $jumlahTiketAnak, $hariPemesan);
}

function hitungHarga($jumlahTiketDewasa, $jumlahTiketAnak, $hariPemesan)
{
    global $diskon; // Mengakses variabel diskon global

    // Harga tiket
    $hargaTiketDewasa = 50000;
    $hargaTiketAnak = 30000;

    // Hitung total harga
    $totalHarga = ($hargaTiketDewasa * $jumlahTiketDewasa) + ($hargaTiketAnak * $jumlahTiketAnak);

    // Tambahan biaya untuk pemesanan akhir pekan
    if ($hariPemesan === 'Sabtu' || $hariPemesan === 'Minggu') {
        $totalHarga += 10000;
    }

    // Diskon jika total harga melebihi Rp150.000
    if ($totalHarga > 150000) {
        $diskon = $totalHarga * 0.1; // 10%
        $totalHarga -= $diskon;
    } else {
        $diskon = 0; // Reset diskon jika tidak memenuhi syarat
    }

    return $totalHarga;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Pemesanan Tiket Bioskop</title>
</head>

<body>
    <!-- Header Section -->
    <header class="top-0 left-0 w-full py-4 bg-secondary absolute flex shadow-xl justify-around text-primary">
        <div class="font-bold text-lg hover:text-tertiary transition duration-500 ease-in-out">
            <a href="https://www.cgv.id/" target="_blank"><i class="fa-solid fa-film mr-2"></i>CGV Cinemas</a>
        </div>
        <div class="font-bold text-lg hover:text-tertiary transition duration-500 ease-in-out">
            <a href="https://maps.app.goo.gl/2saFCpcxtuaRxtNDA" target="_blank"><i class="fa-solid fa-location-dot mr-2"></i>Fx Sudirman</a>
        </div>
    </header>

    <!-- Main Section -->
    <section class="pt-36 pb-48 bg-secondary">
        <div class="container">
            <!-- Title And Synopsis -->
            <div class="max-w-sm mx-auto text-center mb-16 px-4 md:max-w-xl">
                <h1 class="font-bold text-4xl text-primary mb-2 uppercase">Interstellar</h1>
                <p class="font-semibold text-primary text-md">Sebuah tim penjelajah antar galaksi harus melewati lubang
                    cacing dan terjebak di dimensi waktu ruang angkasa dalam upaya untuk menjamin kelangsungan hidup
                    umat manusia di planet bumi.</p>
            </div>
            <!-- Rate -->
            <div class="w-full px-4 flex flex-wrap justify-center">
                <div class=" p-4 lg:w-1/4 md:justify-center">
                    <div class="rounded-xl shadow-xl overflow-hidden">
                        <img src="dist/img/interstellar.jpg" alt="Interstellar" class="w-full">
                        <div class="flex flex-wrap justify-between px-10 py-5 bg-white font-semibold text-primary">
                            <h2 class="block text-yellow-500"><i class="fa-solid fa-star mr-2"></i>9.99</h2>
                            <h2 class="block">2014</h2>
                            <h2 class="block">2h 49m</h2>
                            <h2 class="block">Sci-Fi</h2>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-4 px-4 lg:w-1/4 md:w-1/2 rounded-xl shadow-xl bg-white">
                    <form class="flex flex-wrap px-10 py-5 font-semibold text-primary" method="POST">
                        <!-- Jumlah Tiket Dewasa -->
                        <h1 class="font-bold text-lg my-2 block w-full">Jumlah Tiket Dewasa:</h1>
                        <input type="number" name="jumlah_tiket_dewasa" min="0" value="0" required class="mb-4 p-4 border rounded w-full">

                        <!-- Jumlah Tiket Anak -->
                        <h1 class="font-bold text-lg my-2 block w-full">Jumlah Tiket Anak-anak:</h1>
                        <input type="number" name="jumlah_tiket_anak" min="0" value="0" required class="mb-4 p-4 border rounded w-full">

                        <!-- Hari Pemesanan -->
                        <h1 class="font-bold text-lg my-2 block w-full">Hari Pemesanan:</h1>
                        <select name="hari_pemesanan" required class="mb-4 px-2 py-4 border rounded-xl w-full text-center">
                            <option disabled selected>-- Pilih Hari Pemesanan --</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
                        </select>

                        <!-- Checkout -->
                        <div class="">
                            <button type="submit" class="font-bold text-primary text-md flex mt-6 py-3 px-8 mx-auto rounded-full bg-secondary hover:bg-primary hover:text-white transition duration-500 ease-in-out">
                                Checkout
                            </button>
                        </div>
                    </form>

                    <!-- Tampilkan Total Harga -->
                    <?php if ($total !== null): ?>
                        <div class="my-4 text-center py-5">
                            <h2 class="font-bold text-sm text-red-600">Total Diskon: Rp <?= number_format($diskon, 2, '.', ',') ?></h2>
                            <h2 class="font-bold text-md text-primary">Total Harga: Rp <?= number_format($total, 2, '.', ',') ?></h2>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>