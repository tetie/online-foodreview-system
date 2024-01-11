<?php


include 'connection.php';
require_once 'vendor/autoload.php';
$data="select * from reviews ";
$datarun=mysqli_query($conn,$data);
$rows=mysqli_fetch_all($datarun,MYSQLI_ASSOC);
use Dompdf\Dompdf;


$html='<div style="background:green; font-size: 21px;">';
$html='<h2 style="font-size: 22px; text-align: center;text-transform: uppercase;">List Reviews</h2>';
$html .= '<table style="border:2px solid blue;margin-right1rem; font-size19px;border-collapse: collapse; margin-left: 7rem;background: burlywood;">   
            <style>
            th,td{
            border: 2px solid blue;
            border-collapse: collapse;
            }
            
</style>         
            <thead  style="border: 2px solid grey">
            <tr>
                <th>ID</th>
                <th>Comment</th>
                <th>FoodName</th>
                <th>Date</th>
                <th>time</th>
            </tr>
            
           </thead>';

foreach ($rows as $row){
    $html .='<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['comment'].'</td>
            <td>'.$row['food_name'].'</td>
            <td>'.$row['date'].'</td>
            <td>'.$row['time'].'</td>
</tr>';
}
$html .= '</table>';
$html .= '</div>';
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