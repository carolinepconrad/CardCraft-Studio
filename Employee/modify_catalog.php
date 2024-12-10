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
            width: 98%;
            border-collapse: collapse;
            margin-bottom: 20px;
            margin-left: 1%;

        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #f4f4f4;
        }
        .submit-btn {
            background-color: #F4F4F4;
            color: gray;
            border: 1px solid #ddd;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.2s, color 0.2s, border 0.2s;
        }
        .submit-btn:hover {
            background-color: rgb(148, 148, 148);
            color: #F4F4F4;
            border: 1px solid rgb(148, 148, 148);
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

    if(isset($_POST['change_row'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $image_path =  mysqli_real_escape_string($conn, $_POST['image_path']);
        $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
        $color = mysqli_real_escape_string($conn, $_POST['color']);
        $style = mysqli_real_escape_string($conn, $_POST['style']);

        $update = "UPDATE product_catalog SET image_path = '$image_path', product_name = '$product_name', color='$color', style='$style' WHERE id=$id";

        if (mysqli_query($conn, $update)) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "<p>Error updating product: " . mysqli_error($conn) . "</p>";
        }
    }

    $sql = "SELECT id, image_path, product_name, color, style FROM product_catalog WHERE 1";
    $result = mysqli_query($conn, $sql);
?>

<body>
    <h1 style="margin-top: 50px; margin-bottom: 50px">Modify Products</h1>

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
                    <form method="POST">
                        <td><?php echo htmlspecialchars($product['id']); ?></td>
                        <td>
                            <img src="<?php echo htmlspecialchars($product['image_path']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>" style="width: 50px; height: auto; padding: 2px;">
                            <input type="text" name="image_path" 
                                value="<?php echo htmlspecialchars($product['image_path']); ?>" 
                                style="width: fill; color: gray;">
                        </td>
                        <td>
                            <input type="text" name="product_name"
                                value="<?php echo htmlspecialchars($product['product_name']); ?>" 
                                style="width: fill; color: gray;">
                        </td>
                        <td>
                            <input type="text" name="color" 
                                value="<?php echo htmlspecialchars($product['color']); ?>" 
                                style="width: fill; color: gray;">
                        </td>
                        <td>
                            <input type="text" name="style" 
                                value="<?php echo htmlspecialchars($product['style']); ?>" 
                                style="width: fill; color: gray;">
                        </td>
                        <td>
                            <input type="hidden" name="id" 
                                value="<?php echo htmlspecialchars($product['id']); ?>">
                            <button type="submit" name="change_row" class="submit-btn">
                                Update
                            </button>
                        </td>
                    </form>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <?php include '../footer.php'; ?>

    <?php mysqli_close($conn); ?>

</body>
</body>
</html>
