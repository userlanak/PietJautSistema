function Rich_Web_Forms_Added(Rich_Web_Forms_New_ID)
{
	jQuery('.Rich_Web_Forms_Content_Data1').css('display','none');
	jQuery('.Rich_Web_Forms_Add').addClass('Rich_Web_Forms_AddAnim');
	jQuery('.Rich_Web_Forms_Content_Data2').css('display','block');
	jQuery('.Rich_Web_Forms_Save').addClass('Rich_Web_Forms_SaveAnim');
	jQuery('.Rich_Web_Forms_Cancel').addClass('Rich_Web_Forms_CancelAnim');
	jQuery('.Rich_Web_Forms_ShortID').html('[Rich_Web_Forms id="'+Rich_Web_Forms_New_ID+'"]');
	jQuery('.Rich_Web_Forms_ShortID_1').html('&lt;?php echo do_shortcode(&apos;[Rich_Web_Forms id="'+Rich_Web_Forms_New_ID+'"]&apos;);?&gt;');
	Rich_Web_Forms_FC_EditChecks_Clicked();
	Rich_Web_Forms_FC_EditChecks_Del_Clicked();
	Rich_Web_Forms_FC_EditOption_Clicked();
	Rich_Web_Forms_FC_EditOption_Del_Clicked();
	Rich_Web_Forms_FC_EditRadios_Clicked();
	Rich_Web_Forms_FC_EditRadios_Del_Clicked();
	Rich_Web_Forms_FC_EditRadios_Check_Clicked();
}
function Rich_Web_Forms_Canceled()
{
	location.reload();
}
function Rich_Web_Forms_Copy(Rich_Web_Forms_ID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'Rich_Web_Forms_Copy', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Rich_Web_Forms_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		location.reload();
	})
}
function Rich_Web_Forms_Edit(Rich_Web_Forms_ID)
{
	jQuery('.Rich_Web_Forms_Content_Data1').css('display','none');
	jQuery('.Rich_Web_Forms_Add').addClass('Rich_Web_Forms_AddAnim');
	jQuery('.Rich_Web_Forms_Content_Data2').css('display','block');
	jQuery('.Rich_Web_Forms_Update').addClass('Rich_Web_Forms_SaveAnim');
	jQuery('.Rich_Web_Forms_Cancel').addClass('Rich_Web_Forms_CancelAnim');
	jQuery('#Rich_Web_Forms_New_ID').val(Rich_Web_Forms_ID);
	jQuery('.Rich_Web_Forms_ShortID').html('[Rich_Web_Forms id="'+Rich_Web_Forms_ID+'"]');
	jQuery('.Rich_Web_Forms_ShortID_1').html('&lt;?php echo do_shortcode(&apos;[Rich_Web_Forms id="'+Rich_Web_Forms_ID+'"]&apos;);?&gt;');

	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'Rich_Web_Forms_Edit1', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Rich_Web_Forms_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var arr=Array();
		var spl=response.split('=>');
		for(var i=3;i<spl.length;i++){
			arr[arr.length]=spl[i].split('[')[0].trim(); 
		}
		arr[arr.length-1]=arr[arr.length-1].split(')')[0].trim();
		jQuery('#Rich_Web_Forms_Name').val(arr[0]);
		jQuery('#Rich_Web_Forms_Theme').val(arr[1]);
		jQuery('#Rich_Web_Forms_New_Co').val(arr[2]);
		jQuery('#Rich_Web_Forms_Option').val(arr[3]);
	})

	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'Rich_Web_Forms_Edit2', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Rich_Web_Forms_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var Rich_Web_Forms_Fields=Array();
		var Rich_Web_Forms_Fields_W=Array();
		var Rich_Web_Forms_Fields_T=Array();
		var Rich_Web_Forms_Fields_O1=Array();
		var Rich_Web_Forms_Fields_O2=Array();
		var Rich_Web_Forms_Fields_O3=Array();
		var Rich_Web_Forms_Fields_O4=Array();
		var Rich_Web_Forms_Fields_O5=Array();
		var Rich_Web_Forms_Fields_O6=Array();
		var Rich_Web_Forms_Fields_O7=Array();
		var Rich_Web_Forms_Fields_O8=Array();

		var arrInst=response.split('stdClass Object');
		for(i=1;i<arrInst.length;i++){
			var CSPL=arrInst[i].split('=>');
			Rich_Web_Forms_Fields[Rich_Web_Forms_Fields.length]=CSPL[3].split('[')[0].trim();
			Rich_Web_Forms_Fields_W[Rich_Web_Forms_Fields_W.length]=CSPL[4].split('[')[0].trim();
			Rich_Web_Forms_Fields_T[Rich_Web_Forms_Fields_T.length]=CSPL[5].split('[')[0].trim();
			Rich_Web_Forms_Fields_O1[Rich_Web_Forms_Fields_O1.length]=CSPL[6].split('[')[0].trim();
			Rich_Web_Forms_Fields_O2[Rich_Web_Forms_Fields_O2.length]=CSPL[7].split('[')[0].trim();
			Rich_Web_Forms_Fields_O3[Rich_Web_Forms_Fields_O3.length]=CSPL[8].split('[')[0].trim();
			Rich_Web_Forms_Fields_O4[Rich_Web_Forms_Fields_O4.length]=CSPL[9].split('[')[0].trim();
			Rich_Web_Forms_Fields_O5[Rich_Web_Forms_Fields_O5.length]=CSPL[10].split('[')[0].trim();
			Rich_Web_Forms_Fields_O6[Rich_Web_Forms_Fields_O6.length]=CSPL[11].split('[')[0].trim();
			Rich_Web_Forms_Fields_O7[Rich_Web_Forms_Fields_O7.length]=CSPL[12].split('[')[0].trim();
			Rich_Web_Forms_Fields_O8[Rich_Web_Forms_Fields_O8.length]=CSPL[13].split('[')[0].split(')')[0].trim();
		}
		jQuery('.Rich_Web_Forms_Fields_Content').html('');
		for(i=0;i<Rich_Web_Forms_Fields.length;i++){
			if(Rich_Web_Forms_Fields_W[i]=='100%')
			{
				var Width='100%';
				var Width1='1/1';
			}
			else
			{
				var Width='50%';
				var Width1='1/2';
			}
			jQuery('.Rich_Web_Forms_Fields_Content').append('<div style="width:'+Width+';" class="Rich_Web_Forms_FC" id="Rich_Web_Forms_Field_'+parseInt(parseInt(i)+1)+'"><div class="Rich_Web_Forms_FC_No"><span>'+parseInt(parseInt(i)+1)+'</span></div><div class="Rich_Web_Forms_FC_C"><span class="Rich_Web_Forms_FC_C_Span" data-type="minus" onclick="Rich_Web_Forms_FC_C_Span_Clicked('+parseInt(parseInt(i)+1)+')">-</span><span class="Rich_Web_Forms_FC_C_Span" data-type="plus" onclick="Rich_Web_Forms_FC_C_Span_Clicked('+parseInt(parseInt(i)+1)+')">+</span></div><div class="Rich_Web_Forms_FC_Lab"><label>'+Width1+'</label><label>'+Rich_Web_Forms_Fields_T[i]+'</label><input type="text" style="display:none" class="Rich_Web_Forms_FF" id="Rich_Web_Forms_Field_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" name="Rich_Web_Forms_Field_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" value="'+Rich_Web_Forms_Fields[i]+'"><input type="text" style="display:none" class="Rich_Web_Forms_FW" id="Rich_Web_Forms_Field_W_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" name="Rich_Web_Forms_Field_W_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" value="'+Rich_Web_Forms_Fields_W[i]+'"><input type="text" style="display:none" class="Rich_Web_Forms_FT" id="Rich_Web_Forms_Field_T_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" name="Rich_Web_Forms_Field_T_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" value="'+Rich_Web_Forms_Fields_T[i]+'"><input type="text" style="display:none" class="Rich_Web_Forms_FO1" id="Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" name="Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" value="'+Rich_Web_Forms_Fields_O1[i]+'"><input type="text" style="display:none" class="Rich_Web_Forms_FO2" id="Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" name="Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" value="'+Rich_Web_Forms_Fields_O2[i]+'"><input type="text" style="display:none" class="Rich_Web_Forms_FO3" id="Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" name="Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" value="'+Rich_Web_Forms_Fields_O3[i]+'"><input type="text" style="display:none" class="Rich_Web_Forms_FO4" id="Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" name="Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" value="'+Rich_Web_Forms_Fields_O4[i]+'"><input type="text" style="display:none" class="Rich_Web_Forms_FO5" id="Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" name="Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" value="'+Rich_Web_Forms_Fields_O5[i]+'"><input type="text" style="display:none" class="Rich_Web_Forms_FO6" id="Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" name="Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" value="'+Rich_Web_Forms_Fields_O6[i]+'"><input type="text" style="display:none" class="Rich_Web_Forms_FO7" id="Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" name="Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" value="'+Rich_Web_Forms_Fields_O7[i]+'"><input type="text" style="display:none" class="Rich_Web_Forms_FO8" id="Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" name="Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_ID+'_'+parseInt(parseInt(i)+1)+'" value=""><i class="Rich_Web_Forms_FC_LabEdit rich_web rich_web-pencil" aria-hidden="true"></i><i class="Rich_Web_Forms_FC_LabCopy rich_web rich_web-files-o" aria-hidden="true" onclick="Rich_Web_Forms_FC_LabCopy_Clicked('+parseInt(parseInt(i)+1)+')"></i><i class="Rich_Web_Forms_FC_LabRemove rich_web rich_web-trash" aria-hidden="true" onclick="Rich_Web_Forms_FC_LabRemove_Clicked('+parseInt(parseInt(i)+1)+')"></i></div></div>');				
		}
		Rich_Web_Forms_FC_LabEdit_Clicked();
		Rich_Web_Forms_FC_EditChecks_Clicked();
		Rich_Web_Forms_FC_EditChecks_Del_Clicked();
		Rich_Web_Forms_FC_EditOption_Clicked();
		Rich_Web_Forms_FC_EditOption_Del_Clicked();
		Rich_Web_Forms_FC_EditRadios_Clicked();
		Rich_Web_Forms_FC_EditRadios_Del_Clicked();
		Rich_Web_Forms_FC_EditRadios_Check_Clicked();
	})
}
function Rich_Web_Forms_FC_LabRemove_Clicked(num)
{
	var RWFRFI = num;
	jQuery('.Rich_Web_Forms_Fixed_Div').fadeIn();	
	jQuery('.Rich_Web_Forms_Absolute_Div').fadeIn();

	jQuery('.Rich_Web_Forms_Relative_No').click(function(){
		jQuery('.Rich_Web_Forms_Fixed_Div').fadeOut();	
		jQuery('.Rich_Web_Forms_Absolute_Div').fadeOut();
		RWFRFI = null;
	})
	jQuery('.Rich_Web_Forms_Relative_Yes').click(function(){
		if(RWFRFI != null)
		{
			jQuery('.Rich_Web_Forms_Fixed_Div').fadeOut();	
			jQuery('.Rich_Web_Forms_Absolute_Div').fadeOut();
			jQuery('#Rich_Web_Forms_Field_'+RWFRFI).remove();
			jQuery('#Rich_Web_Forms_New_Co').val(parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())-1));	
			jQuery(".Rich_Web_Forms_FC").each(function(){
				var Rich_Web_Forms_New_ID=jQuery('#Rich_Web_Forms_New_ID').val();
				jQuery(this).find('div[class=Rich_Web_Forms_FC_No]').find('span').html(parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FF]').attr('name', 'Rich_Web_Forms_Field_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FF]').attr('id', 'Rich_Web_Forms_Field_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FW]').attr('name', 'Rich_Web_Forms_Field_W_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FW]').attr('id', 'Rich_Web_Forms_Field_W_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FT]').attr('name', 'Rich_Web_Forms_Field_T_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FT]').attr('id', 'Rich_Web_Forms_Field_T_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO1]').attr('name', 'Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO1]').attr('id', 'Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO2]').attr('name', 'Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO2]').attr('id', 'Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO3]').attr('name', 'Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO3]').attr('id', 'Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO4]').attr('name', 'Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO4]').attr('id', 'Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO5]').attr('name', 'Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO5]').attr('id', 'Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO6]').attr('name', 'Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO6]').attr('id', 'Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO7]').attr('name', 'Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO7]').attr('id', 'Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO8]').attr('name', 'Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO8]').attr('id', 'Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
			});
		}
		RWFRFI = null;			
	})		
}
function Rich_Web_Forms_Delete(Rich_Web_Forms_ID)
{
	var RWFRF = Rich_Web_Forms_ID;
	jQuery('.Rich_Web_Forms_Fixed_Div').fadeIn();	
	jQuery('.Rich_Web_Forms_Absolute_Div').fadeIn();

	jQuery('.Rich_Web_Forms_Relative_No').click(function(){
		jQuery('.Rich_Web_Forms_Fixed_Div').fadeOut();	
		jQuery('.Rich_Web_Forms_Absolute_Div').fadeOut();
		RWFRF = null;
	})
	jQuery('.Rich_Web_Forms_Relative_Yes').click(function(){
		if(RWFRF != null)
		{
			jQuery('.Rich_Web_Forms_Fixed_Div').fadeOut();	
			jQuery('.Rich_Web_Forms_Absolute_Div').fadeOut();
			var ajaxurl = object.ajaxurl;
			var data = {
			action: 'Rich_Web_Forms_Del', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
			foobar: Rich_Web_Forms_ID, // translates into $_POST['foobar'] in PHP
			};
			jQuery.post(ajaxurl, data, function(response) {
				location.reload();
			})
		}
		RWFRF = null;			
	})
}
function Rich_Web_Forms_Fields_Clicked(Rich_Web_Forms_Field)
{
	var Rich_Web_Forms_New_ID=jQuery('#Rich_Web_Forms_New_ID').val();
	jQuery('.Rich_Web_Forms_Fields_Content').append('<div class="Rich_Web_Forms_FC" id="Rich_Web_Forms_Field_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'"><div class="Rich_Web_Forms_FC_No"><span>'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'</span></div><div class="Rich_Web_Forms_FC_C"><span class="Rich_Web_Forms_FC_C_Span" data-type="minus" onclick="Rich_Web_Forms_FC_C_Span_Clicked('+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+')">-</span><span class="Rich_Web_Forms_FC_C_Span" data-type="plus" onclick="Rich_Web_Forms_FC_C_Span_Clicked('+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+')">+</span></div><div class="Rich_Web_Forms_FC_Lab"><label>1/1</label><label>'+Rich_Web_Forms_Field+'</label><input type="text" style="display:none" class="Rich_Web_Forms_FF" id="Rich_Web_Forms_Field_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value=""><input type="text" style="display:none" class="Rich_Web_Forms_FW" id="Rich_Web_Forms_Field_W_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_W_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value="100%"><input type="text" style="display:none" class="Rich_Web_Forms_FT" id="Rich_Web_Forms_Field_T_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_T_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value="'+Rich_Web_Forms_Field+'"><input type="text" style="display:none" class="Rich_Web_Forms_FO1" id="Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value=""><input type="text" style="display:none" class="Rich_Web_Forms_FO2" id="Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value=""><input type="text" style="display:none" class="Rich_Web_Forms_FO3" id="Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value=""><input type="text" style="display:none" class="Rich_Web_Forms_FO4" id="Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value=""><input type="text" style="display:none" class="Rich_Web_Forms_FO5" id="Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value=""><input type="text" style="display:none" class="Rich_Web_Forms_FO6" id="Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value=""><input type="text" style="display:none" class="Rich_Web_Forms_FO7" id="Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value=""><input type="text" style="display:none" class="Rich_Web_Forms_FO8" id="Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value=""><i class="Rich_Web_Forms_FC_LabEdit rich_web rich_web-pencil" aria-hidden="true"></i><i class="Rich_Web_Forms_FC_LabCopy rich_web rich_web-files-o" aria-hidden="true" onclick="Rich_Web_Forms_FC_LabCopy_Clicked('+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+')"></i><i class="Rich_Web_Forms_FC_LabRemove rich_web rich_web-trash" aria-hidden="true" onclick="Rich_Web_Forms_FC_LabRemove_Clicked('+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+')"></i></div></div>');
	Rich_Web_Forms_FC_LabEdit_Clicked();
	jQuery('#Rich_Web_Forms_New_Co').val(parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1));
}
function Rich_Web_Forms_Fields_Clicked_Pro(Rich_Web_Forms_Field)
{
	Rich_Web_Forms_Fields_Clicked(Rich_Web_Forms_Field);
}
jQuery(document).ready(function(){
	Rich_Web_Forms_FC_LabEdit_Clicked();
})
function Rich_Web_Forms_FC_C_Span_Clicked(num)
{
	if(jQuery('#Rich_Web_Forms_Field_'+num).find('.Rich_Web_Forms_FC_Lab').find('label').html()=='1/1')
	{
		var Width='50%';
		var Width1='1/2';
		var Width2='49%';
	}
	else
	{
		var Width='100%';
		var Width1='1/1';
		var Width2='100%';
	}
	jQuery('#Rich_Web_Forms_Field_'+num).css('width', Width);
	jQuery('#Rich_Web_Forms_Field_'+num).find('input[type=text][class=Rich_Web_Forms_FW]').val(Width2);
	jQuery('#Rich_Web_Forms_Field_'+num).find('.Rich_Web_Forms_FC_Lab').find('label:first-child').html(Width1);
}
function Rich_Web_Forms_FC_LabEdit_Clicked()
{
	jQuery('.Rich_Web_Forms_FC_LabEdit').click(function(){
		var Rich_Web_Forms_FC_Label=jQuery(this).parent().find('label:nth-child(2)').html();
		var Rich_Web_Forms_FC_Rel=jQuery(this).parent().find('input[type=text][class=Rich_Web_Forms_FF]').attr('id');
		jQuery('.Rich_Web_Forms_Fields_Content').fadeOut(500);
		setTimeout(function(){
			if(Rich_Web_Forms_FC_Label=='Text Box')
			{
				jQuery('.Rich_Web_Forms_Fields_Editing_Text').fadeIn();

				var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FC_Rel.split('Rich_Web_Forms_Field_')[1];

 				var Rich_Web_Forms_Field_O1=jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O2=jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O3=jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O4=jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O5=jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O6=jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val();
 				if(Rich_Web_Forms_Field_O3==''){ Rich_Web_Forms_Field_O3='Left'; }

 				jQuery('.Rich_Web_Forms_Fields_Editing_Text').find('input[type=text][name=Rich_Web_Forms_FEditing_Text_L]').val(Rich_Web_Forms_Field_O1);
				jQuery('.Rich_Web_Forms_Fields_Editing_Text').find('input[type=text][name=Rich_Web_Forms_FEditing_Text_P]').val(Rich_Web_Forms_Field_O2);
				jQuery('.Rich_Web_Forms_Fields_Editing_Text').find('select[name=Rich_Web_Forms_FEditing_Text_LP]').val(Rich_Web_Forms_Field_O3);

 				jQuery('.Rich_Web_Forms_Fields_Editing_Text').find("input[name=Rich_Web_Forms_FEditing_Text_T]").each(function(){
					if(jQuery(this).val()==Rich_Web_Forms_Field_O4)
					{
						jQuery(this).attr('checked',true);
					}
				})
					
				if(Rich_Web_Forms_Field_O5=='required')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Text').find("input[name=Rich_Web_Forms_FEditing_Text_R]").attr("checked",true);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Text').find("input[name=Rich_Web_Forms_FEditing_Text_R]").attr("checked",false);
				}
				if(Rich_Web_Forms_Field_O6=='disabled')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Text').find("input[name=Rich_Web_Forms_FEditing_Text_A]").attr("checked",false);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Text').find("input[name=Rich_Web_Forms_FEditing_Text_A]").attr("checked",true);
				}

				jQuery('.Rich_Web_Forms_Fields_Editing_Text').attr('rel', Rich_Web_Forms_FC_Rel);
			}
			else if(Rich_Web_Forms_FC_Label=='Textarea')
			{
				jQuery('.Rich_Web_Forms_Fields_Editing_Textarea').fadeIn();	

				var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FC_Rel.split('Rich_Web_Forms_Field_')[1];

 				var Rich_Web_Forms_Field_O1=jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O2=jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O3=jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O4=jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O5=jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O6=jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O7=jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val();
 				if(Rich_Web_Forms_Field_O3==''){ Rich_Web_Forms_Field_O3='Left'; }
 				if(Rich_Web_Forms_Field_O4==''){ Rich_Web_Forms_Field_O4=80; }

 				jQuery('.Rich_Web_Forms_Fields_Editing_Textarea').find("input[id=Rich_Web_Forms_FEditing_TA_H]").val(Rich_Web_Forms_Field_O4);
				jQuery('.Rich_Web_Forms_Fields_Editing_Textarea').find('input[type=text][name=Rich_Web_Forms_FEditing_TA_L]').val(Rich_Web_Forms_Field_O1);
				jQuery('.Rich_Web_Forms_Fields_Editing_Textarea').find('input[type=text][name=Rich_Web_Forms_FEditing_TA_P]').val(Rich_Web_Forms_Field_O2);
				jQuery('.Rich_Web_Forms_Fields_Editing_Textarea').find('select[name=Rich_Web_Forms_FEditing_TA_LP]').val(Rich_Web_Forms_Field_O3);

				if(Rich_Web_Forms_Field_O5=='required')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Textarea').find("input[name=Rich_Web_Forms_FEditing_TA_R]").attr("checked",true);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Textarea').find("input[name=Rich_Web_Forms_FEditing_TA_R]").attr("checked",false);
				}
				if(Rich_Web_Forms_Field_O6=='disabled')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Textarea').find("input[name=Rich_Web_Forms_FEditing_TA_A]").attr("checked",false);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Textarea').find("input[name=Rich_Web_Forms_FEditing_TA_A]").attr("checked",true);
				}
				if(Rich_Web_Forms_Field_O7=='vertical')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Textarea').find("input[name=Rich_Web_Forms_FEditing_TA_ReS]").attr("checked",true);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Textarea').find("input[name=Rich_Web_Forms_FEditing_TA_ReS]").attr("checked",false);
				}

				jQuery('.Rich_Web_Forms_Fields_Editing_Textarea').attr('rel', Rich_Web_Forms_FC_Rel);									
			}
			else if(Rich_Web_Forms_FC_Label=='Select Menu')
			{
				jQuery('.Rich_Web_Forms_Fields_Editing_Select').fadeIn();

				var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FC_Rel.split('Rich_Web_Forms_Field_')[1];

 				var Rich_Web_Forms_Field_O1=jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O2=jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O3=jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O5=jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val();
 				if(Rich_Web_Forms_Field_O3==''){ Rich_Web_Forms_Field_O3='Left'; }

 				jQuery('.Rich_Web_Forms_Fields_Editing_Select').find('input[type=text][name=Rich_Web_Forms_FEditing_SM_L]').val(Rich_Web_Forms_Field_O1);
				jQuery('.Rich_Web_Forms_Fields_Editing_Select').find('input[type=text][name=Rich_Web_Forms_FEditing_SM_P]').val(Rich_Web_Forms_Field_O2);
				jQuery('.Rich_Web_Forms_Fields_Editing_Select').find('select[name=Rich_Web_Forms_FEditing_SM_LP]').val(Rich_Web_Forms_Field_O3);

				var Rich_Web_Forms_Fields_Editing_Select_OPT=Rich_Web_Forms_Field_O5.split('qwertyh');
				jQuery('.Rich_Web_Forms_Fields_Editing_Select').find('.Rich_Web_Forms_Fields_Editing_Text_div3').html('');
				if(Rich_Web_Forms_Fields_Editing_Select_OPT!='')
				{
					for(var i=0;i<Rich_Web_Forms_Fields_Editing_Select_OPT.length;i++)
					{
						jQuery('.Rich_Web_Forms_Fields_Editing_Select').find('.Rich_Web_Forms_Fields_Editing_Text_div3').append('<div><input type="text" name="" value="'+Rich_Web_Forms_Fields_Editing_Select_OPT[i]+'"><i class="Rich_Web_Forms_FC_EditOption_Del rich_web rich_web-trash" aria-hidden="true"></i></div>');
					}
				}
					
				jQuery('.Rich_Web_Forms_Fields_Editing_Select').attr('rel', Rich_Web_Forms_FC_Rel);
			}
			else if(Rich_Web_Forms_FC_Label=='Check Box')
			{
				jQuery('.Rich_Web_Forms_Fields_Editing_Check').fadeIn();

				var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FC_Rel.split('Rich_Web_Forms_Field_')[1];

 				var Rich_Web_Forms_Field_O1=jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O2=jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O3=jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O4=jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O5=jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O6=jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val();
 				if(Rich_Web_Forms_Field_O2==''){ Rich_Web_Forms_Field_O2='Left'; }
 				if(Rich_Web_Forms_Field_O4==''){ Rich_Web_Forms_Field_O4=1; }
 				jQuery('.Rich_Web_Forms_Fields_Editing_Check').find('input[type=text][name=Rich_Web_Forms_FEditing_CB_L]').val(Rich_Web_Forms_Field_O1);
				jQuery('.Rich_Web_Forms_Fields_Editing_Check').find('select[name=Rich_Web_Forms_FEditing_CB_LP]').val(Rich_Web_Forms_Field_O2);
				jQuery('.Rich_Web_Forms_Fields_Editing_Check').find('#Rich_Web_Forms_FEditing_CB_CC').val(Rich_Web_Forms_Field_O4);
				jQuery('.Rich_Web_Forms_Fields_Editing_Check').find('#Rich_Web_Forms_FEditing_CB_CC_Span').html(Rich_Web_Forms_Field_O4);
				if(Rich_Web_Forms_Field_O3=='disabled')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Check').find("input[name=Rich_Web_Forms_FEditing_CB_A]").attr("checked",false);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Check').find("input[name=Rich_Web_Forms_FEditing_CB_A]").attr("checked",true);
				}

				var Rich_Web_Forms_Fields_Editing_Check_OPT=Rich_Web_Forms_Field_O5.split('qwertyh');
				var Rich_Web_Forms_Fields_Editing_Check_CHK=Rich_Web_Forms_Field_O6.split('qwertyh');
				jQuery('.Rich_Web_Forms_Fields_Editing_Check').find('.Rich_Web_Forms_Fields_Editing_Text_div3').html('');
				if(Rich_Web_Forms_Fields_Editing_Check_OPT!='')
				{
					for(var i=0;i<Rich_Web_Forms_Fields_Editing_Check_OPT.length;i++)
					{
						jQuery('.Rich_Web_Forms_Fields_Editing_Check').find('.Rich_Web_Forms_Fields_Editing_Text_div3').append('<div><input type="text" name="" value="'+Rich_Web_Forms_Fields_Editing_Check_OPT[i]+'"><input type="checkbox" class="Rich_Web_Forms_FC_EditChecks_Check" '+Rich_Web_Forms_Fields_Editing_Check_CHK[i]+'><i class="Rich_Web_Forms_FC_EditChecks_Del rich_web rich_web-trash" aria-hidden="true"></i></div>');
					}
				}
					
				jQuery('.Rich_Web_Forms_Fields_Editing_Check').attr('rel', Rich_Web_Forms_FC_Rel);
			}
			else if(Rich_Web_Forms_FC_Label=='Radio Box')
			{
				jQuery('.Rich_Web_Forms_Fields_Editing_Radio').fadeIn();

				var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FC_Rel.split('Rich_Web_Forms_Field_')[1];

 				var Rich_Web_Forms_Field_O1=jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O2=jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O3=jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O4=jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O5=jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O6=jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val();
 				if(Rich_Web_Forms_Field_O2==''){ Rich_Web_Forms_Field_O2='Left'; }
 				if(Rich_Web_Forms_Field_O4==''){ Rich_Web_Forms_Field_O4=1; }
 				jQuery('.Rich_Web_Forms_Fields_Editing_Radio').find('input[type=text][name=Rich_Web_Forms_FEditing_RB_L]').val(Rich_Web_Forms_Field_O1);
				jQuery('.Rich_Web_Forms_Fields_Editing_Radio').find('select[name=Rich_Web_Forms_FEditing_RB_LP]').val(Rich_Web_Forms_Field_O2);
				jQuery('.Rich_Web_Forms_Fields_Editing_Radio').find('#Rich_Web_Forms_FEditing_RB_CC').val(Rich_Web_Forms_Field_O4);
				jQuery('.Rich_Web_Forms_Fields_Editing_Radio').find('#Rich_Web_Forms_FEditing_RB_CC_Span').html(Rich_Web_Forms_Field_O4);
				if(Rich_Web_Forms_Field_O3=='disabled')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Radio').find("input[name=Rich_Web_Forms_FEditing_RB_A]").attr("checked",false);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Radio').find("input[name=Rich_Web_Forms_FEditing_RB_A]").attr("checked",true);
				}

				var Rich_Web_Forms_Fields_Editing_Radio_OPT=Rich_Web_Forms_Field_O5.split('qwertyh');
				var Rich_Web_Forms_Fields_Editing_Radio_CHK=Rich_Web_Forms_Field_O6.split('qwertyh');
				jQuery('.Rich_Web_Forms_Fields_Editing_Radio').find('.Rich_Web_Forms_Fields_Editing_Text_div3').html('');
				if(Rich_Web_Forms_Fields_Editing_Radio_OPT!='')
				{
					for(var i=0;i<Rich_Web_Forms_Fields_Editing_Radio_OPT.length;i++)
					{
						jQuery('.Rich_Web_Forms_Fields_Editing_Radio').find('.Rich_Web_Forms_Fields_Editing_Text_div3').append('<div><input type="text" name="" value="'+Rich_Web_Forms_Fields_Editing_Radio_OPT[i]+'"><input type="checkbox" class="Rich_Web_Forms_FC_EditRadios_Check" '+Rich_Web_Forms_Fields_Editing_Radio_CHK[i]+'><i class="Rich_Web_Forms_FC_EditRadios_Del rich_web rich_web-trash" aria-hidden="true"></i></div>');
					}
				}
				
				jQuery('.Rich_Web_Forms_Fields_Editing_Radio').attr('rel', Rich_Web_Forms_FC_Rel);
			}
			else if(Rich_Web_Forms_FC_Label=='File')
			{
				jQuery('.Rich_Web_Forms_Fields_Editing_File').fadeIn();

				var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FC_Rel.split('Rich_Web_Forms_Field_')[1];

 				var Rich_Web_Forms_Field_O1=jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O2=jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O3=jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O4=jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O5=jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O6=jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val();
 				
 				if(Rich_Web_Forms_Field_O2==''){ Rich_Web_Forms_Field_O2='Left'; }
 				if(Rich_Web_Forms_Field_O5==''){ Rich_Web_Forms_Field_O5='.jpg, .png, .gif, .xlsx, .pdf, .xml, .xmlx, .xls, .xtx'; }

				jQuery('.Rich_Web_Forms_Fields_Editing_File').find('input[type=text][name=Rich_Web_Forms_FEditing_F_L]').val(Rich_Web_Forms_Field_O1);
				jQuery('.Rich_Web_Forms_Fields_Editing_File').find('select[name=Rich_Web_Forms_FEditing_F_LP]').val(Rich_Web_Forms_Field_O2);
				jQuery('.Rich_Web_Forms_Fields_Editing_File').find('input[type=text][name=Rich_Web_Forms_FEditing_F_FD]').val(Rich_Web_Forms_Field_O4);
				jQuery('.Rich_Web_Forms_Fields_Editing_File').find('input[type=text][name=Rich_Web_Forms_FEditing_F_AT]').val(Rich_Web_Forms_Field_O5);
				
				if(Rich_Web_Forms_Field_O3=='required')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_File').find("input[name=Rich_Web_Forms_FEditing_F_R]").attr("checked",true);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_File').find("input[name=Rich_Web_Forms_FEditing_F_R]").attr("checked",false);
				}

				jQuery('.Rich_Web_Forms_Fields_Editing_File').attr('rel', Rich_Web_Forms_FC_Rel);
			}
			else if(Rich_Web_Forms_FC_Label=='Custom Text')
			{
				jQuery('.Rich_Web_Forms_Fields_Editing_Custom').fadeIn();
				var CustomContentText=jQuery('#'+Rich_Web_Forms_FC_Rel).val();
				Rich_Web_Forms_FC_EditCustom_Clicked();
				tinymce.get('Rich_Web_Forms_Fields_Editing_Custom_ID').setContent(CustomContentText);
				jQuery('.Rich_Web_Forms_Fields_Editing_Custom').attr('rel', Rich_Web_Forms_FC_Rel);
			}
			else if(Rich_Web_Forms_FC_Label=='Email')
			{
				jQuery('.Rich_Web_Forms_Fields_Editing_Email').fadeIn();

				var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FC_Rel.split('Rich_Web_Forms_Field_')[1];

 				var Rich_Web_Forms_Field_O1=jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O2=jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O3=jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O4=jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O5=jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val();
 				if(Rich_Web_Forms_Field_O3==''){ Rich_Web_Forms_Field_O3='Left'; }

 				jQuery('.Rich_Web_Forms_Fields_Editing_Email').find('input[type=text][name=Rich_Web_Forms_FEditing_E_L]').val(Rich_Web_Forms_Field_O1);
				jQuery('.Rich_Web_Forms_Fields_Editing_Email').find('input[type=text][name=Rich_Web_Forms_FEditing_E_P]').val(Rich_Web_Forms_Field_O2);
				jQuery('.Rich_Web_Forms_Fields_Editing_Email').find('select[name=Rich_Web_Forms_FEditing_E_LP]').val(Rich_Web_Forms_Field_O3);

 				if(Rich_Web_Forms_Field_O4=='required')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Email').find("input[name=Rich_Web_Forms_FEditing_E_R]").attr("checked",true);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Email').find("input[name=Rich_Web_Forms_FEditing_E_R]").attr("checked",false);
				}
				if(Rich_Web_Forms_Field_O5=='disabled')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Email').find("input[name=Rich_Web_Forms_FEditing_E_A]").attr("checked",false);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Email').find("input[name=Rich_Web_Forms_FEditing_E_A]").attr("checked",true);
				}

				jQuery('.Rich_Web_Forms_Fields_Editing_Email').attr('rel', Rich_Web_Forms_FC_Rel);
			}
			else if(Rich_Web_Forms_FC_Label=='Button')
			{
				jQuery('.Rich_Web_Forms_Fields_Editing_Button').fadeIn();
				var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FC_Rel.split('Rich_Web_Forms_Field_')[1];

 				var Rich_Web_Forms_Field_O1=jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O2=jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O3=jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O4=jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O5=jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val();
 				if(Rich_Web_Forms_Field_O3==''){ Rich_Web_Forms_Field_O3='Go to URL'; }

					jQuery('.Rich_Web_Forms_Fields_Editing_Button').find('input[name=Rich_Web_Forms_FEditing_B_BT]').val(Rich_Web_Forms_Field_O1);
				jQuery('.Rich_Web_Forms_Fields_Editing_Button').find('input[name=Rich_Web_Forms_FEditing_B_RBT]').val(Rich_Web_Forms_Field_O2);
				jQuery('.Rich_Web_Forms_Fields_Editing_Button').find('select[name=Rich_Web_Forms_FEditing_B_AAC]').val(Rich_Web_Forms_Field_O3);
				jQuery('.Rich_Web_Forms_Fields_Editing_Button').find('input[name=Rich_Web_Forms_FEditing_B_URL]').val(Rich_Web_Forms_Field_O4);

				if(Rich_Web_Forms_Field_O5=='show')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Button').find("input[name=Rich_Web_Forms_FEditing_B_SRB]").attr("checked",true);
				}

				Rich_Web_Forms_FC_Edit_AAC_Clicked();
				jQuery('.Rich_Web_Forms_Fields_Editing_Button').attr('rel', Rich_Web_Forms_FC_Rel);
			}
			else if(Rich_Web_Forms_FC_Label=='Divider')
			{
				jQuery('.Rich_Web_Forms_Fields_Editing_Divider').fadeIn();
				var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FC_Rel.split('Rich_Web_Forms_Field_')[1];

 				var Rich_Web_Forms_Field_O1=jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O2=jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val();
 				if(Rich_Web_Forms_Field_O1==''){ Rich_Web_Forms_Field_O1=0; }
 				if(Rich_Web_Forms_Field_O2==''){ Rich_Web_Forms_Field_O2='none'; }
 				
 				jQuery('.Rich_Web_Forms_Fields_Editing_Divider').find('input[id=Rich_Web_Forms_FEditing_D_H]').val(Rich_Web_Forms_Field_O1);
 				jQuery('.Rich_Web_Forms_Fields_Editing_Divider').find('span[id=Rich_Web_Forms_FEditing_D_H_Span]').html(Rich_Web_Forms_Field_O1);
				jQuery('.Rich_Web_Forms_Fields_Editing_Divider').find('select[name=Rich_Web_Forms_FEditing_D_S]').val(Rich_Web_Forms_Field_O2);

				jQuery('.Rich_Web_Forms_Fields_Editing_Divider').attr('rel', Rich_Web_Forms_FC_Rel);
			}
			else if(Rich_Web_Forms_FC_Label=='Space')
			{
				jQuery('.Rich_Web_Forms_Fields_Editing_Space').fadeIn();

				var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FC_Rel.split('Rich_Web_Forms_Field_')[1];

 				var Rich_Web_Forms_Field_O1=jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val();
 				if(Rich_Web_Forms_Field_O1==''){ Rich_Web_Forms_Field_O1=0; }
 				jQuery('.Rich_Web_Forms_Fields_Editing_Space').find('input[id=Rich_Web_Forms_FEditing_S_W]').val(Rich_Web_Forms_Field_O1);
				jQuery('.Rich_Web_Forms_Fields_Editing_Space').find('span[id=Rich_Web_Forms_FEditing_S_W_Span]').html(Rich_Web_Forms_Field_O1);

				jQuery('.Rich_Web_Forms_Fields_Editing_Space').attr('rel', Rich_Web_Forms_FC_Rel);
			}
			else if(Rich_Web_Forms_FC_Label=='Captcha')
			{
				jQuery('.Rich_Web_Forms_Fields_Editing_Captcha').fadeIn();
				var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FC_Rel.split('Rich_Web_Forms_Field_')[1];
 				var Rich_Web_Forms_Field_O1=jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O2=jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O3=jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O4=jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val();
 				if(Rich_Web_Forms_Field_O1==''){ Rich_Web_Forms_Field_O1='light'; }
 				if(Rich_Web_Forms_Field_O2==''){ Rich_Web_Forms_Field_O2='normal'; }
 				if(Rich_Web_Forms_Field_O3==''){ Rich_Web_Forms_Field_O3='audio'; }
 				if(Rich_Web_Forms_Field_O4==''){ Rich_Web_Forms_Field_O4='left'; }

				jQuery('.Rich_Web_Forms_Fields_Editing_Captcha').find('select[name=Rich_Web_Forms_FEditing_Captcha_Theme]').val(Rich_Web_Forms_Field_O1);
				jQuery('.Rich_Web_Forms_Fields_Editing_Captcha').find('select[name=Rich_Web_Forms_FEditing_Captcha_Size]').val(Rich_Web_Forms_Field_O2);
				jQuery('.Rich_Web_Forms_Fields_Editing_Captcha').find('select[name=Rich_Web_Forms_FEditing_Captcha_Type]').val(Rich_Web_Forms_Field_O3);
				jQuery('.Rich_Web_Forms_Fields_Editing_Captcha').find('select[name=Rich_Web_Forms_FEditing_Captcha_Pos]').val(Rich_Web_Forms_Field_O4);

				jQuery('.Rich_Web_Forms_Fields_Editing_Captcha').attr('rel', Rich_Web_Forms_FC_Rel);
			}
			else if(Rich_Web_Forms_FC_Label=='DatePicker')
			{
				jQuery('.Rich_Web_Forms_Fields_Editing_DatePicker').fadeIn();

				var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FC_Rel.split('Rich_Web_Forms_Field_')[1];

 				var Rich_Web_Forms_Field_O1=jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O2=jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O3=jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O4=jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O5=jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O6=jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O7=jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val();
 				if(Rich_Web_Forms_Field_O3==''){ Rich_Web_Forms_Field_O3='Left'; }

 				jQuery('.Rich_Web_Forms_Fields_Editing_DatePicker').find('input[type=text][name=Rich_Web_Forms_FEditing_DateP_L]').val(Rich_Web_Forms_Field_O1);
				jQuery('.Rich_Web_Forms_Fields_Editing_DatePicker').find('input[type=text][name=Rich_Web_Forms_FEditing_DateP_P]').val(Rich_Web_Forms_Field_O2);
				jQuery('.Rich_Web_Forms_Fields_Editing_DatePicker').find('select[name=Rich_Web_Forms_FEditing_DateP_LP]').val(Rich_Web_Forms_Field_O3);

				if(Rich_Web_Forms_Field_O4=='current')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_DatePicker').find("input[name=Rich_Web_Forms_FEditing_DateP_Cur]").attr("checked",true);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_DatePicker').find("input[name=Rich_Web_Forms_FEditing_DateP_Cur]").attr("checked",false);
				}

				if(Rich_Web_Forms_Field_O5=='required')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_DatePicker').find("input[name=Rich_Web_Forms_FEditing_DateP_R]").attr("checked",true);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_DatePicker').find("input[name=Rich_Web_Forms_FEditing_DateP_R]").attr("checked",false);
				}
				if(Rich_Web_Forms_Field_O6=='disabled')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_DatePicker').find("input[name=Rich_Web_Forms_FEditing_DateP_A]").attr("checked",false);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_DatePicker').find("input[name=Rich_Web_Forms_FEditing_DateP_A]").attr("checked",true);
				}
				if(Rich_Web_Forms_Field_O7=='FromTo')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_DatePicker').find("input[name=Rich_Web_Forms_FEditing_DateP_FT]").attr("checked",true);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_DatePicker').find("input[name=Rich_Web_Forms_FEditing_DateP_FT]").attr("checked",false);
				}

				jQuery('.Rich_Web_Forms_Fields_Editing_DatePicker').attr('rel', Rich_Web_Forms_FC_Rel);
			}
			else if(Rich_Web_Forms_FC_Label=='TimePicker')
			{
				jQuery('.Rich_Web_Forms_Fields_Editing_TimePicker').fadeIn();

				var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FC_Rel.split('Rich_Web_Forms_Field_')[1];

 				var Rich_Web_Forms_Field_O1=jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O3=jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O4=jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O5=jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O6=jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O7=jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val();
 				if(Rich_Web_Forms_Field_O3==''){ Rich_Web_Forms_Field_O3='Left'; }

 				jQuery('.Rich_Web_Forms_Fields_Editing_TimePicker').find('input[type=text][name=Rich_Web_Forms_FEditing_TimeP_L]').val(Rich_Web_Forms_Field_O1);
				jQuery('.Rich_Web_Forms_Fields_Editing_TimePicker').find('select[name=Rich_Web_Forms_FEditing_TimeP_LP]').val(Rich_Web_Forms_Field_O3);

				if(Rich_Web_Forms_Field_O4=='current')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_TimePicker').find("input[name=Rich_Web_Forms_FEditing_TimeP_Cur]").attr("checked",true);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_TimePicker').find("input[name=Rich_Web_Forms_FEditing_TimeP_Cur]").attr("checked",false);
				}

				if(Rich_Web_Forms_Field_O5=='required')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_TimePicker').find("input[name=Rich_Web_Forms_FEditing_TimeP_R]").attr("checked",true);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_TimePicker').find("input[name=Rich_Web_Forms_FEditing_TimeP_R]").attr("checked",false);
				}
				if(Rich_Web_Forms_Field_O6=='disabled')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_TimePicker').find("input[name=Rich_Web_Forms_FEditing_TimeP_A]").attr("checked",false);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_TimePicker').find("input[name=Rich_Web_Forms_FEditing_TimeP_A]").attr("checked",true);
				}
				if(Rich_Web_Forms_Field_O7=='FromTo')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_TimePicker').find("input[name=Rich_Web_Forms_FEditing_TimeP_FT]").attr("checked",true);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_TimePicker').find("input[name=Rich_Web_Forms_FEditing_TimeP_FT]").attr("checked",false);
				}

				jQuery('.Rich_Web_Forms_Fields_Editing_TimePicker').attr('rel', Rich_Web_Forms_FC_Rel);
			}
			else if(Rich_Web_Forms_FC_Label=='Full Name')
			{
				jQuery('.Rich_Web_Forms_Fields_Editing_Full_Name').fadeIn();

				var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FC_Rel.split('Rich_Web_Forms_Field_')[1];

 				var Rich_Web_Forms_Field_O1=jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O2=jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O3=jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O4=jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O5=jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O6=jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val();
 				if(Rich_Web_Forms_Field_O3==''){ Rich_Web_Forms_Field_O3='Left'; }

 				jQuery('.Rich_Web_Forms_Fields_Editing_Full_Name').find('input[type=text][name=Rich_Web_Forms_FEditing_FullN_L]').val(Rich_Web_Forms_Field_O1);
				jQuery('.Rich_Web_Forms_Fields_Editing_Full_Name').find('select[name=Rich_Web_Forms_FEditing_FullN_LP]').val(Rich_Web_Forms_Field_O3);
 				jQuery('.Rich_Web_Forms_Fields_Editing_Full_Name').find('input[type=text][name=Rich_Web_Forms_FEditing_FullN_P_1]').val(Rich_Web_Forms_Field_O2);
 				jQuery('.Rich_Web_Forms_Fields_Editing_Full_Name').find('input[type=text][name=Rich_Web_Forms_FEditing_FullN_P_2]').val(Rich_Web_Forms_Field_O4);

				if(Rich_Web_Forms_Field_O5=='required')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Full_Name').find("input[name=Rich_Web_Forms_FEditing_FullN_R]").attr("checked",true);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Full_Name').find("input[name=Rich_Web_Forms_FEditing_FullN_R]").attr("checked",false);
				}
				if(Rich_Web_Forms_Field_O6=='disabled')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Full_Name').find("input[name=Rich_Web_Forms_FEditing_FullN_A]").attr("checked",false);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Full_Name').find("input[name=Rich_Web_Forms_FEditing_FullN_A]").attr("checked",true);
				}

				jQuery('.Rich_Web_Forms_Fields_Editing_Full_Name').attr('rel', Rich_Web_Forms_FC_Rel);
			}
			else if(Rich_Web_Forms_FC_Label=='Phone')
			{
				jQuery('.Rich_Web_Forms_Fields_Editing_Phone').fadeIn();

				var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FC_Rel.split('Rich_Web_Forms_Field_')[1];

 				var Rich_Web_Forms_Field_O1=jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O2=jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O3=jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O4=jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O5=jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O6=jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val();
 				if(Rich_Web_Forms_Field_O3==''){ Rich_Web_Forms_Field_O3='Left'; }

 				jQuery('.Rich_Web_Forms_Fields_Editing_Phone').find('input[type=text][name=Rich_Web_Forms_FEditing_Phone_L]').val(Rich_Web_Forms_Field_O1);
				jQuery('.Rich_Web_Forms_Fields_Editing_Phone').find('select[name=Rich_Web_Forms_FEditing_Phone_LP]').val(Rich_Web_Forms_Field_O3);
 				jQuery('.Rich_Web_Forms_Fields_Editing_Phone').find('input[type=text][name=Rich_Web_Forms_FEditing_Phone_P]').val(Rich_Web_Forms_Field_O2);
 				
				if(Rich_Web_Forms_Field_O5=='required')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Phone').find("input[name=Rich_Web_Forms_FEditing_Phone_R]").attr("checked",true);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Phone').find("input[name=Rich_Web_Forms_FEditing_Phone_R]").attr("checked",false);
				}
				if(Rich_Web_Forms_Field_O6=='disabled')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Phone').find("input[name=Rich_Web_Forms_FEditing_Phone_A]").attr("checked",false);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Phone').find("input[name=Rich_Web_Forms_FEditing_Phone_A]").attr("checked",true);
				}
				jQuery('.Rich_Web_Forms_Fields_Editing_Phone').attr('rel', Rich_Web_Forms_FC_Rel);
			}
			else if(Rich_Web_Forms_FC_Label=='Country')
			{
				jQuery('.Rich_Web_Forms_Fields_Editing_Country').fadeIn();

				var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FC_Rel.split('Rich_Web_Forms_Field_')[1];

 				var Rich_Web_Forms_Field_O1=jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O2=jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O3=jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O4=jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O5=jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O6=jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val();
 				if(Rich_Web_Forms_Field_O3==''){ Rich_Web_Forms_Field_O3='Left'; }

 				jQuery('.Rich_Web_Forms_Fields_Editing_Country').find('input[type=text][name=Rich_Web_Forms_FEditing_Country_L]').val(Rich_Web_Forms_Field_O1);
				jQuery('.Rich_Web_Forms_Fields_Editing_Country').find('select[name=Rich_Web_Forms_FEditing_Country_LP]').val(Rich_Web_Forms_Field_O3);
 				jQuery('.Rich_Web_Forms_Fields_Editing_Country').find('input[type=text][name=Rich_Web_Forms_FEditing_Country_P]').val(Rich_Web_Forms_Field_O2);
 				
				if(Rich_Web_Forms_Field_O6=='disabled')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Country').find("input[name=Rich_Web_Forms_FEditing_Country_A]").attr("checked",false);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Country').find("input[name=Rich_Web_Forms_FEditing_Country_A]").attr("checked",true);
				}
				jQuery('.Rich_Web_Forms_Fields_Editing_Country').attr('rel', Rich_Web_Forms_FC_Rel);
			}
			else if(Rich_Web_Forms_FC_Label=='Privacy Policy')
			{
				jQuery('.Rich_Web_Forms_Fields_Editing_Privacy').fadeIn();
				
				var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FC_Rel.split('Rich_Web_Forms_Field_')[1];

				var Rich_Web_Forms_Field_O1=jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O2=jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O3=jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O4=jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val();
 				if(Rich_Web_Forms_Field_O2 == ''){ Rich_Web_Forms_Field_O2 = 'Left'; }
 				if(Rich_Web_Forms_Field_O4 == ''){ Rich_Web_Forms_Field_O4 = 'left'; }

				jQuery('.Rich_Web_Forms_Fields_Editing_Privacy').find('select[name=Rich_Web_Forms_FEditing_Privacy_Pos]').val(Rich_Web_Forms_Field_O2);
				jQuery('.Rich_Web_Forms_Fields_Editing_Privacy').find('select[name=Rich_Web_Forms_FEditing_Privacy_FPos]').val(Rich_Web_Forms_Field_O4);

				if(Rich_Web_Forms_Field_O3=='required')
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Privacy').find("input[name=Rich_Web_Forms_FEditing_Privacy_R]").attr("checked",true);
				}
				else
				{
					jQuery('.Rich_Web_Forms_Fields_Editing_Privacy').find("input[name=Rich_Web_Forms_FEditing_Privacy_R]").attr("checked",false);
				}

				Rich_Web_Forms_FC_EditCustom_Clicked();
				tinymce.get('Rich_Web_Forms_Fields_Editing_Privacy_ID').setContent(Rich_Web_Forms_Field_O1);
				jQuery('.Rich_Web_Forms_Fields_Editing_Privacy').attr('rel', Rich_Web_Forms_FC_Rel);
			}
			else if(Rich_Web_Forms_FC_Label=='Google Map')
			{
				jQuery('.Rich_Web_Forms_Fields_Editing_Map').fadeIn();

				var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FC_Rel.split('Rich_Web_Forms_Field_')[1];

				var Rich_Web_Forms_Field_O1=jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O2=jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O3=jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val();
 				var Rich_Web_Forms_Field_O4=jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val();
 				if(Rich_Web_Forms_Field_O3 == '')
 				{
 					Rich_Web_Forms_Field_O3 = '1';
 				}

				jQuery('.Rich_Web_Forms_Fields_Editing_Map').find('input[id=Rich_Web_Forms_FEditing_Map_Lat]').val(Rich_Web_Forms_Field_O1);
				jQuery('.Rich_Web_Forms_Fields_Editing_Map').find('input[id=Rich_Web_Forms_FEditing_Map_Long]').val(Rich_Web_Forms_Field_O2);
				jQuery('.Rich_Web_Forms_Fields_Editing_Map').find('input[id=Rich_Web_Forms_FEditing_Map_Zoom]').val(Rich_Web_Forms_Field_O3);
				jQuery('.Rich_Web_Forms_Fields_Editing_Map').find('span[id=Rich_Web_Forms_FEditing_Map_Zoom_Span]').html(Rich_Web_Forms_Field_O3);
				jQuery('.Rich_Web_Forms_Fields_Editing_Map').find('select[id=Rich_Web_Forms_FEditing_Map_Type]').val(Rich_Web_Forms_Field_O4);

				jQuery('.Rich_Web_Forms_Fields_Editing_Map').attr('rel', Rich_Web_Forms_FC_Rel);
			}
		}, 500);	
		Rich_Web_Forms_FC_EditUndo_Clicked();	
		Rich_Web_Forms_FC_EditSave_Clicked();
		Rich_Web_Forms_RangeSlider();	
	})
}
function Rich_Web_Forms_FC_EditUndo_Clicked()
{
	jQuery('.Rich_Web_Forms_FC_EditUndo').click(function(){
		jQuery('.Rich_Web_Forms_Fields_Editing').fadeOut(500);
		setTimeout(function(){				
			jQuery('.Rich_Web_Forms_Fields_Content').fadeIn();
		}, 500);
		if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Text'))
		{
			jQuery(this).parent().parent().find('input[type=text]').val('');
			jQuery(this).parent().parent().find('select').val('Left');
			jQuery("input[name=Rich_Web_Forms_FEditing_Text_T][value='Simple Text']").prop("checked",true);
			jQuery("input[name=Rich_Web_Forms_FEditing_Text_R]").prop("checked",false);
			jQuery("input[name=Rich_Web_Forms_FEditing_Text_A]").prop("checked",true);
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Textarea'))
		{
			jQuery(this).parent().parent().find('input[type=text]').val('');
			jQuery(this).parent().parent().find('select').val('Left');
			jQuery(this).parent().parent().find('#Rich_Web_Forms_FEditing_TA_H').val('80');
			jQuery(this).parent().parent().find('#Rich_Web_Forms_FEditing_TA_H_Span').html('80');
			jQuery("input[name=Rich_Web_Forms_FEditing_TA_R]").prop("checked",false);
			jQuery("input[name=Rich_Web_Forms_FEditing_TA_A]").prop("checked",true);
			jQuery("input[name=Rich_Web_Forms_FEditing_TA_ReS]").prop("checked",false);
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Select'))
		{
			jQuery(this).parent().parent().find('input[type=text]').val('');
			jQuery(this).parent().parent().find('select').val('Left');
			jQuery(this).parent().parent().find('.Rich_Web_Forms_Fields_Editing_Text_div3').html('');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Check'))
		{
			jQuery(this).parent().parent().find('input[type=text]').val('');
			jQuery(this).parent().parent().find('select').val('Left');
			jQuery("input[name=Rich_Web_Forms_FEditing_CB_A]").prop("checked",true);
			jQuery(this).parent().parent().find('#Rich_Web_Forms_FEditing_CB_CC').val(1);
			jQuery(this).parent().parent().find('#Rich_Web_Forms_FEditing_CB_CC_Span').html(1);
			jQuery(this).parent().parent().find('.Rich_Web_Forms_Fields_Editing_Text_div3').html('');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Radio'))
		{
			jQuery(this).parent().parent().find('input[type=text]').val('');
			jQuery(this).parent().parent().find('select').val('Left');
			jQuery("input[name=Rich_Web_Forms_FEditing_RB_R]").prop("checked",false);
			jQuery("input[name=Rich_Web_Forms_FEditing_RB_A]").prop("checked",true);
			jQuery(this).parent().parent().find('#Rich_Web_Forms_FEditing_RB_CC').val(1);
			jQuery(this).parent().parent().find('#Rich_Web_Forms_FEditing_RB_CC_Span').html(1);
			jQuery(this).parent().parent().find('.Rich_Web_Forms_Fields_Editing_Text_div3').html('');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_File'))
		{
			jQuery(this).parent().parent().find('input[type=text]').val('');
			jQuery(this).parent().parent().find('select').val('Left');
			jQuery("input[name=Rich_Web_Forms_FEditing_F_R]").prop("checked",false);
			jQuery(this).parent().parent().find('input[name=Rich_Web_Forms_FEditing_F_AT]').val('.jpg, .png, .gif, .xlsx, .pdf, .xml, .xmlx, .xls, .xtx');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Custom'))
		{
			tinymce.activeEditor.setContent('');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Email'))
		{
			jQuery(this).parent().parent().find('input[type=text]').val('');
			jQuery(this).parent().parent().find('select').val('Left');
			jQuery("input[name=Rich_Web_Forms_FEditing_E_R]").prop("checked",false);
			jQuery("input[name=Rich_Web_Forms_FEditing_E_A]").prop("checked",true);
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Button'))
		{
			jQuery(this).parent().parent().find('input[type=text]').val('');
			jQuery(this).parent().parent().find('select').val('Go to URL');
			jQuery("input[name=Rich_Web_Forms_FEditing_B_SRB]").prop("checked",false);
			jQuery(this).parent().parent().find('select').parent().find('label:nth-last-of-type(1)').fadeIn(500);
			jQuery(this).parent().parent().find('select').parent().find('input[type=text]').fadeIn(500);
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Divider'))
		{
			jQuery(this).parent().parent().find('#Rich_Web_Forms_FEditing_D_H').val(0);
			jQuery(this).parent().parent().find('#Rich_Web_Forms_FEditing_D_H_Span').html(0);
			jQuery(this).parent().parent().find('select').val('none');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Space'))
		{
			jQuery(this).parent().parent().find('#Rich_Web_Forms_FEditing_S_W').val(0);
			jQuery(this).parent().parent().find('#Rich_Web_Forms_FEditing_S_W_Span').html(0);
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Captcha'))
		{
			jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_Captcha_Theme').val('light');
			jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_Captcha_Size').val('normal');
			jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_Captcha_Type').val('audio');
			jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_Captcha_Pos').val('left');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_DatePicker'))
		{
			jQuery(this).parent().parent().find('input[type=text]').val('');
			jQuery(this).parent().parent().find('select').val('Left');
			jQuery("input[name=Rich_Web_Forms_FEditing_DateP_Cur]").prop("checked",true);
			jQuery("input[name=Rich_Web_Forms_FEditing_DateP_R]").prop("checked",false);
			jQuery("input[name=Rich_Web_Forms_FEditing_DateP_A]").prop("checked",true);
			jQuery("input[name=Rich_Web_Forms_FEditing_DateP_FT]").prop("checked",false);
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_TimePicker'))
		{
			jQuery(this).parent().parent().find('input[type=text]').val('');
			jQuery(this).parent().parent().find('select').val('Left');
			jQuery("input[name=Rich_Web_Forms_FEditing_TimeP_Cur]").prop("checked",true);
			jQuery("input[name=Rich_Web_Forms_FEditing_TimeP_R]").prop("checked",false);
			jQuery("input[name=Rich_Web_Forms_FEditing_TimeP_A]").prop("checked",true);
			jQuery("input[name=Rich_Web_Forms_FEditing_TimeP_FT]").prop("checked",false);
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Full_Name'))
		{
			jQuery(this).parent().parent().find('input[type=text]').val('');
			jQuery(this).parent().parent().find('select').val('Left');
			jQuery("input[name=Rich_Web_Forms_FEditing_FullN_R]").prop("checked",false);
			jQuery("input[name=Rich_Web_Forms_FEditing_FullN_A]").prop("checked",true);
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Phone'))
		{
			jQuery(this).parent().parent().find('input[type=text]').val('');
			jQuery(this).parent().parent().find('select').val('Left');
			jQuery("input[name=Rich_Web_Forms_FEditing_Phone_R]").prop("checked",false);
			jQuery("input[name=Rich_Web_Forms_FEditing_Phone_A]").prop("checked",true);
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Country'))
		{
			jQuery(this).parent().parent().find('input[type=text]').val('');
			jQuery(this).parent().parent().find('select').val('Left');
			jQuery("input[name=Rich_Web_Forms_FEditing_Country_A]").prop("checked",true);
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Privacy'))
		{
			tinymce.activeEditor.setContent('');
			jQuery(this).parent().parent().find('select').val('Left');
			jQuery("input[name=Rich_Web_Forms_FEditing_Privacy_R]").prop("checked",true);
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Map'))
		{
			jQuery('.Rich_Web_Forms_Fields_Editing_Map').find('input[id=Rich_Web_Forms_FEditing_Map_Lat]').val('');
			jQuery('.Rich_Web_Forms_Fields_Editing_Map').find('input[id=Rich_Web_Forms_FEditing_Map_Long]').val('');
			jQuery('.Rich_Web_Forms_Fields_Editing_Map').find('input[id=Rich_Web_Forms_FEditing_Map_Zoom]').val('1');
			jQuery('.Rich_Web_Forms_Fields_Editing_Map').find('select[id=Rich_Web_Forms_FEditing_Map_Type]').val('ROADMAP');
		}
	})
}
function Rich_Web_Forms_FC_EditSave_Clicked()
{
	jQuery('.Rich_Web_Forms_FC_EditSave').click(function(){
		jQuery('.Rich_Web_Forms_Fields_Editing').fadeOut(500);
		setTimeout(function(){				
			jQuery('.Rich_Web_Forms_Fields_Content').fadeIn();
		}, 500);
		if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Text'))
		{
			var Rich_Web_Forms_FEditing_Text_Lab=''; 
			var Rich_Web_Forms_FEditing_Text_Inp=''; 
			var Rich_Web_Forms_FEditing_Text_R=''; 
			var Rich_Web_Forms_FEditing_Text_Req=''; 
			var Rich_Web_Forms_FEditing_Text_A=''; 
			var Rich_Web_Forms_FEditing_Text_T='';
			var Rich_Web_Forms_FEditing_Text_L=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_Text_L]').val();
			var Rich_Web_Forms_FEditing_Text_P=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_Text_P]').val();
			var Rich_Web_Forms_FEditing_Text_LP=jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_Text_LP]').val();
			var Rich_Web_Forms_FEditing_Text_Rel=jQuery(this).parent().parent().attr('rel');
		
				jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_Text_T]").each(function(){
				if(jQuery(this).prop('checked'))
				{
					Rich_Web_Forms_FEditing_Text_T=jQuery(this).val();
				}
			})
				
			if(jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_Text_R]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_Text_R='required';
				Rich_Web_Forms_FEditing_Text_Req='*'
			}
			if(!jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_Text_A]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_Text_A='disabled';
			}
			var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FEditing_Text_Rel.split('Rich_Web_Forms_Field_')[1];
			
			jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Text_L);
			jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Text_P);
			jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Text_LP);
			jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Text_T);
			jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Text_R);
			jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Text_A);
			jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_FEditing_O_ID).val('');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Textarea'))
		{
			var Rich_Web_Forms_FEditing_TA_Lab=''; 
			var Rich_Web_Forms_FEditing_TA_Inp=''; 
			var Rich_Web_Forms_FEditing_TA_R=''; 
			var Rich_Web_Forms_FEditing_TA_Req=''; 
			var Rich_Web_Forms_FEditing_TA_A=''; 
			var Rich_Web_Forms_FEditing_TA_ReS='none'; 
			var Rich_Web_Forms_FEditing_TA_H=jQuery(this).parent().parent().find("input[id=Rich_Web_Forms_FEditing_TA_H]").val();
			var Rich_Web_Forms_FEditing_TA_L=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_TA_L]').val();
			var Rich_Web_Forms_FEditing_TA_P=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_TA_P]').val();
			var Rich_Web_Forms_FEditing_TA_LP=jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_TA_LP]').val();
			var Rich_Web_Forms_FEditing_TA_Rel=jQuery(this).parent().parent().attr('rel');
				
			if(jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_TA_R]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_TA_R='required';
				Rich_Web_Forms_FEditing_TA_Req='*'
			}
			if(!jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_TA_A]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_TA_A='disabled';
			}
			if(jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_TA_ReS]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_TA_ReS='vertical';
			}
			var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FEditing_TA_Rel.split('Rich_Web_Forms_Field_')[1];
			
			jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_TA_L);
			jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_TA_P);
			jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_TA_LP);
			jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_TA_H);
			jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_TA_R);
			jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_TA_A);
			jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_TA_ReS);
			jQuery('#Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_FEditing_O_ID).val('');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Select'))
		{
			var Rich_Web_Forms_FEditing_SM_L=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_SM_L]').val();
			var Rich_Web_Forms_FEditing_SM_P=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_SM_P]').val();
			var Rich_Web_Forms_FEditing_SM_LP=jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_SM_LP]').val();
			var Rich_Web_Forms_FEditing_SM_Rel=jQuery(this).parent().parent().attr('rel');
			
			var Rich_Web_Forms_FEditing_SM_Lab=''; 
			var Rich_Web_Forms_FEditing_SM_Inp=''; 
			var Rich_Web_Forms_FEditing_SM_Opt=new Array();
			
			jQuery(this).parent().parent().find('.Rich_Web_Forms_Fields_Editing_Text_div3').find('input[type=text]').each(function(){
				Rich_Web_Forms_FEditing_SM_Opt[Rich_Web_Forms_FEditing_SM_Opt.length]=jQuery(this).val();
			})
			var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FEditing_SM_Rel.split('Rich_Web_Forms_Field_')[1];

			jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_SM_L);
			jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_SM_P);
			jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_SM_LP);
			jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_SM_Opt.join('qwertyh'));
			jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_FEditing_O_ID).val('');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Check'))
		{
			var Rich_Web_Forms_FEditing_CB_L=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_CB_L]').val();
			var Rich_Web_Forms_FEditing_CB_LP=jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_CB_LP]').val();
			var Rich_Web_Forms_FEditing_CB_CC=jQuery(this).parent().parent().find('#Rich_Web_Forms_FEditing_CB_CC').val();
			var Rich_Web_Forms_FEditing_CB_Rel=jQuery(this).parent().parent().attr('rel');
			
			var Rich_Web_Forms_FEditing_CB_Lab=''; 
			var Rich_Web_Forms_FEditing_CB_Inp=''; 
			var Rich_Web_Forms_FEditing_CB_A=''; 
			var Rich_Web_Forms_FEditing_CB_Names=new Array();

			var Rich_Web_Forms_FEditing_CB_Opt=new Array();
			var Rich_Web_Forms_FEditing_CB_Chd=new Array();
			
			
			if(!jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_CB_A]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_CB_A='disabled';
			}

			jQuery(this).parent().parent().find('.Rich_Web_Forms_Fields_Editing_Text_div3').find('div').each(function(){
				Rich_Web_Forms_FEditing_CB_Opt[Rich_Web_Forms_FEditing_CB_Opt.length]=jQuery(this).find('input[type=text]').val();
				Rich_Web_Forms_FEditing_CB_Chd[Rich_Web_Forms_FEditing_CB_Chd.length]=jQuery(this).find('input[type=checkbox][class=Rich_Web_Forms_FC_EditChecks_Check]').attr('checked');
			})
			var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FEditing_CB_Rel.split('Rich_Web_Forms_Field_')[1];

			jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_CB_L);
			jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_CB_LP);
			jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_CB_A);
			jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_CB_CC);
			jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_CB_Opt.join('qwertyh'));
			jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_CB_Chd.join('qwertyh'));
			jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_FEditing_O_ID).val(''); 				
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Radio'))
		{
			var Rich_Web_Forms_FEditing_RB_L = jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_RB_L]').val();
			var Rich_Web_Forms_FEditing_RB_LP = jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_RB_LP]').val();
			var Rich_Web_Forms_FEditing_RB_CC = jQuery(this).parent().parent().find('#Rich_Web_Forms_FEditing_RB_CC').val();
			var Rich_Web_Forms_FEditing_RB_Rel = jQuery(this).parent().parent().attr('rel');
			
			var Rich_Web_Forms_FEditing_RB_Lab = ''; 
			var Rich_Web_Forms_FEditing_RB_Inp = ''; 
			var Rich_Web_Forms_FEditing_RB_A = ''; 

			var Rich_Web_Forms_FEditing_RB_Opt = new Array();
			var Rich_Web_Forms_FEditing_RB_Chd = new Array();
			
			if(!jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_RB_A]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_RB_A = 'disabled';
			}

			jQuery(this).parent().parent().find('.Rich_Web_Forms_Fields_Editing_Text_div3').find('div').each(function(){
				Rich_Web_Forms_FEditing_RB_Opt[Rich_Web_Forms_FEditing_RB_Opt.length]=jQuery(this).find('input[type=text]').val();
				Rich_Web_Forms_FEditing_RB_Chd[Rich_Web_Forms_FEditing_RB_Chd.length]=jQuery(this).find('input[type=checkbox][class=Rich_Web_Forms_FC_EditRadios_Check]').attr('checked');
			})
			var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FEditing_RB_Rel.split('Rich_Web_Forms_Field_')[1];

			jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_RB_L);
			jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_RB_LP);
			jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_RB_A);
			jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_RB_CC);
			jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_RB_Opt.join('qwertyh'));
			jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_RB_Chd.join('qwertyh'));
			jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_FEditing_O_ID).val('');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_File'))
		{
			var Rich_Web_Forms_FEditing_F_L=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_F_L]').val();
			var Rich_Web_Forms_FEditing_F_LP=jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_F_LP]').val();
			var Rich_Web_Forms_FEditing_F_FD=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_F_FD]').val();
			var Rich_Web_Forms_FEditing_F_AT=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_F_AT]').val();
			var Rich_Web_Forms_FEditing_F_Rel=jQuery(this).parent().parent().attr('rel');
			
			var Rich_Web_Forms_FEditing_F_Lab=''; 
			var Rich_Web_Forms_FEditing_F_Inp=''; 
			var Rich_Web_Forms_FEditing_F_R=''; 
			var Rich_Web_Forms_FEditing_F_Req=''; 				

			if(jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_F_R]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_F_R='required';
				Rich_Web_Forms_FEditing_F_Req='*';
			}
			var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FEditing_F_Rel.split('Rich_Web_Forms_Field_')[1];

			jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_F_L);
			jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_F_LP);
			jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_F_R);
			jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_F_FD);
			jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_F_AT);
			jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_FEditing_O_ID).val('');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Custom'))
		{
			var Rich_Web_Forms_FEditing_C_Rel=jQuery(this).parent().parent().attr('rel');				
			jQuery('#'+Rich_Web_Forms_FEditing_C_Rel).val(tinyMCE.activeEditor.getContent());

			var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FEditing_C_Rel.split('Rich_Web_Forms_Field_')[1];

			jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_FEditing_O_ID).val('');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Email'))
		{
			var Rich_Web_Forms_FEditing_E_Lab=''; 
			var Rich_Web_Forms_FEditing_E_Inp=''; 
			var Rich_Web_Forms_FEditing_E_R=''; 
			var Rich_Web_Forms_FEditing_E_Req=''; 
			var Rich_Web_Forms_FEditing_E_A=''; 
			
			var Rich_Web_Forms_FEditing_E_L=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_E_L]').val();
			var Rich_Web_Forms_FEditing_E_P=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_E_P]').val();
			var Rich_Web_Forms_FEditing_E_LP=jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_E_LP]').val();
			var Rich_Web_Forms_FEditing_E_Rel=jQuery(this).parent().parent().attr('rel');

			if(jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_E_R]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_E_R='required';
				Rich_Web_Forms_FEditing_E_Req='*';
			}
			if(!jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_E_A]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_E_A='disabled';
			}
			var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FEditing_E_Rel.split('Rich_Web_Forms_Field_')[1];

			jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_E_L);
			jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_E_P);
			jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_E_LP);
			jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_E_R);
			jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_E_A);
			jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_FEditing_O_ID).val('');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Button'))
		{
			var Rich_Web_Forms_FEditing_B_BT=jQuery(this).parent().parent().find('input[name=Rich_Web_Forms_FEditing_B_BT]').val();
			var Rich_Web_Forms_FEditing_B_RBT=jQuery(this).parent().parent().find('input[name=Rich_Web_Forms_FEditing_B_RBT]').val();
			var Rich_Web_Forms_FC_Edit_AAC=jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_B_AAC]').val();
			var Rich_Web_Forms_FEditing_B_Rel=jQuery(this).parent().parent().attr('rel');
			var Rich_Web_Forms_FEditing_B_URL='';
			var Rich_Web_Forms_FEditing_B_SRB='';
			var Rich_Web_Forms_FEditing_B_Inp='';
			var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FEditing_B_Rel.split('Rich_Web_Forms_Field_')[1];

			if(jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_B_SRB]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_B_SRB='show';
			}

			if(Rich_Web_Forms_FC_Edit_AAC=='Go to URL')
			{
				Rich_Web_Forms_FEditing_B_URL=jQuery(this).parent().parent().find('input[name=Rich_Web_Forms_FEditing_B_URL]').val();
			}
			var Rich_Web_Forms_FEditing_O_ID1=Rich_Web_Forms_FEditing_O_ID.split('_')[0];

			jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_B_BT);
			jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_B_RBT);
			jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FC_Edit_AAC);
			jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_B_URL);
			jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_B_SRB);
			jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_FEditing_O_ID).val('');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Divider'))
		{
			var Rich_Web_Forms_FEditing_D_H=jQuery(this).parent().parent().find('input[id=Rich_Web_Forms_FEditing_D_H]').val();
			var Rich_Web_Forms_FEditing_D_S=jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_D_S]').val();
			var Rich_Web_Forms_FEditing_D_Rel=jQuery(this).parent().parent().attr('rel');
			
			var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FEditing_D_Rel.split('Rich_Web_Forms_Field_')[1];

			jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_D_H);
			jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_D_S);
			jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_FEditing_O_ID).val('');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Space'))
		{
			var Rich_Web_Forms_FEditing_S_W=jQuery(this).parent().parent().find('input[id=Rich_Web_Forms_FEditing_S_W]').val();
			var Rich_Web_Forms_FEditing_S_Rel=jQuery(this).parent().parent().attr('rel');	

			var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FEditing_S_Rel.split('Rich_Web_Forms_Field_')[1];

			jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_S_W);
			jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_FEditing_O_ID).val('');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Captcha'))
		{
			var Rich_Web_Forms_FEditing_Captcha_Theme=jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_Captcha_Theme]').val();
			var Rich_Web_Forms_FEditing_Captcha_Size=jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_Captcha_Size]').val();
			var Rich_Web_Forms_FEditing_Captcha_Type=jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_Captcha_Type]').val();
			var Rich_Web_Forms_FEditing_Captcha_Pos=jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_Captcha_Pos]').val();
			var Rich_Web_Forms_FEditing_Captcha_Rel=jQuery(this).parent().parent().attr('rel');	

			var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FEditing_Captcha_Rel.split('Rich_Web_Forms_Field_')[1];

			jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Captcha_Theme);
			jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Captcha_Size);
			jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Captcha_Type);
			jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Captcha_Pos);
			jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_FEditing_O_ID).val('');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_DatePicker'))
		{
			var Rich_Web_Forms_FEditing_DateP_Lab=''; 
			var Rich_Web_Forms_FEditing_DateP_Inp=''; 
			var Rich_Web_Forms_FEditing_DateP_R=''; 
			var Rich_Web_Forms_FEditing_DateP_Req=''; 
			var Rich_Web_Forms_FEditing_DateP_A=''; 
			var Rich_Web_Forms_FEditing_DateP_Cur='';
			var Rich_Web_Forms_FEditing_DateP_FT='';
			var Rich_Web_Forms_FEditing_DateP_L=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_DateP_L]').val();
			var Rich_Web_Forms_FEditing_DateP_P=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_DateP_P]').val();
			var Rich_Web_Forms_FEditing_DateP_LP=jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_DateP_LP]').val();
			var Rich_Web_Forms_FEditing_DateP_Rel=jQuery(this).parent().parent().attr('rel');
		
			if(jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_DateP_Cur]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_DateP_Cur='current';
			}
			if(jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_DateP_R]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_DateP_R='required';
				Rich_Web_Forms_FEditing_DateP_Req='*'
			}
			if(!jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_DateP_A]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_DateP_A='disabled';
			}
			if(jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_DateP_FT]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_DateP_FT='FromTo';
			}
			var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FEditing_DateP_Rel.split('Rich_Web_Forms_Field_')[1];

			jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_DateP_L);
			jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_DateP_P);
			jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_DateP_LP);
			jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_DateP_Cur);
			jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_DateP_R);
			jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_DateP_A);
			jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_DateP_FT);
			jQuery('#Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_FEditing_O_ID).val('');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_TimePicker'))
		{
			var Rich_Web_Forms_FEditing_TimeP_Lab=''; 
			var Rich_Web_Forms_FEditing_TimeP_Inp=''; 
			var Rich_Web_Forms_FEditing_TimeP_R=''; 
			var Rich_Web_Forms_FEditing_TimeP_Req=''; 
			var Rich_Web_Forms_FEditing_TimeP_A=''; 
			var Rich_Web_Forms_FEditing_TimeP_Cur='';
			var Rich_Web_Forms_FEditing_TimeP_FT='';
			var Rich_Web_Forms_FEditing_TimeP_L=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_TimeP_L]').val();
			var Rich_Web_Forms_FEditing_TimeP_LP=jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_TimeP_LP]').val();
			var Rich_Web_Forms_FEditing_TimeP_Rel=jQuery(this).parent().parent().attr('rel');
		
			if(jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_TimeP_Cur]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_TimeP_Cur='current';
			}
			if(jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_TimeP_R]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_TimeP_R='required';
				Rich_Web_Forms_FEditing_TimeP_Req='*'
			}
			if(!jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_TimeP_A]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_TimeP_A='disabled';
			}
			if(jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_TimeP_FT]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_TimeP_FT='FromTo';
			}
			var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FEditing_TimeP_Rel.split('Rich_Web_Forms_Field_')[1];
						
			jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_TimeP_L);
			jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_TimeP_LP);
			jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_TimeP_Cur);
			jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_TimeP_R);
			jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_TimeP_A);
			jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_TimeP_FT);
			jQuery('#Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_FEditing_O_ID).val('');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Full_Name'))
		{
			var Rich_Web_Forms_FEditing_FullN_Lab=''; 
			var Rich_Web_Forms_FEditing_FullN_Inp=''; 
			var Rich_Web_Forms_FEditing_FullN_R=''; 
			var Rich_Web_Forms_FEditing_FullN_Req=''; 
			var Rich_Web_Forms_FEditing_FullN_A=''; 
			var Rich_Web_Forms_FEditing_FullN_L=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_FullN_L]').val();
			var Rich_Web_Forms_FEditing_FullN_P_1=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_FullN_P_1]').val();
			var Rich_Web_Forms_FEditing_FullN_LP=jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_FullN_LP]').val();
			var Rich_Web_Forms_FEditing_FullN_P_2=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_FullN_P_2]').val();

			var Rich_Web_Forms_FEditing_FullN_Rel=jQuery(this).parent().parent().attr('rel');
		
			if(jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_FullN_R]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_FullN_R='required';
				Rich_Web_Forms_FEditing_FullN_Req='*'
			}
			if(!jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_FullN_A]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_FullN_A='disabled';
			}
			var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FEditing_FullN_Rel.split('Rich_Web_Forms_Field_')[1];

			jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_FullN_L);
			jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_FullN_P_1);
			jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_FullN_LP);
			jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_FullN_P_2);
			jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_FullN_R);
			jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_FullN_A);
			jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_FEditing_O_ID).val('');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Phone'))
		{
			var Rich_Web_Forms_FEditing_Phone_Lab=''; 
			var Rich_Web_Forms_FEditing_Phone_Inp=''; 
			var Rich_Web_Forms_FEditing_Phone_R=''; 
			var Rich_Web_Forms_FEditing_Phone_Req=''; 
			var Rich_Web_Forms_FEditing_Phone_A=''; 
			var Rich_Web_Forms_FEditing_Phone_L=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_Phone_L]').val();
			var Rich_Web_Forms_FEditing_Phone_P=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_Phone_P]').val();
			var Rich_Web_Forms_FEditing_Phone_LP=jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_Phone_LP]').val();
			var Rich_Web_Forms_FEditing_Phone_Rel=jQuery(this).parent().parent().attr('rel');
		
			if(jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_Phone_R]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_Phone_R='required';
				Rich_Web_Forms_FEditing_Phone_Req='*'
			}
			if(!jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_Phone_A]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_Phone_A='disabled';
			}
			var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FEditing_Phone_Rel.split('Rich_Web_Forms_Field_')[1];

			jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Phone_L);
			jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Phone_P);
			jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Phone_LP);
			jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Phone_R);
			jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Phone_A);
			jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_FEditing_O_ID).val('');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Country'))
		{
			var Rich_Web_Forms_FEditing_Country_Lab=''; 
			var Rich_Web_Forms_FEditing_Country_Inp=''; 
			var Rich_Web_Forms_FEditing_Country_A=''; 
			var Rich_Web_Forms_FEditing_Country_L=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_Country_L]').val();
			var Rich_Web_Forms_FEditing_Country_P=jQuery(this).parent().parent().find('input[type=text][name=Rich_Web_Forms_FEditing_Country_P]').val();
			var Rich_Web_Forms_FEditing_Country_LP=jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_Country_LP]').val();
			var Rich_Web_Forms_FEditing_Country_Rel=jQuery(this).parent().parent().attr('rel');
		
			if(!jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_Country_A]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_Country_A='disabled';
			}
			var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FEditing_Country_Rel.split('Rich_Web_Forms_Field_')[1];

			jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Country_L);
			jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Country_P);
			jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Country_LP);
			jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Country_A);
			jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_FEditing_O_ID).val('');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Privacy'))
		{
			var Rich_Web_Forms_FEditing_C_Rel=jQuery(this).parent().parent().attr('rel');				

			var Rich_Web_Forms_FEditing_Privacy_Inp=''; 
			var Rich_Web_Forms_FEditing_Privacy_R=''; 
			var Rich_Web_Forms_FEditing_Privacy_P=jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_Privacy_Pos]').val();
			var Rich_Web_Forms_FEditing_Privacy_FP=jQuery(this).parent().parent().find('select[name=Rich_Web_Forms_FEditing_Privacy_FPos]').val();
			var Rich_Web_Forms_FEditing_Privacy_Cont=tinyMCE.activeEditor.getContent();
			var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FEditing_C_Rel.split('Rich_Web_Forms_Field_')[1];

			if(jQuery(this).parent().parent().find("input[name=Rich_Web_Forms_FEditing_Privacy_R]").prop("checked"))
			{
				Rich_Web_Forms_FEditing_Privacy_R='required';
			}

			jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Privacy_Cont);
			jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Privacy_P);
			jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Privacy_R);
			jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Privacy_FP);
			jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_FEditing_O_ID).val('');
		}
		else if(jQuery(this).parent().parent().hasClass('Rich_Web_Forms_Fields_Editing_Map'))
		{
			var Rich_Web_Forms_FEditing_C_Rel=jQuery(this).parent().parent().attr('rel');				

			var Rich_Web_Forms_FEditing_Map_Lat = jQuery('.Rich_Web_Forms_Fields_Editing_Map').find('input[id=Rich_Web_Forms_FEditing_Map_Lat]').val();
			var Rich_Web_Forms_FEditing_Map_Long = jQuery('.Rich_Web_Forms_Fields_Editing_Map').find('input[id=Rich_Web_Forms_FEditing_Map_Long]').val();
			var Rich_Web_Forms_FEditing_Map_Zoom = jQuery('.Rich_Web_Forms_Fields_Editing_Map').find('input[id=Rich_Web_Forms_FEditing_Map_Zoom]').val();
			var Rich_Web_Forms_FEditing_Map_Type = jQuery('.Rich_Web_Forms_Fields_Editing_Map').find('select[id=Rich_Web_Forms_FEditing_Map_Type]').val();
			var Rich_Web_Forms_FEditing_O_ID=Rich_Web_Forms_FEditing_C_Rel.split('Rich_Web_Forms_Field_')[1];

			jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Map_Lat);
			jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Map_Long);
			jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Map_Zoom);
			jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_FEditing_O_ID).val(Rich_Web_Forms_FEditing_Map_Type);
			jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_FEditing_O_ID).val('');
			jQuery('#Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_FEditing_O_ID).val('');
		}
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
function Rich_Web_Forms_FC_EditOption_Clicked()
{
	jQuery('.Rich_Web_Forms_FC_EditOption').click(function(){
		if(jQuery(this).parent().find(":input[type=text]").val())
		{
			jQuery(this).parent().parent().find('.Rich_Web_Forms_Fields_Editing_Text_div3').append('<div><input type="text" name="" value="'+jQuery(this).parent().find(":input[type=text]").val()+'"><i class="Rich_Web_Forms_FC_EditOption_Del rich_web rich_web-trash" aria-hidden="true"></i></div>');
			jQuery(this).parent().find(":input[type=text]").val('');
		}			
	})
}
function Rich_Web_Forms_FC_EditOption_Del_Clicked()
{
	jQuery('.Rich_Web_Forms_FC_EditOption_Del').click(function(){
		jQuery(this).parent().remove();
	})
}
function Rich_Web_Forms_FC_EditChecks_Clicked()
{
	jQuery('.Rich_Web_Forms_FC_EditChecks').click(function(){
		jQuery(this).parent().parent().find('.Rich_Web_Forms_Fields_Editing_Text_div3').append('<div><input type="text" name="" value="'+jQuery(this).parent().find(":input[type=text]").val()+'"><input type="checkbox" class="Rich_Web_Forms_FC_EditChecks_Check"><i class="Rich_Web_Forms_FC_EditChecks_Del rich_web rich_web-trash" aria-hidden="true"></i></div>');
		jQuery(this).parent().find(":input[type=text]").val('');
	})
}
function Rich_Web_Forms_FC_EditChecks_Del_Clicked()
{
	jQuery('.Rich_Web_Forms_FC_EditChecks_Del').click(function(){
		jQuery(this).parent().remove();
	})
}
function Rich_Web_Forms_FC_EditRadios_Clicked()
{
	jQuery('.Rich_Web_Forms_FC_EditRadios').click(function(){
		jQuery(this).parent().parent().find('.Rich_Web_Forms_Fields_Editing_Text_div3').append('<div><input type="text" name="" value="'+jQuery(this).parent().find(":input[type=text]").val()+'"><input type="checkbox" class="Rich_Web_Forms_FC_EditRadios_Check"><i class="Rich_Web_Forms_FC_EditRadios_Del rich_web rich_web-trash" aria-hidden="true"></i></div>');
		jQuery(this).parent().find(":input[type=text]").val('');
	})
}
function Rich_Web_Forms_FC_EditRadios_Del_Clicked()
{
	jQuery('.Rich_Web_Forms_FC_EditRadios_Del').click(function(){
		jQuery(this).parent().remove();
	})
}
function Rich_Web_Forms_FC_EditRadios_Check_Clicked()
{
	jQuery('.Rich_Web_Forms_FC_EditRadios_Check').click(function(){
		jQuery(this).parent().parent().find('.Rich_Web_Forms_FC_EditRadios_Check').attr('checked',false);
		jQuery(this).attr('checked', true);
	})
}
function Rich_Web_Forms_FC_EditCustom_Clicked()
{
	tinymce.init({
		selector: 'textarea',
		menubar: false,
		statusbar: false,
		height: 250,
		plugins: [
		    'advlist autolink lists link image charmap print preview hr',
		    'searchreplace wordcount code media ',
		    'insertdatetime media save table contextmenu directionality',
		    'paste textcolor colorpicker textpattern imagetools codesample'
		],
		toolbar1: "newdocument | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | formatselect fontselect fontsizeselect",
		toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink image media code | insertdatetime preview | forecolor backcolor",
		toolbar3: "table | hr | subscript superscript | charmap | print | codesample ",
		fontsize_formats: '8px 10px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px',
		font_formats: 'Abadi MT Condensed Light = abadi mt condensed light; Aharoni = aharoni; Aldhabi = aldhabi; Andalus = andalus; Angsana New = angsana new; AngsanaUPC = angsanaupc; Aparajita = aparajita; Arabic Typesetting = arabic typesetting; Arial = arial; Arial Black = arial black; Batang = batang; BatangChe = batangche; Browallia New = browallia new; BrowalliaUPC = browalliaupc; Calibri = calibri; Calibri Light = calibri light; Calisto MT = calisto mt; Cambria = cambria; Candara = candara; Century Gothic = century gothic; Comic Sans MS = comic sans ms; Consolas = consolas; Constantia = constantia; Copperplate Gothic = copperplate gothic; Copperplate Gothic Light = copperplate gothic light; Corbel = corbel; Cordia New = cordia new; CordiaUPC = cordiaupc; Courier New = courier new; DaunPenh = daunpenh; David = david; DFKai-SB = dfkai-sb; DilleniaUPC = dilleniaupc; DokChampa = dokchampa; Dotum = dotum; DotumChe = dotumche; Ebrima = ebrima; Estrangelo Edessa = estrangelo edessa; EucrosiaUPC = eucrosiaupc; Euphemia = euphemia; FangSong = fangsong; Franklin Gothic Medium = franklin gothic medium; FrankRuehl = frankruehl; FreesiaUPC = freesiaupc; Gabriola = gabriola; Gadugi = gadugi; Gautami = gautami; Georgia = georgia; Gisha = gisha; Gulim  = gulim; GulimChe = gulimche; Gungsuh = gungsuh; GungsuhChe = gungsuhche; Impact = impact; IrisUPC = irisupc; Iskoola Pota = iskoola pota; JasmineUPC = jasmineupc; KaiTi = kaiti; Kalinga = kalinga; Kartika = kartika; Khmer UI = khmer ui; KodchiangUPC = kodchiangupc; Kokila = kokila; Lao UI = lao ui; Latha = latha; Leelawadee = leelawadee; Levenim MT = levenim mt; LilyUPC = lilyupc; Lucida Console = lucida console; Lucida Handwriting Italic = lucida handwriting italic; Lucida Sans Unicode = lucida sans unicode; Malgun Gothic = malgun gothic; Mangal = mangal; Manny ITC = manny itc; Marlett = marlett; Meiryo = meiryo; Meiryo UI = meiryo ui; Microsoft Himalaya = microsoft himalaya; Microsoft JhengHei = microsoft jhenghei; Microsoft JhengHei UI = microsoft jhenghei ui; Microsoft New Tai Lue = microsoft new tai lue; Microsoft PhagsPa = microsoft phagspa; Microsoft Sans Serif = microsoft sans serif; Microsoft Tai Le = microsoft tai le; Microsoft Uighur = microsoft uighur; Microsoft YaHei = microsoft yahei; Microsoft YaHei UI = microsoft yahei ui; Microsoft Yi Baiti = microsoft yi baiti; MingLiU_HKSCS = mingliu_hkscs; MingLiU_HKSCS-ExtB = mingliu_hkscs-extb; Miriam = miriam; Mongolian Baiti = mongolian baiti; MoolBoran = moolboran; MS UI Gothic = ms ui gothic; MV Boli = mv boli; Myanmar Text = myanmar text; Narkisim = narkisim; Nirmala UI = nirmala ui; News Gothic MT = news gothic mt; NSimSun = nsimsun; Nyala = nyala; Palatino Linotype = palatino linotype; Plantagenet Cherokee = plantagenet cherokee; Raavi = raavi; Rod = rod; Sakkal Majalla = sakkal majalla; Segoe Print = segoe print; Segoe Script = segoe script; Segoe UI Symbol = segoe ui symbol; Shonar Bangla = shonar bangla; Shruti = shruti; SimHei = simhei; SimKai = simkai; Simplified Arabic = simplified arabic; SimSun = simsun; SimSun-ExtB = simsun-extb; Sylfaen = sylfaen; Tahoma = tahoma; Times New Roman = times new roman; Traditional Arabic = traditional arabic; Trebuchet MS = trebuchet ms; Tunga = tunga; Utsaah = utsaah; Vani = vani; Vijaya = vijaya'
	});
}
function Rich_Web_Forms_FC_Edit_AAC_Clicked()
{
	if(jQuery('.Rich_Web_Forms_FC_Edit_AAC').val()=='Go to URL')
	{
		jQuery('.Rich_Web_Forms_FC_Edit_AAC').parent().find('label:nth-last-of-type(1)').fadeIn(500);
		jQuery('.Rich_Web_Forms_FC_Edit_AAC').parent().find('input[type=text]').fadeIn(500);
	}
	else
	{
		jQuery('.Rich_Web_Forms_FC_Edit_AAC').parent().find('label:nth-last-of-type(1)').fadeOut(500);
		jQuery('.Rich_Web_Forms_FC_Edit_AAC').parent().find('input[type=text]').fadeOut(500);
	}
}
function Rich_Web_Forms_FC_Sortable()
{
	jQuery('#Rich_Web_Forms_Fields_Content').sortable({
		update: function(){
			jQuery(".Rich_Web_Forms_FC").each(function(){
				var Rich_Web_Forms_New_ID=jQuery('#Rich_Web_Forms_New_ID').val();
				jQuery(this).find('div[class=Rich_Web_Forms_FC_No]').find('span').html(parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FF]').attr('name', 'Rich_Web_Forms_Field_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FF]').attr('id', 'Rich_Web_Forms_Field_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FW]').attr('name', 'Rich_Web_Forms_Field_W_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FW]').attr('id', 'Rich_Web_Forms_Field_W_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FT]').attr('name', 'Rich_Web_Forms_Field_T_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FT]').attr('id', 'Rich_Web_Forms_Field_T_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO1]').attr('name', 'Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO1]').attr('id', 'Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO2]').attr('name', 'Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO2]').attr('id', 'Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO3]').attr('name', 'Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO3]').attr('id', 'Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO4]').attr('name', 'Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO4]').attr('id', 'Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO5]').attr('name', 'Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO5]').attr('id', 'Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO6]').attr('name', 'Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO6]').attr('id', 'Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO7]').attr('name', 'Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO7]').attr('id', 'Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO8]').attr('name', 'Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
				jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO8]').attr('id', 'Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
			});
		}
	})
}
function Rich_Web_Forms_FC_LabCopy_Clicked(num)
{
	var Rich_Web_Forms_New_ID=jQuery('#Rich_Web_Forms_New_ID').val();

	var Rich_Web_Forms_Field_T=jQuery('#Rich_Web_Forms_Field_'+num).find('input[type=text][class=Rich_Web_Forms_FT]').val();
	var Rich_Web_Forms_Field=jQuery('#Rich_Web_Forms_Field_'+num).find('input[type=text][class=Rich_Web_Forms_FF]').val();

	var Rich_Web_Forms_Field_O1=jQuery('#Rich_Web_Forms_Field_'+num).find('input[type=text][class=Rich_Web_Forms_FO1]').val();
	var Rich_Web_Forms_Field_O2=jQuery('#Rich_Web_Forms_Field_'+num).find('input[type=text][class=Rich_Web_Forms_FO2]').val();
	var Rich_Web_Forms_Field_O3=jQuery('#Rich_Web_Forms_Field_'+num).find('input[type=text][class=Rich_Web_Forms_FO3]').val();
	var Rich_Web_Forms_Field_O4=jQuery('#Rich_Web_Forms_Field_'+num).find('input[type=text][class=Rich_Web_Forms_FO4]').val();
	var Rich_Web_Forms_Field_O5=jQuery('#Rich_Web_Forms_Field_'+num).find('input[type=text][class=Rich_Web_Forms_FO5]').val();
	var Rich_Web_Forms_Field_O6=jQuery('#Rich_Web_Forms_Field_'+num).find('input[type=text][class=Rich_Web_Forms_FO6]').val();
	var Rich_Web_Forms_Field_O7=jQuery('#Rich_Web_Forms_Field_'+num).find('input[type=text][class=Rich_Web_Forms_FO7]').val();
	var Rich_Web_Forms_Field_O8=jQuery('#Rich_Web_Forms_Field_'+num).find('input[type=text][class=Rich_Web_Forms_FO8]').val();

	jQuery('#Rich_Web_Forms_Field_'+num).after('<div class="Rich_Web_Forms_FC" id="Rich_Web_Forms_Field_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'"><div class="Rich_Web_Forms_FC_No"><span>'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'</span></div><div class="Rich_Web_Forms_FC_C"><span class="Rich_Web_Forms_FC_C_Span" data-type="minus" onclick="Rich_Web_Forms_FC_C_Span_Clicked('+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+')">-</span><span class="Rich_Web_Forms_FC_C_Span" data-type="plus" onclick="Rich_Web_Forms_FC_C_Span_Clicked('+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+')">+</span></div><div class="Rich_Web_Forms_FC_Lab"><label>1/1</label><label>'+Rich_Web_Forms_Field_T+'</label><input type="text" style="display:none" class="Rich_Web_Forms_FF" id="Rich_Web_Forms_Field_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value=""><input type="text" style="display:none" class="Rich_Web_Forms_FW" id="Rich_Web_Forms_Field_W_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_W_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value="100%"><input type="text" style="display:none" class="Rich_Web_Forms_FT" id="Rich_Web_Forms_Field_T_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_T_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value="'+Rich_Web_Forms_Field_T+'"><input type="text" style="display:none" class="Rich_Web_Forms_FO1" id="Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value=""><input type="text" style="display:none" class="Rich_Web_Forms_FO2" id="Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value=""><input type="text" style="display:none" class="Rich_Web_Forms_FO3" id="Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value=""><input type="text" style="display:none" class="Rich_Web_Forms_FO4" id="Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value=""><input type="text" style="display:none" class="Rich_Web_Forms_FO5" id="Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value=""><input type="text" style="display:none" class="Rich_Web_Forms_FO6" id="Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value=""><input type="text" style="display:none" class="Rich_Web_Forms_FO7" id="Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value=""><input type="text" style="display:none" class="Rich_Web_Forms_FO8" id="Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" name="Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+'" value=""><i class="Rich_Web_Forms_FC_LabEdit rich_web rich_web-pencil" aria-hidden="true"></i><i class="Rich_Web_Forms_FC_LabCopy rich_web rich_web-files-o" aria-hidden="true" onclick="Rich_Web_Forms_FC_LabCopy_Clicked('+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+')"></i><i class="Rich_Web_Forms_FC_LabRemove rich_web rich_web-trash" aria-hidden="true" onclick="Rich_Web_Forms_FC_LabRemove_Clicked('+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)+')"></i></div></div>');

	if(jQuery('#Rich_Web_Forms_Field_'+num).find('.Rich_Web_Forms_FC_Lab').find('label').html()=='1/1')
	{
		var Width='100%';
		var Width1='1/1';
		var Width2='100%';		
	}
	else
	{
		var Width='50%';
		var Width1='1/2';
		var Width2='49%';
	}
	jQuery('#Rich_Web_Forms_Field_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)).val(Rich_Web_Forms_Field);
	jQuery('#Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)).val(Rich_Web_Forms_Field_O1);
	jQuery('#Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)).val(Rich_Web_Forms_Field_O2);
	jQuery('#Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)).val(Rich_Web_Forms_Field_O3);
	jQuery('#Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)).val(Rich_Web_Forms_Field_O4);
	jQuery('#Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)).val(Rich_Web_Forms_Field_O5);
	jQuery('#Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)).val(Rich_Web_Forms_Field_O6);
	jQuery('#Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)).val(Rich_Web_Forms_Field_O7);
	jQuery('#Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_New_ID+'_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)).val(Rich_Web_Forms_Field_O8);

	jQuery('#Rich_Web_Forms_Field_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)).css('width', Width);
	jQuery('#Rich_Web_Forms_Field_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)).find('input[type=text][class=Rich_Web_Forms_FW]').val(Width2);
	jQuery('#Rich_Web_Forms_Field_'+parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1)).find('.Rich_Web_Forms_FC_Lab').find('label:first-child').html(Width1);

	Rich_Web_Forms_FC_LabEdit_Clicked();
	jQuery('#Rich_Web_Forms_New_Co').val(parseInt(parseInt(jQuery('#Rich_Web_Forms_New_Co').val())+1));
	jQuery(".Rich_Web_Forms_FC").each(function(){
		var Rich_Web_Forms_New_ID=jQuery('#Rich_Web_Forms_New_ID').val();
		jQuery(this).find('div[class=Rich_Web_Forms_FC_No]').find('span').html(parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FF]').attr('name', 'Rich_Web_Forms_Field_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FF]').attr('id', 'Rich_Web_Forms_Field_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FW]').attr('name', 'Rich_Web_Forms_Field_W_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FW]').attr('id', 'Rich_Web_Forms_Field_W_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FT]').attr('name', 'Rich_Web_Forms_Field_T_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FT]').attr('id', 'Rich_Web_Forms_Field_T_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO1]').attr('name', 'Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO1]').attr('id', 'Rich_Web_Forms_Field_O1_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO2]').attr('name', 'Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO2]').attr('id', 'Rich_Web_Forms_Field_O2_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO3]').attr('name', 'Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO3]').attr('id', 'Rich_Web_Forms_Field_O3_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO4]').attr('name', 'Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO4]').attr('id', 'Rich_Web_Forms_Field_O4_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO5]').attr('name', 'Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO5]').attr('id', 'Rich_Web_Forms_Field_O5_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO6]').attr('name', 'Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO6]').attr('id', 'Rich_Web_Forms_Field_O6_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO7]').attr('name', 'Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO7]').attr('id', 'Rich_Web_Forms_Field_O7_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO8]').attr('name', 'Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
		jQuery(this).find('input[type=text][class=Rich_Web_Forms_FO8]').attr('id', 'Rich_Web_Forms_Field_O8_'+Rich_Web_Forms_New_ID+'_'+(parseInt(parseInt(jQuery(this).index())+1)));
	});
}