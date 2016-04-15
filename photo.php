<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();

if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
			
			move_uploaded_file($_FILES["image"]["tmp_name"],"photos/" . $_FILES["image"]["name"]);
			
			$location="photos/" . $_FILES["image"]["name"];
			
			$save=mysql_query("update users set profile='$location' where id='".$_SESSION['id']."'");
			header("location: welcome.php");
			exit();					
	}
	
	if(isset($_GET['id'])) {
		$msg=mysql_query("delete from photos where id='".$_GET['id']."'");
		if($msg) {
			//echo "<script>alert('photo deleted successfully');</script>";
					$extra="photo.php";
					$host  = $_SERVER['HTTP_HOST'];
					$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
					
					echo "<script>alert('Photo Deleted successfully');
					window.location = 'http://$host$uri/$extra'</script>";
		}
	}

?>
<!DOCTYPE html>
<style>
.hero-spacer{width:70%;}
</style>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/heroic-features.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
	<link href="admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
<?php
				$ret=mysql_query("select * from users Where id = '".$_SESSION['id']."'");
				while($row=mysql_fetch_array($ret)) {
					$user = $row;
					if(!empty($row['profile'])){
						$img = $row['profile'];
					}else{
						$img = 'images/user.png';
					}
				echo '<a href="welcome.php"><img src="'.$img.'" class="profile"></a>'; 
} ?>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style='margin-top:30px;'>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="photo.php">Photo</a>
                    </li>
                    <li>
                        <a href="profile.php">My Profile</a>
                    </li>
					<li>
                        <a href="#">Search</a>
                    </li>
                </ul>
				<ul class="nav navbar-nav" style='float:right;'>
					<li>
                        <a href="#">Welcome <?php echo $_SESSION['name'];?></a>
                    </li>
					<li>
                        <a href="logout.php">Logout</a>
                    </li>
                  
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
		<header class="jumbotron hero-spacer" style='float:left';>
		<form action="" method="post" enctype="multipart/form-data" name="addroom">
		 Upload Profile Picture <br />
		 <input type="file" name="image" class="ed"><br />
		 <input type="submit" name="Submit" value="Upload" id="button1" />
		 </form>
		</header>
		<?php if($user['usertype'] == 1){ ?>
			
		<header class="jumbotron hero-spacer" style='float:left';>
		<form action="addexec.php" method="post" enctype="multipart/form-data" name="addroom">
		 Select Image: <br />
		 <input type="file" name="image" class="ed"><br />
		 Caption<br />
		 <input name="caption" type="text" class="ed" id="brnu" />
		 <br />
		 <input type="submit" name="Submit" value="Upload" id="button1" />
		 </form>
		 
		<?php } ?>
		
		</header>		
    </div>
<?php if($user['usertype'] == 1){ ?>
<div class="container"><br />
<h2 align="left">My Albums</h2>
<br />
<?php
$result = mysql_query("SELECT * FROM photos Where usrid ='".$_SESSION['id']."'");
while($row = mysql_fetch_array($result))
{
echo '<div class="container">';
echo '<div id="imagelist">';
echo '<a href="photo.php?id='.$row['id'].'"><button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></a>';
echo '<p><img src="'.$row['location'].'"></p>';
echo '<p id="caption">'.$row['caption'].' </p>';
echo '</div>';
}
?>
</div>
    </div>
<?php } ?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>