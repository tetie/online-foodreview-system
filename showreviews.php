<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>reviews</title>
</head>
<body>

<?php include 'header.php'; ?>
<h2>Reviews of our beloved customers</h2>


<div class="">
    <div style="border: 1px solid; width: 26rem;" class="">
        <?php
        include 'connection.php';
        $orders="select * from reviews";
        $ordersrun=mysqli_query($conn,$orders);
        while($rows=mysqli_fetch_assoc($ordersrun)){
            ?>
            <textarea name="" id="" cols="20" rows="10" class="form-control"><?php echo $rows['comment'] ?></textarea>
            <p>Time:<?php echo $rows['time'] ?></p>
            <p>Date:<?php echo $rows['date'] ?></p>
            <?php
        }
        ?>
    </div>
</div>

</body>
</html>