<?php

/* SHOWS MOST liked POSTS */

include("../include/url_posts.php");
include("../db/dbconnect.php");



	$query="SELECT *
      FROM user_post , posts
      WHERE user_post.postID=posts.postID
      ORDER BY postLikes DESC
      ;
			";

	$result=mysqli_query($conn , $query);

  if($result==false) {
    echo "problem fetching posts";
  } else {
      if(mysqli_num_rows($result)) {
        while($post=mysqli_fetch_assoc($result)) {
          /* set variables */
          $id=$post['postID'];
          $title=$post['postTitle'];
          $desc=$post['postDesc'];
          $tags=$post['postTag'];
          $author=$post['postAuthor'];
          $time=$post['postTime'];
					 $shortpost=1;
          include('../include/frame_post.php');

        }
      }
  }

?>
