<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - 4-Teen Restaurant</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<form action="./admin_login.php" method="post">
    <body class="bg-indigo-500">
    <div class="flex items-center justify-center h-screen">
        <div class="w-72 bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold mb-6">Login</h2>
        <div class="mb-4">
            <label for="username" class="block text-sm font-medium mb-1">Username</label>
            <input type="text" name="username" id="username" class="w-full bg-gray-100 border-indigo-500 border-2 rounded-md py-2 px-3 focus:outline-none focus:border-indigo-700">
        </div>
        <div class="mb-6">
            <label for="password" class="block text-sm font-medium mb-1">Password</label>
            <input type="password" name="password" id="password" class="w-full bg-gray-100 border-indigo-500 border-2 rounded-md py-2 px-3 focus:outline-none focus:border-indigo-700">
        </div>
        <button type="submit" name="submit" class="bg-indigo-500 text-white py-2 px-6 rounded-md font-bold uppercase tracking-wide transition-colors duration-300 hover:bg-indigo-700">
            Login
        </button>
        </div>
    </div>
    </body>
</form>

</html>
<?php 

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username === "admin" && $password === "admin"){
        header('location: read_dish.php?isAdmin=true');
    } else {
        echo "<script>
                alert('access to admin panel denied')
              </script>";
        header("location: ../index.html");
    }
}

?>