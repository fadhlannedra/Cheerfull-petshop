<?php 
	if($this->uri->segment(3) == "add" || $this->uri->segment(3) == "edit"){ 
		if($this->uri->segment(3) == "add"){
			$field = array('id_category','name_cat','description','category');
			foreach($field as $val){
				$row[$val] = '';
			}
			$url = base_url()."admin/category/tambah";
		}else{
			$qu = $this->db->get_where('orders',array('id_order'=>$this->uri->segment(4)))->row_array();
			$que = $this->db->get_where('order_produk',array('id_order'=>$qu['id_order']))->result();
			$user = $this->db->get_where('user',array('id'=>$qu['id_user']))->row_array();
			$url = base_url()."admin/order/update";
			
			$total = 0;
			foreach($que as $r){
				$quer = $this->db->get_where('produk',array('id'=>$r->id_produk))->row_array();
				$total = $total + $quer['price'];
			}
		}
?>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
		Category <small>category editing</small>
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="#">Order</a>
			</li>
		</ul>
		<!-- END PAGE TITLE & BREADCRUMB-->
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="portlet">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-sitemap"></i>Order Listing
				</div>
				<div class="actions">
					<a href="<?php echo base_url(); ?>admin/order" class="btn default red-sunglo">
					<i class="fa fa-angle-left"></i>
					<span class="hidden-480">
					Back</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-12">
		<div class="portlet red-sunglo box">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Order Details
				</div>
				<div class="actions">
				</div>
			</div>
			<div class="portlet-body">
				<div class="row static-info">
					<div class="col-md-5 name">
						 User:
					</div>
					<div class="col-md-7 value">
						 <?php echo $user['name']; ?>
					</div>
				</div>
				<div class="row static-info">
					<div class="col-md-5 name">
						 Order Date &amp; Time:
					</div>
					<div class="col-md-7 value">
						 <?php echo $qu['date']; ?>
					</div>
				</div>
				<div class="row static-info">
					<div class="col-md-5 name">
						 Order Status:
					</div>
					<div class="col-md-7 value">
						<?php 
							if($qu['status'] == 0){
								echo '<span class="label label-danger">Order </span>';
							}else if($qu['status'] == 1){
								echo '<span class="label label-warning">Shipping </span>';
							}else if($qu['status'] == 2){
								echo '<span class="label label-success">Done </span>';
							}
						?>
					</div>
				</div>
				<div class="row static-info">
					<div class="col-md-5 name">
						 Total:
					</div>
					<div class="col-md-7 value">
						 Rp. <?php echo number_format($total); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 ">
		<div class="portlet red-sunglo box">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Order Edit
				</div>
				<div class="actions">
				</div>
			</div>
			
			<div class="portlet-body">
				<form class="form-horizontal" action="<?php echo $url.'/'.$this->uri->segment(4); ?>" method="post" role="form" enctype="multipart/form-data">
				<input type='hidden' value='<?php echo $this->uri->segment(4); ?>' name='id_order' />
				<div class="form-group">
					<label class="col-md-3 control-label">Status</label>
					<div class="col-md-9">
						<select class="form-control" name="status">
							<option value='0' <?php if($qu['status'] == 0) echo "selected"; ?>>Order</option>
							<option value='1' <?php if($qu['status'] == 1) echo "selected"; ?>>Shipping</option>
							<option value='2' <?php if($qu['status'] == 2) echo "selected"; ?>>Done</option>
						</select>
					</div>
				</div>
				<div class="form-actions fluid">
					<div class="col-md-offset-3 col-md-9">
						<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
					</div>
				</div> &nbsp;
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-12 col-sm-12">
		<div class="portlet grey-cascade box">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Shopping Cart
				</div>
				<div class="actions">
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped">
					<thead>
					<tr>
						<th>Product</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total</th>
					</tr>
					</thead>
					<tbody>
					<?php 
						foreach($que as $da){
							$dat = $this->db->get_where('produk',array('id'=>$da->id_produk))->row_array();
					?>
					<tr>
						<td><?php echo $dat['name']; ?></td>
						<td><?php echo number_format($dat['price']); ?></td>
						<td>1</td>
						<td><?php echo number_format($dat['price']); ?></td>
					</tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
	</div>
	<div class="col-md-6">
		<div class="well">
			<div class="row static-info align-reverse">
				<div class="col-md-8 name">
					 Sub Total:
				</div>
				<div class="col-md-3 value">
					Rp. <?php echo number_format($total); ?>
				</div>
			</div>
			<div class="row static-info align-reverse">
				<div class="col-md-8 name">
					 Shipping:
				</div>
				<div class="col-md-3 value">
					 Rp. 50,000
				</div>
			</div>
			<div class="row static-info align-reverse">
				<div class="col-md-8 name">
					 Total:
				</div>
				<div class="col-md-3 value">
					Rp. <?php echo number_format($total+50000); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }else if($this->uri->segment(3)==''){ ?>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
		Order <small>order listing</small>
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="#">Order</a>
			</li>
		</ul>
		<!-- END PAGE TITLE & BREADCRUMB-->
	</div>
</div>
			
<div class="row">
	<div class="col-md-12">
		<!-- Begin: life time stats -->
		<div class="portlet">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-sitemap"></i>Order Listing
				</div>
				<div class="actions">
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-responsive">
					<table class="table table-hover table-bordered">
					<thead>
					<tr>
						<th width='30px'>#</th>
						<th>Name</th>
						<th>Message</th>
						<th colspan=2 width='1%'></th>
					</tr>
					</thead>
					<tbody>
					<?php 
						$no = 1;
						foreach($data as $row){ 
							$qu = $this->db->get_where('user',array('id'=>$row->id_user))->row();
					?>
					<tr>
						<td><?php if($this->uri->segment(3)==''){echo $no;}else{ echo $no + $this->uri->segment(3);}; ?></td>
						<td><?php echo $qu->name; ?></td>
						<td><?php echo $row->description; ?></td>
						<td><a href="<?php echo base_url().'admin/order/edit/'.$row->id_order; ?>" class="btn btn-xs purple"><i class="fa fa-edit"></i> Edit </a></td>
					</tr>
					<?php $no++; } ?>
					</tbody>
					</table>
				</div>
				<ul class='pagination'>
					<?php echo $this->pagination->create_links(); ?>
				</ul>
			</div>
		</div>
		<!-- End: life time stats -->
	</div>
</div>
<?php }else{ ?>
<div style='margin-top:25%;margin-left:40%;'>
<a class='btn btn-default'>Loading <img src='<?php echo base_url(); ?>assets/global/img/input-spinner.gif'/></a>
</div>
<?php } ?>