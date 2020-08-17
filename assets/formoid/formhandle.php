<?php 
$errors = '';
$myemail = 'huddyhuddy1@gmail.com';
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email = $_POST['email']; 
$phone = $_POST['phone'];
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email))
{
    $errors .= "\n Error: Invalid email address";
}

if(empty($errors)) {
    $to = $myemail; 
    $email_subject = "New Lead";
    $email_body = "$phone\n\nYou have a new lead.";
    
    //$headers = "From: huddyhuddy1@gmail.com"; 
    $headers = 'MIME-Version: 1.0';
    $headers .= 'Content-type: text/html; charset=iso-8859-1';

    print(mail($to,$email_subject,$email_body,$headers));
    $mail=mail($to,$email_subject,$email_body,$headers);

    if ($mail) {
        print("Success");
    } else {
        print("fail");
    }
}
?>