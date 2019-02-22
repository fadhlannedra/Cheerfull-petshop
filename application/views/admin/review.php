<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
		Review <small>reciew listing</small>
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="#">Review</a>
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
					<i class="fa fa-sitemap"></i>Review Listing
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
						<th>Produk</th>
						<th>Message</th>
						<th colspan=2 width='1%'></th>
					</tr>
					</thead>
					<tbody>
					<?php 
						$no = 1;
						foreach($data as $row){ 
							$qu = $this->db->get_where('user',array('id'=>$row->id_user))->row();
							$que = $this->db->get_where('produk',array('id'=>$row->id_produk))->row();
					?>
					<tr>
						<td><?php if($this->uri->segment(3)==''){echo $no;}else{ echo $no + $this->uri->segment(3);}; ?></td>
						<td><?php echo $qu->name; ?></td>
						<td><?php echo $que->name; ?></td>
						<td><?php echo $row->review; ?></td>
						<td><a onClick="return confirm('Apakah anda yakin ?')" href="<?php echo base_url().'admin/review/delete/'.$row->id; ?>" class="btn btn-xs red"><i class="fa fa-times"></i> Delete</a></td>
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