<!-- 
// include "config.php";
// session_start();

// $camp_id = $_GET["camp_id"];

// $quary = "UPDATE  FROM tbl_227_camp WHERE id_camp=".$camp_id; -->

<?php
// Include the configuration file
include "config.php";
session_start();
if (!isset($_SESSION["email"])) {
    header("location: ./login.php");
    exit; // prevent further execution, should there be more code that follows
  }

// Check if the user is logged in or authorized to access this page

// Check if camp_id is provided in the URL
if (isset($_GET["camp_id"])) {
    $camp_id = $_GET["camp_id"];

    // Fetch the existing data from the database for the given camp_id
    $query = "SELECT * FROM tbl_227_camp WHERE id_camp = " . $camp_id;
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Assuming there's only one row for the given camp_id
        $row = mysqli_fetch_assoc($result);
    } else {
        // Handle the case when camp_id is not found in the database
        echo "Camp ID not found in the database.";
        exit;
    }
} else {
    // Handle the case when camp_id is not provided in the URL
    echo "Camp ID not provided.";
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the form submission
    $campName = $_POST["campName"];
    $bloodType = $_POST["bloodType"];
    $bloodId = $_POST["bloodId"];
    $user_id = $_POST["user_id"];
    $needs = $_POST["needs"];
    $collected = $_POST["collected"];
    $DeadLine = $_POST["DeadLine"];

    // Validate and sanitize the input data if needed

    // Update the data in the database
    $query = "UPDATE tbl_227_camp SET 
              CampName = '$campName', 
              bloodType = '$bloodType', 
              Blood_id = '$bloodId', 
              user_id = '$user_id',
              needs = '$needs',
              collected = '$collected',
              DeadLine = '$DeadLine'
              WHERE id_camp = " . $camp_id;
              
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Redirect to the page showing the updated data or any other page as desired
        header("Location: show_camps.php"); // Redirect to a page that shows all camps
        exit;
    } else {
        // Handle the case when the update query fails
        echo "Failed to update data.";
    }
}

// Close the database connection

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Camp</title>
</head>
<body>
    <h2>Edit Camp</h2>
    <form method="post" action="existcamp.php">
        <label for="campName">Camp Name:</label>
        <input type="text" id="campName" name="name" value="<?php echo $row['CampName']; ?>">
        <br>
        <label for="bloodType">Blood Type:</label>
        <input type="text" id="bloodType" name="kind" value="<?php echo $row['bloodType']; ?>">
        <br>
        <label for="bloodId">Blood ID:</label>
        <input type="text" id="bloodId" name="bloodId" value="<?php echo $row['blood_id']; ?>">
        <br>
        <label for="user_id">User ID:</label>
        <input type="text" id="user_id" name="user_id" value="<?php echo $row['user_id']; ?>">
        <br>
        <label for="needs">Needs:</label>
        <input type="text" id="needs" name="need" value="<?php echo $row['needs']; ?>">
        <br>
        <label for="collected">Collected:</label>
        <input type="text" id="collected" name="sum" value="<?php echo $row['collected']; ?>">
        <br>
        <label for="DeadLine">Deadline:</label>
        <input type="text" id="DeadLine" name="date" value="<?php echo $row['Deadline']; ?>">
        <br>
        <input type="submit" value="Update">
    </form>
</body>
</html>

<?php
mysqli_close($connection);
?>