<div id="nav-profile" class="pull-right">
	<a id="edit_profile_link" href="#content-box" data-toggle="modal" class="navbar-link"><strong><?= $logged_in_profile['0']['name']?></strong></a>
	<img src="<?php if (isset($logged_in_profile['0']['profilepic'])){
			echo base_url($logged_in_profile['0']['profilepic']);
		}
		else{
			echo base_url('assets/profilepics/default.jpg');
		}
		?>" />
	<form id="logout_form" name="logout_form">
		<input class="btn btn-primary" style="margin:0; clear: left; height: 32px; font-size: 13px;" type="submit" name="logout" value="Logout" />
	</form>
</div>