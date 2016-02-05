<?php 
  require_once 'includes/apn-functions.php';  //must include in all pages

  $page_name = 'home';
  $page_title = MEETING_NAME.', '.MEETING_LOCATION;
  $ps_script = '<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
				<script type="text/javascript" src="includes/apn-load-home-map.js"></script>'."\n";

  include_once 'templates/header.php';

  //require_once("includes/apn-functions.php");

?>

	<?php include_once 'templates/jumbotron.php'; ?>
	
    <div class="row">
	  <?php include_once 'templates/sidebar.php'; ?>
      
	  <div class="col-md-8 apn-main-content">
	  
		<h2><span class="glyphicon glyphicon-bullhorn"></span> Announcement</h2>
		
		<div class="home-announcement">
		  <?php include_once 'index-announcement.php'; ?>
		</div>
		
      </div> <!-- col-lg-8 -->
    </div> <!-- row -->
<?php include_once 'templates/footer.php'; ?>