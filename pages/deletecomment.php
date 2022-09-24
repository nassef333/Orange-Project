<?php

session_start();
if(empty($_SESSION['login']))
    header("location:login.php");

include"../users/reels.php";
// echo $_SESSION['login']['id'];echo $_GET['id'];die;
deleteComment($_GET['id']);
?>
<script>    
    window.history.go(-1);
</script>

