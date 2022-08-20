<?php
	include('inc/header.php');
	 // include('inc/slider.php');
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
    		<h3>Oneline payment</h3>
    		</div>
    		<div class="clear"></div>
    		<div class="">
    			<h3 class="payment">Chọn cổng thanh toán!!!</h3>
    			<form action="congthanhtoan.php" method="post">
    				<input type="submit" name="redirect" id="redirect" class="btn btn-success" value="VNPAY">
    			</form>
    			
    			
    		</div>
 		</div>

 	</div>
</div>
</form>
	<?php
	include('inc/footer.php');
?>