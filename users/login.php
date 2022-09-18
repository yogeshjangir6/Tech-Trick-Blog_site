<?php
ob_start();
?>
<?php
include("../include/url_users.php");

if(isset($_POST['submit'])) {

	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="SELECT * FROM users WHERE username='$username' AND password='$password' ";
	$result=mysqli_query($conn , $query);

	if($result==FALSE) {
		echo "Something wrong";
		header("location:login.php");
	}

	if(mysqli_num_rows($result) == 1) {
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		/* check user type normal user or admin */
		$detail=mysqli_fetch_assoc($result);
		$_SESSION['usertype']=$detail['usertype'];
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} else {
		?>
		<div class="alert alert-danger container" role="alert">
	  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	  <span class="sr-only">Error:</span>
	   Invalid Username or Password
		</div>
		
<?php	}
} else {
			if(!isset($_SESSION['username'])) {
			?>
			<div class="alert alert-danger" role="alert">
		  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		  <span class="sr-only">Error:</span>
		   Try Again
			</div>
			<?php
			} else {
				header("location:../index.php");
			}
}
?>
<?php
ob_flush();
?>