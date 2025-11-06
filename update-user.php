<?php
include 'db.php';

if (isset($_POST['update'])) {
    $oldName   = $_POST['Name'];       // Old name (hidden)
    $newName   = $_POST['NewName'];    // New name
    $username  = $_POST['Username'];
    $age       = $_POST['Age'];
    $sex       = $_POST['Sex'];
    $birthday  = $_POST['Birthday'];

    // Update query
    $sql = "UPDATE users 
            SET Name = '$newName',
                Username = '$username',
                Age = '$age',
                Sex = '$sex',
                Birthday = '$birthday'
            WHERE Name = '$oldName'";

    if ($conn->query($sql) === TRUE) {
        header("Location: landingpage.php?update=success");
        exit;
    } else {
        // For debugging: show SQL error (optional)
        echo "Error updating record: " . $conn->error;
    }
}
?>
