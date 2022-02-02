<?php

session_start();
if(!isset($_SESSION['username'])) {
    header('location:login.php');
} 


// for the .htaccess file to work
$loggedInUser = $_SESSION['username'];
 

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
    <link rel="icon" type="image/svg+xml" href="/assets/favicon/favicon.svg"/>
      <!-- css -->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">

    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <!-- this jquery link is for that clear all btn to work -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

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

<!-- weather api -->
<h5 style="text-align: center">
<?php
$name_of_the_city = 'Bucharest';
$api_key = ''; //the unique api key

$api_url = 'http://api.openweathermap.org/data/2.5/weather?q='.$name_of_the_city.'&appid='.$api_key;

$get_weather_data = json_decode( file_get_contents($api_url), true);

$temp = $get_weather_data['main']['temp'];
$feels_like = $get_weather_data['main']['feels_like'];
$humidity = $get_weather_data['main']['humidity'];
$wind = $get_weather_data['wind']['speed'];

$temp_celsius = $temp - 273.15;
$temp_feels_like_in_celsius = $feels_like - 273.15;


echo 'Current temperature in Bucharest,Romania: ' . round($temp_celsius) . "°C." . ' It feels like: ' . round($temp_feels_like_in_celsius) . "°C. ". 'Humidity: ' . $humidity . '%. ' . 'Wind speed: ' . $wind . 'km/h.';

?>
</h5>
  
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
<div class="main">
       <form action="insert.php" method="POST" enctype="multipart/form-data" class="form-homepg">
       <label for="">User</label>
       <input type="text" name="user" value="<?php echo $row['name']; ?>">
       <label for="">Product:</label>
       <input type="text" name="name">
       <label for="">Price:</label>
       <input type="text" name="price" id="">
       <label for="">Quantity</label>
       <input type="number" name="quantity" min="1" max="10" value="1">
       <br>
       <label for=""><span><i class='fas fa-paperclip'></i></span>Image:</label>
       <input type="file" name="image" style="width: 215px">
       <button name="upload" class="btn btn-light" style="background-color: -internal-light-dark(rgb(255, 255, 255), rgb(59, 59, 59));border:none;border-radius:7px;isolation: isolate;">Upload</button>
       </form>
</div>
<?php
                    }
                }
            }
            
            ?>
<br>


    <!-- fetch data -->

    <div class="container">

    <table id="datatableid" class="display" style="width:100%">
  <thead>
    <tr>
      <th class="text-center">
      <button type="button" name="btn_delete" id="btn_delete" class="btn btn-danger">Clear All</button>
      </th>
      <th scope="col">User</th>
      <th scope="col">Index</th>
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Image</th>
      <th scope="col">Delete</th>
      <th scope="col">Update</th>
    </tr>
  </thead>
  <tbody>

   
    <?php $j = 1;
     include 'config.php';
     $pic = mysqli_query($con,"SELECT * FROM `list`");
     while($row = mysqli_fetch_array($pic)){
     echo "
        <tr>
            <td class='text-center'>
            <input type='checkbox' value='$row[id]' />
            </td>
            <td>$row[user]</td>
            <td>$j</td>
            <td>$row[Name]</td>
            <td>$row[Price]</td>
            <td>$row[Quantity]</td>
            <td><img src='$row[Image]' width='100' height='70'></td>
            <td><a href='delete.php?id=$row[id]' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a></td>
            <td><a href='update.php?id=$row[id]' class='btn btn-warning'><i class='fas fa-edit'></i></a></td>
        </tr>
        ";
        $j++;
     }
    ?>

  </tbody>
</table>
</div>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

<script>
  $(document).ready(function() {
    $('#datatableid').DataTable({
       "pagingType": "full_numbers",
       "lengthMenu": [
         [5,15,30, -1],
         [5,15,30, "All"]
       ],
       responsive: true,
       language: {
         search: "_INPUT_",
         searchPlaceholder: "Search grocery list item",
       }
    });
});
</script>
<script>
  $(document).ready(function() {
  $('#btn_delete').click(function(){
      if(confirm("Are you sure you want to delete this?"))
      {
        var id = [];

        $(':checkbox:checked').each(function(i){
            id[i] = $(this).val();
          });

          if(id.length === 0) //tell you if the array is empty
              {
                alert("Please Select atleast one checkbox");
              }
      else 
      {
        $.ajax({
          url:'clear-all.php',
          method:'POST',
          data:{id:id}
        });
      }
      }
      else 
      {
        return false;
      }
  });

});
</script>
<?php include('footer.php'); ?>
