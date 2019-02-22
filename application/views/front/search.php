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
<div class="col-md-9 col-sm-7">
            <div class="content-search margin-bottom-20">
              <div class="row">
                <div class="col-md-6">
                  <!--<h1>Search result for <em>shoes</em></h1> -->
                </div>
                <div class="col-md-6">
					<form action="<?php echo base_url().'shop/search' ?>" method='post'>
                    <div class="input-group">
                      <input placeholder="Search" class="form-control" type="text" name='search'>
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">Search</button>
                      </span>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="row list-view-sorting clearfix">
              <div class="col-md-2 col-sm-2 list-view">
                <a href="#"><i class="fa fa-th-large"></i></a>
                <a href="#"><i class="fa fa-th-list"></i></a>
              </div>
            </div>
            <!-- BEGIN PRODUCT LIST -->
            <div class="row product-list">
              <!-- PRODUCT ITEM START -->
			  <?php 
				$q = $this->db->query("SELECT * FROM produk WHERE name LIKE '%".$this->uri->segment(3)."%'");
				if($q->num_rows() != 0){
				foreach($q->result() as $r){
			  ?>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="<?php echo base_url().'assets/foto/'.$r->pict; ?>" class="img-responsive" alt="<?php echo $r->name; ?>">
                    <div>
                      <a href="<?php echo base_url().'assets/foto/'.$r->pict; ?>" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" id='a' halaman="<?php echo base_url().'shop/produk/'.$r->id; ?>" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="<?php echo base_url().'shop/detail/'.$r->id; ?>"><?php echo $r->name; ?></a></h3>
                  <div class="pi-price">Rp. <?php echo number_format($r->price); ?></div>
                  <a id='addcart' href="<?php echo base_url().'shop/cart/add/'.$r->id; ?>" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
			  <?php
				} }else{
					echo "Product Not Found :(";
				}
			  ?>
              <!-- PRODUCT ITEM END -->
              <!-- PRODUCT ITEM START -->
             </div>
            <!-- END PRODUCT LIST -->
            <!-- BEGIN PAGINATOR -->
            <!-- END PAGINATOR -->
          </div>
          </div>
          </div>
		  
    <div id="product-pop-up" style="display: none; width: 700px;">
            <div class="product-page product-pop-up" id='detail'>
            </div>
    </div>