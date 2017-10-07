
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
                                                <li><a href="<?php echo site_url('projects/projects_show/1'); ?>">Photography</a></li>
                                                <li><a href="<?php echo site_url('projects/projects_show/2'); ?>">Infografis</a></li>
                                                <li><a href="<?php echo site_url('projects/projects_show/3'); ?>">Video</a></li>
                                            </ul>
                                        </li>
                                        <li class="active"><a href="<?php echo site_url('news/news_detail/4'); ?>">News</a></li>
                                        <li><a href="<?php echo site_url('about'); ?>">About Us</a></li>
                                        <li><a href="<?php echo site_url('contact'); ?>">Contact Us</a></li>                     
                                    </ul>
                                </div>
                            </nav><!--/nav-->
                            <div class="col-xs-12 col-sm-12 blog-content">
                                <div class="blog">
                                    <div class="">
                                        <img class="img-responsive img-blog" src="<?php echo base_url(); ?>data/news/<?php echo $news->img;?>" width="100%" alt="" />

                                        <div class="row">  
                                            <div class="col-xs-12 col-sm-12 blog-content">
                                                <h2><?php echo $news->judul;?></h2>
                                                
                                                <span><i class="fa fa-user"></i>&nbsp;<?php echo $news->writer;?></span>
                                                |
                                                <span><i class="fa fa-calendar"></i> 
                                                    <?php 
                                                    $news_date = date("F j, Y, g:i a", strtotime($news->created_date));
                                                    echo $news_date;
                                                    ?>
                                                </span>
                                                <br></br>

                                                <p><?php echo $news->isi;?></p>

                                                <div class="post-tags">
                                                   Dilihat:<strong> &nbsp;<?php echo $news->view;?></strong> kali 
                                                </div>

                                            </div>
                                        </div>
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
                                        Berita
                                    </div>
                                    
                                </div>
                                <div class="col-md-12">
                                    <a href="#">BERITA TERBARU</a>
                                </div>
                                </br>
                                </br>

                                

                                <?php foreach ($news_lastest as $nl){
                                    if($nl->id!=$id_news){
                                ?>

                                <div class="col-md-6 col-sm-6">
                                    <div>
                                        <div class="img-float-left" heigh="100%">
                                            <img src="<?php echo base_url(); ?>data/news/<?php echo $nl->img;?>" alt="" width="96px" height="64px">
                                        </div>
                                        <div class="news-content-list">
                                            <p class="title-news-content-list"><a href="<?php echo site_url('news/news_detail/'.$nl->id.''); ?>"><?php echo $nl->judul; ?></a></p>

                                            <p class="isi-list">
                                                <span class="red-date"><?php 
                                                    $news_date = date("F j, Y | g:i a", strtotime($nl->created_date));
                                                    echo $news_date;
                                                    ?>  
                                                </span> &nbsp;&nbsp;
                                                <?php 
                                                    if(strlen($nl->isi)>150){
                                                        echo substr($nl->isi,0,150).'...'; 
                                                    }else{
                                                        echo $nl->isi;
                                                    }
                                                ?>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <?php } } ?>

                                


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
    