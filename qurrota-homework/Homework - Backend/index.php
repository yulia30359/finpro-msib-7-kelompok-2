<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket Bioskop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

    <header class="navbar py-3">
        <div class="container d-flex justify-content-center">
            <h2 class="font-bold">Pemesanan Tiket Bioskop</h2>
        </div>
    </header>

    <body>
        <section class="bg-light content ">
            <div class="container">
                <div class="row">
                    <div class="mt-5 mb-5 col-xl-6 col-lg-8 col-md-12">
                        <div class="card">
                            <img src="./img/index.jpg" alt="Poster Film" class="card-img-top img-fluid">
                            <div class="card-body pl-2">
                                <h3 class="font-bold">Doraemon The Movie: Nobita's Earth Symphony</h3>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <h4 class="text-secondary font-semi-bold">2023</h5>
                                    </div>
                                    <div class="col-xl-3">
                                        <h5 class="text-secondary">Adventure</h5>
                                    </div>
                                    <div class="col-xl-3">
                                        <h5 class="text-secondary">115 Minutes</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 mb-5 col-xl-6 col-lg-8 col-md-12">
                        <div class="card p-4">
                            <form id="ticketForm" method="POST" action="">
                                <div class="form-label">
                                    <label class="col-sm-8 mb-1 col-form-label">Tiket Dewasa (Rp50.000)</label>
                                    <div class="row">
                                        <div class="input-group">
                                            <button type="button" class="col-sm-2 btn btn-outline-secondary" onclick="changeQuantity('adult', -1)">-</button>
                                            <input type="text" class="col-sm-3 form-control text-center d-inline" id="adultTicket" name="adultTicket" value="0" readonly>
                                            <button type="button" class="col-sm-2 btn btn-outline-secondary" onclick="changeQuantity('adult', 1)">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-label">
                                    <label class="col-sm-6 mb-1 col-form-label">Tiket Anak-anak (Rp30.000)</label>
                                    <div class="input-group">
                                        <button type="button" class="col-sm-2 btn btn-outline-secondary" onclick="changeQuantity('child', -1)">-</button>
                                        <input type="text" class="col-sm-3 form-control text-center d-inline" id="childTicket" name="childTicket" value="0" readonly>
                                        <button type="button" class="col-sm-2 btn btn-outline-secondary" onclick="changeQuantity('child', 1)">+</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-6 mb-1 col-form-label">Pilih Hari</label>
                                    <div class="col-sm-12 mb-2">
                                        <select class="form-control" id="daySelect" name="daySelect">
                                            <option value="Senin">Senin</option>
                                            <option value="Selasa">Selasa</option>
                                            <option value="Rabu">Rabu</option>
                                            <option value="Kamis">Kamis</option>
                                            <option value="Jumat">Jumat</option>
                                            <option value="Sabtu">Sabtu ( + Rp 10.000)</option>
                                            <option value="Minggu">Minggu ( + Rp 10.000)</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="mt-1 col-sm-12 btn btn-primary">Pesan Tiket</button>
                            </form>

                            <?php
                            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adultTicket'], $_POST['childTicket'], $_POST['daySelect'])):
                                
                                $PRICE_ADULT = 50000;
                                $PRICE_CHILD = 30000;
                                $WEEKEND_SURCHARGE = 10000;
                                $DISCOUNT_THRESHOLD = 150000;
                                $DISCOUNT_PERCENT = 10;

                                $dayOfWeek = $_POST['daySelect'];
                                $isWeekend = ($dayOfWeek === 'Sabtu' || $dayOfWeek === 'Minggu');

                                $adultTicket = (int)$_POST['adultTicket'];
                                $childTicket = (int)$_POST['childTicket'];
                                $totalTickets = $adultTicket + $childTicket;

                                if ($totalTickets > 0 && $totalTickets <= 10) {
                                    
                                    $totalPrice = ($adultTicket * $PRICE_ADULT) + ($childTicket * $PRICE_CHILD);

                                    $surcharge = $isWeekend ? $totalTickets * $WEEKEND_SURCHARGE : 0;
                                    $totalPrice += $surcharge;

                                    $discount = 0;
                                    if ($totalPrice > $DISCOUNT_THRESHOLD) {
                                        $discount = ($totalPrice * $DISCOUNT_PERCENT) / 100;
                                    }
                                    $finalPrice = $totalPrice - $discount;
                                    ?>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            showConfirmationModal({
                                                adultTicket: <?= $adultTicket ?>,
                                                childTicket: <?= $childTicket ?>,
                                                priceAdult: <?= $PRICE_ADULT ?>,
                                                priceChild: <?= $PRICE_CHILD ?>,
                                                dayOfWeek: <?= json_encode($dayOfWeek) ?>,
                                                isWeekend: <?= json_encode($isWeekend) ?>,
                                                surcharge: <?= $surcharge ?>,
                                                totalPrice: <?= $totalPrice ?>,
                                                discount: <?= $discount ?>,
                                                finalPrice: <?= $finalPrice ?>
                                            });
                                        });
                                    </script>
                                <?php } else { ?>
                                    <div class="alert alert-warning mt-3">Jumlah tiket tidak boleh nol dan maksimal 10 tiket.</div>
                                <?php } ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>

    <div id="confirmationModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title col-10">Konfirmasi Pemesanan</h5>
                    <button type="button" class="btn-close col-2 bg-light" onclick="closeOverlay()" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body" id="modalContent"></div>
                <div class="modal-footer">
                    <form action="invoice.php" method="POST" target="_blank" id="confirmationForm">
                        <input type="hidden" name="adultTicket" id="adultTicketHidden">
                        <input type="hidden" name="childTicket" id="childTicketHidden">
                        <input type="hidden" name="daySelect" id="daySelectHidden">
                        <input type="hidden" name="totalPrice" id="totalPriceHidden">
                        <input type="hidden" name="discount" id="discountHidden">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Konfirmasi</button>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-secondary" onclick="closeOverlay()">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-2">
        <div class="container d-flex justify-content-center"><b><p>Copyright © 2024 All Right Reserved.</p></b></div>
    </footer>

    <script>
        const MAX_TICKETS = 10;

        function changeQuantity(type, delta) {
            const input = document.getElementById(type + 'Ticket');
            let value = parseInt(input.value) + delta;
            const otherValue = parseInt(document.getElementById(type === 'adult' ? 'childTicket' : 'adultTicket').value);

            if (value >= 0 && value + otherValue <= MAX_TICKETS) {
                input.value = value;
            }
        }

        function showConfirmationModal(data) {
            document.getElementById("modalContent").innerHTML = `
                <p>Tiket Dewasa: ${data.adultTicket} x Rp${data.priceAdult.toLocaleString()} = Rp${(data.adultTicket * data.priceAdult).toLocaleString()}</p>
                <p>Tiket Anak-anak: ${data.childTicket} x Rp${data.priceChild.toLocaleString()} = Rp${(data.childTicket * data.priceChild).toLocaleString()}</p>
                <p>Hari: ${data.dayOfWeek}</p>
                <p>Biaya Tambahan Akhir Pekan: Rp${data.surcharge.toLocaleString()}</p>
                <p>Total Harga: Rp${data.totalPrice.toLocaleString()}</p>
                <p>Diskon: Rp${data.discount.toLocaleString()}</p>
                <p><strong>Total Akhir: Rp${data.finalPrice.toLocaleString()}</strong></p>
            `;

            document.getElementById("adultTicketHidden").value = data.adultTicket;
            document.getElementById("childTicketHidden").value = data.childTicket;
            document.getElementById("daySelectHidden").value = data.dayOfWeek;
            document.getElementById("totalPriceHidden").value = data.totalPrice;
            document.getElementById("discountHidden").value = data.discount;

            $('#confirmationModal').modal('show');
        }

        function closeOverlay() {
            $('#confirmationModal').modal('hide');
            document.getElementById("ticketForm").reset();
        }
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
