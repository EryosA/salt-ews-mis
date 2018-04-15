<?php
 
/**
 * Mail class - a wrapper around PHPMailer
 */

class Mail
{

  private function __construct() {}  // disallow creating a new object of the class with new Mail()

  private function __clone() {}  // disallow cloning the class

  /**
   * Send an email
   *
   * @param string $name     Name
   * @param string $email    Email address
   * @param string $subject  Subject
   * @param string $body     Body
   * @return boolean         true if the email was sent successfully, false otherwise
   */
  public static function send($name, $email, $subject, $body)
  {
    require dirname(dirname(__FILE__)) . '/vendor/PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer();

    $mail->isSMTP();
      
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;

    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';
      
    $mail->Host = Config::SMTP_HOST;
    $mail->SMTPAuth = true;
    $mail->Username = Config::SMTP_USER;
    $mail->Password = Config::SMTP_PASS;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->From = '6yoKVg@gmail.com';
      
    $mail->setFrom('6yoKVg@gmail.com', 'SALT EWS');

    $mail->isHTML(true);
      
    //Set an alternative reply-to address
    $mail->addReplyTo('joel@sea-landtech.com', 'Joel Aguirre');

    $mail->addAddress($email, $name);
    $mail->Subject = $subject;
    $mail->Body = $body;

    if ( ! $mail->send()) {
      error_log($mail->ErrorInfo);
      return false;

    } else {
      return true;

    }
  }

}
