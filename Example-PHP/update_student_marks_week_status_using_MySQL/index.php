<!DOCTYPE html>
<html>
<head>
    <title>Add Marks for a Student</title>
    <style>
        /* CSS for styling the form */
        form {
            width: 80%;
            margin: 0 auto;
        }

        label, input {
            display: block;
            margin-bottom: 10px;
        }

        .marks-input-row {
            display: grid;
            grid-template-columns: repeat(16, 1fr);
            gap: 5px;
        }

        .marks-input-row label {
            text-align: center; /* Center align text */
        }

        .marks-input-row input {
            width: 30px; /* Adjust the width to your preference */
        }

        .submit-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Teacher</h1>
    <a href="add_new_student.php">Add new Student</a><br>
    <a href="display_marks.php">Display Students</a><br>
    <a href="students_marks.php">Students Marks</a><br>
    <a href="student_status.php">Student Week status</a><br>
</body>
</html>