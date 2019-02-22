<?php
	$no = 0;
	$total = 0;
	if(isset($_SESSION['cart'])){
		foreach($_SESSION['cart'] as $key => $val){
			$no = $no + 1;
			$q = $this->db->get_where('produk',array('id'=>$key))->row();
			$total = $total + $q->price;
		}
	}
	$q = $this->db->get_where('user',array('id'=>$this->session->userdata('ids')))->row();
?>
<div class="col-md-12 col-sm-12">
            <h1>Checkout</h1>
            <!-- BEGIN CHECKOUT PAGE -->
			<form action='<?php echo base_url().'shop/beli' ?>' method='post'>
            <div class="panel-group checkout-page accordion scrollable" id="checkout-page">

              <!-- BEGIN PAYMENT ADDRESS -->
              <div id="payment-address" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-address-content" class="accordion-toggle collapsed">
                      Step 1: Account &amp; Billing Details
                    </a>
                  </h2>
                </div>
                <div id="payment-address-content" class="panel-collapse collapse in">
                  <div class="panel-body row">
                    <div class="col-md-6 col-sm-6">
                      <h3>Your Personal Details</h3>
                      <div class="form-group">
                        <label for="firstname">Name <span class="require">*</span></label>
                        <input id="firstname" class="form-control" type="text" value='<?php echo $q->name; ?>' name='name' readonly>
                      </div>
                      <div class="form-group">
                        <label for="email">E-Mail <span class="require">*</span></label>
                        <input id="email" class="form-control" type="text" value='<?php echo $q->email; ?>' name='email' readonly>
                      </div>
                      <div class="form-group">
                        <label for="telephone">Telephone <span class="require">*</span></label>
                        <input id="telephone" class="form-control" type="text" value='<?php echo $q->telephone; ?>' name='telephone' readonly>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <h3>Your Address</h3>
                      <div class="form-group">
                        <label for="city">City <span class="require">*</span></label>
                        <input id="city" class="form-control" type="text" value='<?php echo $q->city; ?>' name='city' readonly>
                      </div>
                      <div class="form-group">
                        <label for="post-code">Post Code <span class="require">*</span></label>
                        <input id="post-code" class="form-control" type="text" value='<?php echo $q->postcode; ?>' name='postcode' readonly>
                      </div>
                      <div class="form-group">
                        <label for="address2">Address</label>
                        <textarea id="address2" class="form-control"  name='address'><?php echo $q->address; ?></textarea>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <h3>Leave your message</h3>
                      <div class="form-group">
                        <textarea id="address2" class="form-control"  name='description'></textarea>
                      </div>
                    </div>
                    <hr>
                    <div class="col-md-12">                      
                      <div class="checkbox">
                      </div>
                      <div class="checkbox">
                      </div>
					  <a class="btn btn-primary  pull-right collapsed" data-toggle="collapse" data-parent="#checkout-page" data-target="#confirm-content" id="button-payment-address" style='color:white'>Continue</a>
					  <div class="checkbox pull-right">
                        <label>
                          <div class="checker"><span><input type="checkbox"></span></div> I have read and agree to the Privacy Policy &nbsp;&nbsp;&nbsp; 
                        </label>
                      </div>                        
                    </div>
                  </div>
                </div>
              </div>
              <!-- END PAYMENT ADDRESS -->

              <!-- BEGIN CONFIRM -->
              <div id="confirm" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#checkout-page" href="#confirm-content" class="accordion-toggle collapsed">
                      Step 2: Confirm Order
                    </a>
                  </h2>
                </div>
                <div id="confirm-content" class="panel-collapse collapse">
                  <div class="panel-body row goods-page">
                    <div class="goods-data col-md-12 clearfix">
						<div class="table-wrapper-responsive">
						<table>
						<?php if($no!=0){ ?>
						  <tbody><tr>
							<th class="goods-page-image">Image</th>
							<th class="goods-page-description" width='50%'>Description</th>
							<th class="goods-page-quantity">Quantity</th>
							<th class="goods-page-total" colspan="2">Total</th>
						  </tr>
							<?php
								foreach($_SESSION['cart'] as $key => $val){
									$q = $this->db->get_where('produk',array('id'=>$key))->row();
							?>
						  <tr>
							<td class="goods-page-image">
							  <a href="#"><img src="<?php echo base_url().'assets/foto/'.$q->pict; ?>" alt="<?php echo $q->name ?>"></a>
							</td>
							<td class="goods-page-description">
							  <h3><a href="<?php echo base_url().'shop/detail/'.$q->id; ?>"><?php echo $q->name ?></a></h3>
							  <p><strong>Item <?php echo $no ?></strong></p>
							  <em>More info is here</em>
							</td>
							<td class="goods-page-quantity">
								  <input style="display: block;" value="1" readonly="" class="form-control input-xsmall" type="text">
							</td>
							<td class="goods-page-total">
							  <strong><span>Rp. </span><?php echo number_format($q->price) ?></strong>
							</td>
							<td class="del-goods-col">
							  <a class="del-goods" id='deletecart' href="<?php echo base_url().'shop/cart/delete/'.$q->id.'/y'; ?>">&nbsp;</a>
							</td>
						  </tr>
						<?php }} ?>
						</tbody></table>
						</div>
						<?php
							if($no!=0){
						?>
						<div class="shopping-total">
						  <ul>
							<li>
							  <em>Sub total</em>
							  <strong class="price"><span>Rp. </span><?php echo number_format($total) ?></strong>
							</li>
							<li>
							  <em>Shipping cost</em>
							  <strong class="price"><span>Rp. </span>50,000</strong>
							</li>
							<li class="shopping-total-price">
							  <em>Total</em>
							  <strong class="price"><span>Rp. </span><?php echo number_format($total+50000) ?></strong>
							</li>
						  </ul>
						</div>
					  </div>
					  <a href='<?php echo base_url();?>' class="btn btn-default" >Continue shopping <i class="fa fa-shopping-cart"></i></a>
					  <button style='color:white;' type='submit' class="btn btn-primary" >Checkout <i class="fa fa-check"></i></a>
						<?php }else{ ?>
							Cart Empty :(
						<?php } ?>
                    </div>
                  </div>
                </div>
              </div>
			  </form>
              <!-- END CONFIRM -->
            </div>
            <!-- END CHECKOUT PAGE -->
          </div>
          </div>
          </div>