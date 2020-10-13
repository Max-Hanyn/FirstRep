<?php

class EmailVerifyService
{
    /**
     * @return string
     */
    public static function createToken()
    {
        $lenght = 16;
        $string = "AaBbCcDdEeFfGgHhJjKkLlMmNn1234567890UuIiOoPpQqWwEeRrTt";
        $token = substr(str_shuffle($string), 0, $lenght);
        return $token;
    }

    /**
     * @param string $email
     * @param string $token
     */
    public static function sendMailVerification($email, $token)
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
        $message = "<a href='http://phpteam.test/verify/$token'> click here bro</a>";

// Sending email
        mail($to, $subject, $message, $headers);
    }

    public static function sendEmailChange($email, $token)
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
        $message = "<a href='http://phpteam.test/email/change/$token'> to change email click here bro</a>";

// Sending email
        mail($to, $subject, $message, $headers);


    }
}