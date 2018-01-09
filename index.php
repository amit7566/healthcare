
<?php 
	//start session
	session_start()
 ?>
 <!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<title>Home</title>
</head>
<body >

	<div ><h1 align="center">Health Care Portal</h1>
	<b><p align="right"><a href="adminlogin.php">Admin Login</a></p></b>
	</div>
	<div class="nav">
		<ul>
			<a href="index.html"><li>Home</li><a>
			<a href="#"><li>About us</li><a>
			<a href="#"><li>Contact</li><a>

		</ul>
	</div>
	<div >
		<div class="register">
		<form action="index.php" method="post">
		Newuser??? Register with us:<br>
		<label>Full Name:</label>
		<input type="text" placeholder="Enter Full Name" name="username"></input>
		<label>Email:</label>
		<input type="text" placeholder="Enter Email" name="email"> </input>
		<label>Contact:</label>
		<input type="text" placeholder="Contact No." name="contact"></input>
		<label>Password:</label><br>
		<input type="password" value="" name="password_1"></input><br>
		<label>Confirm Password:</label><br>
		<input type="Password" placeholder="Password" name="password_2"></input>
		<a href="#"><input type="submit" value="register" name="submit"></input></a>
		</form>
		<?php 
			if(isset($_POST["submit"]))
			{
				$name = $_POST["username"];
				$email = $_POST["email"];
				$contact = $_POST["contact"];
				$password = $_POST["password_1"];
				$con = mysqli_connect('localhost','root','','registration');
				$query = "insert into user (username, email, contact, password) values ('$name','$email','$contact','$password')";
				mysqli_query($con,$query);
				mysqli_close($con);
				
			}
		 ?>
		</div>	
		<div class="login">
		<form action="" method="post" >
		Login:<br>
		<label>Email:</label>
		<input type="text" placeholder="Email id" name="email"></input>
		<label>Password: </label>
		<input type="password" placeholder="Password" name="password"></input>
		<input type="submit" value="Submit" name="login"></input>
		</form>	
		<?php
			if (isset($_SESSION['session'])) 
			{
				header('location:search.php');
			}
			if(isset($_POST['login']))
			{
				$email = $_POST['email'];
				$password= $_POST['password'];
				$query= "select * from user where email = '$email' and password ='$password' ";
				$con= mysqli_connect('localhost','root','','registration');
				$result=mysqli_query($con,$query);
				if(mysqli_num_rows($result)==1)
				{
					$_SESSION["session"]=$email;		
					header('location: search.php');
					
				}
				else {
					echo '<script language="javascript">'; 
					echo 'alert("Wrong User name & Pass")';  
					echo '</script>'; 
			}
			}

		?>	
		</div>	
		

	</div>
	
</body>
</html>