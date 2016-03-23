<?php
  require_once 'includes/apn-functions.php';

  $page_name = 'register';
  $page_title = 'Registration received';
  $ps_script = '<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
				<script type="text/javascript" src="includes/apn-load-home-map.js"></script>'."\n";

  include_once 'templates/header.php';

  require_once '../../forms/global/api/api.php';

  $fields = ft_api_init_form_page();

  //setups for displaying submission
  $fields = array_merge($_SESSION['form_tools_form'], $_POST);

  ft_api_clear_form_sessions();

?>

	  
      <div class="row">
		<?php include_once 'templates/sidebar.php'; ?>

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
			<p>Thank you again and look forward to meeting you soon.</p>
			
		
			<div class="thumbnail recap">
			<h2><span class="glyphicon glyphicon-user"></span>
				<?php echo htmlspecialchars($fields['title']); ?> 
				<?php echo stripslashes(htmlspecialchars($fields['fullName'])); ?> 
			</h2>
			<h4>
				<?php echo stripslashes(htmlspecialchars($fields['jobTitle'])); ?> <br/>
				<?php !empty($fields['department']) ? print(stripslashes(htmlspecialchars($fields['department']))."<br/>\n") : ''; ?> 
				<?php echo stripslashes(htmlspecialchars($fields['organisation'])); ?> <br/>
			</h4>
			<p>
				<?php echo stripslashes(htmlspecialchars($fields['addressLine1'])); ?> <br/>
				<?php !empty($fields['addressLine2']) ? print(stripslashes(htmlspecialchars($fields['addressLine2']))."<br/>\n") : ''; ?>
				<?php echo stripslashes(htmlspecialchars($fields['city']));
                      !empty($fields['state']) ? print(', '.stripslashes(htmlspecialchars($fields['state']))) : '';
                      !empty($fields['zipCode']) ? print(', '.htmlspecialchars($fields['zipCode'])) : '';
                      echo htmlspecialchars($fields['officeCountry']);
                ?>
			</p>
			<hr />
			<dl>
				<dt>Telephone</dt>
					<dd><?php echo htmlspecialchars($fields['phone']); ?></dd>
				<dt>Fax</dt>
					<dd><?php !empty($fields['fax']) ? print(htmlspecialchars($fields['fax'])) : ''; ?></dd>
				<dt>Email</dt>
					<dd><?php echo htmlspecialchars($fields['email']); ?></dd>
				<dt>Passport No.</dt>
					<dd><?php echo stripslashes(htmlspecialchars($fields['passportNo'])); ?></dd>
				<dt>Date of Birth</dt>
					<dd><?php echo htmlspecialchars($fields['dateOfBirth']); ?></dd>
				<dt>Nationality</dt>
					<dd><?php echo htmlspecialchars($fields['nationality']); ?></dd>
				<dt>Meal preferences</dt>
				<dd><?php !empty($fields['meal']) ? print $fields['meal'] : print 'Not specified'; ?></dd>
			</dl>
			</div>
		 <?php endif; ?>
        </div> <!-- col-lg-8 -->
      </div> <!-- row -->

<?php include_once 'templates/footer.php'; ?>