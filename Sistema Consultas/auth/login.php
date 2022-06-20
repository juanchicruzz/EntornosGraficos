<?php
require_once("../db/repositories/usersRepository.php");

session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../views/index.php");
    exit;
}

require_once("../db/config.php");

$email = $password = "";
$email_err = $password_err = $login_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["email"]))){
        $email_err = "Por favor ingrese su mail.";
    } elseif(!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)){
        $email_err = "Por favor ingrese un mail valido.";
    }
        else{
        $email = trim($_POST["email"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese su contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        $UserRepository = new UserRepository(); 
        $result = $UserRepository->getUserByEmail($email);
        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password']; 
            echo "PASSWORD = " .$password;   
            echo " - " . $hashed_password;          
            if(password_verify($password, $hashed_password)){
                session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $row["idUsuario"];      
                $_SESSION["email"] = $row["email"];                    
                header("location: ../views/index.php");
            } else{
                $login_err = "Credenciales invalidas. Por favor intente de nuevo.";
                }
        }
        else{
            $login_err = "Credenciales invalidas. Por favor intente de nuevo.";
        }
        } else{
                echo "Oops! Something went wrong. Please try again later.";
        }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Por favor ingrese sus credenciales para loguearse.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>