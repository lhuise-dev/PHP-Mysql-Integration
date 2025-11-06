<?php
    include 'db.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
        <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
        <div class="login-box d-flex justify-content-center">
            <div class="login-form text-center mt-5">
            <p class="fs-5 fw-medium mb-4">Login Here</p>

                <form action="login.php" method="POST" style="width: 300px;">
                <div class="mb-3">
                    <input type="text" class="form-control" name="Username" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="Password" placeholder="Password" >
                </div>
                <button type="submit" class="btn btn-danger rounded-pill w-100 py-2">Login</button>
                <p class="fs-6 text-danger mt-2">New user? <a href="createaccount.php">Create acccount here.</a></p>

                <p class="text-danger">

                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $username = $_POST['Username'];
                        $password = $_POST['Password'];

                        // Query to find user
                        $sql = "SELECT * FROM users WHERE Username = '$username'";
                        $result = $conn->query($sql);

                        if ($result && $result->num_rows > 0) {
                            $row = $result->fetch_assoc();

                            // Verify hashed password
                            if (password_verify($password, $row['Password'])) {
                                $_SESSION['Username'] = $username;
                                header("Location: landingpage.php");
                                exit();

                            } else {
                                echo "Incorrect credentials, try again.";
                            }
                        } else {
                            echo "Incorrect credentials, try again.";
                        }
                    }
                ?>
            </form>
        </p>
    </div>
</div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>