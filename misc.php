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


































<?php
include 'db_connect.php';
if(isset($_GET['view2id'])){
    $id = $_GET['view2id'];
    $sqls = "SELECT * FROM product WHERE id = $id ";
    $results = mysqli_query($conn, $sqls);
    while($row = mysqli_fetch_assoc($results)){?>
        <img alt="picture" class="imgg" src="uploads/.<?=$row['picture'] ?>">
        <p><?=$row['category'];?></p>
        <p><?=$row['namee'];?></p>
        <p><?=$row['locationn'];?></p>
        <p><?=$row['comment'];?></p>
        <p><?=$row['datee'];?></p>
        <p><?php 
         $newemail = $row['email']; 
        
         ?></p>
        
<?php 
    } 
} 

?>   
<?php
$sqla = "SELECT contact FROM register WHERE email = '$newemail'";
$res = mysqli_query($conn,$sqla);
$row = mysqli_fetch_assoc($res);
$nam = $row['contact'];
echo $nam;
echo '<br>';
?>


































$sql  = "UPDATE product SET category='$category',namee='$prod_name',locationn='$loc',price='$price',picture='$newimgname',comment='$comment' WHERE id = $id";
                    $res = mysqli_query($conn, $sql);
                    if($res){
                    echo '<script>alert("updated succesfully")</script>';
                    header('location: product.php');
                    }else{
                        echo '<script>alert("could not update")</script>';
                    }
























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