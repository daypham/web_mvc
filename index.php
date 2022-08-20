<?php
	include('inc/header.php');
	 include('inc/slider.php');
?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php
	      		$get_pro_nb = $pro->getpro_nb();
	      		if($get_pro_nb){
	      			while($result_nb = $get_pro_nb->fetch_array()){

	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_nb['productImg']?>" alt="" /></a>
					 <h2><?php echo $result_nb['productName']?></h2>
					 <p><span class="price"><?php echo $fm->format_currency($result_nb['productPrice'])." VND"?></span></p>
				     <div class="button"><span><a href="details.php?proId=<?php echo $result_nb['productId']?>" class="details">Details</a></span></div>
				</div>
				<?php
				}
				}
				?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php
	      		$get_pro_new = $pro->getpro_new();
	      		if($get_pro_new){
	      			while($result_new = $get_pro_new->fetch_array()){

	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a  href="details.php"><img style="width: 300px;" src="admin/uploads/<?php echo $result_new['productImg']?>" alt="" /></a>
					 <h2><?php echo $result_new['productName']?></h2>
					 <p><span class="price"><?php echo $result_new['productPrice']." VND"?></span></p>
				     <div class="button"><span><a href="details.php?proId=<?php echo $result_new['productId']?>" class="details">Details</a></span></div>
				</div>
				<?php
				}
				}
				?>
			</div>
			<div class="">
				<?php
					$product_all = $pro->get_all_product();
					$product_count = mysqli_num_rows($product_all);
					$product_button = ceil($product_count/4);
					$i=0;
					echo '<p>Trang: </p>';
					for($i=1;$i<$product_button;$i++){
						echo '<a style="margin: 0 5px;" href="index.php?trang='.$i.'">'.$i.'</a>';
					}

				?>
			</div>
    </div>
 </div>
<?php
	include('inc/footer.php');
?>