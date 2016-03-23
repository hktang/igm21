<?php

/*
 * (cc) 2013-2015
 *  Created with love and passion by Xiaojun Deng/APN Secretariat.
 */

/* Initialisation and relative settings
 * This is useful for easy configuring future minisites
*/

date_default_timezone_set('Asia/Tokyo');
$settings_timenow = new DateTime("now");
$settings_deadline = new DateTime();
$settings_deadline->setDate(2016, 4, 15);   //int only. NO padding 0! 
$settings_deadline->setTime(23, 59, 59);   //int only. NO padding 0! 
$settings_abstract_deadline = new DateTime();
$settings_abstract_deadline->setDate(2016, 4, 15);   //int only. NO padding 0! 
$settings_abstract_deadline->setTime(23, 59, 59);   //int only. NO padding 0! 
$settings_call_open = $settings_timenow < $settings_deadline ? TRUE : FALSE;
$settings_abstract_open = $settings_timenow < $settings_abstract_deadline ? TRUE : FALSE;

//meeting information
define('MEETING_NAME', '21st IGM/SPG Meeting');
define('MEETING_SHORTNAME', 'IGM21');
define('MEETING_DATE', '18-22 April 2016');
define('MEETING_VENUE', 'Zhengfangyuan Jinjiang International Hotel');
define('MEETING_ADDRESS', '86 Huang He Dong Lu');
define('MEETING_LOCATION', 'Zhengzhou, Henan, China');
define('MEETING_COUNTRY', 'China');

//contact information
define('OFFICIAL_EMAIL', 'igm21@apn-gcr.org');
define('VENUE_EMAIL', '');
define('VENUE_PHONE', '+86 371 5569 8888');
define('VENUE_FAX', '+86 371 5569 8888');

//site components
define('BASE_DIRECTORY', 'https://www.apn-gcr.org/igm/21/');
define('SECURE_SERVER_URL', 'https://www.apn-gcr.org/restricted/2016/igm21/');
define('JUMBOTRON_IMG_1', 'china1.png');                         // 1140x180 image x 3
define('JUMBOTRON_IMG_2', 'china2.png');
define('JUMBOTRON_IMG_3', 'china3.png');

//main registration
define('THIS_FORM_ID', 10);                                   //form ID for register.php
define('REGISTRATION_OPEN', true);                                 //Status of main registration form
define('REGISTRATION_INIT', false);                                //Must be TRUE before setup and FALSE after

//abstract form
define('ABSTRACT_FORM_ID', 11);                                    //form ID for register.php (do not change for IGM)
if ($settings_abstract_open === TRUE) {                             //Status of abstract form
    define('ABSTRACT_OPEN', true);
}else{
    define('ABSTRACT_OPEN', false);
}                 
define('ABSTRACT_INIT', false);                                    //no need to change as we are using form 11 always.
define('ABSTRACT_ANNOUNCEMENT_URL', 'https://www.apn-gcr.org/igm/21/abstract-submission.php');   //Status of abstract form
define('ABSTRACT_MEETING_LOCATION', 'Henan, China');   //location for scientists criteria
define('ABSTRACT_DATES', '20-21 April 2016');

/* Helper functions
 * 
*/
function apn_list_county_options($name)
{
    $countries = ['Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bhutan', 'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Brazil', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cambodia', 'Cameroon', 'Canada', 'Cape Verde', 'Central African Republic', 'Chad', 'Chile', 'China', 'Colombia', 'Comoros', 'Congo', 'Costa Rica', "Côte d'Ivoire", 'Croatia', 'Cuba', 'Cyprus', 'Czech Republic', 'Denmark', 'Democratic People\'s Republic of Korea', 'Djibouti', 'Dominica', 'Dominican Republic', 'East Timor', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Ethiopia', 'Fiji', 'Finland', 'France', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Greece', 'Grenada', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Honduras', 'Hong Kong', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macedonia', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Mauritania', 'Mauritius', 'Mexico', 'Micronesia', 'Moldova', 'Monaco', 'Mongolia', 'Montenegro', 'Morocco', 'Mozambique', 'Myanmar', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Poland', 'Portugal', 'Puerto Rico', 'Qatar', 'Republic of Korea', 'Romania', 'Russia', 'Rwanda', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia and Montenegro', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Swaziland', 'Sweden', 'Switzerland', 'Syria', 'Chinese Taipei', 'Tajikistan', 'Tanzania', 'Thailand', 'Togo', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Vatican City', 'Venezuela', 'Vietnam', 'Yemen', 'Zambia', 'Zimbabwe'];

    /* check selected country
     * using submitted data
    */
    $fields = array_merge($_SESSION['form_tools_form'], $_POST);
    $picked = htmlspecialchars(@$fields["$name"]);

    /* make the options list */
    if (empty($picked)) {
        $output = "<option selected value=\"\">Select... </option>\n";
    } else {
        $output = "<option value=\"\">Select... </option>\n";
    }

    foreach ($countries as $country) {
        if (strtolower($country) == strtolower(trim($picked))) {
            $output .=  '<option selected value="'.$country.' ">'.$country.'</option>'."\n";
        } else {
            $output .=  '<option value="'.$country.' ">'.$country.'</option>'."\n";
        }
    }

    echo $output;
}

function apn_enqueue_js($path)
{

    /* path is relative to app root (e.g. http://www.apn-gcr.org/igm/19/) 
     * and does not include the '/ 'at the beginning. 
    */
    if (isset($path)) {
        $output = '<script src="'.BASE_DIRECTORY.$path.'" type="text/javascript"></script>'."\n";
        echo $output;
    }
}

function apn_quick_rule($type, $name, $display)
{
    /* write validation rule according to $type
     * see form tools documentation for details.
    */

    if ($type == 'required') {
        return 'required,'.$name.','.'The <span class="text-danger">'.$display.'</span> field is required.';
    } elseif ($type == 'valid_email') {
        return 'valid_email,'.$name.','.'Please enter a valid email address in the <span class="text-danger">'.$display.'</span> field.';
    } else {
        return;
    }
}

function apn_write_lengthx($operator, $x, $name, $display)
{
    /* write length validation rules.
     * see form tools documentation for details.
    */

    if ($operator != '') {
        return 'length'.$operator.$x.','.$name.','.'The <span class="text-warning">'.$display.'</span> field should be '.$operator.$x.' characters long.';
    } else {
        return;
    }
}

function apn_check_fields($name, $value)
{
    /* add "checked" to matching checkboxes
     * see form tools documentation for details.
    */
    $fields = array_merge($_SESSION['form_tools_form'], $_POST);
    foreach (@$fields["$name"] as $v) {
        if ($v == $value) {
            echo 'checked';

            return;
        }
    }
}
