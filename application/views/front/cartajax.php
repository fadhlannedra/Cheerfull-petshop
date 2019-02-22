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
<script>
	$(function(){
		$('a#deletecart').click(function(){	
			$.ajax({url:$(this).attr('href'),
				success:function(w){
					$('#cart').load("<?php echo base_url(); ?>shop/cart/ajax");
				}
			});
			return( false );
		});
	});
</script>
  <div class="top-cart-info">
	<a href="javascript:void(0);" class="top-cart-info-count"><?php echo $no; ?> items</a>
	<a href="javascript:void(0);" class="top-cart-info-value">Rp. <?php echo number_format($total); ?></a>
  </div>
  <i class="fa fa-shopping-cart"></i>
				
  <div class="top-cart-content-wrapper">
	<div class="top-cart-content">
	  <ul class="scroller" style="height: 200px;">
		<?php
			if(isset($_SESSION['cart'])){
				foreach($_SESSION['cart'] as $key => $val){
					$q = $this->db->get_where('produk',array('id'=>$key))->row();
		?>
		<li>
		  <a href="shop-item.html"><img src="<?php echo base_url().'assets/foto/'.$q->pict; ?>" alt="<?php echo $q->name ?>" width="37" height="34"></a>
		  <span class="cart-content-count">x <?php echo $val ?></span>
		  <strong><a href="<?php echo base_url().'shop/detail/'.$q->id; ?>"><?php echo $q->name ?></a></strong>
		  <em><?php echo number_format($q->price*$val) ?></em>
		  <a id='deletecart' href="<?php echo base_url().'shop/cart/delete/'.$q->id; ?>" class="del-goods">&nbsp;</a>
		</li>
		<?php }}else{ ?>
			Cart Empty :(
		<?php } ?>
	  </ul>
	  <div class="text-right">
		<a href="<?php echo base_url().'shop/mycart' ?>" class="btn btn-default">View Cart</a>
		<a href="<?php echo base_url().'shop/checkout' ?>" class="btn btn-primary">Checkout</a>
	  </div>
	  
	</div>
  </div> 