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
        </div>
      </li>
    </ul>
  </div>
</nav>
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
        </div>
      </li>
    </ul>
  </div>
</nav>
>>>>>>> 69c44cfb7774efb2c25bf9782e03034f3ba69565
