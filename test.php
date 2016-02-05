<?php 
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  require_once 'includes/apn-functions.php';  //must include in all pages
  require_once 'includes/apn-class-lib.php';

  $page_name = 'test';
  $page_title = MEETING_NAME.', '.MEETING_LOCATION;
  $ps_script = '<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
				<script type="text/javascript" src="includes/apn-load-home-map.js"></script>'."\n";

  include_once 'templates/header.php';

?>

	<?php //include_once "templates/jumbotron.php"; ?>
	
    <div class="row">
	  <?php include_once 'templates/sidebar.php'; ?>
      
	  <div class="col-md-8 apn-main-content">
	  
		<h2><span class="glyphicon glyphicon-bullhorn"></span> Test</h2>
		
		<div class="home-announcement">
		  <?php $nepalMeeting = new Apn_Igm_Meeting('20th IGM/SPG Meeting'); ?>
		  <p><?php echo $nepalMeeting->getMeetingName(); ?></p>
		  <p><?php echo $nepalMeeting->getRegistrationFormId(); ?></p>
		     <?php $nepalMeeting->setRegistrationFormId(98); ?>
		  <p><?php echo $nepalMeeting->getRegistrationFormId(); ?></p>
		     <?php $nepalMeeting->setRegistrationFormId(-100); ?>
		  <p><?php echo $nepalMeeting->getRegistrationFormId(); ?></p>
		     <?php $nepalMeeting->setRegistrationFormId(102); ?>
		  <p><?php echo $nepalMeeting->getRegistrationFormId(); ?></p>
		</div>
		
      </div> <!-- col-lg-8 -->
    </div> <!-- row -->
<?php include_once 'templates/footer.php'; ?>