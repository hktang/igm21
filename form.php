<?php 

/*
//   IMPORTANT!
     FORM ACTION URL TURNED OFF; uncomment line 11 to accept new submissions.
//
*/

?>

<form action="<?php if (REGISTRATION_OPEN == true) {
    echo $_SERVER['PHP_SELF'];
}  ?>" role="form" class="form-horizontal" id="igm-register" method="post" name="" >

<?php /* 
<p class="alert alert-warning"> 
 <strong>Note:</strong> 

     APN members and invited guests to the <?php echo MEETING_NAME; ?> 
     should register through this page.
     
     Young scientists planning to attend the poster session 
     should <a href="<?php echo BASE_DIRECTORY.'abstract-submission.php'; ?>"> 
     submit your poster abstract/register here instead</a>. 

</p>
 */
?>

<?php if (REGISTRATION_OPEN != true) :?>
    <h4 class="alert alert-warning">Online registration is closed. </h4>
<?php endif; ?>

<p class="alert alert-warning">
    <span class="required">Required</span> fields are marked with an asterisk. 
</p>

<?php
    // if passport number is duplicated, the form will not be submittted.
    if ($_POST['dup_error'] == 'duplicated') {
        echo <<<'DUPMSG'
    <div class='error row'>
        <span class='glyphicon glyphicon-exclamation-sign apn-form-error-icon col-md-2'></span>
        <div class="col-md-10">
            <h4 class='text-danger'>You probably have already registered.</h4>
            <p>Therefore, the information you just provided has not been submitted. 
            If your intention is to change your registration details, please <a href="contact.php">
            contact the Secretariat</a> directly.</p>
        </div>
    </div>
    
DUPMSG;
    }

    // if $errors is not empty, the form must have failed one or more validation
    // tests. Loop through each and display them on the page for the user
    if (!empty($errors)) {
        echo <<<'ERRORMSG'
    <div class='error row'>
        <span class='glyphicon glyphicon-exclamation-sign apn-form-error-icon col-md-2'></span>
        <div class="col-md-10">
            <h4 class='text-danger'>Registration is NOT completed yet</h4>
            <p>... because of the issues listed below. 
            Please fix these issues and click "Register" again to submit the form.</p>
            <p>If you still have problems completing the form, please contact APN 
            secretariat at <a href="mailto:info@apn-gcr.org">info@apn-gcr.org</a> or 
            <a href="mailto:secretariat@apn-gcr.org">secretariat@apn-gcr.org</a>.
            </p>
        <pre><ul>
        
ERRORMSG;

        foreach ($errors as $error) {
            print "<li>$error</li>";
        }
        echo "</ul></pre></div></div>\n";
    }

    if (isset($_POST['register'])):
        //defines formTbc for js use; see genderGuess @ apn-form-helper.js
?>
    <script type="text/javascript">
        var formTbc = true;
    </script>
<?php endif; ?>

<h3 class="text-primary">1. Contact information</h3>

<div class="form-group form-el-inline" id="form-jackpot">
    <label for="jackpot" class="control-label required">Jackpot for bot-spotting</label>
    <div class="">
        <input <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?> class="form-control" id="jackpot" maxlength="255"  name="jackpot" placeholder="Please avoid putting anything here. Just IGNORE it." type="text" value="<?php echo htmlspecialchars(@$fields['jackpot']); ?>" > 
        <input type="hidden" name="event" value="<?php echo MEETING_SHORTNAME; ?>">
    </div>
</div>
        
<div class="row">
<div class="form-group col-md-2 form-el-inline">
            <label for="title" class="control-label required">Title</label>
            <div class="">
                <select <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?>   class="form-control" id="title" name="title" required>
                    <option <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?> value=""      <?php if (@$fields['title'] == '') {
    echo 'selected';
} ?> >Select...</option>
                    <option <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?> value="Mr."   <?php if (@$fields['title'] == 'Mr.') {
    echo 'selected';
} ?>>Mr.</option>
                    <option <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?> value="Ms."   <?php if (@$fields['title'] == 'Ms.') {
    echo 'selected';
} ?>>Ms.</option>
                    <option <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?> value="Mrs."  <?php if (@$fields['title'] == 'Mrs.') {
    echo 'selected';
} ?>>Mrs.</option>
                    <option <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?> value="Dr."   <?php if (@$fields['title'] == 'Dr.') {
    echo 'selected';
} ?>>Dr.</option>
                    <option <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?> value="Prof." <?php if (@$fields['title'] == 'Prof.') {
    echo 'selected';
} ?>>Prof.</option>
                </select>
            </div>
        </div>

        <div class="form-group col-md-10 form-el-inline">
            <label for="fullName" class=" control-label required">Full name as it appears on your passport</label>
            <div class="">
                <input <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?>   class="form-control" id="fullName" maxlength="255" name="fullName" placeholder="" type="text" value="<?php echo htmlspecialchars(@$fields['fullName']); ?>"> 
            </div>
        </div>
        
