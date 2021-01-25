<?php

include 'includes/db.php';

?>
<?php
session_start();

//Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
  header('location:ee_logout.php');
  } else{
    
?>
?>
<!DOCTYPE html>
<html lang="ee">
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
    </div>  

<div class="container">
<!--Banner buttons-->
   <br>
    <a href="ee_insert.php" role="button" class="btn btn-primary pull-right">Lisa andmed</a>
    <form action="ee_search.php" method="post">
    <input type="submit" value=" Otsi autosid" class="btn btn-sm btn-primary">
<!--Banner buttons end-->
</form> 
    <br>
    <br>
    <table class="table table-hover table-striped">
<!--Banner form-->
        <tr>
            <th>ID</th>
            <th>Nimi</th>
            <th>Autotüüp</th>
            <th>Keretüüp</th>
            <th>Mootor</th>
            <th>Kütus</th>
            <th>Käigukast</th>
            <th>Pilt</th>
            <th>Tegevus</th>
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
            <td><a href="ee_update.php?ee_update=<?php echo $id ?>" class="btn btn-success btn-sm" role="button">Uuenda</a>
            <a href="ee_addcar.php?delete=<?php echo $id ?>" class="btn btn-danger btn-sm" id="delete" role="button">Kustuta</a></td>
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
            if(!confirm("Oled kindel, et kustutad?"))
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