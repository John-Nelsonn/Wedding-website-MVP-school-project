<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="buyview.css">
    <title>Document</title>
</head>
<body>

<?php 
    session_start();
    require 'db_connect.php';

    if (!isset($_SESSION["emaill"])) {
        header("location: buyerlog.php");
    }
    $emaill = $_SESSION["emaill"];
    $sql   = "SELECT name1,name2 FROM registerspouse WHERE email='$emaill'";
    $result= mysqli_query($conn, $sql); 
    while($row = mysqli_fetch_array($result)) {
        echo $row["name1"];
        echo $row["name2"];
    }
?>
 <li><a href="buy_logout.php">Logout</a></li>
<form method="post">
    <input name="cat" list="categories" required>
    <datalist id ="categories">
        <option value="Fashion and accessories">
        <option value="Catering and Waiters">
        <option value="Wedding Cake">
        <option value="Rentals">
        <option value="Decoration">
        <option value="Media and Photography">
        <option value="Event Center and planning">
        <option value="Entertainment and Music">
        <option value="Souvenirs and gifts">
        <option value="Beauty and Salon">
            
    </datalist> 
    <input name="submit" type="submit" value="search">
</form>


<div class="over">
<?php
include 'db_connect.php';
$sql1 = "SELECT * FROM product WHERE category = 'Fashion and accessories' LIMIT 1";
$sql2 = "SELECT * FROM product WHERE category = 'Catering and Waiters' LIMIT 1";
$sql3 = "SELECT * FROM product WHERE category = 'Wedding cake' LIMIT 1";
$sql4 = "SELECT * FROM product WHERE category = 'Rentals' LIMIT 1";
$sql5 = "SELECT * FROM product WHERE category = 'Decoration' LIMIT 1";
$sql6 = "SELECT * FROM product WHERE category = 'Media and Photography' LIMIT 1";
$sql7 = "SELECT * FROM product WHERE category = 'Event Center and Planning' LIMIT 1";
$sql8 = "SELECT * FROM product WHERE category = 'Entertainment and Music' LIMIT 1";
$sql9 = "SELECT * FROM product WHERE category = 'Souvenirs and gifts' LIMIT 1";
$sql9a = "SELECT * FROM product WHERE category = 'Beauty and Salon' LIMIT 1";


	
$res = mysqli_query($conn, $sql1);
$ress = mysqli_query($conn, $sql2);
$res1 = mysqli_query($conn, $sql3);
$res2 = mysqli_query($conn, $sql4);
$res3 = mysqli_query($conn, $sql5);
$res4 = mysqli_query($conn, $sql6);
$res5 = mysqli_query($conn, $sql7);
$res6 = mysqli_query($conn, $sql8);
$res7 = mysqli_query($conn, $sql9);
$res8 = mysqli_query($conn, $sql9a);



