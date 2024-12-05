<?php

// Database Connection
require 'db_login_connect.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Delete Request for Users
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $user_id = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    if ($stmt->execute()) {
        $message = "User deleted successfully.";
    } else {
        $message = "Error deleting user: " . $stmt->error;
    }
    $stmt->close();
}

// Fetch all data from the users table
$sql = "SELECT user_id, username, password_hash, first_name, last_name, address FROM users";
$result = $conn->query($sql);

// Fetch current admin details
$username = $_COOKIE['admin_logged_in'];
$sql_admin = "SELECT first_name, last_name FROM admins WHERE username = ?";
$stmt = $conn->prepare($sql_admin);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($first_name, $last_name);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../employee_styles.css">
    <title>Manage Users - CardCraft Studio</title>
</head>
<body>
    <!-- Include Header -->
    <?php include '../employee_header.php'; ?>

    <!-- Main Section -->
    <section id="Main" class="Main">
        <h2>Manage Users</h2>
        <div class="Main">
            <p>Name: <?php echo htmlspecialchars($first_name . ' ' . $last_name); ?></p>
            <p>Admin Username: <?php echo htmlspecialchars($username); ?></p>
            <form action="log_out_admin.php">
                <input class="button" type="submit" value="Log Out">
            </form>
        </div>

        <div class="Main">
            <?php if (isset($message)): ?>
                <p style="color: green; text-align: center;"><?php echo htmlspecialchars($message); ?></p>
            <?php endif; ?>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['user_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['username']); ?></td>
                            
                            <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['address']); ?></td>
                            <td>
                                <a class="button" href="?delete=<?php echo $row['user_id']; ?>" onclick="return confirm('Are you sure you want to delete this user?');">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="7">No users found</td></tr>
                <?php endif; ?>
            </table>
        </div>
    </section>

    <!-- Include Footer -->
    <?php include '../../footer.php'; ?>

    <?php $conn->close(); ?>
</body>
</html>
