<!DOCTYPE html>
<html>
<head>
    <title>Student Marks</title>
</head>
<body>
    <h1>Student Marks</h1>

    <?php
    // Database Configuration
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "students";

    // Create a MySQLi Connection
    $mysqli = new mysqli($host, $username, $password, $database);

    // Check Database Connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Query to Fetch Student Data
    $query = "SELECT * FROM student_marks";

    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        // Start of the Student Data Table
        echo "<table border='1'>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Student Group</th>
                <th>Faculty</th>
                <th>Class</th>
                <th>Week 1</th>
                <th>Week 2</th>
                <th>Week 3</th>
                <th>Week 4</th>
                <th>Week 5</th>
                <th>Week 6</th>
                <th>Week 7</th>
                <th>Week 8</th>
                <th>Week 9</th>
                <th>Week 10</th>
                <th>Week 11</th>
                <th>Week 12</th>
                <th>Week 13</th>
                <th>Week 14</th>
                <th>Week 15</th>
                <th>Week 16</th>
            </tr>";

        // Loop Through Student Records
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>".$row["student_id"]."</td>
                <td>".$row["student_full_name"]."</td>
                <td>".$row["student_group"]."</td>
                <td>".$row["student_faculty"]."</td>
                <td>".$row["student_subject"]."</td>
                <td>".$row["week1"]."</td>
                <td>".$row["week2"]."</td>
                <td>".$row["week3"]."</td>
                <td>".$row["week4"]."</td>
                <td>".$row["week5"]."</td>
                <td>".$row["week6"]."</td>
                <td>".$row["week7"]."</td>
                <td>".$row["week8"]."</td>
                <td>".$row["week9"]."</td>
                <td>".$row["week10"]."</td>
                <td>".$row["week11"]."</td>
                <td>".$row["week12"]."</td>
                <td>".$row["week13"]."</td>
                <td>".$row["week14"]."</td>
                <td>".$row["week15"]."</td>
                <td>".$row["week16"]."</td>
            </tr>";
        }

        // End of the Student Data Table
        echo "</table>";
    } else {
        echo "No student data found.";
    }

    // Close the Database Connection
    $mysqli->close();
    ?>
</body>
</html>
