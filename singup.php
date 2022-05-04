<?php
   session_start();
   include('dbconn.php');
   $username = $_post['username'];  
   $password = $_post['password'];
   $re_password = $_post['re-password'];
   $first_name = $_post['first_name'];
   $last_name = $_post['last_name'];
   $phone = $_post['phone_number'];
   $email = $_post['email_address'];
   $address = $_post['address'];
   if ($password == $re_password){
       $password_hash = md5($password)
    $sql = " INSERT INTO User (USERNAME, PASSWORD_HASH) VALUES ($username, $password_hash)";
    $sql = " INSERT INTO USER_DETAILS (USERNAME, FIRST_NAME, LAST_NAME, PHONE_NUMBER, EMAIL, ADDRESS)
    VALUES ($username, $first_name, $last_name, $phone, $email, $address)";
   
     if (mysqli_multi_query($dbconn, $sql)) {
        echo "New records created successfully";
       }
      else {
        echo "Error: " . $sql . "<br>" . mysqli_error($dbconn);
      } 
    }
    else{
        echo "password and re-password do not match";
    }
    $_SESSION['USERNAME'] = $username;
    
    header('location:new_entry_mock.html');



?>