<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../employee_styles.css">
  <title>CardCraft Studio</title>
</head>


<!-- Get Current Employee Number -->
<?php
require 'db_login_connect.php';
$username = $_COOKIE['admin_logged_in'];
$sql = "SELECT * FROM admins WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
}
?>



<?php include '../employee_header.php'; ?>

<!-- Main Section -->
<section id="Main" class="Main">
  
  <h2>Employee Dashboard</h2>
  <div class="Main">
    <p>Name: <?php echo $first_name; echo " "; echo $last_name; ?></p>
    <p>Employee Number: <?php echo $username; ?></p>
    <form action="log_out_admin.php">
      <input class="button" type="submit" value="Log Out" name="log_out">
    </form>
  </div>
  <div class="Main">
    <form action="../modify_catalog.php">
      <input class="button" type="submit" value="Modify Catalog" name="modify">
    </form>
    <form action="../CatalogPage/catalog.php">
      <input class="button" type="submit" value="Search Catalog" name="search">
    </form>
    <form action="../remove_catalog.php">
      <input class="button" type="submit" value="Remove from Catalog" name="remove">
    </form>
  </div>
  <div>
        <form action="manage_users.php">
            <input class="button" type="submit" value="Manage Users" name="manage_users">
        </form>
    </div>
</section>




</body>
</html>



<!-- Footer -->
<?php include '../../footer.php'; ?>

</body>
</html>