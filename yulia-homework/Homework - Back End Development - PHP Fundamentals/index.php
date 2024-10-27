<?php
session_start(); // Memulai session

// Misalnya, ketika pengguna berhasil login, set session:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lakukan validasi login di sini
    // Contoh, jika username dan password benar:
    $_SESSION['loggedin'] = true; // Set session jika login berhasil
    header('Location: index.php'); // Redirect ke halaman ini setelah login
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Movie World</title>
    <meta name="keywords" content="movies, cinema, film, entertainment">
    <meta name="description" content="Your portal to the world of cinema">
    <meta name="author" content="Movie World">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Favicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- Fancybox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

    <style>
        /* CSS Enhancements */
        .banner_section {
            position: relative;
            overflow: hidden; /* Prevent overflow of the image */
        }

        .banner_section .banner-main {
            height: 70vh; /* Adjust this value to increase the height of the banner */
        }

        .banner_section img {
            width: 100%; /* Full width to cover the banner */
            height: 100%; /* Full height to ensure it fills the section */
            object-fit: cover; /* Ensures the image covers the section without distortion */
        }

        .banner_section .text-bg {
            padding: 60px 20px;
            text-align: center;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
        }

        .banner_section h1 {
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .banner_section p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }

        .banner_section a {
            padding: 10px 20px;
            background-color: #ff6f61;
            color: #7a7272;
            border-radius: 5px;
            text-decoration: none;
        }

        .banner_section a:hover {
            background-color: #ff4b3b;
        }

        /* Featured Movies */
        .movies-box h2 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .movie-poster {
            text-align: center;
            margin-bottom: 20px;
        }

        .movie-poster img {
            width: 100%;
            border-radius: 8px;
            height: auto; /* Ensure the height adjusts proportionally */
        }

        .movie-poster h3 {
            font-size: 1.3em;
            margin-top: 10px;
        }

        /* Upcoming Releases */
        .upcoming-releases {
            padding: 60px 0;
            background-color: #f7f7f7;
        }

        .upcoming-releases h3 {
            font-size: 1.8em;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .upcoming-releases img {
            width: 100%; /* Ensure images are responsive */
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px; /* Spacing between images */
        }

        /* Footer */
        #footer_with_contact {
            background-color: #2a2a2a;
            color: #bfbfbf;
            padding: 40px 0;
        }

        .footer h3 {
            color: #ff6f61;
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .footer .address ul {
            list-style-type: none;
            padding: 0;
        }

        .footer .address ul li {
            margin-bottom: 10px;
        }

        .footer form input,
        .footer form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: none;
        }

        .footer form button {
            background-color: #ff6f61;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        .footer form button:hover {
            background-color: #ff4b3b;
        }

        /* Social Links */
        .social-links a {
            color: #ff6f61;
            font-size: 24px;
            margin: 0 10px;
            transition: color 0.3s;
        }

        .social-links a:hover {
            color: #ff4b3b;
        }

        /* Navbar Custom Styles */
        .navbar {
            background-color: #343a40; /* Dark background for the navbar */
        }

        .navbar .nav-link {
            color: #fff; /* White text for the links */
        }

        .navbar .nav-link:hover {
            color: #ff6f61; /* Change link color on hover */
        }

        .btn-outline-success {
            border-color: #ff6f61; /* Change border color of the search button */
            color: #ff6f61; /* Change text color */
        }

        .btn-outline-success:hover {
            background-color: #ff6f61; /* Change background color on hover */
            color: #fff; /* Change text color */
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .banner_section h1 {
                font-size: 2em; /* Smaller size for smaller screens */
            }

            .banner_section p {
                font-size: 1em; /* Adjust paragraph size */
            }

            .movie-poster h3 {
                font-size: 1.1em; /* Adjust movie title size */
            }

            .movies-box .row,
            .upcoming-releases .row {
                display: flex;
                flex-wrap: wrap; /* Allow items to wrap */
                justify-content: center; /* Center the items */
            }

            .footer .new-movies img {
                width: 100%;
                margin: 5px 0;
            }

            .upcoming-releases .row {
                flex-direction: column; /* Stack images vertically */
                text-align: center;
            }

            .navbar-nav {
                text-align: center; /* Center text on smaller screens */
            }

            .navbar-nav .nav-item {
                margin-bottom: 10px; /* Space between items */
            }
        }

        .banner_section {
            position: relative;
            overflow: hidden; /* Prevent overflow of the image */
        }

        .banner_section .banner-main {
            height: 70vh; /* Set height for the banner */
            background-image: url('images/cinemabanner.jpg'); /* Path to your background image */
            background-size: cover; /* Cover the entire section */
            background-position: center; /* Center the image */
        }

        .banner_section .text-bg {
            padding: 60px 20px;
            text-align: center;
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent background for text readability */
            color: #fff; /* White text color */
        }

        /* Logo Size Adjustment */
        .logo-size {
            width: 150px; /* Adjust this value as needed */
            height: auto;
        }
    </style>
</head>

