<?php
$receiving_email_address = 'alaafathalla36@gmail.com';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
  include($php_email_form);
} else {
  die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

// Optional: add phone number
$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['phonenumber'], 'Phone');
$contact->add_message($_POST['message'], 'Message', 10);

// SMTP Setup (optional - comment in and configure if needed)
/*
$contact->smtp = array(
  'host' => 'smtp.yourmailserver.com',
  'username' => 'yourusername',
  'password' => 'yourpassword',
  'port' => '587'
);
*/

echo $contact->send();
?>

