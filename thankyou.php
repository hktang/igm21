<?php
  require_once ("includes/apn-functions.php");
  
  $page_name = "register";
  $page_title = "Registration received";
  $ps_script = '<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
				<script type="text/javascript" src="includes/apn-load-home-map.js"></script>'."\n";
  
  include_once "templates/header.php"; 
  
  require_once("../../forms/global/api/api.php");
  
  $fields = ft_api_init_form_page();
  
  //setups for displaying submission
  $fields = array_merge($_SESSION["form_tools_form"], $_POST);
 
  ft_api_clear_form_sessions();
  
?>

	  <?php include_once "templates/jumbotron.php"; ?>
      <div class="row">
		<?php include_once "templates/sidebar.php"; ?>

        <div class="col-md-8 col-md-offset-1 apn-main-content">
		
		  <?php if (!$fields['register']): ?>
		    
			<h2><span class="glyphicon glyphicon-remove-circle"></span> Nothing to display.</h2>
		    <p>Looking for the registraiton form? Please visit <a href="register.php">
			the registration page </a>.</p>
		  <?php else: ?>
		
			<h2><span class="glyphicon glyphicon-ok"></span> Thank you!</h2>
			<p>Your registration form is received and we will send you a confirmation email shortly.</p>
			<p>If you would like to make any change to your registration information, 
			please contact the <a href="contact.php">APN Secretariat</a> directly.</p>
			<p>Thank you again and look forward to meeting you in Siem Reap.</p>
			
		
			<div class="thumbnail recap">
			<h2><span class="glyphicon glyphicon-user"></span>
				<?php print htmlspecialchars($fields['title']); ?> 
				<?php print stripslashes(htmlspecialchars($fields['first'])); ?> 
				<?php print stripslashes(htmlspecialchars($fields['middleName'])); ?> 
				<?php print stripslashes(htmlspecialchars($fields['last'])); ?> 
				<?php print stripslashes(htmlspecialchars($fields['suffix'])); ?> 
			</h2>
			<h4>
				<?php print stripslashes(htmlspecialchars($fields['jobTitle'])); ?> <br/>
				<?php !empty($fields['department']) ? print (stripslashes(htmlspecialchars($fields['department'])) . "<br/>\n") : "" ; ?> 
				<?php print stripslashes(htmlspecialchars($fields['organisation'])); ?> <br/>
			</h4>
			<p>
				<?php print stripslashes(htmlspecialchars($fields['addressLine1'])); ?> <br/>
				<?php !empty($fields['addressLine2']) ? print (stripslashes(htmlspecialchars($fields['addressLine2'])) . "<br/>\n") : "" ; ?>
				<?php print stripslashes(htmlspecialchars($fields['city'])); 
 				      !empty($fields['state']) ? print (", " . stripslashes(htmlspecialchars($fields['state']))):""; 
					  !empty($fields['zipCode']) ? print (", " . htmlspecialchars($fields['zipCode'])):"" ; 
					  print (htmlspecialchars($fields['officeCountry'])); 
				?>
			</p>
			<hr />
			<dl>
				<dt>Telephone</dt>
					<dd><?php print htmlspecialchars($fields['phone']); ?></dd>
				<dt>Fax</dt>
					<dd><?php !empty($fields['fax']) ? print (htmlspecialchars($fields['fax'])) : ""; ?></dd>
				<dt>Email</dt>
					<dd><?php print htmlspecialchars($fields['email']); ?></dd>
				<dt>Passport No.</dt>
					<dd><?php print stripslashes(htmlspecialchars($fields['passportNo'])); ?></dd>
				<dt>Date of Birth</dt>
					<dd><?php print htmlspecialchars($fields['dateOfBirth']); ?></dd>
				<dt>Nationality</dt>
					<dd><?php print htmlspecialchars($fields['nationality']); ?></dd>
				<dt>Passport issuing authority</dt>
					<dd><?php print stripslashes(htmlspecialchars($fields['issuingAuth'])); ?></dd>
				<dt>Passport date of issue</dt>
					<dd><?php print htmlspecialchars($fields['dateOfIssue']); ?></dd>
				<dt>Passport date of expiry</dt>
					<dd><?php print htmlspecialchars($fields['dateOfExpiry']); ?></dd>
				<dt>Flight arrangement</dt>
					<dd><?php $fields['flightArrangement'] == 'self' ? print "By myself" : print "By APN Secretariat"; ?></dd>
				<dt>Room Type</dt>
					<dd><?php if ($fields['roomType'] == 'smoking') 
							  {
								print "Smoking room"; 
							  }else if ($fields['roomType'] == 'non-smoking')
							  { 
							    print "Non-smoking room"; 
							  }else {
							    print "Not specified"; 
							  }
							  ?>
					</dd>
				<dt>Meal preferences</dt>
					<dd><?php !empty($fields['meal']) ? print $fields['meal'] : print "Not specified"; ?></dd>
				<dt>Role in IGM/SPG Meeting</dt>
					<dd><?php if (!empty($fields['role']))
							  {
								foreach ($fields['role'] as $val){
									print "<li class=\"label label-default\">" . htmlspecialchars($val) ."</li>" ;
								}
							  }else{
							       print "Not specified";
							  }
						?>
					</dd>
				<dt>Additional information</dt>
					<dd><?php !empty($fields['requirements']) ? print stripslashes(htmlspecialchars($fields['requirements'])) : print "Not specified"; ?></dd>
			</dl>
			</div>
		 <?php endif; ?>
        </div> <!-- col-lg-8 -->
      </div> <!-- row -->

<?php include_once "templates/footer.php"; ?>