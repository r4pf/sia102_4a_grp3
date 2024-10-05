<?php
include 'con.php';

$sql = "SELECT idnum, fname, lname, apartnum FROM tbltenant";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant List</title>
    <link rel="stylesheet" href="home_style.css">
    <link rel="stylesheet" href="table.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h1>Rental Management</h1>
            <ul>
                <li><a href="home.html">Dashboard</a></li>
                <li><a href="tenants.php"><u>Tenants</u></a></li>
                <li><a href="#">Complains</a></li>
                <li><a href="login.php">Logout</a></li>
            </ul>
        </div>

        <div class="main">
            <h2>Tenant List</h2>

            <?php if ($result->num_rows > 0): ?>
                <table border="1" cellpadding="10">
                    <tr>
                        <th>ID Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Apartment Number</th>
                    </tr>

                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['idnum']; ?></td>
                            <td><?php echo $row['fname']; ?></td>
                            <td><?php echo $row['lname']; ?></td>
                            <td><?php echo $row['apartnum']; ?></td>
                        </tr>
                    <?php endwhile; ?>

                </table>
            <?php else: ?>
                <p>No tenants found.</p>
            <?php endif; ?>

        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
