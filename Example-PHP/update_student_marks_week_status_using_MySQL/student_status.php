<?php
// Create a database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'students';

// Create a MySQLi connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $student_ids = $_POST['student_id'];
    $student_names = $_POST['student_name'];
    $statuses = $_POST['week_status'];

    // Loop through the submitted data and update the database
    foreach ($student_ids as $key => $student_id) {
        $student_name = $student_names[$key];
        $week_statuses = $statuses[$student_id];

        $update_query = "UPDATE student_marks SET student_full_name = ?";

        for ($i = 1; $i <= 16; $i++) {
            $update_query .= ", week{$i}_status = ?";
        }

        $update_query .= " WHERE student_id = ?";

        $stmt = $mysqli->prepare($update_query);
        $update_values = array_merge([$student_name], $week_statuses, [$student_id]);

        $bindParams = array("s" . str_repeat("s", 16) . "i");
        array_unshift($update_values, ...$bindParams);

        $stmt->bind_param(...$update_values);
        $stmt->execute();
        $stmt->close();
    }
}

// Query to fetch data from the table
$query = "SELECT * FROM student_marks";

$result = $mysqli->query($query);

if ($result) {
    if ($result->num_rows > 0) {
        // Start a form for updating data
        echo "<form method='post'>";
        echo "<table border='1'>";
        
        // Create table headers from the column names
        echo "<tr>";
        echo "<th>Student ID</th>";
        echo "<th>Student Name</th>";
        
        // Generate table headers for each week starting from week1 to week16
        for ($i = 1; $i <= 16; $i++) {
            echo "<th>Week $i Status</th>";
        }
        
        echo "</tr>";

        // Fetch and display the data with input fields for updating
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['student_id']}</td>";
            echo "<td><input type='text' name='student_name[]' value='{$row['student_full_name']}'></td>";

            // Generate input fields for week status starting from week1 to week16
            for ($i = 1; $i <= 16; $i++) {
                $week_status = 'week' . $i . '_status';
                echo "<td>
                    <select name='week_status[{$row['student_id']}][$i]'>
                        <option value='absent' " . ($row[$week_status] == 'absent' ? 'selected' : '') . ">Absent</option>
                        <option value='present' " . ($row[$week_status] == 'present' ? 'selected' : '') . ">Present</option>
                        <option value='ill' " . ($row[$week_status] == 'ill' ? 'selected' : '') . ">Ill</option>
                        <option value='reason' " . ($row[$week_status] == 'reason' ? 'selected' : '') . ">Reason</option>
                    </select>
                </td>";
            }

            // Add checkboxes for selecting rows to update and set them as checked by default
            echo "<td><input type='checkbox' name='student_id[]' value='{$row['student_id']}' checked></td>";
            
            echo "</tr>";
        }

        // Close the HTML table
        echo "</table>";
        echo "<input type='submit' name='update' value='Update Selected'>";
        echo "</form>";
    } else {
        echo "No records found.";
    }

    $result->close();
} else {
    echo "Query failed: " . $mysqli->error;
}

// Close the database connection
$mysqli->close();
?>
