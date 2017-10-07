 <style type="text/css">
     .label-unit{
        font-size: 14px;
        font-style: italic;
     }

 </style>
 <div class="container">
                <div class="page-title">
                    <div class="row">
                        <div class="col-sx-12 text-center">
                           <h3><?php echo $title; ?></h3>
                            <div class="bread">
                                <ol class="breadcrumb">
                                  <li><a href="<?php echo site_url('welcome') ?>">Home</a></li>
                                  <li><a href="<?php echo site_url('products/product_list/'.$detail->parent) ?>">Products</a></li>
                                  <li class="active"><?php echo $title; ?></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div id="singlewrapper" class="col-md-8">
                        <div class="content-before">
                            <div class="row">
                                <div class="col-md-12 col-sx-12 cen-xs">
                                    <form class="dropForm">
                                        <div class="input-prepend">
                                            <div class="btn-group">
                                                <select name="orderby" class="selectpicker">
                                                  <option>All Platforms</option>
                                                  <option>IOS Apps</option>
                                                  <option>Android Apps</option>
                                                  <option>UI Kits</option>
                                                  <option>Site Templates</option>
                                                  <option>WordPress Themes</option>
                                              </select>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Search anything here.">
                                            <button class="btn btn-primary" tabindex="-1"><i class="fa fa-search"></i></button>
                                        </div>
                                    </form>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end content before -->

                        <div class="content nopad">
                            <div class="item-single-wrapper">
                                <div class="item-box">
                                    <div class="item-media text-center">
                                        <div id="slider" class="flexslider clearfix">
                                            <ul class="slides">
                                                <?php foreach($images as $image){?>
                                                <li><img src="<?php echo base_url(); ?>data/product/image/<?php echo $image->path_url;?>" alt="" class="img-responsive"></li>
                                                <?php }?>

                                               
                                            </ul>
                                        </div>
                                        <div id="carousel" class="flexslider clearfix">
                                            <ul class="slides">
                                                 <?php foreach($images as $image){?>
                                                <li><img src="<?php echo base_url(); ?>data/product/image/<?php echo $image->path_url; ?>" alt="" class="img-responsive"></li>
                                                <?php }?>

                                               
                                            </ul>
                                        </div>  
                                    </div><!-- end item-media -->

                                    <div class="item-desc">
                                        <p><?php echo $detail->description; ?></p>
                                    </div><!-- end item-desc -->
                                </div><!-- end item-box -->
                            </div><!-- end item-single-wrapper -->
                        </div><!-- end content -->

                        <div class="content-after boxs">
                            <div class="row">
                                <div class="col-md-12 general-title">
                                    <h4>Other <?php echo $detail->firstname;?> Items <span class="hidden-xs"><a href="<?php echo site_url('products/product_list/'.$detail->parent) ?>">View all</a></span></h4>
                                    <hr>
                                </div><!-- end col -->
                            </div><!-- end row -->
                            <div class="row">
                                <?php foreach($others as $ot){?>
                                <div class="col-md-4 col-sm-6">
                                    <div class="item-box">
                                        <div class="item-media entry">
                                            <img src="<?php echo base_url(); ?>data/product/image/<?php echo $ot->path_url;?>" alt="" class="img-responsive">
                                            <div class="magnifier">
                                                <div class="item-author">
                                                    <a href="public-profile.html"><img src="<?php echo base_url(); ?>/jf-themes/upload/member_01.jpg" class="img-circle" alt=""> Amanda</a>
                                                </div><!-- end author -->
                                            </div>
                                            <div class="theme__button">
                                                <p><a href="single-item.html" title="">$21</a></p>
                                            </div>
                                        </div><!-- end item-media -->
                                        <h4><a href="<?php echo site_url('products/product_detail/'.$ot->product_id) ?>"><?php echo $ot->name;?></a></h4>
                                        <small><a href="#"><i class="fa fa-eye"></i> <?php echo $ot->count_view;?></a></small>
                                        <small><a href="#"><i class="fa fa-phone"></i> <?php echo $ot->count_call;?></a></small>
                                    </div><!-- end item-box -->
                                </div><!-- end col -->
                                <?php } ?>
                            </div><!-- end row -->
                        </div><!-- end content after -->
                    </div><!-- end singlewrapper -->

                    <div id="sidebar" class="col-md-4">
                        <div class="boxes boxs">
                            <div class="item-price text-center">
                                <p>$21.00 <span class="label-unit">/ Kg</span></p>
                                <p><h5><?php echo $detail->name;?></h5></p>
                                <!-- <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div> -->
                                <hr>
                                <small><a href="#"><i class="fa fa-eye"></i>&nbsp;<?php echo $detail->count_view;?> Viewed</a> &nbsp;&nbsp; <a href="#"><i class="fa fa-phone"></i>&nbsp;<?php echo $detail->count_call;?> Called</a> </small>
                                
                            </div><!-- end price -->
                        </div><!-- end boxes -->

                        <div class="boxes boxs">
                            <div class="desiger-details text-center">
                                <img src="<?php echo base_url();?>jf-themes/upload/member_05.jpg" class="img-circle" alt=""></a>
                                <h4>
                                <a href="public-profile.html"><?php echo $detail->firstname.' '.$detail->lastname;?></a></h4>
                                <small><a href="mailto:<?php echo $detail->email1; ?>"><i class="fa fa-envelope-o"></i> Send a Message</a> &nbsp;&nbsp; <a href="#"><i class="fa fa-phone"></i> Call <?php echo $detail->firstname;?>'s</a> </small>
                            </div><!-- end designer -->
                        </div><!-- end boxes -->

                        <div class="boxes boxs">
                            <div class="item-details">
                                <table>
                                    <tr>
                                        <td>Release on:</td>
                                        <td>2016-02-21</td>
                                    </tr>
                                    <tr>
                                        <td>Version:</td>
                                        <td>0.1</td>
                                    </tr>
                                    <tr>
                                        <td>Included:</td>
                                        <td>Zip, AI, EPS</td>
                                    </tr>
                                    <tr>
                                        <td>File size:</td>
                                        <td>5Mb</td>
                                    </tr>
                                    <tr>
                                        <td>Requirements:</td>
                                        <td>Illustrator</td>
                                    </tr>
                                    <tr>
                                        <td>Document:</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Support:</td>
                                        <td>Life Time</td>
                                    </tr>
                                    <tr>
                                        <td>Tags:</td>
                                        <td>
                                              <div class="product-tags">
                                                <a href="#">IOS App</a>
                                                <a href="#">UI Kit</a>
                                                <a href="#">PSD Version</a>
                                                <a href="#">Weather</a>
                                                <a href="#">Creative</a>
                                                <a href="#">Blue</a>
                                            </div><!-- en tags -->                          
                                        </td>
                                    </tr>

                                </table>
                            </div><!-- end item-details -->
                        </div><!-- end boxes -->
                    </div><!-- end sidebar -->
                </div><!-- end row -->

               
            </div><!-- end container -->