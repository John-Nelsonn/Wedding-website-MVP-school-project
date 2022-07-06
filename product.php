
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
     <title>You&i vendor</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
     <link href="product.css" type="text/css" rel="stylesheet">
     <link rel="icon" type="image/x-icon" href="images/pic1.png">
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
        <button id="add">Add Product</button>
        <div>
        <?php 
        include 'db_connect.php ';
      
	    $sql = "SELECT * FROM product WHERE email='$email' group by uniq ";
	
	    $res = mysqli_query($conn, $sql);

        if(mysqli_num_rows($res) > 0){
            while($images = mysqli_fetch_assoc($res)){ ?>
            <?php $id = $images['id'];?>
            <?php 
                    $uni = $images['uniq'];
                ?>
            <a href="view.php?viewid='<?=$id?>'">
            <div class="record">
                <img alt="picture" class="imgg" src="uploads/.<?=$images['picture'] ?>">
                <h4><b><p class="namee"><?=$images['namee'] ?></p></b></h4>
                <p class="price">GH₵ <?=$images['price'].'.00'; ?></p>
               
             
 
                

                
                
                <form method="GET" class="actions">
                    
                    <!-- <button><a href="update.php?updateid='<?=$id?>'">Edit</a></button><br> -->
                    <button><a href="delete.php?deleteid='<?=$id?>'">Delete</a></button>
                   
                </form>
            </div>
            </a>
        <?php 
            } 
        } 
        ?>
        </div>
        <div id="myModal" class="modal">
        <center>
            <div class="add_modal">
                <form method="POST" enctype="multipart/form-data">
                    <span class="close">&times</span><br>
                    <label>Select Category</label><br>
                        <select name="category">
                            <option>Fashion and accessories</option>
                            <option>Catering and Waiters</option>
                            <option>Wedding Cake</option>
                            <option>Rentals</option>
                            <option>Decoration</option>
                            <option>Media and Photography</option>
                            <option>Event Center and planning</option>
                            <option>Entertainment and Music</option>
                            <option>Souvenirs and gifts</option>
                            <option>Beauty and Salon</option>
                       
                        </select>
                    </label><br><br>
                    <label>Name of Product</label>
                    <input type="text" name="prod_name" required/><br><br>
                    <label>Location of business</label><br>
                        <select name="loc">
                            <option>Eastern region</option>
                            <option>Greater Accra region</option>
                            <option>Ashanti region</option>
                            <option>Ahafo region</option>
                            <option>Bono East region</option>
                            <option>Brong Ahafo</option>
                            <option>Central region</option>
                            <option>North East region</option>
                            <option>Northern region</option>
                            <option>Oti region</option>
                            <option>Savvanah region</option>
                            <option>Upper East region</option>
                            <option>Upper West region</option>
                            <option>Western region</option>
                            <option>Western North region</option>
                            <option>Volta region</option>
                        </select><br><br>

                    <label>Price</label><br>
                    GH₵<input style="width: 130px;" type="number" name="price" required/><br><br>
                
                    <label>Upload Pictures</label>
                    <input type="file" name="pic[]" accept ="image/jpeg,image/jpg,image/png" required multiple/><br>
                
                    <label>Extra Information</label><br>
                    <textarea class="textt" name="comment" required>
                    </textarea><br><br>

                    <button id="sub" name="sub">Submit Ad</button>
            
                <form>
            </div> 
        <center>
        </div>
    </section>
</div>
<?php
// Return current date from the remote server

?>

<script>
   
    let modal = document.getElementById("myModal");
    let btn = document.getElementById("add");
    btn.onclick = function() {
        modal.style.display = "block";
        
    }
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
        modal.style.display = "none";
    }
    $
    // window.onclick = function(event) {
    //     if (event.target == modal) {
    //     modal.style.display = "none";
    //     }
    // } 
    $(document).ready(function(){
        $(".record").click(function(){
            $(".more").show();
        });
        $(".clo").click(function(){
            $(".more").hide();
        });
        $(".rec").click(function(){
            $(".more").hide();
        });
    });
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<?php
    require "db_connect.php";
   

    if(isset($_POST['sub'])){
        $category = $_POST["category"];
        $prod_name = $_POST["prod_name"];
        $loc = $_POST["loc"];
        $price = $_POST["price"];
        $comment = $_POST["comment"];

        $imgCount = count($_FILES['pic']['name']);
        $uniqq = uniqid();
        for($i=0;$i<$imgCount;$i++){

            $imageName    = $_FILES['pic']['name'][$i];
            $imageTempName = $_FILES['pic']['tmp_name'][$i];
            $targetPath    = "./uploads/.$imageName";
            
            if(move_uploaded_file($imageTempName, $targetPath)){
                $sqlq = "INSERT INTO product(category,namee,locationn,price,picture,comment,email,uniq) 
                VALUES('$category','$prod_name','$loc','$price','$imageName','$comment','$email','$uniqq') ";
                $resa = mysqli_query($conn, $sqlq);
                
                if ($resa){
                    echo '<script>window.location.reload()</script>';
                }else{
                    echo '<script>alert("unable to upload product")</script>';
                }
            }

        }
}
    // if(isset($_GET["id"])){
       
       
    // }  
 
?>
</body>
</html> 