<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login & registration</title>
    <link rel="icon" type="image/svg+xml" href="/assets/favicon/favicon.svg"/>

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
    <script src="assets/js/showHide_pass.js"></script>
    <script src="assets/js/showHide_pass2.js"></script>
</head>
<body>

<?php 

if(isset($_POST['register_button'])) {
    echo '
    <script>

    $(document).ready(function(){
        $("#first").hide();
        $("#second").show();
    });

    </script>
    
    ';
}

?>

<h3 style="
  font-family: 'Ubuntu Mono', monospace;
  position: absolute;
  width: 550px;
  top: 20%;
  left: 61%;
  transform: translate(-50%,-50%);">Grocerylist<i class='bx bx-cart'></i></h3>

    <div class="container_login">
        <div class="login-box">
       
          <div class="row">
        

            <div class="col-md-6" id="first">
                <h3 class="text-heading-color">Login</h3>
                <form action="validation.php" method="POST">
               <div class="form-group">
                   <label class="text-label-color">Username</label>
                   <input type="text" name="user" class="form-control" required>
               </div>
               <div class="form-group">
                   <label class="text-label-color">Password</label>
                   <input type="password" name="password" class="form-control" required id="password">
                            <span class="show-hide-eye">
                            <i  class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
                            </span>
               </div>
               <button type="submit" class="btn btn-primary">Login</button>
               <br>
               <a href="#" id="signup">Need and account? Register here!</a>
               </form>
            </div>

            
        

            <div class="col-md-6" id="second">
                <h3 class="text-heading-color">Register</h3>
                <form action="registration.php" method="POST">
               <div class="form-group">
                   <label class="text-label-color">Username</label>
                   <input type="text" name="user" class="form-control" required>
               </div>
               <div class="form-group">
                   <label class="text-label-color">Password</label>
                   <input type="password" name="password" class="form-control" required  id="pass_two">
                   <span class="show-hide-eye">
                    <i class="fa fa-eye" id="second_eye" onclick="myFunction()"></i>
                    </span>
               </div>
               <div class="form-group">
                   <label class="text-label-color">Email</label>
                   <input type="email" name="email" class="form-control" required>
               </div>
               <button type="submit" class="btn btn-primary" name="register_button">Register</button>
               <br>
               <a href="#" id="signin">Already have an account? Sign in here!</a>
               </form>
            </div>

      
            
            </div>

    

        </div>
    </div>
</body>
</html>