<?php

include("../include/url_posts.php");


	if(isset($_REQUEST['id'])) {
		$id=$_REQUEST['id'];

		$query="SELECT * FROM posts WHERE postID='$id'";
		$result=mysqli_query($conn , $query);

		if($post=mysqli_fetch_assoc($result)) {
				$id=$post['postID'];
				$title=$post['postTitle'];
				$desc=$post['postDesc'];
				$tags=$post['postTag'];
				$author=$post['postAuthor'];
				$time=$post['postTime'];
				$shortpost=0;
				

				include("../include/frame_post.php");
		}
	}

		
	if(isset($_REQUEST['tags'])) {
		$tag=$_REQUEST['tags'];

		$query="SELECT * FROM posts WHERE postTag='$tag'";
		$result=mysqli_query($conn , $query);

		if(mysqli_num_rows($result) > 0) {
			while($post=mysqli_fetch_assoc($result)) {
				$id=$post['postID'];
				$title=$post['postTitle'];
				$desc=$post['postDesc'];
				$tags=$post['postTag'];
				$author=$post['postAuthor'];
				$time=$post['postTime'];


				include("../include/frame_post.php");
			}

		}

	}


if(isset($_REQUEST['user'])) {
	$user=$_REQUEST['user'];

	$query="SELECT * FROM posts WHERE postAuthor='$user'";
	$result=mysqli_query($conn , $query);

	if(mysqli_num_rows($result) > 0) {
		while($post=mysqli_fetch_assoc($result)) {
			$id=$post['postID'];
			$title=$post['postTitle'];
			$desc=$post['postDesc'];
			$tags=$post['postTag'];
			$author=$post['postAuthor'];
			$time=$post['postTime'];
			$shortpost=0;  

			include("../include/frame_post.php");
		}

	}

}

?>
