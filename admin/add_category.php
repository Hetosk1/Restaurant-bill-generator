<?php 

if(!isset($_GET['isAdmin'])){
  header("location: admin_login.php");
}

?>

<html>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Add Category</title>
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
        <form action="./add_category.php" method="post">
            <table cellpadding='2'>
            <td><p class="text-xl">Add Category</p></td>
            <tr>
                <td>Category : </td>
                <td><input type="text" class="border-2 p-1 border-indigo-500 rounded rounded-lg outline-0" name="category" required></td>
            </tr>
            <td><input type="submit" class="border-2 border-indigo-500 p-2 rouned rounded-lg hover:bg-indigo-500 hover:text-white" name="add_category" value="Add"></td>
            </table>
        </form>
        </div>
    </body>
<?php 
    if(isset($_POST['add_category'])){

        $categories = $_POST['category'];
        $conn = mysqli_connect("localhost", "root", "", "projects");
        $query = 'insert into categories(name) values("'.$categories.'");';
        $result = mysqli_query($conn, $query);
    }
?>
</html>
