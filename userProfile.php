<?php

session_start();
if(!isset($_SESSION['username'])) {
    header('location:login.php');
} 

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User profile page</title>
    <link rel="icon" type="image/svg+xml" href="/assets/favicon/favicon.svg"/>
      <!-- css -->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</head>
<body>

   
<nav class="navbar sticky-top navbar-light bg-light">
<div class="nav-list">
    <a href="#" style="text-decoration: none;"><?php echo $_SESSION['username']; ?> </a> 
    <button type="button" class="btn btn-dark"><a href="cart.php"><i class="fas fa-shopping-basket"></i></a></button>
    <button type="button" class="btn btn-dark"><a href="notes.php"><i class="far fa-clipboard"></i></a></button>
    <button type="button" class="btn btn-dark"><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></button>
</div>
</nav>
  
<h3 class="text-center">Update User info</h3>
<hr>

<div class="back-button column">
<span>Go Back</span>
<a href="homepage.php"><button type="button" class="btn btn-primary" style="width: 60px;"><i class="fas fa-arrow-alt-circle-left"></i></button></a>
</div>

<?php
      if(isset($_GET['success'])){
             ?>
            <div class="row">
            <small class="alert alert-success col-md-6 offset-3 text-center">User updated Successfully</small>
            </div>
            <br>
            <?php
      }
      if(isset($_GET['error'])){
          ?>
          <div class="row">
          <small class="alert alert-danger col-md-6 offset-3 text-center">Name and email is required</small>
          </div>
          <br>
          <?php
      }
    ?>

<div class="main" style="height:220px;">
       <form action="../processes/userProfileUpdateProcess.php" method="POST" enctype="multipart/form-data" class="user-form">
           <?php 
            include 'config.php';
            $currentUser = $_SESSION['username'];
            $sql = "SELECT * FROM users WHERE name= '$currentUser'";
            
            $gotResults = mysqli_query($con, $sql);
            if($gotResults) {
                if(mysqli_num_rows($gotResults)>0){
                    while($row = mysqli_fetch_array($gotResults)){
                        // print_r($row['name']);
                        ?>
                            <div class="form-group">
                                        <label for="">Name:</label>
                                            <input type="text" name="updateUserName" class="form-control" value="<?php echo $row['name']; ?>">
                                        </div>
                                        <!-- <div class="form-group">
                                        <label for="">Pasword:</label>
                                            <input type="password" name="updateUserPassword" class="form-control" value="<?php echo $row['password']; ?>">
                                        </div> -->
                                        <div class="form-group">
                                        <label for="">Email: </label>
                                            <input type="email" name="updateUserEmail" class="form-control" value="<?php echo $row['email']; ?>">
                                        </div>

                                        <div class="form-group">
                                        <label for="">Submit: </label>
                                            <input type="submit" name="update" class="btn btn-info" value="Update" style="background-color:#5bc0de;border:none;border-radius:7px;isolation: isolate;">
                            </div>
                        <?php
                    }
                }
            }
            
            ?>
            
       </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
<script src="./assets/js/dark-mode.js"></script>
</body>
</html>