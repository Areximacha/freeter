<div id="registration-box">
<?php
	$form_attributes = array(
		'name' => 'registration-form',
		'id' => 'registration-form', 
		'class' => 'form-horizontal'
	);
	echo form_open(base_url('index.php/freeter/register'), $form_attributes);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h2>Sign Up</h2>
		<h4>Enter your name, email and password to sign up</h4>
	</div>
	<div class="modal-body">
		<!--Add codeigniter form here -->
			
		<?php
			$name_attributes = array(
				'class' => 'input-xlarge',
				'name' => 'name',
				'id' => 'name',
				'value' => set_value('name')
			);
			
			$email_attributes = array(
				'class' => 'input-xlarge',
				'name' => 'email',
				'id' => 'email',
				'value' => set_value('email')
			);

			$password_attributes = array(
				'class' => 'input-medium',
				'name' => 'password',
				'id' => 'password',
				'value' => ''
			);

			$passwordconfirm_attributes = array(
				'class' => 'input-medium',
				'name' => 'password_confirm',
				'id' => 'password_confirm',
				'value' => ''
			);
				
			$submit_attributes = array(
				'class' => 'btn btn-primary',
				'name' => 'registration-form-submit',
				'id' => 'registration-form-submit',
			);
		?>
		<fieldset>
			<div class="control-group">
				<label class="control-label" for="name">Name</label>
				<div class="controls">
					<?php echo form_input($name_attributes); ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="email">Email</label>
				<div class="controls">
					<?php echo form_input($email_attributes); ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="password">Password</label>
				<div class="controls">
					<div>
						<?php echo form_password($password_attributes); ?>
						<?php echo form_password($passwordconfirm_attributes); ?>
						<p class="help-block" style="margin-left: 225px;">Confirm</p>
					</div>
				</div>
				<?php 
				if(validation_errors())
				{
				?>
					<div class="alert alert-error">
						<p><?= validation_errors() ?></p>
					</div>
				<?php
				}
				?>
			
			</div>
		</fieldset>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
		<?php echo form_submit($submit_attributes, 'Submit'); ?>			
	</div>
</div>