<?php



$ch = curl_init();

// set user fields
$user = [
    'email' => $_POST["email"],
    'password' => $_POST["pass"],
];



$url = 'http://localhost:8080/auth/admin/login/';

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



if($info["http_code"] == "200"){
    $user = json_decode($result);
    echo $user->id;
    session_start();
    $_SESSION["id"] = $user->id;
    $_SESSION["email"] = $user->email;
    $_SESSION["type"] = $user->type;
    echo "<script>
    alert('Login Success, Welcome to Vehicle Indentification System. ');
    window.location.href='http://localhost/vis/admin/';
    </script>";
    // echo "<script>
    // alert('Welcome to Vehicle Indentification System. Please login');
    // window.location.href='/vis/user/login/';
    // </script>";
}else if($info["http_code"] == "404"){
  
    echo "<script>
    alert('User Not Foung to given Email address');
    window.location.href='http://localhost/vis/';
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