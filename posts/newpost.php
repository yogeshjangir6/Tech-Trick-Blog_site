<?php

include("../include/url_posts.php");

/* If not logged in then redirect to login page */
if(!isset($_SESSION['username']))
{
	header("location:../users/login.php");
}

if(isset($_POST['submit'])) {

	$postTitle=$_POST['postTitle'];
	$postDesc=$_POST['postDesc'];
	$postTag=$_POST['postTag'];
	$postAuthor=$_SESSION['username'];

	include("../db/dbconnect.php");

	/* CHECK if same user or email exists or not ? */
	$query="INSERT INTO posts_buffer (postTitle , postDesc , postTag , postAuthor)
			VALUES ('$postTitle' , '$postDesc' , '$postTag' , '$postAuthor') ";
	mysqli_query($conn , $query);
	echo "<script>alert('Your Blog post is successfully Posted, admin aprovel  pending');</script>";
		echo "<script>window.location = 'posts.php';</script>";

}
else {
	
	include("../include/frame_newpost.php");

}


?>
