<?php
include("Connections/gcc.php"); 
session_start();
 // Table name 

// print_r($_POST);
$username=$_POST['st_id']; // username sent from form 
$password=$_POST['password']; // password sent from form 


// To protect mysqli injection 
$username = stripslashes($username);
$password = stripslashes($password);

//Query
$sql=sprintf("SELECT * FROM access_students WHERE s_trackId = '$username' AND s_password = '$password'");
$result=mysqli_query($gcc, $sql);
// mysqli_num_row is counting table row
$rows = mysqli_fetch_assoc($result);
$_SESSION['MM_Username'] = $rows['s_trackId'];
$_SESSION['MM2_Username'] = $rows['s_fname']." ".$rows['s_lname'];


//Direct pages with different user levels
if ($rows['access_l'] == 1) {
	header('location: ../learn/');
		//User1 
	//session_register("username");
    //session_register("password");
    
	
}
else{ 
	// Error login
	// echo "<script>alert('Invalid Username and/or Password!');
	// 					window.location='../';
	// 					</script>";
}

?>
