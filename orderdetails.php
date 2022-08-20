<?php
	include('inc/header.php');
	 // include('inc/slider.php');
?>

<?php
	  	 $login_check = Session::get('customer_login');
	  	 if($login_check == false){
	  	 	header('Location:login.php');
	  	 }
?>
<style type="text/css">
	.box-left{
    	width: 100%;
    	border: 1px solid #666;
    	padding: 10px;
	}
    
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
			<div class="heading">
    		<h3>Đơn hàng của tôi</h3>
    		</div>
    		<div class="clear"></div>
    		<div class="box-left">
    			<div class="cartpage">
			    	<?php
			    		if(isset($del_cart)){
			    			echo $del_cart;
			    		} 
			    	?>
						<table class="tblone">
							<tr>
								<th width="15%">Id</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="25%">Date</th>
								<th width="10%">Status</th>
							</tr>
							<?php
								$customer_id = Session::get('customer_id');
								$get_cart_ordered = $cart->get_cart_ordered($customer_id);
								if($get_cart_ordered){
									$subtotal = 0;
									$qty = 0;
									$i = 0;
									while($result = $get_cart_ordered->fetch_array()){
										$i++;
							?>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $result['productName']?></td>
								<td><img src="admin/uploads/<?php echo $result['img']?>" alt=""/></td>
								<td><?php echo $result['price']." VND"?></td>
								<td>
									<?php echo $result['quantity']?>
								</td>
								<td><?php $total = $result['price'] * $result['quantity']; echo $total." VND"?></td>
								<td><?php echo $fm->formatDate($result['date'])?></td>
								<td><?php
									if($result['status']==0){
										echo 'Đang xử lý';
									}else{
										echo 'Đã giao';
									}
									?></td>
							</tr>
							<?php
							$subtotal += $total;
							$qty = $qty + $result['quantity'];
							}
							} 
							?>
							
						</table>
					</div>
    		</div>
 		</div>

 	</div>
</div>
	<?php
	include('inc/footer.php');
?>