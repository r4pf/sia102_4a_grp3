<?php
include ("con.php");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idnum = $conn->real_escape_string($_POST['idnum']);
    $fname = $conn->real_escape_string($_POST['fname']);
    $apartNum = $conn->real_escape_string($_POST['apartNum']);
    $comp = $conn->real_escape_string($_POST['comp']);

    // SQL query to insert the complaint into the database
    $sql = "INSERT INTO tblcomp (idnum, fname, apartNum, comp) VALUES ('$idnum', '$fname', '$apartNum', '$comp')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Complaint submitted successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uStay - Tenant Complaint Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="home_style.css">
    <link rel="stylesheet" href="complaints_style.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h1>Rental Management</h1>
            <ul>
                <a href="home-user.html"><li>Dashboard</li></a>
                <a href="houses.html"><li>Houses</li></a>
                <a href="bed_space.html"><li>Bed Spacers</li></a>
                <a href="complaints.php"><li><u>Complaints</u></li></a>
                <a href="index.html"><li>Logout</li></a>
            </ul>
        </div>

        <div class="main">
            <h2>Tenant Complaint Form</h2>
            <div class="form-container">
                <form id="complaintForm" action="" method="POST">
                    <label for="idnum">ID Number:</label>
                    <input type="text" id="idnum" name="idnum" required>

                    <label for="fname">First Name:</label>
                    <input type="text" id="fname" name="fname" required>

                    <label for="apartNum">Apartment Number:</label>
                    <input type="text" id="apartNum" name="apartNum" required>

                    <label for="comp">Complaint:</label> <p>Max 250 characters</p>
                    <textarea id="comp" name="comp" rows="4" maxlength="250" required></textarea>
                    
                    <br>
                    <button type="submit">Submit Complaint</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
