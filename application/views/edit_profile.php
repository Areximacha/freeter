<div id="profile-edit-box">
<?php
	$form_attributes = array(
		'name' => 'edit_profile',
		'id' => 'edit_profile'
	);
	echo form_open(base_url('index.php/freeter/register'), $form_attributes);
?>
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h2>Edit Profile</h2>
		</div>
		<div class="modal-body">
		<?php
			$name_attributes = array(
				'name' => 'editname',
				'id' => 'editname',
				'value' => set_value('name')
			);
			
			$title_attributes = array(
				'name' => 'edittitle',
				'id' => 'edittitle',
				'value' => set_value('title')
			);
			
			$email_attributes = array(
				'name' => 'editemail',
				'id' => 'editemail',
				'value' => set_value('email')
			);
			
			$tel_attributes = array(
				'name' => 'edittel',
				'id' => 'edittel',
				'value' => set_value('tel')
			);
			
			$url_attributes = array(
				'name' => 'editurl',
				'id' => 'editurl',
				'value' => set_value('url')
			);
			
			$bio_attributes = array(
				'name' => 'editbio',
				'id' => 'editbio',
				'rows' => '4',
				'class' => 'span4',
				'placeholder' => 'Type a short description about yourself here...'
			);
		?>
			<img src="assets/profilepics/default.jpg" />
			<div class="input-group">
				<label for="editname">Name </label><input type="text" name="editname" id="editname">
			</div>
			<div class="input-group">
				<label for="edittitle">Title </label><input type="text" name="edittitle" id="edittitle">
			</div>
			<div class="input-group">
				<label for="editemail">Email </label><input type="text" name="editemail" id="editemail">
			</div>
			<div class="input-group">
				<label for="edittel">Tel </label><input type="text" name="edittel" id="edittel">
			</div>
			<div class="input-group">
				<label for="editurl">Homepage </label><input type="text" name="editurl" id="editurl">
			</div>
			<div class="input-group">
				<label for="editbio">Bio </label><textarea name="editbio" id="editbio" rows="4" class="span4" placeholder="Type a short description about yourself here..."></textarea>
			</div>
			<div class="tag-group">
				<label>Tags</label>
				
					<label class="checkbox inline">
						<input type="checkbox" id="html" value="html"> html
					</label>
					<label class="checkbox inline">
						<input type="checkbox" id="javascript" value="javascript"> javascript
					</label>
					<label class="checkbox inline">
						<input type="checkbox" id="css" value="css"> css
					</label>
					
				
			</div>
			<div class="input-group">
				<label for="editurl">Add tags </label><input type="text" name="addtags" id="addtags" class="input-xlarge" placeholder="Add tags separated by commas...">
			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a id="profile-edit-submit" href="#" class="btn btn-primary">Save Changes</a>
		</div>
	
</div>