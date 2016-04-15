<<<<<<< HEAD
<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
$usr = $_SESSION['id'];
if (!isset($_FILES['image']['tmp_name'])) {
	echo "";	
	}else{	
	$file=$_FILES['image']['tmp_name'];	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));	
	$image_name= addslashes($_FILES['image']['name']);						
	move_uploaded_file($_FILES["image"]["tmp_name"],"photos/" . $_FILES["image"]["name"]);						
	$location="photos/" . $_FILES["image"]["name"];			$caption=$_POST['caption'];						
	$save=mysql_query("INSERT INTO photos (location, caption, usrid) VALUES ('$location','$caption', '$usr')");			
	header("location: photo.php");			exit();						
=======
<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
$usr = $_SESSION['id'];
if (!isset($_FILES['image']['tmp_name'])) {
	echo "";	
	}else{	
	$file=$_FILES['image']['tmp_name'];	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));	
	$image_name= addslashes($_FILES['image']['name']);						
	move_uploaded_file($_FILES["image"]["tmp_name"],"photos/" . $_FILES["image"]["name"]);						
	$location="photos/" . $_FILES["image"]["name"];			$caption=$_POST['caption'];						
	$save=mysql_query("INSERT INTO photos (location, caption, usrid) VALUES ('$location','$caption', '$usr')");			
	header("location: photo.php");			exit();						
>>>>>>> 69e03e209bd92798ff47a0922a36b5b257f1d67f
	}?>