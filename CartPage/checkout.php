<?php
session_start();

?>

<?php include '../header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: 'Space Grotesk', sans-serif;
            line-height: 1.6;
            text-align: center;
        }
        .checkout-container {
            margin: 20px auto;
            width: 60%;
        }
        .checkout-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .checkout-table th, .checkout-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .checkout-table th {
            background-color: #f4f4f4;
        }
        .checkout-form input {
            padding: 10px;
            margin: 5px 0;
            width: 100%;
        }
        .checkout-form button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .checkout-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1 style="margin-top: 25px">Checkout</h1>

    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
        <div class="checkout-container">
            <table class="checkout-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Color</th>
                        <th>Style</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart'] as $product): ?>
                        <tr>
                            <td><img src="<?php echo htmlspecialchars($product['image_path']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>" style="width: 50px; height: auto;"></td>
                            <td><?php echo htmlspecialchars($product['product_name']); ?></td>
                            <td><?php echo htmlspecialchars($product['color']); ?></td>
                            <td><?php echo htmlspecialchars($product['style']); ?></td>
                            <td><?php echo $product['quantity']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="confirmation">
                <p>Your order is confirmed!</p>
            </div>

            
    <?php else: ?>
        <p>Your cart is empty. Please add items to your cart before proceeding to checkout.</p>
    <?php endif; ?>

    <button><a href="/CatalogPage/catalogtry.php">Back to Products</a></button>

</body>
</html>
