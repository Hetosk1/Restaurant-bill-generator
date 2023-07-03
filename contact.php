<?php
// echo "hello world";
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
 
  $conn = mysqli_connect('localhost', 'root', '', 'projects');
  if(!$conn){
    echo "connection with database failed";
  }

  $query = 'insert into contact(name, email, message) values("'.$name.'", "'.$email.'", "'.$message.'");';
  echo $query;
  $result = mysqli_query($conn, $query);
  if($result){
    echo 'insertion successfull';
  } else {
    echo "insertion failed";
  }
  echo "hello world";
  header('location: index.html');
} else {
  header("location: index.html");
}
?>
