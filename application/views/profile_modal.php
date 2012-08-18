<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h2><?= $profile['0']['name'] ?></h2>
	<h4><?= $profile['0']['title'] ?></h4>
</div>
<div class="modal-body">
	<img src="<?= base_url('assets/profilepics/default.jpg') ?>" />
	<p>Email: <a href="#"><?= $profile['0']['email'] ?></a></p>
	<p>TEL: <?= $profile['0']['tel'] ?></p>
	<p>Homepage: <a href="#">http://www.yourhomepage.com</a></p>
	<p>Bio: Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada 
	magna mollis euismod. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta 
	sem malesuada magna mollis euismod.</p>
	<p>Tags: HTML, CSS, PHP, JavaScript, Photoshop, Fireworks, Java, Processing, Video Editing, Audio editing, Graphic design</p>
</div>
<div class="modal-footer">
<a href="#" class="btn" data-dismiss="modal">Close</a>
</div>