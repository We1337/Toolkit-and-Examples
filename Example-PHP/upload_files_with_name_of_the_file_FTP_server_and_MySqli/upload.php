<?php
/**
 * FTP File Upload Script with MySQL Database Integration
 *
 * This script handles the FTP upload of specific file types to a remote server
 * and stores the file names in a MySQL database.
 * It checks the file type, generates a new filename, uploads the file to the "Documents" folder on the FTP server,
 * and records the file name in the database.
 *
 * @category File Upload
 * @package  FTP Upload
 * @author   We1337
 */

/**
 * Uploads a file to the FTP server with a new name and stores the filename in the database.
 *
 * This function checks the file type, generates a new unique filename,
 * uploads the file to the "Documents" folder on the FTP server, and records the file name in the database.
 *
 * @param string $host FTP server host
 * @param string $user FTP username
 * @param string $pass FTP password
 * @param array $file An array representing the uploaded file ($_FILES['file'])
 * @param mysqli $mysqli MySQL database connection
 *
 * @return string The upload result message
 */
function uploadFileToFTPAndDatabase($host, $user, $pass, $file, $mysqli)
{
    // Check if the file type is doc, docx, or txt
    $allowedFileTypes = ["application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "text/plain"];
    $fileType = mime_content_type($file['tmp_name']);

    if (!in_array($fileType, $allowedFileTypes)) {
        return "Invalid file type. Only doc, docx, and txt files are allowed.";
    }

    // Generate a new filename with a unique identifier
    $newFileName = uniqid() . "_" . $file['name'];

    // Open an FTP connection
    $conn = ftp_connect($host);
    if (!$conn) {
        return "Cannot initiate connection to the FTP host.";
    }

    // Login to the FTP server
    $loginResult = ftp_login($conn, $user, $pass);
    if (!$loginResult) {
        ftp_close($conn);
        return "Cannot login to the FTP server.";
    }

    // Upload the file with the new name to the "Documents" folder
    $uploadResult = ftp_put($conn, "Documents/" . $newFileName, $file['tmp_name'], FTP_BINARY);

    // Close the FTP connection
    ftp_close($conn);

    if ($uploadResult) {
        // Store the file name in the database
        $query = "INSERT INTO uploaded_files (file_name) VALUES (?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("s", $newFileName);
        
        if ($stmt->execute()) {
            return "File '{$file['name']}' was successfully uploaded as '$newFileName' to the FTP server and recorded in the database.";
        } else {
            return "Error storing file information in the database.";
        }
    } else {
        return "Error uploading the file to the FTP server.";
    }
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get FTP access parameters
    $host = "host";  // FTP server host
    $user = "user";  // FTP username
    $pass = "pass";  // FTP password

    // Check if the file was uploaded without errors
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        // Database connection parameters (adjust as needed)
        $dbHost = "dbhost";  // MySQLi server database host
        $dbUser = "dbuser";  // MySQLi server username
        $dbPass = "dbpass";  // MySQLi server password
        $dbName = "dbname";  // MySQLi server database name

        // Create a MySQL database connection
        $mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

        if ($mysqli->connect_error) {
            die("Database connection failed: " . $mysqli->connect_error);
        }

        // Call the uploadFileToFTPAndDatabase function and store the result message
        $resultMessage = uploadFileToFTPAndDatabase($host, $user, $pass, $_FILES['file'], $mysqli);

        // Close the database connection
        $mysqli->close();

        // Display the result message
        echo $resultMessage;
    } else {
        echo "File upload failed or no file was selected.";
    }
}
?>
