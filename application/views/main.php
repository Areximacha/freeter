<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#"><img src="<?= base_url('assets/img/logo2.png" alt="Freeter') ?>" /></a>
          <div class="nav-collapse">
				
			<ul class="nav pull-right navbar-text">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle navbar-link" data-toggle="dropdown">Already have an account? <strong>Sign in</strong></a>
					<!-- dropdown login form -->
					<div class="dropdown-menu dropdown-form">
						<form style="line-height: 40px">
							<input id="user_username" style="margin-bottom: 15px;" type="text" name="user[username]" size="30" placeholder="Email" />
							<input id="user_password" style="margin-bottom: 15px;" type="password" name="user[password]" size="30" placeholder="Password" />
							<br />					 
							<input class="btn btn-primary" style="margin:0; clear: left; width: 100%; max-width: 400px; height: 32px; font-size: 13px;" type="submit" name="commit" value="Sign In" />
						</form>
					</div>
				</li>
			</ul>
			
			<ul class="nav" id="filternav">
				  <li><a href="#" id="filterButton"> Filter</a></li>
			</ul>
						
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	<div id="filter">
		<div class="container">
		<p>Toggle the tags below to filter for profiles that contain those mad skills</p>
			<ul class="nav nav-pills">
				<?php foreach ($tags as $tag_item): ?>
				<li>
					<a href="#" data-filter=".<?= $tag_item['tag'] ?>"><?= $tag_item['tag'] ?></a>
				</li>
				<?php endforeach ?>
			</ul>
		</div>
	</div>

	<!-- Main container -->
    <div id="main" class="container">

      <!-- content -->
      <div id="content" class="row">
		
		<!-- Profile boxes -->
		<?php foreach ($profiles as $profile_item): ?>
		<div data-id="<?= $profile_item['id'] ?>" class="profile 
		<?php if(isset($profile_item['profilepic']))
		{
			if(rand(0,10)>3)
			{
				if(rand(0,10)>5)
				{
					echo "long span3";
				}
				else
				{
					echo "wide span6";
				}
			}
			else
			{
				echo "small span3";
			}
		}
		else
		{
			echo "small span3";
		}
		?> <?php foreach($profile_item['tags'] as $profile_tags) echo $profile_tags['tag']." ";?>" data-toggle="modal" href="#content-box">
          <img src="<?= base_url($profile_item['profilepic']) ?>" />
		  <div class="details">
			<h2><?= $profile_item['name'] ?></h2>
			<h4><?= $profile_item['title'] ?></h4>
			<p>Email: <a href="mailto:<?= $profile_item['email'] ?>" class="profile-email"><?= $profile_item['email'] ?></a></p>
			<p>Tel: <?= $profile_item['tel'] ?></p>
			<p>
				Tags: 
					<!-- implode and output tags -->
					<?php 
					$list_of_tags_for_user = array();
					foreach ($profile_item['tags'] as $profile_tags){
						array_push($list_of_tags_for_user, $profile_tags['tag']); 
					} 
					echo implode(', ', $list_of_tags_for_user);
					?>
				
			</p>
		  </div>
        </div>
		<?php endforeach ?>
      </div>
	  <!-- end of content -->
	
      <footer>
        <div class="container">
			<p class="pull-left"><a id="reg_link" href="#content-box" data-toggle="modal">New to Freeter? <strong>Sign up</strong></a></p>
			<p class="pull-right"><a href="about/">About</a> . <a href="mailto:areximacha@areximacha.com">Contact</a></p>
		</div>
      </footer>
	  
	  <!-- Dynamic content modal -->
	  
	  <div class="modal fade hide" id="content-box">
		<!-- dynamic content goes here from views-->
	  </div>

    </div> <!-- /container -->