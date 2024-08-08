<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoloader
require 'vendor/autoload.php';

// Check if the form is submitted
 // Set up PHPMailer
    $mail = new PHPMailer(true);

	$recaptcha_secret = '6LfqOCIqAAAAALq9GyIl702OvLWDCk7ywOhVEctt';
    $recaptcha_response = $_POST['g-recaptcha-response'];

    // Verify the reCAPTCHA response
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
    $response_keys = json_decode($response, true);

    if (intval($response_keys["success"]) !== 1) {
        // reCAPTCHA verification failed
		// header("location: contact.php?success=recaptcha");
		// exit;
        die('Please complete the reCAPTCHA');
    }

	else{
		$firstname = htmlspecialchars($_POST['firstname']);
  $lastname = htmlspecialchars($_POST['lastname']);
  $email = htmlspecialchars($_POST['email']);
  $contact = htmlspecialchars($_POST['contact']);
  $hearabout = htmlspecialchars($_POST['hearabout']);

  if($hearabout == "Others"){
	$hearabout = htmlspecialchars($_POST['others']);
  }

  $message = htmlspecialchars($_POST['message']);


  if(!$firstname || !$lastname || !$email || !$contact || !$hearabout || !$message){
	header("location: contact.php?success=false");
	exit;
  }

  try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Your SMTP server
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ez37solutions@gmail.com'; // Your SMTP username
    $mail->Password   = 'yurdvmejobmvwbai'; // Your SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
    $mail->Port       = 587; // TCP port to connect to

    // Recipients
    $mail->setFrom("$email", 'EZ37 Solutions Limited');
    $mail->addAddress('olayinkaalabi191@gmail.com', 'Olayinka'); // Add recipient's email and name

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Request From EZwebsite';
    $mail->Body    = "
	<!DOCTYPE html>
		<html>
		<head>
		<meta charset='UTF-8'>
		<title>Message from $firstname</title>
		<link rel='shortcut icon' type='image/x-icon' href='images/favicon.ico'>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		
		  <title>Message from $firstname</title>
		  <style type='text/css'>
		  body {
		   padding-top: 0 !important;
		   padding-bottom: 0 !important;
		   padding-top: 0 !important;
		   padding-bottom: 0 !important;
		   margin:0 !important;
		   width: 100% !important;
		   -webkit-text-size-adjust: 100% !important;
		   -ms-text-size-adjust: 100% !important;
		   -webkit-font-smoothing: antialiased !important;
		 }
		 .tableContent img {
		   border: 0 !important;
		   display: block !important;
		   outline: none !important;
		 }
		 a{
		  color:blue;
		}
		
		a.link1{
		color:#c56d1d;
		text-decoration:none;
		font-size:14px;
		}
		
		a.link2{
		  background:#ff9f4f;
		  color:blue;
		  font-size:15px;
		  padding:8px 12px;
		  border-radius:3px;
		  -moz-border-radius:3px;
		  -webkit-border-radius:3px;
		  text-decoration:none;
		}
		
		a.link3{
		  text-decoration:none;
		  color:blue;
		  font-size:15px;
		   background:#d611fc;
			padding:8px 12px;
			 border-radius:3px;
			 -moz-border-radius:3px;
			 -webkit-border-radius:3px;
		}
		p{
		color: black;
		font-size:14px;
		line-height:22px;
		}
		
		p.special{
		line-height:30px;
		font-size:20px;
		color:blue;
		}
		
		h2{
		  font-weight: normal;
		  margin:0;
		  color:#000000;
		  font-size:22px;
		}
		
		a.link4{
		  font-size:13px;
		  line-height:19px;
		  color:#999999;
		  text-decoration:none;
		}
		
		p, h1,ul,ol,li,div{
		  margin:0;
		  padding:0;
		}
		
		td,table{
		  vertical-align: top;
		}
		td.middle{
		  vertical-align: middle;
		}
		
		</style>
		
		<script type='colorScheme' class='swatch active'>
		{
			'name':'Default',
			'bgBody':'EAEAEA',
			'link':'ffffff',
			'color':'555555',
			'bgItem':'ffffff',
			'title':'000000'
		}
		</script>
		
		</head>
		<body paddingwidth='0' paddingheight='0' bgcolor='#d1d3d4'  style='padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;' offset='0' toppadding='0' leftpadding='0'>
		  <table width='100%' border='0' cellspacing='0' cellpadding='0' class='tableContent' align='center' bgcolor='#EAEAEA' style='font-family:helvetica, sans-serif;'>
			<!-- ================ header=============== -->
			<tr><td height='20' bgcolor='#EAEAEA'></td></tr>
			<tr>
		
			  <td align='center' class='bgBody'>
		
				<table width='600' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF'>
					<!-- ================ END header =============== -->
					<tr>
					  <td>
						<table width='600' border='0' cellspacing='0' cellpadding='0'>
						  <tr>
							<td class='movableContentContainer bgItem' align='center' > 
		
							  <div class='movableContent'>
								<table width='600' border='0' cellspacing='0' cellpadding='0'>
								  <tr>
									<td width='20'></td>
									<td align='left'>
									  <div class='contentEditableContainer contentImageEditable'>
										<div class='contentEditable' >
										  <!--<img src='https://www.ez37solutions.org/uicareerfair2023/materials/images/UICareer.jpg' alt='Career Banner' width='100%' height='100%'>-->
										  <p style='font-size:13px; color:#c56d1d; font-weight:bold;'>...</p>
										</div>
									  </div>
									</td>
								  </tr>
								</table>
							  </div>
								
			
		
							  <!--  =========================== The body ===========================  -->
							  <div class='movableContent'>
								<table width='540' border='0' cellspacing='0' cellpadding='0'>
								  <tr><td height='38'></td></tr>
								 
														 
								  <tr><td height='12'></td></tr>
								  <tr>
									<td>
									  <div class='contentEditableContainer contentTextEditable'>
										<div class='contentEditable' >
											
											<p>Hi Admin,</p><br><br>

											<p>$firstname $lastname just sent a new request via the EZ website. Below are details from the message: <br><br>

                                            Full Name: $firstname $lastname <br>
                                            Email: $email <br>
                                            Contact Number: $contact <br>
                                            How did you hear about us?: $hearabout <br>
                                            Message: $message
                                            
                                            </p>

										
										
											<p style='font-size:13px;color:#999999;font-weight:bold;'>
												EZ37Solutions Website
											</p>
											
										</div>
									  </div>
									</td>
								  </tr>
								  <tr><td height='37'></td></tr>
								  <tr><td><div style='border:1px solid #EBE3E3'></div></td></tr>
								</table>
							  </div>
							
						   <div class='movableContent'>
							  <table cellpadding='0' cellspacing='0' border='0'>
								<tr>
								  <td align='center'>
									<table width='540' border='0' cellspacing='0' cellpadding='0'>
									  <tr><td height='38'></td></tr>
									  <tr>
										<td width='454' valign='middle' class='middle'>
										  <div class='contentEditableContainer contentTextEditable'>
											<p style='font-size:12px; color:#c56d1d; font-weight:bold;'>
                                                London: EZ37 UK Ltd 71-75 Shelton Street Covent Garden London WC2H 9JQ<br>
                                                Lagos: 1st Floor, Plot 23, Water Corporation Drive Victoria Island, Lagos. <br>
                                                Ibadan: Block 3, Plot 2, Road B, Off Oba Abimbola Way, Agodi GRA, Ibadan, Oyo State. <br>
                                                Email: info@ez37solutions.org<br>
                                                Phone(Whatsapp): +234 813 089 8773, +234 809 788 1001, +44 (0) 7553 856948
                                            </p>
										  </div>
										</td>
										<td width='39'>
										  <div class='contentEditableContainer contentFacebookEditable'>
											<div class='contentEditable' >
											  <a href='https://www.facebook.com/ez37solutions'>
											  <img src='https://www.ez37solutions.org/uicareerfair2023/materials/images/facebook.png' data-default='placeholder' data-max-width='39' width='39' height='39' alt='facebook' data-customIcon='true'>
											  </a>
											</div>
										  </div>
										</td>
										<td width='8'></td>
										<td width='39'>
										  <div class='contentEditableContainer contentTwitterEditable'>
											<div class='contentEditable' >
											  <a href='https://www.twitter.com/ez37solutions'>
											  <img src='https://www.ez37solutions.org/uicareerfair2023/materials/images/twitter.png' data-default='placeholder' data-max-width='39' width='39' height='39' alt='twitter' data-customIcon='true'>
											  </a>
											</div>
										  </div>
										</td>
									  </tr>
									  <tr><td height='26'></td></tr>
									</table>
								  </td>
								</tr>
							  </table>
							</div>
		
							<div class='movableContent'>
							 <table width='600' cellpadding='0' cellspacing='0' border='0' class='bgBody'>
								<tr>
								  <td height='180' bgcolor='#EAEAEA' align='center'>
									<table width='540' border='0' cellspacing='0' cellpadding='0'>
									  
									  <tr><td height='10'></td></tr>
									  <tr>
										<td align='center' style='font-size:13px;color:#999999;'>
										  <div class='contentEditableContainer contentTextEditable'>
											<div class='contentEditable' >
											  <p style='font-size:11px; color:#999999;'>The information in this email is confidential and may be legally privileged. It is intended solely for the addressee. Access to this email by anyone else is unauthorised. If you have received this communication in error, please address with the subject heading Received in error', send to the sender, then delete the email and destroy any copies of it. If you are not the intended recipient, any disclosure, copying, distribution or any action taken or omitted to be taken in reliance on it, is prohibited and may be unlawful. Any opinions or advice contained in this email are subject to the terms and conditions expressed on EZ37 Solutions website. Opinions, conclusions and other information in this email and any attachments that do not relate to the official business of the firm are neither given nor endorsed by it. EZ37 Solutions cannot guarantee that email communications are secure or error-free, as information could be intercepted, corrupted, amended, lost, destroyed, arrive late or incomplete, or contain viruses.</p>
											</div>
										  </div>
		
										</td>
									  </tr>
											 </table>
								  </td>
								</tr>
							  </table>
							</div>
		
						</td>
					  </tr>
		
					  
		
					</table>
				  </td>
				</tr>
		
			  </table>
		
			</td>
			
			<!-- end footer-->
		
		  </table>
		
		  </body>
		  </html>
	
	";

    // Send the email
    $mail->send();
    echo 'Message has been sent successfully';
	header("location: contact.php?success=true");
	exit;
} catch (Exception $e) {
	header("location: contact.php?success=error");
	exit;
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

	}
 

?>