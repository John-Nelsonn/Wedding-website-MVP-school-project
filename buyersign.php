<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <title>Sign up as couple</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
     <link href="buyersign.css" type="text/css" rel="stylesheet">
     
    <link rel="icon" type="image/x-icon" href="images/pic1.png">
 </head>
 <body>
    <section class="container">
        <div class="pic">
   
        </div>
        <div class="forms">
            <span  class="around">
                <form method="POST">
                    <h2>Create account</h2><br>
                
                    <input id="c_name" name="name_f" placeholder="Name" title="Enter valid company name" pattern="[A-Za-z0-9 -]+"  required /><br>

                    <input id="c_name" name="name_s" placeholder="Spouse Name" title="Enter valid company name" pattern="[A-Za-z0-9 -]+"  required /><br>

                    <input required type="email" placeholder="Email Address " name="email" id="email" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"><br>
  
                  
                    <input title="Invalid number" placeholder="Contact" name="contact" pattern="^[0]+[0-9]{9}" required/><br>

                   
                    <input class="password" name="password" type="password" placeholder="Password"  autocomplete="new-password" required="" id="id_password">
                    <i class="bi bi-eye-slash" id="togglePassword"></i><br>

                    <button class="sign" name="submit" type="submit">Register</button><br><br>
                    <span class="text">Already have an account? <a href="buyerlog.php" class="log">Login</a></span><br><br>
                    <a href="user1_signup.html" style="text-decoration: none;color: orange;font-family: sans-serif;margin-left: 65px;" >Sign up as you&i vendor</a>
            
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
    
    require 'db_connect.php';
        if(isset($_POST["submit"])){
            if(empty($_POST["name_f"]) || empty($_POST["name_f"]) || empty($_POST["email"]) || empty($_POST["contact"]) || empty($_POST["password"]) ){
                echo '<script>alert("Please fill the whole form")</script>';
            }
            else{
                $name1     = $_POST["name_f"];
                $name2     = $_POST["name_s"];
                $email    = $_POST["email"];
                $contact  = $_POST["contact"];
                $password = $_POST["password"];

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo '<script>alert("email is not valid ")</script>';
                }

                $sql2 = "SELECT * FROM registerspouse WHERE email='$email'";
                $res = mysqli_query($conn, $sql2);
               
                if(mysqli_num_rows($res) > 0){
                    echo '<script>alert("Sorry email already taken")</script>';
                }else{
                    $sql = "INSERT INTO registerspouse (name1,name2,email,contact,passwordd)
                    VALUES ('$name1','$name2','$email','$contact','$password') ";
                
                    if (mysqli_query($conn, $sql)) {
                        header("Location: buyerlog.php");
                    }else {
                    echo '<script>alert("Problem inserting to database")</script>';
                    }
                }
            }
        }
         
?>


 </body>
 </html>