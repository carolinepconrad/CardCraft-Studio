<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CardCraft Studio</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<!-- Header Section with Navbar -->
<?php include '../header.php'; ?>

<!-- Getting Current User Preferences -->
<?php
require '../Login/db_login_connect.php';
$username = $_COOKIE['logged_in'];
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
}

// Handle profile picture upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_picture'])) {
    $file = $_FILES['profile_picture'];

    // Validate and process the file upload
    if ($file['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName = basename($file['name']);
        $filePath = $uploadDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            // Save file path in a cookie
            setcookie('profile_picture', $filePath, time() + (86400 * 30)); // 30 days
            $profilePicture = $filePath;
        } else {
            echo "<p>Error uploading the file.</p>";
        }
    } else {
        echo "<p>Error: Invalid file upload.</p>";
    }
}

// Check if a profile picture is saved in cookies
$profilePicture = isset($_COOKIE['profile_picture']) ? $_COOKIE['profile_picture'] : 'logonobg.png'; // Default image
?>

<!-- User Preferences Page -->
<div style="background-color:#f2e1d8; padding-left: 500px; padding-right: 500px; padding-bottom: 50px; padding-top: 50px;">
    <section>
        <center>
            <div style="border: 2px solid #000; padding: 50px; border-radius: 10px;">
                <ins><h2>Profile Information:</h2></ins>
                <br>
                <img src="<?php echo htmlspecialchars($profilePicture); ?>" alt="Profile Picture" width="150">
                <br />
                <!-- Profile Picture Change Form -->
               <center> <form action="" method="POST" enctype="multipart/form-data"> <br>
                   
                    <input type="file" name="profile_picture" id="profile_picture" accept="image/*" required> <br><br>
                    <button type="submit" onclick="location.reload();">Upload</button>
                </form>
                <br>
                </center>
                <form action="temporarily_renamed.php" method="POST">
                    <input type="text" name="fn" id="fn" placeholder="<?php echo $first_name ?>" required>
                    <input type="text" name="ln" id="ln" placeholder="<?php echo $last_name ?>" required>
                    <br>
                    <input type="email" name="em" id="em" placeholder="<?php echo $username ?>" required>
                    <br>
                    <input type="submit" value="Submit">
                </form>
                <br>
                <form action="http://localhost:3000/log_out_user.php">
                    <input class="button" type="submit" value="Log Out" name="log_out">
                </form>
            </div>
        </center>
    </section>
</div>

<!-- Footer Section -->
<?php include '../footer.php'; ?>

</body>
</html>
