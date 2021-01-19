<?php

include 'includes/db.php';

?>

<div class="container">
    <div class="jumbotron text-center">
        <h2>Add car</h2>
    </div>
    <br>
    
    <a href="addcar.php" role="button" class="btn btn-primary pull-right">Add Data</a>
    <br>
    <br>
    <table class="table table-hover table-striped">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>car type</th>
            <th>bodytype</th>
            <th>motor</th>
            <th>fuel</th>
            <th>gearbox</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
<?php  		            
		
$query = "SELECT * FROM car ORDER BY id DESC ";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0){
    
    while($row = mysqli_fetch_array($result)){
        
        $id    = $row['id'];
        $name    = $row['name'];
        $car_type  = $row['car_type'];
        $bodytype  = $row['bodytype']
        $motor  = $row['motor']
        $fuel = $row['fuel'];
        $gearbox = $row['gearbox'];
        $image = $row['image'];

?>
        
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
            <a href="index.php?delete=<?php echo $id ?>" class="btn btn-danger btn-sm" id="delete" role="button">Delete</a></td>
        </tr>
<?php
    }
}  
        
    if(isset($_GET['delete'])){
        
        $id = $_GET['delete'];

        $image = "SELECT * FROM car WHERE id = $id";
        
        $query1 = mysqli_query($conn,$image);

        while($row = mysqli_fetch_array($query1))
        {
             $img= $row['image'];
        }

            unlink("images/".$img);

        $query = "DELETE FROM cars WHERE id = $id";
        
        $result = mysqli_query($conn,$query);
        
        if($result){

            header('location:index.php');
            
        }
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



