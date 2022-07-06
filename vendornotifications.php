<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    session_start();
    require 'db_connect.php';

    if (!isset($_SESSION["email"])) {
        header("location: user1_login.php");
    }
    $email = $_SESSION["email"];
    


    include 'db_connect.php';
    $sqll = "SELECT * FROM chats WHERE vendoremail = '$email'";
    $res = mysqli_query($conn,$sqll);
    while($row = mysqli_fetch_array($res)){?>
        <div style="border: 1px solid black;">
        <p><?=$row['chat']?></p>
        <p><?=$row['chattime']?></p>
        <?php 
            $vendor=$row['vendoremail'];
            $buyer=$row['buyeremail'];
            $id = $row['id']; 
        ?>
        
        <br>
        <form method="post">
        <input  name="ans" required>
        <input name="sub" type="submit" value="submit">
        </form>
        </div>
        <?php
    }
?>
<?php 
    include 'db_connect.php';
    if(isset($_POST['sub'])){
        
        $ans = $_POST['ans'];
        $sal = "INSERT INTO replies (id,reply,vendoremail,buyeremail) VALUES ('$id','$ans','$vendor','$buyer') ";
        $resw = mysqli_query($conn,$sal);
        if($resw){
            echo '<script>alert("Message sent")</script>';
        }else{
            echo '<script>alert("Message not sent")</script>';
        }
    }
?>
<script>
      
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    
</script>
</body>
</html>
