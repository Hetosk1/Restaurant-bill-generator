<?php 

if(!isset($_GET['isAdmin'])){
  header("location: admin_login.php");
}

?>

<html>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Read Category</title>
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



        <div class='m-9 p-5 border border-indigo-500 rounded rounded-lg'>
            <center><div class="text-2xl text-indigo-500">Categories</div></center>
            <center><table cellpadding='10' class="border-collapse border border-indigo-500"> 
                <tr>
                <th class=''>ID</th>
                <th class='border border-indigo-500'>Name</th>
                <th class='border border-indigo-500'>#</th>
                </tr>
                <?php 
                    $conn = mysqli_connect('localhost', 'root', '', 'projects');
                    $query = "select * from categories;";
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($result)){
                    echo "
                        <tr>
                        <td class='border border-indigo-500'>".$row['id']."</td>
                        <td class='border border-indigo-500'>".$row['name']."</td>
                        <td class='border border-indigo-500'><a href='./delete_category.php?id=".$row['id']."' class='text-black hover:text-red-500'>Delete</a></td>
                        </tr>
                    ";
                    }
                ?>
            </table></center>
        </div>
    </body>
    <?php
        if (isset($_POST['add_food_dish'])){
        $name = $_POST['dishname'];
        echo "hello world";
        // exit();
        $category_id = $_POST['category_id'];
        $price = $_POST['price'];
        $weight = $_POST['weight'];
        $conn = mysqli_connect('localhost', 'root', '', 'projects');
        $query = 'insert into FoodTotal(name, price, weight, categoryID) ';
        $query.= 'values("'.$name.'", '.$price.', '.$weight.', '.$category_id.');';
        $result = mysqli_query($conn, $query);
        unset($_POST);
    }
   ?>
</html>
