<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();

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
		<a href="edit_profile.php" style="float:right">Edit</a>
                          <table class="table table-striped table-advance table-hover">
                              <tbody>
                              <?php $ret=mysql_query("SELECT * from users where id='".$_SESSION['id']."'");
							  while($row=mysql_fetch_array($ret))
							  {?>
                                <tr>
                                  <td>Name :</td>
                                  <td><?php echo $row['fname']." ".$row['lname'];?></td>
								</tr>
								<tr>
                                  <td>Email :</td>
                                  <td><?php echo $row['email'];?></td>
								</tr>
								<tr>
                                  <td>Date Of Birth :</td>
                                  <td><?php echo $row['DOB'];?></td>
								</tr>								
								<tr>
                                  <td>Country :</td>
                                  <td><?php echo $row['Country'];?></td>
								</tr>
								<tr>
                                  <td>State :</td>
                                  <td><?php echo $row['State'];?></td>
								</tr>
								<tr>
                                  <td>City :</td>
                                  <td><?php echo $row['City'];?></td>
								</tr>
								<tr>
                                  <td>Nickname :</td>
                                  <td><?php echo $row['Nickname'];?></td>
								</tr>
                              <?php } ?>
                              </tbody>
                          </table>
		</header>		
    </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>