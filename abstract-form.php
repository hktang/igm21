<form action="<?php if ( ABSTRACT_OPEN == TRUE ) { echo $_SERVER["PHP_SELF"]; } ?>" role="form" class="form-horizontal" id="igm-abstract" method="post" name="" >
<div class="thumbnail form-outer">
<h1>Poster abstract submission</h1>
<h5 class="text-success"></h5>
<p>
	Please carefully read <a href="<?php echo ABSTRACT_ANNOUNCEMENT_URL; ?>">the full announcement</a> 
	before submitting your abstract. <br/>
	<span class="required">Required</span> fields are marked with an asterisk.
</p>
<?php if ( ABSTRACT_OPEN != TRUE ) :?>
	<h4 class="alert alert-warning">Thank you for your interest. Abstract submission is closed. </h4>
<?php endif; ?>
<?php
	// if passport number is duplicated, the form will not be submittted. 
	if ($_POST["dup_error"] == "duplicated")
	{
	print <<<DUPMSG
	<div class='error row'>
		<span class='glyphicon glyphicon-exclamation-sign apn-form-error-icon col-md-2'></span>
		<div class="col-md-10">
			<h4 class='text-danger'>Possible duplicate submission.</h4>
			<p>Therefore submission form will not be delivered to us for a second time. 
			If your intention is to change your registration details, please <a href="contact.php">
			contact the Secretariat</a> directly.</p>
		</div>
	</div>
	
DUPMSG;
	}

	// if $errors is not empty, the form must have failed one or more validation 
	// tests. Loop through each and display them on the page for the user
	if (!empty($errors))
	{
	print <<<ERRORMSG
	<div class='error row'>
		<span class='glyphicon glyphicon-exclamation-sign apn-form-error-icon col-md-2'></span>
		<div class="col-md-10">
			<h4 class='text-danger'>Registration is NOT completed yet</h4>
			<p>... because of the issues listed below. 
			Please fix these issues and click "Submit" again to submit the form.</p>
			<p>If you still have problems completing the form, please contact APN 
			secretariat at <a href="mailto:apnwebmaster@apn-gcr.org">apnwebmaster@apn-gcr.org</a> or 
			<a href="mailto:secretariat@apn-gcr.org">secretariat@apn-gcr.org</a>.
			</p>
		<pre><ul>
		
ERRORMSG;

	foreach ($errors as $error)
		print "<li>$error</li>";
	print "</ul></pre></div></div>\n"; 
	}

	if (isset($_POST['register'])):
		//define formTbc for js use
?>
	<script type="text/javascript">
		var formTbc = true;
	</script>
<?php endif; ?>

<h3 class="text-primary">Presenting author's information</h3>

<div class="form-group form-el-inline" id="form-jackpot">
	<label for="jackpot" class="control-label required">Jackpot for spam-bots</label>
	<div class="">
		<input <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> class="form-control" id="jackpot" maxlength="255"  name="jackpot" placeholder="Please avoid putting anything here. Just IGNORE it." type="text" value="<?php echo htmlspecialchars(@$fields["jackpot"]); ?>" > 
	</div>
</div>
		
<div class="row">
        <div class="form-group col-md-4 form-el-inline">
			<label for="title" class="control-label required">Title</label>
			<div class="">
				<select <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> class="form-control" id="title" name="title" required>
					<option <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> value=""      <?php if (@$fields["title"] == "")      echo "selected"; ?> >Select...</option>
					<option <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> value="Mr."   <?php if (@$fields["title"] == "Mr.")   echo "selected"; ?>>Mr.</option>
					<option <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> value="Ms."   <?php if (@$fields["title"] == "Ms.")   echo "selected"; ?>>Ms.</option>
					<option <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> value="Mrs."  <?php if (@$fields["title"] == "Mrs.")  echo "selected"; ?>>Mrs.</option>
					<option <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> value="Dr."   <?php if (@$fields["title"] == "Dr.")   echo "selected"; ?>>Dr.</option>
					<option <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> value="Prof." <?php if (@$fields["title"] == "Prof.") echo "selected"; ?>>Prof.</option>
				</select>
			</div>
		</div>
