<?php require "includes/header.php"; ?>

<style>
    /* General section styling */
    .contact {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .contact h2 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #333;
        text-align: center;
    }

    .contact form {
        display: flex;
        flex-direction: column;
    }

    .contact label {
        margin-bottom: 8px;
        font-size: 16px;
        color: #555;
    }

    .contact input,
    .contact textarea {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-bottom: 20px;
        width: 100%;
        box-sizing: border-box;
    }

    .contact button {
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        background-color: #007bff;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
    }

    .contact button:hover {
        background-color: black;
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

<section class="contact">
    <h2>Contact Us</h2>
    <form action="contact_form.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        
        <label for="message">Message:</label>
        <textarea name="message" id="message" required></textarea>
        
        <button type="submit">Send Message</button>
    </form>
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
