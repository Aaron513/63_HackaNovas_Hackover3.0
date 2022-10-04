<?php 
session_start();
if (isset($_POST['fname']) && isset($_POST['email']) && isset($_POST['pass']) ){
    if ( strlen($_POST['fname']) < 1) {
        $_SESSION['namerr'] = "Name is required";
    }
    else if ( strlen($_POST['email']) < 1) {
        $_SESSION['emailerr'] = "E-mail is required";
    }
    else if (strlen($_POST['pass']) < 1){
        $_SESSION['passerr'] = "Password is required";
    }
    else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $_SESSION['emailerr'] = "Invalid email format";
        }
        else {
            if ( $check == $stored_hash ) {
                $_SESSION['name'] = $_POST['email'];
                $_SESSION['succ'] = "Logged in.";
              } else {
                $_SESSION["error"] = "Incorrect password.";
              }
        }

    }
}
?>