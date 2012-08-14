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
				<li>
					<a href="#" data-filter=".html">HTML</a>
				</li>
				<li>
					<a href="#" data-filter=".javascript">JavaScript</a>
				</li>
				<li>
					<a href="#" data-filter=".css">CSS</a>
				</li>
			</ul>
		</div>
	</div>

    <div id="main" class="container">

      <!-- content -->
      <div id="content" class="row">
		<!-- test stuff -->
		<?php foreach ($profiles as $profile_item): ?>
		<div class="profile span3 html css" data-toggle="modal" href="#profile-box">
          <div class="details">
			<h2><?= $profile_item['name'] ?></h2>
			<h4><?= $profile_item['title'] ?></h4>
			<p>Email: <a href="mailto:<?= $profile_item['email'] ?>"><?= $profile_item['email'] ?></a></p>
			<p>Tel: <?= $profile_item['tel'] ?></p>
          </div>
        </div>
		<?php endforeach ?>
        <div class="profile span3 html css" data-toggle="modal" href="#profile-box">
          <div class="details">
			<h2>Pete Goodman</h2>
			<h4>Web developer</h4>
			<p>Email: <a href="#" class="profile-email">pete.g@gmail.com</a></p>
			<p>Tel: 07723 373 820</p>
          </div>
        </div>
        <div class="profile wide span6 javascript" data-toggle="modal" href="#profile-box">
          <img src="<?= base_url('assets/profilepics/01.jpg') ?>" />
		  <div class="details">
			  <h2>Stuart Gilbert</h2>
			  <h4>Perl Developer</h4>
			  <p>Email: <a href="#">giblet@gmail.com</a></p>
			  <p>Tel: 07767 475 063</p>
		  </div>
		</div>
        <div class="profile span3 html" data-toggle="modal" href="#profile-box">
          <div class="details">
			  <h2>Clark Kent</h2>
			  <h4>Man of Steel</h4>
			  <p>Email: <a href="#">superman@jla.com</a></p>
			  <p>Tel: 07781 680 434</p>
		  </div>
		</div>
		<div class="profile long span3 javascript html" data-toggle="modal" href="#profile-box">
          <img src="<?= base_url('assets/profilepics/02.jpg') ?>" />
		  <div class="details">
			  <h2>Amy Stapleton</h2>
			  <h4>Graphic designer</h4>
			  <p>Email: <a href="#">amy.stapleton@yahoo.com</a></p>
			  <p>Tel: 07745 375 877</p>
		  </div>
		</div>
		<div class="profile span3 css" data-toggle="modal" href="#profile-box">
          <div class="details">
			  <h2>Bruce Wayne</h2>
			  <h4>Detective</h4>
			  <p>Email: <a href="#">batman@jla.com</a></p>
			  <p>Tel: 07767 475 063</p>
		  </div>
		</div>
		<div class="profile wide span6 javascript css" data-toggle="modal" href="#profile-box">
          <img src="<?= base_url('assets/profilepics/03.jpg') ?>" />
		  <div class="details">
			  <h2>Jay Tang</h2>
			  <h4>Web application developer</h4>
			  <p>Email: <a href="#">min.arachno@gmail.com</a></p>
			  <p>Tel: 07713 243 456</p>
          </div>
		</div>
		<div class="profile span3 html css javascript" data-toggle="modal" href="#profile-box">
          <div class="details">
			  <h2>Barry Allen</h2>
			  <h4>Fastest man alive</h4>
			  <p>Email: <a href="#">flash@jla.com</a></p>
			  <p>Tel: 07786 434 986</p>
		  </div>
		</div>
		<div class="profile span3 css" data-toggle="modal" href="#profile-box">
          <div class="details">
			  <h2>Jesse Custer</h2>
			  <h4>Preacher</h4>
			  <p>Email: <a href="#">word.of@god.com</a></p>
			  <p>Tel: 07789 053 137</p>
		  </div>
		</div>
		<div class="profile long span3 html" data-toggle="modal" href="#profile-box">
          <img src="<?= base_url('assets/profilepics/04.jpg') ?>" />
		  <div class="details">
			  <h2>Melody To</h2>
			  <h4>Web designer</h4>
			  <p>Email: <a href="#">mel.to@yahoo.com</a></p>
			  <p>Tel: 07798 834 326</p>
          </div>
		</div>
		<div class="profile span3 html css" data-toggle="modal" href="#profile-box">
          <div class="details">
			  <h2>Jennifer Walters</h2>
			  <h4>Lawyer</h4>
			  <p>Email: <a href="#">shulkie@avengers.com</a></p>
			  <p>Tel: 07785 236 789</p>
          </div>
		</div>
      </div>
	  <!-- end of content -->
	  
	  <!-- profile box modal -->
	  
	    <div class="modal fade hide" id="profile-box">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2>Person's Name</h2>
				<h4>Job Title</h4>
			</div>
			<div class="modal-body">
				<img src="<?= base_url('assets/profilepics/default.jpg') ?>" />
				<p>Email: <a href="#">email@address.com</a></p>
				<p>TEL: 07739 325 642</p>
				<p>Homepage: <a href="#">http://www.yourhomepage.com</a></p>
				<p>Bio: Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada 
				magna mollis euismod. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta 
				sem malesuada magna mollis euismod.</p>
				<p>Tags: HTML, CSS, PHP, JavaScript, Photoshop, Fireworks, Java, Processing, Video Editing, Audio editing, Graphic design</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
			</div>
		</div>


      <footer>
        <div class="container">
			<p class="pull-left"><a href="#registration-box" data-toggle="modal">New to Freeter? <strong>Sign up</strong></a></p>
			<p class="pull-right"><a href="about/">About</a> . <a href="mailto:areximacha@areximacha.com">Contact</a></p>
		</div>
      </footer>
	  
	  <div class="modal fade hide" id="registration-box">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2>Sign Up</h2>
				<h4>Enter your name, email and password to sign up</h4>
			</div>
			<div class="modal-body">
				<form id="registration-form" class="form-horizontal" method="post">
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="name">Name</label>
							<div class="controls">
								<input type="text" class="input-xlarge" id="name">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="email">Email</label>
							<div class="controls">
								<input type="text" class="input-xlarge" id="email">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="password">Password</label>
							<div class="controls">
								<div>
								<input type="password" class="input-medium" id="password">
								<input type="password" class="input-medium" id="password-confirm">
								<p class="help-block" style="margin-left: 225px;">Confirm</p>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a id="registration-form-submit" href="#" class="btn btn-primary">Submit</a>
			</div>
	  </div>

    </div> <!-- /container -->