<?php
include ('/database.php');
// print_r($_SESSION['name']);
		if(!isset($_SESSION['login']))
	{
		header('location:admin/login.html');
		// echo "wat the hell";
	}
		$user_id=$_SESSION['id'];
	$user_name=$_SESSION['name'];
?>
<html>
<head>
<title>letsBook</title> 
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
<link href="/js/bootstrap.min.js" rel="stylesheet"  crossorigin="anonymous">
<script src="/js/jquery.js"></script>        
<script src="/js/bootstrap.js"></script>
</head>
<body>
<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="col-lg-2 bg-dark position-fixed" id="sidebar" style="height: 100%" >
            <table class="table table-borderless table-dark">
              <thead><th>LetsBook</th></thead>
            	<thead><th> Admin</th></thead>
            	<tr><td><a href="logout.php">Logout</a></td></tr>
              
</table>
        </div>
         <main class="col-lg offset-md-2">
      
          <table class="table table-bordered table-light">
  <tr>
<th>User name</th>
<th>email</th>
<th>remove</th>
</tr>

<?php

$query="SELECT * from user";
$trs=mysqli_query($con,$query);

while($srt=mysqli_fetch_assoc($trs))
{
?>
<td><?php echo $trs['name'];?></td>
<td><?php echo $trs['email'] ;?></td>

<td><a href="/database.php?user=<?php echo $trs['id']?>"><button type="submit" name="rem"  class="btn btn-dark">Remove</button></a></td>
</tr>
<?php }?>
</table>
</main>
</div>
</div>
</body>
</html>



           
        
