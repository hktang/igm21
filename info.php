<?php 
  require_once 'includes/apn-functions.php';

  $page_name = 'info';
  $page_title = MEETING_NAME.', '.MEETING_LOCATION;
  /*
  $ps_script = '<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
                <script type="text/javascript" src="includes/apn-load-home-map.js"></script>'."\n";
  */

  include_once 'templates/header.php';
?>

	<?php include_once 'templates/jumbotron.php'; ?>
	
    <div class="row">
	  <?php include_once 'templates/sidebar.php'; ?>
      
	  <div class="col-md-8 col-md-offset-1 apn-main-content">
	  
		<h2><span class="glyphicon glyphicon-info-sign"></span> General information</h2>
		
		<div class="home-info">
			<!-- information -->
			<p>Forthcoming...</>
		</div><!-- .home-info -->
		
      </div> <!-- col-lg-8 -->
    </div> <!-- row -->
<?php include_once 'templates/footer.php'; ?>