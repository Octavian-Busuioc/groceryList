<?php
 include 'config.php';

 if(isset($_POST["id"]))
{
 foreach($_POST["id"] as $id)
 {
  $query = "DELETE FROM `list` WHERE id =$id";
  mysqli_query($con, $query);
 }
}
?>
