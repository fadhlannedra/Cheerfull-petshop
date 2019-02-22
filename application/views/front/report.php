<?php 
	if($this->session->userdata('logins') == false){
		echo "<script>location='".base_url()."shop/login'</script>";
	}
?>
<div class="col-md-9 col-sm-12">
	<h1>Shopping report</h1>
	<div class="goods-page">
	  <?php 
		if($this->uri->segment(3) == "detail"){
	  ?>
	<?php
		$total = 0;
		$que = $this->db->get_where('orders',array('id_order'=>$this->uri->segment(4)))->row();
		$qu = $this->db->get_where('order_produk',array('id_order'=>$this->uri->segment(4)))->result();
		$q = $this->db->get_where('user',array('id'=>$this->session->userdata('ids')))->row();
	?>
	<div class="panel-group checkout-page accordion scrollable" id="checkout-page">

	  <!-- BEGIN PAYMENT ADDRESS -->
	  <div id="payment-address" class="panel panel-default">
		<div id="payment-address-content" class="panel-collapse collapse in">
		  <div class="panel-body row">
			<a class="btn btn-primary" href="<?php echo base_url().'shop/report' ?>" style='float:left;color:white'>< Back</a>
		  </div>
		  <div class="panel-body row">
			<div class="col-md-6 col-sm-6">
			  <h3>Personal Details</h3>
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
			  <h3>Address</h3>
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
				<textarea readonly id="address2" class="form-control"  name='address'><?php echo $que->address; ?></textarea>
			  </div>
			</div>
			<div class="col-md-6 col-sm-6">
			  <h3>Message</h3>
			  <div class="form-group">
				<?php echo $que->description; ?>
			  </div>
			</div>
			<div class="col-md-6 col-sm-6">
			  <h3>Status</h3>
			  <div class="form-group">
				<?php					
					if($que->status == 1){
						echo '<span class="label label-warning">Shipping</span>';
					}else if($que->status == 0){
						echo '<span class="label label-danger">Order</span>';
					}else if($que->status == 2){
						echo '<span class="label label-success">Done</span>';
					}
				?>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  <!-- END PAYMENT ADDRESS -->

	  <!-- BEGIN CONFIRM -->
	  <div id="confirm" class="panel panel-default">
		<div id="confirm-content" class="panel-collapse collapse in">
		  <div class="panel-body row goods-page">
			<div class="goods-data col-md-12 clearfix">
				<div class="table-wrapper-responsive">
				<table>
				  <tbody><tr>
					<th class="goods-page-image">Image</th>
					<th class="goods-page-description" width='50%'>Description</th>
					<th class="goods-page-quantity">Quantity</th>
					<th class="goods-page-total" colspan="2">Total</th>
				  </tr>
					<?php
						foreach($qu as $key){
							$q = $this->db->get_where('produk',array('id'=>$key->id_produk))->row();
							$total = $total + $q->price;
					?>
				  <tr>
					<td class="goods-page-image">
					  <a href="#"><img src="<?php echo base_url().'assets/foto/'.$q->pict; ?>" alt="<?php echo $q->name ?>"></a>
					</td>
					<td class="goods-page-description">
					  <h3><a href="<?php echo base_url().'shop/detail/'.$q->id; ?>"><?php echo $q->name ?></a></h3>
					</td>
					<td class="goods-page-quantity">
						  <input style="display: block;" value="1" readonly="" class="form-control input-xsmall" type="text">
					</td>
					<td class="goods-page-total">
					  <strong><span>Rp. </span><?php echo number_format($q->price) ?></strong>
					</td>
				  </tr>
				<?php } ?>
				</tbody></table>
				</div>
				<div class="shopping-total">
				  <ul>
					<li>
					  <em>Sub total</em>
					  <strong class="price"><span>Rp. </span><?php echo number_format($total) ?></strong>
					</li>
					<li>
					  <em>Shipping</em>
					  <strong class="price"><span>Rp. </span>50,000</strong>
					</li>
					<li class="shopping-total-price">
					  <em>Total</em>
					  <strong class="price"><span>Rp. </span><?php echo number_format($total+50000) ?></strong>
					</li>
				  </ul>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  <!-- END CONFIRM -->
	</div>
		<?php 
			}else{ 
		?>
	  <div class="goods-data clearfix">
		<div class="table-wrapper-responsive">
		<table summary="Shopping cart">
		  <tbody><tr>
			<th>No</th>
			<th>ID Order</th>
			<th>Date</th>
			<th>Status</th>
			<th colspan=2>Action</th>
		  </tr>
			<?php 
				$no = 1;
				$q = $this->db->get_where('orders',array('id_user'=>$this->session->userdata['ids']))->result();
				foreach($q as $key){
			?>
		  <tr>
			<td><?php echo $no;?></td>
			<td><?php echo $key->id_order;?></td>
			<td><?php echo $key->date;?></td>
			<td><?php 
				if($key->status == 1){
					echo '<span class="label label-warning">Shipping</span>';
				}else if($key->status == 0){
					echo '<span class="label label-danger">Order</span>';
				}else if($key->status == 2){
					echo '<span class="label label-success">Done</span>';
				}
			?></td>
			<td width=10><a href="<?php echo base_url().'shop/report/detail/'.$key->id_order ?>" class="btn btn-warning" style='color:white'>Detail</a></td>
			<td width=10><a onClick="return confirm('Apakah Anda Yakin ?')" href="<?php echo base_url().'shop/report/delete/'.$key->id_order ?>" class="btn btn-danger" style='color:white'>Delete</a></td>
		  </tr>
		<?php $no++;} ?>
		</tbody></table>
		</div>
	</div>
	<?php } ?>
  </div>
</div>
</div>