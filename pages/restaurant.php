<?php
session_start();
if(empty($_SESSION['login']))
    header('Location:login.php');

    if (!file_exists("../users/users.php")) include "controller3.php";

    include "../users/follow.php";
    include "../users/restaurants.php";
    include "../users/reels.php";
    include "file-encryptor.php";
    include "file-decryptor.php";
// echo "<pre>";
// var_dump($_SESSION['login']);
// die;

// addRate(1, 4);die;


$userId = $_SESSION['login']['id'];
$userName = $_SESSION['login']['username'];
$userImg = $_SESSION['login']['img'];
$userAbout = $_SESSION['login']['about'];
$followers = showFollowersCount($userId);
$following = showFollowingCount($userId);
$posts = showUserReelsCount($userId);

// echo $userImg;die;












?>
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

    <!-- =======================
Header START -->
    <header class="navbar-light fixed-top header-static bg-mode">

        <!-- Logo Nav START -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo START -->
                <a class="navbar-brand" href="index.html">
				<img class="light-mode-item navbar-brand-item" src="../assets/img/logo.svg" alt="logo">
				<img class="dark-mode-item navbar-brand-item" src="../assets/img/logo.svg" alt="logo">
			</a>
                <!-- Logo END -->

                <!-- Responsive navbar toggler -->
                <button class="navbar-toggler ms-auto icon-md btn btn-light p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-animation">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </button>

                <!-- Main navbar START -->
                <div class="collapse navbar-collapse" id="navbarCollapse">

                    <!-- Nav Search START -->
                    <div class="nav mt-3 mt-lg-0 flex-nowrap align-items-center px-4 px-lg-0">
                        <div class="nav-item w-100">
                            <form class="rounded position-relative" method="POST">
                                <input class="form-control ps-5 bg-light" type="search" placeholder="Search..." aria-label="Search" name="search">
                                <button class="btn bg-transparent px-2 py-0 position-absolute top-50 start-0 translate-middle-y" type="submit"><i class="bi bi-search fs-5"> </i></button>
                            </form>
                        </div>
                    </div>
                    <!-- Nav Search END -->


                </div>
                <!-- Main navbar END -->

                <!-- Nav right START -->
                <ul class="nav flex-nowrap align-items-center ms-sm-3 list-unstyled">
                    

                    

                    <li class="nav-item ms-2 dropdown">
                        <a class="nav-link btn icon-md p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
						<img class="avatar-img rounded-2" src="../assets/img/<?=$userImg?>" alt="">
					</a>
                        <ul class="dropdown-menu dropdown-animation dropdown-menu-end pt-3 small me-md-n3" aria-labelledby="profileDropdown">
                            <!-- Profile info -->
                            <li class="px-3">
                                <div class="d-flex align-items-center position-relative">
                                    <!-- Avatar -->
                                    <div class="avatar me-3">
                                        <img class="avatar-img rounded-circle" src="../assets/img/<?=$userImg?>" alt="avatar">
                                    </div>
                                    <div>
                                        <a class="h6 stretched-link" href="#"><?=$userName?></a>
                                        <p class="small m-0"><?=$userAbout?></p>
                                    </div>
                                </div>
                            </li>
                            <!-- Links -->


                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item bg-danger-soft-hover" href="../pages/logout.php"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <!-- Dark mode switch START -->
                            <li>
                                <div class="modeswitch-wrap" id="">
                                    <div class="modeswitch-item">
                                        <div class="modeswitch-icon"></div>
                                    </div>
                                    <span>Dark mode</span>
                                </div>
                            </li>
                            <!-- Dark mode switch END -->
                        </ul>
                    </li>
                    
                    <li>
                        <a href="../index.php" class="btn btn-primary">Hmoe</a>
                    </li>

                </ul>
                <!-- Nav right END -->
            </div>
        </nav>
        <!-- Logo Nav END -->
    </header>
    <!-- =======================
