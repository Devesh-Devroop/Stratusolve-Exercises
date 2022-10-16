<?php
//include_once('/Applications/MAMP/htdocs/Stratusolve-Exercises/PostController.php');
// include ('EmailTemplate.php');
// include('/Stratusolve-Exercises/app.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
// $object = new PostController;
if(isset($_POST['reset_var'])){
	$email = $_POST['email'];
	function resetEmailValidation($email){
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            return false;
        }
        else{
            return true;
        }
	}
	$validateEmail = resetEmailValidation($email);
	//$validateEmail = $object->editEmailValidation($_POST['email']);
	if($validateEmail){
		$emailReset = $_POST['email'];
		$query = "SELECT * FROM `users` WHERE `EmailAddress` = ?;";
		$result_reset = $db->conn->prepare($query);
		$result_reset->bind_param('s',validateInput($db->conn,$emailReset));
		$result_reset->execute();
		$resetArray = $result_reset->get_result()->fetch_assoc();
		$_SESSION['access'] = TRUE;
		
		

		try {
			$mail->SMTPDebug = 2;									
			$mail->isSMTP();	
			$mail->Host	 = 'smtp.gmail.com';											
			// $mail->Host	 = 'smtp-relay.sendinblue.com';					
			$mail->SMTPAuth = true;							
			$mail->Username = 'deveshdevroop@gmail.com';		
			$mail->Password = 'tnfcxzyvwfaqquww';		
			// $mail->Password = 'HNg78Xwary0GAF65';		
			// $mail->SMTPSecure = 'ssl';					
			$mail->SMTPSecure = 'tls';		
			$mail->SMTPOptions = array(
				'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
				)
				);					
			$mail->Port	 = 587;

			$mail->setFrom('twatteradmin@gmail.com', 'Admin Twatter');		
			$mail->addAddress('deveshdevroop1@gmail.com');
			// $mail->addAddress('kcroosendaal@gmail.com');
			
			$mail->isHTML(true);								
			$mail->Subject = 'Reset Password Verification';
			
			$mail->Body = file_get_contents('EmailTemplate.php');
			// $mail->Body = '<p>Good day '.$resetArray['FirstName'].' , A request to reset your password was made. If this was not you, kindly ignore this email </p>';
			$mail->AltBody = 'Body in plain text for non-HTML mail clients';
			$mail->send();
			echo "Mail has been sent successfully!";
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}

		// echo "Message sent successfully";
		//redirect("Message sent successfully","resetPassword.php");
		return true;

	}
	else{
		// echo "You entered an invalid email";
        //redirect("You entered an invalid email","resetPassword.php");
        return false;
	}
}




// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php';

// $mail = new PHPMailer(true);

// try {
// 	$mail->SMTPDebug = 2;									
// 	$mail->isSMTP();	
//     $mail->Host	 = 'smtp.gmail.com';											
// 	// $mail->Host	 = 'smtp-relay.sendinblue.com';					
// 	$mail->SMTPAuth = true;							
// 	$mail->Username = 'deveshdevroop@gmail.com';		
//     $mail->Password = 'tnfcxzyvwfaqquww';		
// 	// $mail->Password = 'HNg78Xwary0GAF65';		
//     // $mail->SMTPSecure = 'ssl';					
// 	$mail->SMTPSecure = 'tls';		
//     $mail->SMTPOptions = array(
//         'ssl' => array(
//         'verify_peer' => false,
//         'verify_peer_name' => false,
//         'allow_self_signed' => true
//         )
//         );					
// 	$mail->Port	 = 587;

// 	$mail->setFrom('twatteradmin@gmail.com', 'Admin Twatter');		
// 	$mail->addAddress('deveshdevroop1@gmail.com');
// 	// $mail->addAddress('kcroosendaal@gmail.com');
	
// 	$mail->isHTML(true);								
// 	$mail->Subject = 'Reset Password Verification';
// 	$mail->Body = '<p>Good day, A request to reset your password was made. If this was not you, kindly ignore this email </p>';
// 	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
// 	$mail->send();
// 	echo "Mail has been sent successfully!";
// } catch (Exception $e) {
// 	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }

?>

