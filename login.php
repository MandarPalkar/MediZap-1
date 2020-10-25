<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediZap</title>
</head>

<body>
    <?php

    require "dbcon.php";
        if( $_SERVER["REQUEST_METHOD"]=="POST")
        {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT userPassword, userName from USERS where userEmail=$email or userPhoneNo=$email";
        $result = mysqli_query($conn, $sql);
        echo var_dump(mysqli_fetch_assoc($result));
      while ($var=mysqli_fetch_assoc($result)) {
        $password1=$var["userPassword"];
        $UserName=$var["userName"];
        
    }
            if($password1 == $password){
                echo " LOGGING IN";
                session_start();
                $_SESSION['userName'] = $UserName;
         
                header('location: index.php');
                $_SESSION['loggedIn']=true;
        
        
            }
            else{
                echo "WRONG PASSWORD";
            }
    }  

    ?>
    <h1>Login Page</h1>
    <form action="register.php" method="get">
        <button style="float:right">New User</button>
    </form>
    <form action="login.php" method="post">
        <label for="email">Email/Phone</label>
        <input type="text" name="email" placeholder="Email or Phone" required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" required>
        <br>
        <input type="submit" value="Login">

    </form>
</body>

</html>