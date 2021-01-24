<?php
include 'includes/db.php';
?>

<?php 
// Update cars
if(isset($_GET['update'])){
    
    
    $id = $_GET['update'];
    

$query = "SELECT * FROM car WHERE id = $id";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
    $name         = $row['name'];
    $car_type     = $row['car_type'];
    $bodytype     = $row['bodytype'];
    $motor         = $row['motor'];
    $fuel        = $row['fuel'];
    $gearbox        = $row['gearbox'];
        }
    }
}
// Update cars
if(isset($_POST['update'])){
    

    $name         = clean($_POST['name']);
    $car_type     = clean($_POST['car_type']);
    $bodytype     = clean($_POST['bodytype']);
    $motor        = clean($_POST['motor']);
    $fuel         = clean($_POST['fuel']);
    $gearbox      = clean($_POST['gearbox']);
    $image_name   = $_FILES['image']['name'];
    $image        = $_FILES['image']['tmp_name'];

    $location     = "images/".$image_name;

    move_uploaded_file($image, $location);

    $query  = "UPDATE car SET ";
    $query .= "name = '".escape($name)."', ";
    $query .= "car_type = '".escape($car_type)."', ";
    $query .= "bodytype = '".escape($bodytype)."', ";
    $query .= "motor = '".escape($motor)."', ";
    $query .= "fuel = '".escape($fuel)."', ";
    $query .= "gearbox = '".escape($gearbox)."', ";
    $query .= "image = '{$image_name}' ";
    $query .= "WHERE id = {$id} ";
    
    $result = mysqli_query($conn,$query);
    
    if($result){
        
        header('location:addcar.php');
    }
    else
    {
        die('error' . mysql_error($conn));
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Update cars</title>
  </head>
<!--Car add form-->  
<div class="container">
    <div class="jumbotron text-center">
        <h2>Edit Cars</h2>
    </div>
    <br>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo $name ?>">
    </div>
    <div class="form-group">
        <label for="name">Car Type:</label>
        <input type="text" name="car_type" class="form-control" placeholder="Enter car_type" value="<?php echo $car_type ?>">
    </div>
    
    <div class="form-group">
        <label for="name">Body Type</label>
        <input type="text" name="bodytype" class="form-control" placeholder="Enter bodytype" value="<?php echo $bodytype ?>">
    </div>
    <div class="form-group">
        <label for="name">Motor:</label>
        <input type="text" name="motor" class="form-control" placeholder="Enter motor" value="<?php echo $motor ?>">
    </div>
    <div class="form-group">
        <label for="name">Fuel:</label>
        <input type="text" name="fuel" class="form-control" placeholder="Enter fuel" value="<?php echo $fuel ?>">
    </div>
    <div class="form-group">
        <label for="name">Gearbox:</label>
        <input type="text" name="gearbox" class="form-control" placeholder="Enter gearbox" value="<?php echo $gearbox ?>">
    </div>
    <div class="form-group">
        <label for="name">Image:</label>
        <img src= "<?= "images/".$image?>" alt="" width="100px" height="100px" class="thumbnail">
        <input type="file" name="image" class="form-control" placeholder="Enter image" value="<?php echo $gearbox ?>">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Update data" name="update">
    </div>
</form>

</div>
