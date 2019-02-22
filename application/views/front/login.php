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
            <h1>Login</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-7 col-sm-7">
                  <form class="form-horizontal form-without-legend" role="form" method='post' action='<?php echo base_url().'shop/validasi/'.$this->uri->segment(3).'/'.$this->uri->segment(4); ?>'>
                    <div class="form-group">
                      <label for="email" class="col-lg-4 control-label">Username <span class="require">*</span></label>
                      <div class="col-lg-8">
                        <input class="form-control" id="email" type="text" name='username'>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>
                      <div class="col-lg-8">
                        <input class="form-control" id="password" type="password" name='password'>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                        <button type="submit" class="btn btn-primary">Login</button>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-10 padding-right-30">
                        <hr>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-4 col-sm-4 pull-right">
                  <div class="form-info">
                    <h2><em>Important</em> Information</h2>
                    <p>Jika anda mendaftar, itu berarti anda menyetujui semua aturan yang ada pada website ini.</p>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        </div>