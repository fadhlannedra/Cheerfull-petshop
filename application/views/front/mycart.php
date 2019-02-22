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
?>
<div class="col-md-12 col-sm-12">
            <h1>Shopping cart</h1>
            <div class="goods-page">
              <div class="goods-data clearfix">
                <div class="table-wrapper-responsive">
                <table summary="Shopping cart">
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
                      <a class="del-goods" href="<?php echo base_url().'shop/cart/delete/'.$q->id.'/y'; ?>">&nbsp;</a>
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
				<?php }else{
					if($this->uri->segment(3) == 'finish'){
						echo "Nomor rekening: 178 303 7878 <br>Atas Nama: SuperShop<br>Nilai sebesar yang di tentukan";
					}else{
						echo "Cart Empty :(";
					}
				} ?>
              </div>
              <a href='<?php echo base_url();?>' class="btn btn-default" >Continue shopping <i class="fa fa-shopping-cart"></i></a>
              <a href='<?php echo base_url();?>shop/checkout' class="btn btn-primary" >Checkout <i class="fa fa-check"></i></a>
            </div>
          </div>
          </div>
          </div>