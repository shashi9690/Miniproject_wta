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

<body>

<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="index.html">Letsbook</a>
</nav>
 <?php
 $per=$_GET['id'];
          $qery="SELECT COUNT(b_id) from books where issuer_id=$per";
          $dto=mysqli_query($con,$qery);
          $rte=mysqli_fetch_row($dto);
          if($rte[0]!=0)
          {?>
<div class="row" style="background-color: #F2F2F2;margin-top: 20px">
    <?php }?>
      <?php 
  $query="SELECT * from books where issuer_id=$per";
  $srt=mysqli_query($con,$query);

  while($rto=mysqli_fetch_row($srt))
  { 

    ?>
    

    <div class="card" style="width: 19rem; margin-top:20px;margin-left: 20px;margin-bottom: 20px">
     <?php echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $rto[5] ).'" style="height:200px;width:200px;margin-left:50px;margin-top:20px" alt="Card image cap"/>';?>
  <div class="card-body" style="height: 150px">
    <h5 class="card-title"><?php echo $rto[1]?></h5>
    <p class="card-text"><?php echo $rto[4];?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Author :<?php echo $rto[2];?></li>
    <li class="list-group-item">YOP  :<?php echo $rto[3];?></li>
    
  </ul>
  <div class="card-body">
    <a href='database.php?a=<?php echo $rto[0]?>'><button type="submit" name="rem"  class="btn btn-dark">Request</button><a>
</div>
</div>
      

 <?php } ?>