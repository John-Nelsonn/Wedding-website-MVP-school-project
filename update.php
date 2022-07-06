<html>
    <body>
        <center>
            <div class="add_modal">
                <form method="POST" enctype="multipart/form-data">
                    <span class="close">&times</span><br>
            
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

    if(isset($_POST['sub'])){
    
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
            

                $sqlq  = "UPDATE product SET    namee='$prod_name',locationn='$loc',price='$price',
                picture='$imageName',comment='$comment' WHERE id = $id";

                $resa = mysqli_query($conn, $sqlq);
                
                if ($resa){
                    header('location: product.php');
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