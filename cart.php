<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['username'])) {
    header('location:login.php');
} 
include 'config.php';

if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
              $count = count($_SESSION["shopping_cart"]);
              $item_array = array(
                'item_id'      =>    $_GET["id"],
                'item_name'    =>    $_POST["hidden_name"],
                'item_price'   =>    $_POST["hidden_price"],
                'item_quantity'  =>   $_POST["quantity"]
            );
              $_SESSION["shopping_cart"][$count] = $item_array;
        }
         else
        {
              echo '<script>alert("Item Already Added")</script>';
              echo '<script>window.location="cart.php"</script>';
        }
    }
    else 
    {
        $item_array = array(
                'item_id'      =>    $_GET["id"],
                'item_name'    =>    $_POST["hidden_name"],
                'item_price'   =>    $_POST["hidden_price"],
                'item_quantity'  =>   $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
//remove item from cart
if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $key => $value)
        {
            if($value["item_id"] == $_GET["id"])
            {  
                //remove i
                unset($_SESSION["shopping_cart"]["$key"]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="cart.php"</script>';
            }
        }
    }
}


// for the .htaccess file to work
$loggedInUser = $_SESSION['username'];
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add to cart</title>
    <link rel="icon" type="image/svg+xml" href="/assets/favicon/favicon.svg"/>
      <!-- css -->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
</head>
<body>

  


<nav class="navbar sticky-top navbar-light bg-light">
  <div class="nav-list">
    <a href="<?php echo $loggedInUser; ?>" style="text-decoration: none;"><?php echo $_SESSION['username']; ?> </a> 
    <button type="button" class="btn btn-dark"><a href=""><i class="fas fa-shopping-basket"></i></a></button>
    <button type="button" class="btn btn-dark"><a href="notes.php"><i class="far fa-clipboard"></i></a></button>
    <button type="button" class="btn btn-dark"><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></button>
</div>
</nav>

<div class="back-button column">
<span>Go Back</span>
<a href="homepage.php"><button type="button" class="btn btn-primary" style="width: 60px;"><i class="fas fa-arrow-alt-circle-left"></i></button></a>
</div>

  
<div class="container" style="margin-right: 100px;">
   <h3 class="text-center">Add items to your cart</h3><br>
   <?php
    
    //select query
    $query= "SELECT * FROM product ORDER BY id ASC";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            ?>
            <div class="col-md-3" style="display:inline-flex;"> 
               <form method="post" action="cart.php?action=add&id=<?php echo $row["id"];?>">
               <div style="border:1px solid #333;background-color:#f1f1f1;border-radius:5px;border-radius:5px; padding:16px;" class="text-center">
                    <img src="<?php echo $row["image"]; ?>" width="50" height="50"><br>
                    <h4 class="text-info"><?php echo $row["name"]; ?></h4>
                    <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>
                    <h5>or</h5>
                    <img src="<?php echo $row["image2"]; ?>" width="50" height="50"><br>
                    <h4 class="text-info"><?php echo $row["name2"]; ?></h4>
                    <h4 class="text-danger">$ <?php echo $row["price2"]; ?></h4>
                    <input type="text" name="quantity" class="form-control" value="1">
                    <input type="text" name="hidden_name" value="<?php $row["name"]; ?>" class="input-value">
                    <input type="text" name="hidden_price" value="<?php $row["price"]; ?>" class="input-value">
                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
               </div>
               </form>
            </div>
            <?php
        }
    }
   ?>
   <div style="clear:both"></div>
   <br>
   <h3 class="text-center">Order Details</h3>
   <div class="table-responsive">
       <table class="table table-bordered">
          <tr>
            <th width="40%">Item Name</th>
            <th width="10%">Quantity</th>
            <th width="20%">Price</th>
            <th width="15%">Total</th>
            <th width="5%">Action</th>
          </tr>
          <?php
           if(!empty($_SESSION["shopping_cart"]))
           {
               $total = 0;
               foreach($_SESSION["shopping_cart"] as $key => $value) 
           {
          ?>
          <tr>
              <td><?php echo $value['item_name']; ?></td>
              <td><?php echo $value['item_quantity']; ?></td>
              <td>$<?php echo $value['item_price']; ?></td>
              <td>$<?php echo number_format((int)$value["item_quantity"] * (int)$value["item_price"],2); ?></td>
              <td><a href="cart.php?action=delete&id=<?php echo $value['item_id']; ?>"><span class="text-danger">Remove</span></a></td>
          </tr>
          <?php
              //total amount calculate
             $total = $total + ((int)$value["item_quantity"] * (int)$value['item_price']);
            }
            ?>
             <tr>
              <td colspan="3" class="float-right">Total</td>
              <td class="float-right">$ <?php echo number_format($total, 2);  ?></td>
          </tr>
            <?php
        }
          ?>
       </table>
   </div>
</div>
<script src="assets/js/scroll_to_top.js"></script>
<?php include('footer-cart.php'); ?>