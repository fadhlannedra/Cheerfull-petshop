<!-- BEGIN PAGE HEADER-->
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
		Dashboard <small>statistics and more</small>
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="#">Dashboard</a>
			</li>
		</ul>
		<!-- END PAGE TITLE & BREADCRUMB-->
	</div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS -->
<div class="row">
	<div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat blue-madison">
			<div class="visual">
				<i class="fa fa-comments"></i>
			</div>
			<div class="details">
				<div class="number">
					 <?php
						$q = $this->db->get_where('review',array('status'=>0))->num_rows();
						echo $q;
					 ?>
				</div>
				<div class="desc">
					 New Reviews
				</div>
			</div>
			<a class="more" href="<?php echo base_url() ?>admin/review">
			View more <i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-6 col-md-5 col-sm-6 col-xs-12">
		<div class="dashboard-stat green-haze">
			<div class="visual">
				<i class="fa fa-shopping-cart"></i>
			</div>
			<div class="details">
				<div class="number">
					 <?php
						$q = $this->db->get_where('orders',array('status'=>0))->num_rows();
						echo $q;
					 ?>
				</div>
				<div class="desc">
					 New Orders
				</div>
			</div>
			<a class="more" href="<?php echo base_url() ?>admin/order">
			View more <i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>
</div>
<!-- END DASHBOARD STATS -->
<div class="clearfix">
</div>
<div class="row">
	<div class="col-md-12">
		<!-- Begin: life time stats -->
		<div class="portlet box blue-steel">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-thumb-tack"></i>Overview
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse">
					</a>
				</div>
			</div>
			<div class="portlet-body">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#overview_1" data-toggle="tab">
						Top Selling </a>
					</li>
					<li>
						<a href="#overview_2" data-toggle="tab">
						Most Viewed </a>
					</li>
					<li>
						<a href="#overview_3" data-toggle="tab">
						New Customers </a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="overview_1">
						<div class="table-responsive">
							<table class="table table-striped table-hover table-bordered">
							<thead>
							<tr>
								<th>
									 Product Name
								</th>
								<th>
									 Price
								</th>
								<th>
									 Sold
								</th>
								<th>
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$query = $this->db->query("SELECT * FROM produk ORDER BY sold DESC LIMIT 0,5")->result();
								foreach($query as $row){
							?>
							<tr>
								<td><?php echo $row->name; ?></td>
								<td><?php echo number_format($row->price); ?></td>
								<td><?php echo number_format($row->sold); ?></td>
								<td width='1%'><a href="<?php echo base_url().'admin/product/edit/'.$row->id; ?>" class="btn default btn-xs green-stripe">View</a>
								</td>
							</tr>
							<?php } ?>
							</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane" id="overview_2">
						<div class="table-responsive">
							<table class="table table-striped table-hover table-bordered">
							<thead>
							<tr>
								<th>
									 Product Name
								</th>
								<th>
									 Price
								</th>
								<th>
									 Views
								</th>
								<th>
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$query = $this->db->query("SELECT * FROM produk ORDER BY view DESC LIMIT 0,5")->result();
								foreach($query as $row){
							?>
							<tr>
								<td><?php echo $row->name; ?></td>
								<td><?php echo number_format($row->price); ?></td>
								<td><?php echo number_format($row->view); ?></td>
								<td width='1%'><a href="<?php echo base_url().'admin/product/edit/'.$row->id; ?>" class="btn default btn-xs green-stripe">View</a>
								</td>
							</tr>
							<?php } ?>
							</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane" id="overview_3">
						<div class="table-responsive">
							<table class="table table-striped table-hover table-bordered">
							<thead>
							<tr>
								<th>
									 Customer Name
								</th>
								<th>
									 Total Orders
								</th>
								<th>
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$query = $this->db->query("SELECT * FROM user WHERE status = 2 ORDER BY id ASC LIMIT 0,5")->result();
								foreach($query as $row){
									$total = $this->db->get_where("orders",array('id_user'=>$row->id))->num_rows();
							?>
							<tr>
								<td><?php echo $row->name; ?></td>
								<td><?php echo $total; ?></td>
								<td width='1%'><a href="<?php echo base_url().'admin/product/edit/'.$row->id; ?>" class="btn default btn-xs green-stripe">View</a>
								</td>
							</tr>
							<?php } ?>
							</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane" id="overview_4">
						<div class="table-responsive">
							<table class="table table-striped table-hover table-bordered">
							<thead>
							<tr>
								<th>
									 Customer Name
								</th>
								<th>
									 Date
								</th>
								<th>
									 Amount
								</th>
								<th>
									 Status
								</th>
								<th>
								</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>
									<a href="#">
									David Wilson </a>
								</td>
								<td>
									 3 Jan, 2013
								</td>
								<td>
									 $625.50
								</td>
								<td>
									<span class="label label-sm label-warning">
									Pending </span>
								</td>
								<td>
									<a href="#" class="btn default btn-xs green-stripe">
									View </a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="#">
									Amanda Nilson </a>
								</td>
								<td>
									 13 Feb, 2013
								</td>
								<td>
									 $12625.50
								</td>
								<td>
									<span class="label label-sm label-warning">
									Pending </span>
								</td>
								<td>
									<a href="#" class="btn default btn-xs green-stripe">
									View </a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="#">
									Jhon Doe </a>
								</td>
								<td>
									 20 Mar, 2013
								</td>
								<td>
									 $125.00
								</td>
								<td>
									<span class="label label-sm label-success">
									Success </span>
								</td>
								<td>
									<a href="#" class="btn default btn-xs green-stripe">
									View </a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="#">
									Bill Chang </a>
								</td>
								<td>
									 29 May, 2013
								</td>
								<td>
									 $12,125.70
								</td>
								<td>
									<span class="label label-sm label-info">
									In Process </span>
								</td>
								<td>
									<a href="#" class="btn default btn-xs green-stripe">
									View </a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="#">
									Paul Strong </a>
								</td>
								<td>
									 1 Jun, 2013
								</td>
								<td>
									 $890.85
								</td>
								<td>
									<span class="label label-sm label-success">
									Success </span>
								</td>
								<td>
									<a href="#" class="btn default btn-xs green-stripe">
									View </a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="#">
									Jane Hilson </a>
								</td>
								<td>
									 5 Aug, 2013
								</td>
								<td>
									 $239.85
								</td>
								<td>
									<span class="label label-sm label-danger">
									Canceled </span>
								</td>
								<td>
									<a href="#" class="btn default btn-xs green-stripe">
									View </a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="#">
									Patrick Walker </a>
								</td>
								<td>
									 6 Aug, 2013
								</td>
								<td>
									 $1239.85
								</td>
								<td>
									<span class="label label-sm label-success">
									Success </span>
								</td>
								<td>
									<a href="#" class="btn default btn-xs green-stripe">
									View </a>
								</td>
							</tr>
							</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End: life time stats -->
	</div>
</div>