<?php
include 'connection.php';
session_start();
if(!isset($_SESSION['user_id'])){
    $_SESSION['login']='login to be able to order the item';
    header('location:login.php');
}

if(isset($_POST['add_order'])){
//    session_start();
    $user_id=$_SESSION['user_id'];
    $item_id=$_POST['id'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $date = date('Y-m-d');

    $sql="insert into orders (item_id, name, price,user_id,date) values ('$item_id', '$name', '$price','$user_id','$date')";
    $sqlrun=mysqli_query($conn,$sql);
    if($sqlrun){
//        session_start();
        $_SESSION['order']='Order has been successfully added to cart';
        header('Location:food.php');
    }
}