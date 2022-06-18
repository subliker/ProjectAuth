<?php
    session_start();

    if(isset($_SESSION['activeUser'])){
        header('Location: index.php');
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
        <form class="form" method="POST" action="core/signup.php">
            <div class="formInputs">
                <div class="left">
                    <label style="<?php if (isset($_SESSION['notUniqueLogin'])){echo ';color:red;';} unset($_SESSION['notUniqueLogin']); ?>" class="loginText">Логин:</label>
                    <input required name="login" type="text" class="loginInput"/>
                    <div class="hl"></div>
                    <label style="<?php if (isset($_SESSION['notSamePassword'])||isset($_SESSION['notRightPassword'])){echo ';color:red;';} ?>" class="passwordText">Пароль:</label>
                    <input required name="password" type="password" class="passwordInput"/>
                    <div class="hl"></div>
                    <label style="<?php if (isset($_SESSION['notSamePassword'])||isset($_SESSION['notRightPassword'])){echo ';color:red;';unset($_SESSION['notSamePassword']);unset($_SESSION['notRightPassword']);} ?>" class="cpasswordText">Подтвердите пароль:</label>
                    <input required name="cpassword" type="password" class="cspasswordInput"/>
                    <div class="hl"></div>
                </div>
                <div class="right">
                    <label style="<?php if (isset($_SESSION['notUniqueEmail'])){echo ';color:red;';} unset($_SESSION['notUniqueEmail']); ?>" class="emailText">E-MAIL:</label>
                    <input required name="email" type="email" class="emailInput"/>
                    <div class="hl"></div>
                    <label class="full_nameText">Ваше имя:</label>
                    <input required name="full_name" type="text" class="full_nameInput"/>
                    <div class="hl"></div>
                    <label class="dateText">Дата рождения:</label>
                    <input required name="dateOfBirth" type="date" class="dateInput"/>
                    <div class="hl"></div>
                </div>
            </div>
            <button type="submit">Регистрироваться</button>
            <p>Уже есть аккаунт? <a href="index.php">войдите</a></p>
            <?php
                if(isset($_SESSION['regErr'])){
                    echo "<p style='color:red;'>".$_SESSION['regErr']."</p>";
                    unset($_SESSION['regErr']);
                }
            ?>
        </form>
    </div>
</body>
</html>