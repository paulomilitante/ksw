<?php 

require "sendgrid-php/sendgrid-php.php";

$email = $_POST['email'];
$name = $_POST['name'];
$mobile = $_POST['mobile-number'];
$attend = $_POST['attend'];
$message = $_POST['message'];

$body = "<html>
<body>
<p><b>Full Name:</b> $name</p>
<p><b>Mobile:</b> $mobile</p>
<p><b>Email:</b> $email</p>
<p><b>Response:</b> $attend</p>
<p><b>Message:</b> $message</p>
</body>
</html>";

$from = new SendGrid\Email(null,"kokoandsani2018@gmail.com");
$subject = "RSVP - $name";
$to = new SendGrid\Email(null, "kokoandsani2018@gmail.com");
$content = new SendGrid\Content("text/html", $body);
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);

include("success.html");

?>