</div>


<div class="row">
       
        <div id="sex-div" class="form-group col-md-4 form-el-inline" >
            <label for="sex" class="control-label required">Gender</label>
            <div class="">
            <div class="radio-inline">
              <label>
                <input <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?>   type="radio" name="sex" id="sex1" value="male" <?php if (@$fields['sex'] == 'male') {
    echo 'checked';
} ?> >
                Male
              </label>
            </div>
            <div class="radio-inline">
              <label>
                <input <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?>   class="" type="radio" name="sex" id="sex2" value="female" <?php if (@$fields['sex'] == 'female') {
    echo 'checked';
} ?> >
                Female
              </label>
            </div>
            </div>
        </div>

</div> <!--row --> 

<div class="row">

    <div class="form-group col-md-6 form-el-inline">
                <label for="occupation" class="control-label required">Occupation</label>
                <div class="">
                    <input <?php if (REGISTRATION_OPEN != true) {
        echo 'disabled="true"';
    } ?>   class="form-control" id="occupation" maxlength="255" name="occupation" placeholder="Civil servant, university staff, etc"  type="text" value="<?php echo htmlspecialchars(@$fields['occupation']); ?>" required>
                </div>
    </div>

    <div class="form-group col-md-6 form-el-inline">
                <label for="jobTitle" class="control-label required">Position/Job title</label>
                <div class="">
                    <input <?php if (REGISTRATION_OPEN != true) {
        echo 'disabled="true"';
    } ?>   class="form-control" id="jobTitle" maxlength="255" name="jobTitle" placeholder="Director, Dean, Professor, Senior Researcher, etc"  type="text" value="<?php echo htmlspecialchars(@$fields['jobTitle']); ?>" required>
                </div>
    </div>

    <div class="form-group col-md-6 form-el-inline">
                <label for="department" class="control-label">Department</label>
                <div class="">
                    <input <?php if (REGISTRATION_OPEN != true) {
        echo 'disabled="true"';
    } ?>   class="form-control" id="department" maxlength="255" name="department"  placeholder=""  type="text"  value="<?php echo htmlspecialchars(@$fields['department']); ?>" >
                </div>
    </div>
            

    <div class="form-group col-md-6 form-el-inline">
                <label for="organisation" class="control-label required">Organisation</label>
                <div class="">
                    <input <?php if (REGISTRATION_OPEN != true) {
        echo 'disabled="true"';
    } ?>   class="form-control" id="organisation" maxlength="255" name="organisation" placeholder="" type="text" value="<?php echo htmlspecialchars(@$fields['organisation']); ?>" required>
                </div>
    </div>
            

    <div class="form-group col-md-12 form-el-inline">
                <label for="addressLine1" class=" control-label required">Organisation address line 1</label>
                <div class="">
                    <input <?php if (REGISTRATION_OPEN != true) {
        echo 'disabled="true"';
    } ?>   class="form-control" id="addressLine1" maxlength="255" name="addressLine1" placeholder="" type="text" value="<?php echo htmlspecialchars(@$fields['addressLine1']); ?>" required>
                </div>
    </div>
            
            
    <div class="form-group col-md-12 form-el-inline">
                <label for="addressLine2" class="control-label">Organisation address line 2 (optional)</label>
                <div class="">
                    <input <?php if (REGISTRATION_OPEN != true) {
        echo 'disabled="true"';
    } ?>   class="form-control" id="addressLine2" maxlength="255" name="addressLine2" placeholder="" type="text" value="<?php echo htmlspecialchars(@$fields['addressLine2']); ?>">
                </div>
    </div>

    <div class="form-group col-md-3 form-el-inline">
            <label for="officeCountry" class="control-label required">Country</label>
            <div class="">
                <select <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?>   class="form-control" id="officeCountry" name="officeCountry" >
                    <?php apn_list_county_options('officeCountry'); ?>
                </select> 
            </div>
        </div>

    <div class="form-group col-md-3 form-el-inline">
            <label for="phone" class=" control-label required">Phone</label>
            <div class="">
                <input <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?>   class="form-control" id="phone" maxlength="255" name="phone" placeholder="Phone..." type="tel"  value="<?php echo htmlspecialchars(@$fields['phone']); ?>" required>
            </div>
        </div>

        <div class="form-group col-md-3 form-el-inline">
            <label for="fax" class=" control-label">Fax</label>
            <div class="">
                <input <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?>   class="form-control" id="fax" maxlength="255" name="fax" placeholder="Fax..." type="tel" value="<?php echo htmlspecialchars(@$fields['fax']); ?>">
            </div>
        </div>

        <div class="form-group col-md-3 form-el-inline">
            <label for="email" class="control-label required">Email</label>
            <div class="">
                <input <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?>   class="form-control" id="email" maxlength="255" name="email" placeholder="name@example.com" type="text" value="<?php echo htmlspecialchars(@$fields['email']); ?>" required>
            </div>
        </div>

