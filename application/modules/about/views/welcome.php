<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Welcome &mdash; PSB</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

 

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>themesfront/css/animate.css">
	<!-- Flexslider -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>themesfront/css/flexslider.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>themesfront/css/icomoon.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>themesfront/css/magnific-popup.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>themesfront/css/bootstrap.css">

	<!-- 
	Default Theme Style 
	You can change the style.css (default color purple) to one of these styles
	
	

	-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>themesfront/css/style.css">

	<!-- Styleswitcher ( This style is for demo purposes only, you may delete this anytime. ) -->
	<link rel="stylesheet" id="theme-switch" href="<?php echo base_url(); ?>themesfront/css/style.css">
	<!-- End demo purposes only -->


	<style>
	/* For demo purpose only */

	/*
	GREEN
	8dc63f
	RED
	FA5555
	TURQUOISE
	27E1CE
	BLUE 
	2772DB
	ORANGE
	FF7844
	YELLOW
	FCDA05
	PINK
	F64662
	PURPLE
	7045FF

	*/
	
	/* For Demo Purposes Only ( You can delete this anytime :-) */
	#colour-variations {
		padding: 10px;
		-webkit-transition: 0.5s;
	  	-o-transition: 0.5s;
	  	transition: 0.5s;
		width: 140px;
		position: fixed;
		left: 0;
		top: 100px;
		z-index: 999999;
		background: #fff;
		/*border-radius: 4px;*/
		border-top-right-radius: 4px;
		border-bottom-right-radius: 4px;
		-webkit-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
		-moz-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
		-ms-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
		box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
	}
	#colour-variations.sleep {
		margin-left: -140px;
	}
	#colour-variations h3 {
		text-align: center;;
		font-size: 11px;
		letter-spacing: 2px;
		text-transform: uppercase;
		color: #777;
		margin: 0 0 10px 0;
		padding: 0;;
	}

	#colour-variations ul,
	#colour-variations ul li {
		padding: 0;
		margin: 0;
	}
	#colour-variations ul {
		margin-bottom: 20px;
		float: left;	
	}
	#colour-variations li {
		list-style: none;
		display: inline;
	}
	#colour-variations li a {
		width: 20px;
		height: 20px;
		position: relative;
		float: left;
		margin: 5px;
	}



	#colour-variations li a[data-theme="style"] {
		background: #8dc63f;
	}
	#colour-variations li a[data-theme="red"] {
		background: #FA5555;
	}
	#colour-variations li a[data-theme="turquoise"] {
		background: #27E1CE;
	}
	#colour-variations li a[data-theme="blue"] {
		background: #2772DB;
	}
	#colour-variations li a[data-theme="orange"] {
		background: #FF7844;
	}
	#colour-variations li a[data-theme="yellow"] {
		background: #FCDA05;
	}
	#colour-variations li a[data-theme="pink"] {
		background: #F64662;
	}
	#colour-variations li a[data-theme="purple"] {
		background: #7045FF;
	}

	#colour-variations a[data-layout="boxed"],
	#colour-variations a[data-layout="wide"] {
		padding: 2px 0;
		width: 48%;
		border: 1px solid #ededed;
		text-align: center;
		color: #777;
		display: block;
	}
	#colour-variations a[data-layout="boxed"]:hover,
	#colour-variations a[data-layout="wide"]:hover {
		border: 1px solid #777;
	}
	#colour-variations a[data-layout="boxed"] {
		float: left;
	}
	#colour-variations a[data-layout="wide"] {
		float: right;
	}

	.option-toggle {
		position: absolute;
		right: 0;
		top: 0;
		margin-top: 5px;
		margin-right: -30px;
		width: 30px;
		height: 30px;
		background: #8dc63f;
		text-align: center;
		border-top-right-radius: 4px;
		border-bottom-right-radius: 4px;
		color: #fff;
		cursor: pointer;
		-webkit-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
		-moz-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
		-ms-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
		box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
	}
	.option-toggle i {
		top: 2px;
		position: relative;
	}
	.option-toggle:hover, .option-toggle:focus, .option-toggle:active {
		color:  #fff;
		text-decoration: none;
		outline: none;
	}
	</style>
	<!-- End demo purposes only -->


	<!-- Modernizr JS -->
	<script src="<?php echo base_url(); ?>themesfront/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="<?php echo base_url(); ?>themesfront/js/respond.min.js"></script>
	<![endif]-->

	</head>


	<!-- 
		INFO:
		Add 'boxed' class to body element to make the layout as boxed style.
		Example: 
		<body class="boxed">	
	-->
	<body>
	
	<!-- Loader -->
	<div class="fh5co-loader"></div>
	
	<div id="fh5co-page">
		<section id="fh5co-header">
			<div class="container">
				<nav role="navigation">
					<ul class="pull-left left-menu">
						<li><a href="about.html">Jadwal</a></li>
						<li><a href="tour.html">Kelulusan</a></li>
						<li><a href="pricing.html">Berita</a></li>
					</ul>
					<h1 id="fh5co-logo"><a href="index.html">PPBD Jakarta Kota<span>.</span></a></h1>
					<ul class="pull-right right-menu">
						<li><a href="<?php echo site_url('login')?>">Masuk</a></li>
						<li class="fh5co-cta-btn"><a href="#">Daftar</a></li>
					</ul>
				</nav>
			</div>
		</section>
		<!-- #fh5co-header -->

		<section id="fh5co-hero" class="js-fullheight" style="background-image: url(themesfront/images/hero_bg.jpg);" data-next="yes">
			<div class="fh5co-overlay"></div>
			<div class="container">
				<div class="fh5co-intro js-fullheight">
					<div class="fh5co-intro-text">
						<!-- 
							INFO:
							Change the class to 'fh5co-right-position' or 'fh5co-center-position' to change the layout position
							Example:
							<div class="fh5co-right-position">
						-->
						<div class="fh5co-left-position">
							<h2 class="animate-box">Meniti Masa depan Cerah dengan Pendidikan</h2>
							<!-- <p class="animate-box"><a href="https://vimeo.com/channels/staffpicks/93951774" class="btn btn-outline popup-vimeo btn-video"><i class="icon-play2"></i> Watch video</a> <a href="http://freehtml5.co" target="_blank" class="btn btn-primary">Visit FREEHTML5.co</a> -->

							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="fh5co-learn-more animate-box">
				<a href="#" class="scroll-btn">
					<span class="text">Bagaimana ini bekerja</span>
					<span class="arrow"><i class="fa fa-chevron-down"></i></span>
				</a>
			</div>
		</section>
		<!-- END #fh5co-hero -->


		<section id="fh5co-features">
			<div class="container">
				<div class="row text-center row-bottom-padded-md">
					<div class="col-md-8 col-md-offset-2">
						<figure class="fh5co-devices animate-box"><img src="<?php echo base_url(); ?>themesfront/images/img_devices.png" alt="Free HTML5 Bootstrap Template" class="img-responsive"></figure>
						<h2 class="fh5co-lead animate-box">Mari Meniti Masa depan dengan Pendidikan</h2>
						<p class="fh5co-sub-lead animate-box">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows.</p>
					</div>
				</div>
			</div>
		</section>	

		<!-- END #fh5co-features -->


		<section id="fh5co-features-2">
			<div class="container">
				<div class="col-md-4 col-md-push-7">
					<figure class="fh5co-feature-image animate-box">
						<img src="<?php echo base_url(); ?>themesfront/images/macbook.png" alt="Free HTML5 Bootstrap Template by FREEHTML5.co">
					</figure>
				</div>
				<div class="col-md-8 col-md-pull-4">
					<span class="fh5co-label animate-box">Telaah Lebih Jauh</span>
					<h2 class="fh5co-lead animate-box">Bagaimana Mendaftarkan Diri?</h2>
					<div class="fh5co-feature">
						<div class="fh5co-icon animate-box"><i>1</i></div>
						<div class="fh5co-text animate-box">
							<h3>Registrasi</h3>
							<p>Buatlah Akun baru kita anda belum memiliki akun. Registrasi data pribadi anda untuk mendapatkan akun. </p>
						</div>
					</div>
					<div class="fh5co-feature">
						<div class="fh5co-icon animate-box"><i>2</i></div>
						<div class="fh5co-text animate-box">
							<h3>Jadwal Pendaftaran</h3>
							<p>Pendaftaran Siswa Baru akan dibuka sesuai dengan jadwal yang akan ada pada website ini. Isi formulir pendaftaran dan lakukan validasi pembayaran pendaftaran</p>
						</div>
					</div>
					<div class="fh5co-feature">
						<div class="fh5co-icon animate-box"><i>3</i></div>
						<div class="fh5co-text animate-box">
							<h3>Data Akademik</h3>
							<p>Isi dan Unggah data akademik anda, untuk mempermudah kami dalam melihat persyaratan milik anda sebagai calon siswa baru.</p>
						</div>
					</div>

					<div class="fh5co-feature">
						<div class="fh5co-icon animate-box"><i>4</i></div>
						<div class="fh5co-text animate-box">
							<h3>Pengumuman</h3>
							<p>Seletah Data Akademik terlengkapi, anda akan mendapatkan pemberitahuan perihal Jadwal Tes Masuk dan Kelulusan.</p>
						</div>
					</div>

					<div class="fh5co-btn-action animate-box">
						<a href="#" class="btn btn-primary btn-cta">Daftar Sekarang</a>
					</div>

				</div>
			</div>
		</section>
		<!-- END #fh5co-features-2 -->
		
		

		<footer id="fh5co-footer">
			<div class="container">
				<div class="row row-bottom-padded-md">
					<div class="col-md-3 col-sm-6 col-xs-12 animate-box">
						<div class="fh5co-footer-widget">
							<h3>Lembaga</h3>
							<ul class="fh5co-links">
								<li><a href="#">Tentang Kami</a></li>
								<li><a href="#">Visi </a></li>
								<li><a href="#">Karir</a></li>
								<li><a href="#">Tim Kami</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-sm-6 col-xs-12 animate-box">
						<div class="fh5co-footer-widget">
							<h3>Support</h3>
							<ul class="fh5co-links">
								<li>24/7 Call Support</li>
								<li>Tutorial</li>
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-sm-6 col-xs-12 animate-box">
						<div class="fh5co-footer-widget">
							<h3>Hubungi Kami</h3>
							<p>
								<a href="mailto:info@freehtml5.co">info@ciptaalphateknologi.com</a> <br>
								Tiraz Building<br>
								Jl. Ragunan Raya No. 46<br>
								Jakarta Selatan 12540 <br>
								<a href="tel:+62217823282">+62 21 782 3282</a>
							</p>
						</div>
					</div>

					<div class="col-md-3 col-sm-6 col-xs-12 animate-box">
						<div class="fh5co-footer-widget">
							<h3>Ikuti Kami</h3>
							<ul class="fh5co-social">
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>

				</div>
				
			</div>
			<div class="fh5co-copyright animate-box">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="fh5co-left"><small>&copy; 2016 <a href="index.html">Cipta Alpha Teknologi</a>. All Rights Reserved.</small></p>
							<p class="fh5co-right"><small class="fh5co-right">Develop by <a href="http://freehtml5.co" target="_blank">PRINXCODE</a> & <a href="http://unsplash.com" target="_blank">Cipa Alpha Teknologi</a></small></p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- END #fh5co-footer -->
	</div>
	<!-- END #fh5co-page -->
	
	<!-- For demo purposes Only ( You may delete this anytime :-) -->
	<div id="colour-variations">
		<a class="option-toggle"><i class="fa fa-bullhorn"></i></a>
		<h3>Pengumuman</h3>
		<hr>
		PPBD akan segera dibuka
		<hr>
			Sep 2016
	</div>
	<!-- End demo purposes only -->

	
	<!-- jQuery -->
	<script src="<?php echo base_url(); ?>themesfront/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="<?php echo base_url(); ?>themesfront/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url(); ?>themesfront/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="<?php echo base_url(); ?>themesfront/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="<?php echo base_url(); ?>themesfront/js/jquery.flexslider-min.js"></script>
	<!-- Magnific Popup -->
	<script src="<?php echo base_url(); ?>themesfront/js/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo base_url(); ?>themesfront/js/magnific-popup-options.js"></script>

	<!-- For demo purposes only styleswitcher ( You may delete this anytime ) -->
	<script src="<?php echo base_url(); ?>themesfront/js/jquery.style.switcher.js"></script>
	<script>
		$(function(){
			$('#colour-variations ul').styleSwitcher({
				defaultThemeId: 'theme-switch',
				hasPreview: false,
				cookie: {
		          	expires: 30,
		          	isManagingLoad: true
		      	}
			});	
			$('.option-toggle').click(function() {
				$('#colour-variations').toggleClass('sleep');
			});
		});
	</script>
	<!-- End demo purposes only -->

	<!-- Main JS (Do not remove) -->
	<script src="<?php echo base_url(); ?>themesfront/js/main.js"></script>

	<!-- 
	INFO:
	jQuery Cookie for Demo Purposes Only. 
	The code below is to toggle the layout to boxed or wide 
	-->
	<script src="<?php echo base_url(); ?>themesfront/js/jquery.cookie.js"></script>
	<script>
		$(function(){

			if ( $.cookie('layoutCookie') != '' ) {
				$('body').addClass($.cookie('layoutCookie'));
			}

			$('a[data-layout="boxed"]').click(function(event){
				event.preventDefault();
				$.cookie('layoutCookie', 'boxed', { expires: 7, path: '/'});
				$('body').addClass($.cookie('layoutCookie')); // the value is boxed.
			});

			$('a[data-layout="wide"]').click(function(event){
				event.preventDefault();
				$('body').removeClass($.cookie('layoutCookie')); // the value is boxed.
				$.removeCookie('layoutCookie', { path: '/' }); // remove the value of our cookie 'layoutCookie'
			});
		});
	</script>
	

	</body>
</html>

