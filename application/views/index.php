<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.1.1
Version: 3.0.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>Cheerful Pet Shop | Online Shop</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="favicon.ico">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->  
  <!-- Fonts END -->

  <script src='<?php echo base_url(); ?>assets/js/jquery-1.8.2.js'></script>
  <!-- Global styles START -->          
  <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="<?php echo base_url(); ?>assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/global/plugins/slider-layer-slider/css/layerslider.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="<?php echo base_url(); ?>assets/global/css/components.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/frontend/layout/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/frontend/pages/css/style-shop.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/frontend/pages/css/style-layer-slider.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="<?php echo base_url(); ?>assets/frontend/layout/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->
</head>
<!-- Head END -->
<script>
	$(function(){
		$('#cart').load("<?php echo base_url(); ?>shop/cart/ajax");
		$('a#addcart').click(function(){	
			$.ajax({url:$(this).attr('href'),
				success:function(w){
					$('#pesan').stop().fadeIn().delay('2000').fadeOut();
					$('#cart').load("<?php echo base_url(); ?>shop/cart/ajax");
				}
			});
			return( false );
		});
	});
</script>
<!-- Body BEGIN -->
<body class="ecommerce">
<div id='pesan' style='position:fixed;z-index:99999999;width:100%;display:none;'><div class="alert alert-success"><span>Barang berhasil ditambahkan. </span></div></div>
    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span>+62 456 6717</span></li>
                        <!-- BEGIN CURRENCIES -->
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
                        <li><a href="<?php echo base_url() ?>shop/report">Report</a></li>
                        <li><a href="<?php echo base_url() ?>shop/mycart">My Cart</a></li>
                        <li><a href="<?php echo base_url() ?>shop/checkout">Check Out</a></li>
						<?php if($this->session->userdata('logins') == ''){ ?>
                        <li><a href="<?php echo base_url() ?>shop/login">Log In</a></li>
						<?php }else{ ?>
                        <li><a href="<?php echo base_url().'shop/logout/'.$this->uri->segment(2).'/'.$this->uri->segment(3); ?>">Log Out</a></li>
						<?php } ?>
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->

    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>assets/frontend/layout/img/logos/logo-shop-red.png" alt="Metronic Shop UI"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN CART -->
        <div class="top-cart-block" id='cart'>           
        </div>
        <!--END CART -->

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
		
          <ul>
            <li><a href="<?php echo base_url().'shop/'?>">Home</a></li>
            <li><a href="<?php echo base_url().'shop/product/'?>">Product</a></li>
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="<?php echo base_url().'shop/search' ?>" method='post'>
                  <div class="input-group">
                    <input placeholder="Search" name='search' class="form-control" type="text">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                  </div>
                </form>
              </div> 
            </li>
          </ul>
		  
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->
	<?php 
		if($this->uri->segment(2) == ''){
			$this->load->view('front/slider');
		}
	?>
    <div class="main">
      <div class="container">
        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
		<?php 
			if($this->uri->segment(2) == ''){
		?>
        <div class="row margin-bottom-40">
          <!-- BEGIN SALE PRODUCT -->
          <div class="col-md-12 sale-product">
            <h2>New Arrivals</h2>
            <div class="owl-carousel owl-carousel5">
			  <?php 
				$q = $this->db->query("SELECT * FROM produk LIMIT 0,10");
				foreach($q->result() as $r){
			  ?>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img style='height:200px' src="<?php echo base_url().'assets/foto/'.$r->pict; ?>" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="<?php echo base_url().'assets/foto/'.$r->pict; ?>" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" id='a' halaman="<?php echo base_url().'shop/produk/'.$r->id; ?>" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="<?php echo base_url().'shop/detail/'.$r->id; ?>"><?php echo substr($r->name,0,23); ?></a></h3>
                  <div class="pi-price">Rp. <?php echo number_format($r->price); ?></div>
                  <a id='addcart' href="<?php echo base_url().'shop/cart/add/'.$r->id; ?>" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
			  <?php } ?>
            </div>
          </div>
          <!-- END SALE PRODUCT -->
        </div>
	  <?php } ?>
        <!-- END SALE PRODUCT & NEW ARRIVALS -->

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40 ">
          <!-- BEGIN SIDEBAR -->
		  <?php 
			if($this->uri->segment(2) == 'login' || $this->uri->segment(2) == 'checkout' || $this->uri->segment(2) == 'mycart' || $this->uri->segment(2) == 'register'){}
			else{
		  ?>
          <div class="sidebar col-md-3 col-sm-4">
			<h2>Category</h2>
            <ul class="list-group margin-bottom-25 sidebar-menu">
				<?php
					$q = $this->db->get_where("category")->result();
					foreach($q as $r){
				?>
				<li class="list-group-item clearfix"><a href="<?php echo base_url().'shop/category/'.$r->id_category ?>"><i class="fa fa-angle-right"></i> <?php echo $r->name_cat; ?></a></li>
				<?php } ?>
            </ul>
			<h2>Brand</h2>
            <ul class="list-group margin-bottom-25 sidebar-menu">
				<?php
					$q = $this->db->get_where("brand")->result();
					foreach($q as $r){
				?>
				<li class="list-group-item clearfix"><a href="<?php echo base_url().'shop/brand/'.$r->id_brand ?>"><i class="fa fa-angle-right"></i> <?php echo $r->name_brand; ?></a></li>
				<?php } ?>
            </ul>
          </div>
          <!-- END SIDEBAR -->
	<?php }
		if($this->uri->segment(2) == ''){
			$this->load->view('front/home.php');
		}else if($this->uri->segment(2) == 'detail'){
			$this->load->view('front/detail.php');
		}else if($this->uri->segment(2) == 'category_head'){
			$this->load->view('front/list.php');
		}else if($this->uri->segment(2) == 'category'){
			$this->load->view('front/list.php');
		}else if($this->uri->segment(2) == 'search'){
			$this->load->view('front/search.php');
		}else if($this->uri->segment(2) == 'product'){
			$this->load->view('front/list.php');
		}else{
			$this->load->view('front/'.$this->uri->segment(2));
		}
	?>
    <!-- BEGIN BRANDS -->
    <div class="brands">
      <div class="container">
            <div class="owl-carousel owl-carousel6-brands">
              <a href="#"><img src="<?php echo base_url(); ?>assets/frontend/pages/img/brands/canon.jpg" alt="canon" title="canon"></a>
              <a href="#"><img src="<?php echo base_url(); ?>assets/frontend/pages/img/brands/esprit.jpg" alt="esprit" title="esprit"></a>
              <a href="#"><img src="<?php echo base_url(); ?>assets/frontend/pages/img/brands/gap.jpg" alt="gap" title="gap"></a>
              <a href="#"><img src="<?php echo base_url(); ?>assets/frontend/pages/img/brands/next.jpg" alt="next" title="next"></a>
              <a href="#"><img src="<?php echo base_url(); ?>assets/frontend/pages/img/brands/puma.jpg" alt="puma" title="puma"></a>
              <a href="#"><img src="<?php echo base_url(); ?>assets/frontend/pages/img/brands/zara.jpg" alt="zara" title="zara"></a>
              <a href="#"><img src="<?php echo base_url(); ?>assets/frontend/pages/img/brands/canon.jpg" alt="canon" title="canon"></a>
              <a href="#"><img src="<?php echo base_url(); ?>assets/frontend/pages/img/brands/esprit.jpg" alt="esprit" title="esprit"></a>
              <a href="#"><img src="<?php echo base_url(); ?>assets/frontend/pages/img/brands/gap.jpg" alt="gap" title="gap"></a>
              <a href="#"><img src="<?php echo base_url(); ?>assets/frontend/pages/img/brands/next.jpg" alt="next" title="next"></a>
              <a href="#"><img src="<?php echo base_url(); ?>assets/frontend/pages/img/brands/puma.jpg" alt="puma" title="puma"></a>
              <a href="#"><img src="<?php echo base_url(); ?>assets/frontend/pages/img/brands/zara.jpg" alt="zara" title="zara"></a>
            </div>
        </div>
    </div>
    <!-- END BRANDS -->

    <!-- BEGIN STEPS -->
    <div class="steps-block steps-block-red">
      <div class="container">
        <div class="row">
          <div class="col-md-4 steps-block-col">
            <i class="fa fa-truck"></i>
            <div>
              <h2>Free shipping</h2>
              <em>For jabodetabek area</em>
            </div>
            <span>&nbsp;</span>
          </div>
          <div class="col-md-4 steps-block-col">
            <i class="fa fa-gift"></i>
            <div>
              <h2>Daily Gifts</h2>
              <em>3 Gifts daily for lucky customers</em>
            </div>
            <span>&nbsp;</span>
          </div>
          <div class="col-md-4 steps-block-col">
            <i class="fa fa-phone"></i>
            <div>
              <h2>+62 456 6717</h2>
              <em>24/7 customer care available</em>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END STEPS -->

    <!-- BEGIN PRE-FOOTER -->
    <div class="pre-footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN BOTTOM ABOUT BLOCK -->
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2>About us</h2>
            <p>Kami adalah toko sepatu yang mengutamakan kepuasan pengunjung, sesuai dengan moto kami "Kepuasan pengunjung adalah kebahagiaan kami" </p>
            <p>Semua sepatu yang dijual disini semua asli 100% karena kami ambil dari seller terbaik, bila terbukti kw uang anda kembali 100%.</p>
          </div>
          <!-- END BOTTOM ABOUT BLOCK -->
          <!-- BEGIN BOTTOM INFO BLOCK -->
          <div class="col-md-2 col-sm-6 pre-footer-col">
          </div>
          <!-- END INFO BLOCK -->

          <!-- BEGIN BOTTOM CONTACTS -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>Our Contacts</h2>
            <address class="margin-bottom-40">
              JL Margonda raya, Depok<br>
              Jawa Barat, Indonesia<br>
              Phone: 300 323 3456<br>
              Fax: 300 323 1456<br>
              Email: <a href="#">info@SuperShop.com</a><br>
            </address>
          </div>
          <!-- END BOTTOM CONTACTS -->
        </div>
        <hr>
        <div class="row">
          <!-- BEGIN SOCIAL ICONS -->
          <div class="col-md-6 col-sm-6">
            <ul class="social-icons">
              <li><a class="rss" data-original-title="rss" href="#"></a></li>
              <li><a class="facebook" data-original-title="facebook" href="#"></a></li>
              <li><a class="twitter" data-original-title="twitter" href="#"></a></li>
              <li><a class="googleplus" data-original-title="googleplus" href="#"></a></li>
              <li><a class="linkedin" data-original-title="linkedin" href="#"></a></li>
              <li><a class="youtube" data-original-title="youtube" href="#"></a></li>
              <li><a class="vimeo" data-original-title="vimeo" href="#"></a></li>
              <li><a class="skype" data-original-title="skype" href="#"></a></li>
            </ul>
          </div>
          <!-- END SOCIAL ICONS -->
          <!-- BEGIN NEWLETTER -->
          <div class="col-md-6 col-sm-6"><br><br>&nbsp;
          </div>
          <!-- END NEWLETTER -->
        </div>
      </div>
    </div>
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN COPYRIGHT -->
          <div class="col-md-6 col-sm-6 padding-top-10">
            2016 © SupperShop. ALL Rights Reserved. 
          </div>
          <!-- END COPYRIGHT -->
          <!-- BEGIN PAYMENTS -->
          <div class="col-md-6 col-sm-6">
            <ul class="list-unstyled list-inline pull-right">
              <li><img src="<?php echo base_url(); ?>assets/frontend/layout/img/payments/western-union.jpg" alt="We accept Western Union" title="We accept Western Union"></li>
              <li><img src="<?php echo base_url(); ?>assets/frontend/layout/img/payments/american-express.jpg" alt="We accept American Express" title="We accept American Express"></li>
              <li><img src="<?php echo base_url(); ?>assets/frontend/layout/img/payments/MasterCard.jpg" alt="We accept MasterCard" title="We accept MasterCard"></li>
              <li><img src="<?php echo base_url(); ?>assets/frontend/layout/img/payments/PayPal.jpg" alt="We accept PayPal" title="We accept PayPal"></li>
              <li><img src="<?php echo base_url(); ?>assets/frontend/layout/img/payments/visa.jpg" alt="We accept Visa" title="We accept Visa"></li>
            </ul>
          </div>
          <!-- END PAYMENTS -->
        </div>
      </div>
    </div>
    <!-- END FOOTER -->

    <!-- BEGIN fast view of a product -->
    <!-- END fast view of a product -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>  
    <![endif]-->
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="<?php echo base_url(); ?>assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="<?php echo base_url(); ?>assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="<?php echo base_url(); ?>assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
    <script src='<?php echo base_url(); ?>assets/global/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->
    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->

    <!-- BEGIN LayerSlider -->
    <script src="<?php echo base_url(); ?>assets/global/plugins/slider-layer-slider/js/greensock.js" type="text/javascript"></script><!-- External libraries: GreenSock -->
    <script src="<?php echo base_url(); ?>assets/global/plugins/slider-layer-slider/js/layerslider.transitions.js" type="text/javascript"></script><!-- LayerSlider script files -->
    <script src="<?php echo base_url(); ?>assets/global/plugins/slider-layer-slider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script><!-- LayerSlider script files -->
    <script src="<?php echo base_url(); ?>assets/frontend/pages/scripts/layerslider-init.js" type="text/javascript"></script>
    <!-- END LayerSlider -->

    <script src="<?php echo base_url(); ?>assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            LayersliderInit.initLayerSlider();
            Layout.initImageZoom();
            Layout.initTouchspin();
            Layout.initTwitter();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>