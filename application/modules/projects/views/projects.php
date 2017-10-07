
    <div id="main-contain" class="container">
        <div class="">
            <div class="row">
                 <div class="col-md-12">
                    <div class="blog-item2">
                        <div class="row">
                            <nav class="navbar navbar-inverse" role="banner">
                                <div class="collapse navbar-collapse navbar-left">
                                    <ul class="nav navbar-nav">
                                       <li><a href="<?php echo site_url('welcome'); ?>">Home</a></li>
                                        <li class="dropdown active">
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
                        </div>    

                        <br>
                        <div class="center">
                           <h2>Portfolio</h2>
                           <p class="lead">Kami bekerja dengan memadukan Seni dan budaya, yang diabadian sebagai karya<br> serta media penyampaian pesan dan momen yang tak akan terlupakan</p>
                        </div>


                        <ul class="portfolio-filter text-center">
                            <li><a class="btn btn-default active" href="#" data-filter="*">All Projects</a></li>
                            <?php $i=1;foreach ($typeproject as $row){
                                $descType = '';
                                if($row->type=='P'){
                                    $descType ='Photography';
                                }else if ($row->type=='I'){
                                    $descType ='Infographic';
                                }else{
                                    $descType ='Videography';
                                }
                            ?>

                                <li><a class="btn btn-default" href="#" data-filter=".<?php echo $row->type; ?>"><?php echo $descType; ?></a></li>

                            <?php } ?>
                        </ul>



                        
                            <div class="portfolio-items">

                             <?php $i=1;foreach ($projects as $rowproj){ 

                                $descType = '';
                                if($rowproj->type=='P'){
                                    $descType ='photo';
                                }else if ($rowproj->type=='I'){
                                    $descType ='info';
                                }else{
                                    $descType ='video';
                                }

                                ?>
                                <div class="portfolio-item <?php echo $rowproj->type;?> col-xs-12 col-sm-3 col-md-3">
                                    <div class="recent-work-wrap">
                                        <img class="img-responsive project-item" src="<?php echo base_url(); ?>data/project/<?php echo $descType;?>/<?php echo $rowproj->pathUrl;?>" alt="">
                                        <div class="overlay">
                                            <div class="recent-work-inner">
                                                <h3><a href="#"><?php echo $rowproj->name;?></a></h3>
                                                <p><?php echo $rowproj->description ;?></p>
                                                <a class="preview" href="<?php echo base_url(); ?>data/project/<?php echo $descType;?>/<?php echo $rowproj->pathUrl;?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                                            </div> 
                                        </div>
                                    </div>
                                </div><!--/.portfolio-item-->

                             <?php } ?>
                        </div>
                        
                    </div><!--/.col-md-8-->

                    <!-- <a href="#" data-toggle="modal" data-target="#videoMsg">
                        <span class="video-link-icon"><i class="fa fa-play"></i></span>
                        <span class="video-link-text">Launch modal video</span>
                    </a> -->



                    <div class="modal modal-info fade" id="videoMsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" id="myModalLabel">Restore Confirmation</h4>
                        </div>
                        <div class="modal-body">
                            <!-- <iframe width="420" height="345" src="https://www.youtube.com/embed/XGSy3_Czz8k">
                            </iframe> -->
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/rz_GqnsLPTM" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                          <a id="restoreData" href="#"><button type="button" class="btn btn-outline">Restore</button></a>
                        </div>
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div>
                    <!-- MODAL: How it works -->
                    <div class="modal fade" id="modal-video" tabindex="-1" role="dialog" aria-labelledby="modal-video-label">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-video">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/84910153?title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;color=e89a3e" 
                                                        webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div><!--/.row-->
        </div><!--/#blog-->
    </div>


    
    