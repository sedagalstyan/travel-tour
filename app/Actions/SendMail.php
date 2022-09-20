<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class SendMail
{
    use AsAction;

    public function handle($email, $name, $email_reply, $name_reply='', $title, $message, $message_alt='')
    {
        
        require base_path('vendor/autoload.php');
        $mail = new PHPMailer(true);

        try {
            // Email server settings
            $mail->CharSet = 'utf-8';
            $mail->isSMTP();
            $mail->Host       = env('MAIL_HOST');
            $mail->SMTPAuth   = true;
            $mail->Username   = env('MAIL_USERNAME');
            $mail->Password   = env('MAIL_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = env('MAIL_PORT');          

            $mail->setFrom('php.mailertester@mail.ru', env('APP_NAME'));
            $mail->addAddress($email, $name);
            $mail->addReplyTo($email_reply, $name_reply);

            if(isset($_FILES['emailAttachments'])) {
                for ($i=0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                    $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
                }
            }

            $mail->isHTML(true);
            $mail->SMTPDebug = 2;
            $mail->Subject = $title;
            $mail->Body    = $message;
            $mail->AltBody = $message_alt;

            if($mail->send()){
                session()->flash('success', 'Your message sent successfully, We\'ll contact as soon as possible!');
            }else{
                session()->flash('error', 'Error, try again');
            }

        } catch (Exception $e){
            session()->flash('error', "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
    }
}