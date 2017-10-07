<div class="container">
    <div class="page-title">
        <div class="row">
            <div class="col-sx-12 text-center">
                <h3><?php echo $title; ?></h3>
                <div class="bread">
                    <ol class="breadcrumb">
                      <li><a href="<?php echo site_url('welcome') ?>">Home</a></li>
                      <li class="active"><?php echo $title; ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content-before">
        <div class="row">
            <div class="col-md-12 col-sx-12 cen-xs">
                <form class="dropForm" style="display: none;">
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
        </div><!-- end row -->
    </div><!-- end content before -->

    <div class="content boxs">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="storelist panel panel-info">
                    <div class="panel-body">
                        <?php foreach ($product as $p) {?>
                        <div class="form-group row wow fadeIn">
                            <div class="col-sm-2 col-xs-12">
                                
                                <?php if($p->path_url!=''){?>
                                <a href="single-item.html" class="screenshot" data-gal="<?php echo base_url(); ?>data/product/image/<?php echo $p->path_url;?>" title="This is an item title <span>$12.00</span>"><img class="img-responsive img-thumbnail" src="<?php echo base_url(); ?>data/product/image/<?php echo $p->path_url;?>" alt=""></a>
                                <?php } else { ?>
                                <a href="single-item.html" class="screenshot" data-gal="<?php echo base_url(); ?>data/product/image/item_default.jpg" title="This is an item title <span>$12.00</span>"><img class="img-responsive img-thumbnail" src="<?php echo base_url(); ?>data/product/image/item_default.jpg" alt=""></a>
                                <?php } ?>
                            </div>
                            <div class="col-sm-5 col-xs-12">
                                <h4><a href="<?php echo site_url('products/product_detail/'.$p->product_id) ?>"><?php echo $p->name;?></a></h4>
                                <ul>
                                    <li><a href="#"><i class="fa fa-user"></i> <?php echo $p->firstname.' '.$p->lastname;?></a></li>
                                    <li><a href="mailto:<?php echo $p->email1; ?>"><i class="fa fa-envelope-o"></i> Send Email</a></li>
                                    <li><a href="#"><i class="fa fa-folder-open-o"></i> Contact</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-2 col-xs-12">
                                <h4>Details</h4>
                                <ul>
                                    <li><label>Price :</label> $21.00</li>
                                    <li><label>unit :</label> Kg</li>
                                    <li><label>Date :</label> Jan 25, 2016</li>
                                </ul>
                            </div>
                            <div class="col-sm-3 col-xs-12 text-center">
                                <ul>
                                    <li><a href="<?php echo site_url('products/product_detail/'.$p->product_id) ?>" class="btn btn-primary">View Detail</a> 
                                    <!-- <a href="#" class="btn btn-primary">Contact</a> --></li>
                                    <li><label>Views</label> 120</li>
                                    <li><label>Contact</label> 20</li>
                                    <!-- <li>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </li> -->
                                </ul>
                            </div>
                        </div><!-- end form-group --> 
                        <hr>
                        <?php  } ?>
                    </div><!-- end panel body -->
                </div><!-- end storelist -->
            </div><!-- end col -->
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

</div><!-- end container -->