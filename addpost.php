<?php
	session_start(); 
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

	}else{
		header("location: loginsite.php");
    	exit;
		die('salam palang!');
	}
	require('config/db.php');
	// Check for submit:
	if (isset($_POST['submit'])) {
		// Get form data:
		$title= mysqli_real_escape_string($conn, $_POST['title']);
		$author= mysqli_real_escape_string($conn, $_POST['author']);
		$brif= mysqli_real_escape_string($conn, $_POST['brif']);
		$body= mysqli_real_escape_string($conn, $_POST['body']);
		$query= "INSERT INTO posts(title, author, body, brif) VALUES ('$title', '$author', '$body', '$brif')";
		if (mysqli_query($conn, $query)) {
			header('location:' .'http://localhost/mysite/blog.php');
		} else {
			echo 'error:'.mysqli_error($conn);
		}
	}
?>
<?php include('inc/header.php'); ?>
	<div class="container">
		<div class="main_head">Add Post</div>
		<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label>Author</label>
				<input type="text" name="author" class="form-control">
			</div>
			<div class="form-group">
		        <label>Brif</label>
		        <textarea name="brif" class="form-control"></textarea>
		    </div>
			<div class="form-group">
				<label>Body</label>
				<textarea name="body" class="form-control"></textarea>
			</div>
			<input type="submit" name="submit" value="submit" class="read_btn">
		</form>
	</div>
<?php include('inc/footer.php'); ?>
