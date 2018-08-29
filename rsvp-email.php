<?php 

use \SendGrid;
use \SendGrid\Mail;
require("sendgrid-php/sendgrid-php.php");

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


$from = new From($uemail, $name);
$to = new To("kokoandsani2018@gmail.com", "K&S");
$subject = new Subject($subject);
$htmlContent = new HtmlContent($body);
$email = new Mail($from,
                  $to,
                  $subject,
                  $htmlContent);

$sendgrid = new \SendGrid($apiKey);
try {
    $response = $sendgrid->send($email);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
echo $response->statusCode();
print_r($response->headers());
echo $response->body();
?>