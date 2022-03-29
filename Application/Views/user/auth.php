<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <link rel="stylesheet" type="text/css" href="Public/stylesheets/auth.css">
</head>

<body>
  <?php
      if(isset($_POST['register'])){
        $user = new UserController;
        $user->register($_POST['username'],$_POST['password']);
      }
      if(isset($_POST['login'])){
        $user = new UserController;
        $user->login($_POST['username'],$_POST['password']);
      }
  ?>

    <div class="login-container">
      <form id = "login-form" action="" method="post">
          <h1>Login</h1>
          <p>Username</p><br>
          <input class="input" type="text" name="username" placeholder="Enter username"><br>
          <p>Password</p><br>
          <input class="input" type="password" name="password" placeholder = "Enter password"><br>
          <input id="submit-button" type="submit" name="register" value="login">
          <!-- <input id="submit-button" type="submit" name="register" value="register"> -->
      </form>
    </div>

</body>
</html>