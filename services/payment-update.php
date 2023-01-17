<?php
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
session_start();
if( isset( $_SESSION['id'] ) ) {
  if($_SESSION['type'] == "user")
  {
    $logid = $_SESSION['payment_log_id'];
$id = $_SESSION['id'];
  }
  else {
    header("Location: http://localhost/vis/user/login/");
  die();
  }
}

else {
  header("Location: http://localhost/vis/user/login/");
die();
}




echo $_SESSION['id'];

  $ch = curl_init();

  

  
  
  
  
  
  
  $url = "http://localhost:8080/records/payment?id=$logid";
  
  
  $ch = curl_init($url); 
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
  curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
  
  $result = curl_exec($ch);
  $info = curl_getinfo($ch);
  echo $info["http_code"];
  curl_close($ch);
 
     
      echo "<script>
      alert('Payment Successfully');
      window.location.href='http://localhost/vis/user/my_logs.php';
      </script>";
  
  ?>