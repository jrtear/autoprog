<?php
include 'includes/db.php';
// Insert cars
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
        header("Location:ee_addcar.php");
    }
    else
    {
        die('error' . mysqli_error($conn));
    }

}
session_start();

//Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
    
?>

?>
<!DOCTYPE html>
<html lang="ee">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Lisa auto</title>
  </head>
<!--Navbar-->
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
                        <a href="ee_logout.php">Väljalogimine</a>
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
<div class="container">
<!--Car add form-->
    <div class="jumbotron text-center">
        <h2>Lisa auto</h2>
    </div>
    <br>
<div class="row">
<div class="col-md-12">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Nimi:</label>
        <input type="text" name="name" class="form-control" placeholder="Sisesta nimi">
    </div>
    <div class="form-group">
        <label for="name">Autotüüp:</label>
        <input type="text" name="car_type" class="form-control" placeholder="Sisesta autotüüp">
    </div>
    
    <div class="form-group">
        <label for="name">Keretüüp</label>
        <input type="text" name="bodytype" class="form-control" placeholder="Sisesta kehatüüp">
    </div>
    <div class="form-group">
        <label for="name">Mootor:</label>
        <input type="text" name="motor" class="form-control" placeholder="Sisesta mootor">
    </div>
    <div class="form-group">
        <label for="name">Kütus:</label>
        <input type="text" name="fuel" class="form-control" placeholder="Sisesta kütus">
    </div>
    <div class="form-group">
        <label for="name">Käigukast:</label>
        <input type="text" name="gearbox" class="form-control" placeholder="Sisesta käigukast">
    </div> 
    <div class="form-group">
        <label for="name">Pilt:</label>
        <input type="file" class="btn btn-primary" name="image" class="form-control" placeholder="Sisesta pilt">
    </div> 
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Sisesta andmed" name="insert">
    </div>
<!--Car add form end-->
</form>
</div>
</div>
</div>
<?php } ?>