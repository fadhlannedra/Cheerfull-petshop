<?php 
	if($this->uri->segment(3) == "add" || $this->uri->segment(3) == "edit"){ 
		if($this->uri->segment(3) == "add"){
			$field = array('id','username','password','name','email','telephone','address','city','postcode','status');
			foreach($field as $val){
				$row[$val] = '';
			}
			$url = base_url()."admin/user/tambah";
		}else{
			$row = $this->db->get_where('user',array('id'=>$this->uri->segment(4)))->row_array();
			$url = base_url()."admin/user/update";
		}
?>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
		User <small>user editing</small>
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="#">User</a>
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
					<i class="fa fa-user"></i>User Listing
				</div>
				<div class="actions">
					<a href="<?php echo base_url(); ?>admin/user" class="btn default yellow-stripe">
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
						<label class="col-md-3 control-label">Username</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><i class='fa fa-user'></i></span>
								<input class="form-control input-medium" placeholder="Username" type="text" name="username" value='<?php echo $row['username']; ?>'>
							</div>
						</div>
					</div>
					<?php
						if($this->uri->segment(3) == 'add'){
					?>
					<div class="form-group">
						<label class="col-md-3 control-label">Password</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><i class='fa fa-lock'></i></span>
								<input class="form-control input-medium" placeholder="Password" type="password" name="password" value='<?php echo $row['password']; ?>'>
							</div>
						</div>
					</div>
					<?php } ?>
					<div class="form-group">
						<label class="col-md-3 control-label">Name</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><i class='fa fa-font'></i></span>
								<input class="form-control input-medium" placeholder="Name" type="text" name="name" value='<?php echo $row['name']; ?>'>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Email</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><i class='fa fa-envelope'></i></span>
								<input class="form-control input-medium" placeholder="Email" type="email" name="email" value='<?php echo $row['email']; ?>'>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Telephone</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><i class='fa fa-phone'></i></span>
								<input class="form-control input-medium" placeholder="Telephone" type="text" name="telephone" value='<?php echo $row['telephone']; ?>'>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">City</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><i class='fa fa-building-o'></i></span>
								<input class="form-control input-medium" placeholder="City" type="text" name="city" value='<?php echo $row['city']; ?>'>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Address</label>
						<div class="col-md-9">
							<textarea class="form-control" rows="3" name="address"><?php echo $row['address']; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Post Code</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><i class='fa fa-folder'></i></span>
								<input class="form-control input-medium" placeholder="Post Code" type="text" name="postcode" value='<?php echo $row['postcode']; ?>'>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Status</label>
						<div class="col-md-9">
							<select class="form-control" name="status">
								<option value='1'>Admin</option>
								<option value='2'>User</option>
							</select>
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
		Users <small>user listing</small>
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="#">Users</a>
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
					<i class="fa fa-user"></i>User Listing
				</div>
				<div class="actions">
					<a href="<?php echo base_url(); ?>admin/user/add" class="btn default yellow-stripe">
					<i class="fa fa-plus"></i>
					<span class="hidden-480">
					New User </span>
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
						<th>Username</th>
						<th>Email</th>
						<th>Telephone</th>
						<th>Post Code</th>
						<th>Status</th>
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
						<td><?php echo $row->username; ?></td>
						<td><?php echo $row->email; ?></td>
						<td><?php echo $row->telephone; ?></td>
						<td><?php echo $row->postcode; ?></td>
						<td><?php
							if($row->status == 1){
								echo "Admin";
							}else{
								echo "User";
							}
						?></td>
						<td><a href="<?php echo base_url().'admin/user/edit/'.$row->id; ?>" class="btn btn-xs purple"><i class="fa fa-edit"></i> Edit </a></td>
						<td><a onClick="return confirm('Apakah anda yakin ?')" href="<?php echo base_url().'admin/user/delete/'.$row->id; ?>" class="btn btn-xs red"><i class="fa fa-times"></i> Delete</a></td>
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