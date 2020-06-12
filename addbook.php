<<<<<<< HEAD

<html>
<head>
<title>Letsbook</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="js/bootstrap.min.js" rel="stylesheet" >
<link rel="shortcut icon" type="image/x-icon" href="img/imgo.jpg">
</head>
<body style="background-color: #4f3106">
  <div>
<nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
  <ul class="navbar-nav" style="float: left" >
    <li class="nav-item active">
      <a class="nav-link" href="index.html" style="font-size: 20">letsbook</a>
    </li>
  </ul> 
</nav>
<div class="row"  style="margin-top:20px;margin-left: 20px">
<div class="col-lg-4" style="background-color: #bcc0c4;float: center;border-radius: 2%" >
 <form style="text-align: left" align="middle" method="post" enctype="multipart/form-data" action="database.php?id=<?php echo $_GET['book']?>">
  <h4 align="middle">Add Book!!!</h4>
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Title" name="title">
    
  </div>
  <div class="form-group">
    <label for="exampleInputname1">Author</label>
    <input type="name" class="form-control" id="exampleInputPassword1" placeholder="Author" name="author">
  </div>
  <div class="form-group">
    <label for="exampleInputname1">YOP</label>
    <input type="name" class="form-control" id="exampleInputName1" placeholder="YOP" name="yop">
  </div>
  <div class="form-group">
    <label for="exampleInputname1">Description</label>
    <input type="name" class="form-control" id="exampleInputName1" placeholder="Description" name="desc">
 

  <div class="form-group" style="margin-bottom: 20px">
    <label for="exampleFormControlFile1">Add Cover</label>
    <input type="file" class="form-control-file" id="filer" name="filer">
  </div>
  <button type="submit"  name="share" class="btn btn-block btn-success">Share!!!!!!</button>
</form>
</div>
</form>
</div>
</div>
<div class="col-lg-2" align="left">
<button class="btn-danger"><a href="trial.php">Back</a></button>
</div>
<footer style="background-color: black;color:white;position: fixed; left: 0;bottom: 0; width: 100%" align="middle" ><br>copyright&copyletsbook.com 2019<br><br></footer>
</div>
</body>
</html>
 
=======

<html>
<head>
<title>Letsbook</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="js/bootstrap.min.js" rel="stylesheet" >
<link rel="shortcut icon" type="image/x-icon" href="img/imgo.jpg">
</head>
<body style="background-color: #4f3106">
  <div>
<nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
  <ul class="navbar-nav" style="float: left" >
    <li class="nav-item active">
      <a class="nav-link" href="index.html" style="font-size: 20">letsbook</a>
    </li>
    
  </ul>
</nav>
<div class="row"  style="margin-top:20px;margin-left: 20px">
<div class="col-lg-4" style="background-color: #bcc0c4;float: center;border-radius: 2%" >
 <form style="text-align: left" align="middle" method="post" enctype="multipart/form-data" action="database.php?id=<?php echo $_GET['book']?>">
  <h4 align="middle">Add Book!!!</h4>
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Title" name="title">
    
  </div>
  <div class="form-group">
    <label for="exampleInputname1">Author</label>
    <input type="name" class="form-control" id="exampleInputPassword1" placeholder="Author" name="author">
  </div>
  <div class="form-group">
    <label for="exampleInputname1">YOP</label>
    <input type="name" class="form-control" id="exampleInputName1" placeholder="YOP" name="yop">
  </div>
  <div class="form-group">
    <label for="exampleInputname1">Description</label>
    <input type="name" class="form-control" id="exampleInputName1" placeholder="Description" name="desc">
 

  <div class="form-group" style="margin-bottom: 20px">
    <label for="exampleFormControlFile1">Add Cover</label>
    <input type="file" class="form-control-file" id="filer" name="filer">
  </div>
  <button type="submit"  name="share" class="btn btn-block btn-success">Share!!!!!!</button>
</form>
</div>
<footer style="background-color: black;color:white;position: fixed; left: 0;bottom: 0; width: 100%" align="middle" ><br>copyright&copyletsbook.com 2019<br><br></footer>
</div>
</body>
</html>
 
>>>>>>> 69c44cfb7774efb2c25bf9782e03034f3ba69565
 