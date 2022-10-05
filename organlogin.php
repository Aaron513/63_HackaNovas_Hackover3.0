<?php 
require_once "pdo.php";
session_start();
$sql = "SELECT name, email, password FROM users";
$stmt = $pdo->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if (isset($_POST['email']) && isset($_POST['pass']) ){
    if (strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1) {
        $_SESSION['err'] = "Please fill your details!";
        header( 'Location: oragnlogin.php' ) ;
        return;
    }
    else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $_SESSION['err'] = "Invalid email format";
            header( 'Location: oragnlogin.php' ) ;
            return;
        }
        else {
        //   if ((isset($_POST['email']) !== $row['email']) && (isset($_POST['pass']) !== $row['password'])){
        //     $_SESSION['err'] = "Invalid Details!";
        //     header( 'Location: oragnlogin.php' ) ;
        //     return;
        //   }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>Organizer login</title>
</head>
<body>
    <div class="container">
    <div class="border border-light p-3 mb-4">
        <div class="wrapper">
            <form id="form" method="post">
            <?php 
            if ( isset($_SESSION['err'])) {
              echo('<p style="color: red;">'.htmlentities($_SESSION['err'])."</p><br>\n");
              unset($_SESSION['err']);
              } ?>
                <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name='email'>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name='pass'>
                </div>
                <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Keep me signed in</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
    </div>
    </div>
</body>
</html>