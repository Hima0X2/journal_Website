
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIJR - Journals</title>
    <style>
        /* Basic CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .hero {
            background-color: #000;
            color: #fff;
            padding: 60px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            border: 3px solid #fff;
            padding: 30px;
            background: rgba(0, 0, 0, 0.7); /* Slightly transparent background */
        }

        .hero h1 {
            font-size: 2.5em;
            margin: 0 0 20px;
        }

        .hero p {
            font-size: 1.2em;
            line-height: 1.6;
        }

        .service-grid {
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .service {
            margin-bottom: 20px;
        }

        .journals-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .journal {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .journal img {
            max-width: 150px;
            border-radius: 8px;
        }

        .journal-info {
            max-width: 600px;
        }

        .journal-info h4 {
            margin: 0 0 10px;
            font-size: 1.5em;
        }

        .journal-info p {
            margin: 5px 0;
            font-size: 1em;
        }
  /* Footer styles */
footer {
    background-color: #333;
    color: white;
    padding: 20px;
    position: relative; /* Changed from fixed */
    width: 100%;
}

footer .container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

footer .social-icons {
    display: flex;
    gap: 15px;
    align-items: center; /* Center alignment */
}

footer .social-icons a {
    color: white;
}

footer .social-icons img {
    width: 30px;
    height: 30px;
    vertical-align: middle; /* Remove bottom margin */
}

footer .contact-info {
    text-align: right;
    flex: 1;
}

footer .contact-info p {
    margin: 5px 0;
}

footer .form-inline {
    display: flex;
    align-items: center;
    justify-content: flex-end;
}

footer .form-inline .form-control {
    margin-right: 10px;
}

footer .form-inline .btn-primary {
    background-color: #007bff;
    border: none;
}

footer .form-inline .btn-primary:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>

<?php include('includes/header.php'); // Include the header ?>

<section class="hero">
    <div class="hero-content">
        <h1>Welcome to AIJR</h1>
        <p>Your Partner in Open Access Publishing</p>
        <p>AIJR is an international scholarly publisher dedicated to providing the best possible open access publishing service to the academia & research community...</p>
    </div>
</section>


<footer>
    <div class="container">
        <div class="social-icons">
            <a href="#" target="_blank"><img src="../images/facebook.png" class="icon" alt="Facebook"></a>
            <a href="#" target="_blank"><img src="../images/instagram.png" class="icon" alt="Instagram"></a>
            <a href="#" target="_blank"><img src="../images/twit.png" class="icon" alt="Twitter"></a>
            <a href="#" target="_blank"><img src="../images/linkedin.png" class="icon" alt="LinkedIn"></a>
        </div>
        <div class="contact-info">
            <p>Get in Touch</p>
            <p><i class="fa fa-map-marker"></i> Chandpur, Dhaka, Bangladesh</p>
            <p><i class="fa fa-envelope"></i> info@example.com</p>
            <p><i class="fa fa-phone"></i> +8801872879611</p>
            <form action="submit_email.php" method="POST" class="form-inline">
                <input type="email" id="email" name="email" class="form-control" placeholder="Your email...">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</footer>

</body>
</html>
