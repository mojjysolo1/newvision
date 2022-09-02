<?php

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\MailerInterface;

class EmailController{
public MailerInterface $mailer;
    public function __construct()
    {
         
       //custom smtp
    //    $dsn="smtp://127.0.0.1:1025";
    $transport=Transport::fromDsn($_ENV['MAILER_DSN']);
    //ends custom smtp
    $this->mailer=new Mailer($transport);
     
    }


    public function sendEmail($from_email,$to_email,$subject,$text_msg,$html_msg=''){
       
        try{
            $email=(new Email())
            ->from($from_email)
            ->to($to_email)
            ->subject($subject)
            // ->attach('hello',$_SESSION['DOCUMENT_ROOT'].'/storage/assets/DB2.xlsx')
            ->text($text_msg)
            ->html($html_msg);

            $this->mailer->send($email);

            return ParseSuccess("email sent successfully");
        }catch(Exception $e){

            return ParseError("email failed ".$e->getMessage());
        }
       
    }


}