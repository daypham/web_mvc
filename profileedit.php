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
<?php
	$id = Session::get('customer_id');
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
        $update_customer = $cs->update_customer($_POST, $id);
    } 
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
    		<div class="heading">
    		<h3>Update Profile Customer</h3>
    		<?php
    			if($update_customer){
    				echo $update_customer;
    			} 
    		?>
    		</div>
    		<div class="clear"></div>
    	</div>
			<form action="" method="post">
			<table class="tblone">
				<?php
					$id = Session::get('customer_id');
					$get_customer = $cs->show_customer($id);
					if($get_customer){
						while($result_customer = $get_customer->fetch_array()){
				?>
				<tr>
					<td>Name:</td>
					<td><input type="text" name="name" value="<?php echo $result_customer['name']?>"> </td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="text" name="email" value="<?php echo $result_customer['email']?>"> </td>
				</tr>
				<tr>
					<td>Phone:</td>
					<td><input type="text" name="phone" value="<?php echo $result_customer['phone']?>"> </td>
				</tr>
				<tr>
					<td>Address:</td>
					<td><input type="text" name="address" value="<?php echo $result_customer['address']?>"> </td>
				</tr>

				<tr>
					<td colspan="3"><input type="submit" name="update" value="Update"></td>
				</tr>
				<?php
					}
					}  
				?>
			</table>
		</form>
 		</div>
 	</div>
	</div>
	<?php
	include('inc/footer.php');
?>