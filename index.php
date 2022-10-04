<?php 
require_once "pdo.php";
session_start();
$sql = "SELECT name, email, password FROM users";
$stmt = $pdo->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if (isset($_POST['fname']) && isset($_POST['email']) && isset($_POST['pass']) ){
    if ( strlen($_POST['fname']) < 1 || strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1) {
        $_SESSION['err'] = "Please fill your details!";
        header( 'Location: index.php' ) ;
        return;
    }
    else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $_SESSION['err'] = "Invalid email format";
            header( 'Location: index.php' ) ;
            return;
        }
        else {
          if ((isset($_POST['fname']) !== $row['name']) && (isset($_POST['email']) !== $row['email']) && (isset($_POST['pass']) !== $row['password'])){
            $_SESSION['err'] = "Invalid Details!";
            header( 'Location: index.php' ) ;
            return;
          }
        }
    }
}
?>

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
          <?php 
            if ( isset($_SESSION['err'])) {
              echo('<p style="color: red;">'.htmlentities($_SESSION['err'])."</p><br>\n");
              unset($_SESSION['err']);
              } ?>
            <label class="form-label" for="name">Full Name</label>
            <input
              class="form-input"
              name="fname"
              type="text"
              placeholder="Your name"
            />
          </div>
          <div class="subpart-form">
            <label class="form-label" for="email">Email ID</label>
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