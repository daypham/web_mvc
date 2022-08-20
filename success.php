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
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<h3>Success Order</h3>
    	</br>
    	<p>Chúng tôi sẽ liên hệ lại cho bạn sớm nhất!!!</p>
    	<a href="orderdetails.php">Đơn hàng của tôi</a>
		
 		</div>
 	</div>
</div>
	<?php
	include('inc/footer.php');
?>