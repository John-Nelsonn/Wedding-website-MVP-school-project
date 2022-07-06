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
            // $date = date('d-m-y h:i:s');

            $sql = "INSERT INTO product(category,namee,locationn,price,picture,comment,email) 
                    VALUES('$category','$prod_name','$loc','$price','$newimgname','$comment','$email') ";
            mysqli_query($conn, $sql);

            
            echo '<script>window.location.reload()</script>';
            
        }else{
          echo "<script>alert('we dont support such extensions')</script>";  
        }
    }
}else{
    echo '<script>alert("problem uploading image")</script>';
}
}






































$imgCount = count($_FILES['pic']);
        for($i=0;$i<$imgCount;$i++){

            $imageName    = $_FILES['pic']['name'][$i];
            $imageTempName = $_FILES['pic']['tmp_name'][$i];
            $targetPath    = "./uploads/.$imageName";
            if(move_uploaded_file($imageTempName, $targetPath)){
                $sqlq = "INSERT INTO product(category,namee,locationn,price,picture,comment,email) 
                VALUES('$category','$prod_name','$loc','$price','$imageName','$comment','$email') ";
                mysqli_query($conn, $sqlq);
                echo '<script>window.location.reload()</script>';
            }

        }









        <?php
    require "db_connect.php";
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

                    
                    $sql = "INSERT INTO product(category,namee,locationn,price,picture,comment,email) 
                    VALUES('$category','$prod_name','$loc','$price','$newimgname','$comment','$email') ";
                    mysqli_query($conn, $sql);
                   

                    echo '<script>window.location.reload()</script>';
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