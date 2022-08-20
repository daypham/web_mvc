<?php
	include('inc/header.php');
	 // include('inc/slider.php');
?>
<?php
	if(!isset($_GET['proId']) || $_GET['proId']==NULL){
        // echo "<script>window.location = '404.php' </script>";
    }else{
        $id = $_GET['proId'];
    }

   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
   			$quantity = $_POST['quantity'];
        $addtoCart = $cart->add_to_cart($quantity, $id);
    }

     if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])){
     		$customer_id = Session::get('customer_id');
   			$productId = $_POST['productId'];
        $addCompare = $pro->add_to_compare($productId, $customer_id);
    }

     if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])){
     		$customer_id = Session::get('customer_id');
   			$productId = $_POST['productId'];
        $addWishlist = $pro->add_to_wishlist($productId, $customer_id);
    }

?>
 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">
				<?php
    			$get_pro_details = $pro->getpro_details($id);
    			if($get_pro_details){
    				while($result_details = $get_pro_details->fetch_array()){
    		?>			
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result_details['productImg']?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_details['productName']?> </h2>
					<p><?php echo $result_details['productDesc']?></p>					
					<div class="price">
						<p>Price: <span><?php echo $result_details['productPrice']." VND"?></span></p>
						<p>Category: <span><?php echo $result_details['cateName']?></span></p>
						<p>Brand:<span><?php echo $result_details['brandName']?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>
						<?php
							 if(isset($addtoCart)){
							 	echo '<span style="color:red">Sản phẩm đã được thêm</span>';
							 }
						?>		
				</div>

				<div class="add-cart">
					
					<div class="button-left">
					<form action="" method="post">
						<!-- <a href="?compare=<?php echo $result_details['productId']?>" class="buysubmit">So sánh</a> -->
					<input type="hidden" name="productId" value="<?php echo $result_details['productId']?>"/>
					<?php
			   		$login_check = Session::get('customer_login');
			   		if($login_check){
			   			echo '<input type="submit" class="buysubmit" name="compare" value="Compare"/>'. ' ';
			   		}else{
			   			echo '';
			   		}
			   		?>
					
					<?php
						if(isset($addCompare)){
							echo $addCompare;
						}
					?>
					</form>
					<form action="" method="post">
						<!-- <a href="?compare=<?php echo $result_details['productId']?>" class="buysubmit">So sánh</a> -->
					<input type="hidden" name="productId" value="<?php echo $result_details['productId']?>"/>
					<?php
			   		$login_check = Session::get('customer_login');
			   		if($login_check){
			   			echo '<input type="submit" class="buysubmit" name="save" value="Save"/>';
			   		}else{
			   			echo '';
			   		}
			   		?>
					
					<?php
						if(isset($addWishlist)){
							echo $addWishlist;
						}
					?>
					</form>
					</div>

				</div>

			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	    </div>
	    <?php
	     }
	   }
	    ?>
				
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>DANH MỤC</h2>
					<ul>
						<?php
							$getallcat = $cat->show_category_fontend();
							if($getallcat){
								while($resultallcat = $getallcat->fetch_array()){
						 ?>
				      <li><a href="productbycat.php?catid=<?php echo $resultallcat['cateId']?>"><?php echo $resultallcat['cateName']?></a></li>
				      <?php
				      }
				      } 
				      ?>
    			</ul>
    	
 				</div>
 		</div>
 	</div>
	</div>
	<?php
	include('inc/footer.php');
?>