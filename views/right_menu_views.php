<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 06/05/2017
 * Time: 18:07
 */
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
                    <img src="../public/assets/images/thumb-1@2x.png" width="55" alt="" class="img-circle" />

                    <span>Welcome,</span>
                    <strong>Art Ramadani</strong>
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
                <a href="#l">
                    <i class="entypo-gauge"></i>
                    <span class="title">Registration</span>
                </a>
                <ul class="visible">
                    <li>
                        <a href="register_user.php">
                            <span class="title">Register User</span>
                        </a>
                    </li>
                    <li>
                        <a href="register_patient.php">
                            <span class="title">Register Patient</span>
                        </a>
                    </li>


                </ul>
            </li>

            <li class="opened active has-sub">
                <a href="index.html">
                    <i class="entypo-gauge"></i>
                    <span class="title">View</span>
                </a>
                <ul class="visible">
                    <li>
                        <a href="index.html">
                            <span class="title">Registered Users</span>
                        </a>
                    </li>


                </ul>
            </li>




        </ul>

    </div>

</div>