Header END -->

    <!-- **************** MAIN CONTENT START **************** -->
    <main>

        <!-- Container START -->
        <div class="container">
            <div class="row g-4">

                <!-- Sidenav START -->
                <div class="col-lg-3">

                    <!-- Advanced filter responsive toggler START -->
                    <div class="d-flex align-items-center d-lg-none">
                        <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
            <i class="btn btn-primary fw-bold fa-solid fa-sliders-h"></i>
            <span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
          </button>
                    </div>
                    <!-- Advanced filter responsive toggler END -->

                    <!-- Navbar START-->
                    <nav class="navbar navbar-expand-lg mx-0">
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSideNavbar">
                            <!-- Offcanvas header -->
                            <div class="offcanvas-header">
                                <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>

                            <!-- Offcanvas body -->
                            <div class="offcanvas-body d-block px-2 px-lg-0">
                                <!-- Card START -->
                                <div class="card overflow-hidden">
                                    <!-- Cover image -->
                                    <div class="h-50px" style="background: white; background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                                    <!-- Card body START -->
                                    <div class="card-body pt-0">
                                        <div class="text-center">
                                            <!-- Avatar -->
                                            <div class="avatar avatar-lg mt-n5 mb-3">
                                                <a href="#!"><img class="avatar-img rounded border border-white border-3" src="../assets/img/<?=$userImg?>" alt=""></a>
                                            </div>
                                            <!-- Info -->
                                            <h5 class="mb-0"> <a href="#!"> <?=$userName?></a> </h5>
                                            <small><?=$userAbout?></small>
                                                <br><br>
                                            <!-- User stat START -->
                                            <div class="hstack gap-2 gap-xl-3 justify-content-center">
                                                <!-- User stat item -->
                                                <div>
                                                    <h6 class="mb-0"><?=$posts?></h6>
                                                    <small>Post</small>
                                                </div>
                                                <!-- Divider -->
                                                <div class="vr"></div>
                                                <!-- User stat item -->
                                                <div>
                                                    <h6 class="mb-0"><?=$followers?></h6>
                                                    <small>Followers</small>
                                                </div>
                                                <!-- Divider -->
                                                <div class="vr"></div>
                                                <!-- User stat item -->
                                                <div>
                                                    <h6 class="mb-0"><?=$following?></h6>
                                                    <small>Following</small>
                                                </div>
                                            </div>
                                            <!-- User stat END -->
                                        </div>

                                        <!-- Divider -->
                                        <hr>

                                        <!-- Side Nav START -->
                                        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#"> <img class="me-2 h-20px fa-fw" src="../assets/img/icon/home-outline-filled.svg" alt=""><span>Feed </span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#"> <img class="me-2 h-20px fa-fw" src="../assets/img/icon/person-outline-filled.svg" alt=""><span>Connections </span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#"> <img class="me-2 h-20px fa-fw" src="../assets/img/icon/earth-outline-filled.svg" alt=""><span>Latest News </span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#"> <img class="me-2 h-20px fa-fw" src="../assets/img/icon/calendar-outline-filled.svg" alt=""><span>Events </span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#"> <img class="me-2 h-20px fa-fw" src="../assets/img/icon/chat-outline-filled.svg" alt=""><span>Groups </span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#"> <img class="me-2 h-20px fa-fw" src="../assets/img/icon/notification-outlined-filled.svg" alt=""><span>Notifications </span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#"> <img class="me-2 h-20px fa-fw" src="../assets/img/icon/cog-outline-filled.svg" alt=""><span>Settings </span></a>
                                            </li>
                                        </ul>
                                        <!-- Side Nav END -->
                                    </div>
                                    <!-- Card body END -->
                                    <!-- Card footer -->

                                </div>
                                <!-- Card END -->

                                <!-- Helper link START -->
                                <ul class="nav small mt-4 justify-content-center lh-1">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" target="_blank" href="#">Support </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" target="_blank" href="#">Docs </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Help</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Privacy & terms</a>
                                    </li>
                                </ul>
                                <!-- Helper link END -->
                                <!-- Copyright -->
                                <p class="small text-center mt-1">©2022 <a class="text-body" target="" href=""> all copyrights reseved </a></p>
                            </div>
                        </div>
                    </nav>
                    <!-- Navbar END-->
                </div>
                <!-- Sidenav END -->

                <!-- Main content START -->
                <div class="col-md-8 col-lg-6 vstack gap-4">
                    <!-- Share feed START -->
                    <a href="upload.php?id=<?=$_GET['id']?>" class="card card-body" style="background-image: url('../assets/img/back.webp');">
                        
                    <h4 class="text-white">Click here to Upload Reels</h4>
                    </a>
                    <!-- Share feed END -->

                    <!-- Header of Posts -->

                    <div class="col-md-8 col-lg-6 vstack gap-4">
                        <h4>Rate Us</h4>
                        <form method="POST" class="d-flex">
                            <input class="form-control" type="text" name="rating" placeholder="Enter Rate From 1 to 5">
                            <input class="btn btn-primary" type="submit" value="Send">
                        </form>
                    </div>



                    <?php
                    if(isset($_POST['rating'])){
                        addRate($_GET['id'], $_POST['rating']);
                    }

                    ?>



















                    


















                    <?php


                        // echo "<pre>";
                        // var_dump($restaurants);die;

                            $restaurant = fitchRestaurant($_GET['id'])[0];

                            // echo "<pre>";
                            // var_dump($restaurant);die;

                            $rate = getRating($_GET['id']);
                    ?>

                        <div class="card mb-3">
                      <img src="../assets/img/<?=$restaurant[4]?>" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><?=$restaurant[2]?></h5>
                        <h6 class="text-danger"><?=$restaurant[1]?></h6>
                        
                        <b><span class="text-danger"><?=substr($rate, 0, 3);?><i class="bi bi-star-fill text-warning" style="font-size: 20px;"></i></span></b>
                        <p class="text-success"><?=$restaurant[5]?></p>

                        <p class="card-text text-dark"><?=$restaurant[3]?></p>
                      </div>
                    </div>









                    <?php


                    // echo "<pre>";
                    // var_dump($restaurants);die;

                        $reels = showAllReels($_GET['id']);

                        // echo "<pre>";
                        // var_dump($reels);die;

                        $cnt = 0;
                        foreach($reels as $reel):
                            $user = searchUserID($reel[1]);
                            $likesCnt = showLikesCount($reel[0]);
                            $commentsCnt = showCommentsCount($reel[0]);
                            $comments = showAllComments($reel[0]);
                            $_SESSION['restId']= $_GET['id'];
                    ?>

                    <div class="card">
                        <!-- Card header START -->
                        <div class="card-header border-0 pb-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-story me-2">
                                        <a href="#!"> <img class="avatar-img rounded-circle" src="../assets/img/<?=$user['img']?>" alt=""> </a>
                                    </div>
                                    <!-- Info -->
                                    <div>
                                        <div class="nav nav-divider">
                                            <h6 class="nav-item card-title mb-0"> <a href="#!"><?=$user['username']?></a></h6>
                                            <span class="nav-item small"></span>
                                        </div>
                                        <p class="mb-0 small"><?=$reel[5]?></p>
                                    </div>
                                </div>
                                <!-- Card feed action dropdown START -->
                                <div class="dropdown">
                                    <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardFeedAction2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php if($_SESSION['login']['id'] == $user['id']):?>
                                        <a href="deletereel.php?id=<?=$reel[0]?>" class="btn btn-outline-danger btn-sm">Delete</a>
                                        <?php endif;?>
                </a>
                                    <!-- Card feed action dropdown menu -->
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction2">
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-x-circle fa-fw pe-2"></i>Hide post</a></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>
                                    </ul>
                                </div>
                                <!-- Card feed action dropdown END -->
                            </div>
                        </div>
                        <!-- Card header END -->


                        <!-- Card body START -->
                        <div class="card-body pb-0">
                            <p><b><?=$reel[4]?></b></p>
                        </div>

                        <!-- Card img -->
                        <div class="overflow-hidden fullscreen-video w-100">

                            <!-- HTML video START -->

                            <?php
                                decryptFile("../assets/img/".$reel[3]);
                            ?>
                            <video class="w-100" autoplay loop muted>
                                <source src="../assets/img/<?=$reel[3]?>" type="video/mp4" />
                            </video>

                            <?php
                                encryptFile("../assets/img/".$reel[3]);
                            ?>
                            <!-- HTML video END -->

                            <!-- Plyr resources and browser polyfills are specified in the pen settings -->
                        </div>


                        <!-- Feed react START -->
                        <div class="card-body pt-0">
                            <ul class="nav nav-stack py-3 small">
                                <li class="nav-item">

                                    <a class="nav-link <?php if(isLiked($reel[0], $_SESSION['login']['id'], $_GET['id']))echo 'active'; ?>" href="like.php?id=<?=$reel[0]?>"> <i class="bi bi-hand-thumbs-up-fill pe-1"></i>Likes (<?=$likesCnt?>)</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comments (<?=$commentsCnt?>)</a>
                                </li>
                                <!-- Card share action START -->
                                <li class="nav-item dropdown ms-sm-auto">

                            </ul>
                            <!-- Feed react END -->

                            <!-- Add comment -->
                            <div class="d-flex mb-3">
                                <!-- Avatar -->
                                <div class="avatar avatar-xs me-2">
                                    <a href="#!"> <img class="avatar-img rounded-circle" src="../assets/img/<?=$_SESSION['login']['img']?>" alt=""> </a>
                                </div>
                                <!-- Comment box  -->
                                <!-- Comment box  -->
                                <form class="position-relative w-100" method="POST" style="display: flex;" action="comment.php?id=<?=$reel[0]?>">
                                    <input data-autoresize="" class="form-control pe-4 bg-light" rows="1" placeholder="Add a comment..." name="commment"></input>
                                    <button type="submit" class="btn btn-primary">Comment</button>
                                    <!-- Emoji button -->

                                </form>
                            </div>
                            <!-- Comment wrap START -->


                                <!-- sending comment to db -->


