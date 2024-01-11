<?php


include 'connection.php';
require_once 'vendor/autoload.php';
$data="select * from orders ";
$datarun=mysqli_query($conn,$data);
$rows=mysqli_fetch_all($datarun,MYSQLI_ASSOC);





use Dompdf\Dompdf;
$html='<h2 style="font-size: 22px; text-align: center;text-transform: uppercase;">List Recent Orders</h2>';

$html .= '<table style="border:2px solid blue;border-collapse: collapse; margin-left: 7rem;background: burlywood;">   
            <style>
            th,td{
            border: 2px solid blue;
            border-collapse: collapse;
            }
            
</style>         
            <thead  style="border: 2px solid grey">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>user_id</th>
                <th>date</th>
            </tr>
            
           </thead>';

foreach ($rows as $row){
    $html .='<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['price'].'</td>
            <td>'.$row['user_id'].'</td>
            <td>'.$row['date'].'</td>
</tr>';
}
$html .= '</table>';
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('clearedstudents.pdf', array('Attachment' => 0));

?>