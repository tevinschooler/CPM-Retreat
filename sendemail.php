<?php 
    require 'vendor/autoload.php';

    class SendEmail{

        public static function SendMail($to,$subject,$content){
            $key = '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';

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("tevinkschooler@gmail.com", "Tevin Schooler");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);
            //$email->addContent("text/html", $content);

            $sendgrid = new \SendGrid($key);

            try{
                $response = $sendgrid->send($email);
                return $response;
            }catch(Exception $e){
                echo 'Email exception Caught : '. $e->getMessage() ."\n";
                return false;
            }
        }
    }
?>