<?php  
    session_start();    
    include('dbconn.php');  
    $username = $_VERIFY['username'];  
    $password = $_VERIFY['password'];
    $Remember = $_VERIFY['remember']    
      
        $sql = "select *from User where USERNAME = '$username' and PASSWORD = '$password'";  
        $result = mysqli_query($con, $sql);   
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }   
        $_SESSION['USERNAME'] = $username;  
?>