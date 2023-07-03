<?php 

if(!isset($_GET['isAdmin'])){
  header("location: admin_login.php");
}

?>
<html>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Add Dish</title>
    </head>
    <body>

    <header class="header sticky top-0 bg-white shadow-md flex items-center justify-between px-8 py-02">
        <!-- logo -->
        <h1 class="w-3/12">
            <a href="">
            <p class="text-indigo-500 text-3xl">4-Teen</p>
            </a>
        </h1>

        <!-- navigation -->
        <nav class="nav font-semibold text-lg">
            <ul class="flex items-center">
                <li class="p-3 border-b-2 border-indigo-500 border-opacity-0 hover:border-opacity-100 hover:text-indigo-500 duration-200 cursor-pointer active">
                <a href="./add_category.php?isAdmin=true">Add Category</a>
                </li>
                <li class="p-3 border-b-2 border-indigo-500 border-opacity-0 hover:border-opacity-100 hover:text-indigo-500 duration-200 cursor-pointer">
                <a href="./add_dish.php?isAdmin=true">Add Dish</a>
                </li>
                <li class="p-3 border-b-2 border-indigo-500 border-opacity-0 hover:border-opacity-100 hover:text-indigo-500 duration-200 cursor-pointer">
                <a href="./read_category.php?isAdmin=true">Read Category</a>
                </li>
                <li class="p-3 border-b-2 border-indigo-500 border-opacity-0 hover:border-opacity-100 hover:text-indigo-500 duration-200 cursor-pointer">
                <a href="./read_dish.php?isAdmin=true">Read Menu</a>
                </li>
            </ul>
        </nav>

        <!-- buttons --->
        <div class="w-3/12 flex justify-end">
        <a href='../index.html'>Home Page</a>
        </div>
    </header>

    <div class="border border-indigo-300 shadow shadow-lg m-10 p-5 rounded rounded-lg">  
      <form action='add_dish.php' method="post">
      <table cellpadding='5'>
      <td><p class="text-xl">Add Dish </p></td>
        <tr>
          <td>Dishname : </td>
          <td><input type="text" name="dishname" class="border-2 p-1 border-indigo-500 rounded rounded-lg outline-0" required></td>
        </tr>
        <tr>
          <td>Category : </td>
          <td>
            <select name='category_id' class="border-2 rounded rounded-lg outline-indigo-500 border-indigo-500" required>
              <?php 
                $conn = mysqli_connect('localhost', 'root', '', 'projects');
                $query = 'select * from categories;';
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($result)){
                  $category_name = $row['name'];
                  $category_id = $row['id'];
                  echo "<option value='$category_id'>$category_name</option>";
                }
              ?> 
            </select>
          </td>
        </tr>
          <tr>
          <td>Price : </td>
          <td><input type="number" name="price" class="border-2 p-1 border-indigo-500 rounded rounded-lg outline-0" required></td>
        </tr>

        <tr>
          <td>Weight : </td>
          <td><input type='number' name='weight' class="border-2 p-1 border-indigo-500 rounded rounded-lg outline-0" required></td>
        </tr>
        <td><input type='submit' name='add_food_dish' class="border-2 border-indigo-500 p-2 rouned rounded-lg hover:bg-indigo-500 hover:text-white"> </td>
      </table>
    </form>
    </body>
    <?php 
    if (isset($_POST['add_food_dish'])){
        $name = $_POST['dishname'];
        // echo "hello world";
        // exit();
        $category_id = $_POST['category_id'];
        $price = $_POST['price'];
        $weight = $_POST['weight'];
        $conn = mysqli_connect('localhost', 'root', '', 'projects');
        if(!$conn){
          echo "connection failed";
        }
        $query = 'insert into FoodTotal(name, price, weight, category_id) ';
        $query.= 'values("'.$name.'", '.$price.', '.$weight.', '.$category_id.');';
        // echo $query;
        $result = mysqli_query($conn, $query);
        // if($result){
        //   echo "query successfull";
        // } else {
        //   echo "query not successfull";
        // }
     }
    ?>
</html>
