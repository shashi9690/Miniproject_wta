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

<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="col-lg-2 bg-dark position-fixed" id="sidebar" style="height: 100%">
            <table class="table table-borderless table-dark">
                <thead><th> <?php echo $user_name;?></th></thead>
                <tr><td><a href="addbook.php?book=<?php echo $user_id?>">Add Book</a></td></tr>
                <tr><td><a href="request.php">Pending Requests</a></td></tr>
                <tr><td><a href="approved.php">Approved Books</a></td></tr>
                <tr><td><a href="logout.php">Logout</a></td></tr>
                <tr><td><a href="trial.php">Back</a></td></tr>
</table>
        </div>
         <main class="col-lg offset-md-2">
          <div class="row">
            <?php
      $query="SELECT b_id from request where request_id=$user_id and approval_status=1";
      $row=mysqli_query($con,$query);
      while($rot=mysqli_fetch_row($row))
      {

  $query="SELECT * from books where b_id=$rot[0]";

  $srt=mysqli_query($con,$query);
  while($rto=mysqli_fetch_row($srt))
  {
    ?>
     <div class="card" style="width: 19rem; margin-top:20px;margin-left: 20px;">
     <?php echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $rto[5] ).'" style="height:200px;width:200px;margin-left:50px;margin-top:20px" alt="Card image cap"/>';?>
  <div class="card-body" style="height: 150px">
    <h5 class="card-title"><?php echo $rto[1]?></h5>
    <p class="card-text"><?php echo $rto[4];?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Author :<?php echo $rto[2];?></li>
    <li class="list-group-item">YOP  :<?php echo $rto[3];?></li>
    <?php 
    $rq="SELECT * from user where id=$rto[6]";
    $rty=mysqli_query($con,$rq);
    $ytr=mysqli_fetch_assoc($rty);
    ?>
    <li class="list-group-item">Owner Address  :<?php echo $ytr['address'];?></li>
    <li class="list-group-item">Contact  :<?php echo $ytr['phone'];?></li>
    <li class="list-group-item">Email  :<?php echo $ytr['email'];?></li>
  </ul>

  <div class="card-body">
    <a href='database.php?remo=<?php echo $rto[0]?>'><button type="submit" name="rem" onclick="return confirm('are you sure you have borrowed the book');"   class="btn btn-dark btn-block">Borrowed</button></a>
  </div>
</div>

<?php } }?>
</div>
</main>
</div>
</div>

</body>

</html>

      