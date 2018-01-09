<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="search.css">
	<title>Welcome</title>
</head>
<body >

	<h1 align="center">Welcome to Health Care Portal</h1>
	<h3 align='right'> <a href='logout.php' >Logout</a></h3>
	<form method='post'>
	<input type='text' placeholder="Search.." name='searchbox'></input>
	<input type='submit' value='search' name='search'>
	</form>
	<?php
	session_start();
	if (!isset($_SESSION["session"])) {
		echo '<script language="javascript">'; 
		echo 'alert("You must Login first")';  
		echo '</script>'; 
header('Location: index.php');
}

		if (isset($_POST['search'])) {
		 	$con=mysqli_connect('localhost','root','','registration');
		 	$searchby=$_POST['searchbox'];
		 	$query="SELECT * FROM doctor WHERE dr_id LIKE '%$searchby%' OR dr_name LIKE '%$searchby%' OR dr_address LIKE '%$searchby%' OR dr_contact LIKE '%$searchby%' OR dr_specialization LIKE '%$searchby%' OR dr_qualification LIKE '%$searchby%' OR dr_gender LIKE '%$searchby%' OR dr_experience LIKE '%$searchby%'" ;
		 	$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)!=0)
		{
        echo "<table width='100%'>";
        echo"<tr >";
        echo"<th >";?> <?php echo 'dr_id'; echo "</th>"; 
        echo"<th >";?> <?php echo 'dr_name'; echo "</th>"; 
        echo"<th >";?> <?php echo 'dr_address'; echo "</th>";
        echo"<th >";?> <?php echo 'dr_contact'; echo "</th>";
        echo"<th >";?> <?php echo 'dr_specialization'; echo "</th>";
        echo"<th >";?> <?php echo 'dr_qualification'; echo "</th>";
        echo"<th >";?> <?php echo 'dr_experience'; echo "</th>"; ?>  
        <?php echo "</tr>";
         while($row=mysqli_fetch_assoc($result))
    {  
        echo"<tr>";
        echo"<td >";?> <?php echo $row['dr_id']; echo "</td>";
        echo"<td >";?> <?php echo $row['dr_name']; echo "</td>";
        echo"<td >";?> <?php echo $row['dr_address']; echo "</td>";
        echo"<td >";?> <?php echo $row['dr_contact']; echo "</td>";
        echo"<td >";?> <?php echo $row['dr_specialization']; echo "</td>";
        echo"<td >";?> <?php echo $row['dr_qualification']; echo "</td>";
        echo"<td >";?> <?php echo $row['dr_experience']; echo "</td>";   
        echo"</tr>";
        
    }
    echo "</table>";
		 } 
	else
		echo '<h5>No Results Found... Please try again!!!</h5>';

	}
		 ?>
</body>
</html>