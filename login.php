<?php
	include('inc/header.php');
?>
<?php
	$login_check = Session::get('customer_login');
	if($login_check){
		header('Location: order.php');
	}
?>
<?php 
 if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

        $insert_customer = $cs->insert_customer($_POST);
    }
 ?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){

        $login_customer = $cs->login_customer($_POST);
    } 
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<?php
    			if(isset($login_customer)){
    				echo $login_customer;
    			} 
    		?>
        	<form action="" method="post">
                	<input type="text" name="email" class="field" placeholder="Email đăng nhập">
                    <input type="password" name="password" class="field" placeholder="Mật khẩu">
                 
                 <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><input type="submit" name ="login" class="grey" value="Đăng nhập"></div></div>
                    </form>
                    </div>

    	<div class="register_account">
    		<h3>Register New Account</h3>
    		<?php
    			if(isset($insert_customer)){
    				echo $insert_customer;
    			} 
    		?>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Tên" >
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Thành phố">
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="Zip-code">
							</div>
							<div>
								<input type="text" name="email" placeholder="Email">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Địa chỉ">
						</div>
		    		<div>
						<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Select a Country</option>         
							<option value="1">Afghanistan</option>

		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Số điện thoại">
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder="password">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input type="submit" name ="submit" class="grey" value="Create Account"></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php
	include('inc/footer.php');
?>