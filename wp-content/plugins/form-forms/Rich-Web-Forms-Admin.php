<?php
	if(!defined('ABSPATH')) exit;
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	global $wpdb;
	$table_name1 = $wpdb->prefix . "rich_web_forms_id";
	$table_name2 = $wpdb->prefix . "rich_web_forms_manager";
	$table_name3 = $wpdb->prefix . "rich_web_forms_fields";
	$table_name4 = $wpdb->prefix . "rich_web_forms_themes1";
	$table_name6 = $wpdb->prefix . "rich_web_forms_options";

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(check_admin_referer( 'edit-menu_'.$comment_id, 'Rich_Web_Forms_Nonce' ))
		{	
			$Rich_Web_Forms_Name=sanitize_text_field($_POST['Rich_Web_Forms_Name']);
			$Rich_Web_Forms_Theme=sanitize_text_field($_POST['Rich_Web_Forms_Theme']);
			$Rich_Web_Forms_Option=sanitize_text_field($_POST['Rich_Web_Forms_Option']);
			$Rich_Web_Forms_New_ID=sanitize_text_field($_POST['Rich_Web_Forms_New_ID']);
			$Rich_Web_Forms_New_Co=sanitize_text_field($_POST['Rich_Web_Forms_New_Co']);

			$Rich_Web_Forms_FF = array();
			$Rich_Web_Forms_FW = array();
			$Rich_Web_Forms_FT = array();
			$Rich_Web_Forms_Fields_O1 = array();
			$Rich_Web_Forms_Fields_O2 = array();
			$Rich_Web_Forms_Fields_O3 = array();
			$Rich_Web_Forms_Fields_O4 = array();
			$Rich_Web_Forms_Fields_O5 = array();
			$Rich_Web_Forms_Fields_O6 = array();
			$Rich_Web_Forms_Fields_O7 = array();
			$Rich_Web_Forms_Fields_O8 = array();
			for($i=1;$i<=$Rich_Web_Forms_New_Co;$i++)
			{
				$Rich_Web_Forms_FF[$i] = str_replace("\&","&", sanitize_text_field(esc_html($_POST['Rich_Web_Forms_Field_' . $Rich_Web_Forms_New_ID . '_' . $i])));
				$Rich_Web_Forms_FW[$i] = sanitize_text_field($_POST['Rich_Web_Forms_Field_W_' . $Rich_Web_Forms_New_ID . '_' . $i]);
				$Rich_Web_Forms_FT[$i] = sanitize_text_field($_POST['Rich_Web_Forms_Field_T_' . $Rich_Web_Forms_New_ID . '_' . $i]);
				$Rich_Web_Forms_Fields_O1[$i] = str_replace("\&","&", sanitize_text_field(esc_html($_POST['Rich_Web_Forms_Field_O1_' . $Rich_Web_Forms_New_ID . '_' . $i])));
				$Rich_Web_Forms_Fields_O2[$i] = sanitize_text_field($_POST['Rich_Web_Forms_Field_O2_' . $Rich_Web_Forms_New_ID . '_' . $i]);
				$Rich_Web_Forms_Fields_O3[$i] = sanitize_text_field($_POST['Rich_Web_Forms_Field_O3_' . $Rich_Web_Forms_New_ID . '_' . $i]);
				$Rich_Web_Forms_Fields_O4[$i] = sanitize_text_field($_POST['Rich_Web_Forms_Field_O4_' . $Rich_Web_Forms_New_ID . '_' . $i]);
				$Rich_Web_Forms_Fields_O5[$i] = sanitize_text_field($_POST['Rich_Web_Forms_Field_O5_' . $Rich_Web_Forms_New_ID . '_' . $i]);
				$Rich_Web_Forms_Fields_O6[$i] = sanitize_text_field($_POST['Rich_Web_Forms_Field_O6_' . $Rich_Web_Forms_New_ID . '_' . $i]);
				$Rich_Web_Forms_Fields_O7[$i] = sanitize_text_field($_POST['Rich_Web_Forms_Field_O7_' . $Rich_Web_Forms_New_ID . '_' . $i]);
				$Rich_Web_Forms_Fields_O8[$i] = sanitize_text_field($_POST['Rich_Web_Forms_Field_O8_' . $Rich_Web_Forms_New_ID . '_' . $i]);
			}

			if(isset($_POST['Rich_Web_Forms_Save']))
			{
				$Rich_Web_Forms_IDs=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE id>%d order by id desc limit 1",0));
				$Rich_Web_Forms_IDs_New=$Rich_Web_Forms_IDs[0]->Forms_ID + 1;
				$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, Forms_ID) VALUES (%d, %d)", '', $Rich_Web_Forms_IDs_New));

				$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Forms_name, Forms_theme, Forms_Fields_count, Forms_option) VALUES (%d, %s, %s, %d, %s)", '', $Rich_Web_Forms_Name, $Rich_Web_Forms_Theme, $Rich_Web_Forms_New_Co, $Rich_Web_Forms_Option));
				$Rich_Web_Forms_Fields_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE Forms_name=%s order by id desc limit 1",$Rich_Web_Forms_Name));

				for($i=1;$i<=$Rich_Web_Forms_New_Co;$i++)
				{			
					$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, Forms_ID, Forms_Fields, Forms_Fields_Width, Forms_Fields_Type, Rich_Web_Forms_Fields_O1, Rich_Web_Forms_Fields_O2, Rich_Web_Forms_Fields_O3, Rich_Web_Forms_Fields_O4, Rich_Web_Forms_Fields_O5, Rich_Web_Forms_Fields_O6, Rich_Web_Forms_Fields_O7, Rich_Web_Forms_Fields_O8) VALUES (%d, %d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Rich_Web_Forms_Fields_ID[0]->id, $Rich_Web_Forms_FF[$i], $Rich_Web_Forms_FW[$i], $Rich_Web_Forms_FT[$i], $Rich_Web_Forms_Fields_O1[$i], $Rich_Web_Forms_Fields_O2[$i], $Rich_Web_Forms_Fields_O3[$i], $Rich_Web_Forms_Fields_O4[$i], $Rich_Web_Forms_Fields_O5[$i], $Rich_Web_Forms_Fields_O6[$i], $Rich_Web_Forms_Fields_O7[$i], $Rich_Web_Forms_Fields_O8[$i]));
				}
			}
			else if(isset($_POST['Rich_Web_Forms_Update']))
			{
				$wpdb->query($wpdb->prepare("UPDATE $table_name2 set Forms_name=%s, Forms_theme=%s, Forms_Fields_count=%d, Forms_option=%s WHERE id=%d", $Rich_Web_Forms_Name, $Rich_Web_Forms_Theme, $Rich_Web_Forms_New_Co, $Rich_Web_Forms_Option, $Rich_Web_Forms_New_ID));
				$wpdb->query($wpdb->prepare("DELETE FROM $table_name3 WHERE Forms_ID=%d", $Rich_Web_Forms_New_ID));

				for($i=1;$i<=$Rich_Web_Forms_New_Co;$i++)
				{			
					$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, Forms_ID, Forms_Fields, Forms_Fields_Width, Forms_Fields_Type, Rich_Web_Forms_Fields_O1, Rich_Web_Forms_Fields_O2, Rich_Web_Forms_Fields_O3, Rich_Web_Forms_Fields_O4, Rich_Web_Forms_Fields_O5, Rich_Web_Forms_Fields_O6, Rich_Web_Forms_Fields_O7, Rich_Web_Forms_Fields_O8) VALUES (%d, %d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Rich_Web_Forms_New_ID, $Rich_Web_Forms_FF[$i], $Rich_Web_Forms_FW[$i], $Rich_Web_Forms_FT[$i], $Rich_Web_Forms_Fields_O1[$i], $Rich_Web_Forms_Fields_O2[$i], $Rich_Web_Forms_Fields_O3[$i], $Rich_Web_Forms_Fields_O4[$i], $Rich_Web_Forms_Fields_O5[$i], $Rich_Web_Forms_Fields_O6[$i], $Rich_Web_Forms_Fields_O7[$i], $Rich_Web_Forms_Fields_O8[$i]));
				}
			}
		}
		else
	    {
	        wp_die('Security check fail'); 
	    }	
	}

	$Rich_Web_Forms_ID    =$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE id>%d order by id desc limit 1",0));
	$Rich_Web_Forms_Dat   =$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id>%d order by id", 0));
	$Rich_Web_Forms_Dat1  =$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id>%d order by id", 0));
	$Rich_Web_Forms_Themes=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id>%d order by id", 0));
	$Rich_Web_Forms_Option=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE id>%d order by id", 0));	
