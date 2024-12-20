<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../employee_styles.css">
    <title>CardCraft Studio</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
  <!-- Header with Navbar -->
  <?php include '../employee_header.php'; ?>
  <!-- Main Section -->
  <div class="grid-container-element">
    <!-- Login Section -->
    <section id="login" class="login">
    <div class="grid-child-element red">
      <body>
        <h2>Employee Login</h2>
        <div class="form__group field">
          <form action="process_employee_login.php" method="post" >
            <label class="form__label" for="username" >Employee Number:</label>            
            <input class="form__field" type="text" name="username" id="username" required><br><br>
            <label class="form__label" for="username" >Password:</label>
            <input class="form__field" type="password" name="password"id="password" required><br><br>
            <input class="button" type="submit" value="Login" name="login_try">
          </form>
        </body>
        </div>
        <br><br>
        <div class="grid-child-element red">
      <body>
        <h2>Admin Login</h2>
        <div class="form__group field">
          <form action="../Admin_Login/process_admin_login.php" method="post" >
            <label class="form__label" for="username" >Admin Number:</label>            
            <input class="form__field" type="text" name="username" id="username" required><br><br>
            <label class="form__label" for="username" >Password:</label>
            <input class="form__field" type="password" name="password"id="password" required><br><br>
            <input class="button" type="submit" value="Login" name="login_try">
          </form>
        </body>
        </div>
    </div>
    </div>
    <br><br><br><br><br>
    </section>
    
    <!-- Create Login Section -->
    <section id="login" class="login">
      <div class="grid-child-element green">
          <body>
            <h2>Create Employee Login </h2>
            <div class="form__group field">
            <form action="create_employee_login.php" method="post">
              <label class="form__label" for="first_name">First Name:</label>
              <input class="form__field" type="text" name="first_name" id="first_name" required><br><br>
              <label class="form__label" for="last_name">Last Name:</label>
              <input class="form__field" type="text" name="last_name" id="last_name" required><br><br>
              <label class="form__label" for="username">Employee Number:</label>
              <input class="form__field" type="text" name="username" id="username" required><br><br>
              <label class="form__label" for="password">Password:</label>
              <input class="form__field" type="password" name="password" id="password" required><br><br>
              <input class="button" type="submit" value="Create Login" name="create_login">
            </form>
            </div>
            <div class="grid-child-element green">
          <body>
            <br>
            <h2>Create Admin Login</h2>
            <div class="form__group field">
            <form action="../Admin_Login/create_admin_login.php" method="post">
              <label class="form__label" for="first_name">First Name:</label>
              <input class="form__field" type="text" name="first_name" id="first_name" required><br><br>
              <label class="form__label" for="last_name">Last Name:</label>
              <input class="form__field" type="text" name="last_name" id="last_name" required><br><br>
              <label class="form__label" for="username">Admin Number:</label>
              <input class="form__field" type="text" name="username" id="username" required><br><br>
              <label class="form__label" for="password">Password:</label>
              <input class="form__field" type="password" name="password" id="password" required><br><br>
              <input class="button" type="submit" value="Create Login" name="create_login">
            </form>
            </div>
          </body>
        </div>
  </div>
          </body>
        </div>
  </div>  
        
    <!-- Footer -->
    <footer>
        <p>&copy; 2024 CardCraft Studio. All rights reserved.</p>
    </footer>
    
</body>
</html>
