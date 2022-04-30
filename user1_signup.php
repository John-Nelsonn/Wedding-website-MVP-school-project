<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <title>Document</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
     <link href="user1_signup.css" type="text/css" rel="stylesheet">
 </head>
 <body>
 <section class="signup_modal">
    <form method="POST">
        <label for="c_name">Company name</label>
        <input id="c_name" name="name" title="Enter valid company name" pattern="[A-Za-z0-9 -]+"  required/><br><br>

        <label for="email">E-mail address</label>
        <input required type="email" name="email" id="email" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"><br><br>
  
        <label for="contact">Contact</label>
        <input title="Invalid number" name="contact" pattern="^[0]+[0-9]{9}" required/><br><br>

        <label for="password">Password</label>
        <input class="password" name="password" type="password"  autocomplete="new-password" required="" id="id_password">
        <i class="bi bi-eye-slash" id="togglePassword"></i><br><br>

        <button class="sub_button" name="submit" type="submit">Register</button><br><br>
        <center>
        <a href="user1_login.php" class="log">Login</a>
        </center>
    </form>
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
    
    require 'db_connect.php';
        if(isset($_POST["submit"])){
            if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["contact"]) || empty($_POST["password"]) ){
                echo '<script>alert("Please fill the whole form")</script>';
            }
            else{
                $name     = $_POST["name"];
                $email    = $_POST["email"];
                $contact  = $_POST["contact"];
                $password = $_POST["password"];

                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo '<script>alert("email is a valid ")</script>';
                } else {
                    echo '<script>alert("email is not valid")</script>';
                }

                $sql2 = "SELECT * FROM register WHERE email='$email'";
                $res = mysqli_query($conn, $sql2);
               
                if(mysqli_num_rows($res) > 0){
                    echo '<script>alert("Sorry email already taken")</script>';
                }else{
                    $sql = "INSERT INTO register (companyName,email,contact,passwordd)
                    VALUES ('$name','$email','$contact','$password') ";
                
                    if (mysqli_query($conn, $sql)) {
                        header("Location: user1_login.php");
                    }else {
                    echo '<script>alert("Problem inserting to database")</script>';
                    }
                }
            }
        }
         
?>


 </body>
 </html>