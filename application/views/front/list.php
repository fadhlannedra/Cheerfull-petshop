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
			if($this->uri->segment(2) == 'brand'){
				$q = $this->db->get_where('brand',array('brand_id'=>$this->uri->segment(3)))->result();
			}else if($this->uri->segment(2) == 'category'){
				$q = $this->db->get_where('category',array('id_category'=>$this->uri->segment(3)))->result();
			}else if($this->uri->segment(2) == 'product'){
				$q = $this->db->get('produk')->result();
			}
			foreach($q as $ro){
				if($this->uri->segment(2) == 'brand'){
					$qu = $this->db->get_where('brand',array('id_brand'=>$ro->id_brand))->result();
				}else if($this->uri->segment(2) == 'category'){
					$qu = $this->db->get_where('produk',array('id_category'=>$ro->id_category))->result();
				}else if($this->uri->segment(2) == 'product'){
					$qu = $this->db->get_where('produk',array('id'=>$ro->id))->result();
				}
				foreach($qu as $r){
		  ?>
		  <div class="col-md-4 col-sm-6 col-xs-12">
			<div class="product-item">
			  <div class="pi-img-wrapper">
				<img src="<?php echo base_url().'assets/foto/'.$r->pict; ?>" height="200px"  width="240px" alt="<?php echo $r->name; ?>">
				<div>
				  <a href="<?php echo base_url().'assets/foto/'.$r->pict; ?>" class="btn btn-default fancybox-button">Zoom</a>
				  <a href="#product-pop-up" id='a' halaman="<?php echo base_url().'shop/produk/'.$r->id; ?>" class="btn btn-default fancybox-fast-view">View</a>
				</div>
			  </div>
			  <h3><a href="<?php echo base_url().'shop/detail/'.$r->id; ?>"><?php echo substr($r->name,0,26); ?></a></h3>
			  <div class="pi-price">Rp. <?php echo number_format($r->price); ?></div>
			  <a id='addcart' href="<?php echo base_url().'shop/cart/add/'.$r->id; ?>" class="btn btn-default add2cart">Add to cart</a>
			</div>
		  </div>
		  <?php
				}
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