
	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php
					$getLastesDell = $pro->getLastesDell();
					if($getLastesDell){
						while($resultDell = $getLastesDell->fetch_array()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.html"> <img src="admin/uploads/<?php echo $resultDell['productImg']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Dell</h2>
						<p><?php echo $resultDell['productName']?></p>
						<div class="button"><span><a href="details.php?proId=<?php echo $resultDell['productId']?>">Add to cart</a></span></div>
				   </div>
			   </div>
			   <?php
				}
			   } 
			   ?>
			   <?php
					$getLastesSamsung = $pro->getLastesSamsung();
					if($getLastesSamsung){
						while($resultss = $getLastesSamsung->fetch_array()){
				?>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.html"><img src="admin/uploads/<?php echo $resultss['productImg']?>" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Samsung</h2>
						  <p><?php echo $resultss['productName']?></p>
						  <div class="button"><span><a href="details.php?proId=<?php echo $resultss['productId']?>">Add to cart</a></span></div>
					</div>
				</div>
				 <?php
				}
			   } 
			   ?>
			</div>
			<div class="section group">
				<?php
					$getLastesAp = $pro->getLastesApple();
					if($getLastesAp){
						while($resultAp = $getLastesAp->fetch_array()){
				?>	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.html"> <img src="admin/uploads/<?php echo $resultAp['productImg']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Apple</h2>
						<p><?php echo $resultAp['productName']?></p>
						<div class="button"><span><a href="details.php?proId=<?php echo $resultAp['productId']?>">Add to cart</a></span></div>
				   </div>
			   </div>
			    <?php
				}
			   } 
			   ?>
			   	<?php
					$getLastesXiao = $pro->getLastesXiaomi();
					if($getLastesXiao){
						while($resultXiao = $getLastesXiao->fetch_array()){
				?>		
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.html"><img src="admin/uploads/<?php echo $resultXiao['productImg']?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>XiaoMi</h2>
						  <p><?php echo $resultXiao['productName']?></p>
						  <div class="button"><span><a href="details.php?proId=<?php echo $resultXiao['productId']?>">Add to cart</a></span></div>
					</div>
				</div>
				 <?php
				}
			   } 
			   ?>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<?php
							$get_slider = $pro->get_slider();
								if($get_slider){
									while($result_slider = $get_slider->fetch_array()){
						?>
						<li><img src="uploads/<?php echo $result_slider['sliderImg']?>" alt="uploads/<?php echo $result_slider['sliderName']?>"/></li>
						<?php
						}
						} 
						?>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	