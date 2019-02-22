          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">
			<h3>&nbsp;</h3>
            <ul class="list-group margin-bottom-25 sidebar-menu">
              <li class="list-group-item clearfix"><a href="<?php echo base_url().'shop/login' ?>"><i class="fa fa-angle-right"></i> Login</a></li>
              <li class="list-group-item clearfix"><a href="<?php echo base_url().'shop/register' ?>"><i class="fa fa-angle-right"></i> Register</a></li>
            </ul>
          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
            <h1>Register</h1>
            <div class="content-form-page">
				<div class="row">
					<div class="col-md-7 col-sm-7">
					  <form class="form-horizontal" role="form" method='post' action='<?php echo base_url().'shop/daftar' ?>' enctype='multipart/form-data'>
						<fieldset>
						  <legend>Your personal details</legend>
						  <div class="form-group">
							<label for="lastname" class="col-lg-4 control-label">Name <span class="require">*</span></label>
							<div class="col-lg-8">
							  <input class="form-control" id="lastname" type="text" name='name'>
							</div>
						  </div>
						  <div class="form-group">
							<label for="email" class="col-lg-4 control-label">Email <span class="require">*</span></label>
							<div class="col-lg-8">
							  <input class="form-control" id="email" type="email" name='email'>
							</div>
						  </div>
						  <div class="form-group">
							<label for="lastname" class="col-lg-4 control-label">Telephone <span class="require">*</span></label>
							<div class="col-lg-8">
							  <input class="form-control" id="lastname" type="text" name='telephone'>
							</div>
						  </div>
						  <div class="form-group">
							<label for="lastname" class="col-lg-4 control-label">Picture <span class="require">*</span></label>
							<div class="col-lg-8">
							  <input class="form-control" id="lastname" type="file" name='file'>
							</div>
						  </div>
						</fieldset>
						<fieldset>
						  <legend>Your Account</legend>
						  <div class="form-group">
							<label for="password" class="col-lg-4 control-label">Username <span class="require">*</span></label>
							<div class="col-lg-8">
							  <input class="form-control" id="password" type="text" name='username'>
							</div>
						  </div>
						  <div class="form-group">
							<label for="confirm-password" class="col-lg-4 control-label">Password <span class="require">*</span></label>
							<div class="col-lg-8">
							  <input class="form-control" id="confirm-password" type="password" name='password'>
							</div>
						  </div>
						</fieldset>
						<fieldset>
						  <legend>Your Address</legend>
						  <div class="form-group">
							<label for="password" class="col-lg-4 control-label">City <span class="require">*</span></label>
							<div class="col-lg-8">
							  <input name='city' class="form-control" id="password" type="text">
							</div>
						  </div>
						  <div class="form-group">
							<label for="confirm-password" class="col-lg-4 control-label">Post Code <span class="require">*</span></label>
							<div class="col-lg-8">
							  <input name='postcode' class="form-control" id="confirm-password" type="text">
							</div>
						  </div>
						  <div class="form-group">
							<label for="confirm-password" class="col-lg-4 control-label">Address <span class="require">*</span></label>
							<div class="col-lg-8">
							  <textarea class="form-control" name='address'></textarea>
							</div>
						  </div>
						</fieldset>
						<div class="row">
						  <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
							<button type="submit" class="btn btn-primary">Create an acoount</button>
							<button type="button" class="btn btn-default">Cancel</button>
						  </div>
						</div>
					  </form>
					</div>
					<div class="col-md-4 col-sm-4 pull-right">
					  <div class="form-info">
						<h2><em>Important</em> Information</h2>
						<p>Semua data yang anda masukan pastikan semuanya benar, karena semua data yang anda berikan di pastikan aman.</p>

					  </div>
					</div>
				  </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        </div>