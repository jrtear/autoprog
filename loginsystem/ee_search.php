<?php
// database connection
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "loginsystem";
$con = new mysqli($localhost, $username, $password, $dbname);
if( $con->connect_error)
{
    die('Error: ' . $con->connect_error);
}
// Search cars
$sql = "SELECT * FROM `car`";
if( isset($_GET['search']) ){
    $name = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $car_type = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $bodytype = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $motor = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $fuel = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $gearbox = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM car WHERE name ='$name' or car_type='$car_type' or bodytype='$bodytype'or motor='$motor'or fuel='$fuel'or gearbox='$gearbox'";
}
$result = $con->query($sql);
?>
<?php
session_start();

//Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
    
?>
<!DOCTYPE html>
<html lang="ee">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Search</title>
<link rel="stylesheet" type="text/css"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<!--Navbar-->
<body>
	 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Navigeerimine</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" a href="ee_welcome.php">Auto23</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#"><?php echo $_SESSION['name'];?></a>
                    </li>
                    <li>
                        <a href="logout.php">Väljalogimine</a>
                    </li>
<!--Navbar end-->                  
                </ul>
            </div>
        </div>
    </nav>
    <h2></h2>
    <h2></h2>
    <h2></h2>
    <h2></h2>
    <h2></h2>
    <h2></h2>
<!--Search form-->
<div class="container">
<label>Search</label>
<form action="" method="GET">
<input type="text" placeholder="Type the name here" name="search">&nbsp;
<input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
</form>
<h2>Autode list</h2>
<table class="table table-striped table-responsive">
<tr>
<th>Nimi</th>
<th>Autotüüp</th>
<th>Keretüüp</th>
<th>Mootor</th>
<th>Kütus</th>
<th>Käigukast</th>
</tr>
<?php
while($row = $result->fetch_assoc()){
    ?>
    <tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['car_type']; ?></td>
    <td><?php echo $row['bodytype']; ?></td>
    <td><?php echo $row['motor']; ?></td>
	<td><?php echo $row['fuel']; ?></td>
    <td><?php echo $row['gearbox']; ?></td>
    </tr>
    <?php
}
?>
</table>
</div>
</body>
<!--Search form end-->
</html>
<?php

while($row = $result->fetch_assoc()){
    ?>
    <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['car_type']; ?></td>
    <td><?php echo $row['bodytype']; ?></td>
    <td><?php echo $row['motor']; ?></td>
    <td><?php echo $row['fuel']; ?></td>
    <td><?php echo $row['gearbox']; ?></td>
    </tr>
<!--Search form end-->
    <?php
}
?>
<?php } ?>