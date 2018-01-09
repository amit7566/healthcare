<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
	<div class="heading"><h1 align="center">Admin Panel</h1></div>
	<div class="login">
		<form action="" method="post" >
		Login:<br>
		<label>Email:</label>  
		<input type="text" placeholder="Email id" name="email"></input>
		<label>Password: </label>
		<input type="password" placeholder="Password"  name="password"></input>
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
				$query= "select * from admin where email = '$email' and password ='$password' ";
				$con= mysqli_connect('localhost','root','','healthcare');
				$result=mysqli_query($con,$query);
				if(mysqli_num_rows($result)==1)
				{
					$_SESSION["admin"]=$email;		
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
		
</body>
</html>