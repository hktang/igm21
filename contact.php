<?php 
  require_once("includes/apn-functions.php");
  
  $page_name = "contact";
  $page_title = MEETING_NAME . ": contact information";
  $ps_script = '<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
				<script type="text/javascript" src="includes/apn-load-home-map.js"></script>'."\n";
  
  
  include_once("templates/header.php");
?>
	
	<?php include_once "templates/jumbotron.php"; ?>
	
    <div class="row">
	  <?php include_once "templates/sidebar.php"; ?>
      <div class="col-md-8 apn-main-content">
		<h2><span class="glyphicon glyphicon-phone-alt"></span> Contact information</h2>
		<div class="vcard">
			<p class="fn">APN Secretariat</p>
			<p class="adr">
				<span class="street-address">East Building, 4F, <br/>
				1-5-2 Wakinohama Kaigan Dori</span><br>
				<span class="region">Chuo-ku, Kobe</span>, 
				<span class="postal-code">651-0073</span>, 
				<span class="country-name">Japan</span><br>
				<span class="tel">Tel: +81-78-230-8017</span>, 
				<span class="fax">Fax: +81-78-230-8017</span><br>
				<span class="emal">Email: <a href="mailto:<?php echo OFFICIAL_EMAIL; ?>"><?php echo OFFICIAL_EMAIL; ?></a></span><br>
			</p>
		</div> <!-- vcard-->
		
		<div class="vcard">
			<p class="fn">Hotel/meeting venue</p>
			<p class="adr">
				<span class="street-address"><?php echo MEETING_VENUE; ?><br/>
				<?php echo MEETING_ADDRESS; ?>
				</span><br>
				<span class="location"><?php echo MEETING_LOCATION; ?></span><br>
				<span class="tel">Tel: <?php echo VENUE_PHONE; ?></span>, 
				<span class="fax">Fax: <?php echo VENUE_FAX; ?></span><br>
				<span class="emal">Email: <a href="mailto:<?php echo VENUE_EMAIL; ?>"><?php echo VENUE_EMAIL; ?></a></span><br>
			</p>
		</div> <!-- vcard-->
		
      </div> <!-- col-lg-8 -->
	  
    </div> <!-- row -->
<?php include_once "templates/footer.php"; ?>