    <?php
    include 'connection.php';
    if(isset($_POST["register"])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password =$_POST['password'];
    $time=time();
        $pattern = "/^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z]).{8,}$/";
        if (preg_match($pattern, $password)) {
            $sql2 = "select username from users where email='$email'";
            $result2 = mysqli_query($conn, $sql2);
            $count2 = mysqli_num_rows($result2);
            if ($username == "" || $password == "" || $email == "") {
                session_start();
                $_SESSION['register'] = 'All inputs are required';
                header("Location:register.php");
                die();
            } else {

                if ($count2 > 0) {
                    session_start();
                    $_SESSION['register'] = 'Email already exist';
                    header("location:register.php");
                    die();
                }
                else {
                    $password = md5($_POST['password']);
                    $save = "insert into users (username,email,password) values('$username','$email','$password')";
                    $res = mysqli_query($conn, $save);
                    if ($res) {
                        $find = "select * from users where email='$email'";
                        $retrieve = mysqli_query($conn, $find);
                        $users = mysqli_fetch_all($retrieve, MYSQLI_ASSOC);


                        //the password was correct
                        foreach ($users as $user) {
                            $user_id = $user['id'];
                            $role = $user['role'];
                            $username = $user['username'];
                        }


                        session_start();
                        $_SESSION['status'] = 'SUccessfully registered';
                        $_SESSION['username'] = $username;
                        $_SESSION['user_id'] =  $user_id;
                        $_SESSION['role'] = $role;
                        header("location:dashboard.php");
                    }
                    else {
                        session_start();
                        $_SESSION['register'] = 'Something went wrong';
                        header("location:register.php");
                    }
                }
            }

        }
        else {
            session_start();
            $_SESSION['register'] = 'Create a strong password with eight or more characters wit one Upercase letter or more and one or more lowercase';
            header("location:register.php");
        }


    }

    if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "select username from users where email='$email' && password='$password'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);

    if ($count == 1) {
    $find = "select * from users where email='$email'";
    $retrieve = mysqli_query($conn, $find);
    $users = mysqli_fetch_all($retrieve, MYSQLI_ASSOC);


    //the password was correct
    foreach ($users as $user) {
    $user_id = $user['id'];
    $role = $user['role'];
    $username = $user['username'];
    }
    if($role == '1'){
    session_start();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['status'] = 'welcome back';
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['role'] = $role;
    header("location:admindashboard.php");
    }
    else{
    session_start();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['status'] = 'welcome back';
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['role'] = $role;
    header("location:dashboard.php");
    }


    }

    else {
    session_start();
    $_SESSION['login'] = "The credentials does not match";
    header("Location:login.php");
    }
    }

    if(isset($_POST['confirm_order'])){
        session_start();
        $user_id=$_SESSION['user_id'];
        $totalminprice=$_POST['totalminprice'];
        $transactionid=$_POST['transactionid'];
        $date = date('d-m-y');
        $time = date('H:i:s');
        if($_POST['time']==null){
            $time = date('H:i:s');
        }
        else{
            $time =$_POST['time'];
        }
        $sql="update orders  set  transaction_id = '$transactionid', status='1' where user_id = '$user_id' and status='0'";
        $sqlrun=mysqli_query($conn,$sql);
        if($sqlrun){
            $save="insert into ordered_foods  (user_id,transaction_id,amount,time,date) values('$user_id','$transactionid','$totalminprice','$time','$date')";
            $saverun=mysqli_query($conn,$save);
            if($saverun){
                $_SESSION['status']="You have ordered food successfully";
                header("location:../dashboard.php");
            }
        }

    }
