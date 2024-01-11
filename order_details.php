<?php
include 'connection.php';
if(isset($_GET['order_now'])){
    $id=$_GET['id'];
}
$sql="select * from items where id='$id'";
$sqlrun=mysqli_query($conn,$sql);
$items=mysqli_fetch_all($sqlrun,MYSQLI_ASSOC);
foreach ($items as $item){
    $price=$item["price"];
    $image=$item["image"];
    $name=$item["name"];
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>orders</title>
    <link rel="stylesheet" href="css/stylo.css">
</head>
<body>
<?php include 'header.php'; ?>
<style>
    .itemdetails{
        width:100vw;
        height: 90vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        /*background-color: grey;*/
    }
    .item{
        width: 30rem;
        min-height: 40rem;
        max-height: 60rem;
        overflow: scroll;
        padding: 1rem;
        background-color: pink;
    }
</style>
<div class="itemdetails">
    <div class="item">
        <h4 style="text-align: center;text-transform: uppercase;"><?php echo $name; ?></h4>
        <img src="Foods/fooditems/<?php echo $image ?>" alt="" width="100%" height="300">
        <div class="d-flex align-items-center justify-content-center flex-row m-1">
            <form action="orderprocessor.php" method="post">
                <input type="number" hidden="" name="id" value="<?php echo $id; ?>">
                 <input type="number" hidden="" name="price" value="<?php echo $price; ?>">
                <input type="text"  hidden="" name="name" value="<?php echo $name; ?>">
                <button  name="add_order" class="btn btn-danger  w-100">Add order to cart</button>
            </form>
        </div>
        <p class="text-center text-uppercase ">What our customers say about this food</p>
        <hr>
        <div class="show">
            <?php
            $comment = "SELECT r.comment,r.time,r.date, r.user_id, u.profile_image 
           FROM reviews r 
           INNER JOIN items i ON i.id = r.food_id 
           JOIN users u ON u.id = r.user_id 
           WHERE r.food_id = '$id' 
           ORDER BY r.date DESC, r.time DESC";
            $commentsrun = mysqli_query($conn, $comment);
            $num = mysqli_num_rows($commentsrun);

            if($num>0){
            while ($row = mysqli_fetch_array($commentsrun)) {
                ?>
           <div class="d-flex border-bottom flex-row align-items-center">

                    <img style="border-radius: 100%;" src="profiles/<?php echo $row['profile_image']?>" width="100" height="100" alt="">
                 <p><?php echo $row['comment'] ?><br><span class="bg-secondary text-white pe-2 py-1"><?php echo $row['date']?></span><span class="bg-secondary py-1 ps-4 text-white"><?php echo $row['time'] ?></span></p>


                </div>

           <?php
            }}

            ?>
            <div class="d-flex border-bottom flex-row align-items-center">

                <img style="border-radius: 100%;" src="profiles/user.jpg" width="100" height="100" alt="">
                <p> This food is yummy I reaaly like<br><span class="bg-secondary py-1 ps-4 text-white">06:32</span></p>


            </div>
            <div class="d-flex border-bottom flex-row align-items-center">

                <img style="border-radius: 100%;" src="profiles/user2.jpg" width="100" height="100" alt="">
                <p> This food is yummy I reaaly like<br><span class="bg-secondary py-1 ps-4 text-white">05:32</span></p>


            </div>

        </div>
    </div>

</div>
</body>
</html>