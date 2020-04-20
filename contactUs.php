<?php
if (isset($_POST["submit"])) {
    $recipient = "your@email.address";
    $subject = "Cataclysm Contact Us Message";
    $sender = $_POST["sender"];
    $senderEmail = $_POST["senderEmail"];
    $message = $_POST["message"];

    $mailBody = "Name: $sender\nEmail: $senderEmail\n\n$message";

    mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>");

    $thankYou = "<p>Thank you! Your message has been sent.</p>";
    echo $thankYou;
}
?>


<form id="form" method="post" actions="">
    <div class="contact-form">
        <form id="contact-form" method="post" action="AboutCataclysm.html">
            <input name="sender" type="text" class="form-control" placeholder="your name" required> <br></br>
            <input name="senderEmail" type="text" class="form-control" placeholder="your email" required> <br></br>
            <textarea name="message" class="form-control" placeholder="Message" rows="3" required></textarea> <br></br>
            <input type="submit" name="submit">
        </form>
    </div>
</form>
