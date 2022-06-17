<?php
    session_start();
    require('connect.php');

    $user_id = $_SESSION['activeUser']['id'];
    $avatar = $_FILES[0];
    $avatarPath = "uploads/".time().$avatar['name'];
    $uploadAvatar = mysqli_query($connect,"UPDATE `users` set `avatar` ='$avatarPath' WHERE id = '$user_id'");
    move_uploaded_file($avatar['tmp_name'],"../".$avatarPath);
    $_SESSION['activeUser']['avatar'] = $avatarPath;
    header('Location: ../index.php');
?>