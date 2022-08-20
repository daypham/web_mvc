<?php
	include('inc/header.php');
?>
<?php
		if(!isset($_GET['catid']) || $_GET['catid']==NULL){
        echo "<script>window.location = '404.php' </script>";
    }else{
        $id = $_GET['catid'];
    }

    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     $catName = $_POST['catName'];

    //     $update_cat = $cat->update_category($catName, $id);
    // }  
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    			<?php
	      		$productbyname = $cat->getcatId($id);
	      		if($productbyname){
	      			while($resultbyname = $productbyname->fetch_array()){
	      	?>
    		<h3>Danh mục: <?php echo $resultbyname['cateName']?></h3>
    		<?php
    		}
    		} 
    		?>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php
	      		$productbycat = $cat->get_product_by_cat($id);
	      		if($productbycat){
	      			while($resultbycat = $productbycat->fetch_array()){
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

