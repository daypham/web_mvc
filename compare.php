<?php
	include('inc/header.php');
?>
<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>So sánh</h2>
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
								<th width="10%">ID Compare</th>
								<th width="20%">Product Name</th>
								<th width="20%">Image</th>
								<th width="15%">Price</th>
								<th width="15%">View</th>
								<th width="25%">Action</th>


							</tr>
							<?php
								$customer_id = Session::get('customer_id');
								$get_compare = $pro->get_compare($customer_id);
								if($get_compare){
									$i = 0;
									while($result = $get_compare->fetch_array()){
										$i++;
							?>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $result['productName']?></td>
								<td><img src="admin/uploads/<?php echo $result['img']?>" alt=""/></td>
								<td><?php echo $result['price']." VND"?></td>
								<td><a href="details.php?proId=<?php echo $result['productId']?>">View</a></td>
								<form action="" method="post">
									<td><a onclick = "return confirm('Bạn có chắc muốn xóa?')" href="?proId=<?php echo $result['productId']?>">Delete</a></td>
								</form>
								
							</tr>
							<?php
							}
							} 
							?>
							
						</table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
	include('inc/footer.php');
?>