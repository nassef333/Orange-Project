<?php

session_start();
if(empty($_SESSION['login']))
    header("location:login.php");

include"../users/reels.php";
// echo $_SESSION['login']['id'];echo $_GET['id'];die;
if (isLiked($_GET['id'], $_SESSION['login']['id'], $_SESSION['restId'] || $_POST['restId']))
    unlike($_GET['id'], $_SESSION['login']['id'], $_SESSION['restId'] || $_POST['restId']);
else
    like($_GET['id'], $_SESSION['login']['id'], $_SESSION['restId'] || $_POST['restId']);

?>
<script>    
            window.history.go(-1);
</script>

