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
        button{
            padding: 5px 14px;
            border-radius: 15px;
            border: none;
            background-color: #5C4033;
            font-family: 'Space Grotesk', sans-serif;
            color: white;
            margin-top:-4px;
        }
        button:hover{
            background-color: #1d1306;

        }
        a{
            text-decoration: none;
            color: white;
        }
        video{
            width: 600px;
        margin-bottom: 100px;        }
        .noconfirmation{
            margin-top: 100px;
        }
        .confirmation{
           margin-top: 120px;
        }        
    </style>
</head>
<body>
    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>

    <video autoplay muted loop id="bgvideo">
      <source src="../images/confirm.mp4" type="video/mp4">
    </video>

            <h1 style="margin-top: -525px;">Thank you for your order!</h1>

            <div class="confirmation">
                
                <p>Your order is confirmed!</p>
            </div>

            
    <?php else: ?>
        <div class="noconfirmation">
        <p>Your cart is empty. Please add items to your cart before proceeding to checkout.</p>
        <button><a href="/CatalogPage/catalogtry.php">Back to Products</a></button>

    </div>
    <?php endif; ?>


</body>
</html>
