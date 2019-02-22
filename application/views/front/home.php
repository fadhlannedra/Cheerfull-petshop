<script>
	$(function(){
		$('a#a').click(function(){
			$.ajax({url:$(this).attr('halaman'),
				success:function(w){
					$('#detail').html(w);
				}
			});
		});
	});
</script>
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-8">
            <h2>Popular Items</h2>
            <div class="owl-carousel owl-carousel3">
			  <?php 
				$q = $this->db->query("SELECT * FROM produk ORDER BY sold DESC LIMIT 0,10");
				foreach($q->result() as $r){
			  ?>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img style='height:300px' src="<?php echo base_url().'assets/foto/'.$r->pict; ?>" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="<?php echo base_url().'assets/foto/'.$r->pict; ?>" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" id='a' halaman="<?php echo base_url().'shop/produk/'.$r->id; ?>" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="<?php echo base_url().'shop/detail/'.$r->id; ?>"><?php echo substr($r->name,0,30); ?></a></h3>
                  <div class="pi-price">Rp. <?php echo number_format($r->price); ?></div>
                  <a id='addcart' href="<?php echo base_url().'shop/cart/add/'.$r->id; ?>" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
			  <?php } ?>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>

    <div id="product-pop-up" style="display: none; width: 700px;">
            <div class="product-page product-pop-up" id='detail'>
            </div>
    </div>