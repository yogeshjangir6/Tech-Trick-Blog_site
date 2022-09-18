<?php
	include_once("bootstrap_cdn.php");
?>


<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">

			<div class="panel panel-default">
				
		  		<div class="panel-heading">
		    		<h3 class="panel-title">
		    			<a href=<?php echo "post.php?id="; echo $id; ?> ><?php echo $title; ?></a>
		    		</h3>
		  		</div>

		  		
		  		<div class="panel-body">
						<?php
							echo $desc;
		    		?>
		  		</div>

		  
		  		<div class="panel-footer">
						<span class="col-sm-2">
				  			
				  			<a href=<?php echo "../users/profile.php?user="; echo $author; ?> >
										<?php echo $author?>
				  			</a>
					</span>

					<span class="col-sm-2">
							
			  			<a href=<?php echo "post.php?tags="; echo $tags; ?> >
									<?php echo $tags;?>
			  			</a>
					</span>
						

					
		  			<span class="label label-default">
							 <?php echo $time ?>
						</span>


			  			<?php
			  				$delete_post_link='../posts/delete_post.php?postid='.$id;
							if(isset($_SESSION['username']) ) {
								if($_SESSION['username']==$author || $_SESSION['usertype']=='admin') {
									echo "
									<span class='pull-right'>
									<a href='update.php?id=$id'  type=\"button\" class=\"btn btn-sm btn-default\">
										<i class=\"glyphicon glyphicon-edit\"></i>
									</a>

									<a href=$delete_post_link type=\"button\" class=\"btn btn-sm btn-default\">
										<i class=\"glyphicon glyphicon-remove\"></i>
									</a>
									</span>
									";
								}
							}
						?>
                    
<?php
 if(isset($_GET['like']))
 {
	$queryA="SELECT *
	FROM user_post , posts
	WHERE user_post.postID=posts.postID;";

	$resultA=mysqli_query($conn , $queryA);
	$likes = '';
	$id = '';
	if(mysqli_num_rows($resultA)) {
        while($post=mysqli_fetch_assoc($resultA)) {
			$likes = $post['postLikes'];
			$id = $post['postID'];
        }
      }
	$likes++;

	$queryA = "UPDATE user_post set postLikes=$likes where postID=$id";
	$resultB=mysqli_query($conn , $query);
	if($resultB)
	{
		echo "<b>Total likes ".$likes."</b>";
	}
 }
?>

                  <span>
				  <a href="?like=1" class="m-1">
				<i class="fa fa-heart" style="font-size:24px;color:red"></i> Like
				</a>
    Share
	<a href="https://www.facebook.com/sharer/sharer.php?u=techtricks.com"  class="m-1" >
<i class="fa fa-facebook-square" style="font-size:24px"></i>

	</a>
	<a href="https://twitter.com/intent/tweet?url=techtricks.com&text=" class="m-1">
		<i class="fa fa-twitter" style="font-size:24px"></i>
				</a>
				
			

				</span>
		  		</div>

			<?php
					if(isset($_REQUEST['id'])) {
							include("../posts/comments.php");
							if(isset($_SESSION['username']))
									include("../include/commentform.php");
					}
			?>


  
			</div>
		</div>

		</div>
</div>
