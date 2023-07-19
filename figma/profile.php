<?php
include "config.php";
session_start();
$usermail = $_SESSION['email'];
$query = "SELECT * FROM tbl_227_users WHERE email = '$usermail'";
$result = mysqli_query($connection, $query);
// $stmt = mysqli_prepare($connection, $query);
// mysqli_stmt_bind_param($stmt, "s", $useremail);
//mysqli_stmt_execute($stmt);
//$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

if (is_array($row)) {
    $username = $row['name'];
} else {
    $username = "User not found";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
    <title>profile</title>
</head>
<body>
<a href="index.html" id="logo">Logo</a>
  <div class="redheart">
    <p><b><span class="red">Red</span><span class="heart">Heart</span></b></p>
  </div>
  <div id="nurse"></div>
  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#ea6f6f" class="bi bi-envelope"
    viewBox="0 0 16 16">
    <path
      d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
  </svg>
  <div id="name">
  <h5><?php echo $username; ?></h5>
    <h6>Log out</h6>
  </div>
  <i class="material-icons">letter</i>
  <div id="wrapper">
    <header id="header6">
      <nav id="nav">
        <ul>
          <li><a href="createcamp.php">יצירת קמפיין</a></li>
          <li><a href="existcamp.php">קמפיינים קיימים <span class="circle">7</span></a></li>
          <li><a href="bloodStock.php">מאגר מנות</a></li>
          <li><a href="index.php"><i class="material-icons">home</i></a></li>
        </ul>
      </nav>
    </header>
    <main>
<div class="imag">
    <img src="./images/nurse1.jpg">
</div>
<?php
      $query = "SELECT * FROM tbl_227_users";
      $result = mysqli_query($connection, $query);
  ?>
<div class="profileContainer">
<form novalidate class="needs-validation" method="post" action="#">
<!-- <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupFile01">Upload</label>
  <input type="file" class="form-control" id="inputGroupFile01">
</div> -->
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nurse Name</label>
  <input type="text" class="form-control" id="exampleFormControlInput1"  name="name" required>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="mail" required>
</div>
<label for="inputPassword5" class="form-label">Password</label>
<input type="password" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock" name="pass" pattern="[0-9a-zA-Z]+" minlength="6" maxlength="20" required>
<div id="passwordHelpBlock" class="form-text">
must be 6-20 characters long
</div>
<button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
</main>
</body>
</html>