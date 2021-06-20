<?php
	if(!defined('ABSPATH')) exit;
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	global $wpdb;	
	$table_name2 = $wpdb->prefix . "rich_web_forms_manager";
	$table_name8 = $wpdb->prefix . "rich_web_forms_mails";
		
	$Rich_Web_Forms=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id>%d", 0));

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(check_admin_referer( 'edit-menu_'.$comment_id, 'Rich_Web_Forms_Nonce' ))
		{
			$Rich_Web_Forms_Message_CHForms=sanitize_text_field($_POST['Rich_Web_Forms_Message_CHForms']);
			if($Rich_Web_Forms_Message_CHForms=='All')
			{
				$Rich_Web_FormsEmails=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE id>%d", 0));
				$Rich_Web_Forms_Message_CHForms='All';
			}
			else
			{
				$Rich_Web_FormsEmails=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE Forms_ID=%d", $Rich_Web_Forms_Message_CHForms));
			}

			if(isset($_POST['Rich_Web_Forms_Send_Message']))
			{
				$Rich_Web_Forms_Message_Hid_Email=sanitize_text_field($_POST['Rich_Web_Forms_Message_Hid_Email']);
				$Rich_Web_Forms_Message_Hid_EmailSpl = explode(",", $Rich_Web_Forms_Message_Hid_Email);
				
				$multiple_recipients = array();
				for ($i=0; $i < count($Rich_Web_Forms_Message_Hid_EmailSpl); $i++)
				{ 
					array_push($multiple_recipients, $Rich_Web_Forms_Message_Hid_EmailSpl[$i]);
				}

				$Rich_Web_Forms_Message_Name=sanitize_text_field($_POST['Rich_Web_Forms_Message_Name']);
				$Rich_Web_Forms_Message_Email=sanitize_email($_POST['Rich_Web_Forms_Message_Email']);
				$Rich_Web_Forms_Message_Subject=sanitize_text_field($_POST['Rich_Web_Forms_Message_Subject']);
				if(empty($Rich_Web_Forms_Message_Subject))
				{
					$Rich_Web_Forms_Message_Subject=sanitize_text_field($_POST['Rich_Web_Forms_Message_CHForms']);
				}
				$Rich_Web_Forms_Message_Message=sanitize_text_field($_POST['Rich_Web_Forms_Message_Message']);

				function wpdocs_set_html_mail_content_type3() {
		    		return 'text/html';
				}									
				add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type3' );

				$headers = array('From: ' . $Rich_Web_Forms_Message_Name . ' <' . $Rich_Web_Forms_Message_Email . '>');
				wp_mail($multiple_recipients, $Rich_Web_Forms_Message_Subject, $Rich_Web_Forms_Message_Message, $headers);

				remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type3' );
			}
		}
		else
	    {
	        wp_die('Security check fail'); 
	    }
	}
?>
<form method="POST" enctype="multipart/form-data">
	<script src='<?php echo plugins_url('/Scripts/tinymce.min.js',__FILE__)?>'></script>
	<script src='<?php echo plugins_url('/Scripts/jquery.tinymce.min.js',__FILE__)?>'></script>
	<?php wp_nonce_field( 'edit-menu_'.$comment_id, 'Rich_Web_Forms_Nonce' );?>
	<?php require_once( 'Rich-Web-Forms-Header.php' ); ?>
	<div style="position: relative; width: 100%; right: 1%; height: 50px;">
		<input type='submit' class='Rich_Web_Forms_Send_Message' value='Send' name='Rich_Web_Forms_Send_Message'/>
	</div>
	<div class='Rich_Web_Forms_Content_Message'>		
		<div class='Rich_Web_Forms_Content_Data2_Message'>		
			<table class="Rich_Web_Forms_Content_Table_Message4">
				<tr>
					<td>Choose The Form</td>
					<td>
						<select id="Rich_Web_Forms_Message_CHForms" name="Rich_Web_Forms_Message_CHForms" onchange="this.form.submit()">
							<option disabled selected> Select Form </option>
							<option value="All" <?php if($Rich_Web_Forms_Message_CHForms=='All'){ echo 'selected';}?>>All Forms</option>
							<?php for($i=0; $i<count($Rich_Web_Forms); $i++){ ?>
								<option value="<?php echo $Rich_Web_Forms[$i]->id;?>" <?php if($Rich_Web_Forms_Message_CHForms==$Rich_Web_Forms[$i]->id){ echo 'selected';}?>><?php echo $Rich_Web_Forms[$i]->Forms_name;?></option>
							<?php }?>
						</select>
						<input type="text" style="display: none;" name="Rich_Web_Forms_Message_Hid_Email" id="Rich_Web_Forms_Message_Hid_Email" value="<?php for($i=0; $i<count($Rich_Web_FormsEmails); $i++){ echo $Rich_Web_FormsEmails[$i]->Email . ','; }?>">
					</td>
				</tr>
				<tr>
					<td>Send From Name</td>
					<td>
						<input type="text" name="Rich_Web_Forms_Message_Name" id="Rich_Web_Forms_Message_Name" placeholder="Enter name . . .">
					</td>
				</tr>
				<tr>
					<td>Send From Email</td>
					<td>
						<input type="email" name="Rich_Web_Forms_Message_Email" id="Rich_Web_Forms_Message_Email" placeholder="Enter email . . .">
					</td>
				</tr>
				<tr>
					<td>Message Subject</td>
					<td>
						<input type="text" name="Rich_Web_Forms_Message_Subject" id="Rich_Web_Forms_Message_Subject" placeholder="Enter subject . . .">
					</td>
				</tr>
				<tr>
					<td colspan="2">Message</td>
				</tr>
				<tr>
					<td colspan="2">
						<textarea name="Rich_Web_Forms_Message_Message">
					  
						</textarea>
					</td>
				</tr>
			</table>
			<table class="Rich_Web_Forms_Content_Table_Message5" style="">
				<tr>
					<td>Emails</td>
				</tr>
				<tr>
					<td>
						<input type="email" name="Rich_Web_Forms_Message_Add_Email" id="Rich_Web_Forms_Message_Add_Email" placeholder="Type Email Here . . ."> <img class="Rich_Web_Forms_Message_Add" src="<?php echo plugins_url('/Images/Add.png',__FILE__);?>" style="margin-top: 4px;">
						<input type="text"  style="display: none" id="Rich_Web_Forms_Message_Hid_Src" value="<?php echo plugins_url('/Images/Delete.png',__FILE__);?>">
					</td>
				</tr>
				<?php for($i=0; $i<count($Rich_Web_FormsEmails); $i++){ ?>
					<tr>
						<td><span><?php echo $Rich_Web_FormsEmails[$i]->Email;?></span> <img class="Rich_Web_Forms_Message_Image" src="<?php echo plugins_url('/Images/Delete.png',__FILE__);?>"></td>
					</tr>
				<?php }?>
			</table>
		</div>
	</div>
</form>