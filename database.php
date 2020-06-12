<<<<<<< HEAD
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
    	

	$squery="INSERT INTO user(id,name,email,password,location,address,phone) VALUES (NULL,'$name','$email','$pass','$loc','$add','$ph')";
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

	if($pass==$rsa['password'])
	{
		
		$_SESSION['id']=$rsa['id'];
		$_SESSION['name']=$rsa['name'];
    $_SESSION['email']=$rsa['email'];
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
if(isset($_POST['alogin']))
{

  
  $email=$_POST['lmail'];
  $pass=$_POST['lpass'];
  $query="SELECT * from admin where email='$email'";
  $red=mysqli_query($con,$query);
  $rsa=mysqli_fetch_assoc($red);

  if($pass==$rsa['password'])
  {
    
    $_SESSION['id']=$rsa['id'];
    $_SESSION['name']=$rsa['name'];
    $_SESSION['email']=$rsa['email'];
    $_SESSION['login']=true;
    echo '<script language="javascript">';
        echo 'alert("Login Successful!!!!")';
        echo '</script>';
       echo "<script> window.location.assign('admin/trial.php'); </script>";
        // header('location:trial.php');
  }
  else
  {
    echo '<script language="javascript">';
        echo 'alert("Incorrect Password")';
        echo '</script>';
       // echo "<script> window.location.assign('admin/login.html'); </script>";
       
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
        echo 'alert("Request already exists")';

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
if(isset($_POST['pchange']))
{

  $email=$_POST['lmail'];
  echo $email;
  $otp=rand(100000,999999);

  $rop='SELECT * FROM user where email="$email"';
  $dot=mysqli_query($con,$rop);
  if($dot)
  {
    echo "user exists";
    $rst=strval($otp);
    
    $rot="UPDATE user set password='$rst' where email='$email'";
    $pot=mysqli_query($con,$rot);
    if($rot==true)
    {
require 'phpmailer\PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = '';                 // SMTP username
$mail->Password = '';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('');
$mail->addAddress($email); 
$mail->addReplyTo('');


//$mail->addAttachment('/var/tmp/file.tar.gz');          Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'New password ';
$mail->Body    = 'Here is your new password<h1>'.$otp."</h1></br> dont share it with anybody";


if(!$mail->send()) {
    echo '<script language="javascript">';
    echo 'alert("failed to send mail, check your internet connecton!!")';
    
    echo '</script>';
    echo "<script> window.location.assign('changepassword.php');</script>";
} else {
    
        echo '<script language="javascript">';
            echo 'alert("mail sent")';
            echo '</script>';
            echo "<script> window.location.assign('login.html'); </script>";
}
}
}
else
{
  echo '<script language="javascript">';
            echo 'alert("email does not exist please register")';
            echo '</script>';
           echo "<script> window.location.assign('reg.html'); </script>";

}

}
if(isset($_POST['cp']))
{
  $email=$_SESSION['email'];
  $rst=$_POST['lmail'];
  $rot="UPDATE user set password='$rst' where email='$email'";
    $pot=mysqli_query($con,$rot);
if($pot==true)
    {
      echo '<script language="javascript">';
            echo 'alert("Changed Password")';
            echo '</script>';
            echo "<script> window.location.assign('login.html'); </script>";

}
else
{
  echo '<script language="javascript">';
            echo 'alert("failed to change password ")';
            echo '</script>';
            echo "<script> window.location.assign('cp.php'); </script>";

}
}
    

=======
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
    

>>>>>>> 69c44cfb7774efb2c25bf9782e03034f3ba69565
?>