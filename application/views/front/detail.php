<?php

	$d = $this->db->get_where('produk',array("id"=>$this->uri->segment(3)))->row();
	
	$data = array('view' => $d->view+1);
	$this->db->where('id',$d->id);
	$update = $this->db->update('produk',$data);
	
	$review = $this->db->get_where("review",array('id_produk'=>$d->id));
	$num = $review->num_rows();
?>
<script type="text/javascript">
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
<div class="col-md-9 col-sm-7">
            <div class="product-page">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <div style="position: relative; overflow: hidden;" class="product-main-image">
                    <img src="<?php echo base_url().'assets/foto/'.$d->pict; ?>" alt="Cool green dress with red bell" class="img-responsive">
                  <img style="position: absolute; top: -266.645px; left: -217.429px; width: 600px; height: 800px; border: medium none; max-width: none; opacity: 0;" class="zoomImg" src=" src="<?php echo base_url().'assets/foto/'.$d->pict; ?>""></div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <h1><?php echo $d->name; ?></h1>
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
                  <div class="product-page-cart">
                    <a id='addcart' href="<?php echo base_url().'shop/cart/add/'.$d->id; ?>" class="btn btn-primary">Add to cart</a>
                  </div>
                  <div class="review">
                    <input style="display: none;" value="4" step="0.25" id="backing4" type="range">
                    <div class="rateit" data-rateit-backingfld="#backing4" data-rateit-resetable="false" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                    <button style="display: none;" id="rateit-reset-2" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-2"></button><div aria-readonly="false" style="width: 80px; height: 16px;" id="rateit-range-2" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-2" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4"><div class="rateit-selected rateit-preset" style="height: 16px; width: 64px;"></div><div class="rateit-hover" style="height: 16px;"></div></div></div>
                    <a href="#"><?php echo $num ?> reviews</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#review">Write a review</a>
                  </div>
                </div>

                <div class="product-page-content">
                  <ul id="myTab" class="nav nav-tabs">
                    <li class="active"><a href="#Reviews" data-toggle="tab">Reviews (<?php echo $num ?>)</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="Reviews">
                      <!--<p>There are no reviews for this product.</p>-->
					  <?php 
						if($num == 0){
							echo "No review";
						}else{
							foreach($review->result() as $row){
								$u = $this->db->get_where('user',array('id'=>$row->id_user))->row();
					  ?>
                      <div class="review-item clearfix">
                        <div class="review-item-submitted">
                          <strong><?php echo $u->name; ?></strong>
                          <em><?php echo $row->tanggal; ?></em>
                        </div>                                              
                        <div class="review-item-content">
                            <p><?php echo $row->review; ?></p>
                        </div>
                      </div>
					  <?php 
						}}
						if($this->session->userdata('logins') == true){
					  ?>
                      <!-- BEGIN FORM-->
                      <form action="<?php echo base_url().'shop/review/'.$this->uri->segment(3); ?>" method="post" class="reviews-form" role="form" id="review">
                        <h2>Write a review</h2>
                        <div class="form-group">
                          <label for="review">Review <span class="require">*</span></label>
                          <textarea name="review" class="form-control" rows="8" id="review"></textarea>
                        </div>
                        <div class="padding-top-20">                  
                          <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                      </form>
					  <?php }else{ ?><hr>
					  <h2>Login For Review</h2>
					  <div class="col-md-7 col-sm-7">
                  <form class="form-horizontal form-without-legend" role="form" method='post' action='<?php echo base_url().'shop/validasi/detail/'.$this->uri->segment(3); ?>'>
                    <div class="form-group">
                      <label for="email" class="col-lg-4 control-label">Username <span class="require">*</span></label>
                      <div class="col-lg-8">
                        <input class="form-control" id="email" type="text" name='username'>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>
                      <div class="col-lg-8">
                        <input class="form-control" id="password" type="text" name='password'>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                        <button type="submit" class="btn btn-primary">Login</button>
                      </div>
                    </div>
                  </form>
                </div>
					  <?php } ?>
                      <!-- END FORM--> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          </div>