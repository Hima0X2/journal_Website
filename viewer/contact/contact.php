<?php include('../includes/header.php'); ?>

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

<?php include('../includes/footer.php'); ?>
