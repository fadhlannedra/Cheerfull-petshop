<?php
	$d = $this->db->get_where('produk',array("id"=>$this->uri->segment(3)))->row();
?>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.initTouchspin();
            Layout.initImageZoom();
        });
		$(function(){
			$('a#addcart').click(function(){	
				$.ajax({url:$(this).attr('href'),
					success:function(w){
						$('#cart').load("<?php echo base_url(); ?>shop/cart/ajax");
						alert('Item berhasil ditambahkan');
					}
				});
				return( false );
			});
		});
    </script>
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-3">
                  <div class="product-main-image">
                    <img src="<?php echo base_url().'assets/foto/'.$d->pict; ?>" alt="Cool green dress with red bell" class="img-responsive">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-9">
                  <h2><?php echo $d->name; ?></h2>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span>Rp </span><?php echo number_format($d->price); ?></strong>
                    </div>
                    <div class="availability">
                      Availability: <strong>In Stock</strong>
                    </div>
                  </div>
                  <div class="description">
                    <p><?php echo $d->description; ?></p>
                  </div>
                  <div class="product-page-options">
                  </div>
                  <div class="product-page-cart">
                    <a id='addcart' href="<?php echo base_url().'shop/cart/add/'.$d->id; ?>" class="btn btn-primary">Add to cart</a>
                    <a href="<?php echo base_url().'shop/detail/'.$d->id; ?>" class="btn btn-default">More details</a>
                  </div>
                </div>

                <div class="sticker sticker-sale"></div>
              </div>