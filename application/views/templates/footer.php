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
			
			
			//ajax for the registration form
			// .live() so that the event handler stays even when content is changed dynamically
			$('#registration-form-submit').live('click', function(){
				var form_data = {
					reg_name : $('#reg_name').val(),
					reg_email : $('#reg_email').val(),
					reg_password : $('#reg_password').val(),
					reg_password_confirm : $('#reg_password_confirm').val()
					};
				
				$.ajax({
					type:	'post',
					url:	'<?= base_url("index.php/freeter/register") ?>',
					data:	form_data,
					success: function(result)
					{
						$('#registration-box').html(result);
					}
				});
				return false;
			});
			
			// ajax request for profile box on click
			$('[data-toggle="modal"]').click(function(){
				var id = $(this).data('id');
					
				$.ajax({
					type:	'post',
					url:	'<?= base_url("index.php/freeter/get_profile")."/" ?>' + id,
					success: function(result)
					{
						$('#profile-box').html(result);
					}
					
				});
			});

		});
	</script>
	
  </body>
</html>