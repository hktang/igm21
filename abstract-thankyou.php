<?php
  require_once 'includes/apn-functions.php';

  $page_name = 'abstract-submission';
  $page_title = 'Abstract received';
  $ps_script = '<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
				<script type="text/javascript" src="includes/apn-load-home-map.js"></script>'."\n";

  include_once 'templates/header.php';

  require_once '../../forms/global/api/api.php';

  $fields = ft_api_init_form_page();

  //setups for displaying submission
  $fields = array_merge($_SESSION['form_tools_form'], $_POST);

  ft_api_clear_form_sessions();

?>

	  <?php include_once 'templates/jumbotron.php'; ?>
      <div class="row">
		<?php include_once 'templates/sidebar.php'; ?>
		
		 <?php if (!$fields['submit']): ?>
		    
			<h2><span class="glyphicon glyphicon-remove-circle"></span> Nothing to display.</h2>

		 <?php else: ?>
		  
		<h1>Thank you!</h1>
		<p>Your abstract has been submitted successfully. We will keep you informed about the selection results.</p>
     
		<?php endif; ?>


	 </div> <!-- row -->

<?php include_once 'templates/footer.php'; ?>