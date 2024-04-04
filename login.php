<?php include('server.php'); // Include server-side logic (errors, database connection) ?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<div class="header">
  <h2>Login</h2>
</div>

<form method="post" action="login.php">
  <?php include('errors.php'); // Display any errors from server-side validation ?>
  <div class="input-group">
    <label>Email</label>
    <input type="email" name="username" required>
  </div>
  <div class="input-group">
    <label>Password</label>
    <input type="password" name="password" required>
  </div>
  <div class="input-group">
    <button type="submit" class="btn" name="login_user">Login</button>
    <a href="./signin.php" class="btn btn-signup">Sign in</a>
  </div>
</form>

</body>
</html>
