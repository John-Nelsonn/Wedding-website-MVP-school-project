<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catering and Waiters</title>
    <style>
    .pro{
        border: 1px solid yellow;
    
        width: 240px;
        height:240px;
    }
    .me{
        margin-right: 150px;
        width: 240px;
    }
    .imgg {
        width: 15%;
        height:15%;
    }
    </style>
</head>
<body>

<?php 
    include 'db_connect.php';
    $sql = "SELECT * FROM product WHERE category = 'Catering and Waiters'";
    $res = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($res)){?>
        <?php $id = $row['id'];?>
        <a class="me" href="view2.php?view2id='<?=$id?>'">
            <div class="pro">
                <img alt="picture" class="imgg" src="uploads/<?=$row['picture'] ?>">
                <p> <?=$row['namee'];?></p>
                <p><?="GH₵".$row['price'].'00';?></p>
            </div>
        </a>
     <?php
    }
    ?>

    
</body>
</html>
