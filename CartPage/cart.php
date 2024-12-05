<?php
session_start();

// Check if the cart is empty
$cart = $_SESSION['cart'] ?? [];

?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Bigshot+One&family=Inconsolata:wght@200..900&family=Space+Grotesk:wght@300..700&display=swap');
 
    .tablestyle {
    width: 50%;
    border-collapse: collapse;
    font-size: 16px;
    font-family: 'Space Grotesk', sans-serif;
    text-align: left;
    margin-left: 25%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

    .tablestyle thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;

}

    .tablestyle th, .tablestyle td {
    padding: 10px ;
}

    .tablestyle th {
    background-color: #b1988f;}

    .tablestyle tbody tr {
    border-bottom: 1px solid #dddddd;
}


    .tablestyle button {
    color: #1d1306;
    border: none;
    padding: 8px 12px;
    cursor: pointer;
    font-size: 14px;
    border-radius: 10px;
    transition: background-color 0.3s ease;
}

    .tablestyle button:hover {
    background-color: #dddddd;

}



</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="cartstyle.css"> <!-- Optional for styling -->
</head>
<body>
    <?php include '../header.php'; ?>
    <h1 style="font-family: 'Space Grotesk', sans-serif; text-align:center; margin-top:10px;">
Your Shopping Cart...
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
                        <td>
                            <form action="remove_from_cart.php" method="POST" style="display:inline;">
                                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
                                <button type="submit">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
  
        <p style="font-family: 'Space Grotesk', sans-serif; text-align:center; margin-top:20px; margin-bottom:30px;">
            <a href="checkout.php"> Checkout</a>
        </p>
   
    <?php endif; ?>

    <?php include '../footer.php'; ?>
</body>
</html>
