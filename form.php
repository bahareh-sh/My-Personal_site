
<?php
	// Creat Message vars:
	$msg= '';
	$msgclass= '';
	// Check for submit:
	if (filter_has_var(INPUT_POST, 'submit')) {
		// Get data form:
		$name= htmlspecialchars($_POST['name']);
		$email=htmlspecialchars($_POST['email']);
		$message= htmlspecialchars($_POST['message']);
		// Check required fields:
		if (!empty($name) && !empty($email) && !empty($message)) {
			// passed.
			// Check email:
			if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				// failed.
				$msg= 'Please use a valid email.';
				$msgclass= 'alert-danger';
			} else {
				// passed.


	 			// recipent email:
	 			// $toEmail= 'baharehshafi1991@gmail.com';
	 			// // subject:
	 			// $subject= 'MyTest: contact form'.$name;
	 			// $body= '<h1>contact form</h1>
	 			// 	<h4>Name</h4><p>'.$name'</p>
	 			// 	<h4>email</h4><p>'.$email'</p>
	 			// 	<h4>message</h4><p>'.$message'</p>
	 			// ';
	 			// // email headers:
	 			// $headers= "MINE-version: 1.0"."\r\n";
	 			// $headers .= "contact-form: text/html; charset=UTF-8"."\r\n";
	 			// // additional headers:
	 			// $headers .= "from:".$name."<".$email.">"."\r\n";
	 			// if (email($toEmail, $subject, $body, $headers)) {
	 			// 	// email sent.
	 			// 	$msg= 'Your email has been sent.';
	 			// 	$msgclass= 'alert-success';
	 			// } else {
	 			// 	// failed.
			 	// 	$msg= 'Your email has not been sent.';
			 	// 	$msgclass= 'alert-danger';
	 			// }
			}
		} else {
			// failed.
			$msg= 'Please fill in all fields.';
			$msgclass= 'alert-danger';
		}
	}
?>
<?php include('inc/header.php'); ?>
	<div class="contact_form">
		<div class="head1_contact">
			<strong>CONTACT ME</strong>
		</div>
		<div class="head2_contact" style="padding-bottom: 6px;">
			GET IN TOUCH
		</div>
		<?php if ($msg != '') : ?>
			<div class="alert <?php echo $msgclass; ?>" style="color: #3a053d; background-color: #edb0f0; margin-bottom: 8px; padding: 5px; font-size: 15px; " ><?php echo $msg; ?></div>
		<?php endif; ?>
		<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="margin-left: -80px">
			<div class="form-group">
				<label class="control-label col-sm-2" for="name">Name:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo isset($_POST['name']) ? $name : '' ; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="email">Email:</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="email" placeholder="Enter email" name="email"value="<?php echo isset($_POST['email']) ? $email : '' ; ?>" >
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="message">Text:</label>
				<div class="col-sm-10">
					<textarea class="text_area form-control" name="message" rows="5" cols="38" placeholder="Message text"><?php echo isset($_POST['message']) ? $message : '' ; ?></textarea>
				</div>
			</div>
			<div class="form-group">        
				<div class="col-sm-offset-2 col-sm-10">
					<button name="submit" type="submit" class="btn btn-default btn_send">SEND</button>
				</div>
			</div>
		</form>
	</div>
<?php include('inc/footer.php'); ?>