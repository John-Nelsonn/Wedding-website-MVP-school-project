
<?php 
    session_start();
    require 'db_connect.php';

    if (!isset($_SESSION["emaill"])) {
        header("location: buyerlog.php");
    }
    $emaill = $_SESSION["emaill"];
   echo $emaill;
?>

<?php
include 'db_connect.php';
if(isset($_GET['viewid'])){
   $id = $_GET['viewid'];
   $sqf = "SELECT uniq FROM product WHERE id = $id";
   $res = mysqli_query($conn,$sqf);
   $row = mysqli_fetch_assoc($res);
   $nam = $row['uniq'];


    $sqls = "SELECT picture FROM product WHERE uniq = '$nam'" ;
    $results = mysqli_query($conn, $sqls);
    while($row = mysqli_fetch_assoc($results)){?>
        <img alt="picture" class="imgg" src="uploads/.<?=$row['picture'] ?>">
     
<?php 
    } 

    $sqlm = "SELECT * FROM product WHERE uniq = '$nam' group by uniq" ;
    $resu = mysqli_query($conn, $sqlm);
    while($row2 = mysqli_fetch_assoc($resu)){?>
        <p><?=$row2['namee']?></p>
        <p><?=$row2['category']?></p>
        <p><?='GH₵ '.$row2['price'].'.00'?></p>
        <p><?=$row2['locationn']?></p>
        <p><?=$row2['comment']?></p>
        <p><?=$row2['datee']?></p>
<?php 

    }



} 

?>
<?php
include 'db_connect.php';
$sqle = mysqli_query($conn,"SELECT * FROM replies WHERE email = '$emaill'");
while($r = mysqli_fetch_array($sqle)){
    echo $r['reply'];
}
?>
        
