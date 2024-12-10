<?php
    // Database connection and product fetching (same as before)
    $servername = "54.165.204.136";
    $serverusername = "group3";
    $serverpassword = "qux219jmV754[";
    $dbname = "group3";
    $conn = mysqli_connect($servername, $serverusername, $serverpassword, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
        
    //Delete User
    if (isset($_POST['remove_object']))  {
        $id = intval($_POST['remove_object']);
        $stmt = $conn->prepare("DELETE FROM product_catalog WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $message = "Product deleted successfully.";
        } else {
            $message = "Error deleting product: " . $stmt->error;
        }

    }
    //header('Location: remove_catalog.php');
    //exit;
?>