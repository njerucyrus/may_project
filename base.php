<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 06/05/2017
 * Time: 17:28
 */
 ?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'views/head.php';
?>
<body class="page-body skin-facebook" >

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    <?php
    include 'views/right_menu.php';
    ?>

    <div class="main-content">

        <div class="row">

            <!-- Profile Info and Notifications -->
            <div class="col-md-6 col-sm-8 clearfix">

                <ul class="user-info pull-left pull-none-xsm">


                    <ul class="user-info pull-left pull-right-xs pull-none-xsm">

                        <!-- Raw Notifications -->
                        <li class="notifications dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="entypo-attention"></i>
                                <span class="badge badge-info">6</span>
                            </a>

                            <ul class="dropdown-menu">
                                <li class="top">
                                    <p class="small">
                                        <a href="#" class="pull-right">Mark all Read</a>
                                        You have <strong>3</strong> new notifications.
                                    </p>
                                </li>

                                <li>
                                    <ul class="dropdown-menu-list scroller">
                                        <li class="unread notification-success">
                                            <a href="#">
                                                <i class="entypo-user-add pull-right"></i>

                                                <span class="line">
												<strong>New user registered</strong>
											</span>

                                                <span class="line small">
												30 seconds ago
											</span>
                                            </a>
                                        </li>

                                        <li class="unread notification-secondary">
                                            <a href="#">
                                                <i class="entypo-heart pull-right"></i>

                                                <span class="line">
												<strong>Someone special liked this</strong>
											</span>

                                                <span class="line small">
												2 minutes ago
											</span>
                                            </a>
                                        </li>

                                        <li class="notification-primary">
                                            <a href="#">
                                                <i class="entypo-user pull-right"></i>

                                                <span class="line">
												<strong>Privacy settings have been changed</strong>
											</span>

                                                <span class="line small">
												3 hours ago
											</span>
                                            </a>
                                        </li>

                                        <li class="notification-danger">
                                            <a href="#">
                                                <i class="entypo-cancel-circled pull-right"></i>

                                                <span class="line">
												John cancelled the event
											</span>

                                                <span class="line small">
												9 hours ago
											</span>
                                            </a>
                                        </li>

                                        <li class="notification-info">
                                            <a href="#">
                                                <i class="entypo-info pull-right"></i>

                                                <span class="line">
												The server is status is stable
											</span>

                                                <span class="line small">
												yesterday at 10:30am
											</span>
                                            </a>
                                        </li>

                                        <li class="notification-warning">
                                            <a href="#">
                                                <i class="entypo-rss pull-right"></i>

                                                <span class="line">
												New comments waiting approval
											</span>

                                                <span class="line small">
												last week
											</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="external">
                                    <a href="#">View all notifications</a>
                                </li>
                            </ul>

                        </li>

                        <!-- Message Notifications -->
                        <li class="notifications dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="entypo-mail"></i>
                                <span class="badge badge-secondary">10</span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <form class="top-dropdown-search">

                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Search anything..." name="s" />
                                        </div>

                                    </form>

                                    <ul class="dropdown-menu-list scroller">
                                        <li class="active">
                                            <a href="#">
											<span class="image pull-right">
												<img src="public/assets/images/thumb-1@2x.png" width="44" alt="" class="img-circle" />
											</span>

                                                <span class="line">
												<strong>Luc Chartier</strong>
												- yesterday
											</span>

                                                <span class="line desc small">
												This ain’t our first item, it is the best of the rest.
											</span>
                                            </a>
                                        </li>

                                        <li class="active">
                                            <a href="#">
											<span class="image pull-right">
												<img src="public/assets/images/thumb-2@2x.png" width="44" alt="" class="img-circle" />
											</span>

                                                <span class="line">
												<strong>Salma Nyberg</strong>
												- 2 days ago
											</span>

                                                <span class="line desc small">
												Oh he decisively impression attachment friendship so if everything.
											</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
											<span class="image pull-right">
												<img src="public/assets/images/thumb-3@2x.png" width="44" alt="" class="img-circle" />
											</span>

                                                <span class="line">
												Hayden Cartwright
												- a week ago
											</span>

                                                <span class="line desc small">
												Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
											</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
											<span class="image pull-right">
												<img src="public/assets/images/thumb-4@2x.png" width="44" alt="" class="img-circle" />
											</span>

                                                <span class="line">
												Sandra Eberhardt
												- 16 days ago
											</span>

                                                <span class="line desc small">
												On so attention necessary at by provision otherwise existence directions.
											</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="external">
                                    <a href="mailbox.html">All Messages</a>
                                </li>
                            </ul>

                        </li>

                        <!-- Task Notifications -->


                    </ul>

            </div>


            <!-- Raw Links -->
            <div class="col-md-6 col-sm-4 clearfix hidden-xs">

                <ul class="list-inline links-list pull-right">

                    <!-- Language Selector -->
                    <li class="dropdown language-selector">

                        Language: &nbsp;
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                            <img src="public/assets/images/flags/flag-uk.png" width="16" height="16" />
                        </a>

                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="#">
                                    <img src="public/assets/images/flags/flag-de.png" width="16" height="16" />
                                    <span>Deutsch</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="#">
                                    <img src="public/assets/images/flags/flag-uk.png" width="16" height="16" />
                                    <span>English</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="public/assets/images/flags/flag-fr.png" width="16" height="16" />
                                    <span>François</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="public/assets/images/flags/flag-al.png" width="16" height="16" />
                                    <span>Shqip</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="public/assets/images/flags/flag-es.png" width="16" height="16" />
                                    <span>Español</span>
                                </a>
                            </li>
                        </ul>

                    </li>

                    <li class="sep"></li>


                    <li>
                        <a href="#" data-toggle="chat" data-collapse-sidebar="1">
                            <i class="entypo-chat"></i>
                            Chat

                            <span class="badge badge-success chat-notifications-badge is-hidden">0</span>
                        </a>
                    </li>

                    <li class="sep"></li>

                    <li>
                        <a href="extra-login.html">
                            Log Out <i class="entypo-logout right"></i>
                        </a>
                    </li>
                </ul>

            </div>

        </div>

        <hr />





        <div class="row">
            <div class="col-sm-3 col-xs-6">

                <div class="tile-stats tile-red">
                    <div class="icon"><i class="entypo-users"></i></div>
                    <div class="num" data-start="0" data-end="83" data-postfix="" data-duration="1500" data-delay="0">0</div>

                    <h3>Registered users</h3>
                    <p>so far in our Hospital System</p>
                </div>

            </div>

            <div class="col-sm-3 col-xs-6">

                <div class="tile-stats tile-green">
                    <div class="icon"><i class="entypo-chart-bar"></i></div>


                    <h1 style="color: white">Date</h1>
                    <h2 style="color: white"><?php echo date("Y/m/d")?></h2>
                </div>

            </div>

            <div class="clear visible-xs"></div>

            <div class="col-sm-3 col-xs-6">

                <div class="tile-stats tile-aqua">
                    <div class="icon" style="padding-bottom: 40px;"><i class="fa fa-user-md"></i></div>
                    <div class="num" data-start="0" data-end="1023" data-postfix="" data-duration="1500" data-delay="1200">0</div>

                    <h3>Registered Patients</h3>
                    <p>Patients registered in the system</p>
                </div>

            </div>

            <div class="col-sm-3 col-xs-6">

                <div class="tile-stats tile-blue">
                    <div class="icon" style="padding-bottom: 40px;"><i class="fa fa-ambulance"></i></div>
                    <div class="num" data-start="0" data-end="152" data-postfix="" data-duration="1500" data-delay="1800">0</div>

                    <h3>Daily Visits</h3>
                    <p>Average Number of patients we attend.</p>
                </div>

            </div>
        </div>

        <br />

