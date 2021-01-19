<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "loginsystem";
$con = new mysqli($localhost, $username, $password, $dbname);
if( $con->connect_error)
{
    die('Error: ' . $con->connect_error);
}
$sql = "SELECT * car FROM loginsystem";
if( isset($_GET['search']) ){
    $name = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $sql = "SELECT * car FROM loginsystem WHERE name ='$name'";
}
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<title>Search</title>
<link rel="stylesheet" type="text/css"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<label>Search</label>
<form action="" method="GET">
<input type="text" placeholder="Type the name here" name="search">&nbsp;
<input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
</form>
<h2>List of cars</h2>
<table class="table table-striped table-responsive">
<tr>
<th>ID</th>
<th>name</th>
<th>car_type</th>
<th>bodytype</th>
<th>motor</th>
<th>fuel</th>
<th>gearbox</th>
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
</html>
<?php

while($row = $result->fetch_assoc(false)){
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
    <?php
}
?>