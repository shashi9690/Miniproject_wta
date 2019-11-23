<?php
session_start();
$con=mysqli_connect("localhost","root","","letsbook");
if(isset($_POST['register']))
{

	$name=$_POST['uname'];
	$email=$_POST['umail'];
	$pass=$_POST['upass'];
	$add=$_POST['uadd'];
	$ph=$_POST['uph'];
	$loc=$_POST['uloc'];
	$rque="SELECT count(id) from user where email='$email'";
	$slr=mysqli_query($con,$rque);
	$rty=mysqli_fetch_row($slr);
	if($rty[0]==1)
	{
		echo '<script language="javascript">';
        echo 'alert("email already exists!!!")';
        echo '</script>';
        echo "<script> window.location.assign('login.html'); </script>";
    }
    else{
    	$password_hash=password_hash($pass, PASSWORD_DEFAULT);

	$squery="INSERT INTO user(id,name,email,password,location,address,phone) VALUES (NULL,'$name','$email','$password_hash','$loc','$add',$ph)";
	$sql=mysqli_query($con,$squery);
	if($sql==TRUE)
	{
		echo '<script language="javascript">';
        echo 'alert("Details Entered Successfully")';
        echo '</script>';
        echo "<script> window.location.assign('login.html'); </script>";
        
	}
	else
	{
		echo '<script language="javascript">';
        echo 'alert("Failed To Add Details")';
        echo '</script>';
        echo "<script> window.location.assign('reg.html'); </script>";
       
       
    }
}
}
if(isset($_POST['login']))
{

	
	$email=$_POST['lmail'];
	$pass=$_POST['lpass'];
	$query="SELECT * from user where email='$email'";
	$red=mysqli_query($con,$query);
	$rsa=mysqli_fetch_assoc($red);

	if(password_verify($pass,$rsa['password']))
	{
		
		$_SESSION['id']=$rsa['id'];
		$_SESSION['name']=$rsa['name'];
		$_SESSION['login']=true;
		echo '<script language="javascript">';
        echo 'alert("Login Successful!!!!")';
        echo '</script>';
        echo "<script> window.location.assign('trial.php'); </script>";
        // header('location:trial.php');
	}
	else
	{
		echo '<script language="javascript">';
        echo 'alert("Incorrect Password")';
        echo '</script>';
        echo "<script> window.location.assign('login.html'); </script>";
       
	}
}
if(isset($_POST['share']))
{
	$title=$_POST['title'];
	$author=$_POST['author'];
	$yop=$_POST['yop'];
	$desc=$_POST['desc'];
	 $image = $_FILES['filer']['tmp_name'];
	 $id=$_GET['id'];

        if(!isset($image))
        {
        	echo '<script language="javascript">';
        echo 'alert("please select an image");';
        echo '</script>';
         echo "<script> window.location.assign('addbook.php'); </script>";
        }
        else
        {
        	$image_size=getimagesize($_FILES['filer']['tmp_name']);
        	if($image_size==false)
        	{
        		echo '<script language="javascript">';             
        echo 'alert("Not a valid image")';
        echo '</script>';
         echo "<script> window.location.assign('addbook.php'); </script>";
        }
        	
        	else
        	{ 
        		$file=file_get_contents($_FILES['filer']['tmp_name']);
        		$imgnm=$_FILES['filer']['name'];
        		$fies=addslashes($file);
        		
        		$query="INSERT into books (b_id,b_name,b_author,b_yop,d_desc,b_img,issuer_id) values (NULL,'$title','$author',$yop,'$desc','$fies',$id)";
        		$rat=mysqli_query($con,$query);
        		if($rat==TRUE)
        		{
        			echo '<script language="javascript">';
        echo 'alert("Book added succesfully")';
        echo '</script>';
         echo "<script> window.location.assign('trial.php'); </script>";
        }
               		}

        	}
        }
if(isset($_GET['remo']))
{ 
    echo "yo";
	$id=$_GET['remo'];
	$query="DELETE FROM books where b_id=$id";
	$rat=mysqli_query($con,$query);
	if($rat==true){
		echo '<script language="javascript">';
        echo 'alert("Book Removed succesfully")';
        echo '</script>';
         echo "<script> window.location.assign('trial.php'); </script>";

	}
	
}
if(isset($_GET['a']))
{
  $boo=$_GET['a'];
  $user_id=$_SESSION['id'];

  $prequery="SELECT issuer_id from books where b_id=$boo";
  $srt=mysqli_query($con,$prequery);
  $srs=mysqli_fetch_row($srt);
  $query="INSERT INTO request(b_id,issuer_id,request_id,approval_status) values ($boo,$srs[0],$user_id,0)";
  $ttt=mysqli_query($con,$query);
  if($ttt==TRUE)
  {
echo '<script language="javascript">';
        echo 'alert("Request Submitted, please wait for your response")';

        echo '</script>';
        echo "<script> window.location.assign('trial.php'); </script>";
  }
  else{
    echo '<script language="javascript">';
        echo 'alert("Failed to submit")';

        echo '</script>';
       echo "<script> window.location.assign('trial.php'); </script>";


  }
}
if(isset($_GET['b']))
{
  $bot=$_GET['b'];
  $qwery="UPDATE request set approval_status=1 where b_id=$bot";
  $mys=mysqli_query($con,$qwery);
  if($mys==TRUE)
  {
echo '<script language="javascript">';
        echo 'alert("approved")';

        echo '</script>';
        echo "<script> window.location.assign('request.php'); </script>";
  }
  else{
    echo '<script language="javascript">';
        echo 'alert("Failed to approve")';

        echo '</script>';
       echo "<script> window.location.assign('request.php'); </script>";



  }
}
    

?>