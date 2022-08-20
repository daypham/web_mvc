<?php
	include('inc/header.php');
	 // include('inc/slider.php');
?>
<?php
	if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
		$customer_id = Session::get('customer_id');
		$insert_Order = $cart->insert_order($customer_id);
		$delCart = $cart->dell_all_data();
		header('Location: success.php');
    }

    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     $catName = $_POST['catName'];

    //     $update_cat = $cat->update_category($catName, $id);
    // } 
?>
<style type="text/css">
	.box-left{
		float: left;
    	width: 45%;
    	border: 1px solid #666;
    	padding: 10px;
	}
	.box-right{
		padding: 10px;
		float: right;
    	width: 42%;
    	border: 1px solid #666;
	}
	.thanhtoanoff{
		width: 20%;
	    padding: 10px 70px;
	    font-size: 20px;
	    font-weight: bold;
	    background: red;
	    align-items: center;
	    justify-content: center;
	    display: flex;
	    cursor: pointer;
	    border: 1px solid #black;
	}
    
</style>
<form action="" method="post">
 <div class="main">
    <div class="content">
    	<div class="section group">
			<div class="heading">
    		<h3>Offline payment</h3>
    		</div>
    		<div class="clear"></div>
    		<div class="box-left">
    			<div class="cartpage">
			    	<?php
			    		if(isset($update_cart)){
			    			echo $update_cart;
			    		} 
			    	?>
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
							</tr>
							<?php
								$get_pro_cart = $cart->get_pro_cart();
								if($get_pro_cart){
									$subtotal = 0;
									$qty = 0;
									$i = 0;
									while($result = $get_pro_cart->fetch_array()){
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
							</tr>
							<?php
							$subtotal += $total;
							$qty = $qty + $result['quantity'];
							}
							} 
							?>
							
						</table>
						<?php
									$check_cart = $cart->check_cart();
									if($check_cart){
									?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td><?php

								 echo $subtotal." VND"; 
								 Session::set('sum',$subtotal); 
								 Session::set('qty',$qty);
								?></td>
							</tr>
							<tr>
								<th>Total Quantity:</th>
								<td><?php echo $qty;
									?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>5% (<?php echo $vat=$subtotal*0.05?>)</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php $vat=$subtotal*0.1;
										  $gtotal = $subtotal + $vat;
										  echo $gtotal." VND";
									?></td>
							</tr>
					   </table>
					   <?php
					   } 
					   ?>
					</div>
    		</div>
    		<div class="box-right">
    			<table class="tblone">
				<?php
					$id = Session::get('customer_id');
					$get_customer = $cs->show_customer($id);
					if($get_customer){
						while($result_customer = $get_customer->fetch_array()){
				?>
				<tr>
					<td>Name:</td>
					<td><?php echo $result_customer['name']?></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><?php echo $result_customer['email']?></td>
				</tr>
				<tr>
					<td>Phone:</td>
					<td><?php echo $result_customer['phone']?></td>
				</tr>
				<tr>
					<td>Address:</td>
					<td><?php echo $result_customer['address']?></td>
				</tr>
				<tr>
					<td>Country:</td>
					<td><?php echo $result_customer['country']?></td>
				</tr>
				<?php
					}
					}  
				?>
			</table>
    		</div>
 		</div>

 	</div>
 	 	<center><a href="?orderid=order" class="thanhtoanoff">Thanh toán</a></center>
</div>
</form>
	<?php
	include('inc/footer.php');
?>