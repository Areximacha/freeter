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
			
			
			//link the orphan button in the modal to the form
			$('#registration-form-submit').on('click', function(e){
				// We don't want this to act as a link so cancel the link action
				e.preventDefault();

				// Find form and submit it
				$('#registration-form').submit();
			});
			
			$('[data-toggle="modal"]').click(function(){
				var id = $(this).data('id');
								
				$.ajax({
					type:	'get',
					url:	'http://localhost/freeter/index.php/freeter/jenktest',
					data:	{'id':id},
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