<?php
include 'includes/db.php';

if(isset($_POST['insert']))
{
    $name         = clean($_POST['name']);
    $car_type     = clean($_POST['car_type']);
    $bodytype     = clean($_POST['bodytype']);
    $motor         = clean($_POST['motor']);
    $fuel        = clean($_POST['fuel']);
    $gearbox        = clean($_POST['gearbox']);
    $image_name   = $_FILES['image']['name'];
    $image        = $_FILES['image']['tmp_name'];

    $location     = "images/".$image_name;


    move_uploaded_file($image, $location);


    $query = "INSERT INTO car (name, car_type, bodytype, motor, fuel, gearbox, image) VALUES ('".escape($name)."', '".escape($car_type)."', '".escape($bodytype)."','".escape($motor)."','".escape($fuel)."','".escape($gearbox)."' , '$image_name')";

    $result = mysqli_query($conn,$query);

    if($result == true)
    {
        header("Location:addcar.php");
    }
    else
    {
        die('error' . mysqli_error($conn));
    }

}
session_start();
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
    
?>

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Add Car</title>
  </head>
     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" a href="welcome.php">Auto23</a>
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
    <h2></h2>
    <h2></h2>
    <h2></h2>
    <h2></h2>
    <h2></h2>
    <h2></h2>
<div class="container">

    <div class="jumbotron text-center">
        <h2>Add car</h2>
    </div>
    <br>
<div class="row">
<div class="col-md-12">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="name">Car Type:</label>
        <input type="text" name="car_type" class="form-control" placeholder="Enter car_type">
    </div>
    
    <div class="form-group">
        <label for="name">Body Type</label>
        <input type="text" name="bodytype" class="form-control" placeholder="Enter bodytype">
    </div>
    <div class="form-group">
        <label for="name">Motor:</label>
        <input type="text" name="motor" class="form-control" placeholder="Enter motor">
    </div>
    <div class="form-group">
        <label for="name">Fuel:</label>
        <input type="text" name="fuel" class="form-control" placeholder="Enter fuel">
    </div>
    <div class="form-group">
        <label for="name">Gearbox:</label>
        <input type="text" name="gearbox" class="form-control" placeholder="Enter gearbox">
    </div> 
    <div class="form-group">
        <label for="name">Image:</label>
        <input type="file" class="btn btn-primary" name="image" class="form-control" placeholder="Enter image">
    </div> 
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Insert data" name="insert">
    </div>
</form>
</div>
</div>
</div>
<?php } ?>