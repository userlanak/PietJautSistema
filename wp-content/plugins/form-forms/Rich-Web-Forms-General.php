<?php
	if(!defined('ABSPATH')) exit;
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	global $wpdb;
	$table_name6 = $wpdb->prefix . "rich_web_forms_options";

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(check_admin_referer( 'edit-menu_'.$comment_id, 'Rich_Web_Forms_Nonce' ))
		{	
			$Rich_Web_Forms_O_1 =sanitize_text_field($_POST['Rich_Web_Forms_O_1']);
			$Rich_Web_Forms_O_2 =str_replace("\&","&", sanitize_text_field(esc_html($_POST['Rich_Web_Forms_O_2'])));
			$Rich_Web_Forms_O_3 =sanitize_email($_POST['Rich_Web_Forms_O_3']);
			$Rich_Web_Forms_O_4 =sanitize_text_field($_POST['Rich_Web_Forms_O_4']);
			$Rich_Web_Forms_O_5 =sanitize_text_field($_POST['Rich_Web_Forms_O_5']);
			$Rich_Web_Forms_O_6 =sanitize_text_field($_POST['Rich_Web_Forms_O_6']);
			$Rich_Web_Forms_O_7 =str_replace("\&","&", sanitize_text_field(esc_html($_POST['Rich_Web_Forms_O_7'])));
			$Rich_Web_Forms_O_8 =sanitize_text_field($_POST['Rich_Web_Forms_O_8']);
			$Rich_Web_Forms_O_9 =str_replace("\&","&", sanitize_text_field(esc_html($_POST['Rich_Web_Forms_O_9'])));
			$Rich_Web_Forms_O_10=str_replace("\&","&", sanitize_text_field(esc_html($_POST['Rich_Web_Forms_O_10'])));
			$Rich_Web_Forms_O_11=str_replace("\&","&", sanitize_text_field(esc_html($_POST['Rich_Web_Forms_O_11'])));
			$Rich_Web_Forms_O_12=str_replace("\&","&", sanitize_text_field(esc_html($_POST['Rich_Web_Forms_O_12'])));
			$Rich_Web_Forms_O_13='';
			$Rich_Web_Forms_O_14='';
			$Rich_Web_Forms_O_15='';
			$Rich_Web_Forms_O_16=sanitize_text_field($_POST['Rich_Web_Forms_O_16']);
			$Rich_Web_Forms_O_17=sanitize_text_field($_POST['Rich_Web_Forms_O_17']);
			$Rich_Web_Forms_O_18=sanitize_email($_POST['Rich_Web_Forms_O_18']);
			$Rich_Web_Forms_O_19=str_replace("\&","&", sanitize_text_field(esc_html($_POST['Rich_Web_Forms_O_19'])));
			$Rich_Web_Forms_O_20=str_replace("\&","&", sanitize_text_field(esc_html($_POST['Rich_Web_Forms_O_20'])));
			$Rich_Web_Forms_O_21=str_replace("\&","&", sanitize_text_field(esc_html($_POST['Rich_Web_Forms_O_21'])));
			$Rich_Web_Forms_O_22=str_replace("\&","&", sanitize_text_field(esc_html($_POST['Rich_Web_Forms_O_22'])));

			$Server_Explode = explode('admin.php?', $_SERVER['HTTP_REFERER']);
			if(strpos($Rich_Web_Forms_O_21,"&quot;../"))
			{		
				$Rich_Web_Forms_O_21 = str_replace("&quot;..",'&quot;' . $Server_Explode[0] . '..',$Rich_Web_Forms_O_21);
			}	
			if(strpos($Rich_Web_Forms_O_22,"&quot;../"))
			{		
				$Rich_Web_Forms_O_22 = str_replace("&quot;..",'&quot;' . $Server_Explode[0] . '..',$Rich_Web_Forms_O_22);
			}

			if(isset($_POST['Rich_Web_Forms_Save_Option']))
			{
				$wpdb->query($wpdb->prepare("INSERT INTO $table_name6 (id, Rich_Web_Forms_O_1, Rich_Web_Forms_O_2, Rich_Web_Forms_O_3, Rich_Web_Forms_O_4, Rich_Web_Forms_O_5, Rich_Web_Forms_O_6, Rich_Web_Forms_O_7, Rich_Web_Forms_O_8, Rich_Web_Forms_O_9, Rich_Web_Forms_O_10, Rich_Web_Forms_O_11, Rich_Web_Forms_O_12, Rich_Web_Forms_O_13, Rich_Web_Forms_O_14, Rich_Web_Forms_O_15, Rich_Web_Forms_O_16, Rich_Web_Forms_O_17, Rich_Web_Forms_O_18, Rich_Web_Forms_O_19, Rich_Web_Forms_O_20, Rich_Web_Forms_O_21, Rich_Web_Forms_O_22) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Rich_Web_Forms_O_1, $Rich_Web_Forms_O_2, $Rich_Web_Forms_O_3, $Rich_Web_Forms_O_4, $Rich_Web_Forms_O_5, $Rich_Web_Forms_O_6, $Rich_Web_Forms_O_7, $Rich_Web_Forms_O_8, $Rich_Web_Forms_O_9, $Rich_Web_Forms_O_10, $Rich_Web_Forms_O_11, $Rich_Web_Forms_O_12, $Rich_Web_Forms_O_13, $Rich_Web_Forms_O_14, $Rich_Web_Forms_O_15, $Rich_Web_Forms_O_16, $Rich_Web_Forms_O_17, $Rich_Web_Forms_O_18, $Rich_Web_Forms_O_19, $Rich_Web_Forms_O_20, $Rich_Web_Forms_O_21, $Rich_Web_Forms_O_22));
			}
			else if(isset($_POST['Rich_Web_Forms_Update_Option']))
			{
				$Rich_Web_Forms_Upd_Option_ID =sanitize_text_field($_POST['Rich_Web_Forms_Upd_Option_ID']);
				$wpdb->query($wpdb->prepare("UPDATE $table_name6 set Rich_Web_Forms_O_1 = %s, Rich_Web_Forms_O_2 = %s, Rich_Web_Forms_O_3 = %s, Rich_Web_Forms_O_4 = %s, Rich_Web_Forms_O_5 = %s, Rich_Web_Forms_O_6 = %s, Rich_Web_Forms_O_7 = %s, Rich_Web_Forms_O_8 = %s, Rich_Web_Forms_O_9 = %s, Rich_Web_Forms_O_10 = %s, Rich_Web_Forms_O_11 = %s, Rich_Web_Forms_O_12 = %s, Rich_Web_Forms_O_13 = %s, Rich_Web_Forms_O_14 = %s, Rich_Web_Forms_O_15 = %s, Rich_Web_Forms_O_16 = %s, Rich_Web_Forms_O_17 = %s, Rich_Web_Forms_O_18 = %s, Rich_Web_Forms_O_19 = %s, Rich_Web_Forms_O_20 = %s, Rich_Web_Forms_O_21 = %s, Rich_Web_Forms_O_22 = %s WHERE id = %d", $Rich_Web_Forms_O_1, $Rich_Web_Forms_O_2, $Rich_Web_Forms_O_3, $Rich_Web_Forms_O_4, $Rich_Web_Forms_O_5, $Rich_Web_Forms_O_6, $Rich_Web_Forms_O_7, $Rich_Web_Forms_O_8, $Rich_Web_Forms_O_9, $Rich_Web_Forms_O_10, $Rich_Web_Forms_O_11, $Rich_Web_Forms_O_12, $Rich_Web_Forms_O_13, $Rich_Web_Forms_O_14, $Rich_Web_Forms_O_15, $Rich_Web_Forms_O_16, $Rich_Web_Forms_O_17, $Rich_Web_Forms_O_18, $Rich_Web_Forms_O_19, $Rich_Web_Forms_O_20, $Rich_Web_Forms_O_21, $Rich_Web_Forms_O_22, $Rich_Web_Forms_Upd_Option_ID));
			}
		}
		else
	    {
	        wp_die('Security check fail'); 
	    }	
	}

	$Rich_Web_Forms_O=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE id>%d", 0));
?>
<form method="POST" enctype="multipart/form-data">
	<script src='<?php echo plugins_url('/Scripts/tinymce.min.js',__FILE__)?>'></script>
	<script src='<?php echo plugins_url('/Scripts/jquery.tinymce.min.js',__FILE__)?>'></script>
	<?php wp_nonce_field( 'edit-menu_'.$comment_id, 'Rich_Web_Forms_Nonce' );?>
	<?php require_once( 'Rich-Web-Forms-Header.php' ); ?>	
	<div style="position: relative; width: 100%; right: 1%; height: 50px;">
		<input type='button' class='Rich_Web_Forms_Add_Option'    value='New Option'   onclick='Rich_Web_Forms_Added_Option()'/>
		<input type='submit' class='Rich_Web_Forms_Save_Option'   value='Save'         name='Rich_Web_Forms_Save_Option'/>
		<input type='submit' class='Rich_Web_Forms_Update_Option' value='Update'       name='Rich_Web_Forms_Update_Option'/>
		<input type='button' class='Rich_Web_Forms_Cancel_Option' value='Cancel'       onclick='Rich_Web_Forms_Canceled_Option()'/>
		<input type='text'   id="Rich_Web_Forms_Upd_Option_ID"    style='display:none' name='Rich_Web_Forms_Upd_Option_ID' value="">
	</div>
	<div class="Rich_Web_Forms_Fixed_Div"></div>
	<div class="Rich_Web_Forms_Absolute_Div">
		<div class="Rich_Web_Forms_Relative_Div">
			<p> Are you sure you want to remove ? </p>				 
			<span class="Rich_Web_Forms_Relative_No">No</span>
			<span class="Rich_Web_Forms_Relative_Yes">Yes</span>
		</div>			
	</div>
	<div class='Rich_Web_Forms_Content_Option'>
		<div class='Rich_Web_Forms_Content_Data1_Option'>
			<table class='Rich_Web_Forms_Content_Table_Option'>
				<tr class='Rich_Web_Forms_Content_Table_Option_Tr'>
					<td>No</td>
					<td>Option Title</td>
					<td>Actions</td>
				</tr>
			</table>
			<table class='Rich_Web_Forms_Content_Table_Option2'>
			<?php for($i=0;$i<count($Rich_Web_Forms_O);$i++){?> 
				<tr class='Rich_Web_Forms_Content_Table_Option_Tr2'>
					<td><?php echo $i+1; ?></td>
					<td><?php echo $Rich_Web_Forms_O[$i]->Rich_Web_Forms_O_1; ?></td>
					<td onclick="Rich_Web_Forms_Copy_Option(<?php echo $Rich_Web_Forms_O[$i]->id;?>)"><i class='Rich_Web_Forms_Copy rich_web rich_web-files-o'></i></td>
					<td onclick="Rich_Web_Forms_Edit_Option(<?php echo $Rich_Web_Forms_O[$i]->id;?>)"><i class='Rich_Web_Forms_Edit rich_web rich_web-pencil'></i></td>
					<td onclick="Rich_Web_Forms_Delete_Option(<?php echo $Rich_Web_Forms_O[$i]->id;?>)"><i class='Rich_Web_Forms_Del rich_web rich_web-trash'></i></td>
				</tr>
			<?php } ?>
			</table>
		</div>		
		<div class='Rich_Web_Forms_Content_Data2_Option'>
			<table class="Rich_Web_Forms_Content_Table_Option3">
				<tr>
					<td>Options Title</td>
					<td>
						<input type="text" name="Rich_Web_Forms_O_1" id="Rich_Web_Forms_O_1" required placeholder="Required *">
					</td>
				</tr>
			</table>
			<table class="Rich_Web_Forms_Content_Table_Option3">
				<tr>
					<td colspan="2">Your Form Settings</td>
				</tr>
				<tr>
					<td>Send Emails From Name</td>
					<td>Send Emails From Email  <i class="Rich_web_Subject_Icon rich_web rich_web-question-circle-o" title="Make sure the email is from the same domain as your website to avoid being marked as spam."></i></td>
				</tr>
				<tr>
					<td>
						<input type="text" name="Rich_Web_Forms_O_2" id="Rich_Web_Forms_O_2">
					</td>
					<td>
						<input type="email" name="Rich_Web_Forms_O_3" id="Rich_Web_Forms_O_3">
					</td>
				</tr>
				<tr>
					<td>Captcha Public Key <a href="https://www.google.com/recaptcha/admin" target="_blank">Get Key</a></td>
					<td>Captcha Private Key <a href="https://www.google.com/recaptcha/intro/index.html" target="_blank">About Captcha</a></td>
				</tr>
				<tr>
					<td>
						<input type="text" name="Rich_Web_Forms_O_4" id="Rich_Web_Forms_O_4">
					</td>
					<td>
						<input type="text" name="Rich_Web_Forms_O_5" id="Rich_Web_Forms_O_5">
					</td>
				</tr>
				<tr>
					<td>Save Submissions To Database</td>
					<td>API Key for Map <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">Get Key</a></td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="Rich_Web_Forms_O_6" id="Rich_Web_Forms_O_6"/>
							<span class="switch-label" data-on="Yes" data-off="No"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<input type="text" name="Rich_Web_Forms_O_8" id="Rich_Web_Forms_O_8">
					</td>
				</tr>
			</table>
			<table class="Rich_Web_Forms_Content_Table_Option3">
				<tr>
					<td colspan="2">Form Messages</td>
				</tr>
				<tr>
					<td>Sender's message was sent successfully</td>
					<td>
						<input type="text" name="Rich_Web_Forms_O_7" id="Rich_Web_Forms_O_7">
					</td>
				</tr>
				<tr>
					<td>Submission was referred to as spam</td>
					<td>
						<input type="text" name="Rich_Web_Forms_O_9" id="Rich_Web_Forms_O_9">
					</td>
				</tr>
				<tr>
					<td>Captcha is Not Validated</td>
					<td>
						<input type="text" name="Rich_Web_Forms_O_10" id="Rich_Web_Forms_O_10">
					</td>
				</tr>
				<tr>
					<td>Required Field Is Empty</td>
					<td>
						<input type="text" name="Rich_Web_Forms_O_11" id="Rich_Web_Forms_O_11">
					</td>
				</tr>
				<tr>
					<td>Email address that the sender entered is invalid</td>
					<td>
						<input type="text" name="Rich_Web_Forms_O_12" id="Rich_Web_Forms_O_12">
					</td>
				</tr>				
			</table>
			<table class="Rich_Web_Forms_Content_Table_Option4">
				<tr>
					<td colspan="2">Email To Administrator</td>
					<td colspan="2">Email To User</td>
				</tr>
				<tr>
					<td>Send Email For Each Submission</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="Rich_Web_Forms_O_16" id="Rich_Web_Forms_O_16"/>
							<span class="switch-label" data-on="Yes" data-off="No"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>Send Email To User</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="Rich_Web_Forms_O_17" id="Rich_Web_Forms_O_17"/>
							<span class="switch-label" data-on="Yes" data-off="No"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
				</tr>
				<tr>
					<td>Administrator Email</td>
					<td>
						<input type="email" name="Rich_Web_Forms_O_18" id="Rich_Web_Forms_O_18">
					</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>Message Subject <i class="Rich_web_Subject_Icon rich_web rich_web-question-circle-o" title="If you leave this field empty, the name of the form will be used as the subject of the email."></i></td>
					<td>
						<input type="text" name="Rich_Web_Forms_O_19" id="Rich_Web_Forms_O_19">
					</td>
					<td>Message Subject <i class="Rich_web_Subject_Icon rich_web rich_web-question-circle-o" title="If you leave this field empty, the name of the form will be used as the subject of the email."></i></td>
					<td>
						<input type="text" name="Rich_Web_Forms_O_20" id="Rich_Web_Forms_O_20">
					</td>
				</tr>
				<tr>
					<td colspan="2">Message</td>
					<td colspan="2">Message</td>
				</tr>
				<tr>
					<td colspan="2">
						<textarea name="Rich_Web_Forms_O_21">
					  
						</textarea>
					</td>
					<td colspan="2">
						<textarea name="Rich_Web_Forms_O_22">
					  
						</textarea>
					</td>
				</tr>
			</table>
		</div>
	</div>
</form>