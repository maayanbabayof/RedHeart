<?php

session_start();

include "config.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if email and password are provided
    if (!empty($_POST["mail"]) && !empty($_POST["pass"])) {
        // Use prepared statements to prevent SQL injection
        $query = "SELECT * FROM tbl_227_users WHERE email=? AND password=?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "ss", $_POST['mail'], $_POST['pass']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        // Check if a matching user was found
        if ($row !== null) {
            $_SESSION["email"] = $row['email'];
            $_SESSION["password"] = $row['password'];
            mysqli_stmt_close($stmt); // Close the statement
            mysqli_close($connection); // Close the database connection
            header('Location:index.php');
            exit(); // Stop executing further code
        } else {
            $message = "User not found. Please try again!";
        }
    } else {
        $message = "Please provide both email and password!";
    }
}
?>

<!DOCTYPE html>
<html>
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
<link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
<a href="index.html" id="logo">Logo</a>
  <div class="redheart">
    <p><b><span class="red">Red</span><span class="heart">Heart</span></b></p>
  </div>
<div class="loginContainer">
    <h2>Login</h2>
    <?php if (isset($message)) echo "<p>$message</p>"; ?>
    <form novalidate class="needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
    <script src="js/java.js"></script>
</body>
</html>
        