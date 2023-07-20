
<?php
include "config.php";
session_start();
if (!isset($_SESSION["email"])) {
  header("location: ./login.php");
  exit; // prevent further execution, should there be more code that follows
}
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
    $userimage = $row['img'];
} else {
    $username = "User not found";
}

$state = "insert";
if (isset($_GET["id"])) {
  $checkId = $_GET["id"];
  $query2 = "SELECT * FROM tbl_227_camp WHERE id_camp=" . $checkId;
  $result2 = mysqli_query($connection, $query2);
  if ($result2) {
      $row2 = mysqli_fetch_assoc($result2);
      $state = "edit";
  }
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/style.css">
  <title>create campaign</title>
</head>

<body>
  <div id="wrapper4">
    <header id="header">
    <a href="index.php" id="logo"></a>
  <a href="profile.php"><img id="nurse" src="<?php echo $userimage; ?>" alt="Profile Image"></a>
  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#ea6f6f" class="bi bi-envelope"
    viewBox="0 0 16 16">
    <path
      d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
  </svg>
  <div id="name">
  <h5><?php echo $username; ?></h5>
  <a href="logout.php"><h6>התנתקות</h6></a>
  </div>
   </header>
      <nav id="nav">
        <ul>
          <li><a class="active" href="#">יצירת קמפיין</a></li>
          <li><a href="existcamp.php">קמפיינים קיימים <span class="circle">7</span></a></li>
          <li><a href="bloodStock.php">מאגר מנות</a></li>
          <li><a href="index.php"><i class="material-icons">home</i></a></li>
        </ul>
      </nav>
                  <!--  navbar-expand-lg bg-body-tertiary -->
<nav class="navbar">
  <!-- <div class="container-fluid"> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="profile.php">פרופיל</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">דף הבית</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bloodstock.php">מאגר מנות</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="existcamp.php">קמפיינים קיימים</a>
        </li>
        <?php
        if($_SESSION["email"] == "ester1@gmail.com"){
        echo '<li class="nav-item">';
          echo '<a class="nav-link" href="createcamp.php">יצירת קמפיין</a>';
        echo '</li>';
        }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
   
    <main class="mainContainer2">
      <div id="image"></div>
      <div class="breadCrumbs">
        <span><a href="index.html" style="color: blue; margin-right: 10px;"> דף הבית</a></span>
        <span><a href="lay3.html" style="color: blue;">/ קמפיינים קיימים</a></span>
        <span style="color: #5f5f5f;">/ תאונה רבת נפגעים</span>
      </div>
      <h1><b>תאונה רבת נפגעים</b></h1>
      <div class="bloodType">
        <p><b><span>סוג הדם:</span></b><span><?php echo $row2["bloodType"]?></span></p>
      </div>
      <div class="sum">
        <p><b><span>כמות מנות שנאספו:</span></b><span> 50</span></p>
      </div>
      <div class="miss">
        <p><b><span>חוסרים ליעד:</span></b><span> 80</span></p>
      </div>
      <div class="date">
        <p><b><span>תאריך יעד:</span></b><span> 27/01/23</span></p>
      </div>
      <div class="nurse">
        <p><b><span>שם האחות:</span></b><span> אסתר אלימלך</span></p>
      </div>
      <div class="need">
        <p><b><span>צורך:</span></b><span> עבור תאונת שרשרת קשה יש צורך במאגר מנות גדול מסוג הדם הרצוי</span></p>
      </div>
    </main>
  </div>
  <script src="js/java.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js%22%3E"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js%22%3E"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js%22%3E"></script>

</body>

</html>

<?php
mysqli_close($connection);
?>