<?php
	if(!defined('ABSPATH')) exit;
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<script type="text/javascript">
	function Rich_Web_Forms_Added_Theme()
	{
		jQuery('.Rich_Web_Forms_Content_Data1_Theme').css('display','none');
		jQuery('.Rich_Web_Forms_Add_Theme').addClass('Rich_Web_Forms_Add_ThemeAnim');
		jQuery('.Rich_Web_Forms_Content_Data2_Theme').css('display','block');
		jQuery('.Rich_Web_Forms_Save_Theme').addClass('Rich_Web_Forms_Save_ThemeAnim');
		jQuery('.Rich_Web_Forms_Cancel_Theme').addClass('Rich_Web_Forms_Cancel_ThemeAnim');

		jQuery( 'input.alpha-color-picker' ).alphaColorPicker();
		jQuery('.wp-color-result').attr('title','Select');
		jQuery('.wp-color-result').attr('data-current','Selected');
		Rich_Web_Forms_RangeSlider();
	}
	function Rich_Web_Forms_Canceled_Theme()
	{
		location.reload();
	}
	function Rich_Web_Forms_Edit_Theme(Rich_Web_Forms_T_ID)
	{
		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'Rich_Web_Forms_Edit_Theme1', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Rich_Web_Forms_T_ID, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			var arr=Array();
			var spl=response.split('=>');
			for(var i=3;i<spl.length;i++){ arr[arr.length]=spl[i].split('[')[0].trim(); }
			arr[arr.length-1]=arr[arr.length-1].split(')')[0].trim();

			if(arr[52].length!=7)
			{
				arr[52]=arr[52]+')';
			}
			if(arr[8]=='on'){ arr[8]=true ;}else{ arr[8]=false ;}
			// if(arr[9]=='on'){ arr[9]=true ;}else{ arr[9]=false ;}
			if(arr[18]=='on'){ arr[18]=true ;}else{ arr[18]=false ;}
			if(arr[25]=='on'){ arr[25]=true ;}else{ arr[25]=false ;}
			if(arr[32]=='on'){ arr[32]=true ;}else{ arr[32]=false ;}
			// jQuery('#Rich_Web_Forms_T_CBCBC').val(arr[46]); 
			// jQuery('#Rich_Web_Forms_T_CBCC').val(arr[47]); 
			// jQuery('#Rich_Web_Forms_T_BoxSh').val(arr[10]);
			jQuery('#Rich_Web_Forms_T_T').val(arr[0]); jQuery('#Rich_Web_Forms_T_BgT').val(arr[1]); jQuery('#Rich_Web_Forms_T_BgC').val(arr[2]); jQuery('#Rich_Web_Forms_T_BgC2').val(arr[3]); jQuery('#Rich_Web_Forms_T_BW').val(arr[4]); jQuery('#Rich_Web_Forms_T_BS').val(arr[5]); jQuery('#Rich_Web_Forms_T_BC').val(arr[6]); jQuery('#Rich_Web_Forms_T_BR').val(arr[7]); jQuery('#Rich_Web_Forms_T_BoxShShow').attr('checked',arr[8]); jQuery('#Rich_Web_Forms_T_BoxShType').val(arr[9]); jQuery('#Rich_Web_Forms_T_BoxShC').val(arr[11]); jQuery('#Rich_Web_Forms_T_LFS').val(arr[12]); jQuery('#Rich_Web_Forms_T_LFF').val(arr[13]); jQuery('#Rich_Web_Forms_T_LC').val(arr[14]); jQuery('#Rich_Web_Forms_T_LRC').val(arr[15]); jQuery('#Rich_Web_Forms_T_LEC').val(arr[16]); jQuery('#Rich_Web_Forms_T_LBgC').val(arr[17]); jQuery('#Rich_Web_Forms_T_TBHBg').attr('checked',arr[18]); jQuery('#Rich_Web_Forms_T_TBBgC').val(arr[19]); jQuery('#Rich_Web_Forms_T_TBBW').val(arr[20]); jQuery('#Rich_Web_Forms_T_TBBC').val(arr[21]); jQuery('#Rich_Web_Forms_T_TBBR').val(arr[22]); jQuery('#Rich_Web_Forms_T_TBFS').val(arr[23]); jQuery('#Rich_Web_Forms_T_TBC').val(arr[24]); jQuery('#Rich_Web_Forms_T_TAHBg').attr('checked',arr[25]); jQuery('#Rich_Web_Forms_T_TABgC').val(arr[26]); jQuery('#Rich_Web_Forms_T_TABW').val(arr[27]); jQuery('#Rich_Web_Forms_T_TABC').val(arr[28]); jQuery('#Rich_Web_Forms_T_TABR').val(arr[29]); jQuery('#Rich_Web_Forms_T_TAFS').val(arr[30]); jQuery('#Rich_Web_Forms_T_TAC').val(arr[31]); jQuery('#Rich_Web_Forms_T_SMHBg').attr('checked',arr[32]); jQuery('#Rich_Web_Forms_T_SMBgC').val(arr[33]); jQuery('#Rich_Web_Forms_T_SMBW').val(arr[34]); jQuery('#Rich_Web_Forms_T_SMBC').val(arr[35]); jQuery('#Rich_Web_Forms_T_SMBR').val(arr[36]); jQuery('#Rich_Web_Forms_T_SMFS').val(arr[37]); jQuery('#Rich_Web_Forms_T_SMC').val(arr[38]); jQuery('#Rich_Web_Forms_T_CBS').val(arr[39]); jQuery('#Rich_Web_Forms_T_CBT').val(arr[40]); jQuery('#Rich_Web_Forms_T_CBBgC').val(arr[41]); jQuery('#Rich_Web_Forms_T_CBBC').val(arr[42]); jQuery('#Rich_Web_Forms_T_CBHBgC').val(arr[43]); jQuery('#Rich_Web_Forms_T_CBHBC').val(arr[44]); jQuery('#Rich_Web_Forms_T_CBCBgC').val(arr[45]); jQuery('#Rich_Web_Forms_T_RBS').val(arr[48]); jQuery('#Rich_Web_Forms_T_RBT').val(arr[49]); jQuery('#Rich_Web_Forms_T_RBBgC').val(arr[50]); jQuery('#Rich_Web_Forms_T_LBR').val(arr[51]); jQuery('#Rich_Web_Forms_T_LBC').val(arr[52]);
			jQuery('.Rich_Web_Contact_Form_Col1').alphaColorPicker();
			jQuery('.wp-color-result').attr('title','Select');
			jQuery('.wp-color-result').attr('data-current','Selected');
			Rich_Web_Forms_RangeSlider();
		})

		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'Rich_Web_Forms_Edit_Theme2', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Rich_Web_Forms_T_ID, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			var arr=Array();
			var spl=response.split('=>');
			for(var i=3;i<spl.length;i++){ arr[arr.length]=spl[i].split('[')[0].trim(); }
			arr[arr.length-1]=arr[arr.length-1].split(')')[0].trim();
			if(arr[49].length!=7){ arr[49]=arr[49]+')'; }
			if(arr[18]=='on'){ arr[18]=true ;}else{ arr[18]=false ;}

			// jQuery('#Rich_Web_Forms_T_RBCBC').val(arr[4]); 
			// jQuery('#Rich_Web_Forms_T_RBCC').val(arr[5]);
			jQuery('#Rich_Web_Forms_T_RBBC').val(arr[0]); jQuery('#Rich_Web_Forms_T_RBHBgC').val(arr[1]); jQuery('#Rich_Web_Forms_T_RBHBC').val(arr[2]); jQuery('#Rich_Web_Forms_T_RBCBgC').val(arr[3]); jQuery('#Rich_Web_Forms_T_FUBgC').val(arr[6]); jQuery('#Rich_Web_Forms_T_FUBW').val(arr[7]); jQuery('#Rich_Web_Forms_T_FUBC').val(arr[8]); jQuery('#Rich_Web_Forms_T_FUBR').val(arr[9]); jQuery('#Rich_Web_Forms_T_FUTC').val(arr[10]); jQuery('#Rich_Web_Forms_T_FUFS').val(arr[11]); jQuery('#Rich_Web_Forms_T_FUIT').val(arr[12]); jQuery('#Rich_Web_Forms_T_FUIA').val(arr[13]); jQuery('#Rich_Web_Forms_T_FUIFS').val(arr[14]); jQuery('#Rich_Web_Forms_T_FUBA').val(arr[15]); jQuery('#Rich_Web_Forms_T_FUHBgC').val(arr[16]); jQuery('#Rich_Web_Forms_T_FUHTC').val(arr[17]); jQuery('#Rich_Web_Forms_T_EBHBg').attr('checked',arr[18]); jQuery('#Rich_Web_Forms_T_EBBgC').val(arr[19]); jQuery('#Rich_Web_Forms_T_EBBW').val(arr[20]); jQuery('#Rich_Web_Forms_T_EBBC').val(arr[21]); jQuery('#Rich_Web_Forms_T_EBBR').val(arr[22]); jQuery('#Rich_Web_Forms_T_EBFS').val(arr[23]); jQuery('#Rich_Web_Forms_T_EBC').val(arr[24]); jQuery('#Rich_Web_Forms_T_SBBgC').val(arr[25]); jQuery('#Rich_Web_Forms_T_SBBW').val(arr[26]); jQuery('#Rich_Web_Forms_T_SBBC').val(arr[27]); jQuery('#Rich_Web_Forms_T_SBBR').val(arr[28]); jQuery('#Rich_Web_Forms_T_SBBA').val(arr[29]); jQuery('#Rich_Web_Forms_T_SBFS').val(arr[30]); jQuery('#Rich_Web_Forms_T_SBC').val(arr[31]); jQuery('#Rich_Web_Forms_T_SBIT').val(arr[32]); jQuery('#Rich_Web_Forms_T_SBIA').val(arr[33]); jQuery('#Rich_Web_Forms_T_SBIFS').val(arr[34]); jQuery('#Rich_Web_Forms_T_SBHBgC').val(arr[35]); jQuery('#Rich_Web_Forms_T_SBHC').val(arr[36]); jQuery('#Rich_Web_Forms_T_ReBBgC').val(arr[37]); jQuery('#Rich_Web_Forms_T_ReBBW').val(arr[38]); jQuery('#Rich_Web_Forms_T_ReBBC').val(arr[39]); jQuery('#Rich_Web_Forms_T_ReBBR').val(arr[40]); jQuery('#Rich_Web_Forms_T_ReBBA').val(arr[41]); jQuery('#Rich_Web_Forms_T_ReBFS').val(arr[42]); jQuery('#Rich_Web_Forms_T_ReBC').val(arr[43]); jQuery('#Rich_Web_Forms_T_ReBIT').val(arr[44]); jQuery('#Rich_Web_Forms_T_ReBIA').val(arr[45]); jQuery('#Rich_Web_Forms_T_ReBIFS').val(arr[46]); jQuery('#Rich_Web_Forms_T_ReBHBgC').val(arr[47]); jQuery('#Rich_Web_Forms_T_ReBHC').val(arr[48]); jQuery('#Rich_Web_Forms_T_DC').val(arr[49]); jQuery('#Rich_Web_Forms_T_W').val(arr[50]); jQuery('#Rich_Web_Forms_T_Pos').val(arr[51]);
			jQuery('.Rich_Web_Contact_Form_Col2').alphaColorPicker();
			jQuery('.wp-color-result').attr('title','Select');
			jQuery('.wp-color-result').attr('data-current','Selected');		
			Rich_Web_Forms_RangeSlider();
		})

		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'Rich_Web_Forms_Edit_Theme3', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Rich_Web_Forms_T_ID, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			var arr=Array();
			var spl=response.split('=>');
			for(var i=3;i<spl.length;i++){ arr[arr.length]=spl[i].split('[')[0].trim(); }
			arr[arr.length-1]=arr[arr.length-1].split(')')[0].trim();

			jQuery('#Rich_Web_Forms_T_DF').val(arr[1]);
			jQuery('#Rich_Web_Forms_T_MapW').val(arr[2]);
			jQuery('#Rich_Web_Forms_T_MapH').val(arr[3]);
			Rich_Web_Forms_RangeSlider();
		})
		jQuery('#Rich_Web_Forms_Upd_Theme_ID').val(Rich_Web_Forms_T_ID);
		jQuery('.Rich_Web_Forms_Content_Data1_Theme').css('display','none');
		jQuery('.Rich_Web_Forms_Add_Theme').addClass('Rich_Web_Forms_Add_ThemeAnim');
		jQuery('.Rich_Web_Forms_Content_Data2_Theme').css('display','block');
		jQuery('.Rich_Web_Forms_Update_Theme').addClass('Rich_Web_Forms_Save_ThemeAnim');
		jQuery('.Rich_Web_Forms_Cancel_Theme').addClass('Rich_Web_Forms_Cancel_ThemeAnim');		
	}
	function Rich_Web_Forms_Delete_Theme(Rich_Web_Forms_T_ID)
	{
		var RWFRFT = Rich_Web_Forms_T_ID;
		jQuery('.Rich_Web_Forms_Fixed_Div').fadeIn();	
		jQuery('.Rich_Web_Forms_Absolute_Div').fadeIn();

		jQuery('.Rich_Web_Forms_Relative_No').click(function(){
			jQuery('.Rich_Web_Forms_Fixed_Div').fadeOut();	
			jQuery('.Rich_Web_Forms_Absolute_Div').fadeOut();
			RWFRFT = null;
		})
		jQuery('.Rich_Web_Forms_Relative_Yes').click(function(){
			if(RWFRFT != null)
			{
				jQuery('.Rich_Web_Forms_Fixed_Div').fadeOut();	
				jQuery('.Rich_Web_Forms_Absolute_Div').fadeOut();
				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'Rich_Web_Forms_Del_Theme', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: Rich_Web_Forms_T_ID, // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					location.reload();
				})
			}
			RWFRFT = null;			
		})
	}
	function Rich_Web_Forms_Copy_Theme(Rich_Web_Forms_T_ID)
	{
		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'Rich_Web_Forms_Copy_Theme', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Rich_Web_Forms_T_ID, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			location.reload();
		})
	}
	function Rich_Web_Forms_RangeSlider()
	{  
		var slider = jQuery('.Rich_Web_Forms_Range'), range = jQuery('.Rich_Web_Forms_Range__range'), value = jQuery('.Rich_Web_Forms_Range__value');     
		slider.each(function()
		{   
			value.each(function()
			{   
				var value = jQuery(this).prev().attr('value');
			    jQuery(this).html(value);
			});    
			range.on('input', function()
			{      
				jQuery(this).next(value).html(this.value);
			});  
		});
	}	
</script>	