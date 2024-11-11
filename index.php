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
  <nav style="position: absolute; top: 0; width: 100%; z-index: 10">
  </nav>
  <div style="position: relative; width: 100%; height: auto; max-height: 985px; overflow: hidden;">
  <video autoplay muted loop id="bgvideo" style="width: 100%; height: auto;">
    <source src="images/bgvideo.mp4" type="video/mp4">
  </video>
  <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white; z-index: 20;">
    <h1>CARDCRAFT STUDIO</h1>
    <p class="tagline">ADD TAG LINE</p>
    <a href="#aboutUs" class="btn-primary">Learn More</a>
  </div>
  </div>
</section>

<!-- SNOWFLAKE EFFECT-->
<div class="snowflakes" aria-hidden="true">
  <div class="snowflake">
    <div class="inner">❄</div>
  </div>
  <div class="snowflake">
    <div class="inner">❄</div>
  </div>
  <div class="snowflake">
    <div class="inner">❄</div>
  </div>
  <div class="snowflake">
    <div class="inner">❄</div>
  </div>
  <div class="snowflake">
    <div class="inner">❄</div>
  </div>
  <div class="snowflake">
    <div class="inner">❄</div>
  </div>
  <div class="snowflake">
    <div class="inner">❄</div>
  </div>
  <div class="snowflake">
    <div class="inner">❄</div>
  </div>
  <div class="snowflake">
    <div class="inner">❄</div>
  </div>
  <div class="snowflake">
    <div class="inner">❄</div>
  </div>
  <div class="snowflake">
    <div class="inner">❄</div>
  </div>
  <div class="snowflake">
    <div class="inner">❄</div>
  </div>
</div>

<!-- Gallery Section -->
<section id="gallery" class="gallery">
  <h2>Our Work</h2>
  <div class="gallery-container" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
    <div class="card" style="width: 18rem;">
      <img src="./images/cards1.png" class="card-img-top" alt="Sample Card 1">
      <div class="card-body">
        <h5 class="card-title">Sample Card 1</h5>
        <p class="card-text">A beautiful card for any occasion.</p>
        <a href="#" class="btn btn-primary">View Details</a>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <img src="./images/cards1.png" class="card-img-top" alt="Sample Card 2">
      <div class="card-body">
        <h5 class="card-title">Sample Card 2</h5>
        <p class="card-text">A beautiful card for any occasion.</p>
        <a href="#" class="btn btn-primary">View Details</a>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <img src="./images/cards1.png" class="card-img-top" alt="Sample Card 3">
      <div class="card-body">
        <h5 class="card-title">Sample Card 3</h5>
        <p class="card-text">A beautiful card for any occasion.</p>
        <a href="#" class="btn btn-primary">View Details</a>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <img src="./images/cards1.png" class="card-img-top" alt="Sample Card 4">
      <div class="card-body">
        <h5 class="card-title">Sample Card 4</h5>
        <p class="card-text">A beautiful card for any occasion.</p>
        <a href="#" class="btn btn-primary">View Details</a>
      </div>
    </div>
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
