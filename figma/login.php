<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection details
        $servername = "your_servername";
        $username = "your_username";
        $password = "your_password";
        $dbname = "your_database_name";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch username and password from the login form
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Prepare and execute the SQL query
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the user exists in the database
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashed_password = $row["password"];
// Verify the password
            if (password_verify($password, $hashed_password)) {
                // Start a session and store the user data
                session_start();
                $_SESSION["username"] = $row["username"];
                $_SESSION["user_id"] = $row["id"];

                // Redirect to the main page of the system
                header("Location: main_page.php");
                exit();
            } else {
                echo "Invalid username or password.";
            }
        } else {
            echo "Invalid username or password.";
        }

        // Close the database connection
        $conn->close();
    }
    ?>
    <h2>Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>