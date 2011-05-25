var servername     = 'http://'+location.hostname+'/gtp/';
var SITE_HOME_PATH = servername;
var PLUGIN_PATH = SITE_HOME_PATH+'wp-content/plugins/manage_member_form/';

function gotolink(url)
{
	window.location = url;
}

function open_win(url_add)
{
	window.open(url_add, 'welcome', 'width=600,height=600,menubar=no,status=no, location=no,toolbar=no,scrollbars=no');
}

function scrolpage(y)
{
	window.scroll(0,y); // horizontal and vertical scroll increments
}

function window_reload()
{
	window.location.reload();
}


function validate_add__mem_field_frm()
{
	$('#add_member_field_frm').unbind('submit');
	var options = {
	target: '#error_div',	
	beforeSubmit: show_mem_field_Request, 	
	success: show_memfieldResponse, 		
	url: PLUGIN_PATH+'process/add_mem_form_field.php' 
	};
	$('#add_member_field_frm').submit(function() {
		$(this).ajaxSubmit(options);
		return false;
	});
}

function show_mem_field_Request(formData, jqForm, options) 
{
	var queryString = $.param(formData);
	$("#submit").attr("disabled", "disabled");
	return true;
}

function show_memfieldResponse(responseText, statusText) 
{
		if(responseText.search('Successfully') != '-1')
		{
			$('#add_member_field_frm').each(function(){
	        this.reset();
			});
			
			$("#error_div").show(); 
			//$(".add_mem_fields").slideToggle("slow");
			setTimeout('window_reload()', 2000);
		}
		else
		{
			$("#submit").removeAttr("disabled");
			$("#error_div").show();
		}
}


// Validate Update Member Form Fields 
function validate_update_mem_fields()
{
	$('#update_mem_frm').unbind('submit');
	var options = {
	target: '#error_div',	
	beforeSubmit: show_mem_fields_Request, 	
	success: show_mem_fields_Response, 
	url: PLUGIN_PATH+'process/update_mem_form_field.php'
	};
	$('#update_mem_frm').submit(function() {
		$(this).ajaxSubmit(options);
		return false;
	});
}

function show_mem_fields_Request(formData, jqForm, options) 
{
	var queryString = $.param(formData);
	$("#submit").attr("disabled", "disabled");
	return true;
}

function show_mem_fields_Response(responseText, statusText) 
{
		
	if(responseText.search("http") != '-1')
	{
		parent.$.fn.colorbox.close();
	}
	else
	{
		$("#submit").removeAttr("disabled");
		$("#error_div").show();
	}
}

// Delete Member Form Field Delete
function delete_mem_field(field_id)
{
	var flag = confirm('Are You Sure to delete this field?');
	if (flag == true)
	 {

			$.ajax({
			   type: "POST",
			   url: PLUGIN_PATH+'process/delete_mem_field_process.php',
			   data: 'fieldid='+field_id,
	
			   beforeSend: function(){
					//$("#statusdiv"+card_id).html('<img src="'+js_SERVER_ADMIN_PATH+'images/wpspin_light.gif" />');
			   },
		
			   success: function(msg){
					alert(msg);
				},
				error: function() {
						//alert('Error Occured in Deletion.');
				}
			});

	}
}

function change_tr_color(obj)
{
	obj.style.backgroundColor="#F1F1F1";
}


function back_to_original(obj)
{
	obj.style.backgroundColor="#FFFFFF";
}

// Change order number of fields to be displayed in Form
function change_mem_field_order(field_id,order_number)
{	
	
	var field_id = $(field_id).attr("id");
	
	sep_id = field_id.split('-');
	
	if(order_number !="")
	{
		if(order_number !=" ")
		{
			$.ajax({
			   type: "POST",
			   url: PLUGIN_PATH+'process/change_mem_field_order_process.php',
			   data: 'fieldid='+sep_id[1]+'&ord_num='+order_number,
		
			   beforeSend: function(){
					// $("#statusdiv"+card_id).html('<img src="'+js_SERVER_ADMIN_PATH+'images/wpspin_light.gif" />');
			   },
		
			   success: function(msg){
				   if(msg == "This field only allows numbers." || msg == "Zero is not allowed")
				   {
					  alert(msg);
					  $('#order_num-'+sep_id[1]).val('');
				   }
				   else
				   {
						myarray     = msg.split("-");
						if(myarray[0].search("has") !='-1')
						{
							//alert(myarray[0]);
						}
						else
						{
							// myarray[0] message
							// myarray[1] current old order number
							$('#order_num-'+myarray[2]).val(myarray[1]);
							// myarray[2] field id of check field	
							//alert(myarray[0]);
						}
				   }
					
				},
				error: function() {
						//alert('Error Occured in Deletion.');
				}
			});
		} // check for space
	}
}

// Change Field Status
function change_field_status(field_id)
{
	
	var field_status;
	if(document.getElementById('appstatus'+field_id).checked == true)
	{
	  field_status = 1;
	}
	else
	{
	  field_status = 0;
	}
	
	$.ajax({
	   type: "POST",
	   url: PLUGIN_PATH+'process/field_status_process.php',
	   data: 'fieldid='+field_id+'&fieldstatus='+field_status,

	   beforeSend: function(){
			$("#statusdiv"+field_id).html('<img src="'+PLUGIN_PATH+'images/wpspin_light.gif" />');
	   },

	   success: function(msg){
		    document.getElementById("statusdiv"+field_id).innerHTML = msg;
		},
		error: function() {
		}
	 });
}

// it will display options for radio buttons checkboxes
function show_options(field_type)
{
	if(field_type == "radio" || field_type == "checkbox" || field_type == "select")
	{
		document.getElementById('option_i').style.display = 'block';
		document.getElementById('option_p').style.display = 'block';
	}
	else
	{
		document.getElementById('option_i').style.display = 'none';
		document.getElementById('option_p').style.display = 'none';		
	}
}

function show_update_options(field_type)
{
	if(field_type == "radio" || field_type == "checkbox" || field_type == "select")
	{
		document.getElementById('update_options').style.display = 'block';
	}
	else
	{
		document.getElementById('update_options').style.display = 'none';
	}
}