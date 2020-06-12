<<<<<<< HEAD
<?php
include ('database.php');
// print_r($_SESSION['name']);
		if(!isset($_SESSION['login']))
	{
		header('location:login.html');
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
<link href="js/bootstrap.min.js" rel="stylesheet"  crossorigin="anonymous">
<script src="js/jquery.js"></script>        
<script src="js/bootstrap.js"></script>
</head>
<body style="background-color: #575C5C">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="row">
			<div class="col-lg-10">
  <a class="navbar-brand" href="index.html">letsbook</a>
</div>
<div class="col-lg-2" >
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button></div>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        
       <a class="nav-link dropdown-toggle"href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
          <?php echo $user_name;?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="addbook.php?book=<?php echo $user_id?>">Add a book</a>
          <a class="dropdown-item" href="#">leave a comment!</a>
          <a class="dropdown-item" href="logout.php">Logout</a>
          <a class="dropdown-item" href="trial.php">Back</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<table class="table table-bordered table-light">
	<tr>
<th>Book name</th>
<th>Borrower</th>
<th>Borrower Mail</th>
<th>view books</th>
<th>approve</th>
</tr>

<?php

$query="SELECT * from request where issuer_id=$user_id and approval_status=0";
$trs=mysqli_query($con,$query);

while($srt=mysqli_fetch_assoc($trs))
{
	$b_id=$srt['b_id'];

$querys="SELECT b_name from books where b_id=$b_id";
$rts=mysqli_query($con,$querys);
$drt=mysqli_fetch_assoc($rts);

$id=$srt['request_id'];
$set="SELECT name,email from user where id=$id";
$str=mysqli_query($con,$set);
$ets=mysqli_fetch_assoc($str);
?>


<tr>
<td><?php echo $drt['b_name'];?></td>
<td><?php echo $ets['name'] ;?></td>
<td><?php echo $ets['email'] ;?></td>

<td><a href="bookinfo.php?id=<?php echo $srt['request_id']?>">View books</a></td>
<td><a href='database.php?b=<?php echo $b_id?>'><button type="submit" name="rem"  class="btn btn-dark">Approve</button></a></td>
</tr>

<?php }?>
</table>

  <div class="col-lg-2" align="left">
<button class="btn-danger"><a href="trial.php">Back</a></button>
</div>
</div>

</body>
</html>



=======
<?php
include ('database.php');
// print_r($_SESSION['name']);
		if(!isset($_SESSION['login']))
	{
		header('location:login.html');
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
<link href="js/bootstrap.min.js" rel="stylesheet"  crossorigin="anonymous">
<script src="js/jquery.js"></script>        
<script src="js/bootstrap.js"></script>
</head>
<body style="background-color: #575C5C">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="row">
			<div class="col-lg-10">
  <a class="navbar-brand" href="index.html">letsbook</a>
</div>
<div class="col-lg-2" >
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button></div>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        
       <a class="nav-link dropdown-toggle"href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
          <?php echo $user_name;?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="addbook.php?book=<?php echo $user_id?>">Add a book</a>
          <a class="dropdown-item" href="#">leave a comment!</a>
          <a class="dropdown-item" href="logout.php">Logout</a>
          <a class="dropdown-item" href="trial.php">Back</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<table class="table table-bordered table-light">
	<tr>
<th>Book name</th>
<th>Borrower</th>
<th>view books</th>
<th>approve</th>
</tr>

<?php

$query="SELECT * from request where issuer_id=$user_id and approval_status=0";
$trs=mysqli_query($con,$query);

while($srt=mysqli_fetch_assoc($trs))
{
	$b_id=$srt['b_id'];

$querys="SELECT b_name from books where b_id=$b_id";
$rts=mysqli_query($con,$querys);
$drt=mysqli_fetch_assoc($rts);

$id=$srt['request_id'];
$set="SELECT name from user where id=$id";
$str=mysqli_query($con,$set);
$ets=mysqli_fetch_assoc($str);
?>


<tr>
<td><?php echo $drt['b_name'];?></td>
<td><?php echo $ets['name'] ;?></td>
<td><a href="bookinfo.php?id=<?php echo $srt['request_id']?>">View books</a></td>
<td><a href='database.php?b=<?php echo $b_id?>'><button type="submit" name="rem"  class="btn btn-dark">Approve</button><a></td>
</tr>

<?php }?>
</table>

>>>>>>> 69c44cfb7774efb2c25bf9782e03034f3ba69565
