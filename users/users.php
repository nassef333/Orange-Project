<?php

function validatePass($password) {
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
    return false;
else
    return true;
}

function createuser($username, $email, $password, $img, $about) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && validatePass($password)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $connection = mysqli_connect("localhost","root","","orange");
        mysqli_query($connection, "Insert into users (`username`, `email`, `password`, `img`, `about`) Values ('$username', '$email', '$password', '$img', '$about')");
        return mysqli_affected_rows($connection);
    }else{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        echo "<p class='text-danger'>Error: Invalid Email provided.</p>";
    if (!validatePass($password))
    echo '<p class="text-danger">Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</p>';
        return false;
    }
}


// this function is for login
function login($email, $password) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && validatePass($password)) {
    $connection = mysqli_connect("localhost","root","","orange");
    $result = mysqli_query($connection, "SELECT * FROM `users` WHERE `email` = '$email'");
    
echo"<pre>";
    return( mysqli_fetch_assoc($result));

    }else{
        echo'<p>Please Try Again</p>';
    }
}


//this function fitch user by id
function searchUserID($id){
    $connection = mysqli_connect("localhost","root","","orange");
    $result = mysqli_query($connection, "select * from `users` where `id` = '$id'");
    return mysqli_fetch_assoc($result);
}


function getallUsers(){
    $connection = mysqli_connect("localhost","root","","orange");
    $result = mysqli_query($connection, "select * from `users` ");
    return mysqli_fetch_all($result);
}