<body class="main-layout">
    <!-- Header with Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    <img src="images/logo2.png" alt="logo" class="logo-size" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="movies.php">Movies</a></li>
                        <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                        <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </ul>
                    <form class="d-flex ms-3">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <!-- Banner Section -->
    <section class="banner_section">
        <div class="banner-main">
            <div class="text-bg">
                <h1>Welcome to Movie World</h1>
                <p>Explore the latest movies and book your tickets online!</p>
                <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#bookingModal">Book Tickets</a>
            </div>
        </div>
    </section>

    <!-- Modal for Ticket Booking -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="ticketBookingForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookingModalLabel">Book Your Tickets</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="movieSelect" class="form-label">Select Movie</label>
                            <select class="form-select" name="movieSelect" id="movieSelect" required>
                                <option value="" disabled selected>Select a movie</option>
                                <option value="Movie 1">Various – Thriller - Original Motion Picture Soundtrack</option>
                                <option value="Movie 2">Adam Driver 65</option>
                                <option value="Movie 3">Hangout</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="dateInput" class="form-label">Select Date</label>
                            <input type="date" class="form-control" name="bookingDate" id="dateInput" required>
                        </div>
                        <div class="mb-3">
                            <label for="ticketType" class="form-label">Ticket Type</label>
                            <select class="form-select" name="ticketType" id="ticketType" required>
                                <option value="" disabled selected>Select ticket type</option>
                                <option value="adult">Adult - Rp50,000</option>
                                <option value="child">Child - Rp30,000</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="ticketCount" class="form-label">Number of Tickets</label>
                            <input type="number" class="form-control" name="ticketCount" id="ticketCount" min="1" required>
                        </div>
                        <div class="total-price" id="totalPrice">Total: Rp0</div>
                        <button type="submit" class="btn btn-primary mt-3">Book Now</button>
                        <div id="successMessage" class="alert alert-success mt-3" style="display:none;">Booking successful! Enjoy your movie!</div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<!-- Featured Movies Section -->
<section class="movies-box">
        <h2>Featured Movies</h2>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 movie-poster">
                    <img src="images/thriller2.png" alt="Movie 1">
                    <h3>Various – Thriller - Original Motion Picture</h3>
                </div>
                <div class="col-lg-4 col-md-6 movie-poster">
                    <img src="images/action.avif" alt="Movie 2">
                    <h3>Adam Driver 65</h3>
                </div>
                <div class="col-lg-4 col-md-6 movie-poster">
                    <img src="images/comedi.jpg" alt="Movie 3">
                    <h3>Hangout</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Upcoming Releases Section -->
    <section class="upcoming-releases">
        <div class="container">
            <h3>Upcoming Releases</h3>
            <div class="row">
                <div class="col-md-4">
                    <img src="images/disney.jpg" alt="Upcoming Movie 1">
                </div>
                <div class="col-md-4">
                    <img src="images/mini.jpg" alt="Upcoming Movie 2">
                </div>
                <div class="col-md-4">
                    <img src="images/dor.jpg" alt="Upcoming Movie 3">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer id="footer_with_contact">
        <div class="container">
            <div class="row footer">
                <div class="col-md-4 address">
                    <h3>Contact Us</h3>
                    <ul>
                        <li>123 Cinema Lane, Movie City</li>
                        <li>Email: info@movieworld.com</li>
                        <li>Phone: +1 234 567 8900</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Newsletter</h3>
                    <form>
                        <input type="email" placeholder="Enter your email" required>
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
                <div class="col-md-4 social-links">
                    <h3>Follow Us</h3>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>
    
    <script>
    // Menggunakan PHP untuk memeriksa status login
    let isLoggedIn = <?php echo json_encode(isset($_SESSION['loggedin']) && $_SESSION['loggedin']); ?>;
    console.log("User logged in:", isLoggedIn); // Debugging line

    document.querySelector('.btn[data-bs-target="#bookingModal"]').addEventListener('click', function (event) {
        if (!isLoggedIn) {
            event.preventDefault(); // Mencegah pembukaan modal
            alert('Please log in to book tickets.'); // Pesan peringatan
            window.location.href = 'login.php'; // Mengarahkan ke halaman login
        } else {
            // Jika sudah login, buka modal untuk pemesanan tiket
            $('#bookingModal').modal('show');
        }
    });

    // Event listener untuk pengiriman formulir pemesanan tiket

    document.getElementById('ticketBookingForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Mencegah pengiriman formulir secara default

        // Mengambil nilai formulir
        const movie = document.getElementById('movieSelect').value;
        const date = document.getElementById('dateInput').value;
        const ticketType = document.getElementById('ticketType').value;
        const ticketCount = parseInt(document.getElementById('ticketCount').value);

        // Menghitung harga tiket
        let price = ticketType === 'adult' ? 50000 : 30000; // Harga tiket berdasarkan jenis

        // Menghitung apakah hari pemesanan adalah akhir pekan
        const bookingDate = new Date(date);
        const dayOfWeek = bookingDate.getDay(); // 0 (Minggu) - 6 (Sabtu)
        if (dayOfWeek === 0 || dayOfWeek === 6) { // Jika hari pemesanan adalah Sabtu atau Minggu
            price += 10000; // Tambahan biaya Rp10.000 per tiket
        }

        // Menghitung total harga sebelum diskon
        let totalPrice = price * ticketCount;

        // Menghitung diskon jika total harga melebihi Rp150.000
        if (totalPrice > 150000) {
            totalPrice *= 0.9; // Diskon 10%
        }

        // Menampilkan total harga
        document.getElementById('totalPrice').innerText = `Total: Rp${totalPrice.toLocaleString()}`; // Format dengan pemisah ribuan

        // Menampilkan pesan sukses
        document.getElementById('successMessage').style.display = 'block';

        // Mengosongkan bidang formulir
        this.reset();
    });
</script>


    <!-- Bootstrap JS and dependencies -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/fancybox.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
