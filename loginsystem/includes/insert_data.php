<?php

include 'db.php';


if(isset($_POST['insert'])){
    
    $name  = clean($_POST['name']);
    $car_type  = clean($_POST['car_type']);
    $bodytype = clean($_POST['bodytype']);
    $motor = clean($_POST['motor']);
    $fuel = clean($_POST['fuel']);
    $gearbox = clean($_POST['gearbox']);
    
    $query = "INSERT INTO `car` (name, car_type, bodytype, motor, fuel, gearbox) VALUES ('".escape($name)."','".escape($car_type)."','".escape($bodytype)."','".escape($motor)."','".escape($fuel)."','".escape($gearbox)."') ";
    
    $result = mysqli_query($conn,$query);
    
    if($result){
        
        header('location:../welcome.php');
    }
    
}


?>