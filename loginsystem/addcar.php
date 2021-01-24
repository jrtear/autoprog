<?php

include 'includes/db.php';

?>
<?php
session_start();

//Checking session is valid or not
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
    <title>Car List</title>
  </head>
<!--Navbar-->   
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
<!--Navbar end-->                  
                </ul>
            </div>
        </div>
    </nav>
        <h2></h2>
        <h2></h2>
        <h2></h2>
    </div>  

<div class="container">
<!--Banner buttons-->
   <br>
    <a href="insert.php" role="button" class="btn btn-primary pull-right">Add Data</a>
    <form action="search.php" method="post">
    <input type="submit" value=" Search cars" class="btn btn-sm btn-primary">
<!--Banner buttons end-->
</form> 
    <br>
    <br>
    <table class="table table-hover table-striped">
<!--Banner form-->
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Car type</th>
            <th>Bodytype</th>
            <th>Motor</th>
            <th>Fuel</th>
            <th>Gearbox</th>
            <th>Image</th>
            <th>Action</th>
<!--Banner form-->
        </tr>
</div>
<?php                   
// Show car list
$query = "SELECT * FROM car ORDER BY id DESC ";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0){
    
    while($row = mysqli_fetch_array($result)){
        
        $id    = $row['id'];
        $name    = $row['name'];
        $car_type  = $row['car_type'];
        $bodytype  = $row['bodytype'];
        $motor  = $row['motor'];
        $fuel = $row['fuel'];
        $gearbox = $row['gearbox'];
        $image = $row['image'];

?>
<!--Banner form-->
        <tr>
            <td><?=$id; ?></td>
            <td><?=$name; ?></td>
            <td><?=$car_type; ?></td>     
            <td><?=$bodytype; ?></td>
            <td><?=$motor; ?></td>
            <td><?=$fuel; ?></td>
            <td><?=$gearbox; ?></td>
            <td>
               <img src= "<?= "images/".$image?>" alt="<?= $name ?>" class="thumbnail" width="100px" height="75px">
            </td>
            <td><a href="update.php?update=<?php echo $id ?>" class="btn btn-success btn-sm" role="button">Update</a>
            <a href="addcar.php?delete=<?php echo $id ?>" class="btn btn-danger btn-sm" id="delete" role="button">Delete</a></td>
<!--Banner form end-->
        </tr>
<?php
    }
}  
// Car delete 
    if(isset($_GET['delete'])){
        
        $id = $_GET['delete'];

        $image = "SELECT * FROM car WHERE id = $id";
        
        $query1 = mysqli_query($conn,$image);

        while($row = mysqli_fetch_array($query1))
        {
             $img= $row['image'];
        }

            /*unlink("images/".$img);*/

        $query = "DELETE FROM car WHERE id = $id";
        
        $result = mysqli_query($conn,$query);
        
    }    
         
?>

    </table>
</div>

<script>
    $(document).ready(function(){

        $('#delete').click(function(){
            if(!confirm("do you want to delete?"))
            {
                return false;
            }
            else
            {
                return true;
            }
        });


    });
</script>
<?php } ?>