<!--       down row start here-->

<!--        down row stop here-->


        <br />



        <br />





        <!-- Footer -->
        <footer class="main">

            &copy; 2017 <strong>Developed by</strong>  <a href="http://hudutech.com" target="_blank">Hudutech Solutions</a>

        </footer>
    </div>


    <div id="chat" class="fixed" data-current-user="Art Ramadani" data-order-by-status="1" data-max-chat-history="25">

        <div class="chat-inner">


            <h2 class="chat-header">
                <a href="#" class="chat-close"><i class="entypo-cancel"></i></a>

                <i class="entypo-users"></i>
                Chat
                <span class="badge badge-success is-hidden">0</span>
            </h2>


            <div class="chat-group" id="group-1">
                <strong>Favorites</strong>

                <a href="#" id="sample-user-123" data-conversation-history="#sample_history"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
                <a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
                <a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
                <a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
                <a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
            </div>


            <div class="chat-group" id="group-2">
                <strong>Work</strong>

                <a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
                <a href="#" data-conversation-history="#sample_history_2"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
                <a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
            </div>


            <div class="chat-group" id="group-3">
                <strong>Social</strong>

                <a href="#"><span class="user-status is-busy"></span> <em>Velma G. Pearson</em></a>
                <a href="#"><span class="user-status is-offline"></span> <em>Margaret R. Dedmon</em></a>
                <a href="#"><span class="user-status is-online"></span> <em>Kathleen M. Canales</em></a>
                <a href="#"><span class="user-status is-offline"></span> <em>Tracy J. Rodriguez</em></a>
            </div>

        </div>

        <!-- conversation template -->
        <div class="chat-conversation">

            <div class="conversation-header">
                <a href="#" class="conversation-close"><i class="entypo-cancel"></i></a>

                <span class="user-status"></span>
                <span class="display-name"></span>
                <small></small>
            </div>

            <ul class="conversation-body">
            </ul>

            <div class="chat-textarea">
                <textarea class="form-control autogrow" placeholder="Type your message"></textarea>
            </div>

        </div>

    </div>





</div>



<!-- Imported styles on this page -->
<link rel="stylesheet" href="public/assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
<link rel="stylesheet" href="public/assets/js/rickshaw/rickshaw.min.css">

<!-- Bottom scripts (common) -->
<script src="public/assets/js/gsap/TweenMax.min.js"></script>
<script src="public/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="public/assets/js/jquery-3.2.0.slim.min.js"></script>
<script src="public/assets/js/bootstrap.js"></script>
<script src="public/assets/js/joinable.js"></script>
<script src="public/assets/js/resizeable.js"></script>
<script src="public/assets/js/neon-api.js"></script>
<script src="public/assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>


<!-- Imported scripts on this page -->
<script src="public/assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
<script src="public/assets/js/jquery.sparkline.min.js"></script>
<script src="public/assets/js/rickshaw/vendor/d3.v3.js"></script>
<script src="public/assets/js/rickshaw/rickshaw.min.js"></script>
<script src="public/assets/js/raphael-min.js"></script>
<script src="public/assets/js/morris.min.js"></script>
<script src="public/assets/js/toastr.js"></script>
<script src="public/assets/js/neon-chat.js"></script>


<!-- JavaScripts initializations and stuff -->
<script src="public/assets/js/neon-custom.js"></script>


<!-- Demo Settings -->
<script src="public/assets/js/neon-demo.js"></script>

</body>
</html>