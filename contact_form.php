<?php

if (!isset($_POST['submit'])|| $_POST["submit"] != "contact") {
   echo "<h1>Error</h1>\n
      <p>Accessing this page directly is not allowed.</p>";
   exit;
}

// get the posted data
$name = $_POST["nameInput"];
$email_address = $_POST["emailInput"];
$message = $_POST["messageInput"];

$email = preg_replace("([\r\n])", "", $email);

$find = "/(content-type|bcc:|cc:)/i";
if (preg_match($find, $name) || preg_match($find, $email_address) || preg_match($find, $message)) {
   echo "<h1>Error</h1>\n
      <p>No meta/header injections, please.</p>";
   exit;
}

/*
 * //Validating in Javascript before form submit
// validate data input
// check that a name was entered
if (empty($name))
    $error = "You must enter your name.";
// check that an email address was entered
elseif (empty($email_address))
    $error = "You must enter your email address.";
// check for a valid email address
elseif (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email_address))
    $error = "You must enter a valid email address.";
// check that a message was entered
elseif (empty($message))
    $error = "You must enter a message.";

//if there is an error, send the user back to the form
if (isset($error)) {
    header("Location: index.html?e=".urlencode($error)); exit;
}*/

// write the email content
$email_content = "<p>Name: $name";
$email_content .= "<p>Email Address: $email_address";
$email_content .= "<p>Message:<p>$message";

//build headers
	$headers = 'From: RadiantGeek <katereading@radiantgeek.com>' . "\r\n" ;
   	$headers .=	'Reply-To: ' . $email_address . "\r\n" ;
   	$headers .= 'X-Mailer: PHP/' . phpversion();
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";   

// send the email
mail ("Kate Reading <katereading@radiantgeek.com>", "RadiantGeek.com Contact Message", $email_content, $headers);


// send the user back to the form
header("Location: index.html?s=".urlencode("Thank you for your message.")); exit;
?>