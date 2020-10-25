<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MediZap</title>
</head>

<body>
    <?php 
    session_start();
    ?>
    <nav>
        <!-- The name of user after siging in or signup button comes here. -->
        <?php 
      
       if(key_exists('loggedIn', $_SESSION))
     { if($_SESSION['loggedIn']==true)
         echo "USER:".$_SESSION['userName'];
     }
         else{
      echo "<a href='./login.php'><button>SignUp</button></a>";
    }
     ?>
    </nav>
    This is the index page



    <div class="categories" style="display: flex; flex-direction: row;">
        <form action="category_productList.php" method="GET">
            <?php
  require "./dbcon.php";
  $sql = "SELECT * from CATEGORIES ";
  $result = mysqli_query($conn, $sql);
  while ($var=mysqli_fetch_assoc($result)) {
    // echo var_dump($var);
    $id=$var["catID"];
    
    echo '<button value="'.$id.'" name="categoryID"><img height="20" src="data:image/jpeg;base64,'.base64_encode( $var['catImage'] ).'" alt=""></button>';
    echo "<figcaption>".$var["catName"]."</figcaption>";
}
  ?>
        </form>

</body>

</html>