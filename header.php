<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../header.css">
  <title>CardCraft Studio</title>
</head>

<body>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Bigshot+One&family=Inconsolata:wght@200..900&family=Space+Grotesk:wght@300..700&display=swap');

.custom-navbar {
    background-color:#b1988f;
   
  
    
    
}

.navbar-nav .nav-link {
    color: #fff !important;
}

.navbar-nav .nav-link:hover {
    color: #f0e6d2 !important;
}

.navbar-nav .nav-link.active {
    font-weight: bold;
}

.navbar-brand-title {
    color: #1d1306;
    font-weight: bold;
    font-size: 1.5rem;
    font-family: 'Bigshot One', cursive;
}
</style>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />

<!-- Header Section with Navbar  -->
<nav class="navbar navbar-expand-lg custom-navbar">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <!-- Logo on the left -->
    <a class="navbar-brand" href="#">
      <img src="../images/logonobg.png" width="70" alt="Logo" />
    </a>

    <div class="collapse navbar-collapse" id="navbarNav">
      <span class="navbar-brand-title">CARDCRAFT STUDIO</span>
          
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php"><img src="../images/home.png" width="25"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../CatalogPage/catalog.php"><img src="../images/search.png" width="20"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../CartPage/cart.html"><img src="../images/cart.png" width="20"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../is_user_logged_in.php"><img src="../images/user.png" width="20"></a>
        </li>
      </ul>
    </div>
  </div>
</nav> 

</body>
</html>