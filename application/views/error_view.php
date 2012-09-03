<div class="modal" id="content-box">
	<div id="error-box">	
		<div class="modal-header">
			
			<h2>Error</h2>			
		</div>
		<div class="modal-body">
			<div class="alert alert-error">
				<p>An error occured whilst updating your profile. Please try again.</p>
				<p><?= validation_errors() ?></p>
				<?php if($profilepic_fail == TRUE)
				{ ?>
					<p>The profile picture you have uploaded is too large or an invalid filetype.</p>
					
				<?php
				}
				?>
			</div>
		</div>
		<div class="modal-footer">
		<a href="<?php echo base_url() ?>" class="btn" data-dismiss="modal">Back</a>
		</div>
	</div>
</div>