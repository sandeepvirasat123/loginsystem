<?php session_start();
include("dbconnection.php");
$area_id = $_REQUEST['area_id'];

if($area_id == '1'){
	
	$loct = $_REQUEST['location'];
	$cat_id = $_REQUEST['cat_id'];
	$cat_name = $_REQUEST['cat_name'];
	$usr_id = $_SESSION['id'];
	$logo = $_REQUEST['logo'];
	$msg = mysql_query("INSERT into location(cat_id,cat_name,usr_id,location,logo) values('$cat_id','$cat_name','$usr_id','$loct','$logo')");
	
}else if($area_id == '2'){
	
	$loct = $_REQUEST['location'];
	$cat_id = $_REQUEST['cat_id'];
	$cat_name = $_REQUEST['cat_name'];
	$usr_id = $_SESSION['id'];
	$logo = $_REQUEST['logo'];
	$msg = mysql_query("INSERT into location(cat_id,cat_name,usr_id,location,logo) values('$cat_id','$cat_name','$usr_id','$loct','$logo')");
}
?>