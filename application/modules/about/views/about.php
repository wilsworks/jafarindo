<?php echo $map['js']; ?>
    <div id="main-contain" class="container">
        <div class="">
            <div class="row">
                 <div class="col-md-8">
                    <div class="blog-item2">
                        <div class="row">
                            <nav class="navbar navbar-inverse" role="banner">
                                <div class="collapse navbar-collapse navbar-left">
                                    <ul class="nav navbar-nav">
                                        <li><a href="<?php echo site_url('welcome'); ?>">Home</a></li>
                                        <li class="dropdown">
                                            <a href="<?php echo site_url('projects/projects_show/'); ?>" class="dropdown-toggle" data-toggle="dropdown">Projects <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="projects/projects_show/1">Photography</a></li>
                                                <li><a href="projects/projects_show/2">Infografis</a></li>
                                                <li><a href="projects/projects_show/3">Video</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="<?php echo site_url('news/news_detail/4'); ?>">News</a></li>
                                        <li class="active"><a href="<?php echo site_url('about'); ?>">About Us</a></li>
                                        <li><a href="<?php echo site_url('contact'); ?>">Contact Us</a></li>                      
                                    </ul> 
                                </div>
                            </nav><!--/nav-->
                            <div class="col-xs-12 col-sm-12 blog-content">
                                <div class="blog">
                                    <div class="">
                                       <iframe width="100%" height="420" src="https://www.youtube.com/embed/rz_GqnsLPTM" frameborder="0" allowfullscreen></iframe>

                                      <?php if(!empty($status)){ ?>
                                                <div class="<?php echo $alert; ?> alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <?php echo $status; ?>
                                                </div>                  
                                              <?php } ?>
                                    </div><!--/.blog-item-->

                                </div> 
                            </div>
                        </div>    
                    </div><!--/.blog-item-->
                  
                </div><!--/.col-md-8-->

                <aside class="col-md-4 ">
                    <div class="widget categories">
                        <h3>Baris Iklan</h3>
                        <div class="row">
                            <div class="col-sm-12">
                                <div>
                                    <img src="<?php echo base_url(); ?>themesFront/images/public/img/babeh.jpeg" class="img-responsive" width="100%">
                                </div>
                                
                            </div>
                            
                        </div>                     
                    </div><!--/.recent comments-->
    			</aside>  
            </div><!--/.row-->
        </div>
    </div><!--/#blog-->


    