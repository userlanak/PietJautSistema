<?php
	if(!defined('ABSPATH')) exit;
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<script type="text/javascript">
	function Rich_Web_Forms_Added_Option()
	{
		jQuery('.Rich_Web_Forms_Content_Data1_Option').css('display','none');
		jQuery('.Rich_Web_Forms_Add_Option').addClass('Rich_Web_Forms_Add_OptionAnim');
		jQuery('.Rich_Web_Forms_Content_Data2_Option').css('display','block');
		jQuery('.Rich_Web_Forms_Save_Option').addClass('Rich_Web_Forms_Save_OptionAnim');
		jQuery('.Rich_Web_Forms_Cancel_Option').addClass('Rich_Web_Forms_Cancel_OptionAnim');

		Rich_Web_Forms_Options_Message();
		tinymce.get('Rich_Web_Forms_O_21').setContent('');
		tinymce.get('Rich_Web_Forms_O_22').setContent('');
	}
	function Rich_Web_Forms_Canceled_Option()
	{
		location.reload();
	}
	function Rich_Web_Forms_Edit_Option(Rich_Web_Forms_O_ID)
	{
		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'Rich_Web_Forms_Edit_Option', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Rich_Web_Forms_O_ID, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			var arr=Array();
			var spl=response.split('=>');
			for(var i=3;i<spl.length;i++){ arr[arr.length]=spl[i].split('[')[0].trim(); }
			arr[arr.length-1]=arr[arr.length-1].split(')')[0].trim();
			if(arr[5]=='on'){ arr[5]=true ;}else{ arr[5]=false ;}
			if(arr[15]=='on'){ arr[15]=true ;}else{ arr[15]=false ;}
			if(arr[16]=='on'){ arr[16]=true ;}else{ arr[16]=false ;}

			jQuery('#Rich_Web_Forms_O_1').val(arr[0]); jQuery('#Rich_Web_Forms_O_2').val(arr[1]); jQuery('#Rich_Web_Forms_O_3').val(arr[2]); jQuery('#Rich_Web_Forms_O_4').val(arr[3]); jQuery('#Rich_Web_Forms_O_5').val(arr[4]); jQuery('#Rich_Web_Forms_O_6').attr('checked',arr[5]); jQuery('#Rich_Web_Forms_O_7').val(arr[6]); jQuery('#Rich_Web_Forms_O_8').val(arr[7]); jQuery('#Rich_Web_Forms_O_9').val(arr[8]); jQuery('#Rich_Web_Forms_O_10').val(arr[9]); jQuery('#Rich_Web_Forms_O_11').val(arr[10]); jQuery('#Rich_Web_Forms_O_12').val(arr[11]); jQuery('#Rich_Web_Forms_O_16').attr('checked',arr[15]); jQuery('#Rich_Web_Forms_O_17').attr('checked',arr[16]); jQuery('#Rich_Web_Forms_O_18').val(arr[17]); jQuery('#Rich_Web_Forms_O_19').val(arr[18]); jQuery('#Rich_Web_Forms_O_20').val(arr[19]); tinymce.get('Rich_Web_Forms_O_21').setContent(arr[20]); tinymce.get('Rich_Web_Forms_O_22').setContent(arr[21]);
		})
		Rich_Web_Forms_Options_Message();
		jQuery('#Rich_Web_Forms_Upd_Option_ID').val(Rich_Web_Forms_O_ID);
		jQuery('.Rich_Web_Forms_Content_Data1_Option').css('display','none');
		jQuery('.Rich_Web_Forms_Add_Option').addClass('Rich_Web_Forms_Add_OptionAnim');
		jQuery('.Rich_Web_Forms_Content_Data2_Option').css('display','block');
		jQuery('.Rich_Web_Forms_Update_Option').addClass('Rich_Web_Forms_Save_OptionAnim');
		jQuery('.Rich_Web_Forms_Cancel_Option').addClass('Rich_Web_Forms_Cancel_OptionAnim');
	}
	function Rich_Web_Forms_Delete_Option(Rich_Web_Forms_O_ID)
	{
		var RWFRFO = Rich_Web_Forms_O_ID;
		jQuery('.Rich_Web_Forms_Fixed_Div').fadeIn();	
		jQuery('.Rich_Web_Forms_Absolute_Div').fadeIn();

		jQuery('.Rich_Web_Forms_Relative_No').click(function(){
			jQuery('.Rich_Web_Forms_Fixed_Div').fadeOut();	
			jQuery('.Rich_Web_Forms_Absolute_Div').fadeOut();
			RWFRFO = null;
		})
		jQuery('.Rich_Web_Forms_Relative_Yes').click(function(){
			if(RWFRFO != null)
			{
				jQuery('.Rich_Web_Forms_Fixed_Div').fadeOut();	
				jQuery('.Rich_Web_Forms_Absolute_Div').fadeOut();
				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'Rich_Web_Forms_Del_Option', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: Rich_Web_Forms_O_ID, // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					location.reload();
				})
			}
			RWFRFO = null;			
		})		
	}
	function Rich_Web_Forms_Copy_Option(Rich_Web_Forms_O_ID)
	{
		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'Rich_Web_Forms_Copy_Option', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Rich_Web_Forms_O_ID, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			location.reload();
		})
	}
	function Rich_Web_Forms_Options_Message()
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
</script>	