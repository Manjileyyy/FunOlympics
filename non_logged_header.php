<?php include "functions.php" ?>
<?php
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = $_POST['remember'];
    if(!empty($remember)){
        setcookie('username', $_POST['username'], time()+86400);
        setcookie('password', $_POST['password'], time()+86400);
    }
    else if(empty($remember)){
        setcookie('username', '', time()-86400);
        setcookie('password', '', time()-86400);
    }
    if(!login_user($username, $password)){
        
        header('Location: login.php?error_login');
    }
    login_user($username, $password);
    $_SESSION['logged_in'] = "logged_in";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Homepage</title>
</head>

<body>
   

        <div class="navbar">
        <div class="navbar-container">
            <div class="logo-container">
                <h1 class="logo">Fun Olympics Games 2022</h1>
            </div>
            <img src="images/ol.png" height="50" width="50" alt=""></a>
            <div class="menu-container">
                <ul class="menu-list">
                    <li class="menu-list-item active"><a href='./index.php'>Home</a></li>
                    <li class="menu-list-item"><a href='./game.php'>Games</a></li>
                    <li class="menu-list-item"><a href='./gallery1.php'>Gallery</a></li>

                </ul>
            </div>
            <div class="profile-container">
                <a href="register.php">
                    <button class="btn">Signup</button>
                </a>
                &nbsp;
                <a href="login.php">
                    <button class="btn">Login</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
    <div class="container-fluid">
<style>
    .logo{
    padding: 20px 10px;
}
.mr-auto .nav-item{
    margin:0 8px !important;
}

.navbar{
    background: #606b64;
    width:100%;
    font-size: 15px;
    font-weight: bold;
    height: max-content;
}

.nav-link{
    color:aliceblue !important;
}
.btn-submit{
    color:white;
    background-color: #606b64;
}
.btn-submit:hover{
    color:#606b64;
    background-color: white;
}
.section-heading{
    color:#606b64;
    font-weight: bold;
    font-size: 20px;
    border-bottom-style:solid; border-color:#606b64;
    padding-top: 20px;
    margin:0 !important;
}

.navbar-nav{
    align-items:center !important;
}
</style>
