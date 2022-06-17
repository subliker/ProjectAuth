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
        <form class="form">
            <label class="loginText">Логин:</label>
            <input type="text" class="loginInput"/>
            <div class="hl"></div>
            <label class="passwordText">Пароль:</label>
            <input type="password" class="passwordInput"/>
            <div class="hl"></div>
            <button type="submit">Войти</button>
            <p>Нет аккаунта? <a href="register.php">создайте</a></p>
        </form>
    </div>
</body>
</html>