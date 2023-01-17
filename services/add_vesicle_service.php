<?php
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
session_start();
if( isset( $_SESSION['id'] ) ) {
  if($_SESSION['type'] == "user")
  {
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

  
  $vehicle = [
      'ownerId' => $_SESSION['id'],
      'ownerName' => $_SESSION['name'],
      'ownerNic' => $_SESSION['nic'],
      'chacyNumber' => $_POST["cn"],
      'vehicleNumber' => $_POST["vn"],
      'vehicleType' => $_POST["vt"],
  ];
  
  
  
  
  
  
  
  $url = 'http://localhost:8080/vehicle/add/';
  
  $postdata = json_encode($vehicle);
  
  $ch = curl_init($url); 
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
  curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
  
  $result = curl_exec($ch);
  $info = curl_getinfo($ch);
  echo $info["http_code"];
  curl_close($ch);
  if($info["http_code"] == "201"){
     
      echo "<script>
      alert('Vehicle Successfully');
      window.location.href='http://localhost/vis/user/my_vehicles.php';
      </script>";
  }
  else{
    echo  $vehicle;
  //     echo '<script type="text/javascript">'; 
  // echo 'alert("Something going wrong. Please try again later");'; 
  // echo 'window.location.href = "https://vislk.herokuapp.com/";';
  // echo '</script>';
  }
  
  ?>