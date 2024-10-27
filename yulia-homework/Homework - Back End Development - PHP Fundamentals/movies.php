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
        .navbar {
            background-color: #333;
            padding: 1rem;
        }

        .navbar .navbar-brand img {
            width: 100px;
        }

        .navbar-nav .nav-link {
            color: #fff;
            font-weight: 500;
        }

        .navbar-nav .nav-link:hover {
            color: #ff6f61;
        }

        .banner_section {
            position: relative;
            overflow: hidden;
        }

        .banner_section .banner-main {
            height: 70vh;
            background-image: url('images/cinemabanner.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
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
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .banner_section a:hover {
            background-color: #ff4b3b;
        }

        /* Featured Movies */
        .movies-box h2 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
        }

        .movie-poster {
            text-align: center;
            margin-bottom: 20px;
            transition: transform 0.3s;
        }

        .movie-poster:hover {
            transform: scale(1.05);
        }

        .movie-poster img {
            width: 100%;
            border-radius: 8px;
            height: auto;
        }

        .movie-poster h3 {
            font-size: 1.3em;
            margin-top: 10px;
            color: #333;
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

        .footer form input,
        .footer form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: none;
            background-color: #333;
            color: #fff;
        }

        .footer form button {
            background-color: #ff6f61;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .footer form button:hover {
            background-color: #ff4b3b;
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
                        <li class="nav-item"><a class="nav-link" href="#login">Login</a></li>
                    </ul>
                    <form class="d-flex ms-3">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <!-- Basic Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie World</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .banner_section {
            position: relative;
            overflow: hidden;
        }

        .banner_section .banner-main {
            height: 70vh;
            background-image: url('images/cinemabanner.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .banner_section .text-bg {
            padding: 60px 20px;
            text-align: center;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
        }

        .banner_section a {
            padding: 10px 20px;
            background-color: #ff6f61;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .banner_section a:hover {
            background-color: #ff4b3b;
        }
    </style>
</head>

<body>
    <!-- Banner -->
    <div class="banner_section">
        <div class="banner-main">
            <div class="text-bg">
                <h1>Welcome to Movie World</h1>
                <p>Your ultimate portal to explore the world of cinema. Discover the latest releases, upcoming movies, and exclusive screenings.</p>
                <a href="https://21cineplex.com/" target="_blank">Browse Movies</a>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

<style>
        .news-box figure {
            margin: 0; /* Menghilangkan margin pada figure */
            overflow: hidden; /* Menyembunyikan bagian gambar yang lebih besar dari ukuran figure */
            height: 250px; /* Atur tinggi figure sesuai kebutuhan */
        }

        .news-box figure img {
            width: 100%; /* Mengatur lebar gambar 100% dari container */
            height: auto; /* Menjaga proporsi gambar */
            object-fit: cover; /* Memastikan gambar memenuhi area figure */
        }
    </style>
</head>
<body>

<!-- Featured Movies Section -->
<div class="Lastestnews blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Featured Movies</h2>
                    <span>Catch up on the latest blockbuster releases. Book your tickets now!</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margin">
                <div class="news-box">
                    <figure><img src="images/dor.jpg" alt="Latest Movie 1" /></figure>
                    <h3>Latest Movie 1</h3>
                    <span>October 26</span><span>0 Comments</span>
                    <p>Experience the thrill of this action-packed movie now in theaters.</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margin">
                <div class="news-box">
                    <figure><img src="images/mini.jpg" alt="Upcoming Premiere" /></figure>
                    <h3>Upcoming Premiere</h3>
                    <span>October 26</span><span>0 Comments</span>
                    <p>Don’t miss the premiere of this year’s most awaited thriller.</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margin">
                <div class="news-box">
                    <figure><img src="images/act2.jpg" alt="Exclusive Event" /></figure>
                    <h3>Exclusive Screening</h3>
                    <span>October 26</span><span>0 Comments</span>
                    <p>Join us for an exclusive movie screening with special guests.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

    <!-- Footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 width">
                        <div class="address">
                            <h3>Contact Us</h3>
                            <ul class="location_icon">
                            <li><img src="icon/1.png" alt="icon" style="vertical-align: middle;" /><span class="white-text"> Jakarta Timur, IDN</span></li>
                            <li><img src="icon/2.png" alt="icon" style="vertical-align: middle;" /><span class="white-text"> (+71 5896547)</span></li>
                            <li><img src="icon/3.png" alt="icon" style="vertical-align: middle;" /><span class="white-text"> contact@movieworld.com</span></li>
                            </ul>
                        </div>
                    </div>
                    <style>
    /* CSS to change text color to white */
    .white-text {
        color: #fff; /* White color */
    }

    .footer .address h3 {
        color: #ff6f61; /* You can keep the title color if you want */
    }
</style>

                    <div class="col-lg-3 col-md-6 col-sm-12 width">
                        <div class="address">
                            <h3>Resources</h3>
                            <ul class="Menu_footer">
                                <li><a href="movies.php">Movies</a></li>
                                <li><a href="blog.php">Blog</a></li>
                                <li><a href="contact.php">Contact</a></li>
                                <li><a href="#login">Login</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 width">
                        <div class="address">
                            <h3>Newsletter</h3>
                            <form>
                                <input type="text" name="text" placeholder="Name" required>
                                <input type="email" name="email" placeholder="Email" required>
                                <textarea name="message" placeholder="Message"></textarea>
                                <button type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>
