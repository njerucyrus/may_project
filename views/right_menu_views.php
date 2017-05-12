<?php
session_start();
require_once '../vendor/autoload.php';
$username = '';
$level  = '';
if(isset($_SESSION['username'])){
    $user  = \Hudutech\Controller\UserController::getLoggedInUser($_SESSION['username']);
    $username=$user['username'];
    $level = $user['userLevel'];

}

?>
<div class="sidebar-menu">

    <div class="sidebar-menu-inner">

        <header class="logo-env">

            <!-- logo -->
            <div class="logo">
                <a href="index.html">
                    <img src="../public/assets/images/logo@2x.png" width="120" alt="" />
                </a>
            </div>

            <!-- logo collapse icon -->
            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                    <i class="entypo-menu"></i>
                </a>
            </div>


            <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                    <i class="entypo-menu"></i>
                </a>
            </div>

        </header>

        <div class="sidebar-user-info">

            <div class="sui-normal">
                <a href="#" class="user-link">
                    <i style="color: white; font-size: 3em;" class="fa fa-user-md "></i>

                    <span>Welcome,</span>
                    <strong><?php echo $username ?></strong>
                    <span>logged in as <?php echo $level; ?></span>
                </a>
            </div>

            <div class="sui-hover inline-links animate-in"><!-- You can remove "inline-links" class to make links appear vertically, class "animate-in" will make A elements animateable when click on user profile -->
                <a href="#">
                    <i class="entypo-pencil"></i>
                    New Page
                </a>

                <a href="mailbox.html">
                    <i class="entypo-mail"></i>
                    Inbox
                </a>

                <a href="extra-lockscreen.html">
                    <i class="entypo-lock"></i>
                    Log Off
                </a>

                <span class="close-sui-popup">&times;</span><!-- this is mandatory -->				</div>
        </div>


        <ul id="main-menu" class="main-menu">
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
            <li class="opened active has-sub multiple-expanded">
                <a href="#">
                    <i class="fa fa-plus-square" style="font-size: 1.8em;"></i>
                    <span class="title" style="font-size: 1.8em;">Registration</span>
                </a>
                <ul class="visible">
                    <li>
                        <a href="register_user.php">
                            <i class="fa fa-user-plus" style="font-size: 1.5em;"></i>
                            <span class="title" style="font-size: 1.5em;">Register User</span>
                        </a>
                    </li>
                    <li>
                        <a href="register_patient.php">
                            <i class="fa fa-user-md" style="font-size: 1.5em;"></i>
                            <span class="title" style="font-size: 1.5em;">Register Patient</span>
                        </a>
                    </li>
                    <li>
                        <a href="clinical_tests.php">
                            <i class="fa fa-medkit" style="font-size: 1.5em;"></i>
                            <span class="title" style="font-size: 1.5em;">Add Clinical Test</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="has-sub" ">
            <a href="patient_visit.php">
                <i class="fa fa-wheelchair" style="font-size: 1.8em;"></i>
                <span class="title" style="font-size: 2em;" > Patient Visit</span>
            </a>

            </li>

            <li class="has-sub" ">
                <a href="consultation.php">
                    <i class="fa fa-stethoscope" style="font-size: 1.8em;"></i>
                    <span class="title" style="font-size: 2em;" > Consultation</span>
                </a>

            </li>




        </ul>

    </div>

</div>