</div> <!--row -->

<h3 class="text-primary">2. Passport details</h3>
<div class="row">
        
        <div class="form-group col-md-4 form-el-inline">
            <label for="passportNo" class="control-label required">Passport number</label>
            <div class="">
                <input <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?>   class="form-control" id="passportNo"  name="passportNo" type="text" placeholder="" value="<?php echo htmlspecialchars(@$fields['passportNo']); ?>" required> 
            </div>
        </div>

        <div class="form-group col-md-4 form-el-inline">
            <label for="dateOfBirth" class="control-label required"><abbr title="Click to activate the date-picker, or directly type in the date using 'dd/mm/yyyy' format.">Date of birth (dd/mm/yyyy)</abbr></label>
            <div class="">
                <input <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?>   class="form-control" id="dateOfBirth"  name="dateOfBirth" type="text" placeholder="dd/mm/yyyy" value="<?php echo htmlspecialchars(@$fields['dateOfBirth']); ?>" required>
            </div>
        </div>
        
        <div class="form-group col-md-4 form-el-inline">
            <label for="nationality" class="control-label required">Nationality</label>
            <div class="">
                <select <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?>   class="form-control" id="nationality" name="nationality" required>
                    <?php apn_list_county_options('nationality'); ?>
                </select> 
            </div>
        </div>
<div class="form-group col-md-12"><span class="help-block alert alert-warning">
<strong>Important: </strong>The information provided above will be used in the 
official invitation letter, which is required for your application for a visa to
enter China. Additionally, a passport with at least <strong>six months' validity
</strong> is required in order to enter China. Please check and make sure your 
passport meets this requirement.</span></div>
</div><!--row-->

<div class="row">
<h3 class="text-primary">3. Preferences</h3>

<div <?php if (!$apn_funded) {
    echo 'id="af-fields"';
} ?>>
    <fieldset>
    <legend>Flight arrangement</legend>
    <div>Regarding the reservation of air tickets:</div>
    <div class="radio">
      <label>
        <input <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?> type="radio" name="flightArrangement" id="flightArrangement1" value="self" <?php if (@$fields['flightArrangement'] == 'self') {
    echo 'checked';
} ?>>
        I would like to arrange it by myself;
      </label>
    </div>
    <div class="radio">
      <label>
        <input <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?>   type="radio" name="flightArrangement" id="flightArrangement2" value="APN" <?php if (@$fields['flightArrangement'] == 'APN') {
    echo 'checked';
} ?>>
        I would like APN Secretariat to take care of it.
      </label>
    </div>
    </fieldset>

    <fieldset>
    <legend for="canCover[]">I can cover the following cost(s): </legend>
      <div id="cancover-div" >
        <label class="checkbox-inline">
          <input <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?> type="checkbox" id="canCover1" name="canCover[]" value="flight"  <?php apn_check_fields('canCover', 'flight'); ?>>
          Cost for my flights;
        </label>
        <br/>
        <label class="checkbox-inline">
          <input <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?> type="checkbox" id="canCover2" name="canCover[]" value="accommodation" <?php apn_check_fields('canCover', 'accommodation'); ?>> 
          Cost for my accommodation.
        </label>
      </div>
     </fieldset>
</div>

<fieldset>
<legend>Room preferences</legend>
<div class="radio-inline">
  <label>
    <input <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?>   type="radio" name="roomType" id="roomType2" value="non-smoking" <?php if (@$fields['roomType'] == 'non-smoking') {
    echo 'checked';
} ?>>
    Non-smoking room
  </label>
</div>
<div class="radio-inline">
  <label>
    <input <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?>   type="radio" name="roomType" id="roomType1" value="smoking" <?php if (@$fields['roomType'] == 'smoking') {
    echo 'checked';
} ?>>
    Smoking room
  </label>
</div>
</fieldset>

<fieldset>
    <legend>Meal preferences, restrictions or other additional information</legend>
    <div>
        <input <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?>   class=" form-control" id="meal" maxlength="255" name="meal" placeholder="" type="text"  value="<?php echo htmlspecialchars(@$fields['meal']); ?>"> 
    </div>
</fieldset>

</div><!--row-->

<hr/>

<input <?php if (REGISTRATION_OPEN != true) {
    echo 'disabled="true"';
} ?> class="btn btn-lg btn-success" id="register" name="register" type="submit" value="Click here to Register">

<hr/>

<p  style="text-align:center;" class="help-block">Your privacy is important to us. Your submission will be encrypted and sent securely over the internet.</p>

</form>
