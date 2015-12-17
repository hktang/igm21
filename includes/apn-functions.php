<?php 
/*
 * (cc) 2013-2015
 *  Created with love and passion by Xiaojun Deng/APN Secretariat.
 */


/* Initialisation and relative settings
 * This is useful for easy configuring future minisites
*/

//meeting information
define( "MEETING_NAME",      "21st IGM/SPG Meeting" );
define( "MEETING_SHORTNAME", "IGM21" );
define( "MEETING_DATE",      "18-22 March 2015" );   
define( "MEETING_VENUE",     "Zhengzhou, China" ); 
define( "MEETING_ADDRESS",   "Zhengzhou, Henan, China" );
define( "MEETING_LOCATION",  "Zhengzhou, China" );

//contact information
define( "OFFICIAL_EMAIL",    "igm21@apn-gcr.org" );
define( "VENUE_EMAIL",       "mail@hotelcom" );
define( "VENUE_PHONE",       "+86-371-1234-1234" );
define( "VENUE_FAX",         "+86-371-1234-1234" );

//site components
define( "BASE_DIRECTORY",    "https://www.apn-gcr.org/igm/21/" );
define( "JUMBOTRON_IMG_1",   "china1.png" );                         // 1140x180 image x 3
define( "JUMBOTRON_IMG_2",   "china2.png" );
define( "JUMBOTRON_IMG_3",   "china3.png" );

//main registration
define( "THIS_FORM_ID",      10 );                                   //form ID for register.php 
define( "REGISTRATION_OPEN", FALSE );                                 //Status of main registration form
define( "REGISTRATION_INIT", FALSE );                                //Must be TRUE before setup and FALSE after

//abstract form
define( "ABSTRACT_FORM_ID",  11 );                                    //form ID for register.php 
define( "ABSTRACT_OPEN",  FALSE );                                    //Status of abstract form
define( "ABSTRACT_INIT",  FALSE );                                    //Must be TRUE before setup and FALSE after
define( "ABSTRACT_ANNOUNCEMENT_URL",  '#' );   //Status of abstract form

/* Helper functions
 * 
*/
function apn_list_county_options($name)
{
	$countries = array("Afghanistan", "Albania", "Algeria", "Andorra", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo", "Costa Rica", "Côte d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "North Korea", "South Korea", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Puerto Rico", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Chinese Taipei", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");
	
	/* check selected country
	 * using submitted data
	*/
	$fields = array_merge($_SESSION["form_tools_form"], $_POST);
	$picked = htmlspecialchars(@$fields["$name"]); 
	 
	/* make the options list */
	if (empty($picked))
	{
		$output = "<option selected value=\"\">Select... </option>\n";
	} else {
	    $output = "<option value=\"\">Select... </option>\n";
	}
	
	foreach ($countries as $country) 
	{
		if (strtolower($country) == strtolower(trim($picked))) 
		{
			$output .=  '<option selected value="' . $country . ' ">' . $country .'</option>' . "\n";
		} else 
		{
			$output .=  '<option value="' . $country . ' ">' . $country .'</option>' . "\n";
		}
	}

	print $output;
}

function apn_enqueue_js($path)
{
	
	/* path is relative to app root (e.g. http://www.apn-gcr.org/igm/19/) 
	 * and does not include the '/ 'at the beginning. 
	*/
	if (isset($path)) 
	{
		$output = '<script src="' .  BASE_DIRECTORY . $path . '" type="text/javascript"></script>' . "\n";
		print $output;
	}
}

function apn_quick_rule($type, $name, $display)
{
	/* write validation rule according to $type
	 * see form tools documentation for details.
	*/
	
	if ( $type == 'required') 
	{
		return "required," . $name . "," . "The <span class=\"text-danger\">" . $display . "</span> field is required.";
	} else if ( $type == 'valid_email') {
	    return "valid_email,". $name . "," . "Please enter a valid email address in the <span class=\"text-danger\">". $display . "</span> field.";
	} else {
	    return;
	}
}


function apn_write_lengthx($operator, $x, $name, $display)
{
	/* write length validation rules.
	 * see form tools documentation for details.
	*/
	
	if ( $operator != '') 
	{
		return "length".$operator.$x."," . $name . "," . "The <span class=\"text-warning\">" . $display . "</span> field should be ". $operator.$x . " characters long.";
	} else {
	    return;
	}
}


function apn_check_fields($name, $value)
{
	/* add "checked" to matching checkboxes
	 * see form tools documentation for details.
	*/
	$fields = array_merge($_SESSION["form_tools_form"], $_POST);
	foreach (@$fields["$name"] as $v) 
	{ 
		if ($v == $value) 
		{
			echo "checked";
			return;
		}
	}
}

?>