</div>

<div class="row">
		<div id="sex-div" class="form-group col-md-4 form-el-inline" >
			<label for="sex" class="control-label required">Sex</label>
			<div class="">
			<div class="radio-inline">
			  <label>
				<input <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> type="radio" name="sex" id="sex1" value="male" <?php if (@$fields["sex"] == "male") echo "checked"; ?> >
				Male
			  </label>
			</div>
			<div class="radio-inline">
			  <label>
				<input <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> class="" type="radio" name="sex" id="sex2" value="female" <?php if (@$fields["sex"] == "female") echo "checked"; ?> >
				Female
			  </label>
			</div>
			</div>
		</div>
</div>


<div class="row">
		<div class="form-group col-md-8 form-el-inline">
			<label for="last" class="control-label ">Family name/Surname</label>
			<div class="">
				<input <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> class=" form-control" id="last" maxlength="255" name="last" placeholder="Family name/surname as appear in your passport" type="text" value="<?php echo htmlspecialchars(@$fields["last"]); ?>" > 
			</div>
		</div>
</div>

<div class="row">

		<div class="form-group col-md-6 form-el-inline">
			<label for="first" class=" control-label required">Given name(s)</label>
			<div class="">
				<input <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> class="form-control" id="first" maxlength="255" name="first" placeholder="Given name(s) as appear in your passport..." type="text" value="<?php echo htmlspecialchars(@$fields["first"]); ?>" required> 
			</div>
		</div>

		<div class="form-group col-md-4 form-el-inline">
			<label for="middleName" class=" control-label">Middle name(s)</label>
			<div class="">
				<input <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> class="form-control" id="middleName" maxlength="255" name="middleName" placeholder="Middle name(s), if any" type="text" value="<?php echo htmlspecialchars(@$fields["middleName"]); ?>"> 
			</div>
		</div>
		
</div> <!--row -->	

<div class="row">
		<div class="form-group col-md-2 form-el-inline">
			<label for="age" class="control-label required">Age</label> 
			<div class="">
				<input <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> class="form-control" id="age" name="age" size="10" placeholder=""  type="text" value="<?php echo htmlspecialchars(@$fields["age"]); ?>" required>
			</div>
		</div>
</div>

		<div class="form-group">
			<label for="organisation" class="control-label required">Organisation</label>
			<div class="">
				<input <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> class="form-control" id="organisation" maxlength="255" name="organisation" placeholder="Organisation..." type="text" value="<?php echo htmlspecialchars(@$fields["organisation"]); ?>" required>
			</div>
		</div>
		

		<div class="form-group ">
			<label for="addressLine1" class=" control-label required">Address</label>
			<div class="">
				<input <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> class="form-control" id="addressLine1" maxlength="255" name="addressLine1" placeholder="Address..." type="text" value="<?php echo htmlspecialchars(@$fields["addressLine1"]); ?>" required>
			</div>
		</div>
		
<div class="row">
		<div class="form-group col-md-4 form-el-inline">
			<label for="phone" class=" control-label required">Phone</label>
			<div class="">
				<input <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> class="form-control" id="phone" maxlength="255" name="phone" placeholder="Phone..." type="tel"  value="<?php echo htmlspecialchars(@$fields["phone"]); ?>" required>
			</div>
		</div>

		<div class="form-group col-md-4 form-el-inline">
			<label for="fax" class=" control-label">Fax</label>
			<div class="">
				<input <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> class="form-control" id="fax" maxlength="255" name="fax" placeholder="Fax..." type="tel" value="<?php echo htmlspecialchars(@$fields["fax"]); ?>">
			</div>
		</div>

		<div class="form-group col-md-4 form-el-inline">
			<label for="email" class="control-label required">Email</label>
			<div class="">
				<input <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> class="form-control" id="email" maxlength="255" name="email" placeholder="name@example.com" type="text" value="<?php echo htmlspecialchars(@$fields["email"]); ?>" required>
			</div>
		</div>

