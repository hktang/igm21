<?php 
  require_once("includes/apn-functions.php");
  
  $page_name = "logistics";
  $page_title = MEETING_NAME . ": logistics information";
  $ps_script = '<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
				<script type="text/javascript" src="includes/apn-load-home-map.js"></script>'."\n";
  
  
  include_once("templates/header.php");
?>
	
	<?php include_once "templates/jumbotron.php"; ?>
	
    <div class="row">
	  <?php include_once "templates/sidebar.php"; ?>
      <div class="col-md-8 apn-main-content">
		<h1>Logistics Information</h1>
          <h3>Forthcoming...</h3>

      </div> <!-- col-lg-8 -->
    </div> <!-- row -->
<?php include_once "templates/footer.php"; ?>