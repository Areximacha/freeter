    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-transition.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-alert.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-modal.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-dropdown.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-scrollspy.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-tab.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-tooltip.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-popover.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-button.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-collapse.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-carousel.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-typeahead.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.isotope.min.js') ?>"></script>

	<!-- Custom scripts -->
	
	<script type="text/javascript">
		$(document).ready(function(){

			// slidetoggle script for displaying the filter menu
			$("#filterButton").click(function(){
				$("#filter").slideToggle("slow");
				$(this).toggleClass("active");
				 return false;
			});
			
			// isotope for the profiles
			var $container = $('#content');
			$container.isotope({
				containerStyle: {
					overflow: 'visible',
					position: 'relative'
				},
				filter: '*',
				animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false,
				}
			});
			
			// profile filtering with isotope
			$('#filter a').click(function(){
				var $this = $(this),
				isoFilters = [],
				$pills = $this.parents('li'),
				$navPills = $this.parents('.nav-pills'),
				prop, selector;
					
				$this.toggleClass('selected');
				$pills.toggleClass('active');
					
				isoFilters = ($navPills.find('.selected').toArray().map(function(a){
					return $(a).attr('data-filter')
				}));
					
				selector = isoFilters.join('');
				$container.isotope({
					filter: selector,
					animationOptions: {
						duration: 750,
						easing: 'linear',
						queue: false,
					}
				});
			return false;
			});
			
			// Allowing clicking of email links within the clickable profile divs
			$('.profile-email').click(function(event){
				event.stopImmediatePropagation();
				//alert('link')
			});

			//triggering isotope after resizing
			$(window).smartresize(function(){
			   $container.isotope({
				 resizable: false, // disable normal resizing
				 masonry: { columnWidth: $container.width() / 4 }
			   });
			   // trigger resize to trigger isotope
			}).smartresize();
			
			//allow registration link to open the form view through the controller
			$('#reg_link').on('click', function(){
				$.ajax({
					url:	'<?= base_url("index.php/freeter/register") ?>',
					success: function(result)
					{
						$('#content-box').html(result);
					}
				});
			});
			
			//ajax for the registration form
			$('#content-box').on('click', '#registration-form-submit', function(){
				var form_data = {
					name : $('#name').val(),
					email : $('#email').val(),
					password : $('#password').val(),
					password_confirm : $('#password_confirm').val()
					};
				
				$.ajax({
					type:	'post',
					url:	'<?= base_url("index.php/freeter/register") ?>',
					data:	form_data,
					success: function(result)
					{
						$('#content-box').html(result);
					}
				});
				return false;
			});
			
			//ajax request for login form
			//$('#top-right').on('click', '#login_submit', function(){
			
			//	var login_data = {
			//		email : $('#login_email').val(),
			//		password : $('#login_password').val()
			//		};
			//	
			//	$.ajax({
			//		type:	'post',
			//		url:	'<?= base_url("index.php/freeter/login_user") ?>',
			//		data:	login_data,
			//		success: function(result)
			//		{
			//			$('#top-right').html(result);
			//		}
			//	});
			//	return false;
			//});
			<?php if(isset($logged_in_profile) && $logged_in_profile['0']['id'] == 1) { ?>
				$('.profile').click(function(){
					var id = $(this).data('id');
					
					$.ajax({
						type:	'post',
						url:	'<?= base_url("index.php/freeter/open_edit_profile") ?>',
						data: {'id': id},
						success: function(result)
						{
							$('#content-box').html(result);
						}
					});
				
				});
			<?php } else { ?>
			// ajax request for profile box on click
			$('.profile').click(function(){
				var id = $(this).data('id');
					
				$.ajax({
					type:	'post',
					url:	'<?= base_url("index.php/freeter/get_profile")."/" ?>' + id,
					success: function(result)
					{
						$('#content-box').html(result);
					}
					
				});
			});
			<?php }?>
			
			$('#content-box').on('click', '#delete_profile', function(){
				var id = $(this).data('id');
				
				if(confirm("Are you sure you want to delete this profile and account?")) {
					$.ajax({
					type:	'post',
					url:	'<?= base_url("index.php/admin/delete_profile") ?>',
					data: {'id': id},
					success: function(result)
					{
						$('#content-box').html(result);
					}
					
				});
				}
				return false;
			
			});
			
			//allow name link to open the edit profile form view through the controller
			$('#top-right').on('click', '#edit_profile_link', function(){
				
				$.ajax({
					url:	'<?= base_url("index.php/freeter/open_edit_profile") ?>',
					success: function(result)
					{
						$('#content-box').html(result);
					}
				});
			});

		});
	</script>
	
  </body>
</html>