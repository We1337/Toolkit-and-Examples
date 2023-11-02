<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>FTP File Upload</title>
    </head>
    <body>
        <h2>Please choose a file to upload:</h2>

        <!-- File Upload Form -->
        <form enctype="multipart/form-data" method="post" action="upload.php">
            <!-- MAX_FILE_SIZE Input (5 MB) -->
            <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />

            <!-- File Input -->
            <label for="file">Select File:</label>
            <input type="file" name="file" id="file" required>

            <!-- Submit Button -->
            <input type="submit" name="submit" value="Upload File">
        </form>
    </body>
</html>