<?php
	
	/* IMPORTANT GUIDANCE ON FORM SETUP ( settings at includes/apn-functions.php )
	
	Before setup: 
	- set ABSTRACT_INIT to TRUE (if using a new form)
	
	After setup:
	- set ABSTRACT_INIT to FALSE (if using a new form)
	
	AFTER deadline:
	- set ABSTRACT_OPEN to FALSE
		
	*/


	require_once("includes/apn-functions.php");
	
	$page_name = "abstract-submission";
	$page_title = "Poster abstract submission: " .  MEETING_NAME . ", " . MEETING_LOCATION;
	$ps_script = '<script type="text/javascript" src="includes/jquery.validate.min.js"></script>'."\n" .'<script type="text/javascript" src="includes/apn-form-helper.js"></script>'."\n" ;
	
	include_once "templates/header.php";
	
	require_once(realpath(dirname(__FILE__) . "/../../forms/global/api/api.php"));
	
	if ( ABSTRACT_INIT == TRUE ) {
		$fields = ft_api_init_form_page( ABSTRACT_FORM_ID , "initialize" );  
	}else if( ABSTRACT_INIT == FALSE ){
		$fields = ft_api_init_form_page( ABSTRACT_FORM_ID); 
	}
	
	$errors = array();

	if (isset($_POST['submit']))
	{
	    /* Start validation rules setup
		 * This is critical for form security. 
		 * ALL FIELDS must be validated and then filtered.
		*/
		
		$rules = array ();
		
		//title
		$rules[] = apn_quick_rule('required', 'title', 'Title');
		
		//family name
		//$rules[] = apn_quick_rule('required', 'last', 'Surname(s)');
		$rules[] = apn_write_lengthx('<=', '30', 'last', 'Surname');
		$rules[] = "reg_exp,last,^[a-zA-Z '-]*$,The <span class='text-warning'>Family name/Surname</span> field should only contain letters/spaces/hyphens.";
		
		//given name
		$rules[] = apn_quick_rule('required', 'first', 'Given name(s)');
		$rules[] = apn_write_lengthx('<=', '60', 'first', 'Given names');
		$rules[] = "reg_exp,first,^[a-zA-Z '-]*$,The <span class='text-warning'>Given names</span> field should only contain letters/spaces/hyphens.";
		
		//middle name
		$rules[] = "reg_exp,middleName,^[a-zA-Z '\.-]*$,The <span class='text-warning'>Middle names</span> field should only contain letters/spaces/hyphens.";
		$rules[] = apn_write_lengthx('<', '60', 'middleName', 'Middle names');

		//age
		$rules[] = "reg_exp,suffix,^[0-9]*$,The <span class='text-warning'>Age</span> field should only contain numbers.";
		$rules[] = apn_write_lengthx('<=', '3', 'age', 'Age');
		
		//sex
		$rules[] = apn_quick_rule('required', 'sex', 'Sex');
		
		
		//Organisation
		$rules[] = apn_quick_rule('required', 'organisation', 'Organisation');
		$rules[] = apn_write_lengthx('<=', '80', 'organisation', 'Organisation');
		
		//Address line 1
		$rules[] = apn_quick_rule('required', 'addressLine1', 'Address line 1');
		$rules[] = apn_write_lengthx('<=', '100', 'addressLine1', 'Address line 1');
		
		
		//Phone
		$rules[] = apn_quick_rule('required', 'phone', 'Phone');
		$rules[] = "reg_exp,phone,^[0-9 )(\+\-]*$,The <span class='text-warning'>Phone</span> field should only contain numbers/space/and '+/-' signs.";
		
		//Fax
		$rules[] = "reg_exp,fax,^[0-9 )(\+\-]*$,The <span class='text-warning'>Fax</span> field should only contain numbers/space/and '+/-' signs.";

		//Email
		$rules[] = apn_quick_rule('required', 'email', 'Email');
		$rules[] = apn_quick_rule('valid_email', 'email', 'Email');

		
		//Coauthors
		$rules[] = apn_write_lengthx('<=', '500', 'coauthors', 'Co-Authors/Co-workers information');
		
		//Abstract_title
		$rules[] = apn_quick_rule('required', 'abstract_title', 'Abstract-title');
		$rules[] = apn_write_lengthx('<=', '300', 'abstract_title', 'Abstract-title');
		
		//Keywords
		$rules[] = apn_quick_rule('required', 'keywords', 'Keywords');
		$rules[] = apn_write_lengthx('<=', '100', 'keywords', 'Keywords');
		
		//Abstract
		$rules[] = apn_quick_rule('required', 'abstract', 'Abstract');
		$rules[] = apn_write_lengthx('<=', '3000', 'abstract', 'Abstract');
		
		//Confirmation of country of residence and availability
		$rules[] = apn_quick_rule('required', 'availability', 'Confirmation of availability');
		
		
		//Spam repellent
		$rules[] = "length=0,jackpot,<span class='text-warning'>Jackpot</span> must be <b>empty</b> otherwise you are a spam bot...";
		
	    /* 
		 * End validation rules setup. 
		*/
		
		$errors = validate_fields($_POST, $rules);
		
		$dup_criteria = array(
			"email" => $_POST["email"]
		);
		
		$params = array(
		  "submit_button" => "submit",
		  "next_page" => "abstract-thankyou.php",
		  "form_data" => $_POST,
		  "finalize" => true
		);
		
		
		if (!empty($errors)){
			$fields = array_merge($_SESSION["form_tools_form"], $_POST);
		}else if ( ABSTRACT_INIT == FALSE ){		
			//start dup check
			if (!ft_api_check_submission_is_unique( ABSTRACT_FORM_ID, $dup_criteria, $fields["form_tools_submission_id"])){
				$fields = array_merge($_SESSION["form_tools_form"], $_POST);
				$_POST["dup_error"] = "duplicated";
			}else{
				ft_api_process_form( $params );
			}
		}else{
			ft_api_process_form( $params );
		}
	}

	
	 ?>
      <div class="row">
	    <?php include_once "templates/sidebar.php"; ?>
        <div class="col-md-8">
			<?php  include "abstract-form.php"; ?>
        </div> <!-- col-md-8 -->
      </div> <!-- row -->
<?php include_once "templates/footer.php"; ?>