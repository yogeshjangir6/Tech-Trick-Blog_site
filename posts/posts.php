<?php
include("../include/url_posts.php");


 ?>

<?php

	/* CHECK if same user or email exists or not ? */
	$query="SELECT * FROM posts ORDER BY postTime DESC";
	$result=mysqli_query($conn , $query);

	if(mysqli_num_rows($result) > 0) {
		while($post=mysqli_fetch_assoc($result)) {
					$id=$post['postID'];
					$title=$post['postTitle'];
					$desc=$post['postDesc'];
					$tags=$post['postTag'];
					$author=$post['postAuthor'];
					$time=$post['postTime'];
					$shortpost=1;  

					include("../include/frame_post.php");
		}
	}

?>
