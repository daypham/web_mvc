<?php
	include('inc/header.php');
?>
<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $tukhoa = $_POST['tukhoa'];

        $search_product = $pro->search_product($tukhoa);
    }  
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Từ khóa tìm kiếm: <?php echo $tukhoa?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php
	      		if($search_product){
	      			while($resultbycat = $search_product->fetch_array()){
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="admin/uploads/<?php echo $resultbycat['productImg']?>" alt="" /></a>
					 <h2><?php echo $resultbycat['productName']?></h2>
					 <p><?php echo $fm->textShorten($resultbycat['productDesc'], 30)?></p>
					 <p><span class="price"><?php echo $resultbycat['productPrice']?></span></p>
				     <div class="button"><span><a href="details.php?proId=<?php echo $resultbycat['productId']?>" class="details">Details</a></span></div>
				</div>
				<?php
				}
				}else{
					echo 'Danh mục rỗng!!!';
				}
				?>
				
			</div>

	
	
    </div>
 </div>
</div>
<?php
	include('inc/footer.php');
?>

