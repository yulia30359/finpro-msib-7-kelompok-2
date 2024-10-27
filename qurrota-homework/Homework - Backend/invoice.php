<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adultTicket = (int)$_POST['adultTicket'];
    $childTicket = (int)$_POST['childTicket'];
    $daySelect = $_POST['daySelect'];
    $totalPrice = (int)$_POST['totalPrice'];
    $discount = (int)$_POST['discount'];
    $finalPrice = $totalPrice - $discount;

    $isWeekend = ($daySelect === 'Sabtu' || $daySelect === 'Minggu');
    
    $qrContent = "Pembayaran: Rp" . number_format($finalPrice, 0, ',', '.');
    $qrUrl = "https://api.qrserver.com/v1/create-qr-code/?data=" . urlencode($qrContent) . "&size=200x200";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pemesanan Tiket</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container my-5">
    <div class="card">
        <div class="card-header text-center">
            <h3>Invoice Pemesanan Tiket</h3>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-6 text-right">
                    <p class="mb-1">Tiket Dewasa:</p>
                </div>
                <div class="col-6 text-left">
                    <p class="mb-1"><?= $adultTicket ?> x Rp50.000 = Rp<?= number_format($adultTicket * 50000, 0, ',', '.') ?></p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 text-right">
                    <p class="mb-1">Tiket Anak-anak:</p>
                </div>
                <div class="col-6 text-left">
                    <p class="mb-1"><?= $childTicket ?> x Rp30.000 = Rp<?= number_format($childTicket * 30000, 0, ',', '.') ?></p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 text-right">
                    <p class="mb-1">Hari:</p>
                </div>
                <div class="col-6 text-left">
                    <p class="mb-1"><?= $daySelect ?></p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 text-right">
                    <p class="mb-1">Biaya Tambahan Akhir Pekan:</p>
                </div>
                <div class="col-6 text-left">
                    <p class="mb-1">Rp<?= $isWeekend ? number_format(($adultTicket + $childTicket) * 10000, 0, ',', '.') : '0' ?></p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 text-right">
                    <p class="mb-1">Total Harga:</p>
                </div>
                <div class="col-6 text-left">
                    <p class="mb-1">Rp<?= number_format($totalPrice, 0, ',', '.') ?></p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 text-right">
                    <p class="mb-1">Diskon:</p>
                </div>
                <div class="col-6 text-left">
                    <p class="mb-1">Rp<?= number_format($discount, 0, ',', '.') ?></p>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="col-6 text-right">
                    <h5><strong>Total Akhir:</strong></h5>
                </div>
                <div class="col-6 text-left">
                    <h5><strong>Rp<?= number_format($finalPrice, 0, ',', '.') ?></strong></h5>
                </div>
            </div>
            <div class="text-center mt-4">
                <img src="<?= $qrUrl ?>" alt="QR Code Pembayaran" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="text-center mt-3">
        <button onclick="window.print();" class="btn btn-primary">Cetak Invoice</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
