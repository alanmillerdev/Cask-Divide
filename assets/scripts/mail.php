<?php
//Define variables, check for empty fields
$errors = '';
$myemail = '';
if(empty($_POST['name'])  ||
   empty($_POST['email']) ||
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

//Pull information from the form
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
$redirect = $_POST['redirect'];

//Check if e-mail address is valid
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

//Send the e-mail
if( empty($errors))

{

$to = $myemail;
$email_subject = "Meteor@Contact: $name";
$email_body = "You have received a new message. ".

" Details:\n Name: $name \n ".

"Email: $email_address\n Message: \n $message";

$headers = "From: $myemail\n";

$headers .= "Reply-To: $email_address";

mail($to,$email_subject,$email_body,$headers);

//Notify the user of successful e-mail, redirect to home page
header("refresh:5;url=https://meteorelectronics.online/" . $redirect);
echo "Thank you for contacting us, we will get back to you shortly.";
echo "You will be redirected to the home page.";

}

 ?>