?>
<form method="POST" enctype="multipart/form-data">
	<script src='<?php echo plugins_url('/Scripts/tinymce.min.js',__FILE__);?>'></script>	
	<script src='<?php echo plugins_url('/Scripts/jquery.tinymce.min.js',__FILE__);?>'></script>	
	<?php wp_nonce_field( 'edit-menu_'.$comment_id, 'Rich_Web_Forms_Nonce' );?>
	<?php require_once( 'Rich-Web-Forms-Header.php' ); ?>	
	<div style="position: relative; width: 100%; right: 1%; height: 50px;">
		<input type='button' class='Rich_Web_Forms_Add' value='New Form' onclick='Rich_Web_Forms_Added(<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>)'/>
		<input type='submit' class='Rich_Web_Forms_Save' value='Save Form' name='Rich_Web_Forms_Save' />
		<input type='submit' class='Rich_Web_Forms_Update' value='Update Form' name='Rich_Web_Forms_Update'/>
		<input type='button' class='Rich_Web_Forms_Cancel' value='Cancel' onclick='Rich_Web_Forms_Canceled()'/>
		<input type='text' style='display:none' id="Rich_Web_Forms_Upd_ID" name='Rich_Web_Forms_Upd_ID' value="">
		<input type='text' style='display:none' id="Rich_Web_Forms_New_ID" name='Rich_Web_Forms_New_ID' value="<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>">
		<input type='text' style='display:none' id="Rich_Web_Forms_New_Co" name='Rich_Web_Forms_New_Co' value="1">
    </div>	
	<div class='Rich_Web_Forms_Content'>
		<div class='Rich_Web_Forms_Content_Data1'>
			<table class='Rich_Web_Forms_Content_Table'>
				<tr class='Rich_Web_Forms_Content_Table_Tr'>
					<td>No</td>
					<td>Name</td>
					<td>Theme</td>
					<td>Fields</td>
					<td>Actions</td>
				</tr>
			</table>
			<table class='Rich_Web_Forms_Content_Table2'>
			<?php for($i=0;$i<count($Rich_Web_Forms_Dat);$i++){?> 
				<tr class='Rich_Web_Forms_Content_Table_Tr2'>
					<td><?php echo $i+1; ?></td>
					<td><?php echo $Rich_Web_Forms_Dat[$i]->Forms_name; ?></td>
					<td><?php echo $Rich_Web_Forms_Dat[$i]->Forms_theme; ?></td>
					<td><?php echo '(' . $Rich_Web_Forms_Dat[$i]->Forms_Fields_count . ')'; ?></td>
					<td onclick="Rich_Web_Forms_Copy(<?php echo $Rich_Web_Forms_Dat[$i]->id;?>)"><i class='Rich_Web_Forms_Copy rich_web rich_web-files-o'></i></td>
					<td onclick="Rich_Web_Forms_Edit(<?php echo $Rich_Web_Forms_Dat[$i]->id;?>)"><i class='Rich_Web_Forms_Edit rich_web rich_web-pencil'></i></td>
					<td onclick="Rich_Web_Forms_Delete(<?php echo $Rich_Web_Forms_Dat[$i]->id;?>)"><i class='Rich_Web_Forms_Del rich_web rich_web-trash'></i></td>
				</tr>
			<?php } ?>
			</table>
		</div>
		<div class="Rich_Web_Forms_Fixed_Div"></div>
		<div class="Rich_Web_Forms_Absolute_Div">
			<div class="Rich_Web_Forms_Relative_Div">
				<p> Are you sure you want to remove ? </p>				 
				<span class="Rich_Web_Forms_Relative_No">No</span>
				<span class="Rich_Web_Forms_Relative_Yes">Yes</span>
			</div>			
		</div>
		<div class='Rich_Web_Forms_Content_Data2'>
			<table class="Rich_Web_Forms_ShortTable" style="display: table; float: right;">
				<tr style="text-align:center">
					<td>Shortcode</td>
				</tr>
				<tr>
					<td>Copy &amp; paste the shortcode directly into any WordPress post or page.</td>
				</tr>
				<tr>
					<td class="Rich_Web_Forms_ShortID">[Rich_Web_Forms id="1"]</td>
				</tr>
				<tr>
					<td>Templete Include</td>
				</tr>
				<tr>
					<td>Copy &amp; paste this code into a template file to include the slideshow within your theme.</td>
				</tr>
				<tr>
					<td class="Rich_Web_Forms_ShortID_1">&lt;?php echo do_shortcode(&apos;[Rich_Web_Forms id="1"]&apos;);?&gt;</td>
				</tr>
			</table>
			<table class="Rich_Web_Forms_MainTable">
				<tr>
					<td>Forms Name :</td>
					<td>
						<input type="text" name="Rich_Web_Forms_Name" id="Rich_Web_Forms_Name" placeholder="Enter Your Form's Name . . ."  required>
					</td>
					<td>Select Theme :</td>
					<td>
						<select name="Rich_Web_Forms_Theme" id="Rich_Web_Forms_Theme">						
							<option disabled selected>Select Your Theme . . .</option>
							<?php for($i=0;$i<count($Rich_Web_Forms_Themes);$i++){?>
								<option value="<?php echo $Rich_Web_Forms_Themes[$i]->Rich_Web_Forms_T_T;?>"><?php echo $Rich_Web_Forms_Themes[$i]->Rich_Web_Forms_T_T;?></option>
							<?php }?>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>Select Option :</td>
					<td>
						<select name="Rich_Web_Forms_Option" id="Rich_Web_Forms_Option">						
							<option disabled selected>Select Your Option . . .</option>
							<?php for($i=0;$i<count($Rich_Web_Forms_Option);$i++){?>
								<option value="<?php echo $Rich_Web_Forms_Option[$i]->Rich_Web_Forms_O_1;?>"><?php echo $Rich_Web_Forms_Option[$i]->Rich_Web_Forms_O_1;?></option>
							<?php }?>
						</select>
					</td>
				</tr>
			</table>			
			<table class="Rich_Web_Forms_Fields">
				<tr>
					<td onclick="Rich_Web_Forms_Fields_Clicked('Text Box')">Text Box <i style="margin-left: 10px;" class="rich_web rich_web-server" aria-hidden="true"></i></td>
					<td onclick="Rich_Web_Forms_Fields_Clicked('Textarea')">Textarea <i style="margin-left: 10px;" class="rich_web rich_web-text-height" aria-hidden="true"></i></td>
					<td onclick="Rich_Web_Forms_Fields_Clicked('Select Menu')">Select Menu <i style="margin-left: 10px;" class="rich_web rich_web-bars" aria-hidden="true"></i></td>
				</tr>
				<tr>
					<td onclick="Rich_Web_Forms_Fields_Clicked('Check Box')">Check Box <i style="margin-left: 10px;" class="rich_web rich_web-check-square-o" aria-hidden="true"></i></td>
					<td onclick="Rich_Web_Forms_Fields_Clicked('Radio Box')">Radio Box <i style="margin-left: 10px;" class="rich_web rich_web-dot-circle-o" aria-hidden="true"></i></td>
					<td onclick="Rich_Web_Forms_Fields_Clicked('File')">File <i style="margin-left: 10px;" class="rich_web rich_web-folder-open-o" aria-hidden="true"></i></td>
				</tr>
				<tr>
					<td onclick="Rich_Web_Forms_Fields_Clicked('Custom Text')">Custom Text <i style="margin-left: 10px;" class="rich_web rich_web-header" aria-hidden="true"></i></td>
					<td onclick="Rich_Web_Forms_Fields_Clicked('Email')">Email <i style="margin-left: 10px;" class="rich_web rich_web-envelope-o" aria-hidden="true"></i></td>
					<td onclick="Rich_Web_Forms_Fields_Clicked('Button')">Button <i style="margin-left: 10px;" class="rich_web rich_web-paper-plane-o" aria-hidden="true"></i></td>
				</tr>
				<tr>
					<td onclick="Rich_Web_Forms_Fields_Clicked('Captcha')">Captcha <i style="margin-left: 10px;" class="rich_web rich_web-user-secret" aria-hidden="true"></i></td>
					<td onclick="Rich_Web_Forms_Fields_Clicked('Divider')">Divider <i style="margin-left: 10px;" class="rich_web rich_web-minus" aria-hidden="true"></i></td>
					<td onclick="Rich_Web_Forms_Fields_Clicked('Space')">Space <i style="margin-left: 10px;" class="rich_web rich_web-arrows-v" aria-hidden="true"></i></td>
				</tr>
				<tr>
					<td onclick="Rich_Web_Forms_Fields_Clicked('Google Map')">Google Map <i style="margin-left: 10px; margin-right: 10px;" class="rich_web rich_web-map-marker" aria-hidden="true"></i></td>
					<td onclick="Rich_Web_Forms_Fields_Clicked_Pro('DatePicker')">DatePicker <i style="margin-left: 10px; margin-right: 10px;" class="rich_web rich_web-calendar" aria-hidden="true"></i> (Pro)</td>
					<td onclick="Rich_Web_Forms_Fields_Clicked_Pro('TimePicker')">TimePicker <i style="margin-left: 10px; margin-right: 10px;" class="rich_web rich_web-clock-o" aria-hidden="true"></i> (Pro)</td>
				</tr>
				<tr>
					<td onclick="Rich_Web_Forms_Fields_Clicked_Pro('Full Name')">Full Name <i style="margin-left: 10px; margin-right: 10px;" class="rich_web rich_web-user-plus" aria-hidden="true"></i> (Pro)</td>
					<td onclick="Rich_Web_Forms_Fields_Clicked_Pro('Phone')">Phone <i style="margin-left: 10px; margin-right: 10px;" class="rich_web rich_web-phone" aria-hidden="true"></i> (Pro)</td>
					<td onclick="Rich_Web_Forms_Fields_Clicked_Pro('Country')">Country <i style="margin-left: 10px; margin-right: 10px;" class="rich_web rich_web-globe" aria-hidden="true"></i> (Pro)</td>
				</tr>
				<tr>
					<td onclick="Rich_Web_Forms_Fields_Clicked_Pro('Privacy Policy')">Privacy Policy <i style="margin-left: 10px; margin-right: 10px;" class="rich_web rich_web-check-square-o" aria-hidden="true"></i> (Pro)</td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<div class="Rich_Web_Forms_Fields_Content" id="Rich_Web_Forms_Fields_Content" onmousemove="Rich_Web_Forms_FC_Sortable()">
				<div class="Rich_Web_Forms_FC" id="Rich_Web_Forms_Field_1">
					<div class="Rich_Web_Forms_FC_No">
						<span>
							1
						</span>
					</div>
					<div class="Rich_Web_Forms_FC_C">
						<span class="Rich_Web_Forms_FC_C_Span" data-type="minus" onclick="Rich_Web_Forms_FC_C_Span_Clicked(1)">-</span>
						<span class="Rich_Web_Forms_FC_C_Span" data-type="plus" onclick="Rich_Web_Forms_FC_C_Span_Clicked(1)">+</span>
					</div>
					<div class="Rich_Web_Forms_FC_Lab">
						<label>1/1</label>
						<label>Custom Text</label>
						<input type="text" style="display: none;" class="Rich_Web_Forms_FF" id="Rich_Web_Forms_Field_<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>_1" name="Rich_Web_Forms_Field_<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>_1" value="">
						<input type="text" style="display: none;" class="Rich_Web_Forms_FW" id="Rich_Web_Forms_Field_W_<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>_1" name="Rich_Web_Forms_Field_W_<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>_1" value="100%">
						<input type="text" style="display: none;" class="Rich_Web_Forms_FT" id="Rich_Web_Forms_Field_T_<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>_1" name="Rich_Web_Forms_Field_T_<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>_1" value="Custom Text">
						<input type="text" style="display: none;" class="Rich_Web_Forms_FO1" id="Rich_Web_Forms_Field_O1_<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>_1" name="Rich_Web_Forms_Field_O1_<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>_1" value="">
						<input type="text" style="display: none;" class="Rich_Web_Forms_FO2" id="Rich_Web_Forms_Field_O2_<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>_1" name="Rich_Web_Forms_Field_O2_<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>_1" value="">
						<input type="text" style="display: none;" class="Rich_Web_Forms_FO3" id="Rich_Web_Forms_Field_O3_<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>_1" name="Rich_Web_Forms_Field_O3_<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>_1" value="">
						<input type="text" style="display: none;" class="Rich_Web_Forms_FO4" id="Rich_Web_Forms_Field_O4_<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>_1" name="Rich_Web_Forms_Field_O4_<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>_1" value="">
						<input type="text" style="display: none;" class="Rich_Web_Forms_FO5" id="Rich_Web_Forms_Field_O5_<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>_1" name="Rich_Web_Forms_Field_O5_<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>_1" value="">
						<input type="text" style="display: none;" class="Rich_Web_Forms_FO6" id="Rich_Web_Forms_Field_O6_<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>_1" name="Rich_Web_Forms_Field_O6_<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>_1" value="">
						<input type="text" style="display: none;" class="Rich_Web_Forms_FO7" id="Rich_Web_Forms_Field_O7_<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>_1" name="Rich_Web_Forms_Field_O7_<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>_1" value="">
						<input type="text" style="display: none;" class="Rich_Web_Forms_FO8" id="Rich_Web_Forms_Field_O8_<?php echo $Rich_Web_Forms_ID[0]->Forms_ID+1;?>_1" name="" value="">
						<i class="Rich_Web_Forms_FC_LabEdit rich_web rich_web-pencil" aria-hidden="true"></i>
						<i class="Rich_Web_Forms_FC_LabCopy rich_web rich_web-files-o" aria-hidden="true" onclick="Rich_Web_Forms_FC_LabCopy_Clicked(1)"></i>
						<i class="Rich_Web_Forms_FC_LabRemove rich_web rich_web-trash" aria-hidden="true" onclick="Rich_Web_Forms_FC_LabRemove_Clicked(1)"></i>
					</div>
				</div>
			</div>
			<div class="Rich_Web_Forms_Fields_Editing Rich_Web_Forms_Fields_Editing_Text" rel="">
				<div class="Rich_Web_Forms_Fields_Edit_Title">
					<span>Text Box</span>
					<i class="Rich_Web_Forms_FC_EditSave rich_web rich_web-floppy-o" aria-hidden="true"></i>
					<i class="Rich_Web_Forms_FC_EditUndo rich_web rich_web-undo" aria-hidden="true"></i>
				</div>
				<div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div1">
						<label>Label:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_Text_L">
						<label>Label Position:</label> 
							<select name="Rich_Web_Forms_FEditing_Text_LP">
								<option value="Left">Left</option>
								<option value="Right">Right</option>
								<option value="Placeholder">Placeholder</option>
								<option value="Above Field">Above Field</option>
							</select>
						<label>Placeholder Text:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_Text_P">
					</div>						
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Type:</label> 
						<label>
							<input type="radio" name="Rich_Web_Forms_FEditing_Text_T" value="text" checked>Simple Text
						</label>
						<label>
							<input type="radio" name="Rich_Web_Forms_FEditing_Text_T" value="number">Number
						</label>
					</div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Required Field:</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_Text_R">
					</div>		
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Active Field:</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_Text_A" checked>
					</div>				
				</div>
			</div>
			<div class="Rich_Web_Forms_Fields_Editing Rich_Web_Forms_Fields_Editing_Textarea" rel="">
				<div class="Rich_Web_Forms_Fields_Edit_Title">
					<span>Textarea</span>
					<i class="Rich_Web_Forms_FC_EditSave rich_web rich_web-floppy-o" aria-hidden="true"></i>
					<i class="Rich_Web_Forms_FC_EditUndo rich_web rich_web-undo" aria-hidden="true"></i>
				</div>
				<div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div1">
						<label>Label:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_TA_L">
						<label>Label Position:</label> 
							<select name="Rich_Web_Forms_FEditing_TA_LP">
								<option value="Left">Left</option>
								<option value="Right">Right</option>
								<option value="Placeholder">Placeholder</option>
								<option value="Above Field">Above Field</option>
							</select>
						<label>Placeholder Text:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_TA_P">
					</div>						
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Field Height (px):</label> 
						<div class="Rich_Web_Forms_Range">  
							<input class="Rich_Web_Forms_Range__range" type="range" id="Rich_Web_Forms_FEditing_TA_H" name="Rich_Web_Forms_FEditing_TA_H" value="80" min="50" max="500">
							<span class="Rich_Web_Forms_Range__value" id="Rich_Web_Forms_FEditing_TA_H_Span">0</span>
						</div>
					</div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Required Field:</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_TA_R">
					</div>		
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Active Field:</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_TA_A" checked>
					</div>		
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Possibility to Resize:</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_TA_ReS">
					</div>		
				</div>
			</div>
			<div class="Rich_Web_Forms_Fields_Editing Rich_Web_Forms_Fields_Editing_Select" rel="">
				<div class="Rich_Web_Forms_Fields_Edit_Title">
					<span>Select Menu</span>
					<i class="Rich_Web_Forms_FC_EditSave rich_web rich_web-floppy-o" aria-hidden="true"></i>
					<i class="Rich_Web_Forms_FC_EditUndo rich_web rich_web-undo" aria-hidden="true"></i>
				</div>
				<div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div1">
						<label>Label:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_SM_L">
						<label>Label Position:</label> 
							<select name="Rich_Web_Forms_FEditing_SM_LP">
								<option value="Left">Left</option>
								<option value="Right">Right</option>
								<option value="Placeholder">Placeholder</option>
								<option value="Above Field">Above Field</option>
							</select>
						<label>Placeholder Text:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_SM_P">
					</div>									
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Field Options:</label>
						<input type="text" name="">
						<i class="Rich_Web_Forms_FC_EditOption rich_web rich_web-plus" aria-hidden="true"></i>
					</div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div3">
							
					</div>
				</div>
			</div>
			<div class="Rich_Web_Forms_Fields_Editing Rich_Web_Forms_Fields_Editing_Check" rel="">
				<div class="Rich_Web_Forms_Fields_Edit_Title">
					<span>Check Box</span>
					<i class="Rich_Web_Forms_FC_EditSave rich_web rich_web-floppy-o" aria-hidden="true"></i>
					<i class="Rich_Web_Forms_FC_EditUndo rich_web rich_web-undo" aria-hidden="true"></i>
				</div>
				<div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div1">
						<label>Label:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_CB_L">
						<label>Label Position:</label> 
							<select name="Rich_Web_Forms_FEditing_CB_LP">
								<option value="Left">Left</option>
								<option value="Right">Right</option>
								<option value="Above Field">Above Field</option>
							</select>
					</div>
					
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Active Field(s):</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_CB_A" checked>
					</div>

					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Column Count:</label> 
						<div class="Rich_Web_Forms_Range">  
							<input class="Rich_Web_Forms_Range__range" type="range" id="Rich_Web_Forms_FEditing_CB_CC" name="Rich_Web_Forms_FEditing_CB_CC" value="1" min="1" max="10">
							<span class="Rich_Web_Forms_Range__value" id="Rich_Web_Forms_FEditing_CB_CC_Span">0</span>
						</div>
						<label>Field Options:</label>
						<input type="text" name="">
						<i class="Rich_Web_Forms_FC_EditChecks rich_web rich_web-plus" aria-hidden="true"></i>
					</div>

					<div class="Rich_Web_Forms_Fields_Editing_Text_div3">
							
					</div>
				</div>
			</div>
			<div class="Rich_Web_Forms_Fields_Editing Rich_Web_Forms_Fields_Editing_Radio" rel="">
				<div class="Rich_Web_Forms_Fields_Edit_Title">
					<span>Radio Box</span>
					<i class="Rich_Web_Forms_FC_EditSave rich_web rich_web-floppy-o" aria-hidden="true"></i>
					<i class="Rich_Web_Forms_FC_EditUndo rich_web rich_web-undo" aria-hidden="true"></i>
				</div>
				<div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div1">
						<label>Label:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_RB_L">
						<label>Label Position:</label> 
							<select name="Rich_Web_Forms_FEditing_RB_LP">
								<option value="Left">Left</option>
								<option value="Right">Right</option>
								<option value="Above Field">Above Field</option>
							</select>
					</div>
					
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Active Field(s):</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_RB_A" checked>
					</div>

					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Column Count:</label> 
						<div class="Rich_Web_Forms_Range">  
							<input class="Rich_Web_Forms_Range__range" type="range" id="Rich_Web_Forms_FEditing_RB_CC" name="Rich_Web_Forms_FEditing_RB_CC" value="1" min="1" max="10">
							<span class="Rich_Web_Forms_Range__value" id="Rich_Web_Forms_FEditing_RB_CC_Span">0</span>
						</div>
						<label>Field Options:</label>
						<input type="text" name="">
						<i class="Rich_Web_Forms_FC_EditRadios rich_web rich_web-plus" aria-hidden="true"></i>
					</div>

					<div class="Rich_Web_Forms_Fields_Editing_Text_div3">
							
					</div>
				</div>
			</div>
			<div class="Rich_Web_Forms_Fields_Editing Rich_Web_Forms_Fields_Editing_File" rel="">
				<div class="Rich_Web_Forms_Fields_Edit_Title">
					<span>File Box</span>
					<i class="Rich_Web_Forms_FC_EditSave rich_web rich_web-floppy-o" aria-hidden="true"></i>
					<i class="Rich_Web_Forms_FC_EditUndo rich_web rich_web-undo" aria-hidden="true"></i>
				</div>
				<div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div1">
						<label>Label:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_F_L">
						<label>Label Position:</label> 
							<select name="Rich_Web_Forms_FEditing_F_LP">
								<option value="Left">Left</option>
								<option value="Right">Right</option>
								<option value="Above Field">Above Field</option>
							</select>
					</div>					
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Required Field:</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_F_R">
					</div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Botton Text:</label>
						<input type="text" name="Rich_Web_Forms_FEditing_F_FD" style="width: 40%;">
						<div></div>
						<label>Allowed Types:</label>
						<input type="text" name="Rich_Web_Forms_FEditing_F_AT" value=".jpg, .png, .gif, .xlsx, .pdf, .xml, .xmlx, .xls, .xtx" style="width: 40%;">
					</div>
				</div>
			</div>
			<div class="Rich_Web_Forms_Fields_Editing Rich_Web_Forms_Fields_Editing_Custom" rel="">
				<div class="Rich_Web_Forms_Fields_Edit_Title">
					<span>Custom Text</span>
					<i class="Rich_Web_Forms_FC_EditSave rich_web rich_web-floppy-o" aria-hidden="true"></i>
					<i class="Rich_Web_Forms_FC_EditUndo rich_web rich_web-undo" aria-hidden="true"></i>
				</div>
				<div style="padding: none !important;">
					<textarea id="Rich_Web_Forms_Fields_Editing_Custom_ID">
					  
					</textarea>
				</div>
			</div>
			<div class="Rich_Web_Forms_Fields_Editing Rich_Web_Forms_Fields_Editing_Email" rel="">
				<div class="Rich_Web_Forms_Fields_Edit_Title">
					<span>Email Box</span>
					<i class="Rich_Web_Forms_FC_EditSave rich_web rich_web-floppy-o" aria-hidden="true"></i>
					<i class="Rich_Web_Forms_FC_EditUndo rich_web rich_web-undo" aria-hidden="true"></i>
				</div>
				<div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div1">
						<label>Label:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_E_L">
						<label>Label Position:</label> 
							<select name="Rich_Web_Forms_FEditing_E_LP">
								<option value="Left">Left</option>
								<option value="Right">Right</option>
								<option value="Placeholder">Placeholder</option>
								<option value="Above Field">Above Field</option>
							</select>
						<label>Placeholder Text:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_E_P">
					</div>						
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Required Field:</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_E_R">
					</div>		
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Active Field:</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_E_A" checked>
					</div>				
				</div>
			</div>
			<div class="Rich_Web_Forms_Fields_Editing Rich_Web_Forms_Fields_Editing_Button" rel="">
				<div class="Rich_Web_Forms_Fields_Edit_Title">
					<span>Button</span>
					<i class="Rich_Web_Forms_FC_EditSave rich_web rich_web-floppy-o" aria-hidden="true"></i>
					<i class="Rich_Web_Forms_FC_EditUndo rich_web rich_web-undo" aria-hidden="true"></i>
				</div>
				<div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div1">
						<label>Button Text:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_B_BT">
						<label>Reset Button Text:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_B_RBT">
					</div>						
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Actions After Clicking:</label>
						<select name="Rich_Web_Forms_FEditing_B_AAC" class="Rich_Web_Forms_FC_Edit_AAC" onchange="Rich_Web_Forms_FC_Edit_AAC_Clicked()">
							<option value="Go to URL">Go to URL</option>
							<option value="Printing Message">Printing Message</option>
							<option value="Refresh Page">Refresh Page</option>
						</select>
						<label>URL:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_B_URL">
					</div>		
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Show Reset Button:</label>
							<input type="checkbox" name="Rich_Web_Forms_FEditing_B_SRB">
					</div>				
				</div>
			</div>
			<div class="Rich_Web_Forms_Fields_Editing Rich_Web_Forms_Fields_Editing_Divider" rel="">
				<div class="Rich_Web_Forms_Fields_Edit_Title">
					<span>Divider</span>
					<i class="Rich_Web_Forms_FC_EditSave rich_web rich_web-floppy-o" aria-hidden="true"></i>
					<i class="Rich_Web_Forms_FC_EditUndo rich_web rich_web-undo" aria-hidden="true"></i>
				</div>
				<div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div1">
						<label>Width (px):</label> 
							<div class="Rich_Web_Forms_Range">  
								<input class="Rich_Web_Forms_Range__range" type="range" id="Rich_Web_Forms_FEditing_D_H" name="Rich_Web_Forms_FEditing_D_H" value="0" min="0" max="5">
								<span class="Rich_Web_Forms_Range__value" id="Rich_Web_Forms_FEditing_D_H_Span">0</span>
							</div>
						<label>Style:</label> 
							<select name="Rich_Web_Forms_FEditing_D_S" class="Rich_Web_Forms_DividerS_Field">
								<option value="none">  None  </option>
								<option value="solid"> Solid </option>
								<option value="dotted">Dotted</option>
								<option value="dashed">Dashed</option>
							</select>
					</div>						
				</div>
			</div>
			<div class="Rich_Web_Forms_Fields_Editing Rich_Web_Forms_Fields_Editing_Space" rel="">
				<div class="Rich_Web_Forms_Fields_Edit_Title">
					<span>Space</span>
					<i class="Rich_Web_Forms_FC_EditSave rich_web rich_web-floppy-o" aria-hidden="true"></i>
					<i class="Rich_Web_Forms_FC_EditUndo rich_web rich_web-undo" aria-hidden="true"></i>
				</div>
				<div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div1">
						<label>Height (px):</label> 
							<div class="Rich_Web_Forms_Range">  
								<input class="Rich_Web_Forms_Range__range" type="range" id="Rich_Web_Forms_FEditing_S_W" name="Rich_Web_Forms_FEditing_S_W" value="0" min="0" max="50">
								<span class="Rich_Web_Forms_Range__value" id="Rich_Web_Forms_FEditing_S_W_Span">0</span>
							</div>
					</div>						
				</div>
			</div>
			<div class="Rich_Web_Forms_Fields_Editing Rich_Web_Forms_Fields_Editing_Captcha" rel="">
				<div class="Rich_Web_Forms_Fields_Edit_Title">
					<span>Captcha</span>
					<i class="Rich_Web_Forms_FC_EditSave rich_web rich_web-floppy-o" aria-hidden="true"></i>
					<i class="Rich_Web_Forms_FC_EditUndo rich_web rich_web-undo" aria-hidden="true"></i>
				</div>
				<div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div1">
						<label>Theme:</label> 
							<select name="Rich_Web_Forms_FEditing_Captcha_Theme">
								<option value="light">Light</option>
								<option value="dark">Dark</option>
							</select>
						<label>Size:</label> 
							<select name="Rich_Web_Forms_FEditing_Captcha_Size">
								<option value="normal">Normal</option>
								<option value="compact">Compact</option>
							</select>
					</div>						
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Type:</label> 
							<select name="Rich_Web_Forms_FEditing_Captcha_Type">
								<option value="audio">Audio</option>
								<option value="image">Image</option>
							</select>
						<label>Position:</label> 
							<select name="Rich_Web_Forms_FEditing_Captcha_Pos">
								<option value="left">Left</option>
								<option value="right">Right</option>
							</select>
					</div>		
				</div>
			</div>
			<div class="Rich_Web_Forms_Fields_Editing Rich_Web_Forms_Fields_Editing_DatePicker" rel="">
				<div class="Rich_Web_Forms_Fields_Edit_Title">
					<span>DatePicker</span>
					<i class="Rich_Web_Forms_FC_EditSave rich_web rich_web-floppy-o" aria-hidden="true"></i>
					<i class="Rich_Web_Forms_FC_EditUndo rich_web rich_web-undo" aria-hidden="true"></i>
				</div>
				<div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div1">
						<label>Label:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_DateP_L">
						<label>Label Position:</label> 
							<select name="Rich_Web_Forms_FEditing_DateP_LP">
								<option value="Left">Left</option>
								<option value="Right">Right</option>
								<option value="Placeholder">Placeholder</option>
								<option value="Above Field">Above Field</option>
							</select>
						<label>Placeholder Text:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_DateP_P">
					</div>						
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Current Date:</label> 
						<input type="checkbox" name="Rich_Web_Forms_FEditing_DateP_Cur" checked>
					</div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Required Field:</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_DateP_R">
					</div>		
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Active Field:</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_DateP_A" checked>
					</div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>From/To:</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_DateP_FT">
					</div>				
				</div>
			</div>
			<div class="Rich_Web_Forms_Fields_Editing Rich_Web_Forms_Fields_Editing_TimePicker" rel="">
				<div class="Rich_Web_Forms_Fields_Edit_Title">
					<span>TimePicker</span>
					<i class="Rich_Web_Forms_FC_EditSave rich_web rich_web-floppy-o" aria-hidden="true"></i>
					<i class="Rich_Web_Forms_FC_EditUndo rich_web rich_web-undo" aria-hidden="true"></i>
				</div>
				<div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div1">
						<label>Label:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_TimeP_L">
						<label>Label Position:</label> 
							<select name="Rich_Web_Forms_FEditing_TimeP_LP">
								<option value="Left">Left</option>
								<option value="Right">Right</option>
								<option value="Above Field">Above Field</option>
							</select>
					</div>						
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Current Time:</label> 
						<input type="checkbox" name="Rich_Web_Forms_FEditing_TimeP_Cur" checked>
					</div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Required Field:</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_TimeP_R">
					</div>		
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Active Field:</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_TimeP_A" checked>
					</div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>From/To:</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_TimeP_FT">
					</div>					
				</div>
			</div>
			<div class="Rich_Web_Forms_Fields_Editing Rich_Web_Forms_Fields_Editing_Full_Name" rel="">
				<div class="Rich_Web_Forms_Fields_Edit_Title">
					<span>Full Name</span>
					<i class="Rich_Web_Forms_FC_EditSave rich_web rich_web-floppy-o" aria-hidden="true"></i>
					<i class="Rich_Web_Forms_FC_EditUndo rich_web rich_web-undo" aria-hidden="true"></i>
				</div>
				<div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div1">
						<label>Label:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_FullN_L">
						<label>Label Position:</label> 
							<select name="Rich_Web_Forms_FEditing_FullN_LP">
								<option value="Left">Left</option>
								<option value="Right">Right</option>
								<option value="Placeholder">Placeholder</option>
								<option value="Above Field">Above Field</option>
							</select>	
						<label>Placeholder Text 1:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_FullN_P_1">					
					</div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div1">
						<label>Placeholder Text 2:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_FullN_P_2">
					</div>					
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Required Field:</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_FullN_R">
					</div>		
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Active Field:</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_FullN_A" checked>
					</div>				
				</div>
			</div>
			<div class="Rich_Web_Forms_Fields_Editing Rich_Web_Forms_Fields_Editing_Phone" rel="">
				<div class="Rich_Web_Forms_Fields_Edit_Title">
					<span>Phone</span>
					<i class="Rich_Web_Forms_FC_EditSave rich_web rich_web-floppy-o" aria-hidden="true"></i>
					<i class="Rich_Web_Forms_FC_EditUndo rich_web rich_web-undo" aria-hidden="true"></i>
				</div>
				<div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div1">
						<label>Label:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_Phone_L">
						<label>Label Position:</label> 
							<select name="Rich_Web_Forms_FEditing_Phone_LP">
								<option value="Left">Left</option>
								<option value="Right">Right</option>
								<option value="Placeholder">Placeholder</option>
								<option value="Above Field">Above Field</option>
							</select>	
						<label>Placeholder Text:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_Phone_P">					
					</div>						
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Required Field:</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_Phone_R">
					</div>		
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Active Field:</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_Phone_A" checked>
					</div>				
				</div>
			</div>
			<div class="Rich_Web_Forms_Fields_Editing Rich_Web_Forms_Fields_Editing_Country" rel="">
				<div class="Rich_Web_Forms_Fields_Edit_Title">
					<span>Country</span>
					<i class="Rich_Web_Forms_FC_EditSave rich_web rich_web-floppy-o" aria-hidden="true"></i>
					<i class="Rich_Web_Forms_FC_EditUndo rich_web rich_web-undo" aria-hidden="true"></i>
				</div>
				<div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div1">
						<label>Label:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_Country_L">
						<label>Label Position:</label> 
							<select name="Rich_Web_Forms_FEditing_Country_LP">
								<option value="Left">Left</option>
								<option value="Right">Right</option>
								<option value="Placeholder">Placeholder</option>
								<option value="Above Field">Above Field</option>
							</select>	
						<label>Placeholder Text:</label> 
							<input type="text" name="Rich_Web_Forms_FEditing_Country_P">					
					</div>						
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Active Field:</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_Country_A" checked>
					</div>				
				</div>
			</div>
			<div class="Rich_Web_Forms_Fields_Editing Rich_Web_Forms_Fields_Editing_Privacy" rel="">
				<div class="Rich_Web_Forms_Fields_Edit_Title">
					<span>Privacy Policy</span>
					<i class="Rich_Web_Forms_FC_EditSave rich_web rich_web-floppy-o" aria-hidden="true"></i>
					<i class="Rich_Web_Forms_FC_EditUndo rich_web rich_web-undo" aria-hidden="true"></i>
				</div>
				<div class="Rich_Web_Forms_Fields_Editing_Text_div1">
					<label>Field Position:</label> 
						<select name="Rich_Web_Forms_FEditing_Privacy_FPos">
							<option value="left">Left</option>
							<option value="right">Right</option>
						</select>
					<label>CheckBox Position:</label> 
						<select name="Rich_Web_Forms_FEditing_Privacy_Pos">
							<option value="Left">Left</option>
							<option value="Right">Right</option>
						</select>
					<label>Required Field:</label>
						<input type="checkbox" name="Rich_Web_Forms_FEditing_Privacy_R">	
				</div>	
				<div style="padding: none !important; margin-top: 50px;">
					<textarea id="Rich_Web_Forms_Fields_Editing_Privacy_ID">
					  
					</textarea>
				</div>
			</div>
			<div class="Rich_Web_Forms_Fields_Editing Rich_Web_Forms_Fields_Editing_Map" rel="">
				<div class="Rich_Web_Forms_Fields_Edit_Title">
					<span>Google Map</span>
					<i class="Rich_Web_Forms_FC_EditSave rich_web rich_web-floppy-o" aria-hidden="true"></i>
					<i class="Rich_Web_Forms_FC_EditUndo rich_web rich_web-undo" aria-hidden="true"></i>
				</div>
				<div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div1">
						<label>Latitude:</label> 
							<input type="text" id="Rich_Web_Forms_FEditing_Map_Lat">
						<label>Longitude:</label> 
							<input type="text" id="Rich_Web_Forms_FEditing_Map_Long">					
					</div>						
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Zoom:</label>
							<div class="Rich_Web_Forms_Range">  
								<input class="Rich_Web_Forms_Range__range" type="range" id="Rich_Web_Forms_FEditing_Map_Zoom" name="Rich_Web_Forms_FEditing_Map_Zoom" value="1" min="1" max="20">
								<span class="Rich_Web_Forms_Range__value" id="Rich_Web_Forms_FEditing_Map_Zoom_Span">0</span>
							</div>
					</div>
					<div class="Rich_Web_Forms_Fields_Editing_Text_div2">
						<label>Map Type:</label> 
							<select id="Rich_Web_Forms_FEditing_Map_Type">
								<option value="ROADMAP">   Roadmap   </option>
								<option value="SATELLITE"> Satellite </option>
								<option value="HYBRID">    Hybrid    </option>
								<option value="TERRAIN">   Terrain   </option>
							</select>	
					</div>
				</div>	
			</div>
		</div>
	</div>
</form>