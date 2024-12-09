<?php
include("con.php");

$result = null;

$sql = "SELECT idnum, fname, apartNum, comp FROM tblcomp";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uStay - View Complaints</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="home_style.css">
    <link rel="stylesheet" href="complaints_style.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h1>Rental Management</h1>
            <ul>
                <a href="home.html"><li>Dashboard</li></a>
                <a href="tenants.php"><li>Tenants</li></a>
                <a href="view_complaints.php"><li><u>View Complaints</u></li></a>
                <a href="login.php"><li>Logout</li></a>
            </ul>
        </div>

        <div class="main">
            <h2>Complaints List</h2>
            <?php if ($result && $result->num_rows > 0): ?>
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>ID Number</th>
                        <th>First Name</th>
                        <th>Apartment Number</th>
                        <th>Complaint</th>
                    </tr>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['idnum']); ?></td>
                        <td><?php echo htmlspecialchars($row['fname']); ?></td>
                        <td><?php echo htmlspecialchars($row['apartNum']); ?></td>
                        <td><?php echo htmlspecialchars($row['comp']); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </table>
            <?php else: ?>
                <p>No complaints found.</p>
            <?php endif; ?>

            <?php
            if ($conn) {
                $conn->close();
            }
            ?>
        </div>
    </div>
</body>
</html>
