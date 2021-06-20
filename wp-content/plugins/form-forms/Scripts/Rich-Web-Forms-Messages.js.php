<?php
	if(!defined('ABSPATH')) exit;
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		Rich_Web_Forms_Message_Img();
		Rich_Web_Forms_Message_Mes();
		Rich_Web_Forms_Message_Add_Em();
		jQuery('#Rich_Web_Forms_Message_Hid_Email').val(jQuery('#Rich_Web_Forms_Message_Hid_Email').val().substr(0,jQuery('#Rich_Web_Forms_Message_Hid_Email').val().length-1));		
	})
	function Rich_Web_Forms_Message_Mes()
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
	function Rich_Web_Forms_Message_Img()
	{
		jQuery('.Rich_Web_Forms_Message_Image').click(function(){
			jQuery(this).parent().parent().remove();
			var Rich_Web_Forms_Message_Hid_Email=jQuery('#Rich_Web_Forms_Message_Hid_Email').val();
			var Rich_Web_Forms_Message_Del_Email=jQuery(this).parent().find('span').html();
			var Rich_Web_Forms_Message_Hid_Email_Spl=Rich_Web_Forms_Message_Hid_Email.split(',');
			var Rich_Web_Forms_Message_Del_Email_ind = Rich_Web_Forms_Message_Hid_Email_Spl.indexOf(Rich_Web_Forms_Message_Del_Email);
			Rich_Web_Forms_Message_Hid_Email_Spl.splice(Rich_Web_Forms_Message_Del_Email_ind, 1);

			jQuery('#Rich_Web_Forms_Message_Hid_Email').val(Rich_Web_Forms_Message_Hid_Email_Spl);
		})
	}
	function Rich_Web_Forms_Message_Add_Em()
	{
		jQuery('.Rich_Web_Forms_Message_Add').click(function(){
			var Rich_Web_Forms_Message_Hid_Src=jQuery('#Rich_Web_Forms_Message_Hid_Src').val();
			jQuery('.Rich_Web_Forms_Content_Table_Message5').append('<tr><td><span>'+jQuery('#Rich_Web_Forms_Message_Add_Email').val()+'</span><img class="Rich_Web_Forms_Message_Image" src="'+Rich_Web_Forms_Message_Hid_Src+'"></td></tr>');
			jQuery('#Rich_Web_Forms_Message_Hid_Email').val(jQuery('#Rich_Web_Forms_Message_Hid_Email').val()+','+jQuery('#Rich_Web_Forms_Message_Add_Email').val());
			jQuery('#Rich_Web_Forms_Message_Add_Email').val('');
			Rich_Web_Forms_Message_Img();
		})
	}
</script>	