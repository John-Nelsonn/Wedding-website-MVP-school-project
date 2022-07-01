<html>
    <body>
        <center>
            <div class="add_modal">
                <form method="POST" enctype="multipart/form-data">
                    <span class="close">&times</span><br>
                    <label>Select Category</label><br>
                        <select name="category">
                            <option>Fashion and style</option>
                            <option>Catering and Waiters</option>
                            <option>Rentals</option>
                            <option>Media</option>
                            <option>Mc</option>
                            <option>Souvenirs and gifts</option>
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
                    <input type="file" name="pic" accept ="image/jpeg,image/jpg,image/png" required multiple/><br>

                    <label>Extra comments</label><br>
                    <textarea class="textt" name="comment" required>
                    </textarea><br><br>

                    <button id="sub" name="sub">Update Ad</button>
            
                <form>
            </div> 
        <center>
<script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<?php
    require "db_connect.php";
    $id = $_GET['updateid'];
 

    if(isset($_POST['sub']) && isset($_FILES['pic'])){
        $category = $_POST["category"];
        $prod_name = $_POST["prod_name"];
        $loc = $_POST["loc"];
        $price = $_POST["price"];
        $comment = $_POST["comment"];
        
        
        

        
        // echo '<pre>';
        // print_r($_FILES['pic']); 
        // echo '</pre>';
        $imgname = $_FILES['pic']['name'];
        $imgsize = $_FILES['pic']['size'];
        $tmpname = $_FILES['pic']['tmp_name'];
        $error   = $_FILES['pic']['error'];
        
        if($error === 0){
            if($imgsize > 1000000){
                echo '<script>alert("image too large")</script>';
            }else{
               $img_ex = pathinfo($imgname, PATHINFO_EXTENSION); 
               $img = strtolower($img_ex);

               $allowed_ex = array('jpg','jpeg','png');
               if(in_array($img,$allowed_ex)){
                    $newimgname = uniqid("IMG-",true).'.'.$img; 
                    $upload_path = 'uploads/'.$newimgname; 
                    move_uploaded_file($tmpname,$upload_path);

                    
                    $sql  = "UPDATE product SET category='$category',namee='$prod_name',locationn='$loc',price='$price',picture='$newimgname',comment='$comment' WHERE id = $id";
                    $res = mysqli_query($conn, $sql);
                    if($res){
                    echo '<script>alert("updated succesfully")</script>';
                    header('location: product.php');
                    }else{
                        echo '<script>alert("could not update")</script>';
                    }
                }else{
                  echo "<script>alert('we dont support such extensions')</script>";  
                }
            }
        }else{
            echo '<script>alert("problem uploading image")</script>';
        }
    }
    // if(isset($_GET["id"])){
       
       
    // }  
 
?>
    </body>
</html>