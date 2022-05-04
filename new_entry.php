<?php
session_start();
   include('dbconn.php');
   $CLIENT_NAME = $_post['client_name'];  
   $pay_amount = $_post['payment_amount'];
   $mode = $_post['payment_mode'];
   $date = $_post['date_of_payment'];
   $description = $_post['description'];
   $filename = $_FILES["uploadfile"]["name"];
   $fileNameCmps = explode(".", $fileName);
   $fileExtension = strtolower(end($fileNameCmps));
   $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc','pdf');
   if (in_array($fileExtension, $allowedfileExtensions)){



   $sql = " INSERT INTO TICKETS (USER_ID, CLIENT_NAME, PAYMENT_AMOUNT, PAYMENT_TYPE, DATE_OF_PAYMENT,DESCRIPTION,ATTACHMENT) 
   VALUES ($_SESSION['USERNAME'], $CLIENT_NAME, $pay_amount, $mode, $date,$description,$filename)";
   }
   if (mysqli_multi_query($dbconn, $sql)) {
    echo "New records created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbconn);
  } 
   header('location:new_entry_mock.html');


?>