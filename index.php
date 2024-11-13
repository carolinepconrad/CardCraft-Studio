<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>CardCraft Studio</title>
</head>
<?php include 'header.php'; ?>

<body style="background-color: #f2e1d8;">
<!-- Main Section -->
<section id="firstSection" class="hero">
  <div class="video-container">
    <video autoplay muted loop id="bgvideo">
      <source src="images/bgvideo.mp4" type="video/mp4">
    </video>
    <div class="hero-content">
      <h1>CARDCRAFT STUDIO</h1>
    </div>
  </div>
</section>


<!-- Gallery Section -->
<section class="gallery">
  <h2>Our Product Gallery</h2>
  <div class="gallery-grid">
    <!-- Product 1 -->
    <div class="product-card">
      <img src="images/product1.jpg" alt="Product 1">
      <h3>Product 1</h3>
      <p>$19.99</p>
    </div>

    <!-- Product 2 -->
    <div class="product-card">
      <img src="images/product2.jpg" alt="Product 2">
      <h3>Product 2</h3>
      <p>$24.99</p>
    </div>

    <!-- Product 3 -->
    <div class="product-card">
      <img src="images/product3.jpg" alt="Product 3">
      <h3>All Products</h3>
    </div>
  </section>
  



<!-- Testimonials Section -->
<section id="testimonials" class="testimonials">
  <h2>What Our Customers Say</h2>
  <div class="testimonial">
    <p>"Beautiful designs and top-notch quality! My go-to for unique cards!"</p>
    <p>- Brandon P.</p>
  </div>
  <div class="testimonial">
    <p>"CardCraft Studio’s cards are perfect for every occasion. Highly recommended!"</p>
    <p>- Tony S.</p>
  </div>
</section>

<!-- About Us Section -->
<section id="aboutUs" class="about">
  <h2>About Us</h2>
  <p>A Christmas card-selling business that sells a variety of cards with a wide 
    selection of designs to choose from. Sells digital cards as well as physical ones 
    sending the digital ones through email. Physical cards can come with an envelope already
    addressed to the North Pole! The data that will need to be stored is a card catalog with 
    all the unique card designs. This will include both the physical and digital designs as well 
    as an inventory amount for each item.</p>
</section>

<!-- Contact Us Section -->
<section id="contactUs" class="contact">
  <h2>Contact Us</h2>
  <p><strong>Location:</strong> 200 Manor Ave, Langhorne, PA 19047</p>
  <p><strong>Email:</strong> info@cardcraftstudio.com</p>
  <p><strong>Phone:</strong> (555) 123-4567</p>
</section>

<!-- Footer -->
<footer>
  <p>&copy; 2024 CardCraft Studio. All rights reserved.</p>
</footer>

</body>
</html>
