<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>uStay</title>
<link rel="stylesheet" href="login_style.css">
</head>
<body>
  <h1>uStay House Rental System</h1>
  <h2>Login</h2>
  <table>
    <form action="login.php" method="post">  <tr>
        <td>
          <label for="idnum">ID Number:</label>
        </td>
        <td>
          <input type="text" id="idnum" name="idnum" placeholder="Enter your id number" required>
        </td>
      </tr>
      <tr>
        <td>
          <label for="password">Password:</label>
        </td>
        <td>
          <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </td>
      </tr>
      <tr>
        <td>
          <label for="role">Role:</label>
        </td>
        <td>
          <select name="role" required>
            <option value="landlord">Landlord</option>
            <option value="tenant">Tenants</option>
          </select>
        </td>
      </tr>
      <tr class="buttons">
        <td colspan="2">
          <button type="submit">Submit</button>
          <button type="reset" class="clear">Clear</button>
        </td>
      </tr>
    </form>
  </table>
  <p>Create account <a href="register.php">click here</a></p>
</body>
</html>

<?php
include('con.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idnum = $_POST["idnum"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    if (empty($idnum) || empty($password) || empty($role)) {
        $error = "Please fill in all required fields";
    } else {
        if ($role == "landlord") {
            $sql = "SELECT * FROM tbllandlord WHERE idnum = ? AND password = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $idnum, $password);
        } elseif ($role == "tenant") {
            $sql = "SELECT * FROM tbltenant WHERE idnum = ? AND password = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $idnum, $password);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            header("Location: home.html");
            exit;
        } else {
            $error = "Invalid username or password";
        }
    }
}

$conn->close();
?>

<!-- Display error message if any -->
<?php if (isset($error)) { ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php } ?>