<ul class="nav pull-right navbar-text">
	<li class="dropdown">
		<a href="#" class="dropdown-toggle navbar-link" data-toggle="dropdown">Already have an account? <strong>Sign in</strong></a>
		
		<div class="dropdown-menu dropdown-form">
			<?php
				$form_attributes = array(
					'name' => 'login-form',
					'id' => 'login-form', 
					'style' => 'line-height: 40px'
				);
				echo form_open(base_url('index.php/freeter/login_user'), $form_attributes);
				
				$login_email_attributes = array(
					'id' => 'login_email',
					'style' => 'margin: 0 2px 15px;',
					'name' => 'email',
					'size' => '30',
					'placeholder' => 'Email',
					'value' => ''
				);
				
				$login_password_attributes = array(
					'id' => 'login_password',
					'style' => 'margin: 0 2px 15px;',
					'name' => 'password',
					'size' => '30',
					'placeholder' => 'Password',
					'value' => ''
				);
				
				$login_submit_attributes = array(
					'id' => 'login_submit',
					'class' => 'btn btn-primary',
					'style' => 'margin:0; clear: left; width: 100%; max-width: 400px; height: 32px; font-size: 13px;',
					'type' => 'submit',
					'name' => 'login_submit'
				);
				
				echo form_input($login_email_attributes);
				echo form_password($login_password_attributes);
			?>
				<br />						 
				<?php echo form_submit($login_submit_attributes, 'Sign In'); ?>
				
				<div class="alert alert-error"><?= validation_errors() ?></div>
			
		</div>
	</li>
</ul>