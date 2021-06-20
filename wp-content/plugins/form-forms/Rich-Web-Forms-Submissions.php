<?php
	if(!defined('ABSPATH')) exit;
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	global $wpdb;
	$table_name2 = $wpdb->prefix . "rich_web_forms_manager";
	$table_name3 = $wpdb->prefix . "rich_web_forms_fields";
	$table_name6 = $wpdb->prefix . "rich_web_forms_options";
	$table_name7 = $wpdb->prefix . "rich_web_forms_saved";	
	$table_name8 = $wpdb->prefix . "rich_web_forms_mails";
	$table_name9 = $wpdb->prefix . "rich_web_forms_info";


	$Rich_Web_Forms=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id>%d", 0));

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(check_admin_referer( 'edit-menu_'.$comment_id, 'Rich_Web_Forms_Nonce' ))
		{
			$Rich_Web_Forms_Submission_CHForms=sanitize_text_field($_POST['Rich_Web_Forms_Submission_CHForms']);
			$Rich_Web_Forms_Submission_CHFolder=sanitize_text_field($_POST['Rich_Web_Forms_Submission_CHFolder']);
		
			$Rich_Web_Forms_Option=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id=%d", $Rich_Web_Forms_Submission_CHForms));
			$Rich_Web_Forms_Options=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE Rich_Web_Forms_O_1=%s", $Rich_Web_Forms_Option[0]->Forms_option));		

			if($Rich_Web_Forms_Submission_CHFolder=='all')
			{
				$Rich_Web_Forms_Info=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE Forms_ID=%d AND SpamText=%s", $Rich_Web_Forms_Submission_CHForms, 'no spam'));
			}
			else if($Rich_Web_Forms_Submission_CHFolder=='spam')
			{
				$Rich_Web_Forms_Info=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE Forms_ID=%d AND SpamText=%s", $Rich_Web_Forms_Submission_CHForms, 'spam'));
			}
			else
			{
				$Rich_Web_Forms_Info=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE Forms_ID=%d AND SpamText=%s AND ReadNoRead=%s", $Rich_Web_Forms_Submission_CHForms, 'no spam', $Rich_Web_Forms_Submission_CHFolder));
			}
		}
		else
	    {
	        wp_die('Security check fail'); 
	    }
	}
