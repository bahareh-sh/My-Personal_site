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
		$update_id= mysqli_real_escape_string($conn, $_POST['update_id']);
		//die($_GET['update_id']);
		$title= mysqli_real_escape_string($conn, $_POST['title']);
		$author= mysqli_real_escape_string($conn, $_POST['author']);
		$brif= mysqli_real_escape_string($conn, $_POST['brif']);
		$body= mysqli_real_escape_string($conn, $_POST['body']);
		// table: posts field: title, author, brif, body
		$query= "UPDATE posts SET
			title= '$title', 
			author= '$author',
			brif= '$brif',
			body= '$body'
		    WHERE id= {$update_id}";
		if (mysqli_query($conn, $query)) {
			header('location:' .'http://localhost/mysite/blog/blog.php');
		} else {
			echo 'error:'.mysqli_error($conn);
		}
	}
	// Get the Id:
	$id= mysqli_real_escape_string($conn, $_GET['id']);
	// Creat Query:
	$query= 'SELECT * FROM posts WHERE id='.$id;
	// Get Result:
	$result= mysqli_query($conn, $query);
	// Fetch data: (result ,type of data that u want to read)
	$posts= mysqli_fetch_assoc($result);
	// Free the result:
	mysqli_free_result($result);
	// Close connection:
	mysqli_close($conn);
?>
<?php include('inc/header.php'); ?>
	<div class="container">
		<div class="main_head">Edit Post</div>
		<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control" value="<?php echo $posts['title']; ?>">
			</div>
			<div class="form-group">
				<label>Author</label>
				<input type="text" name="author" class="form-control" value="<?php echo $posts['author']; ?>">
			</div>
			<div class="form-group">
		        <label>Brif</label>
		        <textarea name="brif" class="form-control"><?php echo $posts['brif']; ?></textarea>
		    </div>
			<div class="form-group">
				<label>Body</label>
				<textarea name="body" class="form-control"><?php echo $posts['body']; ?></textarea>
			</div>
			<input type="hidden" name="update_id" value="<?php echo $posts['id']; ?>">
			<input type="submit" name="submit" value="submit" class="read_btn">
		</form>
	</div>
<?php include('inc/footer.php'); ?>
