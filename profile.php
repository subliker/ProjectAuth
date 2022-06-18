<?php
    session_start();

    if(!isset($_SESSION['activeUser'])){
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
    <div class="pop_up" style="display: none;">
        <div class="dragAndDrop">
            <span class="dragAndDropChild">Перетащите файл сюда</span>
            <span style="display:none;color: red;margin-top:10px;" class="dragAndDropErr">ОШИБКА</span>
        </div>
        <form action="core/addavatar.php" style="display: none;" enctype="multipart/form-data" method="post">
            <input name="0" onchange="uploadClickDAD()" class="dragAndDropBtn" type="file"  name="" id="">
            <button class="dragAndDropSubmit" type="submit"></button>
        </form>
    </div>
    <div class="wrapper">
        <div class="profile">
            <div class="profileRow">
                <?php
                    if($_SESSION['activeUser']['avatar'])
                    {
                        echo "<img class='leftImg' onclick='changePhoto(true)' src='".$_SESSION['activeUser']['avatar']."' alt=''>";
                    }
                    else{ 
                        echo "<a class='leftText' onclick='changePhoto(true)'>Добавить фото</a>";
                    }
                ?>
                <div class="right">
                    <div class="">
                    <div class="">
                            <label>Ваше имя:</label>
                            <span ><?php echo $_SESSION['activeUser']['full_name'];?></span>
                        </div>
                        <div class="">
                            <label>Логин:</label>
                            <span ><?php echo $_SESSION['activeUser']['login'];?></span>
                        </div>
                        <div class="">
                            <label>Ваша почта:</label>
                            <span ><?php echo $_SESSION['activeUser']['email'];?></span>
                        </div>
                        <div class="">
                            <label>Ваша дата рождения:</label>
                            <span ><?php echo $_SESSION['activeUser']['date'];?></span>
                        </div>
                        </div>
                        <a href="core/logout.php">Выйти</a>
                    </div>
            </div>
        </div>
    </div>
    <script src="JS/app.js"></script>
</body>
</html>