</div> <!--row -->

<h3 class="text-primary">Co-authors / co-workers information</h3>

<fieldset>
<span class="help-block">List the names of coauthors/coworkers and their affiliation. Maximum 500 characters</span>
<textarea <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> class="form-control" id="coauthors" name="coauthors" rows="5">
<?php echo @$fields["coauthors"]; ?>
</textarea>
</fieldset>

<h3 class="text-primary">Abstract content</h3>

<fieldset>
<legend class="description required" for="abstract_title">Abstract Title</legend>
<span class="help-block">Maximum 300 characters.</span>
<textarea <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> class="form-control" id="abstract-title" name="abstract_title" rows="1" required>
<?php echo @$fields["abstract_title"]; ?>
</textarea>
</fieldset>

<fieldset>
<legend class="description required" for="keywords">Keywords</legend>
<span class="help-block">Separate keywords with commas. Maximum 100 characters.</span>
<textarea <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> class="form-control" id="keywords" name="keywords" rows="2" required>
<?php echo @$fields["keywords"]; ?>
</textarea>
</fieldset>

<fieldset>
<legend class="description" for="area[]">Scientific area(s) </legend>
  <div id="roles-div" class="form-group col-md-12 form-el-inline">
	<label class="checkbox-inline">
	  <input <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> type="checkbox" id="area1" name="area[]" value="CCCV" <?php apn_check_fields("area", "CCCV"); ?>>
	  Climate Change and Climate Variability
	</label>

	<br/>
	
	<label class="checkbox-inline">
	  <input <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> type="checkbox" id="area2" name="area[]" value="EBLU" <?php apn_check_fields("area", "EBLU"); ?> > 
	  Ecosystems, Biodiversity and Land Use
	</label>
	
	<br/>
	
	<label class="checkbox-inline">
	  <input <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> type="checkbox" id="area3" name="area[]" value="CATMD" <?php apn_check_fields("area", "CATMD"); ?> > 
	  Changes in Atmospheric, Terrestrial and Marine Domains 
	</label>
	
	<br/>
	
	<label class="checkbox-inline">
	  <input <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> type="checkbox" id="area4" name="area[]" value="RUSD" <?php apn_check_fields("area", "RUSD"); ?>> 
	  Use of Resources and Pathways for Sustainable Development
	</label>
	
	<br/>

  </div>
</fieldset>

<fieldset>
<legend class="description required"  for="abstract">Abstract</legend>
<span class="help-block">Must not exceed 300 words or 3000 characters</span>
<textarea <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> class="form-control" id="abstract" name="abstract" rows="15" required>
<?php echo @$fields["abstract"]; ?>
</textarea>
</fieldset>

<h3 class="text-primary">Before submission...</h3>

<label for="availability" class="control-label required">Confirmation of country of residence and availability</label>
  <div id="roles-div" class="form-group col-md-12 form-el-inline">
	<label class="checkbox-inline">
	  <input <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> type="checkbox" id="availability" name="availability" value="yes" >
	  I am currently residing in Nepal and will be available to present my poster on 25 March 2015 in Kathmandu.
	</label>
</div>

<hr/>

<input <?php if ( ABSTRACT_OPEN != TRUE ) { echo 'disabled="true"'; } ?> class="btn btn-lg btn-success" id="submit" name="submit" type="submit" value="Submit">

<hr/>
<p  style="text-align:center;" class="help-block">Your privacy is important to us. Your submission will be encrypted and sent securely over the internet.</p>
</div><!-- .thumbnail .form-outer -->
</form>
