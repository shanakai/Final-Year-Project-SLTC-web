<?php



$ch = curl_init();

// set user fields
$user = [
    'firstName' => $_POST["fname"],
    'lastName' => $_POST["lname"],
    'nic' => $_POST["nic"],
    'address' => $_POST["address"],
    'email' => $_POST["mail"],
    'password' => $_POST["password"],
];







$url = 'http://localhost:8080/auth/user/signup/';

$postdata = json_encode($user);

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
    alert('Welcome to Vehicle Indentification System. Please login');
    window.location.href='http://localhost/vis/user/login/';
    </script>";
    // echo "<script>
    // alert('Welcome to Vehicle Indentification System. Please login');
    // window.location.href='/vis/user/login/';
    // </script>";
}else if($info["http_code"] == "409"){
  
    echo "<script>
    alert('Email is allready taken! Pleace use a another Email');
    window.location.href='http://localhost/vis/user/signup/';
    </script>";
}
else{
    echo '<script type="text/javascript">'; 
echo 'alert("Something going wrong. Please try again later");'; 
echo 'window.location.href = "http://localhost/vis/";';
echo '</script>';
    // echo "<script>
    // alert('Something going wrong. Please try again later');
    // window.location.href='/vis/';
    // </script>";
}

?>