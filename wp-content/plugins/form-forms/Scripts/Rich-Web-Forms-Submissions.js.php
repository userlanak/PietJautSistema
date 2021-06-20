<?php
	if(!defined('ABSPATH')) exit;
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<script type="text/javascript">
	function Rich_Web_Forms_Submission_Message(Submission_ID)
	{
		var Rich_Web_Forms_Submission_Tr=jQuery('.Rich_Web_Forms_Submission_Tr_'+Submission_ID).css('font-weight');
		if(Rich_Web_Forms_Submission_Tr == '700' || Rich_Web_Forms_Submission_Tr == 'bold')
		{
			var ajaxurl = object.ajaxurl;
			var data = {
			action: 'Rich_Web_Forms_Submission_RNR', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
			foobar: Submission_ID, // translates into $_POST['foobar'] in PHP
			};
			jQuery.post(ajaxurl, data, function(response) {
				jQuery('.Rich_Web_Forms_Submission_Tr_'+Submission_ID).css('font-weight','normal');
			})
		}
		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'Rich_Web_Forms_Submission_Mess', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Submission_ID, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			var arrInst=response.split('stdClass Object');
			var rich_web_message_table='<table>';
			for(i=1;i<arrInst.length;i++){
				var CSPL=arrInst[i].split('=>');
				rich_web_message_table += '<tr><td>'+CSPL[4].split('[')[0].trim()+'</td><td>'+CSPL[5].split(')')[0].trim()+'</td></tr>';
			}
			rich_web_message_table+='</table>';
			jQuery('.Rich_Web_Forms_Submission_Div').html(rich_web_message_table);
			jQuery('.Rich_Web_Forms_Submission_Div_Main').fadeIn();
			jQuery('.Rich_Web_Forms_Submission_Div').fadeIn();
		})
	}
	function Rich_Web_Forms_Submission_Spam(Submission_ID)
	{
		var Rich_Web_Forms_Submission_Tr=jQuery('.Rich_Web_Forms_Submission_Tr_'+Submission_ID+' td:nth-child(8)').css('color');
		if(Rich_Web_Forms_Submission_Tr=='rgb(255, 0, 0)' || Rich_Web_Forms_Submission_Tr=='#ff0000')
		{

			jQuery('.Rich_Web_Forms_Submission_Tr_'+Submission_ID+' td:nth-child(8)').css('color','#2aa800');
		}
		else
		{
			jQuery('.Rich_Web_Forms_Submission_Tr_'+Submission_ID+' td:nth-child(8)').css('color','#ff0000');
			alert(jQuery('#Rich_Web_Forms_Spam').val());
		}
		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'Rich_Web_Forms_Submission_SNS', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Submission_ID, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) { })
	}
	function Rich_Web_Forms_Submission_Delete(Submission_ID)
	{
		var RWFRFS = Submission_ID;
		jQuery('.Rich_Web_Forms_Fixed_Div').fadeIn();	
		jQuery('.Rich_Web_Forms_Absolute_Div').fadeIn();

		jQuery('.Rich_Web_Forms_Relative_No').click(function(){
			jQuery('.Rich_Web_Forms_Fixed_Div').fadeOut();	
			jQuery('.Rich_Web_Forms_Absolute_Div').fadeOut();
			RWFRFS = null;
		})
		jQuery('.Rich_Web_Forms_Relative_Yes').click(function(){
			if(RWFRFS != null)
			{
				jQuery('.Rich_Web_Forms_Fixed_Div').fadeOut();	
				jQuery('.Rich_Web_Forms_Absolute_Div').fadeOut();
				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'Rich_Web_Forms_Submission_Del', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: Submission_ID, // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					jQuery('.Rich_Web_Forms_Submission_Tr_'+Submission_ID).hide();
				})
			}
			RWFRFS = null;			
		})
	}
	function Rich_Web_Forms_Submission_Div_Main_Cl()
	{
		jQuery('.Rich_Web_Forms_Submission_Div_Main').fadeOut();
		jQuery('.Rich_Web_Forms_Submission_Div').fadeOut();
		jQuery('.Rich_Web_Forms_Submission_Div').html('');
	}
</script>	