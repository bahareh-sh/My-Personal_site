<?php
	require('config/db.php');
	// Creat Query:
	$query= 'SELECT * FROM posts ORDER BY created_at DESC';
	// Get Result:
	$result= mysqli_query($conn, $query);
	// Fetch data: (result ,type of data that u want to read)
	$posts= mysqli_fetch_all($result, MYSQLI_ASSOC);
	// Free the result:
	mysqli_free_result($result);
	// Close connection:
	mysqli_close($conn);
?>
<?php include('inc/header.php'); ?>
<div class="blog_img"></div>
<div class="container">
	<div class="main_head">BLOG</div>
	<?php foreach ($posts as $post) : ?>
		<div class="row">
			<div class="col-md-3">
				<div class="img_blog img1"></div>
			</div>
			<div class="col-md-9">
				<div class="content">
					<div class="head_blog">
						<a class="head_blog_link" href="http://localhost/mysite/blog/post.php?id=1">
						<?php echo $post['title']; ?>
						</a>
					</div>
					<div class="date_blog">
						<p><?php echo $post['created_at']; ?></p>
					</div>
					<div class="text_blog">
						<?php echo $post['brif'].'<br>'; ?>
					</div>
					<div class="author">
						<?php echo $post['author']; ?>
					</div>
					<a class="read_btn" href="post.php?id=<?php echo $post['id']; ?>">Read More</a>
				</div>
			</div>
		</div>
		<hr class="posts_hr">	
	<?php endforeach; ?>
</div>
<?php include('inc/footer.php'); ?>
