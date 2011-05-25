<?php
echo "<pre>";
print_r($_POST);
exit;
include_once('../../../../wp-config.php');
include_once('../../../../wp-load.php');
include_once('../../../../wp-includes/wp-db.php');

if(isset($_POST))
{
  //ERROR Case 0=invalid & 1=valid
  $case = 1;
  $error_str = '';
  
  //Form data sent  
		if($_POST['field_label'] == "")
		{
			$error_str = "<li>Please Enter Field Label.</li>";
			$case = 0;
		}
		
		
		if($_POST['field_type'] == "")
		{
			$error_str .= "<li>Please Select Field Type.</li>";
			$case = 0;
		}
		
		if($_POST['field_type'] != "")
		{
			if($_POST['field_type'] == "radio" || $_POST['field_type'] == "checkbox" || $_POST['field_type'] == "select")
			{
				if($_POST['options_value'] == "")
				{
					$error_str .= "<li>Please Enter option values for the selected type.</li>";
					$case = 0;
				}	
			}
		}
		
  if($case == 1)
  {
		$field_name = strtolower($_POST['field_label']);
		$fieldname  = str_replace(" ","_",$field_name);
		$options    = $_POST['options_value'];
		
		// find its previous type if radio and checkbox and current type is other than these two then empty its options 
		$get_prev_type_qry = $wpdb->get_row("SELECT field_type  FROM pm_news WHERE id = '".$_POST['field_id']."'");
		$prev_field_type   = $get_prev_type_qry->field_type;
		
		if($prev_field_type == "radio" || $prev_field_type == "checkbox" || $prev_field_type == "select")
		{
			if($_POST['field_type'] != "radio" && $_POST['field_type'] != "checkbox" && $_POST['field_type'] != "select")
			{
				$options = "";
			}
		}
		
		//Update member Fields
		$flag = $wpdb->query(" UPDATE pm_news SET field_label = '".$_POST['field_label']."', field_name = '".$fieldname."' ,field_type = '".$_POST['field_type']."',
		field_title='".$_POST['field_label']."' ,default_value = '".$_POST['default_value']."', options = '".$options."', required = '".$_POST['required']."' 
		WHERE id = '".$_POST['field_id']."'");

		echo "Field Updated Successfully! "; 
  }
  else
  {
  		$error_ul = "<ul>".$error_str."</ul>";
		echo $error_ul;
  }	
}
?>
