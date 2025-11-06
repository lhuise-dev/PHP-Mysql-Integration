<?php
  include 'db.php';
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Create Account</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="createaccount.css">
</head>
<body>
  <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
    <div class="login-box d-flex justify-content-center">
      <div class="login-form text-center mt-5" style="width:320px;">
        <p class="fs-5 fw-medium mb-4">Create Account</p>

        <form action="createaccount.php" method="POST">
          <div class="mb-3">
            <input type="text" class="form-control" name="Name" placeholder="Name" required>
          </div>

          <div class="mb-3">
            <input type="text" class="form-control" name="Username" placeholder="Username" required>
          </div>

          <div class="mb-3">
            <input type="number" class="form-control" name="Age" placeholder="Age" required min="1">
          </div>

          <div class="mb-3">
            <input type="text" class="form-control" name="Sex" placeholder="Sex (M or F)" required maxlength="1">
          </div>

          <div class="mb-3">
            <input type="date" class="form-control" name="Birthday" required>
          </div>

          <div class="mb-3">
            <input type="password" class="form-control" name="Password" placeholder="Password" required>
          </div>

          <button type="submit" class="btn btn-danger rounded-pill w-100 py-2">Create Account</button>

          <p class="fs-6 text-muted mt-3">Already have an account? <a href="login.php">Login here.</a></p>

              <?php
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $Name = $_POST['Name'];
                $Username = $_POST['Username'];
                $Age = $_POST['Age'];
                $Sex = $_POST['Sex'];
                $Birthday = $_POST['Birthday'];
                $Password = $_POST['Password'];

                // Hash the password
                $hashed_pass = password_hash($Password, PASSWORD_DEFAULT);

                // Insert query
                $sql = "INSERT INTO users (Name, Username, Age, Sex, Birthday, Password)
                        VALUES ('$Name', '$Username', '$Age', '$Sex', '$Birthday', '$hashed_pass')";

                if ($conn->query($sql) === TRUE) {
                    header("Location: login.php");
                } else {
                    echo "Error, try again.";
                }
            }

            $conn->close();
              ?>

        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
