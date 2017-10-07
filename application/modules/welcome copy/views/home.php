
    <div id="main-contain" class="container">
        <div class="grey-white">
            <div class="row">
                 <div class="col-md-8">
                    <div class="blog-item2">
                        <div class="row">
                            <nav class="navbar navbar-inverse" role="banner">
                                <div class="collapse navbar-collapse navbar-left">
                                    <ul class="nav navbar-nav">
                                        <li class="active"><a href="<?php echo site_url('welcome'); ?>">Home</a></li>
                                        <li class="dropdown">
                                            <a href="<?php echo site_url('projects/projects_show/'); ?>" class="dropdown-toggle" data-toggle="dropdown">Projects <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo site_url('projects/projects_show/1'); ?>">Photography</a></li>
                                                <li><a href="<?php echo site_url('projects/projects_show/2'); ?>">Infografis</a></li>
                                                <li><a href="<?php echo site_url('projects/projects_show/3'); ?>">Video</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="<?php echo site_url('news/news_detail/4'); ?>">News</a></li>
                                        <li><a href="<?php echo site_url('about'); ?>">About Us</a></li>
                                        <li><a href="<?php echo site_url('contact'); ?>">Contact Us</a></li>                        
                                    </ul>
                                </div>
                            </nav><!--/nav-->
                            <div class="col-xs-12 col-sm-12 blog-content">
                            <div id="about-slider">
                                <div id="carousel-slider" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators visible-xs">
                                        <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-slider" data-slide-to="1"></li>
                                        <li data-target="#carousel-slider" data-slide-to="2"></li>
                                    </ol>

                                    <div class="carousel-inner">
                                        <?php  for ($i=0;$i<count($slide);$i++){
                                            $active='';
                                            if($i==0){$active='active';}

                                        ?>
                                        <div class="item <?php echo $active;?>">
                                            <img src="<?php echo base_url(); ?>data/slider/<?php echo $slide[$i]->file;?>" width="100%" class="img-responsive" alt=""> 
                                        </div>
                                        <?php  }?>
                                    </div>
                                    <a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
                                        <i class="fa fa-angle-left"></i> 
                                    </a>
                                    
                                    <a class=" right carousel-control hidden-xs" href="#carousel-slider" data-slide="next">
                                        <i class="fa fa-angle-right"></i> 
                                    </a>
                                </div> <!--/#carousel-slider-->
                            </div><!--/#about-slider-->
                            
                            </div>
                        </div>    
                    </div><!--/.blog-item-->
                  
                </div><!--/.col-md-8-->

                <aside class="col-md-4 ">
                    <div class="widget categories">
                        <h3>Recent News</h3>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="single_comments">
                                    <h3><strong><?php echo $recent_news->judul;?></strong></h3>


                                     <p class="rc-news"><?php 

                                        if(strlen($recent_news->isi)>150){
                                                        echo substr($recent_news->isi,0,150).'...'; 
                                                    }else{
                                                        echo $recent_news->isi;
                                                    }

                                        ?></p>
                                     <br>
                                <a class="btn btn-info readmore" href="<?php echo site_url('news/news_detail/'.$recent_news->id.''); ?>">Read More <i class="fa fa-angle-right"></i></a>
                                </div>
                                
                            </div>
                        </div>                     
                    </div><!--/.recent comments-->
    			</aside>  
            </div><!--/.row-->
        </div>
    </div><!--/#blog-->


    <div id="blog" class="container">

        <div class="blog">
            <div class="row">
                 <div class="col-md-8">
                    <div class="blog-item">
                        <div class="row">
                            <div class="features">

                                <div class=" col-md-4 col-sm-6">
                                    <div class="recent-project-wrap">
                                        <img src="<?php echo base_url(); ?>themesFront/images/master/grid1.gif">
                                        <div class="overlay">
                                            <div class="recent-work-inner text-center">
                                                <i class="fa fa-camera fa-4x"></i>
                                                <h3><a href="#">Photography</a></h3>
                                                <a class="preview" href="<?php echo site_url('projects/projects_show/1'); ?>" ><i class="fa fa-eye"></i> View All</a>
                                            </div> 

                                        </div>
                                        <h2>Photography</h2>
                                        <h3>Bidikan kamera yang menjadi saksi sebuah momentum berharga</h3>
                                    </div>           
                                </div><!--/.portfolio-item-->

                                <div class=" col-md-4 col-sm-6">
                                    <div class="recent-project-wrap">
                                        <img src="<?php echo base_url(); ?>themesFront/images/master/grid2.gif">
                                        <div class="overlay">
                                            <div class="recent-work-inner text-center">
                                                <i class="fa fa-picture-o fa-4x"></i>
                                                <h3><a href="#">Infographis</a></h3>
                                                <a class="preview" href="<?php echo site_url('projects/projects_show/2'); ?>"><i class="fa fa-eye"></i> View All</a>
                                            </div> 

                                        </div>
                                        <h2>Infographis</h2>
                                        <h3>Penyajian paduan karya seni dan informasi dirangkai menjadi ilustrasi</h3>
                                    </div>           
                                </div><!--/.portfolio-item-->



                               <div class=" col-md-4 col-sm-6">
                                    <div class="recent-project-wrap">
                                        <img src="<?php echo base_url(); ?>themesFront/images/master/grid3.gif">
                                        <div class="overlay">
                                            <div class="recent-work-inner text-center">
                                                <i class="fa fa-video-camera fa-4x"></i>
                                                <h3><a href="#">Video</a></h3>
                                                <a class="preview" href="<?php echo site_url('projects/projects_show/3'); ?>"><i class="fa fa-eye"></i> View All</a>
                                            </div> 

                                        </div>
                                        <h2>Video</h2>
                                        <h3>Tangkapan dan Rekaman Karya Seni yang bernilai artistik</h3>
                                    </div>           
                                </div>
                               
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
    <div id="adv-container" class="container">

        <div >
            <div class="row">

                    <div class="col-md-8 col-sm-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="adv-left">
                            <div class="row">
                                <div class="col-md-8 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                    <div >
                                        <img src="<?php echo base_url(); ?>themesFront/images/master/banner.gif" class="img-responsive" width="100%">
                                    </div>
                                </div><!--/.col-md-4-->

                                <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                    <div class="quote-footer text-left">
                                        <img src="<?php echo base_url(); ?>themesFront/images/master/quote.gif" class="img-responsive" alt="">
                                        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</h3>
                                        <h4><span>John Doe </span>-  Director of corlate.com</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-3 wow fadeInDown adv-banner-right" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div>
                            
                            <img src="<?php echo base_url(); ?>themesFront/images/public/img/babeh.jpeg" class="img-responsive" width="100%">
                        </div>
                    </div><!--/.col-md-4-->
                
                   
            </div><!--/.row--> 
                    
        </div>
    </div><!--/#blog-->