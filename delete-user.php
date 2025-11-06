<?php
include 'db.php';

if (isset($_GET['name'])) {
    $name = $_GET['name'];
    
    
    $sql = "DELETE FROM users WHERE Name = '$name'";
    
    echo "SQL: " . $sql . "<br>";
    
    if ($conn->query($sql) === TRUE) {
        if ($conn->affected_rows > 0) {
            echo "<script>
                    alert('Record deleted successfully!');
                    window.location.href = 'landingpage.php';
                  </script>";
        } else {
            echo "No rows were deleted. Check if the name exists in the database.<br>";
            echo "Affected rows: " . $conn->affected_rows;
        }
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    header("Location: landingpage.php");
    exit;
}
?>