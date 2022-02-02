
<?php

//include db connection
include 'config.php';


if(isset($_POST['upload'])){
    $user = $_POST['user'];
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $QUANTITY = $_POST['quantity'];
    $IMAGE = $_FILES['image'];
    print_r($_FILES['image']);
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_des = "uploadimage/".$img_name;
    move_uploaded_file($img_loc,'uploadimage/'.$img_name);

    

    //insert data

    mysqli_query($con,"INSERT INTO `list`(`user`,`Name`,`Price`,`Quantity`,`Image`) VALUES('$user', '$NAME', '$PRICE', '$QUANTITY','$img_des')");
    header("location:homepage.php");
}

?>