<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav>
<?php 
    session_start();
    require 'db_connect.php';

    if (!isset($_SESSION["emaill"])) {
        header("location: buyerlog.php");
    }
    $emaill = $_SESSION["emaill"];
   echo $emaill;
?>
</nav>

<?php
include 'db_connect.php';
if(isset($_GET['view2id'])){
    $id = $_GET['view2id'];
    $sqls = "SELECT uniq FROM product WHERE id = $id ";
    $results = mysqli_query($conn, $sqls);
    $rowq = mysqli_fetch_assoc($results);
    $resul = $rowq['uniq'];
  


    $sql1 = "SELECT picture FROM product WHERE uniq = '$resul'" ;
    $result = mysqli_query($conn, $sql1);
    while($row1 = mysqli_fetch_assoc($result)){?>
        <img alt="picture" class="imgg" src="uploads/.<?=$row1['picture'] ?>">
        <?php 
    } 
    
    $sqlm = "SELECT * FROM product WHERE uniq = '$resul' group by uniq" ;
    $resu = mysqli_query($conn, $sqlm);
    while($row2 = mysqli_fetch_assoc($resu)){?>
        <p><?=$row2['namee']?></p>
        <p><?=$row2['category']?></p>
        <p><?='GH₵ '.$row2['price'].'.00'?></p>
        <p><?=$row2['locationn']?></p>
        <p><?=$row2['comment']?></p>
        <p><?=$row2['datee']?></p>
        <p><?php 
         $newemail = $row2['email']; 
        
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
<form method="post">
    <input name ="chat" required>
    <button>Chat</button>
</form>
<?php
include 'db_connect.php';
if ((!empty('chat')) && isset($_POST['chat'])){
    $chat = $_POST['chat'];

    $swl = "INSERT INTO chats (chat,vendoremail,buyeremail) VALUES ('$chat','$newemail','$emaill')";
    $resd = mysqli_query($conn,$swl);
    if($resd){
        echo '<script>alert("sent")</script>';
    }else{
        echo '<script>alert("not sent")</script>';
    }
    //checking for previous chat
  
    
    



   
}


?>
<script>
      
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

</script>
</body>
</html>


