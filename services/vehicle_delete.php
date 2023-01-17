<?php
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
session_start();
if( isset( $_SESSION['id'] ) ) {
  
  
}
else {
    header("Location: http://localhost/vis/user/login/");
  die();
  }



echo $_GET["vid"];

  $ch = curl_init();

  
 
  
  
  
  
  
  
  
  $url = 'http://localhost:8080/vehicle/delete/?vid='.$_GET["vid"];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Authorization: Bearer MY_API_TOKEN')
);

$result = curl_exec($ch);
echo $result;
echo "<script>
alert('Vehicle Deleted successfully!!!!');
window.location.href='http://localhost/vis/user/my_vehicles.php';
</script>";

?>