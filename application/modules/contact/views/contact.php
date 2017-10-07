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
                                        <li><a href="<?php echo site_url('about'); ?>">About Us</a></li>
                                        <li class="active"><a href="<?php echo site_url('contact'); ?>">Contact Us</a></li>                      
                                    </ul> 
                                </div>
                            </nav><!--/nav-->
                            <div class="col-xs-12 col-sm-12 blog-content">
                                <div class="blog">
                                    <div class="">
                                       <?php echo $map['html']; ?>

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


    <div id="blog" class="container">

        <div class="">
            <div class="row">
                 <div class="col-md-8">
                    <div class="">
                        <div class="row">
                            <div >
                                <div class="col-md-12 ">
                                    <div class="header-news">
                                        Contact Us
                                    </div>
                                    
                                </div>
                                 <div class="row contact-wrap"> 
                                    <div class="status alert alert-success" style="display: none"></div>
                                    <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php">
                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Name *</label>
                                                <input type="text" name="name" class="form-control" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label>Email *</label>
                                                <input type="email" name="email" class="form-control" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input type="text" class="form-control">
                                            </div>                        
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Subject *</label>
                                                <input type="text" name="subject" class="form-control" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label>Message *</label>
                                                <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                                            </div>                        
                                            <div class="form-group">
                                                <button type="submit" name="submit" class="btn btn-info btn-lg" required="required">Submit Message</button>
                                            </div>
                                        </div>
                                    </form> 
                                </div><!--/.row-->
                               
                            </div><!--/.services-->
                        </div><!--/.row--> 
                    </div><!--/.blog-item-->
                </div><!--/.col-md-8-->

                <div class="col-md-4">
                    
                    <div class="blog_gallery">
                        <!-- <h3>Fan Page Facebook</h3> -->
                        <div class="fb-page" data-href="https://www.facebook.com/Activate-asia-358334350936392/?ref=ts&amp;fref=ts" data-tabs="timeline" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Activate-asia-358334350936392/?ref=ts&amp;fref=ts" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Activate-asia-358334350936392/?ref=ts&amp;fref=ts">Activate asia</a></blockquote></div>
                    </div><!--/.blog_gallery-->
                </div>  
            </div><!--/.row-->
        </div>
    </div><!--/#blog-->
    