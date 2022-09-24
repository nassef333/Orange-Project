<?php

session_start();

include"../users/users.php";


session_destroy();
header("location:login.php");