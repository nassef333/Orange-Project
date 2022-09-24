<?php
function searchByAdress($address){
    $connection = mysqli_connect("localhost","root","","orange");
    $result = mysqli_query($connection, "select * from `restaurant` where `address` = '$address'  ORDER BY `rate`/`cnt` DESC ");
    return mysqli_fetch_all($result);
}

function fitchAllRestaurants(){
    $connection = mysqli_connect("localhost","root","","orange");
    $result = mysqli_query($connection, "select * from `restaurant` ORDER BY `rate`/`cnt` DESC ");
    return mysqli_fetch_all($result);
}

function fitchRestaurant($id){
    $connection = mysqli_connect("localhost","root","","orange");
    $result = mysqli_query($connection, "select * from `restaurant` where `id` = '$id'");
    return mysqli_fetch_all($result);
}

function addRate($id, $newRate){
    $connection = mysqli_connect("localhost","root","","orange");
    $result = mysqli_query($connection, "select * from `restaurant` where `id` = '$id'");
    $accc = mysqli_fetch_assoc($result);
    $cnt = $accc['cnt']+5;  $rate = $accc['rate']+$newRate;
    $result = mysqli_query($connection," UPDATE `restaurant` SET `cnt` = '$cnt', `rate` = '$rate' WHERE `id` = '$id'");
}

function getRating($id){
    $connection = mysqli_connect("localhost","root","","orange");
    $result = mysqli_query($connection, "select * from `restaurant` where `id` = '$id'");
    $accc = mysqli_fetch_assoc($result);
    return ($accc['rate']/$accc['cnt'])*5;
    // return $accc;
}

