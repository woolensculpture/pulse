<div id="login_form" class="border general_wrap">

	<h1>User Login</h1>
	<br>
    <?php 
	echo form_open('login/validate_credentials');
	echo 'Username';
	echo form_input('username', '');
	echo 'Password';
	echo form_password('password', '');
	echo form_submit('submit', 'Login');
	//echo anchor('login/signup', 'Create Account');
	echo form_close();
	echo "<div class='error'>" . $login_error . "</div>";
	?>

</div><!-- end login_form-->