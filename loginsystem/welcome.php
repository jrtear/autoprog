<?php
session_start();

//Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Auto23</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/heroic-features.css" rel="stylesheet">
</head>
<!--Navbar-->
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Auto23</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#"><?php echo $_SESSION['name'];?></a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                  
                </ul>
            </div>
        </div>
    </nav>
<!--Navbar end-->
<!--Banner-->
    <div class="container">
        <header class="jumbotron hero-spacer">
            <h1>Auto23</h1>
            <p>U have logged in, u can add cars below button add data</p>
            <p><a  href="logout.php" class="btn btn-primary btn-large">Logout </a>
            </p>
        </header>
        <hr>
<a href="addcar.php" role="button" class="btn btn-primary pull-right">Add Data</a>
        </div>
        <hr>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <div class="footer bg-dark">
        English/Eesti
    </div>
    <!--Banner end-->
</body>
</html>
<?php } ?>