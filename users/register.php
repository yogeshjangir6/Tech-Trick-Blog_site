<?php
include("../include/url_users.php");

if(isset($_SESSION['username'])) {
		header('Location:../index.php');
}

if(isset($_POST['submit'])) {

	$username=$_POST['username'];
	$firstname=$_POST['firstname'];
	$emailid=$_POST['emailid'];
	$password=$_POST['password'];

	echo "username is".$username;
	include("../db/dbconnect.php");

	$query="SELECT * FROM users WHERE username='$username' OR emailid='$emailid' ";
	$result=mysqli_query($conn , $query);
	$rows=mysqli_num_rows($result);

	if($rows > 0) {
		header("location:register.php");
	}
	else {

		$query="INSERT INTO users_buffer (username, firstname, password, emailid)
				VALUES ('$username','$firstname','$password','$emailid')";
		mysqli_query($conn , $query);
		echo "<script>alert('Registration successful, Pending form admin approval');</script>";
		echo "<script>window.location = '../index.php';</script>";
	}
}
else {
	
?>

<div class="container w-50 ">
	<div class="container">
		<h3 class="h3 d-flex justify-content-center m-5 p-4">Register on the blog</h3>
	</div>
<form action="register.php" role="form" method="post">
<div class="mb-3">
    <label for="username" class="form-label">UserName</label>
    <input type="text" class="form-control" name="username" placeholder="Enter your username">
</div>
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" name="firstname" placeholder="Enter your Name">
</div>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="emailid" placeholder="Enter your Email id">
</div>
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
</div>
  
  <button type="submit" class="btn btn-primary" name="submit">Register</button>
</form>

</div>
<?php
}


?>
