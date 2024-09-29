<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>uStay</title>
<link rel="stylesheet" href="reg_style.css">
</head>
<body>
  <h1>uStay House Rental System</h1>
  <h2>Register</h2>
  <table>
    <form method="post">
      <tr>
        <td>
          <label for="idnum">ID Number: <br>* </label>
        </td>
        <td>
          <input type="text" id="idnum" name="idnum" placeholder="Enter ID Number" required>
        </td>
      </tr>
      <tr>
        <td>
          <label for="first name">First name: <br>*</label>
        </td>
        <td>
          <input type="text" id="fname" name="fname" placeholder="Enter your first name here" required>
        </td>
      </tr>
      <tr>
        <td>
          <label for="last name">Last name: <br>*</label>
        </td>
        <td>
          <input type="text" id="lname" name="lname" placeholder="Enter your last name here" required>
        </td>
      </tr>
      <tr>
        <td>
          <label for="password">Password: <br>*</label>
        </td>
        <td>
          <input type="password" id="password" name="password" placeholder="Enter your password here" required>
        </td>
      </tr>
      <tr>
        <td>
          <label for="role">Role <br>*</label>
        </td>
        <td>
          <select name="role" required>
            <option value="player">Landlord</option>
            <option value="coach">Tenants</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          <label for="apartNum">Apartment Number:</label>
        </td>
        <td>
          <input type="text" id="apartNum" name="apartNum" placeholder="Enter Apartment Number">
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <p style="color:red;">* Required</p>
        </td>
      </tr>
      <tr class="buttons">
        <td colspan="2">
          <button type="submit" name="regbtn">Submit</button>
          <button type="reset" class="clear">Clear</button>
        </td>
      </tr>
    </form>
  </table>
  <p>Already have account <a href="login.php">click here</a></p>
</body>
</html>

<?php
include('con.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idnum = $_POST["idnum"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $apartNum = $_POST["apartNum"];

    if (empty($idnum) || empty($fname) || empty($lname) || empty($password) || empty($role)) {
        $error = "Please fill in all required fields";
    } else {
        if ($role == "player") {
            $sql = "INSERT INTO tblLandlord (idnum, fname, lname, password, apartNum) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $idnum, $fname, $lname, $password, $apartNum);
        } elseif ($role == "coach") {
            $sql = "INSERT INTO tblTenant (idnum, fname, lname, password, apartNum) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $idnum, $fname, $lname, $password, $apartNum);
        }
        $stmt->execute();

        header("Location: login.php");
        exit;
    }
}

$conn->close();
?>

<?php
if (isset($error)) {
    echo "<p style='color:red;'>$error</p>";
}
?>