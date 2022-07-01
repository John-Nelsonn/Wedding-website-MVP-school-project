<?php
include 'db_connect.php';
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM product WHERE id = $id ";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('location: product.php');
    }else{
        die(mysqli_error($conn));
    }
}
?>