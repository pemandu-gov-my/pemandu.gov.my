var servername     = 'http://'+location.hostname+'/gtp/';
var SITE_HOME_PATH = servername;
var PLUGIN_PATH = SITE_HOME_PATH+'wp-content/plugins/slider_transition/';

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


function validate_add_slider_speed()
{
	
	$('#add_slider_frm').unbind('submit');
	var options = {
	target: '#error_div',	
	beforeSubmit: show_mem_field_Request, 	
	success: show_memfieldResponse, 		
	url: PLUGIN_PATH+'process/add_slider_speed.php' 
	};
	$('#add_slider_frm').submit(function() {
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
			$('#add_report_field_frm').each(function(){
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

