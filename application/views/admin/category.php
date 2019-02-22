<?php 
	if($this->uri->segment(3) == "add" || $this->uri->segment(3) == "edit"){ 
		if($this->uri->segment(3) == "add"){
			$field = array('id_category','name_cat','description');
			foreach($field as $val){
				$row[$val] = '';
			}
			$url = base_url()."admin/category/tambah";
		}else{
			$row = $this->db->get_where('category',array('id_category'=>$this->uri->segment(4)))->row_array();
			$url = base_url()."admin/category/update";
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
				<a href="#">Category</a>
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
					<i class="fa fa-sitemap"></i>Category Listing
				</div>
				<div class="actions">
					<a href="<?php echo base_url(); ?>admin/category" class="btn default yellow-stripe">
					<i class="fa fa-angle-left"></i>
					<span class="hidden-480">
					Back</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="portlet-body form">
			<form class="form-horizontal" action="<?php echo $url; ?>" method="post" role="form" enctype="multipart/form-data">
				<input type='hidden' name='id_category' value='<?php echo $row['id_category']; ?>' />
				<div class="form-body">
					<div class="form-group">
						<label class="col-md-3 control-label">Name</label>
						<div class="col-md-9">
							<input class="form-control" placeholder="Nama Category" type="text" name="name_cat" value='<?php echo $row['name_cat']; ?>'>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Description</label>
						<div class="col-md-9">
							<textarea class="form-control" rows="3" name="description"><?php echo $row['description']; ?></textarea>
						</div>
					</div>
				</div>
				<div class="form-actions fluid">
					<div class="col-md-offset-3 col-md-9">
						<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
						<a href="<?php echo base_url(); ?>admin/category" class="btn default">Cancel</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php }else if($this->uri->segment(3)==''){ ?>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
		Category <small>category listing</small>
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="#">Category</a>
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
					<i class="fa fa-sitemap"></i>Category Listing
				</div>
				<div class="actions">
					<a href="<?php echo base_url(); ?>admin/category/add" class="btn default yellow-stripe">
					<i class="fa fa-plus"></i>
					<span class="hidden-480">
					New Category </span>
					</a>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-responsive">
					<table class="table table-hover table-bordered">
					<thead>
					<tr>
						<th width='30px'>#</th>
						<th>Name</th>
						<th colspan=2 width='1%'></th>
					</tr>
					</thead>
					<tbody>
					<?php 
						$no = 1;
						foreach($data as $row){ 
					?>
					<tr>
						<td><?php if($this->uri->segment(3)==''){echo $no;}else{ echo $no + $this->uri->segment(3);}; ?></td>
						<td><?php echo $row->name_cat; ?></td>
						<td><a onClick="return confirm('Apakah anda yakin ?')" href="<?php echo base_url().'admin/category/delete/'.$row->id_category; ?>" class="btn btn-xs red"><i class="fa fa-times"></i> Delete</a></td>
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