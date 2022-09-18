<?php
include("../include/url_users.php");
session_start();
session_destroy();
echo "<script>alert('Logged Out Successfull');</script>";
echo "<script>window.location = '/blog/';</script>";

?>
