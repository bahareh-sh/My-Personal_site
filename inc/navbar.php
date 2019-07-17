<?php
	@session_start(); 
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
?>
<div class="login_bar_box">
	<div class="login_bar_text">Welcome <b>Bahar</b>
	</div>
	<div class="logout_bar_btn">
		<a href="logout.php">Logout</a>
	</div>
</div>
<?php 
}
 ?>
<nav class="navbar navbar-default">
  		<div class="container-fluid">
    		<div class="navbar-header">
	      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
		      	</button>
	     		<a class="navbar-brand" href="http://localhost/mysite/index.php">BAHAREH <strong>SHAFI</strong></a>
    		</div>
	    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      		<ul class="nav navbar-nav">
			        <li class="nav-link"><a href="http://localhost/mysite/index.php">HOME</a></li>
			        <li class="nav-link"><a href="http://localhost/mysite/skill.php">SKILLS</a></li>
			        <li class="nav-link"><a href="http://localhost/mysite/contact.php">CONTACT ME</a></li>
			        <li class="nav-link"><a href="http://localhost/mysite/blog.php">BLOG</a></li>
	      		</ul>
	        <form class="navbar-form navbar-right">
	        	<div class="form-group">
	          	<input type="text" class="form-control" placeholder="Search">
	        	</div>
	        	<button type="submit" class="btn btn-default">Submit</button>
	      	</form>
	    	</div>
    	</div>
	</nav>