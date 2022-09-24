<?php

session_start();
if(empty($_SESSION['login']))
    header("location:login.php");

include"../users/follow.php";
// echo $_SESSION['login']['id'];echo $_GET['id'];die;
unfollow($_SESSION['login']['id'],$_GET['id']);
    ?>
    <script>
        history.back();
    </script>