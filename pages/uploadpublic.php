
<?php
session_start();

if(empty($_SESSION['login']))
    header('Location:login.php');

include"../users/reels.php";
include"../users/restaurants.php";


// echo"<pre>";
// $rests = fitchAllRestaurants();
//     var_dump($rests);die;

if(isset($_POST['description'])):

    $fileTemp = $_FILES['img']['tmp_name'];
    $img = $_FILES['img']['name'];
    move_uploaded_file($fileTemp, "../assets/img/".$img);
    
    encrypt_file($img);







    $description = $_POST['description'];

        // echo "<pre>";
        // var_dump($_POST['address']);die;

        // var_dump($_POST['address']);die;

        $RESSSId = fitchRestaurant($_POST['address']);

        // echo $RESSSId[0][0]."<br>".$RESSSId[0][5];

        // echo "<pre>";
        // var_dump($RESSSId);die;

    AddReel($_SESSION['login']['id'], $RESSSId[0][0], $img, $description, $RESSSId[0][5]);
    header("Location:reels.php");
    ?>


    <?php endif; ?>
    



<!DOCTYPE html>
<html lang="en">

<head>
    <title>NIGO.ME</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Webestica.com">
    <meta name="description" content="Bootstrap 5 based Social Media Network and Community Theme">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/img/favicon.ico">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/OverlayScrollbars-master/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/tiny-slider/dist/tiny-slider.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/choices.js/public/assets/styles/choices.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/vendor/glightbox-master/dist/css/glightbox.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/dropzone/dist/dropzone.css" />
    <link rel="stylesheet" type="text/css" href="../assets/vendor/flatpickr/dist/flatpickr.css" />
    <link rel="stylesheet" type="text/css" href="../assets/vendor/plyr/plyr.css" />

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="../assets/css/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GMKQ4P9YMZ"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-GMKQ4P9YMZ');
    </script>

</head>

<body>
    <h3 class="text-white text-center p-4" style="background-image: url('../assets/img/back.webp');background-repeat:no-repeat; background-size:cover;">Upload Reels</h3>
    <div class="container"><br><br><br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="">Type Reel description</label>
            <div>
            <input class="form form-control" type="text" placeholder="Type something..." name="description" required><br>
           
<select class="custom-select w-100 p-2" style="margin-bottom: 20px;" name="address">



  <?php 
  $rests = fitchAllRestaurants();

//     echo"<pre>";
//     var_dump($rests);die;

    foreach($rests as $rest):

    // echo"<pre>";
    // var_dump($rest);die;
    ?>
  <option value="<?=$rest[0]?>"><?=$rest[2]?></option>

<?php endforeach; ?>

</select>
            </div>
            <input type="file" class="custom-file-input btn btn-warning" id="validatedCustomFile" name="img" required>

            <button type="submit" class="btn btn-primary">Share</button>
        </form>
        </div>

</body>
</html> 


