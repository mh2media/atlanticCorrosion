<?php
$to = "m.henry@yahoo.com";
$subject = "Email from your website form.";
// define variables and set to empty values
$first_nameErr = $last_nameErr = $nameErr = $email_fromErr = $telephoneErr = $messageErr = "";
$first_name = $last_name = $email_from = $telephone = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["first_name"])) {
    $first_nameErr = "First name is required.";
  } else {
    $first_name = test_input($_POST["first_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
      $nameErr = "Only letters and white space allowed.";
    }
  }

  if (empty($_POST["last_name"])) {
    $nameErr = "Last name is required.";
  } else {
    $last_name = test_input($_POST["last_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
      $nameErr = "Only letters and white space allowed.";
    }
  }

  if (empty($_POST["email_from"])) {
    $emailErr = "Email is required.";
  } else {
    $email_from = test_input($_POST["email_from"]);
    // check if e-mail address is well-formed
    if (!filter_var($email_from, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["telephone"])) {
    $telephoneErr = "Telephone number is required.";
  } else {
    $telephone = test_input($_POST["telephone"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/",$telephone)) {
      $telephoneErr = "Only numbers allowed.";
    }
  }

  if (empty($_POST["message"])) {
    $message = "Message is required.";
  } else {
    $message = test_input($_POST["message"]);
  }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$email_message = "You got an email from the form on your website.\r\n" 
. "\r\n"
. $first_name . " " . $last_name . " sent the following information:\r\n" 
. "\r\n"
. "Name: " . $first_name . " " . $last_name . "\r\n"
. "Email: " . $email_from . "\r\n"
. "Phone: " . $telephone . "\r\n"
. "Message: " . $message;




// create email headers

$headers = "MIME-Version: 1.0" . "\r\n";

// More headers
$headers .= 'From: ' . $email . "\r\n".
'Reply-To: ' . $email_from . "\r\n";

mail($to,$subject,$email_message,$headers);

?>
 
<!-- include your own success html here -->
<?php
 
 header('Location: thank_you.php');
exit();

 ?>