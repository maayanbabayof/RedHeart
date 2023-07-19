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
  <title>blood stock</title>
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
  <div id="wrapper">
    <header id="header5">
      <nav id="nav">
        <ul>
          <li><a href="createcamp.php">יצירת קמפיין</a></li>
          <li><a href="existcamp.php">קמפיינים קיימים <span class="circle">7</span></a></li>
          <li><a class="active" href="#">מאגר מנות</a></li>
          <li><a href="index.php"><i class="material-icons">home</i></a></li>
        </ul>
      </nav>
    </header>
    <main class="mainContainer5">
      <div class="breadCrumbs">
        <span><a href="index.html" style="color: blue; margin-right: 10px;"> דף הבית</a></span>
        <span style="color: #5f5f5f;">/ מאגר מנות</span>
      </div>
      <h1><b>מאגר מנות</b></h1>
      <?php
      $query = "SELECT * FROM tbl_227_bloodstock";
      $result = mysqli_query($connection, $query);
  
      if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo '<table id="myTable2" class="table table-bordered table-hover">';
            echo '<thead>';
            echo '<tr style="background-color: rgb(156, 156, 156);">';
            echo '<th>Who donate?</th>';
            echo '<th>Exist Amount</th>';
            echo '<th>Required Amount</th>';
            echo '<th>Blood Type</th>';
            echo '<th>Blood ID</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
    
            while ($row = mysqli_fetch_assoc($result)) {
                $whoDonate = $row['whoDonate'];
                $existamount = $row['existamount'];
                $reqamount = $row['reqamount'];
                $blood_id = $row['blood_id'];
    
                $json = file_get_contents('data/bloodType.json');
                $data = json_decode($json, true);

                echo '<tr style="background-color: #ffffff;">';
                echo '<td>' . $whoDonate . '</td>';
                echo '<td>' . $existamount . '</td>';
                echo '<td>' . $reqamount . '</td>';

                $bloodType = '';
                foreach ($data['bloodType'] as $type) {
                    if ($type['id'] == $blood_id) {
                        $bloodType = $type['Type'];
                        break;
                    }
                }

                echo '<td><label id="bloodType">' . $bloodType . '</label></td>';
                echo '<td>' . $blood_id . '</td>';
                echo '</tr>';


                // echo '<tr style="background-color: #ffffff;">';
                // echo '<td>' . $whoDonate . '</td>';
                // echo '<td>' . $existamount . '</td>';
                // echo '<td>' . $reqamount . '</td>';
                // echo '<td><label class="bloodType"></label></td>';
                // echo '<td class="bloodid">' . $blood_id . '</td>';
                // echo '</tr>';
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