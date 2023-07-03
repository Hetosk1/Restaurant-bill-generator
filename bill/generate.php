<?php
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

if(isset($_GET['authority'])){
    

        $conn = mysqli_connect('localhost',  'root', '', 'projects');   

        $query = "select * from bill;";
        $query_total = "select SUM(total) from bill";

        
        $result_total = mysqli_query($conn, $query_total);
        $result = mysqli_query($conn, $query);
        
        $row_total = mysqli_fetch_array($result_total);
        // print_r($row_total);
        // echo $row;

        $html = "
        <html>
            <head>
                <title>BIll</title>
                <script src='https://cdn.tailwindcss.com'></script>
                <style>
                body{
                    align-content: center;
                    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                }
                table{
                    // margin-top: 100px;
                    margin-left: auto;  
                    margin-right: auto;  
                    border-collapse: collapse;    
                    width: 500px;  
                    text-align: center;  
                    font-size: 20px;                      
                }
                .inner-table{
                    border: 1px solid rgb(99 102 241);
                    padding: 20px;
                    border-radius: 20px;
                }
                </style>
            </head>
            <body>
                <center><h1>4-Teen Restaurant</h1></center>
                <center><h3>Jamnagar, Gujarat</h3></center>
                <div class='inner-table'>
                <table cellpadding='10'>
                    <tr>
                       <th>Number</th>
                       <th>Name</th>
                       <th>Quantity</th>
                       <th>Price</th>
                       <th>Total</th>
                    </tr>
        ";
        while($row = mysqli_fetch_assoc($result)){
            $html .= "<tr>";
            $html .= "<td>".$row['id']."</td>";
            $html .= "<td>".$row['name']."</td>";
            $html .= "<td>".$row['quantity']."</td>";
            $html .= "<td>".$row['price']."</td>";
            $html .= "<td>".$row['total']."</td>";
            $html .= "</tr>";
        }
        $html .= "<hr/><tr><td>Total</td><td></td><td></td><td></td><td>".$row_total[0]."</td></tr>";
        $html .= "</table></div></body></html>";
    
        // echo $html;
    
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        $dompdf->stream('Bill.pdf');
        echo 'Salary slip generated successfully!';
        exit;
    }  else {
    header('location: bill.php');
}
?>

