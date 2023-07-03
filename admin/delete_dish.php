<?php 
$id = $_GET['id'];
$conn = mysqli_connect('localhost', 'root', '', 'projects');
$query = "delete from FoodTotal where id = $id;";
$result = mysqli_query($conn, $query);
header('location:read_dish.php ')
?>
