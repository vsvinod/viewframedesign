


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     Hey There
     <form  action="index.php" method="post">
      <input type="submit" name="submit" value="">
     </form>
       
   </body>
 </html>


<?php

    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';

        
if(isset($_POST['submit']))
{

  $name   =$_REQUEST['name'];
  $num    =$_REQUEST['num'];
  $email  =$_REQUEST['email'];
  $query  =$_REQUEST['query'];

    $mail = new PHPMailer(true);

    try { 
        $mail->isSMTP();                        // Enable verbose debug output
         $mail->Host='smtp.gmail.com';
         $mail->Port=587;
         $mail->SMTPAuth=true;
         $mail->SMTPSecure='tls';
         $mail->Username='info.viewframe@gmail.com';
         $mail->Password='vfdesign2020';
  

        $mail->setFrom('info.viewframe@gmail.com','View Frame Design');
        $mail->addAddress("info.viewframe@gmail.com");
        $mail->addReplyTo('info.viewframe@gmail.com','view Frame Design');
    
        // Content
        $mail->isHTML(true);           
        $mail->Subject = $name . '\'s Enquiry';
        $mail->Body    = 'Name:- ' . $name . ' <br> Mobile:-' . $num . ' <br>Email:- ' . $email . '<br>Query:- '. $query . '<br> <b>Thank you,</b>';
    
        $mail->send();
        echo '<script> alert(\'Thank you, We will get back to u soon\');</script>';
    } catch (Exception $e) {
        echo '<script> alert(\'Oops something went wrong..!!! <br> {$mail->ErrorInfo}\');</script>';
    }
}
        
?>