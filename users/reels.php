<?php

function AddReel($user_id, $restaurant_id, $video, $description, $address){
    $connection = mysqli_connect("localhost","root","","orange");
    mysqli_query($connection, "INSERT INTO reels (`user_id`, `restaurant_id`, `video`, `description`, `address`) VALUES ('$user_id', '$restaurant_id', '$video', '$description', '$address')");
    return mysqli_affected_rows($connection);
}

function RemoveReel($id){
    $connection = mysqli_connect("localhost","root","","orange");
    $result = mysqli_query($connection, "DELETE FROM `reels` WHERE `id` = '$id'");
}

function isLiked($reel_id, $user_id){
    $connection = mysqli_connect("localhost","root","","orange");
    // $result = 0;
    $res = mysqli_query($connection, "SELECT COUNT(`id`) FROM `likes` WHERE `reel_id` = '$reel_id' AND `user_id` = '$user_id'" );
    return mysqli_fetch_all($res)[0][0];
}

function like($reel_id, $user_id, $restaurant_id){
    $connection = mysqli_connect("localhost","root","","orange");
    mysqli_query($connection, "INSERT INTO `likes` (`reel_id`, `user_id`, `restaurant_id`) VALUES ('$reel_id', '$user_id', '$restaurant_id')");
}

function unlike($reel_id, $user_id, $restaurant_id){
    $connection = mysqli_connect("localhost","root","","orange");
    $result = mysqli_query($connection, "DELETE FROM `likes` WHERE `reel_id` = '$reel_id' AND `user_id` = '$user_id' AND `restaurant_id` = '$restaurant_id'" );
}

function comment($reel_id, $user_id, $restaurant_id, $comment){
    $connection = mysqli_connect("localhost","root","","orange");
    mysqli_query($connection, "INSERT INTO `comments` (`reel_id`, `user_id`, `restaurant_id`, `comment`) VALUES ('$reel_id', '$user_id', '$restaurant_id', '$comment')");
}

function deleteComment($id){
    $connection = mysqli_connect("localhost","root","","orange");
    mysqli_query($connection, "DELETE FROM `comments` WHERE `id` = '$id'" );
}

function showAllReels($id){
    $connection = mysqli_connect("localhost","root","","orange");
    $result = mysqli_query($connection, "SELECT * FROM `reels` WHERE `restaurant_id` = '$id' ");
    return mysqli_fetch_all($result);
}

function showAllReelsInDB(){
    $connection = mysqli_connect("localhost","root","","orange");
    $result = mysqli_query($connection, "SELECT * FROM `reels` ORDER BY RAND()");
    return mysqli_fetch_all($result);
}

function filterByAddress($address){
    $connection = mysqli_connect("localhost","root","","orange");
    $result = mysqli_query($connection, "select * from `reels` where `address` = '$address'");
    return mysqli_fetch_all($result);
}

function showLikesCount($id){
    $connection = mysqli_connect("localhost","root","","orange");
    $result = mysqli_query($connection, "SELECT COUNT(`id`) FROM `likes` WHERE `reel_id` = '$id'");
    return mysqli_fetch_all($result)[0][0];
}

function showCommentsCount($id){
    $connection = mysqli_connect("localhost","root","","orange");
    $result = mysqli_query($connection, "SELECT COUNT(`id`) FROM `comments` WHERE `reel_id` = '$id'");
    return mysqli_fetch_all($result)[0][0];
}

function showAllComments($id){
    $connection = mysqli_connect("localhost","root","","orange");
    $result = mysqli_query($connection, "SELECT * FROM `comments` WHERE `reel_id` = '$id' ");
    return mysqli_fetch_all($result);
}

function showUserReelsCount($id){
    $connection = mysqli_connect("localhost","root","","orange");
    $result = mysqli_query($connection, "SELECT COUNT(`id`) FROM `reels` WHERE `user_id` = '$id'");
    return mysqli_fetch_all($result)[0][0];
}


function encrypt_file($filename) {

    $fileText = file_get_contents("../assets/img/".$filename, true);

    // echo $fileText;die;

    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryption_key = "nassef";
    $encryption = openssl_encrypt($fileText, $ciphering, $encryption_key, $options, $encryption_iv);
    
    // echo $encryption;die;

    file_put_contents("../assets/img/".$filename, $encryption);
}


function decrypt_file($filename) {

    $fileText = file_get_contents("../assets/img/".$filename, true);
    // echo $fileText."<br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
    // echo $fileText;die;

    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryption_key = "nassef";
    $decryption = openssl_decrypt($fileText, $ciphering, $encryption_key, $options, $encryption_iv);
    
    // echo $decryption;die;

    // file_put_contents("../assets/img/".$filename, $encryption);
}