<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('location:login.php');
} 

$errors = "";

include 'config.php';


if(isset($_POST['submit'])){
    $user = $_POST['user'];
    $noteTitle = $_POST['note_title'];
    $noteDescription = $_POST['note_description'];
    
    if(empty($noteTitle && $noteDescription)) {
        $errors = "You must fill in the inputs";
    }else {
        mysqli_query($con, "INSERT INTO `notes`(`user`,`note_title`, `note_description`) VALUES('$user','$noteTitle', '$noteDescription')");
        header("location:notes.php");
    }

}

//get local time and date
if(isset($_GET['submit'])){
    $currentDate = $_GET['current_date'];
    mysqli_query($con, "SELECT FROM `notes`(`current_date`) VALUES('$currentDate')");
    header("location:notes.php");
}




// for the .htaccess file to work
$loggedInUser = $_SESSION['username'];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notes</title>
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
    <a href="<?php echo $loggedInUser; ?>" style="text-decoration: none;"><?php echo $_SESSION['username']; ?> </a> 
    <button type="button" class="btn btn-dark"><a href="cart.php"><i class="fas fa-shopping-basket"></i></a></button>
    <button type="button" class="btn btn-dark"><a href="notes.php"><i class="far fa-clipboard"></i></a></button>
    <button type="button" class="btn btn-dark"><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></button>
</div>
</nav>

<div class="back-button column">
<span>Go Back</span>
<a href="homepage.php"><button type="button" class="btn btn-primary" style="width: 60px;"><i class="fas fa-arrow-alt-circle-left"></i></button></a>
</div>


    <div class="notes-title">
        <h2 style="text-align:center">Take a note now and don't forget later</h2>
    </div>

    <?php 
            include 'config.php';
            $currentUser = $_SESSION['username'];
            $sql = "SELECT * FROM users WHERE name= '$currentUser'";
            
            $gotResults = mysqli_query($con, $sql);
            if($gotResults) {
                if(mysqli_num_rows($gotResults)>0){
                    while($row = mysqli_fetch_array($gotResults)){
                        // print_r($row['user']); THE CURRENT USER logged on the pg
                        ?>
  <form action="notes.php" method="post" class="notes-form">

      <?php 
      if(isset($errors)) { ?>
          <p class='error-handler'><?php echo $errors; ?></p>
      <?php } ?>

    <input type="text" name="user" value="<?php echo $row['name']; ?>" style="display:none;">
    <input type="text" name="note_title" placeholder="Note title"  style="width:100%;">
    <br>
    <textarea name="note_description" cols="30" rows="4" placeholder="Note Description" style="width:100%;background-color: #fff;
  isolation: isolate;"></textarea>
    <br>
    <button class="new-note" type="submit" name="submit" style="width:100%;background-color: -internal-light-dark(rgb(255, 255, 255), rgb(59, 59, 59));border:none;border-radius:7px;isolation: isolate;">New note</button>
  </form>
  <?php
                    }
                }
            }
            
            ?>



<table class="note-table">
     <tbody>
    <?php $i = 1;
    include 'config.php';
    $notes = mysqli_query($con, "SELECT * FROM `notes`");
    while($row = mysqli_fetch_array($notes)){
        echo "
                <div class='notes'>
                    <div class='note'>
                            <div class='title'>
                            <a href='#'>$row[note_title]</a>
                            </div>
                            <div class='description'>
                            <p>$row[note_description]</p>
                            </div>
                            <a href='delete-note.php?id=$row[id]' class='btn btn-danger close'>x</a>
                            <div class='nr-row'>
                                <p>Index note: $i</p>
                            </div>
                            <p style='margin-bottom:-15px;'>created by: $row[user]</p>
                            <small>$row[current_date]</small>
                    </div>
                </div>
        ";
        $i++;
    }
   ?>
     </tbody>
</table>
<button id="scroll-btn" onclick="scrollToTop()"  title="go to top">☝️</button>
<script src="assets/js/scroll_to_top.js"></script>
<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
<script src="./assets/js/dark-mode.js"></script>
</body>
</html>