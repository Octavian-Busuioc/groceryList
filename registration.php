<?php

session_start();
header('location:login.php');

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'grocerylist');

$name = $_POST['user'];
$pass = $_POST['password'];
$email = $_POST['email'];
$pass = md5($pass);


$s = "SELECT * FROM users WHERE name='$name'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);


if($num == 1) {
    echo "username already taken";
} else {
    $reg = "INSERT INTO users VALUES (NULL,'$name', '$pass','$email')";
    mysqli_query($con, $reg);
    echo "Registration Successful";
}


?>