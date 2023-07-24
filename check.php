<?php 
session_start();
if(isset($_POST['submit_form']))
{ 
$name=$_POST['name']; 
$email=$_POST['email'];  
$phone=$_POST['phone'];
$subject=$_POST['subject'];
$msg=$_POST['msg']; 
$FromName="Softapay Contact Form";
$FromEmail="info@softapay.com";
$ReplyTo=$email;
$toemail="sujit.singhtek@gmail.com";
$mailsubject="Enquiry From Softapay Website by $name"; 
$message='Name :- '.$name.'
Email :- ' .$email.'
Phone No :- '.$phone.'
subject:-'.$subject.'
Message :- '.$msg;
$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: ".$FromName." <".$FromEmail.">\n";
$headers .= "Reply-To: ".$ReplyTo."\n";
$headers .= "X-Sender: <".$FromEmail.">\n";
$headers .= "X-Mailer: PHP\n";
$headers .= "X-Priority: 1\n";
$headers .= "Return-Path: <".$FromEmail.">\n";
if(mail($toemail, $mailsubject, $message, $headers,'-f'.$FromEmail)){
     $_SESSION["mail_sent"]="yes";
    //  header('location:contact.php');
      echo "<script type ='text/JavaScript'>"; echo "alert('Your Mail is successfully sent')";
    echo "</script>"; 
 echo("<script>window.location = 'index.html';</script>");
    }
    else{
    $_SESSION["mail_sent"]="fail";header('location:contact.php');
          echo "<script type ='text/JavaScript'>"; echo "alert('Volla ! Mail is unsuccessfully sent')";

    }

}
?>
