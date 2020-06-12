<html>
<head>
<title>letsBook</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="js/bootstrap.min.js" rel="stylesheet" >
</head>
<body>
  <div>
<nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
  <ul class="navbar-nav " >
    <li class="nav-item active">
      <a class="nav-link" href="index.html" style="font-size: 20">Letsbook.com</a>
    </li>
    <li class="nav-item"style="float: right">
      <a class="nav-link" href="index.html">About Us</a>
    </li>
    <li class="nav-item"style="float: right">
      <a class="nav-link" href="#">Blog</a>
    </li>
  </ul>
</nav>
<div class="well" align="middle" style="background-color: #e3e3e3;height: 20%;width: 100%;padding-top: 20px">
  <h1 style="font-family: cursive;">LetsBook</h1>
  <h3 style="font-family: cursive;">Let your old book find a new Partner</h3> 
</div>
<div style="background-image: url(img/pic2.jpg); background-size: cover; height: 470px">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top: 40px">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <strong>Change Password</strong>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="post" action="database.php">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">
                            Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputEmail3" name='lmail' placeholder="Email" required="">
                        </div>
                    </div>
                    
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" name='pchange' class="btn btn-success btn-sm">
                                Send new password</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="panel-footer">
                    Not Registered? <a href="reg.html">Register here</a></div>
            </div>
        </div>
    </div>
</div>
</div>

</body>
<footer style="background-color: black;color:white;position: fixed; left: 0;bottom: 0; width: 100%"align="middle" ><br>copyright@letsbook.com 2019<br><br></footer>
</div>
</html>