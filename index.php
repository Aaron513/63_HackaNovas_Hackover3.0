<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="style.css" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&family=Rubik:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <title>Event Planner</title>
    <?php require 'signup.php' ?>
  </head>
  <body>
    <div class="container">
      <div class="login-img">
        <img src="backg.png" class="image" />
        <div class="img-text">
          Welcome back user! <br />Please enter your login <br />details
        </div>
      </div>
      <div class="login-form">
        <form method="post">
          <div class="subpart-form">
            <label class="form-label" for="name">Full Name</label>
            <?php 
            if ( isset($_SESSION['namerr'])) {
              echo('<p style="color: red;">'.htmlentities($_SESSION['namerr'])."</p>\n");
              unset($_SESSION['namerr']);
              } ?>
            <input
              class="form-input"
              name="fname"
              type="text"
              placeholder="Your name"
            />
          </div>
          <div class="subpart-form">
            <label class="form-label" for="email">Email ID</label>
            <?php 
            if ( isset($_SESSION['namerr'])) {
              echo('<p style="color: red;">'.htmlentities($_SESSION['namerr'])."</p>\n");
              unset($_SESSION['namerr']);
              } ?>
            <input
              class="form-input"
              name="email"
              type="email"
              placeholder="Email-ID"
            />
          </div>
          <div class="subpart-form">
            <label class="form-label" for="name">Password</label>
            <input
              class="form-input"
              name="pass"
              type="password"
              placeholder="Password"
            />
          </div>
          <input type="submit" value="Sign in" class="button-form">
        </form>
      </div>
    </div>
  </body>
</html>
