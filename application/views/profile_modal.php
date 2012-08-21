<div id="profile-box">	
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h2><?= $profile['0']['name'] ?></h2>
		<h4><?= $profile['0']['title'] ?></h4>
	</div>
	<div class="modal-body">
		<img src="<?php if (isset($profile['0']['profilepic'])){
			echo base_url($profile['0']['profilepic']);
		}
		else{
			echo base_url('assets/profilepics/default.jpg');
		}
		?>" />
		<p>Email: <a href="mailto:<?= $profile['0']['email'] ?>"><?= $profile['0']['email'] ?></a></p>
		<p>TEL: <?= $profile['0']['tel'] ?></p>
		<p>Homepage: <a href="#"><?= $profile['0']['url'] ?></a></p>
		<p>Bio: <?= $profile['0']['bio'] ?></p>
		<p>Tags: <?php 
					$list_of_tags_for_user = array();
					foreach ($profile['tags'] as $profile_tag){
						array_push($list_of_tags_for_user, $profile_tag['tag']); 
					} 
					echo implode(', ', $list_of_tags_for_user);
					?></p>
	</div>
	<div class="modal-footer">
	<a href="#" class="btn" data-dismiss="modal">Close</a>
	</div>
</div>