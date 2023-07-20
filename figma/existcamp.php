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
    $userimage = $row['img'];
} else {
    $username = "User not found";
}
$query = "SELECT * FROM tbl_227_camp";
      $result = mysqli_query($connection, $query);
  $counter = 0;
      if ($result) {
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)){
              $counter = $counter + 1;
        }
      }
      }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css%22%3E"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

  <link rel="stylesheet" href="css/style.css">
  <title>Exist campaign</title>
</head>

<body>
  <div id="wrapper3">
    <header id="header">
  <a href="index.php" id="logo"></a>
  <div class="redheart">
    <p><b><span class="red">Red</span><span class="heart">Heart</span></b></p>
  </div>
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
   <?php
if($_SESSION["email"] == "yardena@gmail.com"){
  echo '<nav id="nav2">';
  echo '<ul>';
  echo '<li><a class="active" href="#">קמפיינים קיימים <span class="circle">7</span></a></li>';
  echo '<li><a href="bloodStock.php">מאגר מנות</a></li>';
  echo '<li><a href="index.php"><i class="material-icons">home</i></a></li>';
  echo '</ul>';
  echo '</nav>';
}
else{
  echo '<nav id="nav">';
  echo '<ul>';
  echo '<li><a href="createcamp.php">יצירת קמפיין</a></li>';
  echo '<li><a class="active" href="#">קמפיינים קיימים <span class="circle">7</span></a></li>';
  echo '<li><a href="bloodStock.php">מאגר מנות</a></li>';
  echo '<li><a href="index.php"><i class="material-icons">home</i></a></li>';
  echo '</ul>';
  echo '</nav>';
}
?>
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
          <a class="nav-link active" aria-current="page" href="#">קמפיינים קיימים</a>
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
   
    <main class="mainContainer3">
      <div class="breadCrumbs">
        <span><a href="index.html" style="color: blue; margin-right: 10px;"> דף הבית</a></span>
        <span style="color: #5f5f5f;">/ קמפיינים קיימים</span>
      </div>
      <h1><b>קמפיינים קיימים</b></h1>
      <p>יש ללחוץ על שם הקמפיין על מנת להגיע לקמפיין הרצוי</p>
      <div class="rec11">
        <ul>
          <li class="search"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
              class="bi bi-search" viewBox="0 0 16 16">
              <path
                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg></li>
          <li class="sort"><img src="./images/sorting.png" alt="sort">
              </li>
          <li class="filter"><img src="./images/filter1.png" alt="filter"></li>
          <select id="typeDropdown" class="form-select">
            <option value="A+">A+</option>
			<option value="A-">A-</option>
			<option value="AB+">AB+</option>
      <option value="AB-">AB-</option>
      <option value="B+">B+</option>
			<option value="B-">B-</option>
			<option value="O+">O+</option>
      <option value="O-">O-</option>
      <option value="">ALL</option>
        </select> 
       </li>
        </ul>
      </div>
      <?php
 $temp = ''; // Initialize the $temp variable

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $selectedCategory = $_POST['category'];
  // Do any necessary processing with the selected category
  // Assign the selected category to $temp
  $temp = $selectedCategory;
  echo $temp;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nurse = $_POST['nurse'];
    $name = $_POST['name'];
    $need = $_POST['need'];
    $kind = $_POST['kind'];
    $sum = $_POST['sum'];
    $date = $_POST['date'];

    $query = "INSERT INTO tbl_227_camp (user_id, CampName, needs, bloodType, collected, LeftToCollected, Deadline)
              VALUES ('$nurse', '$name', '$need', '$kind', 0, '$sum', '$date')";
              $result = mysqli_query($connection, $query);
}
      $query = "SELECT * FROM tbl_227_camp";
      $result = mysqli_query($connection, $query);
  
      if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo '<table id="myTable" class="table table-bordered table-hover">';
            echo '<thead>';
            echo '<tr style="background-color: rgb(156, 156, 156);">';
            if($_SESSION["email"] == "ester1@gmail.com"){
            echo '<th>Delete / Edit</th>';
          }
            echo '<th>Need</th>';
            echo '<th>User ID</th>';
            echo '<th>Deadline</th>';
            echo '<th>Left To Collect</th>';
            echo '<th>Collected</th>';
            echo '<th>Blood Type</th>';
            echo '<th>Camp Name</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
    
            while ($row = mysqli_fetch_assoc($result)) {
                $id_camp = $row['id_camp'];
                $CampName = $row['CampName'];
                $bloodType = $row['bloodType'];
                $collected = $row['collected'];
                $LeftToCollected = $row['LeftToCollected'];
                $Deadline = $row['Deadline'];
                $user_id = $row['user_id'];
                $needs = $row['needs'];
                $blood_id = $row['blood_id'];
                
                $counter = $counter + 1;
    
                echo '<tr style="background-color: #ffffff;">';
                if($_SESSION["email"] == "ester1@gmail.com"){
                echo '<td>';
                echo '<svg class="delete" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">';
                echo '<path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />';
                echo '</svg>&nbsp;&nbsp;&nbsp;';
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">';
                echo '<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />';
                echo '</svg>';
                echo '</td>';
                }
                echo '<td>' . $needs . '</td>';
                echo '<td>' . $user_id . '</td>';
                echo '<td>' . $Deadline . '</td>';
                echo '<td>' . $LeftToCollected . '</td>';
                echo '<td>' . $collected . '</td>';
                echo '<td>' . $bloodType . '</td>';
                echo '<td><a href="campaign.php?id=1" style="color:blue;">' . $CampName . '</a></td>';
                echo '</tr>';
                
            }
          
            echo '</tbody>';
            echo '</table>';
        } else {
            echo 'No records found.';
        }
    } else {
        echo 'Error executing the query: ' . mysqli_error($connection);
    }
    ?>
    </main>
  </div>
  <script src="js/java.js"></script>
</body>

</html>

<?php
mysqli_close($connection);
?>