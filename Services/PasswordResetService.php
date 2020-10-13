<?php



class PasswordResetService
{

    public static function sendEmailReset($email, $token)
    {

        $to = $email;
        $subject = $email;
        $from = 'test@test.com';

// To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
        $headers .= 'From: ' . $from . "\r\n" .
            'Reply-To: ' . $from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

// Compose a simple HTML email message
        $message = "<a href='http://phpteam.test/password/reset/$token'> to reset password click here bro</a>";

// Sending email
        mail($to, $subject, $message, $headers);


    }

}