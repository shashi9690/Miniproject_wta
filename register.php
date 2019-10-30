<?php
include('database.php');
	$name=$_POST['uname'];
	$email=$_POST['umail'];
	$pass=$_POST['upass'];
	$password_hash=password_hash($pass, PASSWORD_DEFAULT);

	$squery="INSERT INTO user(id,name,email,password) VALUES (0,'$name','$email','$password_hash')";
	$sql=mysqli_query($con,$squery);
	if($sql== TRUE)
	{
		echo '<script language="javascript">';
        echo 'alert("Details entered successfully")';
        echo '</script>';
        include('login.html');

        
	}
	else
	{
		echo '<script language="javascript">';
        echo 'alert("failed to add details")';
        echo '</script>';
        include('register.html');
    }

?>
