<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
	if(isset($_GET['id'])){
		$msg=mysql_query("UPDATE `users` SET `status`= 'approved' WHERE id='".$_GET['id']."'");
		if($msg)  {
			echo "<script>alert('User Approved Successfully !');</script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Approve Users</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Admin Dashboard</b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <aside>
                <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              	  <p class="centered"><a href="#"><img src="assets/img/admin.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>
              	  	
                  <li class="mt">
                      <a href="change-password.php">
                          <i class="fa fa-file"></i>
                          <span>Change Password</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="manage-users.php" >
                          <i class="fa fa-users"></i>
                          <span>Manage Users</span>
                      </a>
                  </li>
              
                  <li class="sub-menu">
                      <a href="approve-users.php" >
                          <i class="fa fa-user"></i>
                          <span>Approve Users</span>
                      </a>
                  </li>  
				  
                  <li class="sub-menu">
                      <a href="add_cat.php" >
                          <i class="fa fa-plus-square"></i>
                          <span>Add Categories</span>
                      </a>
                  </li>
				  
				  <li class="sub-menu">
                      <a href="manage_cat.php" >
                          <i class="fa fa-th-list"></i>
                          <span>Manage Categories</span>
                      </a>
                  </li>
				  			  
				  <li class="sub-menu">
                      <a href="add_area.php" >
                          <i class="fa fa-plus-square"></i>
                          <span>Add Area</span>
                      </a>
                  </li>
				  
				  <li class="sub-menu">
                      <a href="manage_area.php" >
                          <i class="fa fa-th-list"></i>
                          <span>Manage Area</span>
                      </a>
                  </li>
              </ul>
          </div>
	  </aside>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Approve Users</h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  <th class="hidden-phone">First Name</th>
                                  <th> Last Name</th>
                                  <th> Email Id</th>
                                  <th> Date Of Birth</th>
                                  <th>Reg. Date</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysql_query("select * from users Where usertype = '2' and status = 'panding'");
							  $cnt=1;
							  while($row=mysql_fetch_array($ret))
							  {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['fname'];?></td>
                                  <td><?php echo $row['lname'];?></td>
                                  <td><?php echo $row['email'];?></td>
                                  <td><?php echo $row['DOB'];?></td>  <td><?php echo $row['posting_date'];?></td>
                                  <td>
                                     <a href="approve-users.php?id=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-danger btn-xs"><i class="fa fa-check"></i></button></a>
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
		</section>
      </section
  ></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
