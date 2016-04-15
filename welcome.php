<<<<<<< HEAD
<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
$usrid = $_SESSION['id'];
	if(isset($_GET['location'])) {
		$location = $_GET['location'];
		$catname = $_GET['catname'];
		$msg=mysql_query("delete from location where usr_id='".$usrid."' AND cat_name='".$catname."' AND location='".$location."'");
		if($msg) {
			//echo "<script>alert('Deleted successfully');</script>";
					$extra="welcome.php";
					$host  = $_SERVER['HTTP_HOST'];
					$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
					
					echo "<script>alert('Deleted successfully');
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
				echo '<a href="welcome.php"><img  height="50px" src="'.$img.'" class="profile"></a>'; 
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
        <header class="jumbotron hero-spacer" style='width:29%;height:833px;float:right;'>
            <h1>Area 3!</h1>
            <p>

			</p>
        </header>
<?php  
	if($user['usertype'] == 1){
		$ret=mysql_query("select * from areas Where id = 1");
		while($row=mysql_fetch_array($ret)) {
			$areaid = $row['id'];;
			echo "<input type='hidden' name='area_id' id='area_id' value=".$areaid." />";
			
		
?>
		<header class="jumbotron hero-spacer" style='float:left';>
		<div class='nav'>
            <h1><?php echo $row['area_name'];?></h1>
            <p><?php echo $row['area_desc'];?><p>
<?php 
		//$catss = implode($cats,",");
		$catss = $row['categories'];
		//echo "select * from categories where id IN (".$catss.")";
		$ret=mysql_query("select * from categories where id IN (".$catss.")");
		$i = 1;
		while($row=mysql_fetch_array($ret)) {
			
			echo "<div id='areacats'>";
			$cat = $row['cat_name'];
			$catname = "'".$cat."'";
			$catdsc = $row['cat_desc'];
			echo "<a href='#'>".$cat."</a>";
			echo "<div id ='catdesc'>".$catdsc."</div>";
			echo "</div>";
$qry=mysql_query("select * from location where usr_id = $usrid And cat_name = $catname AND cat_id IN (".$catss.")");
while($row=mysql_fetch_array($qry)) {
			if(!empty($row['location'])){
			$lot = "'".$row['location']."'";
			echo "<div id ='location' style='margin-left: 2%;'><b>Location :</b> ".$row['location']." "."<a href='welcome.php?location=".$row['location']."&catname=".$row['cat_name']."'><i class='fa fa-times'></i></a></div>";
			}
}
$qry=mysql_query("select * from categories where cat_name = $catname");
while($row=mysql_fetch_array($qry)) {
	$cname = "'".$row['cat_name']."'";
			echo "<input type='hidden' name='cat_id' id='cat_id".$i."'' value=".$row['id']." /><input type='hidden' name='cat_name' id='cat_name".$i."'' value=".$cname." />";
}
			echo "<div id='location".$i."'><a id='loc' onclick=locid(".$i."); style='color: #4CAF50;'>Add Location </a>";
            echo "<div class='navLinks' id='scntDiv".$i."'> </div>";
			$i++;
		}
?>
			</p>
		</div>
        </header>
<?php } ?>




<?php  
		$ret=mysql_query("select * from areas Where id = 2");
		while($row=mysql_fetch_array($ret)) {
			$areaid = $row['id'];;
			echo "<input type='hidden' name='area_id' id='area_id' value=".$areaid." />";
?>
		<header class="jumbotron hero-spacer" style='float:left';>
		<div class='nav2'>
            <h1><?php echo $row['area_name'];?></h1>
            <p><?php echo $row['area_desc'];?><p>

<?php 
		//$catss = implode($cats,",");
		$catss = $row['categories'];
		//echo "select * from categories where id IN (".$catss.")";
		$ret=mysql_query("select * from categories where id IN (".$catss.")");
		$i = 1;
		while($row=mysql_fetch_array($ret)) {
			echo "<div id='areacats'>";
			$cat = $row['cat_name'];
			$catname = "'".$cat."'";
			$catdsc = $row['cat_desc'];
			echo "<a href='#'>".$cat."</a>";
			echo "<div id ='catdesc'>".$catdsc."</div>";
			echo "</div>";
$qry=mysql_query("select * from location where usr_id = $usrid And cat_name = $catname AND cat_id IN (".$catss.")");
while($row=mysql_fetch_array($qry)) {
			if(!empty($row['location'])){
			$lot = "'".$row['location']."'";
			
			if($row['logo'] == 'Terrible'){
				$img = '<img height="20" src="photos/3.gif"/>';
			}elseif($row['logo'] == 'Danger'){
				$img = '<img height="20" src="photos/2.png"/>';
			}else{
				$img = '<img height="20" src="photos/1.png"/>';
			}
			echo "<div id ='location' style='margin-left: 2%;'><b>Comment :</b>".$img.$row['location']." "."<a href='welcome.php?location=".$row['location']."&catname=".$row['cat_name']."'><i class='fa fa-times'></i></a></div>";
			}
}
$qry=mysql_query("select * from categories where cat_name = $catname");
while($row=mysql_fetch_array($qry)) {
	$cname = "'".$row['cat_name']."'";
			echo "<input type='hidden' name='cat_id2' id='cat_id2".$i."'' value=".$row['id']." /><input type='hidden' name='cat_name2' id='cat_name2".$i."'' value=".$cname." />";
}
			echo "<div id='location2".$i."'><a id='loc2' onclick=locid2(".$i."); style='color: #4CAF50;'>Add Comment </a>";
            echo "<div class='navLinks2' id='scntDiv2".$i."'> </div>";
			$i++;
		}
?>

			</p>
		</div>
        </header>
<?php } ?>
		
        <hr>
        </div>
        <hr>
    </div>
	
		<?php } ?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
	$host=$_SERVER['HTTP_HOST'];
	$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	$url = "http://$host$uri/addloc.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">

function locid(id){
	var loctid = '#location'+ id;
	var divid = 'scntDiv'+ id;
	    document.getElementById(divid).innerHTML = '<span><input type="text" name="loct" id="loct" value="" /><input type="button" name="addloct" value="Add" id="addloct" onclick=addlocation('+id+'); />';
}
$(".nav #loc").on("click", function(e) {
    var div = $(this).siblings(".navLinks").toggle();
    $(".navLinks").not(div).hide();
    e.preventDefault();
});
function addlocation(id){
	var area_id = $('#area_id').val();
	var location = $('#loct').val();
	var catid = '#cat_id'+ id;
	var cat_id = $(catid).val();
	var catname = '#cat_name'+ id;
	var cat_name = $(catname).val();
		$.ajax({
		type: "POST",
		url: '<?php echo $url; ?>',
		data: {'location':location, 'cat_id':cat_id, 'cat_name':cat_name, 'area_id':area_id},
		success: function (data) {
			alert('success');
			window.location.reload();
		},
	})
}

function locid2(id){
	var loctid2 = '#location2'+ id;
	var divid2 = 'scntDiv2'+ id;
	    document.getElementById(divid2).innerHTML = '<span><input type="radio" name="logo" value="Unpleasant" checked> <img height="20px" src="photos/1.png"/>Unpleasant<br>  <input type="radio" name="logo" value="Terrible"> <img height="20px" src="photos/3.gif"/> Terrible<br>  <input type="radio" name="logo" value="Danger"> <img height="20px" src="photos/2.png"/>Danger <br><input type="text" name="loct2" id="loct2" value="" /><input type="button" name="addloct2" value="Add" id="addloct2" onclick=addlocation2('+id+'); />';
}
$(".nav2 #loc2").on("click", function(e) {
    var div = $(this).siblings(".navLinks2").toggle();
    $(".navLinks2").not(div).hide();
    e.preventDefault();
}); 
function addlocation2(id){	

var logo = document.getElementsByName('logo');

for (var i = 0, length = logo.length; i < length; i++) {
    if (logo[i].checked) {
        // do whatever you want with the checked radio
       // alert(logo[i].value);
	var logo = logo[i].value;
       
        break;
    }
}
	var area_id2 = $('#area_id').val();
	var location2 = $('#loct2').val();
	var catid2 = '#cat_id2'+ id;
	var cat_id2 = $(catid2).val();
	var catname2 = '#cat_name2'+ id;
	var cat_name2 = $(catname2).val();
		$.ajax({
		type: "POST",
		url: '<?php echo $url; ?>',
		data: {'location':location2, 'cat_id':cat_id2, 'cat_name':cat_name2, 'area_id':area_id2,'logo':logo},
		success: function (data) {
			alert('success');
			window.location.reload();
		},
	})
}
=======
<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
$usrid = $_SESSION['id'];
	if(isset($_GET['location'])) {
		$location = $_GET['location'];
		$catname = $_GET['catname'];
		$msg=mysql_query("delete from location where usr_id='".$usrid."' AND cat_name='".$catname."' AND location='".$location."'");
		if($msg) {
			//echo "<script>alert('Deleted successfully');</script>";
					$extra="welcome.php";
					$host  = $_SERVER['HTTP_HOST'];
					$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
					
					echo "<script>alert('Deleted successfully');
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
				echo '<a href="welcome.php"><img  height="50px" src="'.$img.'" class="profile"></a>'; 
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
        <header class="jumbotron hero-spacer" style='width:29%;height:833px;float:right;'>
            <h1>Area 3!</h1>
            <p>

			</p>
        </header>
<?php  
	if($user['usertype'] == 1){
		$ret=mysql_query("select * from areas Where id = 1");
		while($row=mysql_fetch_array($ret)) {
			$areaid = $row['id'];;
			echo "<input type='hidden' name='area_id' id='area_id' value=".$areaid." />";
			
		
?>
		<header class="jumbotron hero-spacer" style='float:left';>
		<div class='nav'>
            <h1><?php echo $row['area_name'];?></h1>
            <p><?php echo $row['area_desc'];?><p>
<?php 
		//$catss = implode($cats,",");
		$catss = $row['categories'];
		//echo "select * from categories where id IN (".$catss.")";
		$ret=mysql_query("select * from categories where id IN (".$catss.")");
		$i = 1;
		while($row=mysql_fetch_array($ret)) {
			
			echo "<div id='areacats'>";
			$cat = $row['cat_name'];
			$catname = "'".$cat."'";
			$catdsc = $row['cat_desc'];
			echo "<a href='#'>".$cat."</a>";
			echo "<div id ='catdesc'>".$catdsc."</div>";
			echo "</div>";
$qry=mysql_query("select * from location where usr_id = $usrid And cat_name = $catname AND cat_id IN (".$catss.")");
while($row=mysql_fetch_array($qry)) {
			if(!empty($row['location'])){
			$lot = "'".$row['location']."'";
			echo "<div id ='location' style='margin-left: 2%;'><b>Location :</b> ".$row['location']." "."<a href='welcome.php?location=".$row['location']."&catname=".$row['cat_name']."'><i class='fa fa-times'></i></a></div>";
			}
}
$qry=mysql_query("select * from categories where cat_name = $catname");
while($row=mysql_fetch_array($qry)) {
	$cname = "'".$row['cat_name']."'";
			echo "<input type='hidden' name='cat_id' id='cat_id".$i."'' value=".$row['id']." /><input type='hidden' name='cat_name' id='cat_name".$i."'' value=".$cname." />";
}
			echo "<div id='location".$i."'><a id='loc' onclick=locid(".$i."); style='color: #4CAF50;'>Add Location </a>";
            echo "<div class='navLinks' id='scntDiv".$i."'> </div>";
			$i++;
		}
?>
			</p>
		</div>
        </header>
<?php } ?>




<?php  
		$ret=mysql_query("select * from areas Where id = 2");
		while($row=mysql_fetch_array($ret)) {
			$areaid = $row['id'];;
			echo "<input type='hidden' name='area_id' id='area_id' value=".$areaid." />";
?>
		<header class="jumbotron hero-spacer" style='float:left';>
		<div class='nav2'>
            <h1><?php echo $row['area_name'];?></h1>
            <p><?php echo $row['area_desc'];?><p>

<?php 
		//$catss = implode($cats,",");
		$catss = $row['categories'];
		//echo "select * from categories where id IN (".$catss.")";
		$ret=mysql_query("select * from categories where id IN (".$catss.")");
		$i = 1;
		while($row=mysql_fetch_array($ret)) {
			echo "<div id='areacats'>";
			$cat = $row['cat_name'];
			$catname = "'".$cat."'";
			$catdsc = $row['cat_desc'];
			echo "<a href='#'>".$cat."</a>";
			echo "<div id ='catdesc'>".$catdsc."</div>";
			echo "</div>";
$qry=mysql_query("select * from location where usr_id = $usrid And cat_name = $catname AND cat_id IN (".$catss.")");
while($row=mysql_fetch_array($qry)) {
			if(!empty($row['location'])){
			$lot = "'".$row['location']."'";
			
			if($row['logo'] == 'Terrible'){
				$img = '<img height="20" src="photos/3.gif"/>';
			}elseif($row['logo'] == 'Danger'){
				$img = '<img height="20" src="photos/2.png"/>';
			}else{
				$img = '<img height="20" src="photos/1.png"/>';
			}
			echo "<div id ='location' style='margin-left: 2%;'><b>Comment :</b>".$img.$row['location']." "."<a href='welcome.php?location=".$row['location']."&catname=".$row['cat_name']."'><i class='fa fa-times'></i></a></div>";
			}
}
$qry=mysql_query("select * from categories where cat_name = $catname");
while($row=mysql_fetch_array($qry)) {
	$cname = "'".$row['cat_name']."'";
			echo "<input type='hidden' name='cat_id2' id='cat_id2".$i."'' value=".$row['id']." /><input type='hidden' name='cat_name2' id='cat_name2".$i."'' value=".$cname." />";
}
			echo "<div id='location2".$i."'><a id='loc2' onclick=locid2(".$i."); style='color: #4CAF50;'>Add Comment </a>";
            echo "<div class='navLinks2' id='scntDiv2".$i."'> </div>";
			$i++;
		}
?>

			</p>
		</div>
        </header>
<?php } ?>
		
        <hr>
        </div>
        <hr>
    </div>
	
		<?php } ?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
	$host=$_SERVER['HTTP_HOST'];
	$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	$url = "http://$host$uri/addloc.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">

function locid(id){
	var loctid = '#location'+ id;
	var divid = 'scntDiv'+ id;
	    document.getElementById(divid).innerHTML = '<span><input type="text" name="loct" id="loct" value="" /><input type="button" name="addloct" value="Add" id="addloct" onclick=addlocation('+id+'); />';
}
$(".nav #loc").on("click", function(e) {
    var div = $(this).siblings(".navLinks").toggle();
    $(".navLinks").not(div).hide();
    e.preventDefault();
});
function addlocation(id){
	var area_id = $('#area_id').val();
	var location = $('#loct').val();
	var catid = '#cat_id'+ id;
	var cat_id = $(catid).val();
	var catname = '#cat_name'+ id;
	var cat_name = $(catname).val();
		$.ajax({
		type: "POST",
		url: '<?php echo $url; ?>',
		data: {'location':location, 'cat_id':cat_id, 'cat_name':cat_name, 'area_id':area_id},
		success: function (data) {
			alert('success');
			window.location.reload();
		},
	})
}

function locid2(id){
	var loctid2 = '#location2'+ id;
	var divid2 = 'scntDiv2'+ id;
	    document.getElementById(divid2).innerHTML = '<span><input type="radio" name="logo" value="Unpleasant" checked> <img height="20px" src="photos/1.png"/>Unpleasant<br>  <input type="radio" name="logo" value="Terrible"> <img height="20px" src="photos/3.gif"/> Terrible<br>  <input type="radio" name="logo" value="Danger"> <img height="20px" src="photos/2.png"/>Danger <br><input type="text" name="loct2" id="loct2" value="" /><input type="button" name="addloct2" value="Add" id="addloct2" onclick=addlocation2('+id+'); />';
}
$(".nav2 #loc2").on("click", function(e) {
    var div = $(this).siblings(".navLinks2").toggle();
    $(".navLinks2").not(div).hide();
    e.preventDefault();
}); 
function addlocation2(id){	

var logo = document.getElementsByName('logo');

for (var i = 0, length = logo.length; i < length; i++) {
    if (logo[i].checked) {
        // do whatever you want with the checked radio
       // alert(logo[i].value);
	var logo = logo[i].value;
       
        break;
    }
}
	var area_id2 = $('#area_id').val();
	var location2 = $('#loct2').val();
	var catid2 = '#cat_id2'+ id;
	var cat_id2 = $(catid2).val();
	var catname2 = '#cat_name2'+ id;
	var cat_name2 = $(catname2).val();
		$.ajax({
		type: "POST",
		url: '<?php echo $url; ?>',
		data: {'location':location2, 'cat_id':cat_id2, 'cat_name':cat_name2, 'area_id':area_id2,'logo':logo},
		success: function (data) {
			alert('success');
			window.location.reload();
		},
	})
}
>>>>>>> 69e03e209bd92798ff47a0922a36b5b257f1d67f
</script>