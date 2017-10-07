<div class="container">
    <div class="page-title public-profile-title">
        <div class="row">
            <div class="col-xs-10 col-md-offset-1 text-center">
                <!-- <img src="<?php echo base_url(); ?>jf-themes/images/apple-touch-icon-72x72.png"> -->
                <?php foreach($sliders as $sl){?>
                <h3>Intro Company</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac condimentum libero. Morbi congue placerat lacus vel fringilla. Nullam sed metus mattis, feugiat ex et, placerat urna. Nam blandit finibus accumsan. Suspendisse potenti. Quisque blandit mauris sit amet tellus maximus, in semper neque vulputate. Praesent sed dictum lacus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                <br>
                <a class="nav-link js-scroll-trigger" href="#stories"><button class="btn btn-outline">Our Story</button></a>
                <a class="nav-link js-scroll-trigger" href="#products"><button class="btn btn-primary">Shop Now</button></a>

                <?php }?>
                
            </div>
        </div>
    </div>

    <div class="content"  id="about">
        <div class="row">
            <div class="col-md-12 col-sx-12 cen-xs text-center">
               <h2>Welcome to Our Company</h2>
               <div class="separator-title-center"></div>
            </div>
            <?php $hi = 1; for($h=0;$h<count($highlights);$h++) { ?>
               
            <?php if($hi%2==0){ ?>
            <div class="col-md-5 col-md-offset-7 col-sx-12 cen-xs text-right">
            <?php } else {?> 
            <div class="col-md-5 col-sx-12 cen-xs text-left">
            <?php  } ?>
                <h3 class="sub-intro-title"><?php echo $highlights[$h]->title; ?></h3>
                <p><?php echo $highlights[$h]->description; ?> </p>
                <?php if($h==(count($highlights)-1)){?>
                <br>
                <div class="separator-title-right"></div>
                <?php } ?>
            </div>
            <?php 
            $hi++;
            } ?>
            
        </div><!-- end row -->
    </div><!-- end content before -->
    <div class="content" id="stories">
        <div class="row">
            <div class="col-md-12 col-sx-12 cen-xs text-center">
               <h2>Our Story</h2>
               <div class="separator-title-center"></div>
            </div>

            <?php foreach ($stories as $story) {?>
            <div class="col-md-10 col-sx-12 cen-xs text-left">
               <h3 class="sub-intro-title"><?php echo $story->title;?></h3>
                <p><label><?php 
                            $fStartDate = date("d/m/Y", strtotime($story->start_date));
                            echo $fStartDate; 

                            if($story->end_date==''){
                                echo '- Now';
                            }else{
                            $fEndDate = date("d/m/Y", strtotime($story->end_date));
                                echo '- '.$fEndDate; 
                            }
                             ?> </label><br>
                <?php echo $story->description;?></p>
            </div>
            <?php } ?>

            
        </div><!-- end row -->
    </div><!-- end content before -->
    <div class="content-before" style="display: none;">
        <div class="row">
            <div class="col-md-6 col-sx-12 cen-xs">
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
            </div>
            <div class="col-md-6 text-right hidden-xs">
                <div class="catalog-order">
                    <select name="orderby" class="selectpicker">
                        <option value="popularity">Sort by Popularity</option>
                        <option value="rating">Sort by Average Rating</option>
                        <option value="date" selected='selected'>Sort by Newness</option>
                        <option value="price">Sort by Price: Low to High</option>
                        <option value="price-desc">Sort by Price: High to Low</option>
                    </select>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end content before -->

    <div class="content" id ="products">
        <div class="row" style="display: none;">
            <div class="col-md-12 general-title">
                <h4>Recent Items <span class="hidden-xs"><a href="shop-four.html">View all</a></span></h4>
                <hr>
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="col-md-12 col-sx-12 cen-xs text-center">
           <h2>Our Product</h2>
           <div class="separator-title-center"></div>
        </div>
        <div class="row">
            <?php foreach ($products as $product) { ?>
            <div class="col-md-3 col-sm-6">
                <div class="item-box">
                    <div class="item-media entry">
                        <?php if ($product->path_url!=''){ ?>
                        <img src="<?php echo base_url(); ?>data/product/image/<?php echo $product->path_url;?>" alt="" class="img-responsive">
                        <?php } else { ?>
                        <img src="<?php echo base_url(); ?>data/product/image/item_default.jpg" alt="" class="img-responsive">
                        <?php } ?>
                        <div class="magnifier">
                            <!-- <div class="item-author">
                                <a href="public-profile.html"><img src="<?php echo base_url(); ?>jf-themes/upload/member_01.jpg" class="img-circle" alt=""> Amanda</a>
                            </div> -->
                            <!-- end author -->
                        </div>
                        <div class="theme__button">
                            <p><a href="<?php echo site_url('products/product_list/'.$product->product_id) ?>" title=""><?php echo $product->item;?></a></p>
                        </div>
                    </div><!-- end item-media -->
                    <h4><a href="<?php echo site_url('products/product_list/'.$product->product_id) ?>"><?php echo $product->name; ?></a></h4>
                    <small><a href="single-item.html"><i class="fa fa-eye"></i> 893</a></small>
                    <small><a href="single-item.html"><i class="fa fa-comment-o"></i> 12</a></small>
                </div><!-- end item-box -->
            </div><!-- end col -->
            <?php } ?>

            
        </div><!-- end row -->
    </div><!-- end content -->

    <div class="content-after text-center boxs">
        <div class="row">
            <div class="col-md-12">
                <nav class="pagination-wrapper">
                    <ul class="pagination">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div><!-- end row -->
    </div><!-- end content after -->
</div>


    <script src="<?php echo base_url(); ?>jf-themes/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>jf-themes/js/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>jf-themes/js/scrollreveal/scrollreveal.min.js"></script>
    <script src="<?php echo base_url(); ?>jf-themes/js/creative/creative.min.js"></script>

    