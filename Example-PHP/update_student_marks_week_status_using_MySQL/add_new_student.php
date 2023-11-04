<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "students";

// Create a MySQLi connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $student_name = $_POST['student_name'];

    $insert_query = "INSERT INTO student_marks (student_full_name) VALUES (?)";

    $stmt = $mysqli->prepare($insert_query);
    $stmt->bind_param("s", $student_name);
    $stmt->execute();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Student</title>
</head>
<body>
    <h1>Add New Student</h1>
    <form method="post">
        <label for="student_name">Student Name:</label>
        <input type="text" name="student_name" required><br>

        <input type="submit" name="add" value="Add Student">
    </form>
</body>
</html>

<?php
// Close the database connection
$mysqli->close();
?>
