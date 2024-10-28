<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Pemesanan Tiket Bioskop</title>
</head>
<body>
    <div class="container">
        <h1>Pemesanan Tiket Bioskop</h1>
        <form method="post" action="invoice.php">
            <label for="dewasa">Tiket Dewasa (Rp. 50.000):</label>
            <input type="number" id="dewasa" name="dewasa" min="0" value="0" required>

            <label for="anak">Tiket Anak-anak (Rp. 30.000):</label>
            <input type="number" id="anak" name="anak" min="0" value="0" required>

            <label for="tanggal">Tanggal Pemesanan:</label>
            <input type="date" id="tanggal" name="tanggal" required>

            <button type="submit">Pesan Tiket</button>
        </form>
    </div>
</body>
</html>
