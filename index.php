<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Made</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
        <div class="pic">
            <img src="img/logo4.jpg" class="pic"alt="">
        </div>
        <div class="link">
             <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        </div>
        <div class="srch">
            <input type="text" class="" name="search" placeholder="search">
            <input type="submit" class="ssrch1" name="submit">
            <?php
             $connection = new PDO("mysql:host=localhost;dbname=products", "root", "");
             if(isset($_POST['submit'])){
                $nameproducts = $_POST['nameProducts'];
    $price = $_POST['Price'];
     $sqlsrch = $connection->prepare("SELECT * FROM prod where name_sundwish like '%$nameproducts%'");
            $sqlsrch->execute();

            foreach ($sqlsrch as $prod) {
                $name_sundwish = $prod['name_sundwish'];
                $price = $prod['price'];
                echo '
                <div class="card">
                <img src="upload/'.$prod[3].'">
                     <h4>"الساندويتش:'. $name_sundwish.'</h4>
                     <h6>"السعر:'. $price.'</h6>
                    <button class="buy">buy</button>
                </div>
                
                ';
            }
             }
            ?>
        </div>
        
    </div>
<div class="box"> 
    <h3 class="txt">WELCOME TO THE RESTRUNT PAGE</h3>
   <div class="father">
     <div class="div1">
                    <?php
            $connection = new PDO("mysql:host=localhost;dbname=products", "root", "");
            $sqlRead = $connection->prepare("SELECT * FROM prod");
            $sqlRead->execute();

            foreach ($sqlRead as $prod) {
                $name_sundwish = $prod['name_sundwish'];
                $price = $prod['price'];
                echo '
                <div class="card">
                <img src="upload/'.$prod[3].'">
                     <h4>"الساندويتش:'. $name_sundwish.'</h4>
                     <h6>"السعر:'. $price.'</h6>
                    <button class="buy">buy</button>
                </div>
                
                ';
            }
            ?>
         
         
     </div>
    <div class="div2">
          
    </div>

   </div>
 <form method="post" class="formm" enctype="multipart/form-data">
    NAME PRODUCT: <input type="text" name="nameProducts">
    Price: <input type="text" name="Price">
    <input type="file" name="pic">
    <input type="submit" name="upload" class="buttton">
    <button class="logg" name="logout">logout</button>
</form>

<?php
$connection = new PDO("mysql:host=localhost;dbname=products", "root", "");

if (isset($_POST['upload'])) {

    print_r($_FILES['pic']);
    $nameproducts2 = $_POST['nameProducts'];
    $price2 = $_POST['Price'];
    $filename2 = $_FILES['pic']['name'];
    $location = $_FILES['pic']['tmp_name'];
    $dist = 'upload/' . $filename2;

    move_uploaded_file($location, $dist); 
    $sql= $connection-> prepare("insert into prod (name_sundwish , price, image) values('$nameproducts2', $price2 ,'$filename2')");
    $sql->execute();
    header('location:index.php');
    // echo"success";
    
}

if (isset($_POST['logg'])){
header('location:login.php');
}
?>

</div>
</body>
</html>






