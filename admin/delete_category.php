<?php
  echo "hello world";
  $conn = mysqli_connect("localhost", "root", "", "projects") ;
  $query = "delete from categories where id = ".$_GET['id'].";";
  echo  $query;
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "deletion failed";
  } 
  header('location: ./read_category.php');
?>

