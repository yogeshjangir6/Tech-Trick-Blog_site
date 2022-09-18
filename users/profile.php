<?php
include("../include/url_users.php");

if(!isset($_REQUEST['user'])) {
	header('Location:../index.php');
} else {
	$user=$_REQUEST['user'];
}

/* fetch user detail */
$query="SELECT *
		FROM users
		WHERE username='$user'
		";

$result=mysqli_query($conn , $query );

if($result) {
	if(mysqli_num_rows($result)==1) {
		while($row=mysqli_fetch_assoc($result)) {
			if($row['usertype']=='admin') {
					header("location:admin.php");
			}
			include("profile_detail.php");
		}
	}
} else {
	echo "failed";
}

?>
