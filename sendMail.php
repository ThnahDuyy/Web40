<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if (array_key_exists('account_id', $_FILES) and ($_POST['fullname'] != '') and ($_POST['phone'] != '') and ($_POST['email'] != ''))
{

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);

$msg = '';

/* Emgail/
/*************************/

$text_email ="<table align='center' buserName = '0' style='background-color:#EED2EE'>";
$text_email =$text_email."<tr >";
$text_email =$text_email."	<td>";
$text_email =$text_email."		<h3 style='color:#ADFF2F'>Unversity Greenwich</h3>";
$text_email =$text_email."	</td>";
$text_email =$text_email."	</tr>";
$text_email =$text_email."	";
$text_email =$text_email."	<tr style='font-size:medium'>";
$text_email =$text_email."	<td>";
$text_email =$text_email."		<p>Hello,</p>";
$text_email =$text_email."		<h4>Information is as follows:</h4>";
$text_email =$text_email."	</td>";
$text_email =$text_email."	</tr>";
$text_email =$text_email."	";
$text_email =$text_email."	<tr align='center'>";
$text_email =$text_email."	<td>";
$text_email =$text_email."		<h3>Single code:<span style='color:#FF3030'> ".$_POST['fullname']."</span></h3>";
$text_email =$text_email."		<h3>Phone:<span style='color:#FF3030'> ".$_POST['phone']."</span></h3>";
$text_email =$text_email."	</td>";
$text_email =$text_email."	</tr>";
$text_email =$text_email."	";
$text_email =$text_email."	<tr style='font-size:medium'>";
$text_email =$text_email."	<td>";
$text_email =$text_email."		<p>The company wishes you a good and happy day!</p>";
$text_email =$text_email."	</td>";
$text_email =$text_email."	</tr>";
$text_email =$text_email."	";
$text_email =$text_email."	<tr align='center'>";
$text_email =$text_email."	<td>";
$text_email =$text_email."		<p style='color:#ADFF2F'>Online mailbox</p>";
$text_email =$text_email."		<p style='color:#0000FF'>are@edu.vn</p>";
$text_email =$text_email."		<p></p>";
$text_email =$text_email."	</td>";
$text_email =$text_email."	</tr>";
$text_email =$text_email."	</table>";



try {
    //Server settings
    $mail->SMTPDebug = 2;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Mailer = "smtp";                                            // Send using SMTP

/**** CHỈNH SỬA CẤU HÌNH CHO EMAIL GỬI ĐI *****************************************************************************/
/**** CHỈNH SỬA CẤU HÌNH CHO EMAIL GỬI ĐI *****************************************************************************/

    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	//$mail->SMTPSecure = 'tls';
    $mail->Username   = 'duyntgcc19153@fpt.edu.vn';                     // SMTP username
    $mail->Password   = 'ljzptnjkasbalblg';                // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged   PHPMailer::ENCRYPTION_STARTTLS
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
	$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

 /***THIẾT LẬP THÔNG TIN GỬI ĐI *****************************/
 /********************************/

    $mail->setFrom('duyntgcc19153@fpt.edu.vn', 'Mailer');
    $mail->addAddress($_POST['email']);
    //$mail->addAddress('');
    $mail->CharSet = "UTF-8";
    //$mail->addReplyTo('info@example.com', 'Information');
   // $mail->addCC('cc@example.com');
    //$mail->addBCC('DIA_CHI_EMAIL_GUI_BCC');


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML

/*******NỘI DUNG EMAIL********************************/
    $mail->Subject = 'TIEU_DE_EMAIL_CAN_GUI';
    $mail->Body    = $text_email;
    $mail->AltBody = 'ALT_TIEU_DE_EMAIL';


	//Attach multiple files one by one
    for ($ct = 0; $ct < count($_FILES['account_id']['tmp_name']); $ct++)
	{
        $uploadfile = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['account_id']['name'][$ct]));
        $filename = $_FILES['account_id']['name'][$ct];
        if (move_uploaded_file($_FILES['account_id']['tmp_name'][$ct], $uploadfile))
		{
            $mail->addAttachment($uploadfile, $filename);
        } else
		{
            $msg .= 'Failed to move file to ' . $uploadfile;
        }
    }
    //Tạm thời không send
	$mail->send();


    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



}
else
{
	echo "";
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>PHPMailer Upload</title>
</head>
<body>
<?php if (empty($msg)) { ?>
    <form method="post" enctype="multipart/form-data">

		<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
        <input name="account_id[]" type="file" multiple="multiple">

        <input type="text" name='fullname' placeholder="Enter ID">
        <input type="text" name= 'phone' placeholder="Enter phone">

        <input type="email" name= 'email' placeholder="Enter email ">

		<input type="submit" value="Send mail">
    </form>
<?php }
	else
	{
    echo $msg;
	}
?>
</body>
</html>

