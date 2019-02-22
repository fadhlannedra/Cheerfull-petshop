<?php 
	if($this->uri->segment(3) == "add" || $this->uri->segment(3) == "edit"){ 
		if($this->uri->segment(3) == "add"){
			$field = array('id','name','id_category','id_brand','price','description');
			foreach($field as $val){
				$row[$val] = '';
			}
			$url = base_url()."admin/product/tambah";
		}else{
			$row = $this->db->get_where('produk',array('id'=>$this->uri->segment(4)))->row_array();
			$url = base_url()."admin/product/update";
		}
?>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
		Products <small>product editing</small>
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="#">Products</a>
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
					<i class="fa fa-truck"></i>Product Listing
				</div>
				<div class="actions">
					<a href="<?php echo base_url(); ?>admin/product" class="btn default yellow-stripe">
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
				<input type='hidden' name='id' value='<?php echo $row['id']; ?>' />
				<div class="form-body">
					<div class="form-group">
						<label class="col-md-3 control-label">Name</label>
						<div class="col-md-9">
							<input class="form-control" placeholder="Nama produk" type="text" name="name" value='<?php echo $row['name']; ?>'>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Price</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input class="form-control input-medium" placeholder="Harga" type="text" name="price" value='<?php echo $row['price']; ?>'>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Category</label>
						<div class="col-md-9">
							<select class="form-control" name="id_category">
								<option>-- Category --</option>
								<?php 
									$d = $this->db->get('category')->result();
									foreach($d as $r){
										if($r->id_category == $row['id_category']){$s='selected';}else{$s='';}
										echo "<option value='".$r->id_category."' $s>".$r->name_cat."</option>";
									}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Brand</label>
						<div class="col-md-9">
							<select class="form-control" name="id_brand">
								<option>-- Brand --</option>
								<?php 
									$d = $this->db->get('brand')->result();
									foreach($d as $r){
										if($r->id_brand == $row['id_brand']){$s='selected';}else{$s='';}
										echo "<option value='".$r->id_brand."' $s>".$r->name_brand."</option>";
									}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Description</label>
						<div class="col-md-9">
							<textarea class="form-control" rows="3" name="description"><?php echo $row['description']; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputFile" class="col-md-3 control-label">Picture</label>
						<div class="col-md-9">
							<input id="exampleInputFile" type="file" name="file">
							<p class="help-block">
								 *) Max ukuran gambar 2mb.
							</p>
							<?php
								if($this->uri->segment(3) == 'edit'){
									echo "<img width=200 src='".base_url()."assets/foto/".$row['pict']."'>";
									echo '<p class="help-block">
										 *) Abaikan jika gambar tidak di ubah.
									</p>';
								}
							?>
						</div>
					</div>
				</div>
				<div class="form-actions fluid">
					<div class="col-md-offset-3 col-md-9">
						<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
						<a href="<?php echo base_url(); ?>admin/product" class="btn default">Cancel</a>
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
		Products <small>product listing</small>
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="#">Products</a>
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
					<i class="fa fa-truck"></i>Product Listing
				</div>
				<div class="actions">
					<a href="<?php echo base_url(); ?>admin/product/add" class="btn default yellow-stripe">
					<i class="fa fa-plus"></i>
					<span class="hidden-480">
					New Product </span>
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
						<th>Category</th>
						<th>Price</th>
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
						<td><?php echo $row->name; ?></td>
						<td><?php echo $row->name_cat.' ('.$row->category; ?>)</td>
						<td>Rp. <?php echo number_format($row->price); ?></td>
						<td><a href="<?php echo base_url().'admin/product/edit/'.$row->id; ?>" class="btn btn-xs purple"><i class="fa fa-edit"></i> Edit </a></td>
						<td><a onClick="return confirm('Apakah anda yakin ?')" href="<?php echo base_url().'admin/product/delete/'.$row->id; ?>" class="btn btn-xs red"><i class="fa fa-times"></i> Delete</a></td>
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