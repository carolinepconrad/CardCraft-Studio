<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="employee_styles.css">
  <title>CardCraft Studio</title>
</head>


<!-- Get Current Employee Number -->
<?php
require '../Login/db_login_connect.php';
$username = $_COOKIE['employee_logged_in'];
$sql = "SELECT * FROM employees WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
}
?>
<?php include '../header.php'; ?>

<!-- Main Section -->
<section id="Main" class="Main">
  
  <h2>Name and Number</h2>
  <div class="Main">
    <p><?php echo $first_name; ?></p>
    <p><?php echo $last_name; ?></p>
    <p><?php echo $username; ?></p>
  </div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="cartstyle.css"> <!-- Optional for styling -->
</head>
<body>
    <h1 style="font-family: 'Space Grotesk', sans-serif; text-align:center; margin-top:10px;">
Edit Avaliable Products
</h1>
    <?php if (empty($cart)): ?>
        <p style="font-family: 'Space Grotesk', sans-serif; text-align:center; margin-top:10px;">
            Your cart is empty. <a href="/CatalogPage/catalog.php">Continue shopping</a>.
        </p>
    <?php else: ?>
        <table class="tablestyle">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $product_counts = array_count_values($cart);
                $product_names = [
                    1 => 'Product 1',
                    2 => 'Product 2',
                    3 => 'Product 3',
                    5 => 'Product 5',
                    6 => 'Product 6',
                    7 => 'Product 7',
                    8 => 'Product 8',
                    9 => 'Product 9',
                    10 => 'Product 10',
                    11 => 'Product 11',
                    12 => 'Product 12',
                    13 => 'Product 13',
                    14 => 'Product 14',
                    15 => 'Product 15',
                    16 => 'Product 16',
                    17 => 'Product 17',
                    18 => 'Product 18',
                    19 => 'Product 19',
                    20 => 'Product 20',
                    22 => 'Product 22',
                    23 => 'Product 23',
                    24 => 'Product 24',
                    25 => 'Product 25',
                    26 => 'Product 26',



                ];

                foreach ($product_counts as $product_id => $quantity): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product_names[$product_id] ?? 'Unknown Product'); ?></td>
                        <td><?php echo htmlspecialchars($quantity); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button>
        <p><a href="checkout.php"> Checkout</a></p>
        </button>
    <?php endif; ?>
    <form action="../Employee/Employee_Login/log_out_employee.php">
      <input class="button" type="submit" value="Log Out" name="log_out">
    </form>
</section>



</body>
</html>



<!-- Footer -->
<?php include '../footer.php'; ?>

</body>
</html>