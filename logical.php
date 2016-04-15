<?php
		//Code for Registration 
		if(isset($_POST['signup'])) {
			
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$dob = $_POST['dob'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$type = $_POST['type'];
			$a = date('Y-m-d');
			
			$msg = mysql_query("INSERT into users(fname,lname,DOB,email,password,typetype,posting_date) values('$fname','$lname','$dob','$email','$password','$type','$a')");
			
			if($msg) {
				echo "<script>alert('Register successfully');</script>";
			}
		}

		// Code for login system
		if(isset($_POST['login'])) {
			
			$password=$_POST['password'];
			$ret= mysql_query("SELECT * FROM users WHERE email='".$_POST['uemail']."' and password='$password'");
			$num=mysql_fetch_array($ret);
			
			if($num>0) {
				$extra="welcome.php";
				$_SESSION['login']=$_POST['uemail'];
				$_SESSION['id']=$num['id'];
				$_SESSION['name']=$num['fname'];
				$host=$_SERVER['HTTP_HOST'];
				$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
				header("location:http://$host$uri/$extra");
				exit();
			}
			else {
				echo "<script>alert('Invalid username or password');</script>";
				$extra="index.php";
				$host  = $_SERVER['HTTP_HOST'];
				$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
				exit();
			}
		}

		//Code for Forgot Password

		if(isset($_POST['send'])) {
			
			$row1=mysql_query("select email,password from users where email='".$_POST['femail']."'");
			$row2=mysql_fetch_array($row1);
			
			if($row2>0) {
				$email = $row2['email'];
				$subject = "Information about your password";
				$password=$row2['password'];
				$message = "Your password is ".$password;
				mail($email, $subject, $message, "From: $email");
				echo  "<script>alert('Your Password has been sent Successfully');</script>";
			}
			else{
				echo "<script>alert('Email not register with us');</script>";	
			}
		}
?>