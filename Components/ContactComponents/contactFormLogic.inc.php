
<?php
if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
  header("Location: ../../../../index.php");
}

define('SecurityCheck', TRUE);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  header('../../contact.php');
  $name = strip_tags(htmlspecialchars($_POST['name']));
  $email_address = strip_tags(htmlspecialchars($_POST['email']));
  $phoneNumber = strip_tags(htmlspecialchars($_POST['phoneNumber']));
  $message = strip_tags(htmlspecialchars($_POST['message']));

  // Create the email and send the message
  $to = 'email@emample.com'; // Clients email. Add your email address in between the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
  $email_subject = "Cask Divide Website Enquiry:  $name";
  $email_body = "You have received a new message from your website contact form.\n\n" . "Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone Number: $phoneNumber\n\nMessage:\n$message";
  $headers = "From: email@example.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
  $headers .= "Reply-To: $email_address";
  mail($to, $email_subject, $email_body, $headers);
  return true;
}


?>