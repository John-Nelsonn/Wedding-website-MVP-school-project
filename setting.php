
<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <title>Document</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
     <link href="setting.css" type="text/css" rel="stylesheet">
 </head>
 <body>
<nav class="nav">
    <?php 
        session_start();
        require 'db_connect.php';

        if (!isset($_SESSION["email"])) {
            header("location: user1_login.php");
        }
        $email = $_SESSION["email"];
        $sql   = "SELECT companyName FROM register WHERE email='$email'";
        $result= mysqli_query($conn, $sql); 
        while($row = mysqli_fetch_array($result)) {
            echo $row["companyName"];
        }
    ?>
</nav>



<?php 
    
    require 'db_connect.php';
    $sqll = "SELECT * FROM register WHERE email = '$email'";
    $res = mysqli_query($conn,$sqll);
    $row = mysqli_fetch_assoc($res);
    $nam = $row['companyName'];
    $con = $row['contact'];
    $pass = $row['passwordd'];

        if(isset($_POST["submit"])){
            if(empty($_POST["name"]) || empty($_POST["contact"]) || empty($_POST["password"]) ){
                echo '<script>alert("Please fill the whole form")</script>';
            }
            else{
                $name     = $_POST["name"];
          
                $contact  = $_POST["contact"];
                $password = $_POST["password"];

               

                $sql2 = "SELECT * FROM register WHERE email='$email'";
                $res = mysqli_query($conn, $sql2);
               
             
                $sql  = "UPDATE register SET companyName='$name',contact='$contact',passwordd='$password' WHERE email= '$email'";
                $res = mysqli_query($conn, $sql);
                if($res){
                echo '<script>alert("updated succesfully")</script>';
                // header('location: product.php');
                }else{
                    echo '<script>alert("could not update")</script>';
                }
                
            }
        }
         
?>








<div class="container">
    <section class="side_nav">
        <ul class="list">
            <li><a href="product.php">Products</a></li>
            <li><a href="vendornotifications.php">Notifications</a></li>
            <li><a href="setting.php">Settings</a></li>
            <li><a href="user1_logout.php">Logout</a></li>
        </ul>
    </section>

    <section class="main">
        <h2>Settings</h2>
        
        <form method="POST">
           
        
            <input id="c_name" name="name"  title="Enter valid company name" pattern="[A-Za-z0-9 -]+"  required value=<?php echo $pass; ?>><br>

            
         

            
            <input title="Invalid number"  name="contact" pattern="^[0]+[0-9]{9}" required value=<?php echo $con; ?>><br>

            
            <input class="password" name="password" type="password"   autocomplete="new-password" required="" id="id_password" value=<?php echo $pass; ?>>
            <i class="bi bi-eye-slash" id="togglePassword"></i><br>

            <button class="sign" name="submit" type="submit">Update</button><br><br>
            <button><a href="product.php">Back</a></button>
       
    
        </form>
    </section>
</div>
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

</body>
</html> 