<?php
session_start();

if(isset($_POST['update'])){
   include '../config.php';


   $userNewName = $_POST['updateUserName'];
   $userNewEmail = $_POST['updateUserEmail'];
   // $userNewPassword = $_POST['updateUserPassword'];


   if(!empty($userNewName) && !empty($userNewEmail)) {
           
      $loggedInUser = $_SESSION['username'];

      mysqli_query($con,"UPDATE users SET `name` = '$userNewName', `email` = '$userNewEmail' WHERE `name` = '$loggedInUser'");

      
      header('location:../userProfile.php?success=userUpdated');
      exit;

    }
    else {
      header('location:../userProfile.php?error=emptyNameAndEmail');
      exit;
   }


}

?>