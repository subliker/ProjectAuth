<?php
    session_start();

    if(isset($_SESSION['activeUser'])){
        header('Location: profile.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GrapeFruitWebSite</title>

    <!--STYLES-->
    <link rel="stylesheet" href="style/style.css">

    <!--FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

</head>
<body>
    <div class="wrapper">
        <form class="form" action="core/signin.php" method="POST">
            <label style="<?php if (isset($_SESSION['authErr'])){echo ';color:red;';} ?>" class="loginText">Логин:</label>
            <input style="<?php if (isset($_SESSION['authErr'])){echo ';color:red;';} ?>" name="login" type="text" class="loginInput"/>
            <div class="hl"></div>
            <label style="<?php if (isset($_SESSION['authErr'])){echo ';color:red;';} ?>" class="passwordText">Пароль:</label>
            <input style="<?php if (isset($_SESSION['authErr'])){echo ';color:red;';unset($_SESSION['authErr']);} ?>" name="password" type="password" class="passwordInput"/>
            <div class="hl"></div>
            <button type="submit">Войти</button>
            <p>Нет аккаунта? <a href="register.php">создайте</a></p>
        </form>
    </div>
</body>
</html>