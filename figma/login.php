<?php
include "config.php";

session_start();

if (!empty($_POST["loginMail"])){
    $query = "SELECT * FROM tbl_227_users WHERE email='"
        . $_POST["loginMail"]
        . "' and password = '"
        . $_POST["loginPass"]
        . "'";

    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);

    if (is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["user_type"] = $row['user_type'];
        header('Location: ' . URL . 'index.php');
    } else 
        $message = "user not found. try again!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css%22%3E">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

  <link rel="stylesheet" href="./css/style.css">
  <title>Login</title>
</head>
<body>
<a href="index.html" id="logo">Logo</a>
  <div class="redheart">
    <p><b><span class="red">Red</span><span class="heart">Heart</span></b></p>
  </div>
    <h2>Login</h2>
    <form novalidate class="needs-validation" method="post" action="index.php">
        email: <input type="email" name="mail" required><br>
        <label for="password">Password: </label>
        <input type="password" name="pass" pattern="[0-9a-zA-Z]+" minlength="6" maxlength="20" required><br>
        <p>must be 6-20 characters long.</p>
        <input type="submit" value="Login">
    </form>
</body>
</html> 

<?php
mysqli_close($connection);
?>
