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
    color: #fff7f0;
    font-weight: bold;
    font-size: 1.5rem;
    font-family: 'Bigshot One', cursive;
}
 /* https://pajasevi.github.io/CSSnowflakes/ */
/* customizable snowflake styling */
.snowflake {
  color: #fff;
  font-size: 1.5em;
  font-family: Arial, sans-serif;
  text-shadow: 0 0 1px #000;
}
.snowflake,.snowflake .inner{animation-iteration-count:infinite;animation-play-state:running}@keyframes snowflakes-fall{0%{transform:translateY(0)}100%{transform:translateY(110vh)}}@keyframes snowflakes-shake{0%,100%{transform:translateX(0)}50%{transform:translateX(80px)}}.snowflake{position:fixed;top:-10%;z-index:9999;-webkit-user-select:none;user-select:none;cursor:default;animation-name:snowflakes-shake;animation-duration:3s;animation-timing-function:ease-in-out}.snowflake .inner{animation-duration:10s;animation-name:snowflakes-fall;animation-timing-function:linear}.snowflake:nth-of-type(0){left:1%;animation-delay:0s}.snowflake:nth-of-type(0) .inner{animation-delay:0s}.snowflake:first-of-type{left:10%;animation-delay:1s}.snowflake:first-of-type .inner,.snowflake:nth-of-type(8) .inner{animation-delay:1s}.snowflake:nth-of-type(2){left:20%;animation-delay:.5s}.snowflake:nth-of-type(2) .inner,.snowflake:nth-of-type(6) .inner{animation-delay:6s}.snowflake:nth-of-type(3){left:30%;animation-delay:2s}.snowflake:nth-of-type(11) .inner,.snowflake:nth-of-type(3) .inner{animation-delay:4s}.snowflake:nth-of-type(4){left:40%;animation-delay:2s}.snowflake:nth-of-type(10) .inner,.snowflake:nth-of-type(4) .inner{animation-delay:2s}.snowflake:nth-of-type(5){left:50%;animation-delay:3s}.snowflake:nth-of-type(5) .inner{animation-delay:8s}.snowflake:nth-of-type(6){left:60%;animation-delay:2s}.snowflake:nth-of-type(7){left:70%;animation-delay:1s}.snowflake:nth-of-type(7) .inner{animation-delay:2.5s}.snowflake:nth-of-type(8){left:80%;animation-delay:0s}.snowflake:nth-of-type(9){left:90%;animation-delay:1.5s}.snowflake:nth-of-type(9) .inner{animation-delay:3s}.snowflake:nth-of-type(10){left:25%;animation-delay:0s}.snowflake:nth-of-type(11){left:65%;animation-delay:2.5s}

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
          <a class="nav-link" href="../CatalogPage/catalogtry.php"><img src="../images/search.png" width="20"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../CartPage/cart.php"><img src="../images/cart.png" width="20"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../is_user_logged_in.php"><img src="../images/user.png" width="20"></a>
        </li>
      </ul>
    </div>
  </div>
</nav> 

 <!-- https://pajasevi.github.io/CSSnowflakes/  -->
<div class="snowflakes" aria-hidden="true">
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
</div>

</body>
</html>