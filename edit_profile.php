<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
		if(isset($_POST['submit'])) {
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$dob = $_POST['dob'];
			$email = $_POST['email'];						$Country = $_POST['Country'];						$State = $_POST['State'];						$City = $_POST['City'];						$Nickname = $_POST['Nickname'];
/* echo "Update users set fname='$fname', lname='$lname', DOB='$dob', email='$email', Country='$Country', State='$State', City='$City', Nickname='$Nickname' Where id ='".$_SESSION['id']."'";die; */
			$msg = mysql_query("Update users set fname='$fname', lname='$lname', DOB='$dob', email='$email', Country='$Country', State='$State', City='$City', Nickname='$Nickname' Where id ='".$_SESSION['id']."'");
			
			if($msg) {
				
			$extra="profile.php";
			$host  = $_SERVER['HTTP_HOST'];
			$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');				
				echo "<script>alert('Profile Update successfully');
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

				<form method="post" action="" enctype="multipart/form-data">
                          <table class="table table-striped table-advance table-hover">
                              <tbody>
                              <?php $ret=mysql_query("SELECT * from users where id='".$_SESSION['id']."'");
							  while($row=mysql_fetch_array($ret))
							  {?>
                                <tr>
                                  <td>First Name :</td>
                                  <td><input type="text" class="text" value="<?php echo $row['fname'] ?>"  name="fname" ></td>
								</tr>                                
								<tr>
								<td>Last Name :</td>
                                  <td><input type="text" class="text" value="<?php echo $row['lname'] ?>"  name="lname" ></td>
								</tr>
								<tr>
                                  <td>Email :</td>
                                  <td><input type="text" class="text" value="<?php echo $row['email'];?>" name="email"  ></td>
								</tr>
								<tr>
                                  <td>Date Of Birth :</td>
                                  <td><input id="dob" name="dob" type="date" value="<?php echo $row['DOB'];?>"/></td>
								</tr>																<tr>                                  <td>Country :</td>                                  <td><input type="text" class="text" value="<?php echo $row['Country'];?>" name="Country"  ></td>								</tr>								<tr>                                  <td>State :</td>                                  <td><input type="text" class="text" value="<?php echo $row['State'];?>" name="State"  ></td>								</tr>								<tr>                                  <td>City :</td>                                  <td><input type="text" class="text" value="<?php echo $row['City'];?>" name="City"  ></td>								</tr>								<tr>                                  <td>Nickname :</td>                                  <td><input type="text" class="text" value="<?php echo $row['Nickname'];?>" name="Nickname"  ></td>								</tr>
                              <?php } ?>
                              </tbody>
                          </table>
						  
						  		<div align="right">
									<input type="submit" name="submit"  value="Update" id="button1">
								</div>
				</form>
		</header>		
    </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>