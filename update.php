<?php

session_start();
if(!isset($_SESSION['username'])) {
    header('location:login.php');
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <link rel="icon" type="image/svg+xml" href="/assets/favicon/favicon.svg"/>
      <!-- css -->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- js -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> -->
</head>
<body>

<?php

include 'config.php';
$ID = $_GET['id'];
$Record = mysqli_query($con, "SELECT * FROM `list` WHERE id=$ID");
$data = mysqli_fetch_array($Record);

?>


   
<nav class="navbar sticky-top navbar-light bg-light">
<div class="nav-list">
    <a href="#" style="text-decoration: none;"><?php echo $_SESSION['username']; ?> </a>
    <button type="button" class="btn btn-dark"><a href=""><i class="fas fa-shopping-basket"></i></a></button>
    <button type="button" class="btn btn-dark"><a href="notes.php"><i class="far fa-clipboard"></i></a></button>
    <button type="button" class="btn btn-dark"><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></button>
</div>
</nav>
  
<div class="back-button column">
<span>Go Back</span>
<a href="homepage.php"><button type="button" class="btn btn-primary" style="width: 60px;"><i class="fas fa-arrow-alt-circle-left"></i></button></a>
</div>


<div class="main" style="height: 300px;">
       <form action="update_one.php" method="POST" enctype="multipart/form-data" class="form-update">
       <label for="">Name:</label>
       <input type="text" value="<?php echo $data['Name'] ?>" name="name">
       <label for="">Price:</label>
       <input type="text" value="<?php echo $data['Price'] ?>" name="price">
       <label for="">Quantity:</label>
       <input type="number" value="<?php echo $data['Quantity'] ?>" name="quantity">
       <label for=""><span><i class='fas fa-paperclip'></i></span>Current Img:</label>
       <td><input type="file" id="files" name="image" value="<?php echo $data['Image'] ?>" style="display:none;"><img src="<?php echo $data['Image'] ?>" width='100' height='70'></td>
       <label for="files" class="btn btn-light" class="style-btn-files-homepg" style="margin-top:4px;">Select file</label>
       <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
       <button type="submit" name="update" class="btn btn-success">Edit</button>
       </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
<script src="./assets/js/dark-mode.js"></script>
</body>
</html>