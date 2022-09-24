<?php

session_start();
if(empty($_SESSION['login']))
    header("location:login.php");

include"../users/reels.php";
// echo $_SESSION['login']['id'];echo $_GET['id'];die;
// comment();

if(isset($_POST['commment']))
    comment($_GET['id'], $_SESSION['login']['id'], $_SESSION['restId'], $_POST['commment']);

?>
<script>    
    window.history.go(-1);
</script>

