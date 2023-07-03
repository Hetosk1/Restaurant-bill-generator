<?php 

if(isset($_POST['add'])){
  $name = $_POST['food_item'];
  // echo $_POST['food_item'] . "<br>";
  // echo $_POST['quantity'] . "<br>";

  $conn = mysqli_connect('localhost', 'root', '', 'projects');
  $query = 'select price from FoodTotal where name="'.$name.'";';
  // echo $query;
  $result = mysqli_query($conn, $query) ;
  $row = mysqli_fetch_assoc($result);
  if($result){
    // echo "success";
  } else {
    // echo "failed";
  }
  $name = $name;
  $price = $row['price'];
  $quantity = $_POST['quantity'];
  $total = $quantity * $price;

  // echo $name ;
  // echo $pice;
  // echo $quantity;
  // echo $total;

  $query_insert = 'insert into bill(name, quantity, price, total) values("'.$name.'", '.$quantity.', '.$price.', '.$total.');';
  $result_insert = mysqli_query($conn, $query_insert);
  if($result_insert){
    // echo "success insertion";
  } else {
    // echo "failed";
  }
  // echo $query_insert;
}


?>

<html>
  <head>
    <title>Bill Generator</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="bill.css">
    <script src="./fetch.js"></script>
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
                <a href="./bill.php">Generate Bill</a>
                </li>
                <li class="p-3 border-b-2 border-indigo-500 border-opacity-0 hover:border-opacity-100 hover:text-indigo-500 duration-200 cursor-pointer">
                <a href="../admin/admin_login.php">Admin Panel</a>
                </li>
                <li class="p-3 border-b-2 border-indigo-500 border-opacity-0 hover:border-opacity-100 hover:text-indigo-500 duration-200 cursor-pointer">
                <a href="../contact.html">Contact Us</a>
                </li>
            </ul>
        </nav>

        <!-- buttons --->
        <div class="w-3/12 flex justify-end">
        <a href='../index.html'>Home Page</a>
        </div>

    </header>



    <div class='flex flex-row '>
      <div class='p-5 m-5 border border-indigo-500 rounded rounded-lg'>
        <form action='bill.php' method='post' >
          <table>
            <tr>
              <th>No</th>
              <th>Meal Items</th>
              <th>Qty</th>
              <th>#</th>
              <th></th>
            </tr>
            <tr>
              <td>1</td>
              <td>
                <select name="food_item" id="food-item" class='p-3 pr-4 bg-indigo-200 rounded rounded-2xl '>
                  <?php 
                  $conn = mysqli_connect('localhost', 'root', '', 'projects');
                  $query = "select * from FoodTotal;";
                  $result = mysqli_query($conn, $query);
                  if(!$result){
                    echo "can't fetch queries";
                  }
                  while($row = mysqli_fetch_assoc($result)){
                    echo "<option value='".$row['name']."'>".$row['name']."</option>";
                  }
                  ?>
                  </select>
              </td>
              <td><input type="number" name="quantity" required class='input-number'></td>
              <td><button type="submit" id='button' class='border border-indigo-200 bg-indigo-200 p-3 rounded rounded-2xl' name="add">Add</button></td>
            </tr>
          </table>
        </form>
      </div>
      <div class='p-5 m-5 border border-indigo-500 rounded rounded-lg'>
        <div class='flex flex-row justify-between'>
          <form action="bill.php" method="post"><button name='reset' type='submit'>Reset</button></form>
          <form action="generate.php?authority=true" method="post"><button name='generate-bill' type='submit'>Generate Bill</button></form>
        </div>
        <table cellpadding='10'>
          <tr>
            <th>Number</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>#</th>
          </tr>
          <?php 
          $conn = mysqli_connect('localhost', 'root', '', 'projects');
          $query = 'select * from bill';
          $query_total = "select SUM(total) from bill;";
          $result_total = mysqli_query($conn, $query_total);
          $row_total = mysqli_fetch_array($result_total);
          $result = mysqli_query($conn, $query);
          while($row = mysqli_fetch_assoc($result)){
            echo "
              <tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['quantity']."</td>
                <td>".$row['price']."</td>
                <td>".$row['total']."</td>
                <td><form action='bill.php?id=".$row['id']."' method='post'><button name='delete' type='submit'>Delete</button></form></td>
              </tr>
            ";
          }
          echo "Total : ".  $row_total[0];
          ?>
        </table>
      </div>
    </div>


    
  </body>
</html>

<?php 

if(isset($_POST['delete'])){
  $conn = mysqli_connect('localhost', 'root', '', 'projects');
  $query = "delete from bill where id=".$_GET['id'].";";
  // echo $query;
  $result = mysqli_query($conn, $query);
}


if(isset($_POST['reset'])){
  // echo "hello word";
  $conn = mysqli_connect('localhost', 'root', '', 'projects');
  $query = "truncate table bill;";
  // echo $query;
  $result = mysqli_query($conn, $query);
}

  
?>