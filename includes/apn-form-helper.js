/*
 * (cc) 2013 APN
 * Created with love and passion by Xiaojun Deng/APN Secretariat
 */


$(function() {
	/* 
	* Set the format and year range for jQuery date picker
	*/
	var d = new Date();
	var YearNow = d.getFullYear();
	var YearThen = YearNow - 100;
	var YearFuture = YearNow + 20;
	var yb = YearThen + ":" + YearNow; 
	var ye = YearNow + ":" + YearFuture;  

	
	$('#dateOfBirth').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd/mm/yy' });
	$('#dateOfBirth').datepicker( "option", "yearRange", yb );
	
	$('#dateOfIssue').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd/mm/yy' });
	$('#dateOfIssue').datepicker( "option", "yearRange", yb );
	
	$('#dateOfExpiry').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd/mm/yy' });
	$('#dateOfExpiry').datepicker( "option", "yearRange", ye );
	
	/*
	* Fill in, or show, the "Sex" field according to the selected "Title" option 
	*/
	genderGuess();
		

});



/* ---------------------------------------------------------------------------
	function definitions 
----------------------------------------------------------------------------*/

function roleConflictFree (changedId, arrayOfConflicts, deps) 
{
	/*
	* Properly disable conflicting options for "roles" field.
	* @changedId(string) 		The ID of the option that is checked/unchecked
	* @arrayOfConflicts(array)	An array of "role Ids" from HTML attribute
	* @deps(array)				Optional, helper for dealing with dis-selection
	*                           if any of deps are checked, deselecting will
	*							not change the status of other options
	*/
	$(changedId).change(function(){
		if ($(changedId).prop("checked") == true) 
		{
			for (var i = 0; i < arrayOfConflicts.length; i++) { $("input#role"+arrayOfConflicts[i]).prop("disabled", true);}
		}else if ($(changedId).prop("checked") == false) 
		{
			if (deps != false) {
				for (var j = 0; j < deps.length; j++) 
				{	//if deps are still checked, don't change status of disabled boxes
					if ($("input#role"+deps[j]).prop("checked") == true){
						return;
					} 
				}
			}
			//otherwise, erase the disabled status
			for (var k = 0; k < arrayOfConflicts.length; k++) { $("input#role"+arrayOfConflicts[k]).prop("disabled", false);}
		}
	});	
}

function genderGuess ()
{	
	/*
	* On submission failure, show the "gender" field 
	*
	* This bug was reported by Prof. Fuchs: when "Prof." was selected as title
	* and "sex" field left empty, the error page hides the "sex" field by default. 
	* This snippet solves the problem by checking submission status and displaying the 
	* "sex" field if someone's on an error page.
	* 
	* Degrades gracefully if JavaScript is disabled.
	* 
	*/
    if ( typeof(formTbc) != "undefined" ) {
		$("#sex-div").css('display', 'inline');
	}else
	{
		$("#sex-div").css('display', 'none');
	}
	
	/*
	* If not on an error page, fill in, or show, the "Sex" field 
	* according to the selected "Title" option 
	*/
	$("select#title").change(function() 
	{
		var selectedTitle = $( "select#title option:selected" ).attr("value");
		if ( selectedTitle == "Dr." || selectedTitle == "Prof." ) 
		{ 
			//show 'sex' field
			//$("input#sex1").prop("checked", false);
			//$("input#sex2").prop("checked", false);
			$("#sex-div").show("fast");
		}else if (selectedTitle == "" )
		{ 
			//uncheck and hide 'sex' field
			$("input#sex1").prop("checked", false);
			$("input#sex2").prop("checked", false);
			$("#sex-div").hide("fast");
		}else
		{ 
			//check and hide as appropriate		  
			if ( selectedTitle == "Mr." )
			{ //male
				$("input#sex1").prop("checked", true);
			} else 
			{ //female
				$("input#sex2").prop("checked", true);
			}
			
			$("#sex-div").hide("fast");
		}
	});
}

if ($.validator)
{
    $.validator.addMethod("wordCount",
       function(value, element, params) {
       
        /*
        * Validate by number of words
        */
        
          var typedWords = jQuery.trim(value).split(' ').length;
          if(typedWords <= params[0]) {
             return true;
          }
       },
       jQuery.format("Your abstract has exeeded the word limit. Please keep it within {0} words.")
    );
}
