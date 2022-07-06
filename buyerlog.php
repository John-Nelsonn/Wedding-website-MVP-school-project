<?php 
    session_start();
?>


<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <title>Login up as couple</title>
 
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
     <link href="buyerlog.css" type="text/css" rel="stylesheet">
     
    <link rel="icon" type="image/x-icon" href="images/pic1.png">
 </head>
 <body>
 <section class="container">
    <div class="pic">
    </div>
    <div class="forms">
    <span  class="around" >
        <form  method="POST">
            
            <h2>LOGIN</h2><br>
            <p class="err"></p>
            <p class="error"></p>
         
            <input required placeholder="Email Address" type="email" name="email" id="email" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"><br>
    
    
            <input class="password" placeholder="Password" name="password" type="password"  autocomplete="new-password" required="" id="id_password">
            <i class="bi bi-eye-slash" id="togglePassword"></i><br>
            
            <button class="sign" name="login" type="submit">Login</button><br><br>
            
            <span class="text">Don't have an account? <a class="log" href="buyersign.php">Sign Up</a></span><br><br>
            <a href="user1_login.php" style="text-decoration: none;color: orange;font-family: sans-serif;margin-left: 65px;" >Login as you&i vendor</a>
        
        </form>
    </span>
    </div>
 </section> 
 <script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#id_password");
    togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
            
            // toggle the icon
        this.classList.toggle("bi-eye");
        
        });
  
  
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }


 </script>
 <?php
 require "db_connect.php";

 if (isset($_POST['login'])) {
     $email    = $_POST['email'];
     $password = $_POST['password'];
     
        
 
     // Check if a user exists with given username & password
     $result = mysqli_query($conn, "select email, passwordd FROM registerspouse where email='$email' and passwordd='$password'");
 
     // Count the number of user/rows returned by query 
     $user_matched = mysqli_num_rows($result);
 
     // Check If user matched/exist, store user email in session and redirect to sample page-1
     
     
     if ($user_matched == 1) {
        $_SESSION["emaill"] = $email;
         header("location: buyview.php");
     } else {
        echo '
        
        <script>
            $(document).ready(function(){
               
                $(".error").html("Incorrect Email or Password");
            });
        </script>
        ';
       
     }
    

 }

 ?>
 
 </body>
 </html>