echo '<div style="display:flex;">';
if(mysqli_num_rows($res) > 0){
    while($re = mysqli_fetch_assoc($res)){ ?>
    <?php $id = $re['id'];?>
    <a class="me" href="view2.php?view2id='<?=$id?>'">
    <div class="pro">
        <img alt="picture" class="imgg" src="uploads/.<?=$re['picture'] ?>">
        <p><?=$re['namee'];?></p>
        <p class="price">GH₵ <?=$re['price'].'.00'; ?></p>
        
    </div>
    </a>
    <?php 
    }

}
if(mysqli_num_rows($ress) > 0){
    while($ret = mysqli_fetch_assoc($ress)){ ?>
     <?php $id = $ret['id'];?>
    <a class="me" href="view2.php?view2id='<?=$id?>'">
    <div class="pro">
        <img alt="picture" class="imgg" src="uploads/.<?=$ret['picture'] ?>">
        <p><?=$ret['namee'];?></p>
        <p class="price">GH₵ <?=$ret['price'].'.00'; ?></p>
        
    </div>
    </a>
    <?php 
    }

}
if(mysqli_num_rows($res1) > 0){
    while($ret1 = mysqli_fetch_assoc($res1)){ ?>
     <?php $id = $ret1['id'];?>
    <a class="me" href="view2.php?view2id='<?=$id?>'">
    <div class="pro">
        <img alt="picture" class="imgg" src="uploads/.<?=$ret1['picture'] ?>">
        <p><?=$ret1['namee'];?></p>
        <p class="price">GH₵ <?=$ret1['price'].'.00'; ?></p>
        
    </div>
    </a>
    <?php 
    }

}
echo '</div>';
echo '<br>';
echo '<div style="display:flex;">';
if(mysqli_num_rows($res2) > 0){
    while($ret2 = mysqli_fetch_assoc($res2)){ ?>
     <?php $id = $ret2['id'];?>
    <a class="me" href="view2.php?view2id='<?=$id?>'">
    <div class="pro">
        <img alt="picture" class="imgg" src="uploads/.<?=$ret2['picture'] ?>">
        <p><?=$ret2['namee'];?></p>
        <p class="price">GH₵ <?=$ret2['price'].'.00'; ?></p>
       
    </div>
    </a>
    <?php 
    }

}
if(mysqli_num_rows($res3) > 0){
    while($ret3 = mysqli_fetch_assoc($res3)){ ?>
     <?php $id = $ret3['id'];?>
    <a class="me" href="view2.php?view2id='<?=$id?>'">
    <div class="pro">
        <img alt="picture" class="imgg" src="uploads/.<?=$ret3['picture'] ?>">
        <p><?=$ret3['namee'];?></p>
         
        <p class="price">GH₵ <?=$ret3['price'].'.00'; ?></p>
        
    </div>
    </a>
    <?php 
    }

}
if(mysqli_num_rows($res4) > 0){
    while($ret4 = mysqli_fetch_assoc($res4)){ ?>
     <?php $id = $ret4['id'];?>
    <a class="me" href="view2.php?view2id='<?=$id?>'">
    <div class="pro">
        <img alt="picture" class="imgg" src="uploads/.<?=$ret4['picture'] ?>">
        <p><?=$ret4['namee'];?></p>
        <p class="price">GH₵ <?=$ret4['price'].'.00'; ?></p>
        
    </div>
    </a>
    <?php 
    }

}
echo '</div>';
echo '<br>';
echo '<div style="display:flex;">';
if(mysqli_num_rows($res5) > 0){
    while($ret5 = mysqli_fetch_assoc($res5)){ ?>
     <?php $id = $ret5['id'];?>
    <a class="me" href="view2.php?view2id='<?=$id?>'">
    <div class="pro">
        <img alt="picture" class="imgg" src="uploads/.<?=$ret5['picture'] ?>">
        <p><?=$ret5['namee'];?></p>
        <p class="price">GH₵ <?=$ret5['price'].'.00'; ?></p>
       
    </div>
    </a>
    <?php 
    }

}
if(mysqli_num_rows($res6) > 0){
    while($ret6 = mysqli_fetch_assoc($res6)){ ?>
     <?php $id = $ret6['id'];?>
    <a class="me" href="view2.php?view2id='<?=$id?>'">
    <div class="pro">
        <img alt="picture" class="imgg" src="uploads/.<?=$ret6['picture'] ?>">
        <p><?=$ret6['namee'];?></p>
        <p class="price">GH₵ <?=$ret6['price'].'.00'; ?></p>
        
    </div>
    </a>
    <?php 
    }

}
if(mysqli_num_rows($res7) > 0){
    while($ret7 = mysqli_fetch_assoc($res7)){ ?>
     <?php $id = $ret7['id'];?>
    <a class="me" href="view2.php?view2id='<?=$id?>'">
    <div class="pro">
        <img alt="picture" class="imgg" src="uploads/.<?=$ret7['picture'] ?>">
        <p><?=$ret7['namee'];?></p>
        <p class="price">GH₵ <?=$ret7['price'].'.00'; ?></p>
       
    </div>
    </a>
    <?php 
    }

}

echo '</div>';
echo '<br>';

if(mysqli_num_rows($res8) > 0){
    while($ret8 = mysqli_fetch_assoc($res8)){ ?>
     <?php $id = $ret8['id'];?>
    <a class="me" href="view2.php?view2id='<?=$id?>'">
    <div class="pro">
        <img alt="picture" class="imgg" src="uploads/.<?=$ret8['picture'] ?>">
        <p><?=$ret8['namee'];?></p>
        <p class="price">GH₵ <?=$ret8['price'].'.00'; ?></p>
       
    </div>
    </a>
    <?php 
    }

}
?>
</div>
<?php
if(isset($_POST['submit'])){
    $cate = $_POST['cat'].'.php';
    $categ = strtolower(str_replace(' ','',$cate));
    echo $categ;
     header("location: $categ");
}
?>

<?php
include 'db_connect.php';
$sqle = mysqli_query($conn,"SELECT * FROM replies WHERE buyeremail = '$emaill'");
while($r = mysqli_fetch_array($sqle)){
    echo $r['reply'];
    echo '<br>';
}
?>
<script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>