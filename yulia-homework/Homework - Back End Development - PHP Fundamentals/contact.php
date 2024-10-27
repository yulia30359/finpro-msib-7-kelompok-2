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
            position: relative; /* Ensures the text can overlay the image */
            overflow: hidden; /* Prevents overflow of the image */
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
                        <li class="nav-item"><a class="nav-link" href="#login">Login</a></li>
                    </ul>
                    <form class="d-flex ms-3">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <div class="contactbg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contacttitlepage">
                        <h2>Contact</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="address">
                    <!-- Notification Alert -->
                    <div class="alert alert-success notification" role="alert" id="notification" style="display: none;">
                        Message contact telah berhasil dikirim.
                    </div>
                    <form id="contactForm" onsubmit="handleFormSubmit(event)">
                        <div class="row">
                            <div class="col-sm-12">
                                <input class="contactus" placeholder="Name" type="text" name="Name" required>
                            </div>
                            <div class="col-sm-12">
                                <input class="contactus" placeholder="Phone" type="text" name="Phone" required>
                            </div>
                            <div class="col-sm-12">
                                <input class="contactus" placeholder="Email" type="email" name="Email" required>
                            </div>
                            <div class="col-sm-12">
                                <textarea class="textarea" placeholder="Message" name="Message" required></textarea>
                            </div>
                            <div class="col-sm-12">
                                <button class="send">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="copyright">
        <div class="container">
            <p>© 2024 All Rights Reserved</p>
        </div>
    </div>
    <!-- End Footer -->

    <!-- Javascript files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

    <script>
        function handleFormSubmit(event) {
            event.preventDefault(); // Prevent the form from submitting in the traditional way

            // Show the notification
            document.getElementById('notification').style.display = 'block';

            // Optionally, you can clear the form after submission
            document.getElementById('contactForm').reset();

            // Hide the notification after a few seconds
            setTimeout(function () {
                document.getElementById('notification').style.display = 'none';
            }, 3000); // Change the duration as needed
        }
    </script>
</body>

</html>
