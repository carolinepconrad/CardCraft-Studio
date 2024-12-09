<?php include ('../Employee/employee_header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bigshot+One&family=Inconsolata:wght@200..900&family=Space+Grotesk:wght@300..700&display=swap');

        body {
            font-family: 'Space Grotesk', sans-serif;
            line-height: 1.6;
            text-align: center;
        }
        a {
            text-decoration: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #f4f4f4;
        }
        .remove-btn {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .remove-btn:hover {
            background-color: #cc0000;
        }
    </style>

</head>


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

    // Filter query
    $sql = "SELECT id, product_name, image_path, color, style FROM product_catalog WHERE 1";
    $result = mysqli_query($conn, $sql);
?>

<body>
    <h1 style="margin-top: 25px; margin-bottom: 50px">Modify Products</h1>

   
        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Color</th>
                    <th>Style</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($product = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['id']); ?></td>
                        <td><img src="<?php echo htmlspecialchars($product['image_path']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>" style="width: 50px; height: auto;"></td>
                        <td><?php echo htmlspecialchars($product['product_name']); ?></td>
                        <td><?php echo htmlspecialchars($product['color']); ?></td>
                        <td><?php echo htmlspecialchars($product['style']); ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="remove_key" value="<?php echo $key; ?>">
                                <button type="submit" name="remove_from_cart" class="remove-btn">Remove </button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    <?php include '../footer.php'; ?>

    <?php
        mysqli_close($conn);
    ?>

</body>
</body>
</html>
