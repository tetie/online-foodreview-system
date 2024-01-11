<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "Pass2022";
$dbname = "foodorder";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Function to generate random string
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 21)];
    }
    return $randomString;
}

// Generate random ID and check if it already exists in database
$unique_id = generateRandomString();
$sql = "SELECT * FROM users WHERE id = '$unique_id'";
$result = mysqli_query($conn, $sql);
while (mysqli_num_rows($result) > 0) {
// ID already exists, generate a new one and check again
$unique_id = generateRandomString();
$sql = "SELECT * FROM table WHERE id = '$unique_id'";
$result = mysqli_query($conn, $sql);
}
echo $unique_id;

//// Insert new record with unique ID into database
//$sql = "INSERT INTO table (id, column1, column2) VALUES ('$unique_id', 'value1', 'value2')";
//mysqli_query($conn, $sql);
//
//// Close database connection
//mysqli_close($conn);
?>
