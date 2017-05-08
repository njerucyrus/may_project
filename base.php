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
<body class="page-body skin-facebook" data-url="http://neon.dev">

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


        <script type="text/javascript">
            jQuery(document).ready(function($)
            {
                // Sample Toastr Notification
                setTimeout(function()
                {
                    var opts = {
                        "closeButton": true,
                        "debug": false,
                        "positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
                        "toastClass": "black",
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };

                    toastr.success("You have been awarded with 1 year free subscription. Enjoy it!", "Account Subcription Updated", opts);
                }, 3000);


                // Sparkline Charts
                $('.inlinebar').sparkline('html', {type: 'bar', barColor: '#ff6264'} );
                $('.inlinebar-2').sparkline('html', {type: 'bar', barColor: '#445982'} );
                $('.inlinebar-3').sparkline('html', {type: 'bar', barColor: '#00b19d'} );
                $('.bar').sparkline([ [1,4], [2, 3], [3, 2], [4, 1] ], { type: 'bar' });
                $('.pie').sparkline('html', {type: 'pie',borderWidth: 0, sliceColors: ['#3d4554', '#ee4749','#00b19d']});
                $('.linechart').sparkline();
                $('.pageviews').sparkline('html', {type: 'bar', height: '30px', barColor: '#ff6264'} );
                $('.uniquevisitors').sparkline('html', {type: 'bar', height: '30px', barColor: '#00b19d'} );


                $(".monthly-sales").sparkline([1,2,3,5,6,7,2,3,3,4,3,5,7,2,4,3,5,4,5,6,3,2], {
                    type: 'bar',
                    barColor: '#485671',
                    height: '80px',
                    barWidth: 10,
                    barSpacing: 2
                });


                // JVector Maps
                var map = $("#map");

                map.vectorMap({
                    map: 'europe_merc_en',
                    zoomMin: '3',
                    backgroundColor: '#383f47',
                    focusOn: { x: 0.5, y: 0.8, scale: 3 }
                });



                // Line Charts
                var line_chart_demo = $("#line-chart-demo");

                var line_chart = Morris.Line({
                    element: 'line-chart-demo',
                    data: [
                        { y: '2006', a: 100, b: 90 },
                        { y: '2007', a: 75,  b: 65 },
                        { y: '2008', a: 50,  b: 40 },
                        { y: '2009', a: 75,  b: 65 },
                        { y: '2010', a: 50,  b: 40 },
                        { y: '2011', a: 75,  b: 65 },
                        { y: '2012', a: 100, b: 90 }
                    ],
                    xkey: 'y',
                    ykeys: ['a', 'b'],
                    labels: ['October 2013', 'November 2013'],
                    redraw: true
                });

                line_chart_demo.parent().attr('style', '');


                // Donut Chart
                var donut_chart_demo = $("#donut-chart-demo");

                donut_chart_demo.parent().show();

                var donut_chart = Morris.Donut({
                    element: 'donut-chart-demo',
                    data: [
                        {label: "Download Sales", value: getRandomInt(10,50)},
                        {label: "In-Store Sales", value: getRandomInt(10,50)},
                        {label: "Mail-Order Sales", value: getRandomInt(10,50)}
                    ],
                    colors: ['#707f9b', '#455064', '#242d3c']
                });

                donut_chart_demo.parent().attr('style', '');


                // Area Chart
                var area_chart_demo = $("#area-chart-demo");

                area_chart_demo.parent().show();

                var area_chart = Morris.Area({
                    element: 'area-chart-demo',
                    data: [
                        { y: '2006', a: 100, b: 90 },
                        { y: '2007', a: 75,  b: 65 },
                        { y: '2008', a: 50,  b: 40 },
                        { y: '2009', a: 75,  b: 65 },
                        { y: '2010', a: 50,  b: 40 },
                        { y: '2011', a: 75,  b: 65 },
                        { y: '2012', a: 100, b: 90 }
                    ],
                    xkey: 'y',
                    ykeys: ['a', 'b'],
                    labels: ['Series A', 'Series B'],
                    lineColors: ['#303641', '#576277']
                });

                area_chart_demo.parent().attr('style', '');




                // Rickshaw
                var seriesData = [ [], [] ];

                var random = new Rickshaw.Fixtures.RandomData(50);

                for (var i = 0; i < 50; i++)
                {
                    random.addData(seriesData);
                }

                var graph = new Rickshaw.Graph( {
                    element: document.getElementById("rickshaw-chart-demo"),
                    height: 193,
                    renderer: 'area',
                    stroke: false,
                    preserve: true,
                    series: [{
                        color: '#73c8ff',
                        data: seriesData[0],
                        name: 'Upload'
                    }, {
                        color: '#e0f2ff',
                        data: seriesData[1],
                        name: 'Download'
                    }
                    ]
                } );

                graph.render();

                var hoverDetail = new Rickshaw.Graph.HoverDetail( {
                    graph: graph,
                    xFormatter: function(x) {
                        return new Date(x * 1000).toString();
                    }
                } );

                var legend = new Rickshaw.Graph.Legend( {
                    graph: graph,
                    element: document.getElementById('rickshaw-legend')
                } );

                var highlighter = new Rickshaw.Graph.Behavior.Series.Highlight( {
                    graph: graph,
                    legend: legend
                } );

                setInterval( function() {
                    random.removeData(seriesData);
                    random.addData(seriesData);
                    graph.update();

                }, 500 );
            });


            function getRandomInt(min, max)
            {
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }
        </script>


        <div class="row">
            <div class="col-sm-3 col-xs-6">

                <div class="tile-stats tile-red">
                    <div class="icon"><i class="entypo-users"></i></div>
                    <div class="num" data-start="0" data-end="83" data-postfix="" data-duration="1500" data-delay="0">0</div>

                    <h3>Registered users</h3>
                    <p>so far in our blog, and our website.</p>
                </div>

            </div>

            <div class="col-sm-3 col-xs-6">

                <div class="tile-stats tile-green">
                    <div class="icon"><i class="entypo-chart-bar"></i></div>
                    <div class="num" data-start="0" data-end="135" data-postfix="" data-duration="1500" data-delay="600">0</div>

                    <h3>Daily Visitors</h3>
                    <p>this is the average value.</p>
                </div>

            </div>

            <div class="clear visible-xs"></div>

            <div class="col-sm-3 col-xs-6">

                <div class="tile-stats tile-aqua">
                    <div class="icon"><i class="entypo-mail"></i></div>
                    <div class="num" data-start="0" data-end="23" data-postfix="" data-duration="1500" data-delay="1200">0</div>

                    <h3>New Messages</h3>
                    <p>messages per day.</p>
                </div>

            </div>

            <div class="col-sm-3 col-xs-6">

                <div class="tile-stats tile-blue">
                    <div class="icon"><i class="entypo-rss"></i></div>
                    <div class="num" data-start="0" data-end="52" data-postfix="" data-duration="1500" data-delay="1800">0</div>

                    <h3>Subscribers</h3>
                    <p>on our site right now.</p>
                </div>

            </div>
        </div>

        <br />

        <div class="row">
            <div class="col-sm-8">

                <div class="panel panel-primary" id="charts_env">

                    <div class="panel-heading">
                        <div class="panel-title">Site Stats</div>

                        <div class="panel-options">
                            <ul class="nav nav-tabs">
                                <li class=""><a href="#area-chart" data-toggle="tab">Area Chart</a></li>
                                <li class="active"><a href="#line-chart" data-toggle="tab">Line Charts</a></li>
                                <li class=""><a href="#pie-chart" data-toggle="tab">Pie Chart</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">

                        <div class="tab-content">

                            <div class="tab-pane" id="area-chart">
                                <div id="area-chart-demo" class="morrischart" style="height: 300px"></div>
                            </div>

                            <div class="tab-pane active" id="line-chart">
                                <div id="line-chart-demo" class="morrischart" style="height: 300px"></div>
                            </div>

                            <div class="tab-pane" id="pie-chart">
                                <div id="donut-chart-demo" class="morrischart" style="height: 300px;"></div>
                            </div>

                        </div>

                    </div>

                    <table class="table table-bordered table-responsive">

                        <thead>
                        <tr>
                            <th width="50%" class="col-padding-1">
                                <div class="pull-left">
                                    <div class="h4 no-margin">Pageviews</div>
                                    <small>54,127</small>
                                </div>
                                <span class="pull-right pageviews">4,3,5,4,5,6,5</span>

                            </th>
                            <th width="50%" class="col-padding-1">
                                <div class="pull-left">
                                    <div class="h4 no-margin">Unique Visitors</div>
                                    <small>25,127</small>
                                </div>
                                <span class="pull-right uniquevisitors">2,3,5,4,3,4,5</span>
                            </th>
                        </tr>
                        </thead>

                    </table>

                </div>

            </div>

            <div class="col-sm-4">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>
                                Real Time Stats
                                <br />
                                <small>current server uptime</small>
                            </h4>
                        </div>

                        <div class="panel-options">
                            <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                            <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                            <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                        </div>
                    </div>

                    <div class="panel-body no-padding">
                        <div id="rickshaw-chart-demo">
                            <div id="rickshaw-legend"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <br />



        <br />


        <script type="text/javascript">
            // Code used to add Todo Tasks
            jQuery(document).ready(function($)
            {
                var $todo_tasks = $("#todo_tasks");

                $todo_tasks.find('input[type="text"]').on('keydown', function(ev)
                {
                    if(ev.keyCode == 13)
                    {
                        ev.preventDefault();

                        if($.trim($(this).val()).length)
                        {
                            var $todo_entry = $('<li><div class="checkbox checkbox-replace color-white"><input type="checkbox" /><label>'+$(this).val()+'</label></div></li>');
                            $(this).val('');

                            $todo_entry.appendTo($todo_tasks.find('.todo-list'));
                            $todo_entry.hide().slideDown('fast');
                            replaceCheckboxes();
                        }
                    }
                });
            });
        </script>


        <!-- Footer -->
        <footer class="main">

            &copy; 2015 <strong>Neon</strong> Admin Theme by <a href="http://laborator.co" target="_blank">Laborator</a>

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