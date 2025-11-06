<?php
include 'db.php'; // your database connection file
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['Name']);
    $username = trim($_POST['Username']);
    $age = trim($_POST['Age']);
    $sex = trim($_POST['Sex']);
    $birthday = trim($_POST['Birthday']);
    $password = trim($_POST['Password']);

    // Check if password is blank
    if (empty($password)) {
        echo "Password cannot be blank. Please provide a password.";
        exit();
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and insert data
    $stmt = $conn->prepare("INSERT INTO users (Name, Username, Age, Sex, Birthday, Password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $name, $username, $age, $sex, $birthday, $hashedPassword);

    if ($stmt->execute()) {
        echo "<script>alert('User added successfully!'); window.location.href='landingpage.php';</script>";
    } else {
        echo "<script>alert('Error adding user: " . addslashes($stmt->error) . "'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

