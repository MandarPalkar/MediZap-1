<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediZap</title>
</head>

<body>
    <?php
        
        if( $_SERVER["REQUEST_METHOD"]=="GET")
        {   
            require "./dbcon.php";
            echo "HELLO";
        session_start();
        // echo ($_SESSION['userID']);
            // ,mpoify stock and no of items added also
        $sql = "INSERT INTO `usercart`(`userID`, `cartID`, `cartSize`, `totalPrice`) VALUES ($_SESSION['userID'],,[value-3],[value-4])";
        // $result = mysqli_query($conn, $sql);
        
        }        
    ?>
    <form action="product_detail.php" method="GET"></form>
    <?php
        $id = $_GET['itemID'];
        $sql = "SELECT * from items where itemID=".$_GET['itemID'];
        $sql = "SELECT * from items where itemID=".$_GET['itemID'];
        $result = mysqli_query($conn, $sql);
        echo "<br>";
        $row=mysqli_fetch_assoc($result);
        echo ($row['itemName']);
        echo ($row['stock']);
        echo ($row['price']);
       echo '<img height="100" src="data:image/jpeg;base64,'.base64_encode( $row['itemImage'] ).'" alt="">';

       echo "ADD TO CART";
       echo '<button value="'.$id.'" name="addToCart">ADD TO CART</button>';
       

        
    ?>
</body>

</html>