<?php
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
ini_set('display_errors',0);
session_start();
if( isset( $_SESSION['id'] ) ) {
  if($_SESSION['type'] == "user")
  {
$id = $_SESSION['id'];
$_SESSION["payment_log_id"] = $_GET['log_id'];
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
?>
<!DOCTYPE html>

<html lang="en">

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<br><br>
  <div class="container">
    <div class="col-md-8 offset-2">
  <div class=" d-flex justify-content-center">
    <div class="jumbotron align_jumbo ">
      <h2 class="display-4">Payment Process <?php echo $price ?></h2>
      <hr class="my-4">
      <form method="POST" action="payment.php">

        <p class="form-group">
        <input type="hidden" class="form-control" id="id"  name="id"  value="<?php echo $_GET['log_id']?>"  >
          <input type="text" class="form-control" id="name" placeholder="First Name" disabled value="<?php echo $_SESSION["name"] ?>" >
          <input type="hidden" class="form-control" id="name" placeholder="First Name"  value="<?php echo $_SESSION["name"] ?>"  name="firstname">
        </p>
        <p class="form-group">
          <input type="text" class="form-control" id="name" placeholder="Last Name" disabled value="<?php echo $_SESSION["lname"] ?>" >
          <input type="hidden" class="form-control" id="name"  value="<?php echo $_SESSION["lname"] ?>"  name="lastname">
        </p>
        <p class="form-group">
          <input type="email" class="form-control" id="email" placeholder=" email" disabled  value="<?php echo $_SESSION["email"] ?>"  >
          <input type="hidden" class="form-control" id="email" name="email" placeholder=" email"  value="<?php echo $_SESSION["email"] ?>"  >
        </p>
        <p class="form-group">
          <input type="tel" class="form-control" id="wh" placeholder="Phone No (ex: +947xxxxxx)" name="tele" pattern="^(?:7|0|(?:\+94))[0-9]{9,10}$" required>
        </p>
        <p class="form-group">
          <input type="text" step="0.01" class="form-control" disabled placeholder="Payment" value="<?php echo $_GET['payment']?>" min="0.00" max="10000.00" required>
          <input type="hidden" step="0.01" class="form-control" value="<?php echo $_GET['payment']?>" name="pay" placeholder="Payment" min="0.00" max="10000.00">
        </p>
        <p class="form-group">
          <button type="submit" class="btn btn-primary">Process</button>
        </p>
      </form>
    </div>
</div></div>
  </div>
</body>
</html>