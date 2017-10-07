<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- SITE META -->
    <title>Jaffarindo | E-Commerce Platform by REKACIPTA</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>jf-themes/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>jf-themes/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>jf-themes/images/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>jf-themes/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>jf-themes/images/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>jf-themes/images/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>jf-themes/images/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>jf-themes/images/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>jf-themes/images/apple-touch-icon-152x152.png">

    <!-- TEMPLATE STYLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>jf-themes/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>jf-themes/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>jf-themes/style.css">

    <!-- CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>jf-themes/css/prettyPhoto.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>jf-themes/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>jf-themes/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>jf-themes/css/custom.css">


      <!-- CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>jf-themes/css/flexslider.css">


    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>

    <!-- START SITE -->
    <div id="wrapper">

        <nav class="hidden-xs cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
            <h3><i class="fa fa-star-o"></i> Your Favorites</h3>
            <ul>
                <li>
                    <img src="<?php echo base_url(); ?>jf-themes/upload/item_01.jpg" alt="" class="alignleft img-responsive">
                    <h4><a href="single-item.html">User Profile App</a></h4>
                    <small><a href="single-item.html"><i class="fa fa-eye"></i> 221</a></small>
                    <small><a href="single-item.html"><i class="fa fa-comment-o"></i> 05</a></small>
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>jf-themes/upload/item_02.jpg" alt="" class="alignleft img-responsive">
                    <h4><a href="single-item.html">Mail Application</a></h4>
                    <small><a href="single-item.html"><i class="fa fa-eye"></i> 435</a></small>
                    <small><a href="single-item.html"><i class="fa fa-comment-o"></i> 13</a></small>
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>jf-themes/upload/item_03.jpg" alt="" class="alignleft img-responsive">
                    <h4><a href="single-item.html">Showcase Podcast</a></h4>
                    <small><a href="single-item.html"><i class="fa fa-eye"></i> 551</a></small>
                    <small><a href="single-item.html"><i class="fa fa-comment-o"></i> 12</a></small>
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>jf-themes/upload/item_04.jpg" alt="" class="alignleft img-responsive">
                    <h4><a href="single-item.html">Login Box (Custom)</a></h4>
                    <small><a href="single-item.html"><i class="fa fa-eye"></i> 412</a></small>
                    <small><a href="single-item.html"><i class="fa fa-comment-o"></i> 55</a></small>
                </li>
            </ul>
            <a href="shop-favorites.html" class="btn btn-primary">Go to Favorites</a>
        </nav>

        <header class="header affix">
            <div class="container-menu">
                <nav class="navbar navbar-default yamm">
                    <div class="container">
                        <div class="navbar-table">
                            <div class="navbar-cell">
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="<?php echo site_url('welcome') ?>"><i class="fa fa-hashtag"></i> <?php echo $primary->brand;?></a>
                                    <div class="open-menu">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="fa fa-bars"></span>
                                        </button>
                                    </div>
                                </div><!-- end navbar-header -->
                            </div><!-- end navbar-cell -->
                            <div class="navbar-cell stretch">
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                                    <div class="navbar-cell">
                                        <ul class="nav navbar-nav navbar-right">
                                            <li><a class="active" href="<?php echo site_url('welcome') ?>" title="">Home</a></li>
                                            <li><a class="nav-link js-scroll-trigger" href="#about">About Us </a></li>
                                            <li><a class="nav-link js-scroll-trigger" href="#stories">Stories </a></li>
                                             <li><a class="nav-link js-scroll-trigger" href="#products">Products </a></li>
                                           <li><a class="nav-link js-scroll-trigger" href="#contact">Contact Us </a></li>
                                        </ul>
                                        <ul class="nav navbar-nav navbar-right" style="display: none;">
                                            <li class="dropdown membermenu hovermenu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(); ?>jf-themes/upload/member.png" alt="" class="img-circle"> <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-header">Profile</li>
                                                    <li><a href="edit-account.html">Edit Account</a></li>
                                                    <li><a href="#">Logout</a></li>
                                                    <li><hr></li>
                                                    <li class="dropdown-header">Dashboard</li>
                                                    <li><a href="public-profile.html">Public profile</a></li>
                                                    <li><a href="sales.html">My Sales</a></li>
                                                    <li><a href="messages.html">Messages</a></li>
                                                    <li><a href="upload-item.html">Upload Item</a></li>
                                                    <li><a href="downloads.html">Downloads</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div><!-- end navbar-cell -->
                                </div><!-- /.navbar-collapse -->        
                            </div><!-- end navbar cell -->
                        </div><!-- end navbar-table -->
                    </div><!-- end container fluid -->
                </nav><!-- end navbar -->
            </div><!-- end container -->
        </header>

        <section class="section single-wrap">
            {content}
        </section>

        <footer class="footer" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h4><?php echo $primary->corp_name;?></h4>
                        <p><?php echo $primary->short_desc;?></p>
                    </div>

                    <div class="col-md-4">
                        <h4>KEEP IN TOUCH</h4>
                        <p>
                            Address: <?php echo $primary->address;?><br>
                            Phone: <?php echo $primary->phone1;?><br>
                            Email : <?php echo $primary->email1;?>

                        </p>
                    </div>
                    
                    <div class="col-md-2">
                        <h4>FEATURED LINK</h4>
                        <p>
                            Term Of Use<br>
                            Privacy Policy<br>
                            FAQ
                        </p>
                    </div>
                    <div class="col-md-2">
                        <h4>FOLLOW US</h4>
                        <p>
                             <ul class="list-inline social">
                                <?php foreach ($social as $soc) {?>
                                   <li><a href="<?php echo $soc->link; ?>"><i class="fa fa-<?php echo $soc->name; ?>"></i></a></li>
                                <?php  }?>
                            </ul>
                        </p>
                    </div>
                    <!-- <div class="col-md-6 col-lg-5">
                        <div class="media cen-xs">
                            <p>
                                &copy; Catalog INC. 2016 - All Rights Reserverd.<br>
                                Idea by <a class="madeby" href="http://showwp.com">Show WP</a> made with <i class="fa fa-heart"></i> coded with <i class="fa fa-html5"></i>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <ul class="list-inline text-right cen-xs">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Site Terms</a></li>
                            <li><a href="#">Copyrights</a></li>
                            <li><a href="#">License</a></li>
                            <li><a href="#">Legal</a></li>
                            <li><a class="topbutton" href="#">Back to top <i class="fa fa-angle-up"></i></a></li>
                        </ul>
                    </div> --> 
                </div><!-- end row -->
            </div><!-- end container -->
        </footer><!-- end footer -->
    </div><!-- end wrapper -->
    <!-- END SITE -->

    <script src="<?php echo base_url(); ?>jf-themes/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>jf-themes/js/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>jf-themes/js/scrollreveal/scrollreveal.min.js"></script>
    <script src="<?php echo base_url(); ?>jf-themes/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>jf-themes/js/custom.js"></script>


        <!-- FlexSlider JavaScript
    ================================================== -->
    <script src="<?php echo base_url(); ?>jf-themes/js/flexslider.js"></script>
    <script>
        (function($) {
        "use strict";
        $(window).load(function() {
            $('#carousel').flexslider({
                animation: "slide",
                controlNav: false,
                directionNav: false,
                animationLoop: true,
                slideshow: true,
                itemWidth: 92,
                itemMargin: 0,
                asNavFor: '#slider'
            });
       
            $('#slider').flexslider({
                animation: "fade",
                controlNav: false,
                animationLoop: false,
                slideshow: true,
                sync: "#carousel"
            });
        });
        })(jQuery);
    </script>

</body>
</html>