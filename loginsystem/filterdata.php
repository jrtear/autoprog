<?php
$connect = mysql_connect('localhost', 'root', '') or die(mysql_error());

mysql_select_db('loginsystem', $connect) or die(mysql_error());

$sql = SELECT * car from loginsystem;

$query = mysql_query($sql) or die(mysql_error());

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Data search</title>
  </head>
<table width="100%" cellpadding="5" cellspace="5">

<tr>
	<td>ID</td>
	<td>Name</td>
	<td>Car type</td>
	<td>Bodytype</td>
	<td>Motor</td>
	<td>Fuel</td>
	<td>Gearbox</td>
</tr>


</table>