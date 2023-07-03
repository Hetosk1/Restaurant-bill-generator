<?php 

if(!isset($_GET['isAdmin'])){
  header("location: admin_login.php");
}

?>

<html>
    <head>
        <title>Read Dish</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>

        <!-- component -->
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
        <center><div class="text-2xl text-indigo-500">Dishes</div></center>
            <center><table cellpadding='10' class="border-collapse border border-indigo-500 rounded rounded-lg">
            <tr>
                <th class='border border-indigo-500'>Id</th>  
                <th class='border border-indigo-500'>Name</th>
                <th class='border border-indigo-500'>Price (₹)</th>
                <th class='border border-indigo-500'>Weight (g)</th>
                <th class='border border-indigo-500'>Category</th>
                <th class='border border-indigo-500'>#</th>
            </tr>
            <?php 
                $conn = mysqli_connect('localhost', 'root', '', 'projects');
                $query = 'select * from FoodTotal;';
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($result)){
                  $query_category = "select name from categories where id = ".$row['category_id'].";";
                  $result_category = mysqli_query($conn, $query_category);
                  $category = mysqli_fetch_row($result_category);
                  echo "
                    <tr>
                    <td class='border border-indigo-500'>".$row['id']."</td>
                    <td class='border border-indigo-500'>".$row['name']."</td>
                    <td class='border border-indigo-500'>".$row['price']."</td> 
                    <td class='border border-indigo-500'>".$row['weight']."</td>
                    <td class='border border-indigo-500'>".$category[0]."</td>
                    <td class='border border-indigo-500'><a href='delete_dish.php?id=".$row['id']."' class='text-black hover:text-red-500'>Delete</a></td>
                    </tr>
                ";
                }
            ?>
            </table></center>
        </div> 
    </body>
</html>
