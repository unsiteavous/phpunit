<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
</head>
<body>
  <form action="" method="post">
    <label for="email">Email :</label>
    <input type="email" name="email" id="email" required><br>
    <label for="password">Password :</label>
    <input type="password" name="password" id="password" required><br>
    <?php if (isset($_GET['error'])) { echo "<p>Wrong email or password !</p>";}?>
    <input type="submit" value="login">
  </form>
</body>
</html>