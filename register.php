<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
    <?php
                $_SESSION['loggedIn']=false;

    require "dbcon.php";
        if( $_SERVER["REQUEST_METHOD"]=="POST")
        {
        $name = $_POST['UserName'];
        $email = $_POST['email'];
        $PhoneNo = $_POST['PhoneNo'];
        $password = $_POST['password'];
        $address = $_POST['UserAddress'];
        $DOB = $_POST['DOB'];

      $sql = "INSERT INTO USERS(UserEmail, UserPhoneNo, UserPassword, UserAddress, UserName) values( '$email', $PhoneNo,   '$password', '$address','$name'); ";
      echo "'$email', '$password', '$name', '$PhoneNo', '$address'";
      $sql ="INSERT INTO `users` ( `userEmail`, `userPassword`, `userName`, `userPhoneNo`, `userAddress`, `userDOB`) VALUES ( '$email', '$password', '$name', '$PhoneNo', '$address', '$DOB')" ; 
      $result = mysqli_query($conn, $sql);
        
        if($result==true){
            echo "The details were submitted sucessfully!";
                           session_start();
                $_SESSION['UserName'] = $name;
         
                header('location: index.php');
 
        }else{
            $_SESSION['loggedIn']=false;
            
            echo "The query was not excuted due to error: ";
            echo mysqli_error($conn)."<br>";
        }
    }  
    ?>
    
    <?php


    ?>
    <h1>Registration Page</h1>
    <form action="login.php" method="get">
    <button style="float:right">Existing User</button>
    </form>
    <form action="register.php" method="post">
    <label for="UserName">Name</label>
    <input type="text" name="UserName" placeholder="Name">
    <br>
    
    <label for="email">Email</label>
    <input type="text" name="email" placeholder="Email">
    <br>
    <label for="UserPhoneNo">Phone Number:</label>
    <input type="text" name="PhoneNo" placeholder="Phone Number">
    <br>
    
    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Password" id="password">
    <br>
    
    <label for="password">Confirm Password</label>
    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" onchange="checkPassword()">
    <br>
    <label for="UserAddress">Address:  </label>
    <input type="text" name="UserAddress" placeholder="Address">
    <br>
    <label for="DOB">DOB</label>
    <input type="date" name="DOB">
    <input type="submit" value="Login">
    
    </form>
    <script>
    function checkPassword(){
        // console.log("hello")
        let password = document.getElementById('password').value;
        let confirmPassword = document.getElementById('confirmPassword').value;
        if(password!==confirmPassword)
        {
            alert("Passwords do not match")
        }
        else{
            console.log("OKAY")
        }
    }
    </script>
</body>
</html>