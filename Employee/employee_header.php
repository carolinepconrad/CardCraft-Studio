<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="employee_styles.css">
  <title>CardCraft Studio</title>
</head>

<body>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
<!-- Bootstrap CSS -->



<!-- Get Current Employee Number -->
<?php
if (isset($_COOKIE['employee_logged_in'])) {
  $username = $_COOKIE['employee_logged_in'];

}else {
$username= "Employee";
}
?>
<!-- Header Section with Navbar -->
<nav class="navbar navbar-expand-lg custom-navbar">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <!-- Logo on the left -->
    <a class="navbar-brand" href="../../index">
      <img src="../../images/logonobg.png" width="70" alt="Logo" />
    </a>

    <div class="collapse navbar-collapse" id="navbarNav">
      <span class="navbar-brand-title">CARDCRAFT STUDIO</span>
          
    <ul class="navbar-nav ms-auto">
      <p class="navbar-brand-title"><?php echo $username ?></p>
    </ul>
    </div>
  </div>
</nav> 

</body>
</html>