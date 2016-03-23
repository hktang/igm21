<?php

    /* IMPORTANT GUIDANCE ON FORM SETUP ( settings at includes/apn-functions.php )
    
    Before setup: 
    - set REGISTRATION_INIT to TRUE
    
    After setup:
    - set REGISTRATION_INIT to FALSE
    
    AFTER deadline:
    - set REGISTRATION_OPEN to FALSE
        
    */

    $apn_funded = $_GET['af'] == '1' ? true : false;

    require_once 'includes/apn-functions.php';

    $page_name = 'register';
    $page_title = 'Registration: '.MEETING_NAME.', '.MEETING_LOCATION;
    $ps_script = '<script type="text/javascript" src="includes/apn-form-helper.js"></script>'."\n";

    include_once 'templates/header.php';

    require_once realpath(dirname(__FILE__).'/../../forms/global/api/api.php');

    if (REGISTRATION_INIT == true) {
        $fields = ft_api_init_form_page(THIS_FORM_ID, 'initialize');
    } elseif (REGISTRATION_INIT == false) {
        $fields = ft_api_init_form_page(THIS_FORM_ID);
    }

    $errors = [];

    if (isset($_POST['register'])) {
        /* Start validation rules setup
         * This is critical for form security. 
         * ALL FIELDS must be validated and then filtered.
        */

        $rules =  [];

        //title
        $rules[] = apn_quick_rule('required', 'title', 'Title');

        //full name
        $rules[] = apn_quick_rule('required', 'fullName', 'Full name');
        $rules[] = "reg_exp,middleName,^[a-zA-Z '\.-]*$,The <span class='text-warning'>Full name</span> field should only contain letters/spaces/hyphens.";
        $rules[] = apn_write_lengthx('<', '100', 'fullName', 'Full name');

        //occupation
        $rules[] = apn_quick_rule('required', 'occupation', 'Occupation');
        $rules[] = apn_write_lengthx('<=', '60', 'first', 'Occupation');
        $rules[] = "reg_exp,first,^[a-zA-Z '-]*$,The <span class='text-warning'>Occupation</span> field should only contain letters/spaces/hyphens.";

        //sex
        $rules[] = apn_quick_rule('required', 'sex', 'Sex');

        //Position/Job title
        $rules[] = apn_quick_rule('required', 'jobTitle', 'Job title');
        $rules[] = apn_write_lengthx('<=', '80', 'jobTitle', 'Job title');

        //Department
        $rules[] = apn_write_lengthx('<=', '80', 'department', 'Department');

        //Organisation
        $rules[] = apn_quick_rule('required', 'organisation', 'Organisation');
        $rules[] = apn_write_lengthx('<=', '80', 'organisation', 'Organisation');

        //Address line 1
        $rules[] = apn_quick_rule('required', 'addressLine1', 'Address line 1');
        $rules[] = apn_write_lengthx('<=', '100', 'addressLine1', 'Address line 1');

        //Address line 2
        $rules[] = apn_write_lengthx('<=', '100', 'addressLine2', 'Address line 2');

        //Country of Office
        $rules[] = apn_quick_rule('required', 'officeCountry', 'Country (office)');

        //Phone
        $rules[] = apn_quick_rule('required', 'phone', 'Phone');
        $rules[] = "reg_exp,phone,^[0-9 )(\+\-]*$,The <span class='text-warning'>Phone</span> field should only contain numbers/space/and '+/-' signs.";

        //Fax
        $rules[] = "reg_exp,fax,^[0-9 )(\+\-]*$,The <span class='text-warning'>Fax</span> field should only contain numbers/space/and '+/-' signs.";

        //Email
        $rules[] = apn_quick_rule('required', 'email', 'Email');
        $rules[] = apn_quick_rule('valid_email', 'email', 'Email');

        //Passport number
        $rules[] = apn_quick_rule('required', 'passportNo', 'Passport No.');
        $rules[] = apn_write_lengthx('<=', '20', 'passportNo', 'Passport No.');
        $rules[] = "reg_exp,passportNo,^[a-zA-Z0-9 \-\/]*$,<span class='text-warning'>Passport number</span> should only contain letters/numbers/hyphen(-)/slashes(/).";

        //Date of birth
        $rules[] = apn_quick_rule('required', 'dateOfBirth', 'Date of birth');
        $rules[] = "reg_exp,dateOfBirth,^[0-9\-\/]*$,<span class='text-warning'>Date of birth</span> should be in dd/mm/yyyy format (e.g. 31/01/2013).";
        $rules[] = "length<20,dateOfBirth,<span class='text-warning'>Date of birth</span> should be in dd/mm/yyyy format (e.g. 31/01/2013).";

        //Nationality
        $rules[] = apn_quick_rule('required', 'nationality', 'Nationnality');

        //Meal preferences
        $rules[] = apn_write_lengthx('<=', '100', 'meal', 'Meal preferences');

        //Spam repellent
        $rules[] = "length=0,jackpot,<span class='text-warning'>Jackpot</span> must be <b>empty</b> otherwise you are a spam bot...";

        /* 
         * End validation rules setup. 
        */

        $errors = validate_fields($_POST, $rules);
        $dup_criteria = [
            // passportno is *database* field name; change accordingly as necessary.
            'passportno' => $_POST['passportNo'],
        ];

        $params = [
          'submit_button' => 'register',
          'next_page'     => 'thankyou.php',
          'form_data'     => $_POST,
          'finalize'      => true,
        ];

        if (!empty($errors)) {
            $fields = array_merge($_SESSION['form_tools_form'], $_POST);
        } elseif (REGISTRATION_INIT == false) {
            if (!ft_api_check_submission_is_unique(THIS_FORM_ID, $dup_criteria, $fields['form_tools_submission_id'])) {
                $fields = array_merge($_SESSION['form_tools_form'], $_POST);
                $_POST['dup_error'] = 'duplicated';
            } else {
                ft_api_process_form($params);
            }
        } else {
            ft_api_process_form($params);
        }
    }

    ?>

	    
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Registration: <?php echo MEETING_NAME ?>, 
                    <?php echo MEETING_DATE ?>, <?php echo MEETING_LOCATION ?>
                    </h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <?php  include 'form.php'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- col-md-8 -->
      </div> <!-- row -->
<?php include_once 'templates/footer.php'; ?>