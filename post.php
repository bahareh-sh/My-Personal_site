<?php

	require('config/db.php');
	// Check for submit:
	if (isset($_POST['delete'])) {
		session_start(); 
		if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

		}else{
			header("location: loginsite.php");
	    	exit;
			die('salam palang!');
		}
		// Get form data:
		$delete_id= mysqli_real_escape_string($conn, $_POST['delete_id']);
		// table: posts field: title, author, brif, body
		$query= "DELETE FROM posts WHERE id= {$delete_id}";
		if (mysqli_query($conn, $query)) {
			header('location:' .'http://localhost/mysite/blog.php');
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

<div class="container post_box">
	<div class="row">
		<div class="col-md-3">
			<div class="img_blog_post img1"></div>
		</div>
		<div class="col-md-9">
			<div class="content_posts">
				<div class="head_blog">
					<a class="head_blog_link" href="file:///C:/Users/Bahar/Desktop/Work/baharsite/posts1.html">
						<?php echo $posts['title']; ?>
					</a>
				</div>
				<div class="date_blog">
					<p><?php echo $posts['created_at']; ?></p>
				</div>
				<div class="text_blog_post">
					<?php echo $posts['body'].'<br>'; ?>
				</div>
				<div class="author" style="font-style: italic; text-align: left; direction: ltr;font-size: 12px; color: #3a053d;margin-bottom: 20px;">
					<?php echo $posts['author']; ?>
				</div>
				<a class="back_btn" href="http://localhost/mysite/blog.php">Back</a>
				<?php
					if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
				?>
				<form class="pull_right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<input type="hidden" name="delete_id" value="<?php echo $posts['id']; ?>">
					<input type="submit" name="delete" value="delete" class="read_btn">
				</form>
				<a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $posts['id']; ?>" class="read_btn">Edit</a>
				<?php 
					}
			 	?>
			</div>
		</div>
	</div>
</div>
<?php include('inc/footer.php'); ?>