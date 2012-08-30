<div id="profile-edit-box">
<?php
	$form_attributes = array(
		'name' => 'edit_profile',
		'id' => 'edit_profile'
	);
	
	if($logged_in_profile['0']['id'] == 1)
	{
		$hidden = array(
			'id' => $selected_profile['0']['id']
		);
	}
	else
	{
		$hidden = array();
	}
	
	echo form_open_multipart(base_url('index.php/freeter/edit_profile'), $form_attributes, $hidden);
?>
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h2>Edit Profile</h2>
			<h4><?= $selected_profile['0']['email'] ?></h4>
		</div>
		<div class="modal-body">
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
		<?php
			$name_attributes = array(
				'name' => 'editname',
				'id' => 'editname',
				'value' => htmlspecialchars_decode($selected_profile['0']['name'])
			);
			
			$title_attributes = array(
				'name' => 'edittitle',
				'id' => 'edittitle',
				'value' => htmlspecialchars_decode($selected_profile['0']['title'])
			);
			
			$tel_attributes = array(
				'name' => 'edittel',
				'id' => 'edittel',
				'value' => htmlspecialchars_decode($selected_profile['0']['tel'])
			);
			
			$url_attributes = array(
				'name' => 'editurl',
				'id' => 'editurl',
				'value' => htmlspecialchars_decode($selected_profile['0']['url'])
			);
			
			$upload_attributes = array(
				'name' => 'profilepic',
				'id' => 'profilepic',
			);
			
			$bio_attributes = array(
				'name' => 'editbio',
				'id' => 'editbio',
				'rows' => '4',
				'class' => 'span4',
				'placeholder' => 'Type a short description about yourself here...',
				'value' => htmlspecialchars_decode($selected_profile['0']['bio'])
			);
			
			$addtags_attributes = array(
				'name' => 'addtags',
				'id' => 'addtags',
				'class' => 'span4',
				'placeholder' => 'Add tags without spaces and separated by commas...',
				'value' => ''
			);
			
			$save_attributes = array(
				'class' => 'btn btn-primary',
				'name' => 'profile-edit-submit',
				'id' => 'profile-edit-submit',
			);
		?>
			<img src="<?php if (isset($selected_profile['0']['profilepic'])){
								echo base_url($selected_profile['0']['profilepic']);
							}
							else{
								echo base_url('assets/profilepics/default.jpg');
							}
						?>" />
						
			<div class="input-group">
				<label for="editname">Name </label><?php echo form_input($name_attributes); ?>
			</div>
			<div class="input-group">
				<label for="edittitle">Title </label><?php echo form_input($title_attributes); ?>
			</div>
			<div class="input-group">
				<label for="edittel">Tel </label><?php echo form_input($tel_attributes); ?>
			</div>
			<div class="input-group">
				<label for="editurl">Homepage </label><?php echo form_input($url_attributes); ?>
			</div>
			<div class="input-group">
				<label for="editprofilepic">Profile pic </label><?php echo form_upload($upload_attributes); ?>
			</div>
			<div class="input-group">
				<label for="editbio">Bio </label><?php echo form_textarea($bio_attributes); ?>
			</div>
			<div class="tag-group">
				<label>Tags</label>
					
					<?php foreach ($tags as $tag_item): ?>
					<label class="checkbox inline">
						<?php 
							$istagged = false;
							foreach ($logged_in_profile['tags'] as $row)
							{
								if ($row['tag'] == $tag_item['tag'])
								{
									$istagged = true;
								}
							}
							
							if($istagged == true)
							{
								echo form_checkbox('tags[]', $tag_item['id'], TRUE);
								echo " ".$tag_item['tag'];
							}
							else
							{
								echo form_checkbox('tags[]', $tag_item['id'], FALSE);
								echo " ".$tag_item['tag'];
							}
							
						?>
					</label>
					<?php endforeach ?>
					
			</div>
			<div class="input-group">
				<label for="addtags">Add tags </label><?php echo form_input($addtags_attributes); ?>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<?php echo form_submit($save_attributes, 'Save Changes'); ?>
			<?php
			if($logged_in_profile['0']['id'] == 1)
			{
				echo form_submit(array('class' => 'btn btn-danger',
				'name' => 'delete_profile',
				'id' => 'delete_profile',
				'data-id' => $selected_profile['0']['id']), 'Delete');
			}
			?>
		</div>
	
</div>