<?php
include "config.php";
session_start();
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons%22%3E">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css%22%3E%22%3E">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/style.css">
  <title>Nurse Manager</title>
</head>

<body>
  <?php
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
?>
<div id="wrapper1">
<header id="header">
  <a href="#" id="logo"></a>
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
  <i class="material-icons">letter</i>
   </header>
<?php
if($_SESSION["email"] == "yardena@gmail.com"){
  echo '<nav id="nav2">';
  echo '<ul>';
  echo '<li><a href="existcamp.php">קמפיינים קיימים <span class="circle">7</span></a></li>';
  echo '<li><a href="bloodStock.php">מאגר מנות</a></li>';
  echo '<li><a class="active" href="#"><i class="material-icons">home</i></a></li>';
  echo '</ul>';
  echo '</nav>';
}
else{
  echo '<nav id="nav">';
  echo '<ul>';
  echo '<li><a href="createcamp.php">יצירת קמפיין</a></li>';
  echo '<li><a href="existcamp.php">קמפיינים קיימים <span class="circle">7</span></a></li>';
  echo '<li><a href="bloodStock.php">מאגר מנות</a></li>';
  echo '<li><a class="active" href="#"><i class="material-icons">home</i></a></li>';
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
          <a class="nav-link active" aria-current="page" href="#">דף הבית</a>
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
</nav>
      
   
    <main>

      <div class="mainContainer1">
        <h1><b>אחות אחראית</b></h1>
        <div class="container">
          <div class="box1">
            <h4>תזכורת- הולך להיגמר</h4>
            <div class="table1">
              <table class="table table-bordered">
                <thead>
                  <tr style="background-color: rgb(156, 156, 156);">
                    <th>מנות דם שנותרו</th>
                    <th>סוג דם</th>
                  </tr>
                </thead>
                <tbody>
                  <tr style="background-color: #ffffff;">
                    <td>100</td>
                    <td>B+</td>
                  </tr>
                  <tr style="background-color: #eaeaea;">
                    <td>120</td>
                    <td>AB-</td>
                  </tr>
                  <tr style="background-color: #ffffff;">
                    <td>320</td>
                    <td>A+</td>
                  </tr>
                </tbody>
              </table><br>
            </div>
            <h4>כמות נדרשת</h4>
            <div class="rec10">
              <table class="table table-bordered table-striped-columns">
                <thead>
                  <tr style="background-color: rgb(156, 156, 156);">
                    <th>כמות</th>
                    <th>סוג דם</th>
                    <th>כמות</th>
                    <th>סוג דם</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1000</td>
                    <td>A+</td>
                    <td>500</td>
                    <td>A-</td>
                  </tr>
                  <tr>
                    <td>750</td>
                    <td>B+</td>
                    <td>300</td>
                    <td>B-</td>
                  </tr>
                  <tr>
                    <td>1000</td>
                    <td>O+</td>
                    <td>300</td>
                    <td>O-</td>
                  </tr>
                  <tr>
                    <td>600</td>
                    <td>AB+</td>
                    <td>200</td>
                    <td>AB-</td>
                  </tr>
                </tbody>
              </table>
            </div>
</div>
          <div class="box2">
            <h4>תזכורת- התאריך מתקרב</h4>
            <div id="rec-box2">
              <div class="rec7">
                <ul>
                  <li><b>קמפיין:</b> מנות דם O+</li>
                  <li><b>תאריך סיום:</b> 31/01/23</li>
                </ul>
                  <div id="myChart" style="width:100%; max-width:400px; height: 150px; margin-top: 10px;">
                  </div>
                </div>

              <div class="rec8">
                <ul>
                  <li><b>קמפיין:</b> מנות דם AB-</li>
                  <li><b>תאריך סיום:</b> 02/02/23</li>
                </ul>
                  <div id="myChart2" style="width:100%; max-width:400px; height: 150px; margin-top: 10px;"></div>
              </div>
              <div class="rec9">
                <ul>
                  <li><b>קמפיין:</b> מנות דם AB+</li>
                  <li><b>תאריך סיום:</b> 12/02/23</li>
                </ul>
                  <div id="myChart3" style="width:100%; max-width:400px; height: 150px; margin-top: 10px;"></div>
              </div>
            </div>
</div>
          <div class="box3">
            <h4>התראות</h4>
            <div id="rec-box3">
              <div class="rec1">
                <ul>
                  <li><b>מחלקה:</b> נוירולוגיה</li>
                  <li><b>צורך:</b> מנות דם מסוג B+</li>
                  <li><b>תאריך:</b> 10/02/23</li>
                </ul>
              </div>
              <div class="rec2">
                <ul>
                  <li><b>מחלקה:</b> קרדיולוגיה</li>
                  <li><b>צורך:</b> מנות דם מסוג AB+</li>
                  <li><b>תאריך:</b> 05/02/23</li>
                </ul>
              </div>
              <div class="rec3">
                <ul>
                  <li><b>מחלקה:</b> כללית</li>
                  <li><b>צורך:</b> מנות דם מסוג B-</li>
                  <li><b>תאריך:</b> 04/02/23</li>
                </ul>
              </div>
              <div class="rec4">
                <ul>
                  <li><b>מחלקה:</b> טראומה</li>
                  <li><b>צורך:</b> מנות דם מסוג O-</li>
                  <li><b>תאריך:</b> 02/02/23</li>
                </ul>
              </div>
              <div class="rec5">
                <ul>
                  <li><b>מחלקה:</b> כללית</li>
                  <li><b>צורך:</b> מנות דם מסוג A-</li>
                  <li><b>תאריך:</b> 01/02/23</li>
                </ul>
              </div>
            </div>
</div>
        </div>
      </div>
    </main>
  </div>

  <script src="js/java.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js%22%3E"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js%22%3E"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js%22%3E"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script>
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart1);
    google.charts.setOnLoadCallback(drawChart2);
    google.charts.setOnLoadCallback(drawChart3);

    function drawChart1() {
      var data = google.visualization.arrayToDataTable([
        ['status', 'sum'],
        ['נשארו', 9.1],
        ['נקלטו', 90.9]
      ]);

      var options = {
        is3D: true
      };

      var chart = new google.visualization.PieChart(document.getElementById('myChart'));
      chart.draw(data, options);
    }

    function drawChart2() {
      var data = google.visualization.arrayToDataTable([
        ['status', 'sum'],
        ['נשארו', 20],
        ['נקלטו', 80]
      ]);

      var options = {
        is3D: true
      };

      var chart = new google.visualization.PieChart(document.getElementById('myChart2'));
      chart.draw(data, options);
    }

    function drawChart3() {
      var data = google.visualization.arrayToDataTable([
        ['status', 'sum'],
        ['נשארו', 12.5],
        ['נקלטו', 87.5]
      ]);

      var options = {
        is3D: true
      };

      var chart = new google.visualization.PieChart(document.getElementById('myChart3'));
      chart.draw(data, options);


    }
  </script>
  
</body>

</html>

<?php
mysqli_close($connection);
?>
