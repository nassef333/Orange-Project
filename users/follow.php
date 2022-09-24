<?php
include "users.php";

function follow($follower_id, $followed_id){
    $connection = mysqli_connect("localhost","root","","orange");
    $result = mysqli_query($connection, "INSERT INTO `followers` (`following_id`, `followed_id`, `state`) VALUES ('$follower_id', '$followed_id', '1')");
}

function unfollow($follower_id, $followed_id){
$connection = mysqli_connect("localhost","root","","orange");
$result = mysqli_query($connection, "DELETE FROM `followers` WHERE `following_id` = '$follower_id' AND `followed_id` = '$followed_id'" );
}

function showFollowersCount($id){
    $connection = mysqli_connect("localhost","root","","orange");
    $result = mysqli_query($connection, "SELECT COUNT(`id`) FROM `followers` WHERE `followed_id` = '$id'");
    return mysqli_fetch_all($result)[0][0];
}

function showFollowingCount($id){
    $connection = mysqli_connect("localhost","root","","orange");
    $result = mysqli_query($connection, "SELECT COUNT(`id`) FROM `followers` WHERE `following_id` = '$id'");
    return mysqli_fetch_all($result)[0][0];
}

function isFollowed($follower_id, $followed_id){
    $connection = mysqli_connect("localhost","root","","orange");
    $result = mysqli_query($connection, "SELECT * from `followers` WHERE `following_id` = '$follower_id' AND `followed_id` = '$followed_id'");
    return mysqli_fetch_all($result);
}

