<?php
	include('inc/header.php');
	 // include('inc/slider.php');
?>
<?php
	$login_check = Session::get('customer_login');
	  	 if($login_check == false){
	  	 	header('Location: login.php');
	  	 }else{
	  	 	
	  	 } 
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
    		<div class="heading">
    		<h3>Profile Customer</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			
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
				<tr>
					<td colspan="3"><a href="profileedit.php">Update Profile</a></td>
				</tr>
				<?php
					}
					}  
				?>
			</table>
 		</div>
 	</div>
	</div>
	<?php
	include('inc/footer.php');
?>