<!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->















                            
                            <ul class="comment-wrap list-unstyled mb-0">
                                <!-- Comment item START -->




                                <?php
                                // echo "<pre>";

                                // var_dump(showAllComments($reel[0]));die;
                                $comments = showAllComments($reel[0]);
                                foreach ($comments as $comment):

                                   $curr_user = searchUserID($comment[2]);
                                ?>
                                <li class="comment-item">
                                    <div class="d-flex">
                                        <!-- Avatar -->
                                        <div class="avatar avatar-xs">
                                            <a href="#!"><img class="avatar-img rounded-circle" src="../assets/img/<?=$curr_user['img']?>" alt=""></a>
                                        </div>
                                        <div class="ms-2 d-flex">
                                            <!-- Comment by -->
                                            <div class="bg-light rounded-start-top-0 p-3 rounded">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-1"> <a href="#!"> <?=$curr_user['username']?> </a></h6>
                                                    <small class="ms-2"> <?=$comment[5]?> </small>
                                                    <?php if($_SESSION['login']['id'] == $curr_user['id']):?>
                                                        <a href="deletecomment.php?id=<?=$comment[0]?>" class="" style="margin-left: 10px;">delete</a>
                                                    <?php endif;?>

                                                </div>
                                                <p class="small mb-0"><?=$comment[4]?></p>
                                            </div>

                                            

                                        </div>
                                    </div>
                                    <!-- Comment item nested START -->
                                    <ul class="comment-item-nested list-unstyled">

                                    </ul>
                                    <!-- Comment item nested END -->
                                </li><br>




                                <?php endforeach; ?>




                                <!-- Comment item END -->
                            </ul>
                            <!-- Comment wrap END -->
                        </div>
                        <!-- Card body END -->

                        <!-- Card footer START -->
                        <div class="card-footer border-0 pt-0">

                        </div>
                        <!-- Card footer END -->
                    </div>
                            <?php endforeach; ?>




































































                    

                    <!-- Load more button START -->
                    <a href="#!" role="button" class="btn btn-loader btn-primary-soft" data-bs-toggle="button" aria-pressed="true">
            <span class="load-text"> Load more </span>
            <div class="load-icon">
              <div class="spinner-grow spinner-grow-sm" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>
          </a>
                    <!-- Load more button END -->

                </div>
                <!-- Main content END -->





































                
                <!-- Right sidebar START -->
                <div class="col-lg-3">
                    <div class="row g-4 scrollbarrr" style="max-height: 800px;overflow-y: auto;">
                        <style>
                            .scrollbarrr::-webkit-scrollbar{
                                width: 5px;
                            }
                        </style>
                        <!-- Card follow START -->
                        <div class="col-sm-6 col-lg-12">
                            <div class="card">
                                <!-- Card header START -->
                                <div class="card-header pb-0 border-0">
                                    <h5 class="card-title mb-0">Who to follow</h5>
                                </div>
                                <!-- Card header END -->

                                <!-- Card body START -->
                                <div class="card-body">



                                    <!-- Connection item START -->
                                    <?php 
                                    $allUsers = getallUsers();
                                    foreach($allUsers as $user): 
                                    // echo "<pre>";
                                    // var_dump($user);die;
                                    ?>
                                    <div class="hstack gap-2 mb-3">
                                        <!-- Avatar -->
                                        <div class="avatar">
                                            <a href="#!"><img class="avatar-img rounded-circle" src="../assets/img/<?=$user[4]?>" alt=""></a>
                                        </div>
                                        <!-- Title -->
                                        <div class="overflow-hidden">
                                            <a class="h6 mb-0" href="#!"><?=$user[1]?></a>
                                            <p class="mb-0 small text-truncate"><?=$user[6]?></p>
                                        </div>
                                        <!-- Button -->
                                        <?php if(isFollowed($userId,$user[0])):?>
                                            <a class="btn btn-primary-soft rounded-circle icon-md ms-auto bg-primary" href="../pages/unfollow.php?id=<?=$user[0]?>"><i class="bi bi-person text-white" style="font-size: 20px;"></i></a>
                                        <?php else:?>
                                            <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="../pages/pressFollow.php?id=<?=$user[0]?>"><i class="fa-solid fa-plus"> </i></a>
                                        <?php endif;?>
                                    </div>
                                    <?php endforeach; ?>
                                    <!-- Connection item END -->


                                    






                                </div>
                                <!-- Card body END -->
                            </div>
                        </div>
                        <!-- Card follow START -->


                    </div>
                </div>
                <!-- Right sidebar END -->

            </div>
            <!-- Row END -->
        </div>
        <!-- Container END -->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->



    <!-- Modal create Feed START -->
    <div class="modal fade" id="modalCreateFeed" tabindex="-1" aria-labelledby="modalLabelCreateFeed" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal feed header START -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelCreateFeed">Create post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal feed header END -->

                <!-- Modal feed body START -->
                <div class="modal-body">
                    <!-- Add Feed -->
                    <div class="d-flex mb-3">
                        <!-- Avatar -->
                        <div class="avatar avatar-xs me-2">
                            <img class="avatar-img rounded-circle" src="assets/img/<?=$userImg?>" alt="">
                        </div>
                        <!-- Feed box  -->
                        <form class="w-100">
                            <textarea class="form-control pe-4 fs-3 lh-1 border-0" rows="4" placeholder="Share your thoughts..." autofocus></textarea>
                        </form>
                    </div>
                    <!-- Feed rect START -->
                    <div class="hstack gap-2">
                        <a class="icon-md bg-success bg-opacity-10 text-success rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Photo"> <i class="bi bi-image-fill"></i> </a>
                        <a class="icon-md bg-info bg-opacity-10 text-info rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Video"> <i class="bi bi-camera-reels-fill"></i> </a>
                        <a class="icon-md bg-danger bg-opacity-10 text-danger rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Events"> <i class="bi bi-calendar2-event-fill"></i> </a>
                        <a class="icon-md bg-warning bg-opacity-10 text-warning rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Feeling/Activity"> <i class="bi bi-emoji-smile-fill"></i> </a>
                        <a class="icon-md bg-light text-secondary rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Check in"> <i class="bi bi-geo-alt-fill"></i> </a>
                        <a class="icon-md bg-primary bg-opacity-10 text-primary rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Tag people on top"> <i class="bi bi-tag-fill"></i> </a>
                    </div>
                    <!-- Feed rect END -->
                </div>
                <!-- Modal feed body END -->

                <!-- Modal feed footer -->
                <div class="modal-footer row justify-content-between">
                    <!-- Select -->
                    <div class="col-lg-3">
                        <select class="form-select js-choice choice-select-text-none"  action="{$_SERVER['PHP_SELF']}" data-position="top" data-search-enabled="false">
            <option value="PB">Public</option>
            <option value="PV">Friends</option>
            <option value="PV">Only me</option>
            <option value="PV">Custom</option>
          </select>
                        <!-- Button -->
                    </div>
                    <div class="col-lg-8 text-sm-end">
                        <button type="button" class="btn btn-danger-soft me-2"> <i class="bi bi-camera-video-fill pe-1"></i> Live video</button>
                        <button type="button" class="btn btn-success-soft">Post</button>
                    </div>
                </div>
                <!-- Modal feed footer -->

            </div>
        </div>
    </div>
    <!-- Modal create feed END -->

    <!-- Modal create Feed photo START -->
    <div class="modal fade" id="feedActionPhoto" tabindex="-1" aria-labelledby="feedActionPhotoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal feed header START -->
                <div class="modal-header">
                    <h5 class="modal-title" id="feedActionPhotoLabel">Add post photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal feed header END -->

                <!-- Modal feed body START -->
                <div class="modal-body">
                    <!-- Add Feed -->
                    <div class="d-flex mb-3">
                        <!-- Avatar -->
                        <div class="avatar avatar-xs me-2">
                            <img class="avatar-img rounded-circle" src="assets/img/<?=$userImg?>" alt="">
                        </div>
                        <!-- Feed box  -->
                        <form class="w-100" >
                            <textarea class="form-control pe-4 fs-3 lh-1 border-0" rows="2" placeholder="Share your thoughts..."></textarea>
                        </form>
                    </div>

                    <!-- Dropzone photo START -->
                    <div>
                        <label class="form-label">Upload attachment</label>
                        <div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":2}'>
                            <div class="dz-message">
                                <i class="bi bi-images display-3"></i>
                                <p>Drag here or click to upload photo.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Dropzone photo END -->

                </div>
                <!-- Modal feed body END -->

                <!-- Modal feed footer -->
                <div class="modal-footer ">
                    <!-- Button -->
                    <button type="button" class="btn btn-danger-soft me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success-soft">Post</button>
                </div>
                <!-- Modal feed footer -->
            </div>
        </div>
    </div>
    <!-- Modal create Feed photo END -->

    <!-- Modal create Feed video START -->
    <div class="modal fade" id="feedActionVideo" tabindex="-1" aria-labelledby="feedActionVideoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal feed header START -->
                <div class="modal-header">
                    <h5 class="modal-title" id="feedActionVideoLabel">Add post video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal feed header END -->

                <!-- Modal feed body START -->
                <div class="modal-body">
                    <!-- Add Feed -->
                    <div class="d-flex mb-3">
                        <!-- Avatar -->
                        <div class="avatar avatar-xs me-2">
                            <img class="avatar-img rounded-circle" src="assets/img/<?=$userImg?>" alt="">
                        </div>
                        <!-- Feed box  -->
                        <form class="w-100" >
                            <textarea class="form-control pe-4 fs-3 lh-1 border-0" rows="2" placeholder="Share your thoughts..."></textarea>
                        </form>
                    </div>

                    <!-- Dropzone photo START -->
                    <div>
                        <label class="form-label">Upload attachment</label>
                        <div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":2}'>
                            <div class="dz-message">
                                <i class="bi bi-camera-reels display-3"></i>
                                <p>Drag here or click to upload video.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Dropzone photo END -->

                </div>
                <!-- Modal feed body END -->

                <!-- Modal feed footer -->
                <div class="modal-footer">
                    <!-- Button -->
                    <button type="button" class="btn btn-danger-soft me-2"><i class="bi bi-camera-video-fill pe-1"></i> Live video</button>
                    <button type="button" class="btn btn-success-soft">Post</button>
                </div>
                <!-- Modal feed footer -->
            </div>
        </div>
    </div>
    <!-- Modal create Feed video END -->

    <!-- Modal create events START -->
    <div class="modal fade" id="modalCreateEvents" tabindex="-1" aria-labelledby="modalLabelCreateAlbum" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal feed header START -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelCreateAlbum">Create event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal feed header END -->
                <!-- Modal feed body START -->
                <div class="modal-body">
                    <!-- Form START -->
                    <form class="row g-4" >
                        <!-- Title -->
                        <div class="col-12">
                            <label class="form-label">Title</label>
                            <input type="email" class="form-control" placeholder="Event name here">
                        </div>
                        <!-- Description -->
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="2" placeholder="Ex: topics, schedule, etc."></textarea>
                        </div>
                        <!-- Date -->
                        <div class="col-sm-4">
                            <label class="form-label">Date</label>
                            <input type="text" class="form-control flatpickr" placeholder="Select date">
                        </div>
                        <!-- Time -->
                        <div class="col-sm-4">
                            <label class="form-label">Time</label>
                            <input type="text" class="form-control flatpickr" data-enableTime="true" data-noCalendar="true" placeholder="Select time">
                        </div>
                        <!-- Duration -->
                        <div class="col-sm-4">
                            <label class="form-label">Duration</label>
                            <input type="email" class="form-control" placeholder="1hr 23m">
                        </div>
                        <!-- Location -->
                        <div class="col-12">
                            <label class="form-label">Location</label>
                            <input type="email" class="form-control" placeholder="Logansport, IN 46947">
                        </div>
                        <!-- Add guests -->
                        <div class="col-12">
                            <label class="form-label">Add guests</label>
                            <input type="email" class="form-control" placeholder="Guest email">
                        </div>
                        <!-- Avatar group START -->
                        <div class="col-12 mt-3">
                            <ul class="avatar-group list-unstyled align-items-center mb-0">
                                <li class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/01.jpg" alt="avatar">
                                </li>
                                <li class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/02.jpg" alt="avatar">
                                </li>
                                <li class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/03.jpg" alt="avatar">
                                </li>
                                <li class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/04.jpg" alt="avatar">
                                </li>
                                <li class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/05.jpg" alt="avatar">
                                </li>
                                <li class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/06.jpg" alt="avatar">
                                </li>
                                <li class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" src="assets/img/avatar/07.jpg" alt="avatar">
                                </li>
                                <li class="ms-3">
                                    <small> +50 </small>
                                </li>
                            </ul>
                        </div>
                        <!-- Upload Photos or Videos -->
                        <!-- Dropzone photo START -->
                        <div>
                            <label class="form-label">Upload attachment</label>
                            <div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":2}'>
                                <div class="dz-message">
                                    <i class="bi bi-file-earmark-text display-3"></i>
                                    <p>Drop presentation and document here or click to upload.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Dropzone photo END -->
                    </form>
                    <!-- Form END -->
                </div>
                <!-- Modal feed body END -->
                <!-- Modal footer -->
                <!-- Button -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger-soft me-2" data-bs-dismiss="modal"> Cancel</button>
                    <button type="button" class="btn btn-success-soft">Create now</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal create events END -->

    <!-- =======================
JS libraries, plugins and custom scripts -->

    <!-- Bootstrap JS -->
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vendors -->
    <script src="../assets/vendor/tiny-slider/dist/tiny-slider.js"></script>
    <script src="../assets/vendor/OverlayScrollbars-master/js/OverlayScrollbars.min.js"></script>
    <script src="../assets/vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="../assets/vendor/glightbox-master/dist/js/glightbox.min.js"></script>
    <script src="../assets/vendor/flatpickr/dist/flatpickr.min.js"></script>
    <script src="../assets/vendor/plyr/plyr.js"></script>
    <script src="../assets/vendor/dropzone/dist/min/dropzone.min.js"></script>

    <!-- Template Functions -->
    <script src="functions.js"></script>


</body>

</html>