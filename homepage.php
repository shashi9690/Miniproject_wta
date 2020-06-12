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


<div class="col-lg-12" style="background-color: #e3e3e3;height: 100px;text-align: center;">
        <h1 align="middle">Explore your Giveaways!!!!</h1>
      </div>



  <?php 
  $query="SELECT * from books where issuer_id=$user_id";
  $srt=mysqli_query($con,$query);
  while($rto=mysqli_fetch_row($srt))
  { 

    ?>
    <div class="container" style="border-radius: 2%;margin-bottom:20px">
      
<div class="row" style="background-color: #F2F2F2;margin-top: 20px">
    <div class="col-lg-2" style="margin:20px;background-color: #FFFFFF;border-radius: 2%">
      <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $rto[5] ).'" style="margin:20px"/>';?>
    </div>
    <div class="col-lg-6"  style="background-color: #F2F2F2 ">
      <table class="table" style="margin-top: 40px;margin-left: 70px">
     <tbody>
            <tr>
              <th class="thead-dark">Title</th>
              <td><?php echo $rto[1];?></td>
            </tr>
            <tr>
              <th class="thead-dark">Author</th>
              <td><?php echo $rto[2];?></td>
            </tr>
            <tr>
              <th class="thead-dark">Description</th>
              <td><?php echo $rto[4];?></td>
            </tr>
            <tr>
              <th class="thead-dark">YOP</th>
              <td><?php echo $rto[3];?></td>
            </tr>
          </tbody>
        </table>
  

      <button type="submit" name="rem" href='database.php?remo=<?php echo $rto[0]?>' class="btn btn-dark btn-block" style="margin-left: 70px">Remove</button>
    </div>
  </div>
</div>
      

 <?php } ?>
 <div class="col-lg-12" style="background-color: #e3e3e3;height: 100px;text-align: center;">
        <h1 align="middle">Search for a Book!!!!</h1>
      </div>
      <?php 
  $query="SELECT * from books where issuer_id!=$user_id";
  $srt=mysqli_query($con,$query);
  while($rto=mysqli_fetch_row($srt))
  {
    ?>
    <div class="container" style="border-radius: 2%;margin-bottom:20px">
      
<div class="row" style="background-color: #F2F2F2;margin-top: 20px">
    <div class="col-lg-2" style="margin:20px;background-color: #FFFFFF;border-radius: 2%">
      <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $rto[5] ).'" style="margin:20px"/>';?>
    </div>
    <div class="col-lg-8"  style="background-color: #F2F2F2 ">
      <table class="table" style="margin-top: 40px;margin-left: 70px">
     <tbody>
            <tr>
              <th class="thead-dark">Title</th>
              <td><?php echo $rto[1];?></td>
            </tr>
            <tr>
              <th class="thead-dark">Author</th>
              <td><?php echo $rto[2];?></td>
            </tr>
            <tr>
              <th class="thead-dark">Description</th>
              <td><?php echo $rto[4];?></td>
            </tr>
            <tr>
              <th class="thead-dark">YOP</th>
              <td><?php echo $rto[3];?></td>
            </tr>
          </tbody>
        </table>

      <button type="button"  class="btn btn-dark btn-block" onclick="location.href='ownerinfo.php?id=<?php echo $user_id?>'"  style="margin-left: 70px">request</button>
    </div>
  </div>
</div>
      

 <?php } ?>






</body>
<footer style="background-color: black;color:white;width: 100%;position: fixed; left: 0;bottom: 0; width: 100%"align="middle"  ><br>copyright &copy letsbook.com 2019<br><br></footer>
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
        </div>
      </li>
    </ul>
  </div>
</nav>


<div class="col-lg-12" style="background-color: #e3e3e3;height: 100px;text-align: center;">
        <h1 align="middle">Explore your Giveaways!!!!</h1>
      </div>



  <?php 
  $query="SELECT * from books where issuer_id=$user_id";
  $srt=mysqli_query($con,$query);
  while($rto=mysqli_fetch_row($srt))
  { 

    ?>
    <div class="container" style="border-radius: 2%;margin-bottom:20px">
      
<div class="row" style="background-color: #F2F2F2;margin-top: 20px">
    <div class="col-lg-2" style="margin:20px;background-color: #FFFFFF;border-radius: 2%">
      <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $rto[5] ).'" style="margin:20px"/>';?>
    </div>
    <div class="col-lg-6"  style="background-color: #F2F2F2 ">
      <table class="table" style="margin-top: 40px;margin-left: 70px">
     <tbody>
            <tr>
              <th class="thead-dark">Title</th>
              <td><?php echo $rto[1];?></td>
            </tr>
            <tr>
              <th class="thead-dark">Author</th>
              <td><?php echo $rto[2];?></td>
            </tr>
            <tr>
              <th class="thead-dark">Description</th>
              <td><?php echo $rto[4];?></td>
            </tr>
            <tr>
              <th class="thead-dark">YOP</th>
              <td><?php echo $rto[3];?></td>
            </tr>
          </tbody>
        </table>
  

      <button type="submit" name="rem" href='database.php?remo=<?php echo $rto[0]?>' class="btn btn-dark btn-block" style="margin-left: 70px">Remove</button>
    </div>
  </div>
</div>
      

 <?php } ?>
 <div class="col-lg-12" style="background-color: #e3e3e3;height: 100px;text-align: center;">
        <h1 align="middle">Search for a Book!!!!</h1>
      </div>
      <?php 
  $query="SELECT * from books where issuer_id!=$user_id";
  $srt=mysqli_query($con,$query);
  while($rto=mysqli_fetch_row($srt))
  {
    ?>
    <div class="container" style="border-radius: 2%;margin-bottom:20px">
      
<div class="row" style="background-color: #F2F2F2;margin-top: 20px">
    <div class="col-lg-2" style="margin:20px;background-color: #FFFFFF;border-radius: 2%">
      <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $rto[5] ).'" style="margin:20px"/>';?>
    </div>
    <div class="col-lg-8"  style="background-color: #F2F2F2 ">
      <table class="table" style="margin-top: 40px;margin-left: 70px">
     <tbody>
            <tr>
              <th class="thead-dark">Title</th>
              <td><?php echo $rto[1];?></td>
            </tr>
            <tr>
              <th class="thead-dark">Author</th>
              <td><?php echo $rto[2];?></td>
            </tr>
            <tr>
              <th class="thead-dark">Description</th>
              <td><?php echo $rto[4];?></td>
            </tr>
            <tr>
              <th class="thead-dark">YOP</th>
              <td><?php echo $rto[3];?></td>
            </tr>
          </tbody>
        </table>

      <button type="button"  class="btn btn-dark btn-block" onclick="location.href='ownerinfo.php?id=<?php echo $user_id?>'"  style="margin-left: 70px">request</button>
    </div>
  </div>
</div>
      

 <?php } ?>






</body>
<footer style="background-color: black;color:white;width: 100%;position: fixed; left: 0;bottom: 0; width: 100%"align="middle"  ><br>copyright &copy letsbook.com 2019<br><br></footer>
</html>
>>>>>>> 69c44cfb7774efb2c25bf9782e03034f3ba69565
