<?php
	class Rich_Web_Forms extends WP_Widget
	{
		function __construct()
 	  	{
 			$params=array('name'=>'Rich-Web Forms','description'=>'This is the widget of Rich-Web Forms plugin');
			parent::__construct('Rich_Web_Forms','',$params);
 	  	}
		function form($instance)
 		{
 			$defaults = array('Rich_Web_Forms'=>'');
		    $instance = wp_parse_args((array)$instance, $defaults);

		   	$Rich_Web_Forms = $instance['Rich_Web_Forms'];
		   	?>
		   	<div>			  
			   	<p>
			   		Slider Title:
			   		<select name="<?php echo $this->get_field_name('Rich_Web_Forms'); ?>" class="widefat">
				   		<?php
				   			global $wpdb;
							$table_name2  = $wpdb->prefix . "rich_web_forms_manager";
							$Rich_Web_Forms=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id > %d", 0));
				   			
				   			foreach ($Rich_Web_Forms as $Rich_Web_Forms1)
				   			{
				   				?> <option value="<?php echo $Rich_Web_Forms1->id; ?>"> <?php echo $Rich_Web_Forms1->Forms_name; ?> </option> <?php 
				   			}
				   		?>
			   		</select>
			   	</p>
		   	</div>
		   	<?php	
 		}
 		function widget($args,$instance)
 		{
 			extract($args);
 		 	$Rich_Web_Forms = empty($instance['Rich_Web_Forms']) ? '' : $instance['Rich_Web_Forms'];
 		 	global $wpdb;

			$table_name2  = $wpdb->prefix . "rich_web_forms_manager";
			$table_name3  = $wpdb->prefix . "rich_web_forms_fields";
			$table_name4  = $wpdb->prefix . "rich_web_forms_themes1";
			$table_name5  = $wpdb->prefix . "rich_web_forms_themes2";
			$table_name6  = $wpdb->prefix . "rich_web_forms_options";
			$table_name7  = $wpdb->prefix . "rich_web_forms_saved";
			$table_name8  = $wpdb->prefix . "rich_web_forms_mails";
			$table_name9  = $wpdb->prefix . "rich_web_forms_info";
			$table_name10 = $wpdb->prefix . "rich_web_forms_cust_id";
			$table_name11 = $wpdb->prefix . "rich_web_forms_themes3";

			$Rich_Web_Forms_Manager = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id = %d", $Rich_Web_Forms));
			$Rich_Web_Forms_Fields  = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE Forms_ID = %d order by id", $Rich_Web_Forms));
			$Rich_Web_Forms_Theme1  = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE Rich_Web_Forms_T_T = %s", $Rich_Web_Forms_Manager[0]->Forms_theme));
			$Rich_Web_Forms_Theme2  = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE id = %d", $Rich_Web_Forms_Theme1[0]->id));
			$Rich_Web_Forms_Theme3  = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name11 WHERE Rich_Web_Forms_T_Tit = %s", $Rich_Web_Forms_Manager[0]->Forms_theme));
			$Rich_Web_Forms_Option  = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE Rich_Web_Forms_O_1 = %s", $Rich_Web_Forms_Manager[0]->Forms_option));
			$Rich_Web_Forms_Fields_File = $wpdb->get_var($wpdb->prepare("SELECT Rich_Web_Forms_Fields_O2 FROM $table_name3 WHERE Forms_ID = %d AND Forms_Fields_Type = %s order by id", $Rich_Web_Forms, 'File'));		
			$Rich_Web_Forms_Fields_FileExist = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE Forms_ID = %d AND Forms_Fields_Type = %s order by id", $Rich_Web_Forms, 'File'));
			$Rich_Web_Forms_Fields_DateExist = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE Forms_ID = %d AND Forms_Fields_Type = %s order by id", $Rich_Web_Forms, 'DatePicker'));
			$Rich_Web_Forms_Fields_TimeExist = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE Forms_ID = %d AND Forms_Fields_Type = %s order by id", $Rich_Web_Forms, 'TimePicker'));
			$Rich_Web_Forms_Fields_Phone = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE Forms_ID = %d AND Forms_Fields_Type = %s order by id", $Rich_Web_Forms, 'Phone'));
			$Rich_Web_Forms_Fields_Country = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE Forms_ID = %d AND Forms_Fields_Type = %s order by id", $Rich_Web_Forms, 'Country'));
			$Rich_Web_Forms_Fields_Privacy = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE Forms_ID = %d AND Forms_Fields_Type = %s order by id", $Rich_Web_Forms, 'Privacy Policy'));
 		 	echo $before_widget; 		 	
			?>
				<form action="" method="POST" enctype="multipart/form-data" id="Rich_Web_Forms_Form_<?php echo $Rich_Web_Forms;?>" style="float: left; width: 100%;">
					<header class="Rich_Web_Forms_Header_<?php echo $Rich_Web_Forms;?>">
						<style type="text/css">
							.Rich_Web_Forms_Header_<?php echo $Rich_Web_Forms;?> { padding: 0 !important; border: none !important; }
							.Rich_Web_Forms_Body_<?php echo $Rich_Web_Forms;?> { word-wrap: none !important; }
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?>, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> *
							{
								-webkit-box-sizing: border-box !important;
       							-moz-box-sizing: border-box !important;
    							box-sizing: border-box !important;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form[type=text], .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> textarea.Rich_Web_Contact_Form, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> select.Rich_Web_Contact_Form , .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Media_Div, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form[type=email], .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form[type=number], .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form[type=time], .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form[type=tel]
							{
								margin-bottom: 14px;
								max-width: 100%;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_FN	{ margin-bottom: 14px !important; }
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Input_Error { margin-bottom: 0px !important; }
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Span_Error
							{
								color: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_LEC;?>;
								font-size: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_LFS-4;?>px;
								font-family: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_LFF;?>;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form[type=text]:focus, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> textarea.Rich_Web_Contact_Form:focus, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> select.Rich_Web_Contact_Form:focus, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Media_Div:focus, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form[type=email]:focus, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form[type=number]:focus, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form[type=time]:focus, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form[type=tel]:focus, .flag-container .selected-flag:focus, .Rich_Web_Contact_Form_Button:focus, .Rich_Web_Contact_Form_Reset:focus, .Rich_Web_Contact_Form_Media:focus
							{
								outline: none !important;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?>
							{
								width: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_W;?>%;
								position: relative;
								<?php if($Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_Pos=='left'){ ?>
									float: left;
									margin: 20px 0;
								<?php }else if($Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_Pos=='right'){ ?>
									margin: 20px 0;
									float: right;
								<?php }else{ ?>
									margin: 20px <?php echo (100-$Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_W)/2;?>%;
									float: left;
								<?php }?>
								<?php if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgT=='color'){ ?>
									background: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>;
								<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgT=='transparent'){ ?>
									background: transparent;
								<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgT=='gradient'){ ?>
									background: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>;
								    background: -webkit-linear-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>);
								    background: -o-linear-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>);
								    background: -moz-linear-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>);
								    background: linear-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>);
								<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgT == 'gradient02'){ ?>
									background: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>;  
								    background: -webkit-linear-gradient(left, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>);
								    background: -o-linear-gradient(right, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>);
								    background: -moz-linear-gradient(right, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>);
								    background: linear-gradient(to right, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>);
								<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgT == 'gradient03'){ ?>
									background: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>;  
								    background: -webkit-linear-gradient(left top, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>);
								    background: -o-linear-gradient(bottom right, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>);
								    background: -moz-linear-gradient(bottom right, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>);
								    background: linear-gradient(to bottom right, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>);
								<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgT == 'gradient04'){ ?>
									background: -webkit-linear-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>);
								    background: -o-linear-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>);
								    background: -moz-linear-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>);
								    background: linear-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>);
								<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgT == 'gradient05'){ ?>
									background: -webkit-linear-gradient(left, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>);
								    background: -o-linear-gradient(left, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>);
								    background: -moz-linear-gradient(left, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>);
								    background: linear-gradient(to right, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>);
								<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgT == 'gradient06'){ ?>
									background: -webkit-repeating-linear-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>, 10%, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 20%);
								    background: -o-repeating-linear-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>, 10%, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 20%);
								    background: -moz-repeating-linear-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>, 10%, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 20%);
								    background: repeating-linear-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>, 10%, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 20%);
								<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgT == 'gradient07'){ ?>
									background: -webkit-repeating-linear-gradient(45deg,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?> 7%,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 10%);
								    background: -o-repeating-linear-gradient(45deg,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?> 7%,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 10%);
								    background: -moz-repeating-linear-gradient(45deg,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?> 7%,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 10%);
								    background: repeating-linear-gradient(45deg,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?> 7%,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 10%);
								<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgT == 'gradient08'){ ?>
									background: -webkit-repeating-linear-gradient(190deg,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?> 7%,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 10%);
								    background: -o-repeating-linear-gradient(190deg,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?> 7%,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 10%);
								    background: -moz-repeating-linear-gradient(190deg,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?> 7%,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 10%);
								    background: repeating-linear-gradient(190deg,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?> 7%,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 10%);
								<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgT == 'gradient09'){ ?>
									background: -webkit-repeating-linear-gradient(90deg,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?> 7%,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 10%);
								    background: -o-repeating-linear-gradient(90deg,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?> 7%,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 10%);
								    background: -moz-repeating-linear-gradient(90deg,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?> 7%,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 10%);
								    background: repeating-linear-gradient(90deg,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?> 7%,<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 10%);
								<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgT == 'gradient10'){ ?>
									background: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>;
								    background: -webkit-radial-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>);
								    background: -o-radial-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>);
								    background: -moz-radial-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>);
								    background: radial-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>);
								<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgT == 'gradient11'){ ?>
									background: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>;
								    background: -webkit-radial-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 5%, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?> 15%, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 60%);
								    background: -o-radial-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 5%, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?> 15%, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 60%);
								    background: -moz-radial-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 5%, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?> 15%, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 60%);
								    background: radial-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 5%, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?> 15%, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 60%);
								<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgT == 'gradient12'){ ?>
									background: -webkit-radial-gradient(circle, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>);
								    background: -o-radial-gradient(circle, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>);
								    background: -moz-radial-gradient(circle, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>);
								    background: radial-gradient(circle, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>);
								<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgT == 'gradient13'){ ?>
									background: -webkit-repeating-radial-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?> 10%, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 15%);
								    background: -o-repeating-radial-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?> 10%, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 15%);
								    background: -moz-repeating-radial-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?> 10%, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 15%);
								    background: repeating-radial-gradient(<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?>, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC2;?> 10%, <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BgC;?> 15%);
								<?php }?>
								border: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BW;?>px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BS;?> <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BC;?>;
								border-radius: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BR;?>px;
								padding: 10px;
								<?php if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShShow=='on'){ ?>
		    						<?php if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShType=='on'){ ?> 
										box-shadow: 0 10px 6px -6px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
										-webkit-box-shadow: 0 10px 6px -6px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
										-moz-box-shadow: 0 10px 6px -6px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
		    						<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShType==''){ ?>
										box-shadow: 0 15px 10px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
									 	-webkit-box-shadow: 0 15px 10px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
									 	-moz-box-shadow: 0 15px 10px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
		    						<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShType=='shadow03'){ ?>
										box-shadow:0 1px 4px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>, 0 0 40px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?> inset;
										-webkit-box-shadow:0 1px 4px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>, 0 0 40px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?> inset;
										-moz-box-shadow:0 1px 4px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>, 0 0 40px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?> inset;
		    						<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShType=='shadow04'){ ?>
										box-shadow:0 0 20px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
									    -webkit-box-shadow:0 0 20px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
									    -moz-box-shadow:0 0 20px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
		    						<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShType=='shadow05'){ ?>
										box-shadow:0 0 10px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
									  	-webkit-box-shadow:0 0 10px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
									  	-moz-box-shadow:0 0 10px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
		    						<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShType=='shadow06'){ ?>
										box-shadow: 4px -4px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
										-moz-box-shadow: 4px -4px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
										-webkit-box-shadow: 4px -4px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
		    						<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShType=='shadow07'){ ?>
										box-shadow: 5px 5px 3px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
										-moz-box-shadow: 5px 5px 3px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
										-webkit-box-shadow: 5px 5px 3px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
		    						<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShType=='shadow08'){ ?>
										box-shadow: 2px 2px white, 4px 4px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
										-moz-box-shadow: 2px 2px white, 4px 4px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
										-webkit-box-shadow: 2px 2px white, 4px 4px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
		    						<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShType=='shadow09'){ ?>
										box-shadow: 8px 8px 18px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
										-moz-box-shadow: 8px 8px 18px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
										-webkit-box-shadow: 8px 8px 18px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
		    						<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShType=='shadow10'){ ?>
										box-shadow: 0 8px 6px -6px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
										-moz-box-shadow: 0 8px 6px -6px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
										-webkit-box-shadow: 0 8px 6px -6px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
		    						<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShType=='shadow11'){ ?>
										box-shadow: 0 0 18px 7px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
										-moz-box-shadow: 0 0 18px 7px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
										-webkit-box-shadow: 0 0 18px 7px <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_BoxShC;?>;
		    						<?php }?>
		    					<?php }?>
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Forms_FieldsStart { width: 100%; display: block; float: left; }							
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> label.Rich_Web_Forms_Label
							{
								color: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_LC;?> !important;
								font-size: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_LFS;?>px !important;
								font-family: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_LFF;?> !important;
								vertical-align: top !important;
								background: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_LBgC;?> !important;
								border-radius: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_LBR;?>px !important;
								border: 1px solid <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_LBC;?> !important; 
								padding: 4px 12px !important;
								line-height: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_LFS;?>px !important;
								cursor: default !important;
								float: left !important;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> label span { color: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_LRC;?> !important; }
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=text], .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=number], .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=time], .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=tel]
							{
								<?php if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_TBHBg=='on'){ ?>
									background: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_TBBgC;?> !important;
								<?php }?>
								border: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_TBBW;?>px solid <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_TBBC;?> !important;
								border-radius: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_TBBR;?>px !important;
								font-size: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_TBFS;?>px !important;
								color: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_TBC;?> !important;
								line-height: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_TBFS;?>px !important;
							    height: inherit !important;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=text]::-webkit-input-placeholder, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=number]::-webkit-input-placeholder, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=time]::-webkit-input-placeholder, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=tel]::-webkit-input-placeholder, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=text]:-moz-placeholder, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=number]:-moz-placeholder, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=time]:-moz-placeholder, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=tel]:-moz-placeholder, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=text]::-moz-placeholder, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=number]::-moz-placeholder, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=time]::-moz-placeholder, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=tel]::-moz-placeholder, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=text]:-ms-input-placeholder, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=number]:-ms-input-placeholder, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=time]:-ms-input-placeholder, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=tel]:-ms-input-placeholder
							{
							    color: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_TBC;?> !important;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=text] { padding: 4px 12px !important; }
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=number] { padding: 4px 0px !important;	}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=time] { padding: 0px 0px 0px 10px !important; }
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> textarea
							{
								<?php if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_TAHBg=='on'){ ?>
									background: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_TABgC;?> !important;
								<?php }?>
								border: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_TABW;?>px solid <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_TABC;?> !important;
								border-radius: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_TABR;?>px !important;
								font-size: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_TAFS;?>px !important;
								color: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_TAC;?> !important;
								padding: 10px !important; 
								line-height: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_TAFS;?>px !important;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> textarea::-webkit-input-placeholder, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> textarea:-moz-placeholder, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> textarea::-moz-placeholder, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> textarea:-ms-input-placeholder
							{
								color: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_TAC;?> !important;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> select
							{
								<?php if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_SMHBg=='on'){ ?>
									background: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_SMBgC;?> !important;
								<?php }?>
								border: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_SMBW;?>px solid <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_SMBC;?> !important;
								border-radius: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_SMBR;?>px !important;
								font-size: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_SMFS;?>px !important;
								color: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_SMC;?> !important;
							    padding: 3px 12px !important;
							    line-height: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_SMFS;?>px !important;
							    height: inherit !important;
							    appearance: menulist !important;
								-moz-appearance:menulist !important;
								-webkit-appearance:menulist !important;
							}							
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=email]
							{
								<?php if($Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_EBHBg=='on'){ ?>
									background: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_EBBgC;?> !important;
								<?php }?>
								border: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_EBBW;?>px solid <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_EBBC;?> !important;
								border-radius: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_EBBR;?>px !important;
								font-size: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_EBFS;?>px !important;
								color: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_EBC;?> !important;
								line-height: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_EBFS;?>px !important;
							    height: inherit !important;
							    padding: 4px 12px !important;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=email]::-webkit-input-placeholder, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=email]:-moz-placeholder, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=email]::-moz-placeholder, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=email]:-ms-input-placeholder
							{
							   	color: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_EBC;?> !important;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Divider 
							{
								border-top-color: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_DC;?> !important;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=checkbox] { display: none;	}							
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=checkbox] + label 
							{
								color:<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_CBHBC;?> !important;
								font-size: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_CBHBgC;?>px !important;
								cursor: pointer;
								font-family: 'FontAwesome' !important;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Check[type=checkbox] + label:before 
							{
								color: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_CBBC;?>;
								content: "\<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_CBT;?>";
								margin: 0 .25em 0 0 !important;
								padding: 0 !important;
								<?php if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_CBS=='Big'){ ?>
									font-size: 32px !important;							
								<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_CBS=='Medium'){ ?>
									font-size: 22px !important;							
								<?php }else{ ?>
									font-size: 18px !important;
								<?php }?>
								vertical-align: middle;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Privacy[type=checkbox] + label:before 
							{
								color: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_CBBC;?>;
								content: "\<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_CBT;?>";
								padding: 0 !important;
								<?php if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_CBS=='Big'){ ?>
									font-size: 32px !important;							
								<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_CBS=='Medium'){ ?>
									font-size: 22px !important;							
								<?php }else{ ?>
									font-size: 18px !important;
								<?php }?>
								vertical-align: middle;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=checkbox]:checked + label:before 
							{
								color: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_CBCBgC;?> !important;
								content: "\<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_CBBgC;?>";
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=checkbox]:checked + label:after { font-weight: bold; }
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=radio]	{ display: none; }												
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type="radio"] + label 
							{
								color:<?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_RBHBC;?> !important;
								font-size: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_RBHBgC;?>px !important;
								cursor: pointer;
								font-family: 'FontAwesome' !important;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type="radio"] + label:before 
							{
								color: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_RBBC;?>;
								content: "\<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_RBT;?>";
								margin: 0 .25em 0 0 !important;
								padding: 0 !important;
								<?php if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_RBS=='Big'){ ?>
									font-size: 32px !important;							
								<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_RBS=='Medium'){ ?>
									font-size: 22px !important;							
								<?php }else{ ?>
									font-size: 18px !important;
								<?php }?>
								vertical-align: middle;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type="radio"]:checked + label:before 
							{
								color: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_RBCBgC;?> !important;
								content: "\<?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_RBBgC;?>";
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type="radio"]:checked + label:after { font-weight: bold; }
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Reset
							{
								background: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_ReBBgC;?> !important;
								border: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_ReBBW;?>px solid <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_ReBBC;?> !important;
								border-radius: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_ReBBR;?>px !important;
								<?php if($Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_ReBBA=='right'){ ?>
									float: right;
									margin: 10px 10px;
								<?php }else if($Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_ReBBA=='full'){ ?>
									width: 100% !important;
									margin: 10px 0px;
								<?php }else{ ?>
									margin: 10px 10px;
								<?php }?>								
								color: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_ReBC;?> !important;
								padding: 8px 15px !important;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Reset span
							{
								font-size: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_ReBFS;?>px !important;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Reset:hover
							{
								background: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_ReBHBgC;?> !important;
								color: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_ReBHC;?> !important;
								cursor: pointer;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Reset_Icon
							{						
								font-size: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_ReBIFS;?>px !important;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Reset_Icon:before
							{
								<?php if($Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_ReBIA=='after text'){ ?>
									float: right;
									margin-left: 10px;
								<?php }else{ ?>
									margin-right: 10px;
								<?php }?>
								content: "\<?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_ReBIT;?>";
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Button
							{
								background: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_SBBgC;?> !important;
								border: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_SBBW;?>px solid <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_SBBC;?> !important;
								border-radius: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_SBBR;?>px !important;
								<?php if($Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_SBBA=='right'){ ?>
									float: right;
									margin: 10px 10px;
								<?php }else if($Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_SBBA=='full'){ ?>
									width: 100% !important;
									margin: 10px 0px;
								<?php }else{ ?>
									margin: 10px 10px;
								<?php }?>
								color: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_SBC;?> !important;
								padding: 8px 15px !important;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Button span
							{
								font-size: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_SBFS;?>px !important;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Button:hover
							{
								background: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_SBHBgC;?> !important;
								color: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_SBHC;?> !important;
								cursor: pointer;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Button_Icon
							{						
								font-size: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_SBIFS;?>px !important;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Button_Icon:before
							{
								<?php if($Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_SBIA=='after text'){ ?>
									float: right;
									margin-left: 10px;
								<?php }else{ ?>
									margin-right: 10px;
								<?php }?>
								content: "\<?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_SBIT;?>";
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Media_Div
							{
							    position: relative;
							    overflow: hidden;							   
							    border: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_FUBW;?>px solid <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_FUBC;?> !important;
							    border-radius: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_FUBR;?>px !important;
							    transition: box-shadow 0.1s linear;
							    <?php if($Rich_Web_Forms_Fields_File=='Above Field'){ ?>
									width: 100% !important;
								<?php }else{ ?>
									width: 60% !important;
									float: left !important;	
								<?php }?>	
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Media_Div span
							{
								font-size: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_FUFS;?>px !important;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Media_Div .Rich_Web_Contact_Form_Media_Icon:before
							{
								content: "\<?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_FUIT;?>";
								<?php if($Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_FUIA=='after text'){ ?>
									float: right;
									margin-left: 10px;
								<?php }else{ ?>
									margin-right: 10px;
								<?php }?>
							}	
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Media_Div .Rich_Web_Contact_Form_Media_Icon
							{						
								font-size: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_FUIFS;?>px !important;
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Media_Div > div
							{
								<?php if($Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_FUBA=='right'){ ?>
									float: right;
							   		width: 40%;
							   		padding-left: 10px;      /* example */
							    	padding-top: 8px;
								<?php }else if($Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_FUBA=='left'){ ?>
									float: left;
									width: 40%;
									padding-left: 10px;      /* example */
							    	padding-top: 8px;
								<?php }else if($Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_FUBA=='full'){ ?>
									width: 100%;
								<?php }?>							   
							    height: 100%;
							    font-size: 14px;
							    color: <?php echo $Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_LC;?> !important;
							    overflow: hidden;
							}	
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Media_Div input[type=file]
							{
							    position: absolute;
							    left: 0;
							    top: 0;
							    width: 100%;
							    height: 100%;
							    opacity: 0;
							    cursor: pointer;
							}		
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Media_Div > button
							{
								<?php if($Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_FUBA=='right'){ ?>
									float: right;
							   		width: 40%;
								<?php }else if($Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_FUBA=='left'){ ?>
									float: left;
									width: 40%;
								<?php }else if($Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_FUBA=='full'){ ?>
									width: 100%;
								<?php }?>
							    min-width: 120px;
							    height: 100%;
							    background: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_FUBgC;?> !important;
							    transition: background 0.2s;
							    color: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_FUTC;?> !important;
							    overflow: hidden;
							    white-space: nowrap;
							    text-overflow: ellipsis;
							    border: 1px;
							    padding: 8px 15px !important;	
							}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Media_Div:hover > button
							{
							    background: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_FUHBgC;?> !important;
							    color: <?php echo $Rich_Web_Forms_Theme2[0]->Rich_Web_Forms_T_FUHTC;?> !important;
							    cursor: pointer;
							}
							.ui-datepicker { z-index: 9999999999999999999 !important; }
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Radio_MDiv, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Check_MDiv
							{
								margin: 0px 0px 10px 0px !important;
							}	
						  	.Rich_Web_Contact_Form_Button, .Rich_Web_Contact_Form_Reset, .Rich_Web_Contact_Form_Media
						 	{
						    	text-transform: none !important;
						    	letter-spacing: 0 !important;
						  	}
						  	.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> em { font-weight: normal !important; }	
						  	.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Loading_Span
						  	{
						  		background: rgba(241, 241, 241, 0.85);
							    position: absolute;
							    top: 0;
							    left: 0;
							    text-align: center;
							    width: 100%;
							    height: 100%;
							    line-height: 1;
						  	}
						  	.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Loading_Span span
						  	{
						  		position: absolute;
							    top: 50%;
							    left: 50%;
							    transform: translate(-50%, -50%);
							    -moz-transform: translate(-50%, -50%);
							    -webkit-transform: translate(-50%, -50%);
						  	}
							.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Loading_Span img#Rich_Web_Loading_Span_Img
							{
								width: 20px;
								height: 20px;
								position: absolute;
							    top: 50%;
							    left: 50%;
							    transform: translate(-50%, -50%);
							}
							@media only screen and ( max-width: 500px )
							{
							    .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Media_Div > div { display: none; }
							    .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Media_Div > button { width: 100%; }
							    .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> label.Rich_Web_Forms_Label { width: 100% !important; margin-bottom: 5px; text-align: left !important; }			   
							    .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=text], .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=number], .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> textarea, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> input[type=email], .Rich_Web_Forms_Div_Fields, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?>, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Media_Div, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Radio_Div, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Radio_MDiv, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Check_Div, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Check_MDiv, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> select
							    {
							    	width: 100% !important;
							    }	
							    .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> {	margin-left: 0% !important;	padding: 5px !important; }
							    .Rich_Web_Contact_Form_Button, .Rich_Web_Contact_Form_Reset { width: 100% !important; margin: 10px 0px !important; }
							    .Rich_Web_Contact_Form_TimePicker1, .Rich_Web_Contact_Form_DataPicker1, .Rich_Web_Contact_Form_FN
							    {
							    	width: 100% !important;
							    	margin-left: 0 !important;
							    	margin-right: 0 !important;
							    }
								.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Radio_Div, .Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Check_Div
								{
									margin: 5px 0px !important;
								}	
								.Rich_Web_Forms_<?php echo $Rich_Web_Forms;?> .Rich_Web_Contact_Form_Captcha_<?php echo $Rich_Web_Forms;?>
								{
									float: none !important;
									transform:scale(0.77);
									-webkit-transform:scale(0.77);
									transform-origin:0 0;
									-webkit-transform-origin:0 0;
								}
							}
							.country-list li:before{ content: " " !important; };								
						</style>						
						<script type="text/javascript">
							jQuery(document).ready(function(){
								var Rich_Web_Forms_Hidden_7 = jQuery('#Rich_Web_Forms_Hidden_7_'+<?php echo $Rich_Web_Forms; ?>).val();   // Sender's message was sent successfully
								var Rich_Web_Forms_Hidden_9 = jQuery('#Rich_Web_Forms_Hidden_9_'+<?php echo $Rich_Web_Forms; ?>).val();   // Submission was referred to as spam
								var Rich_Web_Forms_Hidden_10 = jQuery('#Rich_Web_Forms_Hidden_10_'+<?php echo $Rich_Web_Forms; ?>).val(); // Captcha is Not Validated
								var Rich_Web_Forms_Hidden_11 = jQuery('#Rich_Web_Forms_Hidden_11_'+<?php echo $Rich_Web_Forms; ?>).val(); // Required Field Is Empty
								var Rich_Web_Forms_Hidden_12 = jQuery('#Rich_Web_Forms_Hidden_12_'+<?php echo $Rich_Web_Forms; ?>).val(); // Email address that the sender entered is invalid

								function isValidEmailAddress(emailAddress) 
								{
								    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
								    return pattern.test(emailAddress);
								}
								jQuery('.Rich_Web_Contact_Form').each(function(){
									if(jQuery(this).attr('type') == 'text' || jQuery(this).attr('type') == 'number' || jQuery(this).hasClass('richtextarea') || jQuery(this).attr('type') == 'time' || jQuery(this).attr('type') == 'tel' || jQuery(this).attr('type') == 'file')
									{
										if(jQuery(this).hasClass('Rich_Web_Contact_Form_DataPicker'))
										{
											jQuery(this).on('change', function(){
												if(jQuery(this).hasClass('required') && jQuery(this).val())
												{
													jQuery('#'+jQuery(this).attr('id')+'_Span').removeClass('Rich_Web_Contact_Form_Span_Error');
													jQuery('#'+jQuery(this).attr('id')).removeClass('Rich_Web_Contact_Form_Input_Error');
													jQuery('#'+jQuery(this).attr('id')+'_Span').html('');

													if(jQuery(this).hasClass('Rich_Web_Contact_Form_DataPicker1'))
													{
														jQuery('#'+jQuery(this).attr('id')).removeClass('Rich_Web_Contact_Form_Input_Error');
														jQuery('#'+jQuery(this).attr('id')+'_Span').parent().css('margin-top','-14px');
													}													
												}
												else if (jQuery(this).hasClass('required') && !jQuery(this).val())
												{
													jQuery('#'+jQuery(this).attr('id')+'_Span').addClass('Rich_Web_Contact_Form_Span_Error');
													jQuery('#'+jQuery(this).attr('id')).addClass('Rich_Web_Contact_Form_Input_Error');
													jQuery('#'+jQuery(this).attr('id')+'_Span').html(Rich_Web_Forms_Hidden_11);

													if(jQuery(this).hasClass('Rich_Web_Contact_Form_DataPicker1'))
													{
														jQuery('#'+jQuery(this).attr('id')).removeClass('Rich_Web_Contact_Form_Input_Error');
														jQuery('#'+jQuery(this).attr('id')+'_Span').parent().css('margin-top','-14px');
													}
												}
											})
										}
										else
										{
											jQuery(this).on('blur',function(){
												if(jQuery(this).hasClass('required') && jQuery(this).val())
												{
													jQuery('#'+jQuery(this).attr('id')+'_Span').removeClass('Rich_Web_Contact_Form_Span_Error');
													jQuery('#'+jQuery(this).attr('id')).removeClass('Rich_Web_Contact_Form_Input_Error');
													jQuery('#'+jQuery(this).attr('id')+'_Span').html('');

													if(jQuery(this).hasClass('Rich_Web_Contact_Form_FN') || jQuery(this).hasClass('Rich_Web_Contact_Form_TimePicker1'))
													{
														jQuery('#'+jQuery(this).attr('id')).removeClass('Rich_Web_Contact_Form_Input_Error');
														jQuery('#'+jQuery(this).attr('id')+'_Span').parent().css('margin-top','-14px');
													}
													if(jQuery(this).attr('type') == 'tel' || jQuery(this).attr('type') == 'file')
													{
														jQuery('#'+jQuery(this).attr('id')+'_Span').css('margin-top','0px');
													}
												}
												else if (jQuery(this).hasClass('required') && !jQuery(this).val())
												{
													jQuery('#'+jQuery(this).attr('id')+'_Span').addClass('Rich_Web_Contact_Form_Span_Error');
													jQuery('#'+jQuery(this).attr('id')).addClass('Rich_Web_Contact_Form_Input_Error');
													jQuery('#'+jQuery(this).attr('id')+'_Span').html(Rich_Web_Forms_Hidden_11);

													if(jQuery(this).hasClass('Rich_Web_Contact_Form_FN') || jQuery(this).hasClass('Rich_Web_Contact_Form_TimePicker1'))
													{
														jQuery('#'+jQuery(this).attr('id')).removeClass('Rich_Web_Contact_Form_Input_Error');
														jQuery('#'+jQuery(this).attr('id')+'_Span').parent().css('margin-top','-14px');
													}
													if(jQuery(this).attr('type') == 'tel' || jQuery(this).attr('type') == 'file')
													{
														jQuery('#'+jQuery(this).attr('id')+'_Span').css('margin-top','-14px');
													}
												}
											})
										}											
									}
									else if(jQuery(this).attr('type') == 'checkbox' && jQuery(this).hasClass('Rich_Web_Contact_Form_Privacy'))
									{
										jQuery(this).on('change', function(){ Rich_Web_Forms_Check_Privacy(<?php echo $Rich_Web_Forms; ?>); });
									}
									else if(jQuery(this).attr('type') == 'email')
									{
										jQuery(this).on('blur',function(){
											if(jQuery(this).hasClass('required') && jQuery(this).val())
											{
												if(!isValidEmailAddress(jQuery(this).val()))
												{
							        				jQuery('#'+jQuery(this).attr('id')+'_Span').addClass('Rich_Web_Contact_Form_Span_Error');
													jQuery('#'+jQuery(this).attr('id')).addClass('Rich_Web_Contact_Form_Input_Error');
													jQuery('#'+jQuery(this).attr('id')+'_Span').html(Rich_Web_Forms_Hidden_12);
							        			}
							        			else
							        			{
							        				jQuery('#'+jQuery(this).attr('id')+'_Span').removeClass('Rich_Web_Contact_Form_Span_Error');
													jQuery('#'+jQuery(this).attr('id')).removeClass('Rich_Web_Contact_Form_Input_Error');
													jQuery('#'+jQuery(this).attr('id')+'_Span').html('');
							        			}													
											}
											else if (jQuery(this).hasClass('required') && !jQuery(this).val())
											{
												jQuery('#'+jQuery(this).attr('id')+'_Span').addClass('Rich_Web_Contact_Form_Span_Error');
												jQuery('#'+jQuery(this).attr('id')).addClass('Rich_Web_Contact_Form_Input_Error');
												jQuery('#'+jQuery(this).attr('id')+'_Span').html(Rich_Web_Forms_Hidden_11);
											}
										})
									}
								})
								jQuery( "#Rich_Web_Forms_Form_<?php echo $Rich_Web_Forms; ?>" ).on( "submit", function(e){
									e.preventDefault();
									var errorsAllow='yes';
									jQuery( "#Rich_Web_Forms_Form_<?php echo $Rich_Web_Forms; ?>" ).find('.Rich_Web_Contact_Form').each(function(){
										if(jQuery(this).attr('type') == 'text' || jQuery(this).attr('type') == 'number' || jQuery(this).hasClass('richtextarea') || jQuery(this).attr('type') == 'time' || jQuery(this).attr('type') == 'tel' || jQuery(this).attr('type') == 'file')
										{
											if(jQuery(this).hasClass('required') && jQuery(this).val())
											{
												jQuery('#'+jQuery(this).attr('id')+'_Span').removeClass('Rich_Web_Contact_Form_Span_Error');
												jQuery('#'+jQuery(this).attr('id')).removeClass('Rich_Web_Contact_Form_Input_Error');
												jQuery('#'+jQuery(this).attr('id')+'_Span').html('');

												if(jQuery(this).hasClass('Rich_Web_Contact_Form_FN') || jQuery(this).hasClass('Rich_Web_Contact_Form_DataPicker1') || jQuery(this).hasClass('Rich_Web_Contact_Form_TimePicker1'))
												{
													jQuery('#'+jQuery(this).attr('id')).removeClass('Rich_Web_Contact_Form_Input_Error');
													jQuery('#'+jQuery(this).attr('id')+'_Span').parent().css('margin-top','0px');
												}
												if(jQuery(this).attr('type') == 'tel' || jQuery(this).attr('type') == 'file')
												{
													jQuery('#'+jQuery(this).attr('id')+'_Span').css('margin-top','0px');
												}
											}
											else if (jQuery(this).hasClass('required') && !jQuery(this).val())
											{
												jQuery('#'+jQuery(this).attr('id')+'_Span').addClass('Rich_Web_Contact_Form_Span_Error');
												jQuery('#'+jQuery(this).attr('id')).addClass('Rich_Web_Contact_Form_Input_Error');
												jQuery('#'+jQuery(this).attr('id')+'_Span').html(Rich_Web_Forms_Hidden_11);

												if(jQuery(this).hasClass('Rich_Web_Contact_Form_FN') || jQuery(this).hasClass('Rich_Web_Contact_Form_DataPicker1') || jQuery(this).hasClass('Rich_Web_Contact_Form_TimePicker1'))
												{
													jQuery('#'+jQuery(this).attr('id')).removeClass('Rich_Web_Contact_Form_Input_Error');
													jQuery('#'+jQuery(this).attr('id')+'_Span').parent().css('margin-top','-14px');
												}
												if(jQuery(this).attr('type') == 'tel' || jQuery(this).attr('type') == 'file')
												{
													jQuery('#'+jQuery(this).attr('id')+'_Span').css('margin-top','-14px');
												}
												errorsAllow = 'no';
											}
										}
										else if(jQuery(this).attr('type') == 'checkbox' && jQuery(this).hasClass('Rich_Web_Contact_Form_Privacy'))
										{
											var Rich_Web_Forms_Check_Privacy_Ch = Rich_Web_Forms_Check_Privacy(<?php echo $Rich_Web_Forms; ?>);
											if( Rich_Web_Forms_Check_Privacy_Ch == 'nochecked')
											{
												errorsAllow = 'no';
											}
										}
										else if(jQuery(this).attr('type') == 'email')
										{
											if(jQuery(this).hasClass('required') && jQuery(this).val())
											{
												if(!isValidEmailAddress(jQuery(this).val())){

							        				jQuery('#'+jQuery(this).attr('id')+'_Span').addClass('Rich_Web_Contact_Form_Span_Error');
													jQuery('#'+jQuery(this).attr('id')).addClass('Rich_Web_Contact_Form_Input_Error');
													jQuery('#'+jQuery(this).attr('id')+'_Span').html(Rich_Web_Forms_Hidden_12);
													errorsAllow = 'no';
							        			}
							        			else
							        			{
							        				jQuery('#'+jQuery(this).attr('id')+'_Span').removeClass('Rich_Web_Contact_Form_Span_Error');
													jQuery('#'+jQuery(this).attr('id')).removeClass('Rich_Web_Contact_Form_Input_Error');
													jQuery('#'+jQuery(this).attr('id')+'_Span').html('');
							        			}													
											}
											else if (jQuery(this).hasClass('required') && !jQuery(this).val())
											{
												jQuery('#'+jQuery(this).attr('id')+'_Span').addClass('Rich_Web_Contact_Form_Span_Error');
												jQuery('#'+jQuery(this).attr('id')).addClass('Rich_Web_Contact_Form_Input_Error');
												jQuery('#'+jQuery(this).attr('id')+'_Span').html(Rich_Web_Forms_Hidden_11);
												errorsAllow = 'no';
											}
										}
									})
									if( errorsAllow == 'yes' )
									{
										var fd = new FormData();
								        var files_data = jQuery('input[type=file]');
								        var self=jQuery(this);
								        var postData=self.serialize();
								        jQuery.each(jQuery(files_data), function(i, obj) {
								            jQuery.each(obj.files,function(j,file){
								                fd.append(obj.name, file);
								            })
								        });
								        fd.append('action', 'Rich_Web_Forms_Upload_Media');
								        fd.append('formId', '<?php echo $Rich_Web_Forms;?>');
								        fd.append('postData', postData);
								        jQuery.ajax({
								            type: 'POST',
								            url: '<?php echo admin_url("admin-ajax.php"); ?>',
								            data: fd,
								            contentType: false,
								            processData: false,
								            beforeSend: function(){
												jQuery('#Rich_Web_Contact_Form_Submit_<?php echo $Rich_Web_Forms; ?>').parent().append('<span class="Rich_Web_Loading_Span"><img id="Rich_Web_Loading_Span_Img" src="<?php echo plugins_url( "/Images/loading.gif", __FILE__ ); ?>"></span>');
											},
								            success: function(response){
								            	var response = jQuery.parseJSON(response);
								            	if( response.ReCaptchaError)
								            	{
													jQuery('#Rich_Web_Contact_Form_Captcha_<?php echo $Rich_Web_Forms;?>_Span').addClass('Rich_Web_Contact_Form_Span_Error');
													jQuery('#Rich_Web_Contact_Form_Captcha_<?php echo $Rich_Web_Forms;?>').addClass('Rich_Web_Contact_Form_Input_Error');
													jQuery('#Rich_Web_Contact_Form_Captcha_<?php echo $Rich_Web_Forms;?>_Span').html(response.ReCaptchaError);
													jQuery('#Rich_Web_Forms_Form_<?php echo $Rich_Web_Forms;?>').find('.Rich_Web_Loading_Span').css('display','none');
								            	}
								            	else
								            	{
								            		if( response.RichSubmit == 'Printing Message' )
									            	{
														jQuery('#Rich_Web_Contact_Form_Submit_<?php echo $Rich_Web_Forms; ?>').parent().find('.Rich_Web_Loading_Span').empty().append('<span>'+response.RichSubmitMessage+'</span>');
														document.getElementById("Rich_Web_Forms_Form_<?php echo $Rich_Web_Forms;?>").reset();
														jQuery('#Rich_Web_Forms_Form_<?php echo $Rich_Web_Forms;?>').find('.Rich_Web_Contact_Form_Media_Div div').empty();
													}
													else if( response.RichSubmit == 'Refresh Page' )
													{
														location.reload();
													}
													else if( response.RichSubmit == 'Go to URL' )
													{		
									            		jQuery('#Rich_Web_Forms_Form_<?php echo $Rich_Web_Forms;?>').find('.Rich_Web_Loading_Span').css('display','none');
														document.getElementById("Rich_Web_Forms_Form_<?php echo $Rich_Web_Forms;?>").reset();
														window.open(response.RichSubmitURL , "_self");
													}
								            	}									            	
								            }
								        });
									}
								})
							})																				
						</script>
					</header>
					<body class="Rich_Web_Forms_Body_<?php echo $Rich_Web_Forms;?>">
						<div class="Rich_Web_Forms_<?php echo $Rich_Web_Forms;?>">
							<?php 
								if(!empty($Rich_Web_Forms_Fields_DateExist)){ ?>
									<input type="text" style="display: none" class="Rich_Web_Contact_Form_DatePicker_Current" value="<?php echo $Rich_Web_Forms_Fields_DateExist[0]->Rich_Web_Forms_Fields_O4;?>">
									<input type="text" style="display: none" class="Rich_Web_Contact_Form_DatePicker_Format" value="<?php echo $Rich_Web_Forms_Theme3[0]->Rich_Web_Forms_T_01;?>">
								<?php } else { ?>
									<input type="text" style="display: none" class="Rich_Web_Contact_Form_DatePicker_Current" value="">
									<input type="text" style="display: none" class="Rich_Web_Contact_Form_DatePicker_Format" value="">
								<?php }
								if(!empty($Rich_Web_Forms_Fields_TimeExist)){ ?>
									<input type="text" style="display: none" class="Rich_Web_Contact_Form_TimePicker_Current" value="<?php echo $Rich_Web_Forms_Fields_TimeExist[0]->Rich_Web_Forms_Fields_O4;?>">
								<?php } else { ?>
									<input type="text" style="display: none" class="Rich_Web_Contact_Form_TimePicker_Current" value="">
								<?php }
								if(!empty($Rich_Web_Forms_Fields_Privacy)){ ?>
									<input type="text" style="display: none" class="Rich_Web_Contact_Form_Privacy_Required" value="<?php echo $Rich_Web_Forms_Fields_Privacy[0]->Rich_Web_Forms_Fields_O3;?>">
								<?php } else { ?>
									<input type="text" style="display: none" class="Rich_Web_Contact_Form_Privacy_Required" value="noprivacy">
								<?php }
								$Rich_Web_Forms_FieldsMargin = array();
								$Rich_Web_Forms_FieldsWidth = array();
								$Rich_Web_Forms_FieldsStart = array();
								$Rich_Web_Forms_FieldsEnd = array();
								for($i=0;$i<$Rich_Web_Forms_Manager[0]->Forms_Fields_count;$i++)
								{
									if($Rich_Web_Forms_Fields[$i]->Forms_Fields_Width=='49%')
									{ 
										array_push($Rich_Web_Forms_FieldsWidth, '49%');										
										if($i==0)
										{
											array_push($Rich_Web_Forms_FieldsMargin, '0 1% 0 0');
										}
										else
										{
											if($Rich_Web_Forms_FieldsMargin[$i-1] == '0 1% 0 0')
											{
												array_push($Rich_Web_Forms_FieldsMargin, '0 0 0 1%');
												array_push($Rich_Web_Forms_FieldsStart, '');
												array_push($Rich_Web_Forms_FieldsEnd, '</div>');
											}
											else
											{
												array_push($Rich_Web_Forms_FieldsMargin, '0 1% 0 0');
												array_push($Rich_Web_Forms_FieldsStart, '<div class="Rich_Web_Forms_FieldsStart">');
												array_push($Rich_Web_Forms_FieldsEnd, '');
											}
										}
									}
									else
									{ 
										array_push($Rich_Web_Forms_FieldsStart, '');
										array_push($Rich_Web_Forms_FieldsEnd, '');
										array_push($Rich_Web_Forms_FieldsWidth, '100%');
										array_push($Rich_Web_Forms_FieldsMargin, '0');
									}
								}
								for($i=0;$i<$Rich_Web_Forms_Manager[0]->Forms_Fields_count;$i++)
								{		
									switch ($Rich_Web_Forms_Fields[$i]->Forms_Fields_Type) {
									    case "Text Box":
									    ?>
									    <?php echo $Rich_Web_Forms_FieldsStart[$i]; ?>
									  		<div class="Rich_Web_Forms_Div_Fields" style="float:left; position: relative; width: <?php echo $Rich_Web_Forms_FieldsWidth[$i]; ?>; margin: <?php echo $Rich_Web_Forms_FieldsMargin[$i]; ?>">
									  			<?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Left'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="text-align:left; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?><span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
													<input class="Rich_Web_Contact_Form <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>" style="display:block; float: left; width: 60%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
													<span style="display: block; width: 59%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
													</span>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Right'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="text-align:right; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?><span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
													<input class="Rich_Web_Contact_Form <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>" style="display:block; float: left; width: 60%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
													<span style="display: block; width: 59%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
													</span>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Placeholder'){ ?>
									  				<input class="Rich_Web_Contact_Form <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>" style="display:block; float: left; width: 100%;" placeholder="<?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?> <?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
									  				<span style="display: block; width: 99%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
									  				</span>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Above Field'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="display:block; width: 100%; margin-bottom: 3px; "><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?> <span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
									  				<input class="Rich_Web_Contact_Form <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>" style="display:block; float: left; width: 100%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
									  				<span style="display: block; width: 99%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
									  				</span>
									  			<?php }?>
									  		</div>
									  		<?php echo $Rich_Web_Forms_FieldsEnd[$i]; ?>
									  	<?php
									        break;
									    case "Textarea":
									    ?>
									    <?php echo $Rich_Web_Forms_FieldsStart[$i]; ?>
									  		<div class="Rich_Web_Forms_Div_Fields" style="float:left; position: relative; width: <?php echo $Rich_Web_Forms_FieldsWidth[$i]; ?>; margin: <?php echo $Rich_Web_Forms_FieldsMargin[$i]; ?>">
									  			<?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Left'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="text-align:left; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?><span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
									  				<textarea class="Rich_Web_Contact_Form richtextarea <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" style="resize: <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O7;?>; height: <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>px; display:block; float: left; width: 60%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>></textarea>
									  				<span style="display: block; width: 59%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
									  				</span>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Right'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="text-align:right; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?><span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
									  				<textarea class="Rich_Web_Contact_Form richtextarea <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" style="resize: <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O7;?>; height: <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>px; display:block; float: left; width: 60%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>></textarea>
									  				<span style="display: block; width: 59%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
									  				</span>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Placeholder'){ ?>
									  				<textarea class="Rich_Web_Contact_Form richtextarea <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" style="resize: <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O7;?>; height: <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>px; display:block; float: left; width: 100%;" placeholder="<?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?> <?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>></textarea>
									  				<span style="display: block; width: 99%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
									  				</span>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Above Field'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="display:block; width: 100%; margin-bottom: 3px; "><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?> <span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
									  				<textarea class="Rich_Web_Contact_Form richtextarea <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" style="resize: <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O7;?>; height: <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>px; display:block; float: left; width: 100%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>></textarea>
									  				<span style="display: block; width: 99%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
									  				</span>
									  			<?php }?>
									  		</div>
									  		<?php echo $Rich_Web_Forms_FieldsEnd[$i]; ?>
									  	<?php
									        break;
									    case "Select Menu":
									    ?>
									    <?php echo $Rich_Web_Forms_FieldsStart[$i]; ?>
									  		<div class="Rich_Web_Forms_Div_Fields" style="float:left; position: relative; width: <?php echo $Rich_Web_Forms_FieldsWidth[$i]; ?>; margin: <?php echo $Rich_Web_Forms_FieldsMargin[$i]; ?>">
									  			<?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Left'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="text-align:left; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?></label>
									  				<select class="Rich_Web_Contact_Form" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" style="width: 60%; display:block; float: left;">
									  					<option disabled selected><?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?></option>
									  					<?php $Rich_Web_Forms_FEditing_SM_Opt = explode('qwertyh', $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5);
									  					for( $x = 0; $x < count($Rich_Web_Forms_FEditing_SM_Opt); $x++ ){ ?>
															<option value="<?php echo $Rich_Web_Forms_FEditing_SM_Opt[$x];?>"><?php echo $Rich_Web_Forms_FEditing_SM_Opt[$x];?></option>
														<?php } ?>
									  				</select>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Right'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="text-align:right; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?></label>
									  				<select class="Rich_Web_Contact_Form" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" style="width: 60%; display:block; float: left;">
									  					<option disabled selected><?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?></option>
									  					<?php $Rich_Web_Forms_FEditing_SM_Opt = explode('qwertyh', $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5);
									  					for( $x = 0; $x < count($Rich_Web_Forms_FEditing_SM_Opt); $x++ ){ ?>
															<option value="<?php echo $Rich_Web_Forms_FEditing_SM_Opt[$x];?>"><?php echo $Rich_Web_Forms_FEditing_SM_Opt[$x];?></option>
														<?php } ?>
									  				</select>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Placeholder'){ ?>
									  				<select class="Rich_Web_Contact_Form" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" style="width: 100%; display:block; float: left;">
									  					<option disabled selected><?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1;?></option>
									  					<?php $Rich_Web_Forms_FEditing_SM_Opt = explode('qwertyh', $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5);
									  					for( $x = 0; $x < count($Rich_Web_Forms_FEditing_SM_Opt); $x++ ){ ?>
															<option value="<?php echo $Rich_Web_Forms_FEditing_SM_Opt[$x];?>"><?php echo $Rich_Web_Forms_FEditing_SM_Opt[$x];?></option>
														<?php } ?>
									  				</select>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Above Field'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="display:block; width: 100%; margin-bottom: 3px; "><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?></label>
									  				<select class="Rich_Web_Contact_Form" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" style="width: 100%; display:block; float: left;">
									  					<option disabled selected><?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?></option>
									  					<?php $Rich_Web_Forms_FEditing_SM_Opt = explode('qwertyh', $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5);
									  					for( $x = 0; $x < count($Rich_Web_Forms_FEditing_SM_Opt); $x++ ){ ?>
															<option value="<?php echo $Rich_Web_Forms_FEditing_SM_Opt[$x];?>"><?php echo $Rich_Web_Forms_FEditing_SM_Opt[$x];?></option>
														<?php } ?>
									  				</select>
									  			<?php }?>
									  		</div>
									  		<?php echo $Rich_Web_Forms_FieldsEnd[$i]; ?>
									  	<?php
									        break;
									    case "Check Box":
									    ?>
									    <?php echo $Rich_Web_Forms_FieldsStart[$i]; ?>
									  		<div class="Rich_Web_Forms_Div_Fields" style="float:left; position: relative; width: <?php echo $Rich_Web_Forms_FieldsWidth[$i]; ?>; margin: <?php echo $Rich_Web_Forms_FieldsMargin[$i]; ?>">
									  			<?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2 == 'Left'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="text-align:left; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?></label>
									  				<div class="Rich_Web_Contact_Form_Check_MDiv" style="display:block; float: left; width: 60%; position:relative;">
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2 == 'Right'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="text-align:right; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?></label>
									  				<div class="Rich_Web_Contact_Form_Check_MDiv" style="display:block; float: left; width: 60%; position:relative;">
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2 == 'Above Field'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="display:block; width: 100%; margin-bottom: 3px; "><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?></label>
									  				<div class="Rich_Web_Contact_Form_Check_MDiv" style="display:block; float: left; width: 100%; position:relative;">
									  			<?php }?>
									  			<?php $Rich_Web_Forms_FEditing_CB_Opt = explode('qwertyh', $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5);
									  			$Rich_Web_Forms_FEditing_CB_Chd = explode('qwertyh', $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6);
							  					for( $x = 0; $x < count($Rich_Web_Forms_FEditing_CB_Opt); $x++ ){ ?>
							  						<div class="Rich_Web_Contact_Form_Check_Div" style="position:relative; display:block; float: left; width: <?php echo floor(100/$Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4);?>%; text-align: center;">
							  							<input type="checkbox" class="Rich_Web_Contact_Form Rich_Web_Contact_Form_Check" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_<?php echo $x;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_<?php echo $x;?>" value="<?php echo $Rich_Web_Forms_FEditing_CB_Opt[$x];?>" <?php echo $Rich_Web_Forms_FEditing_CB_Chd[$x];?> <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3;?>>
							  							<label class="rich_web rich_web-trash" style="display: inline-block; float: none;" for="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_<?php echo $x;?>"><?php echo $Rich_Web_Forms_FEditing_CB_Opt[$x];?></label>
							  						</div>
												<?php } ?>
									  			</div>
									  		</div>
									  		<?php echo $Rich_Web_Forms_FieldsEnd[$i]; ?>
									  	<?php
									        break;
									    case "Radio Box":
									    ?>
									    <?php echo $Rich_Web_Forms_FieldsStart[$i]; ?>
									  		<div class="Rich_Web_Forms_Div_Fields" style="float:left; position: relative; width: <?php echo $Rich_Web_Forms_FieldsWidth[$i]; ?>; margin: <?php echo $Rich_Web_Forms_FieldsMargin[$i]; ?>">
									  			<?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2 == 'Left'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="text-align:left; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?></label>
									  				<div class="Rich_Web_Contact_Form_Radio_MDiv" style="display:block; float: left; width: 60%; position:relative;">
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2 == 'Right'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="text-align:right; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?></label>
									  				<div class="Rich_Web_Contact_Form_Radio_MDiv" style="display:block; float: left; width: 60%; position:relative;">
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2 == 'Above Field'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="display:block; width: 100%; margin-bottom: 3px; "><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?></label>
									  				<div class="Rich_Web_Contact_Form_Radio_MDiv" style="display:block; float: left; width: 100%; position:relative;">
									  			<?php }?>
									  			<?php $Rich_Web_Forms_FEditing_RB_Opt = explode('qwertyh', $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5);
									  			$Rich_Web_Forms_FEditing_RB_Chd = explode('qwertyh', $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6);
							  					for( $x = 0; $x < count($Rich_Web_Forms_FEditing_RB_Opt); $x++ ){ ?>
							  						<div class="Rich_Web_Contact_Form_Radio_Div" style="position:relative; display:block; float: left; width: <?php echo floor(100/$Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4);?>%; text-align: center;">
							  							<input type="radio" class="Rich_Web_Contact_Form Rich_Web_Contact_Form_Radio" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_<?php echo $x;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" value="<?php echo $Rich_Web_Forms_FEditing_RB_Opt[$x];?>" <?php echo $Rich_Web_Forms_FEditing_RB_Chd[$x];?> <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3;?>>
							  							<label class="rich_web rich_web-trash" style="display: inline-block; float: none;" for="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_<?php echo $x;?>"><?php echo $Rich_Web_Forms_FEditing_RB_Opt[$x];?></label>
							  						</div>
												<?php } ?>
									  			</div>
									  		</div>
									  		<?php echo $Rich_Web_Forms_FieldsEnd[$i]; ?>
									  	<?php
									        break;
									    case "File":
									    ?>
									    <?php echo $Rich_Web_Forms_FieldsStart[$i]; ?>
									  		<div class="Rich_Web_Forms_Div_Fields" style="float:left; position: relative; width: <?php echo $Rich_Web_Forms_FieldsWidth[$i]; ?>; margin: <?php echo $Rich_Web_Forms_FieldsMargin[$i]; ?>">
									  			<?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2 == 'Left'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="text-align:left; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?><span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'required'){ echo '*';}?></span></label>
									  				<div class="Rich_Web_Contact_Form_Media_Div"><button type="button" class="Rich_Web_Contact_Form_Media"><i class="rich_web Rich_Web_Contact_Form_Media_Icon"><span><?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?></span></i></button><div id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_div"></div><input class="Rich_Web_Contact_Form <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3;?>" type="file" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" accept="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" multiple="multiple"></div><span style="display: block; width: 59%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
									  				</span>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2 == 'Right'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="text-align:right; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?><span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'required'){ echo '*';}?></span></label>
									  				<div class="Rich_Web_Contact_Form_Media_Div"><button type="button" class="Rich_Web_Contact_Form_Media"><i class="rich_web Rich_Web_Contact_Form_Media_Icon"><span><?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?></span></i></button><div id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_div"></div><input class="Rich_Web_Contact_Form <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3;?>" type="file" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" accept="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" multiple="multiple"></div><span style="display: block; width: 59%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
									  				</span>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2 == 'Above Field'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="display:block; width: 100%; margin-bottom: 3px; "><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?> <span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'required'){ echo '*';}?></span></label>
									  				<div class="Rich_Web_Contact_Form_Media_Div"><button type="button" class="Rich_Web_Contact_Form_Media"><i class="rich_web Rich_Web_Contact_Form_Media_Icon"><span><?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?></span></i></button><div id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_div"></div><input class="Rich_Web_Contact_Form <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3;?>" type="file" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" accept="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" multiple="multiple"></div><span style="display: block; width: 99%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
									  				</span>
									  			<?php }?>
									  		</div>
									  		<?php echo $Rich_Web_Forms_FieldsEnd[$i]; ?>
									  	<?php
									        break;
										case "Custom Text":	
										?>
										<?php echo $Rich_Web_Forms_FieldsStart[$i]; ?>
									  		<div class="Rich_Web_Forms_Div_Fields" style="float:left; position: relative; width: <?php echo $Rich_Web_Forms_FieldsWidth[$i]; ?>; margin: <?php echo $Rich_Web_Forms_FieldsMargin[$i]; ?>">
									  			<?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Forms_Fields);?>
									  		</div>
									  		<?php echo $Rich_Web_Forms_FieldsEnd[$i]; ?>
									  	<?php
									        break;
									    case "Email":
									    ?>
									    <?php echo $Rich_Web_Forms_FieldsStart[$i]; ?>
									  		<div class="Rich_Web_Forms_Div_Fields" style="float:left; position: relative; width: <?php echo $Rich_Web_Forms_FieldsWidth[$i]; ?>; margin: <?php echo $Rich_Web_Forms_FieldsMargin[$i]; ?>">
									  			<?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Left'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="text-align:left; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?><span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4 == 'required'){ echo '*';}?></span></label>
													<input class="Rich_Web_Contact_Form <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>" id="Rich_Web_Contact_Form_Email_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_Email_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="email" style="display:block; float: left; width: 60%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>>
													<span style="display: block; width: 59%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_Email_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_Email_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
													</span>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Right'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="text-align:right; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?><span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4 == 'required'){ echo '*';}?></span></label>
													<input class="Rich_Web_Contact_Form <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>" id="Rich_Web_Contact_Form_Email_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_Email_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="email" style="display:block; float: left; width: 60%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>>
													<span style="display: block; width: 59%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_Email_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_Email_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
													</span>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Placeholder'){ ?>
									  				<input class="Rich_Web_Contact_Form <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>" id="Rich_Web_Contact_Form_Email_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_Email_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="email" style="display:block; float: left; width: 100%;" placeholder="<?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?> <?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4 == 'required'){ echo '*';}?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>>
									  				<span style="display: block; width: 99%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_Email_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_Email_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
									  				</span>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Above Field'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="display:block; width: 100%; margin-bottom: 3px; "><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?> <span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4 == 'required'){ echo '*';}?></span></label>
									  				<input class="Rich_Web_Contact_Form <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>" id="Rich_Web_Contact_Form_Email_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_Email_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="email" style="display:block; float: left; width: 100%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>>
									  				<span style="display: block; width: 99%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_Email_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_Email_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
									  				</span>
									  			<?php }?>
									  		</div>
									  		<?php echo $Rich_Web_Forms_FieldsEnd[$i]; ?>
									  	<?php
									        break;
									    case "Button":
									    ?>
									    <?php echo $Rich_Web_Forms_FieldsStart[$i]; ?>
									  		<div class="Rich_Web_Forms_Div_Fields" style="float:left; position: relative; width: <?php echo $Rich_Web_Forms_FieldsWidth[$i]; ?>; margin: <?php echo $Rich_Web_Forms_FieldsMargin[$i]; ?>">
									  			<button class="Rich_Web_Contact_Form Rich_Web_Contact_Form_Button" id="Rich_Web_Contact_Form_Submit_<?php echo $Rich_Web_Forms;?>" name="Rich_Web_Contact_Form_Submit_<?php echo $Rich_Web_Forms;?>" type="submit" value="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1;?>"><i class="rich_web Rich_Web_Contact_Form_Button_Icon"><span><?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1;?></span></i></button>
									  			<input type="text" style="display: none;" class="Rich_Web_Contact_Form Rich_Web_Contact_Form_Button_AAC" value="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3;?>">
									  			<input type="text" style="display: none;" class="Rich_Web_Contact_Form Rich_Web_Contact_Form_Button_URL" value="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>">
									  			<?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'show'){ ?>
									  				<button class="Rich_Web_Contact_Form Rich_Web_Contact_Form_Reset" id="Rich_Web_Contact_Form_Reset_<?php echo $Rich_Web_Forms;?>" name="Rich_Web_Contact_Form_Reset_<?php echo $Rich_Web_Forms;?>" type="reset" value="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>"><i class="rich_web Rich_Web_Contact_Form_Reset_Icon"><span><?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?></span></i></button>
									  			<?php }?>
									  		</div>
									  		<?php echo $Rich_Web_Forms_FieldsEnd[$i]; ?>
									  	<?php
									        break;
									    case "Captcha":
									    ?>
									    <?php echo $Rich_Web_Forms_FieldsStart[$i]; ?>
									  		<div class="Rich_Web_Forms_Div_Fields" style="float:left; position: relative; width: <?php echo $Rich_Web_Forms_FieldsWidth[$i]; ?>; margin: <?php echo $Rich_Web_Forms_FieldsMargin[$i]; ?>">
									  			<div style="position: relative; float: <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>; width: 100%;">
									  				<div style="float: <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>;margin: 10px;" class="g-recaptcha Rich_Web_Contact_Form_Captcha_<?php echo $Rich_Web_Forms;?>" id="Rich_Web_Contact_Form_Captcha_<?php echo $Rich_Web_Forms;?>" name="Rich_Web_Contact_Form_Captcha_<?php echo $Rich_Web_Forms;?>"></div>
									  			</div>
									  			<div>
									  				<span style="display: block; text-align: <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>; padding: 10px;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_Captcha_<?php echo $Rich_Web_Forms;?>_Span" name="Rich_Web_Contact_Form_Captcha_<?php echo $Rich_Web_Forms;?>_Span">
									  					
									  				</span>
									  			</div>
									  		</div>
									  		<?php echo $Rich_Web_Forms_FieldsEnd[$i]; ?>
									  	<?php
									        break;
									    case "Divider":
									    ?>
									    <?php echo $Rich_Web_Forms_FieldsStart[$i]; ?>
									  		<div class="Rich_Web_Forms_Div_Fields" style="float:left; position: relative; width: <?php echo $Rich_Web_Forms_FieldsWidth[$i]; ?>; margin: <?php echo $Rich_Web_Forms_FieldsMargin[$i]; ?>">
									  			<div class="Rich_Web_Contact_Form Rich_Web_Contact_Form_Divider" style="width: 96%; margin-left: 2%; border-top:<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1;?>px <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>"></div>
									  		</div>
									  		<?php echo $Rich_Web_Forms_FieldsEnd[$i]; ?>
									  	<?php
									        break;
									    case "Space":
									    ?>
									    <?php echo $Rich_Web_Forms_FieldsStart[$i]; ?>
									  		<div class="Rich_Web_Forms_Div_Fields" style="float:left; position: relative; width: <?php echo $Rich_Web_Forms_FieldsWidth[$i]; ?>; margin: <?php echo $Rich_Web_Forms_FieldsMargin[$i]; ?>">
									  			<div style="width: 100%; height: <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1;?>px;"></div>
									  		</div>
									  		<?php echo $Rich_Web_Forms_FieldsEnd[$i]; ?>
									  	<?php
									        break;
									    case "DatePicker":
									    ?>
									    <?php echo $Rich_Web_Forms_FieldsStart[$i]; ?>
									  		<div class="Rich_Web_Forms_Div_Fields" style="float:left; position: relative; width: <?php echo $Rich_Web_Forms_FieldsWidth[$i]; ?>; margin: <?php echo $Rich_Web_Forms_FieldsMargin[$i]; ?>">
									  			<?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O7 == 'FromTo'){ ?>
										  			<?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Left'){ ?>
										  				<label class="Rich_Web_Forms_Label" style="text-align:left; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?><span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
														<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_DataPicker Rich_Web_Contact_Form_DataPicker1 <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" type="text" style="display:block; float: left; width: 29%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
														<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_DataPicker Rich_Web_Contact_Form_DataPicker1 <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" type="text" style="display:block; float: left; width: 29%; margin-left: 2%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
														<span style="display: block; width: 60%; float: right; margin-top: -24px;">
															<span style="display:block; float: left; width: 49%; margin-left: 1%;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span">
															</span>
															<span style="display:block; width: 48%; float: left; margin-left: 2%;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2_Span">
															</span>
														</span>
										  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Right'){ ?>
										  				<label class="Rich_Web_Forms_Label" style="text-align:right; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?><span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
														<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_DataPicker Rich_Web_Contact_Form_DataPicker1 <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" type="text" style="display:block; float: left; width: 29%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
														<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_DataPicker Rich_Web_Contact_Form_DataPicker1 <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" type="text" style="display:block; float: left; width: 29%; margin-left: 2%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
														<span style="display: block; width: 60%; float: right; margin-top: -24px;">
															<span style="display:block; float: left; width: 49%; margin-left: 1%;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span">
															</span>
															<span style="display:block; float: left; width: 48%; margin-left: 2%;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2_Span">
															</span>
														</span>
										  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Placeholder'){ ?>
										  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_DataPicker Rich_Web_Contact_Form_DataPicker1 <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" type="text" style="display:block; float: left; width: 49%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
										  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_DataPicker Rich_Web_Contact_Form_DataPicker1 <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" type="text" style="display:block; float: left; width: 49%; margin-left: 2%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
										  				<span style="display: block; width: 100%; float: right; margin-top: -24px;">
										  					<span style="display: block; float: left; width: 49%; margin-left: 1%;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span">
										  					</span>
										  					<span style="display:block; float: left; width: 48%; margin-left: 2%;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2_Span">
										  					</span>
										  				</span>
										  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Above Field'){ ?>
										  				<label class="Rich_Web_Forms_Label" style="display:block; width: 100%; margin-bottom: 3px; "><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?> <span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
										  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_DataPicker Rich_Web_Contact_Form_DataPicker1 <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" type="text" style="display:block; float: left; width: 49%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
										  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_DataPicker Rich_Web_Contact_Form_DataPicker1 <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" type="text" style="display:block; float: left; width: 49%; margin-left: 2%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
										  				<span style="display: block; width: 100%; float: right; margin-top: -24px;">
										  					<span style="display:block; float: left; width: 49%; margin-left: 1%;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span">
										  					</span>
										  					<span style="display:block; float: left; width: 48%; margin-left: 2%;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2_Span">
										  					</span>
										  				</span>
										  			<?php }?>
										  		<?php } else { ?>
										  			<?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Left'){ ?>
										  				<label class="Rich_Web_Forms_Label" style="text-align:left; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?><span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
														<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_DataPicker <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="text" style="display:block; float: left; width: 60%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
														<span style="display: block; width: 59%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
														</span>
										  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Right'){ ?>
										  				<label class="Rich_Web_Forms_Label" style="text-align:right; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?><span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
														<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_DataPicker <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="text" style="display:block; float: left; width: 60%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
														<span style="display: block; width: 59%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
														</span>
										  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Placeholder'){ ?>
										  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_DataPicker <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="text" style="display:block; float: left; width: 100%;" placeholder="<?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?> <?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
										  				<span style="display: block; width: 99%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
										  				</span>
										  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Above Field'){ ?>
										  				<label class="Rich_Web_Forms_Label" style="display:block; width: 100%; margin-bottom: 3px; "><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?> <span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
										  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_DataPicker <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="text" style="display:block; float: left; width: 100%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
										  				<span style="display: block; width: 99%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
										  				</span>
										  			<?php }?>
										  		<?php }?>
									  		</div>
									  		<?php echo $Rich_Web_Forms_FieldsEnd[$i]; ?>
									  	<?php
									        break;
									    case "TimePicker":
									    ?>
									    <?php echo $Rich_Web_Forms_FieldsStart[$i]; ?>
									  		<div class="Rich_Web_Forms_Div_Fields" style="float:left; position: relative; width: <?php echo $Rich_Web_Forms_FieldsWidth[$i]; ?>; margin: <?php echo $Rich_Web_Forms_FieldsMargin[$i]; ?>">
									  			<?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O7 == 'FromTo'){ ?>
										  			<?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Left'){ ?>
										  				<label class="Rich_Web_Forms_Label" style="text-align:left; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?><span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
														<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_TimePicker Rich_Web_Contact_Form_TimePicker1 <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" type="time" style="display:block; float: left; width: 29%;" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
														<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_TimePicker Rich_Web_Contact_Form_TimePicker1 <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" type="time" style="display:block; float: left; width: 29%; margin-left: 2%;" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
														<span style="display: block; width: 60%; float: right; margin-top: -24px;">
															<span style="display:block; float: left; width: 49%; margin-left: 1%;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span">
															</span>
															<span style="display:block; float: left; width: 48%; margin-left: 2%;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2_Span">
															</span>
														</span>
										  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Right'){ ?>
										  				<label class="Rich_Web_Forms_Label" style="text-align:right; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?><span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
														<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_TimePicker Rich_Web_Contact_Form_TimePicker1 <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" type="time" style="display:block; float: left; width: 29%;" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
														<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_TimePicker Rich_Web_Contact_Form_TimePicker1 <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" type="time" style="display:block; float: left; width: 29%; margin-left: 2%;" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
														<span style="display: block; width: 60%; float: right; margin-top: -24px;">
															<span style="display:block; float: left; width: 49%; margin-left: 1%;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span">
															</span>
															<span style="display:block; width: 48%; float: left; margin-left: 2%;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>'_2_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2_Span">
															</span>
														</span>
										  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Above Field'){ ?>
										  				<label class="Rich_Web_Forms_Label" style="display:block; width: 100%; margin-bottom: 3px; "><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?> <span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
										  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_TimePicker Rich_Web_Contact_Form_TimePicker1 <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" type="time" style="display:block; float: left; width: 49%;" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
										  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_TimePicker Rich_Web_Contact_Form_TimePicker1 <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" type="time" style="display:block; float: left; width: 49%; margin-left: 2%;" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
										  				<span style="display: block; width: 100%; float: right; margin-top: -24px;">
										  					<span style="display:block; float: left; width: 49%; margin-left: 1%;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span">
										  					</span>
										  					<span style="display:block; width: 48%; float: left; margin-left: 2%" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2_Span">
										  					</span>
										  				</span>
										  			<?php }?>
										  		<?php } else { ?>
										  			<?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Left'){ ?>
										  				<label class="Rich_Web_Forms_Label" style="text-align:left; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?><span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
														<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_TimePicker <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="time" style="display:block; float: left; width: 60%;" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
														<span style="display: block; width: 59%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
														</span>
										  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Right'){ ?>
										  				<label class="Rich_Web_Forms_Label" style="text-align:right; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?><span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
														<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_TimePicker <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="time" style=" display:block; float: left; width: 60%;" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
														<span style="display: block; width: 59%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
														</span>
										  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Above Field'){ ?>
										  				<label class="Rich_Web_Forms_Label" style="display:block; width: 100%; margin-bottom: 3px; "><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?> <span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
										  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_TimePicker <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="time" style="display:block; float: left; width: 100%;" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
										  				<span style="display: block; width: 99%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
										  				</span>
										  			<?php }?>
										  		<?php }?>
									  		</div>
									  		<?php echo $Rich_Web_Forms_FieldsEnd[$i]; ?>
									  	<?php
									        break;
									    case "Full Name":
									    ?>
									    <?php echo $Rich_Web_Forms_FieldsStart[$i]; ?>
									  		<div class="Rich_Web_Forms_Div_Fields" style="float:left; position: relative; width: <?php echo $Rich_Web_Forms_FieldsWidth[$i]; ?>; margin: <?php echo $Rich_Web_Forms_FieldsMargin[$i]; ?>">
									  			<?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Left'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="text-align:left; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?><span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
									  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_FN <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" type="text" style="display:block; float: left; width: 29%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
									  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_FN <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" type="text" style="display:block; float: left; width: 29%; margin-left: 2%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
									  				<span style="display: block; width: 60%; float: right; margin-top: -24px;">
									  					<span style="display:block; float: left; width: 49%; margin-left: 1%;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span">
									  					</span>
									  					<span style="display:block; float: left; width: 48%; margin-left: 2%;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2_Span">
									  					</span>
									  				</span>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Right'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="text-align:right; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?><span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
									  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_FN <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" type="text" style="display:block; float: left; width: 29%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
									  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_FN <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" type="text" style="display:block; float: left; width: 29%; margin-left: 2%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
									  				<span style="display: block; width: 60%; float: right; margin-top: -24px;">
									  					<span style="display:block; float: left; width: 49%; margin-left: 1%;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span">
									  					</span>
									  					<span style="display:block; float: left; width: 48%; margin-left: 2%;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2_Span">
									  					</span>
									  				</span>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Placeholder'){ ?>
									  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_FN <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" type="text" style="display:block; float: left; width: 49%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
									  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_FN <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" type="text" style="display:block; float: left; width: 49%; margin-left: 2%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
									  				<span style="display: block; width: 100%; float: right; margin-top: -24px;">
									  					<span style="display:block; float: left; width: 49%; margin-left: 1%;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span">
									  					</span>
									  					<span style="display:block; width: 48%; float: left; margin-left: 2%;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2_Span">
									  					</span>
									  				</span>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Above Field'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="display:block; width: 100%; margin-bottom: 3px; "><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?> <span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
									  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_FN <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1" type="text" style="display:block; float: left; width: 49%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
									  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_FN <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2" type="text" style="display:block; float: left; width: 49%; margin-left: 2%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
									  				<span style="display: block; width: 100%; float: right; margin-top: -24px;">
									  					<span style="display:block; float: left; width: 49%; margin-left: 1%;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_1_Span">
									  					</span>
									  					<span style="display:block; float: left; width: 48%; margin-left: 2%" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_2_Span">
									  					</span>
									  				</span>
									  			<?php }?>
									  		</div>
									  		<?php echo $Rich_Web_Forms_FieldsEnd[$i]; ?>
									  	<?php
									        break;
									    case "Phone":
									    ?>
									    <?php echo $Rich_Web_Forms_FieldsStart[$i]; ?>
									  		<div class="Rich_Web_Forms_Div_Fields" style="float:left; position: relative; width: <?php echo $Rich_Web_Forms_FieldsWidth[$i]; ?>; margin: <?php echo $Rich_Web_Forms_FieldsMargin[$i]; ?>">
									  			<?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Left'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="text-align:left; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?><span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
									  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_Phone <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="tel" style="display:block; float: left; width: 100%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
									  				<span style="display: block; width: 59%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
									  				</span>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Right'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="text-align:right; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?><span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
									  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_Phone <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="tel" style=" display:block; float: left; width: 100%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
									  				<span style="display: block; width: 59%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
									  				</span>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Placeholder'){ ?>
									  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_Phone <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="tel" style="display:block; float: left; width: 100%;" placeholder="<?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?> <?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
									  				<span style="display: block; width: 99%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
									  				</span>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Above Field'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="display:block; width: 100%; margin-bottom: 3px; "><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?> <span><?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5 == 'required'){ echo '*';}?></span></label>
									  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_Phone <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5;?>" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="tel" style="display:block; float: left; width: 100%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
									  				<span style="display: block; width: 99%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
									  				</span>
									  			<?php }?>
									  		</div>
									  		<?php echo $Rich_Web_Forms_FieldsEnd[$i]; ?>
									  	<?php
									        break;
									    case "Country":
									    ?>
									    <?php echo $Rich_Web_Forms_FieldsStart[$i]; ?>
									  		<div class="Rich_Web_Forms_Div_Fields" style="float:left; position: relative; width: <?php echo $Rich_Web_Forms_FieldsWidth[$i]; ?>; margin: <?php echo $Rich_Web_Forms_FieldsMargin[$i]; ?>">
									  			<?php if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Left'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="text-align:left; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?></label>
									  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_Country" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="tel" style="display:block; float: left; width: 100%;" value="" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
									  				<span style="display: block; width: 59%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
									  				</span>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Right'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="text-align:right; display:block; width: 39%; margin-right: 1%;"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?></label>
									  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_Country" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="tel" style=" display:block; float: left; width: 100%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
									  				<span style="display: block; width: 59%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
									  				</span>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Placeholder'){ ?>
									  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_Country" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="tel" style="display:block; float: left; width: 100%;" placeholder="<?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
									  				<span style="display: block; width: 99%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
									  				</span>
									  			<?php } else if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3 == 'Above Field'){ ?>
									  				<label class="Rich_Web_Forms_Label" style="display:block; width: 100%; margin-bottom: 3px; "><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?></label>
									  				<input class="Rich_Web_Contact_Form Rich_Web_Contact_Form_Country" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>" type="tel" style="display:block; float: left; width: 100%;" placeholder="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>" <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O6;?>>
									  				<span style="display: block; width: 99%; float: right;" class="Rich_Web_Contact_Form_Span" id="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span" name="Rich_Web_Contact_Form_<?php echo $Rich_Web_Forms;?>_<?php echo $i;?>_Span">
									  				</span>
									  			<?php }?>
									  		</div>
									  		<?php echo $Rich_Web_Forms_FieldsEnd[$i]; ?>
									  	<?php
									        break;
									    case "Privacy Policy":
									    ?>
									    <?php echo $Rich_Web_Forms_FieldsStart[$i]; ?>
									  		<div class="Rich_Web_Forms_Div_Fields" style="float:left; position: relative; width: <?php echo $Rich_Web_Forms_FieldsWidth[$i]; ?>; margin: <?php echo $Rich_Web_Forms_FieldsMargin[$i]; ?>">
									  			<input type="checkbox" class="Rich_Web_Contact_Form Rich_Web_Contact_Form_Privacy" id="Rich_Web_Contact_Form_Privacy_<?php echo $Rich_Web_Forms;?>" name="Rich_Web_Contact_Form_Privacy_<?php echo $Rich_Web_Forms;?>" value="Rich_Web_Contact_Form_Privacy_<?php echo $Rich_Web_Forms;?>">
									  			<label class="rich_web rich_web-trash Rich_Web_Contact_Form_Privacy_Lab" style="display: inline-block; float: <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>;" for="Rich_Web_Contact_Form_Privacy_<?php echo $Rich_Web_Forms;?>"><?php echo html_entity_decode($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1);?></label>
									  			<p class="Rich_Web_Contact_Form_Privacy_p" style="text-align: <?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>">
									  				<span id="Rich_Web_Contact_Form_Privacy_<?php echo $Rich_Web_Forms;?>_Span"></span>
									  			</p>
									  		</div>
									  		<?php echo $Rich_Web_Forms_FieldsEnd[$i]; ?>
									  	<?php
									        break;
									    case "Google Map":
									    ?>
									    <?php echo $Rich_Web_Forms_FieldsStart[$i]; ?>
										    <div class="Rich_Web_Forms_Div_Fields" style="float:left; position: relative; width: <?php echo $Rich_Web_Forms_FieldsWidth[$i]; ?>; margin: <?php echo $Rich_Web_Forms_FieldsMargin[$i]; ?>">
										  		<div class="Rich_Web_Forms_map_<?php echo $Rich_Web_Forms;?>" id="Rich_Web_Forms_map" style="height: <?php if($Rich_Web_Forms_Theme3[0]->Rich_Web_Forms_T_03 == ''){ echo '400'; }else{ echo $Rich_Web_Forms_Theme3[0]->Rich_Web_Forms_T_03; } ?>px; width: <?php if($Rich_Web_Forms_Theme3[0]->Rich_Web_Forms_T_02 == ''){ echo '100'; }else{ echo $Rich_Web_Forms_Theme3[0]->Rich_Web_Forms_T_02; } ?>%;"></div>
									  		</div>										  	
									  		<input type="text" style="display: none;" id="Rich_Web_Forms_MLat" value="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1;?>">
									  		<input type="text" style="display: none;" id="Rich_Web_Forms_MLong" value="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>">
									  		<input type="text" style="display: none;" id="Rich_Web_Forms_MZoom" value="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3;?>">
									  		<input type="text" style="display: none;" id="Rich_Web_Forms_MType" value="<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4;?>">
									    	<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_8;?>&callback=Rich_Web_Forms_Map"></script>
									    	<?php echo $Rich_Web_Forms_FieldsEnd[$i]; ?>
									  	<?php
									        break;
									}
								}
								$RichWebContactFormsCpatcha = false;
								for($i=0;$i<$Rich_Web_Forms_Manager[0]->Forms_Fields_count;$i++)
								{
									if($Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Captcha')
									{
										$RichWebContactFormsCpatcha = true;
										break;										
									}		
								}
								if($RichWebContactFormsCpatcha === true)
								{
									?>
										<script src="https://www.google.com/recaptcha/api.js?onload=RichWebonloadCallback&render=explicit" async defer></script>
										<script type="text/javascript">
											var Rich_Web_Forms_TFa = false;
											function RichWebverifyCallback()
											{ 
												Rich_Web_Forms_TFa = true;
											}
											function RichWebcapcha_expired() 
											{
												var Rich_Web_Forms_Hidden_10 = jQuery('#Rich_Web_Forms_Hidden_10_<?php echo $Rich_Web_Forms;?>').val(); // Captcha is Not Validated
												jQuery('#Rich_Web_Contact_Form_Captcha_<?php echo $Rich_Web_Forms;?>_Span').addClass('Rich_Web_Contact_Form_Span_Error');
												jQuery('#Rich_Web_Contact_Form_Captcha_<?php echo $Rich_Web_Forms;?>').addClass('Rich_Web_Contact_Form_Input_Error');
												jQuery('#Rich_Web_Contact_Form_Captcha_<?php echo $Rich_Web_Forms;?>_Span').html(Rich_Web_Forms_Hidden_10);
											    Rich_Web_Forms_TFa = false;
											}
											function check_if_capcha_is_filled (e) 
											{
												return Rich_Web_Forms_TFa;
											}
											var widgetid1;
											var RichWebonloadCallback = function() {
										        widgetid1 = grecaptcha.render('Rich_Web_Contact_Form_Captcha_<?php echo $Rich_Web_Forms;?>', {
												        'sitekey' : '<?php echo $Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_4;?>',
														'theme' : '<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1;?>',
														'type' : '<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3;?>',
														'size' : '<?php echo $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O2;?>',
														'callback' : RichWebverifyCallback,
														'expired-callback' : RichWebcapcha_expired ,
												    });
											    };
										</script>
									<?php
								}
								else
								{
									?>
										<script type="text/javascript">
											function check_if_capcha_is_filled () 
											{
												return true;
											}
										</script>
									<?php
								}
							?>	
							<style type="text/css">
								<?php if(!empty($Rich_Web_Forms_Fields_Phone)){ ?>
								.intl-tel-input
								{
									margin-bottom: 14px !important;
									<?php if($Rich_Web_Forms_Fields_Phone[0]->Rich_Web_Forms_Fields_O3 == 'Left' || $Rich_Web_Forms_Fields_Phone[0]->Rich_Web_Forms_Fields_O3 == 'Right'){ ?>
										width: 60% !important;
									<?php }else{ ?>
										width: 100% !important;
									<?php }?>
								}
								<?php }?>	
								<?php if(!empty($Rich_Web_Forms_Fields_Country)){ ?>
								.country-select
								{
									margin-bottom: 14px !important;
									<?php if($Rich_Web_Forms_Fields_Country[0]->Rich_Web_Forms_Fields_O3 == 'Left' || $Rich_Web_Forms_Fields_Country[0]->Rich_Web_Forms_Fields_O3 == 'Right'){ ?>
										width: 60% !important;
									<?php }else{ ?>
										width: 100% !important;
									<?php }?>
								}
								<?php }?>
								<?php if(!empty($Rich_Web_Forms_Fields_Privacy)){ ?>
									.Rich_Web_Contact_Form_Privacy_Lab p { display: inline-block !important; padding: 0px 10px;}	
									<?php if($Rich_Web_Forms_Fields_Privacy[0]->Rich_Web_Forms_Fields_O2 == 'Right'){ ?>
										.Rich_Web_Contact_Form_Privacy_Lab:before 
										{ 
											float: right; 
											<?php if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_CBS=='Big'){ ?>
												margin-top: 4px;					
											<?php }else if($Rich_Web_Forms_Theme1[0]->Rich_Web_Forms_T_CBS=='Medium'){ ?>
												margin-top: 9px;						
											<?php }else{ ?>
												margin-top: 11px;
											<?php }?>
										}										
									<?php }?>										
									<?php if($Rich_Web_Forms_Fields_Privacy[0]->Rich_Web_Forms_Fields_O4 == 'right'){ ?>
										.Rich_Web_Contact_Form_Privacy_p { padding: 28px 10px 0px 10px; }
									<?php } else { ?>
										.Rich_Web_Contact_Form_Privacy_p { margin: 5px 10px !important; }
										.Rich_Web_Contact_Form_Privacy_p span {	padding-left: 10px;	}
									<?php }?>										
								<?php }?>
								@media only screen and ( max-width: 500px ){ .country-select, .intl-tel-input { width: 100% !important; } }
							</style>
							<input type="text" style="display: none;" id="Rich_Web_Forms_Hidden_7_<?php echo $Rich_Web_Forms;?>" name="Rich_Web_Forms_Hidden_7_<?php echo $Rich_Web_Forms;?>" value="<?php echo html_entity_decode($Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_7);?>">					
							<input type="text" style="display: none;" id="Rich_Web_Forms_Hidden_9_<?php echo $Rich_Web_Forms;?>" name="Rich_Web_Forms_Hidden_9_<?php echo $Rich_Web_Forms;?>" value="<?php echo html_entity_decode($Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_9);?>">					
							<input type="text" style="display: none;" id="Rich_Web_Forms_Hidden_10_<?php echo $Rich_Web_Forms;?>" name="Rich_Web_Forms_Hidden_10_<?php echo $Rich_Web_Forms;?>" value="<?php echo html_entity_decode($Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_10);?>">					
							<input type="text" style="display: none;" id="Rich_Web_Forms_Hidden_11_<?php echo $Rich_Web_Forms;?>" name="Rich_Web_Forms_Hidden_11_<?php echo $Rich_Web_Forms;?>" value="<?php echo html_entity_decode($Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_11);?>">					
							<input type="text" style="display: none;" id="Rich_Web_Forms_Hidden_12_<?php echo $Rich_Web_Forms;?>" name="Rich_Web_Forms_Hidden_12_<?php echo $Rich_Web_Forms;?>" value="<?php echo html_entity_decode($Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_12);?>">	
							<input type="text" style="display: none;" id="Rich_Web_Forms_Submited_<?php echo $Rich_Web_Forms;?>" name="Rich_Web_Forms_Submited_<?php echo $Rich_Web_Forms;?>" value="ok">					
						</div>
					</body>						
				</form>
			<?php
 		 	echo $after_widget;
 		}
	}
?>