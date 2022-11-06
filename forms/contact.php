<?php
 
if(isset($_POST['email'])) {
 
    $email_to = "manavadariyakunj@gmail.com";
 
    $email_subject = $_POST['subject'];;
 
    function died($error) {
 
        echo "<h1>Whoops!</h1><h2>There appears to be something wrong with your completed form.</h2>";
 
        echo "<strong><p>The following items are not specified correctly.</p></strong><br />";
 
        echo $error."<br /><br />";
 
        echo "<p>Return to the form and try again.</p><br />";
		echo "<p><a href='index.php'>return to the homepage</a></p>";
        die();
    }
  
 
    $name = $_POST['name']; // required
 
    $email_from = $_POST['email']; // required
 
    $message = $_POST['message']; // not required
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= '<li><p>The completed e-mail address appears to be incorrect<p></li>';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= '<li><p>First name appears to be wrong</p></li>';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= '<li><p>Last name appears to be wrong</p></li>';
 
  }
 
  if(strlen($comments) < 2) {
 
    $error_message .= '<li><p>Message appears to be incorrect</p></li>';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details are given below.\n\n";
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
    $email_message .= "Name: ".clean_string($name)."\n";
 
    $email_message .= "Email Adress: ".clean_string($email_from)."\n";
 
    $email_message .= "Message: ".clean_string($message)."\n";     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