?>
<form method="POST" enctype="multipart/form-data">
	<?php require_once( 'Rich-Web-Forms-Header.php' ); ?>
	<?php wp_nonce_field( 'edit-menu_'.$comment_id, 'Rich_Web_Forms_Nonce' );?>
	<div class="Rich_Web_Forms_Fixed_Div"></div>
	<div class="Rich_Web_Forms_Absolute_Div">
		<div class="Rich_Web_Forms_Relative_Div">
			<p> Are you sure you want to remove ? </p>				 
			<span class="Rich_Web_Forms_Relative_No">No</span>
			<span class="Rich_Web_Forms_Relative_Yes">Yes</span>
		</div>			
	</div>
	<div class='Rich_Web_Forms_Content_Submission'>		
		<div class='Rich_Web_Forms_Content_Data2_Submission'>	
			<input type="text" style="display: none;" id="Rich_Web_Forms_Spam" value="<?php echo $Rich_Web_Forms_Options[0]->Rich_Web_Forms_O_9;?>">
			<table class="Rich_Web_Forms_Content_Table_Submission4">
				<tr>
					<td>Select Form</td>
					<td>
						<select id="Rich_Web_Forms_Submission_CHForms" name="Rich_Web_Forms_Submission_CHForms" onchange="this.form.submit()">
							<option disabled selected> Form Names </option>
							<?php for($i=0; $i<count($Rich_Web_Forms); $i++){ ?>
								<option value="<?php echo $Rich_Web_Forms[$i]->id;?>" <?php if($Rich_Web_Forms_Submission_CHForms==$Rich_Web_Forms[$i]->id){ echo 'selected';}?>><?php echo $Rich_Web_Forms[$i]->Forms_name;?></option>
							<?php }?>
						</select>
					</td>
					<td>Select Folder</td>
					<td>
						<select id="Rich_Web_Forms_Submission_CHFolder" name="Rich_Web_Forms_Submission_CHFolder" onchange="this.form.submit()">
							<option value="all"    <?php if($Rich_Web_Forms_Submission_CHFolder=='all'){ echo 'selected';}?>>    All    </option>
							<option value="read"   <?php if($Rich_Web_Forms_Submission_CHFolder=='read'){ echo 'selected';}?>>   Read   </option>
							<option value="unread" <?php if($Rich_Web_Forms_Submission_CHFolder=='unread'){ echo 'selected';}?>> Unread </option>
							<option value="spam"   <?php if($Rich_Web_Forms_Submission_CHFolder=='spam'){ echo 'selected';}?>>   Spam   </option>
						</select>
					</td>
				</tr>
			</table>
			<table class="Rich_Web_Forms_Content_Table_Submission5">
				<tr>
					<td>Date</td>
					<td>IP</td>
					<td>Flag</td>
					<td>Country</td>
					<td>Region</td>
					<td>City</td>
					<td>Message</td>
					<td>Spam</td>
					<td>Delete</td>
				</tr>
				<?php for($i=0;$i<count($Rich_Web_Forms_Info);$i++){ ?> 
					<?php if($Rich_Web_Forms_Info[$i]->ReadNoRead == 'read'){ ?>
						<tr style="font-weight: normal;" class="Rich_Web_Forms_Submission_Tr_<?php echo $Rich_Web_Forms_Info[$i]->id;?>">
							<td><?php echo $Rich_Web_Forms_Info[$i]->Data;?></td>
							<td><?php echo $Rich_Web_Forms_Info[$i]->IPaddress;?></td>
							<td><img src="<?php echo plugins_url('/Images/Flags/' . $Rich_Web_Forms_Info[$i]->CountryCode . '.png',__FILE__);?>"></td>
							<td><?php echo $Rich_Web_Forms_Info[$i]->CountryName . ' (' . $Rich_Web_Forms_Info[$i]->CountryCode . ')';?></td>
							<td><?php echo $Rich_Web_Forms_Info[$i]->Region;?></td>
							<td><?php echo $Rich_Web_Forms_Info[$i]->City;?></td>
							<td onclick="Rich_Web_Forms_Submission_Message('<?php echo $Rich_Web_Forms_Info[$i]->id;?>')"><i class="rich_web rich_web-commenting-o" aria-hidden="true"></i></td>
							<td onclick="Rich_Web_Forms_Submission_Spam('<?php echo $Rich_Web_Forms_Info[$i]->id;?>')" style="color: <?php if($Rich_Web_Forms_Info[$i]->SpamText=='spam'){echo '#ff0000';}else{echo '#2aa800';}?>"><i class="rich_web rich_web-exclamation-circle" aria-hidden="true"></i></td>
							<td onclick="Rich_Web_Forms_Submission_Delete('<?php echo $Rich_Web_Forms_Info[$i]->id;?>')" style="color: #006fd8;"><i class="rich_web rich_web-trash" aria-hidden="true"></i></td>
						</tr>
					<?php }else{ ?>
						<tr style="font-weight: 700;" class="Rich_Web_Forms_Submission_Tr_<?php echo $Rich_Web_Forms_Info[$i]->id;?>">
							<td><?php echo $Rich_Web_Forms_Info[$i]->Data;?></td>
							<td><?php echo $Rich_Web_Forms_Info[$i]->IPaddress;?></td>
							<td><img src="<?php echo plugins_url('/Images/Flags/' . $Rich_Web_Forms_Info[$i]->CountryCode . '.png',__FILE__);?>"></td>
							<td><?php echo $Rich_Web_Forms_Info[$i]->CountryName . ' (' . $Rich_Web_Forms_Info[$i]->CountryCode . ')';?></td>
							<td><?php echo $Rich_Web_Forms_Info[$i]->Region;?></td>
							<td><?php echo $Rich_Web_Forms_Info[$i]->City;?></td>
							<td onclick="Rich_Web_Forms_Submission_Message('<?php echo $Rich_Web_Forms_Info[$i]->id;?>')"><i class="rich_web rich_web-commenting-o" aria-hidden="true"></i></td>
							<td onclick="Rich_Web_Forms_Submission_Spam('<?php echo $Rich_Web_Forms_Info[$i]->id;?>')" style="color: <?php if($Rich_Web_Forms_Info[$i]->SpamText=='spam'){echo '#ff0000';}else{echo '#2aa800';}?>"><i class="rich_web rich_web-exclamation-circle" aria-hidden="true"></i></td>
							<td onclick="Rich_Web_Forms_Submission_Delete('<?php echo $Rich_Web_Forms_Info[$i]->id;?>')" style="color: #006fd8;"><i class="rich_web rich_web-trash" aria-hidden="true"></i></td>
						</tr>
					<?php }?>
				<?php }?>						
			</table>
		</div>
		<div class="Rich_Web_Forms_Submission_Div_Main" onclick="Rich_Web_Forms_Submission_Div_Main_Cl()"></div>
		<div class="Rich_Web_Forms_Submission_Div"></div>
	</div>
</form>