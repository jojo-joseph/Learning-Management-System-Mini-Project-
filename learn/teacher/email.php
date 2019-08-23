<!-- <?php
$id=$_GET['id'];
$query=mysql_query("select * from result where rid='$id'");
while($row=mysql_fetch_array($query))
{
$a=$row[2];
}

?> -->

<?php

require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases
$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("jojojoseph1996@gmail.com", "Example User");
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("jojojoseph1196@gmail.com", "Example User");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid($apiKey = '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');
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
$result=$response->statusCode();
echo $result;
echo "fghjkjhgfcfghjkhgfcfghj   ";


?>