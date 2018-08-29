<?php 

require "sendgrid-php/sendgrid-php.php";

$uemail = $_POST['email'];
$name = $_POST['name'];
$mobile = $_POST['mobile-number'];
$attend = $_POST['attend'];
$message = $_POST['message'];

$body = "<html>
<body>
<p><b>Full Name:</b> $name</p>
<p><b>Mobile:</b> $mobile</p>
<p><b>Email:</b> $uemail</p>
<p><b>Response:</b> $attend</p>
<p><b>Message:</b> $message</p>
</body>
</html>";

$subject = "RSVP - $name";

$apiKey = getenv('SENDGRID_API_KEY');


$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("kokoandsani2018@gmail.com", "");
$email->setSubject($subject);
$email->addTo("kokoandsani2018@gmail.com", "");
$email->addContent("text/html", $body);

$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
?>