<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?= base_url() ?>"><img src="<?= base_url('assets/img/logo2.png" alt="Freeter') ?>" /></a>
          <div class="nav-collapse">
			
			<div id="top-right">
			<!-- This needs to become dynamic content-->
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
								
								<p><?= validation_errors() ?></p>
								
								<?php echo form_close(); ?>
							
						</div>
					</li>
				</ul>
			</div>
			
			
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
					<a href="#" data-filter=".<?php $format_tag = str_replace(" ", "_", $tag_item['tag']); echo $format_tag; ?>"><?= $tag_item['tag'] ?></a>
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
		?> <?php foreach($profile_item['tags'] as $profile_tags)
					{
						$format_tag = str_replace(" ", "_", $profile_tags['tag']);
						echo $format_tag." ";
					}?>" data-toggle="modal" href="#content-box">
          <?php if($profile_item['profilepic']){ ?>
			<img src="<?= base_url($profile_item['profilepic']) ?>" />
		  <?php } ?>
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
			<p class="pull-right"><a href="<?= base_url() ?>">Home</a> . <a href="<?= base_url('index.php/about') ?>">About</a> . <a href="mailto:areximacha@areximacha.com">Contact</a></p>
		</div>
      </footer>
	  
	  <!-- Dynamic content modal -->
	  
	  <div class="modal fade hide" id="content-box">
		<!-- dynamic content goes here from views-->
	  </div>

    </div> <!-- /container -->