    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>
	<script src="../assets/js/jquery.isotope.min.js"></script>

	<!-- Custom scripts -->
	
	<script type="text/javascript">
		$(document).ready(function(){

			$(window).smartresize(function(){
			   $container.isotope({
				 resizable: false, // disable normal resizing
				 masonry: { columnWidth: $container.width() / 4 }
			   });
			   // trigger resize to trigger isotope
			}).smartresize();
			 
		});
	</script>
	
  </body>
</html>