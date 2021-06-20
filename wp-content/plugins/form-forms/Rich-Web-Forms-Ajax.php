<?php	
	// Admin page
	add_action( 'wp_ajax_Rich_Web_Forms_Del', 'Rich_Web_Forms_Del_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Forms_Del', 'Rich_Web_Forms_Del_Callback' );

	function Rich_Web_Forms_Del_Callback()
	{
		$Rich_Web_Forms_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name2  = $wpdb->prefix . "rich_web_forms_manager";
		$table_name3  = $wpdb->prefix . "rich_web_forms_fields";
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name2 WHERE id=%d", $Rich_Web_Forms_ID));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name3 WHERE Forms_ID=%d", $Rich_Web_Forms_ID));
		die();
	}

	add_action( 'wp_ajax_Rich_Web_Forms_Edit1', 'Rich_Web_Forms_Edit1_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Forms_Edit1', 'Rich_Web_Forms_Edit1_Callback' );

	function Rich_Web_Forms_Edit1_Callback()
	{
		$Rich_Web_Forms_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name2  = $wpdb->prefix . "rich_web_forms_manager";
		$Rich_Web_Forms_Dat=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id=%d", $Rich_Web_Forms_ID));
		print_r($Rich_Web_Forms_Dat);
		die();
	}

	add_action( 'wp_ajax_Rich_Web_Forms_Edit2', 'Rich_Web_Forms_Edit2_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Forms_Edit2', 'Rich_Web_Forms_Edit2_Callback' );

	function Rich_Web_Forms_Edit2_Callback()
	{
		$Rich_Web_Forms_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name3  = $wpdb->prefix . "rich_web_forms_fields";
		$Rich_Web_Forms_Dat=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE Forms_ID=%d order by id", $Rich_Web_Forms_ID));
		print_r($Rich_Web_Forms_Dat);
		die();
	}

	add_action( 'wp_ajax_Rich_Web_Forms_Copy', 'Rich_Web_Forms_Copy_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Forms_Copy', 'Rich_Web_Forms_Copy_Callback' );

	function Rich_Web_Forms_Copy_Callback()
	{
		$Rich_Web_Forms_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name1  = $wpdb->prefix . "rich_web_forms_id";
		$table_name2  = $wpdb->prefix . "rich_web_forms_manager";
		$table_name3  = $wpdb->prefix . "rich_web_forms_fields";

		$Rich_Web_Forms_Dat=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id=%d", $Rich_Web_Forms_ID));
		$Rich_Web_Forms_Dat1=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE Forms_ID=%d order by id", $Rich_Web_Forms_ID));

		$Rich_Web_Forms_IDs=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE id>%d order by id desc limit 1",0));
		$Rich_Web_Forms_IDs_New=$Rich_Web_Forms_IDs[0]->Forms_ID + 1;
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, Forms_ID) VALUES (%d, %d)", '', $Rich_Web_Forms_IDs_New));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Forms_name, Forms_theme, Forms_Fields_count, Forms_option) VALUES (%d, %s, %s, %d, %s)", '', $Rich_Web_Forms_Dat[0]->Forms_name, $Rich_Web_Forms_Dat[0]->Forms_theme, $Rich_Web_Forms_Dat[0]->Forms_Fields_count, $Rich_Web_Forms_Dat[0]->Forms_option));
		$Rich_Web_Forms_Fields_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id>%d order by id desc limit 1",0));

		for($i = 0; $i < $Rich_Web_Forms_Dat[0]->Forms_Fields_count; $i++)
		{			
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, Forms_ID, Forms_Fields, Forms_Fields_Width, Forms_Fields_Type, Rich_Web_Forms_Fields_O1, Rich_Web_Forms_Fields_O2, Rich_Web_Forms_Fields_O3, Rich_Web_Forms_Fields_O4, Rich_Web_Forms_Fields_O5, Rich_Web_Forms_Fields_O6, Rich_Web_Forms_Fields_O7, Rich_Web_Forms_Fields_O8) VALUES (%d, %d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Rich_Web_Forms_Fields_ID[0]->id, $Rich_Web_Forms_Dat1[$i]->Forms_Fields, $Rich_Web_Forms_Dat1[$i]->Forms_Fields_Width, $Rich_Web_Forms_Dat1[$i]->Forms_Fields_Type, $Rich_Web_Forms_Dat1[$i]->Rich_Web_Forms_Fields_O1, $Rich_Web_Forms_Dat1[$i]->Rich_Web_Forms_Fields_O2, $Rich_Web_Forms_Dat1[$i]->Rich_Web_Forms_Fields_O3, $Rich_Web_Forms_Dat1[$i]->Rich_Web_Forms_Fields_O4, $Rich_Web_Forms_Dat1[$i]->Rich_Web_Forms_Fields_O5, $Rich_Web_Forms_Dat1[$i]->Rich_Web_Forms_Fields_O6, $Rich_Web_Forms_Dat1[$i]->Rich_Web_Forms_Fields_O7, $Rich_Web_Forms_Dat1[$i]->Rich_Web_Forms_Fields_O8));
		}
		die();
	}
	// Theme page
	add_action( 'wp_ajax_Rich_Web_Forms_Del_Theme', 'Rich_Web_Forms_Del_Theme_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Forms_Del_Theme', 'Rich_Web_Forms_Del_Theme_Callback' );

	function Rich_Web_Forms_Del_Theme_Callback()
	{
		$Rich_Web_Forms_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name4 = $wpdb->prefix . "rich_web_forms_themes1";
		$table_name5 = $wpdb->prefix . "rich_web_forms_themes2";
		$table_name11 = $wpdb->prefix . "rich_web_forms_themes3";

		$wpdb->query($wpdb->prepare("DELETE FROM $table_name4 WHERE id=%d", $Rich_Web_Forms_ID));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name5 WHERE id=%d", $Rich_Web_Forms_ID));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name11 WHERE id=%d", $Rich_Web_Forms_ID));
		die();
	}

	add_action( 'wp_ajax_Rich_Web_Forms_Edit_Theme1', 'Rich_Web_Forms_Edit_Theme1_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Forms_Edit_Theme1', 'Rich_Web_Forms_Edit_Theme1_Callback' );

	function Rich_Web_Forms_Edit_Theme1_Callback()
	{
		$Rich_Web_Forms_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name4 = $wpdb->prefix . "rich_web_forms_themes1";
		$Rich_Web_Forms_Dat=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id=%d", $Rich_Web_Forms_ID));
		print_r($Rich_Web_Forms_Dat);
		die();
	}

	add_action( 'wp_ajax_Rich_Web_Forms_Edit_Theme2', 'Rich_Web_Forms_Edit_Theme2_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Forms_Edit_Theme2', 'Rich_Web_Forms_Edit_Theme2_Callback' );

	function Rich_Web_Forms_Edit_Theme2_Callback()
	{  
		$Rich_Web_Forms_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name5 = $wpdb->prefix . "rich_web_forms_themes2";
		$Rich_Web_Forms_Dat=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE id=%d", $Rich_Web_Forms_ID));
		print_r($Rich_Web_Forms_Dat);
		die();
	}

	add_action( 'wp_ajax_Rich_Web_Forms_Edit_Theme3', 'Rich_Web_Forms_Edit_Theme3_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Forms_Edit_Theme3', 'Rich_Web_Forms_Edit_Theme3_Callback' );

	function Rich_Web_Forms_Edit_Theme3_Callback()
	{  
		$Rich_Web_Forms_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name11 = $wpdb->prefix . "rich_web_forms_themes3";
		$Rich_Web_Forms_Dat=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name11 WHERE id=%d", $Rich_Web_Forms_ID));
		print_r($Rich_Web_Forms_Dat);
		die();
	}

	add_action( 'wp_ajax_Rich_Web_Forms_Copy_Theme', 'Rich_Web_Forms_Copy_Theme_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Forms_Copy_Theme', 'Rich_Web_Forms_Copy_Theme_Callback' );

	function Rich_Web_Forms_Copy_Theme_Callback()
	{  
		$Rich_Web_Forms_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name4  = $wpdb->prefix . "rich_web_forms_themes1";
		$table_name5  = $wpdb->prefix . "rich_web_forms_themes2";
		$table_name11 = $wpdb->prefix . "rich_web_forms_themes3";
		$Rich_Web_Forms_Dat1 = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id=%d", $Rich_Web_Forms_ID));
		$Rich_Web_Forms_Dat2 = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE id=%d", $Rich_Web_Forms_ID));
		$Rich_Web_Forms_Dat3 = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name11 WHERE id=%d", $Rich_Web_Forms_ID));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, Rich_Web_Forms_T_T, Rich_Web_Forms_T_BgT, Rich_Web_Forms_T_BgC, Rich_Web_Forms_T_BgC2, Rich_Web_Forms_T_BW, Rich_Web_Forms_T_BS, Rich_Web_Forms_T_BC, Rich_Web_Forms_T_BR, Rich_Web_Forms_T_BoxShShow, Rich_Web_Forms_T_BoxShType, Rich_Web_Forms_T_BoxSh, Rich_Web_Forms_T_BoxShC, Rich_Web_Forms_T_LFS, Rich_Web_Forms_T_LFF, Rich_Web_Forms_T_LC, Rich_Web_Forms_T_LRC, Rich_Web_Forms_T_LEC, Rich_Web_Forms_T_LBgC, Rich_Web_Forms_T_TBHBg, Rich_Web_Forms_T_TBBgC, Rich_Web_Forms_T_TBBW, Rich_Web_Forms_T_TBBC, Rich_Web_Forms_T_TBBR, Rich_Web_Forms_T_TBFS, Rich_Web_Forms_T_TBC, Rich_Web_Forms_T_TAHBg, Rich_Web_Forms_T_TABgC, Rich_Web_Forms_T_TABW, Rich_Web_Forms_T_TABC, Rich_Web_Forms_T_TABR, Rich_Web_Forms_T_TAFS, Rich_Web_Forms_T_TAC, Rich_Web_Forms_T_SMHBg, Rich_Web_Forms_T_SMBgC, Rich_Web_Forms_T_SMBW, Rich_Web_Forms_T_SMBC, Rich_Web_Forms_T_SMBR, Rich_Web_Forms_T_SMFS, Rich_Web_Forms_T_SMC, Rich_Web_Forms_T_CBS, Rich_Web_Forms_T_CBT, Rich_Web_Forms_T_CBBgC, Rich_Web_Forms_T_CBBC, Rich_Web_Forms_T_CBHBgC, Rich_Web_Forms_T_CBHBC, Rich_Web_Forms_T_CBCBgC, Rich_Web_Forms_T_CBCBC, Rich_Web_Forms_T_CBCC, Rich_Web_Forms_T_RBS, Rich_Web_Forms_T_RBT, Rich_Web_Forms_T_RBBgC, Rich_Web_Forms_T_LBR, Rich_Web_Forms_T_LBC) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_T, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_BgT, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_BgC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_BgC2, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_BW, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_BS, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_BC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_BR, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_BoxShShow, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_BoxShType, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_BoxSh, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_BoxShC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_LFS, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_LFF, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_LC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_LRC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_LEC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_LBgC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_TBHBg, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_TBBgC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_TBBW, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_TBBC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_TBBR, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_TBFS, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_TBC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_TAHBg, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_TABgC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_TABW, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_TABC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_TABR, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_TAFS, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_TAC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_SMHBg, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_SMBgC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_SMBW, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_SMBC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_SMBR, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_SMFS, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_SMC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_CBS, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_CBT, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_CBBgC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_CBBC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_CBHBgC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_CBHBC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_CBCBgC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_CBCBC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_CBCC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_RBS, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_RBT, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_RBBgC, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_LBR, $Rich_Web_Forms_Dat1[0]->Rich_Web_Forms_T_LBC));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name5 (id, Rich_Web_Forms_T_RBBC, Rich_Web_Forms_T_RBHBgC, Rich_Web_Forms_T_RBHBC, Rich_Web_Forms_T_RBCBgC, Rich_Web_Forms_T_RBCBC, Rich_Web_Forms_T_RBCC, Rich_Web_Forms_T_FUBgC, Rich_Web_Forms_T_FUBW, Rich_Web_Forms_T_FUBC, Rich_Web_Forms_T_FUBR, Rich_Web_Forms_T_FUTC, Rich_Web_Forms_T_FUFS, Rich_Web_Forms_T_FUIT, Rich_Web_Forms_T_FUIA, Rich_Web_Forms_T_FUIFS, Rich_Web_Forms_T_FUBA, Rich_Web_Forms_T_FUHBgC, Rich_Web_Forms_T_FUHTC, Rich_Web_Forms_T_EBHBg, Rich_Web_Forms_T_EBBgC, Rich_Web_Forms_T_EBBW, Rich_Web_Forms_T_EBBC, Rich_Web_Forms_T_EBBR, Rich_Web_Forms_T_EBFS, Rich_Web_Forms_T_EBC, Rich_Web_Forms_T_SBBgC, Rich_Web_Forms_T_SBBW, Rich_Web_Forms_T_SBBC, Rich_Web_Forms_T_SBBR, Rich_Web_Forms_T_SBBA, Rich_Web_Forms_T_SBFS, Rich_Web_Forms_T_SBC, Rich_Web_Forms_T_SBIT, Rich_Web_Forms_T_SBIA, Rich_Web_Forms_T_SBIFS, Rich_Web_Forms_T_SBHBgC, Rich_Web_Forms_T_SBHC, Rich_Web_Forms_T_ReBBgC, Rich_Web_Forms_T_ReBBW, Rich_Web_Forms_T_ReBBC, Rich_Web_Forms_T_ReBBR, Rich_Web_Forms_T_ReBBA, Rich_Web_Forms_T_ReBFS, Rich_Web_Forms_T_ReBC, Rich_Web_Forms_T_ReBIT, Rich_Web_Forms_T_ReBIA, Rich_Web_Forms_T_ReBIFS, Rich_Web_Forms_T_ReBHBgC, Rich_Web_Forms_T_ReBHC, Rich_Web_Forms_T_DC, Rich_Web_Forms_T_W, Rich_Web_Forms_T_Pos) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_RBBC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_RBHBgC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_RBHBC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_RBCBgC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_RBCBC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_RBCC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_FUBgC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_FUBW, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_FUBC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_FUBR, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_FUTC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_FUFS, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_FUIT, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_FUIA, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_FUIFS, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_FUBA, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_FUHBgC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_FUHTC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_EBHBg, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_EBBgC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_EBBW, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_EBBC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_EBBR, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_EBFS, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_EBC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_SBBgC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_SBBW, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_SBBC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_SBBR, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_SBBA, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_SBFS, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_SBC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_SBIT, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_SBIA, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_SBIFS, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_SBHBgC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_SBHC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_ReBBgC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_ReBBW, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_ReBBC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_ReBBR, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_ReBBA, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_ReBFS, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_ReBC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_ReBIT, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_ReBIA, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_ReBIFS, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_ReBHBgC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_ReBHC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_DC, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_W, $Rich_Web_Forms_Dat2[0]->Rich_Web_Forms_T_Pos));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name11 (id, Rich_Web_Forms_T_Tit, Rich_Web_Forms_T_01, Rich_Web_Forms_T_02, Rich_Web_Forms_T_03, Rich_Web_Forms_T_04, Rich_Web_Forms_T_05, Rich_Web_Forms_T_06, Rich_Web_Forms_T_07, Rich_Web_Forms_T_08, Rich_Web_Forms_T_09, Rich_Web_Forms_T_10, Rich_Web_Forms_T_11, Rich_Web_Forms_T_12, Rich_Web_Forms_T_13, Rich_Web_Forms_T_14, Rich_Web_Forms_T_15) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Rich_Web_Forms_Dat3[0]->Rich_Web_Forms_T_Tit, $Rich_Web_Forms_Dat3[0]->Rich_Web_Forms_T_01, $Rich_Web_Forms_Dat3[0]->Rich_Web_Forms_T_02, $Rich_Web_Forms_Dat3[0]->Rich_Web_Forms_T_03, $Rich_Web_Forms_Dat3[0]->Rich_Web_Forms_T_04, $Rich_Web_Forms_Dat3[0]->Rich_Web_Forms_T_05, $Rich_Web_Forms_Dat3[0]->Rich_Web_Forms_T_06, $Rich_Web_Forms_Dat3[0]->Rich_Web_Forms_T_07, $Rich_Web_Forms_Dat3[0]->Rich_Web_Forms_T_08, $Rich_Web_Forms_Dat3[0]->Rich_Web_Forms_T_09, $Rich_Web_Forms_Dat3[0]->Rich_Web_Forms_T_10, $Rich_Web_Forms_Dat3[0]->Rich_Web_Forms_T_11, $Rich_Web_Forms_Dat3[0]->Rich_Web_Forms_T_12, $Rich_Web_Forms_Dat3[0]->Rich_Web_Forms_T_13, $Rich_Web_Forms_Dat3[0]->Rich_Web_Forms_T_14, $Rich_Web_Forms_Dat3[0]->Rich_Web_Forms_T_15));
		die();
	}
	//Option page
	add_action( 'wp_ajax_Rich_Web_Forms_Edit_Option', 'Rich_Web_Forms_Edit_Option_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Forms_Edit_Option', 'Rich_Web_Forms_Edit_Option_Callback' );

	function Rich_Web_Forms_Edit_Option_Callback()
	{  
		$Rich_Web_Forms_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name6 = $wpdb->prefix . "rich_web_forms_options";
		$Rich_Web_Forms_Dat=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE id=%d", $Rich_Web_Forms_ID));
		$Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_21=html_entity_decode($Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_21);
		$Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_22=html_entity_decode($Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_22);
		print_r($Rich_Web_Forms_Dat);
		die();
	}

	add_action( 'wp_ajax_Rich_Web_Forms_Copy_Option', 'Rich_Web_Forms_Copy_Option_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Forms_Copy_Option', 'Rich_Web_Forms_Copy_Option_Callback' );

	function Rich_Web_Forms_Copy_Option_Callback()
	{  
		$Rich_Web_Forms_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name6 = $wpdb->prefix . "rich_web_forms_options";
		$Rich_Web_Forms_Dat=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE id=%d", $Rich_Web_Forms_ID));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name6 (id, Rich_Web_Forms_O_1, Rich_Web_Forms_O_2, Rich_Web_Forms_O_3, Rich_Web_Forms_O_4, Rich_Web_Forms_O_5, Rich_Web_Forms_O_6, Rich_Web_Forms_O_7, Rich_Web_Forms_O_8, Rich_Web_Forms_O_9, Rich_Web_Forms_O_10, Rich_Web_Forms_O_11, Rich_Web_Forms_O_12, Rich_Web_Forms_O_13, Rich_Web_Forms_O_14, Rich_Web_Forms_O_15, Rich_Web_Forms_O_16, Rich_Web_Forms_O_17, Rich_Web_Forms_O_18, Rich_Web_Forms_O_19, Rich_Web_Forms_O_20, Rich_Web_Forms_O_21, Rich_Web_Forms_O_22) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_1, $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_2, $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_3, $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_4, $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_5, $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_6, $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_7, $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_8, $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_9, $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_10, $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_11, $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_12, $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_13, $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_14, $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_15, $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_16, $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_17, $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_18, $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_19, $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_20, $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_21, $Rich_Web_Forms_Dat[0]->Rich_Web_Forms_O_22));
		die();
	}

	add_action( 'wp_ajax_Rich_Web_Forms_Del_Option', 'Rich_Web_Forms_Del_Option_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Forms_Del_Option', 'Rich_Web_Forms_Del_Option_Callback' );

	function Rich_Web_Forms_Del_Option_Callback()
	{
		$Rich_Web_Forms_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name6 = $wpdb->prefix . "rich_web_forms_options";
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name6 WHERE id=%d", $Rich_Web_Forms_ID));
		die();
	}

	add_action( 'wp_ajax_Rich_Web_Forms_Submission_RNR', 'Rich_Web_Forms_Submission_RNR_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Forms_Submission_RNR', 'Rich_Web_Forms_Submission_RNR_Callback' );
	// Submission page
	function Rich_Web_Forms_Submission_RNR_Callback()
	{
		$Submission_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name9  = $wpdb->prefix . "rich_web_forms_info";

		$wpdb->query($wpdb->prepare("UPDATE $table_name9 set ReadNoRead=%s WHERE id=%d", 'read', $Submission_ID));

		die();
	}

	add_action( 'wp_ajax_Rich_Web_Forms_Submission_SNS', 'Rich_Web_Forms_Submission_SNS_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Forms_Submission_SNS', 'Rich_Web_Forms_Submission_SNS_Callback' );

	function Rich_Web_Forms_Submission_SNS_Callback()
	{
		$Submission_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name9  = $wpdb->prefix . "rich_web_forms_info";

		$Rich_Web_Forms_Info=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE id=%d", $Submission_ID));

		if($Rich_Web_Forms_Info[0]->SpamText == 'spam')
		{
			$wpdb->query($wpdb->prepare("UPDATE $table_name9 set SpamText=%s WHERE id=%d", 'no spam', $Submission_ID));
		}
		else
		{
			$wpdb->query($wpdb->prepare("UPDATE $table_name9 set SpamText=%s WHERE id=%d", 'spam', $Submission_ID));
		}
		die();
	}
	add_action( 'wp_ajax_Rich_Web_Forms_Submission_Del', 'Rich_Web_Forms_Submission_Del_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Forms_Submission_Del', 'Rich_Web_Forms_Submission_Del_Callback' );

	function Rich_Web_Forms_Submission_Del_Callback()
	{
		$Submission_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name7  = $wpdb->prefix . "rich_web_forms_saved";
		$table_name9  = $wpdb->prefix . "rich_web_forms_info";
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name7 WHERE Customer_ID=%s", $Submission_ID));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name9 WHERE id=%d", $Submission_ID));
	}

	add_action( 'wp_ajax_Rich_Web_Forms_Submission_Mess', 'Rich_Web_Forms_Submission_Mess_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Forms_Submission_Mess', 'Rich_Web_Forms_Submission_Mess_Callback' );

	function Rich_Web_Forms_Submission_Mess_Callback()
	{  
		$Submission_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name7  = $wpdb->prefix . "rich_web_forms_saved";
		$Rich_Web_Forms_Message=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE Customer_ID=%s", $Submission_ID));
		for($i = 0; $i < count($Rich_Web_Forms_Message); $i++)
		{
			$Rich_Web_Forms_Message[$i]->Forms_Fields_Type = html_entity_decode($Rich_Web_Forms_Message[$i]->Forms_Fields_Type);
		}
		print_r($Rich_Web_Forms_Message);
		die();
	}	
	// Widget
	add_action( 'wp_ajax_Rich_Web_Forms_Upload_Media', 'Rich_Web_Forms_Upload_Media_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_Forms_Upload_Media', 'Rich_Web_Forms_Upload_Media_Callback' );

	function Rich_Web_Forms_Upload_Media_Callback()
	{
		global $wpdb;

		$table_name2  = $wpdb->prefix . "rich_web_forms_manager";
		$table_name3  = $wpdb->prefix . "rich_web_forms_fields";
		$table_name6  = $wpdb->prefix . "rich_web_forms_options";
		$table_name7  = $wpdb->prefix . "rich_web_forms_saved";
		$table_name8  = $wpdb->prefix . "rich_web_forms_mails";
		$table_name9  = $wpdb->prefix . "rich_web_forms_info";
		$table_name10 = $wpdb->prefix . "rich_web_forms_cust_id";		

		$Rich_Web_Forms_all = $_POST['postData'];
		parse_str("$Rich_Web_Forms_all",$myArray);
		$Rich_Web_Forms = absint($_POST['formId']);
		$_POSTED = $myArray;
		$FilesCount = 0;
		$FilesCount1 = 0;

		$Rich_Web_Forms_Manager = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id = %d", $Rich_Web_Forms));
		$Rich_Web_Forms_Fields  = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE Forms_ID = %d order by id", $Rich_Web_Forms));
		$Rich_Web_Forms_Option  = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE Rich_Web_Forms_O_1 = %s", $Rich_Web_Forms_Manager[0]->Forms_option));

		$Rich_Web_Forms_Cust_ID =$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name10 WHERE id>%d order by id desc limit 1",0));
		$Rich_Web_Forms_Cust_ID_New=$Rich_Web_Forms_Cust_ID[0]->Customer_ID + 1;

		if ( isset( $_SERVER['HTTP_CLIENT_IP'] ) ) {
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		} elseif ( getenv( 'HTTP_X_FORWARDED_FOR' ) ) {
			$ipaddress = getenv( 'HTTP_X_FORWARDED_FOR' );
		} elseif ( getenv( 'HTTP_X_FORWARDED' ) ) {
			$ipaddress = getenv( 'HTTP_X_FORWARDED' );
		} elseif ( getenv( 'HTTP_FORWARDED_FOR' ) ) {
			$ipaddress = getenv( 'HTTP_FORWARDED_FOR' );
		} elseif ( getenv( 'HTTP_FORWARDED' ) ) {
			$ipaddress = getenv( 'HTTP_FORWARDED' );
		} elseif ( getenv( 'REMOTE_ADDR' ) ) {
			$ipaddress = getenv( 'REMOTE_ADDR' );
		} else {
			$ipaddress = 'UNKNOWN';
		}

		$Recaptcha = '';
		for( $i = 0; $i < count($Rich_Web_Forms_Fields); $i++ )
		{
			if( $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Captcha' )
			{
				$url='https://www.google.com/recaptcha/api/siteverify';
				$privatekey=$Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_5;
				$response=file_get_contents($url."?secret=".$privatekey."&response=".$_POSTED['g-recaptcha-response']."&remoteip=".$ipaddress);
    
				if( $response.success==false )
				{
					$Recaptcha = json_encode(array("ReCaptchaError"=>$Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_10));
				}

				// $dataOfCaptcha=json_decode($response);
				// if( !isset($dataOfCaptcha->success) || $dataOfCaptcha->success!=true )
				// {
				// 	$Recaptcha = json_encode(array("ReCaptchaError"=>$Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_10));
				// }
			}
		}

		if( $Recaptcha == '')
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name10 (id, Customer_ID) VALUES (%d, %s)", '', $Rich_Web_Forms_Cust_ID_New));

			$ip_info = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ipaddress));
			if(empty($ip_info['geoplugin_countryCode']))
			{
				$ip_info['geoplugin_city'] = 'Unknown';
				$ip_info['geoplugin_region'] = 'Unknown';
				$ip_info['geoplugin_countryName'] = 'Unknown';
				$ip_info['geoplugin_countryCode'] = 'UN';
			}

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name9 (id, Forms_ID, IPaddress, City, Region, CountryCode, CountryName, ContinentCode, Latitude, Longitude, RegionCode, RegionName, CurrencyCode, CurrencySybmol, CurrencySybmol_UTF8, CountryFlag, Data, SpamText, ReadNoRead) VALUES (%d, %d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Rich_Web_Forms, $ipaddress, $ip_info['geoplugin_city'], $ip_info['geoplugin_region'], $ip_info['geoplugin_countryCode'], $ip_info['geoplugin_countryName'], $ip_info['geoplugin_continentCode'], $ip_info['geoplugin_latitude'], $ip_info['geoplugin_longitude'], $ip_info['geoplugin_regionCode'], $ip_info['geoplugin_regionName'], $ip_info['geoplugin_currencyCode'], $ip_info['geoplugin_currencySymbol'], $ip_info['geoplugin_currencySymbol_UTF8'], plugins_url('/Images/Flags/' . $ip_info['geoplugin_countryCode'] . '.png',__FILE__), date("Y.m.d h:i:sa"), 'no spam', 'unread'));
			
			$attachments = array();

			for( $i = 0; $i < count($Rich_Web_Forms_Fields); $i++ )
			{
				if( $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'File')
				{
					if ( ! function_exists( 'wp_handle_upload' ) ) 
					{
				        include_once(ABSPATH . 'wp-admin/includes/file.php');
				        include_once(ABSPATH . 'wp-admin/includes/image.php');
				        include_once(ABSPATH . 'wp-admin/includes/media.php');
				    }
				   	if(isset($_FILES['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i]))
				    {
				        $files = $_FILES['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i];
			            if ($files['name']) 
			            {
			                $file = array(
			                    'name'     => $files['name'],
			                    'type'     => $files['type'],
			                    'tmp_name' => $files['tmp_name'],
			                    'error'    => $files['error'],
			                    'size'     => $files['size']
			                );
			                $upload_overrides = array( 'test_form' => false );
			                $upload = wp_handle_upload($file, $upload_overrides);

			                if ( $upload && !isset( $upload['error'] ) ) 
			                {
			                	array_push($attachments, $upload['url']);
						    }
						}
				    }	
				}
			}
			if( $Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_6 == 'on' )
			{
				for( $i = 0; $i < count($Rich_Web_Forms_Fields); $i++ )
				{
					if( $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Text Box' || $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Textarea' || $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Select Menu' || $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Phone' || $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Radio Box' || $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Country' )
					{					
						$wpdb->query($wpdb->prepare("INSERT INTO $table_name7 (id, Forms_ID, Customer_ID, Forms_Fields_Type, Forms_Fields_Text) VALUES (%d, %s, %s, %s, %s)", '', $Rich_Web_Forms, $Rich_Web_Forms_Cust_ID_New, $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1, str_replace("\&","&", sanitize_text_field(esc_html($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i])))));
					}
					else if( $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Email' )
					{					
						$wpdb->query($wpdb->prepare("INSERT INTO $table_name7 (id, Forms_ID, Customer_ID, Forms_Fields_Type, Forms_Fields_Text) VALUES (%d, %s, %s, %s, %s)", '', $Rich_Web_Forms, $Rich_Web_Forms_Cust_ID_New, $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1, sanitize_email($_POSTED['Rich_Web_Contact_Form_Email_' . $Rich_Web_Forms . '_' . $i])));
					}
					else if($Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'DatePicker')
					{
						if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O7 == 'FromTo')
						{
							$FromToDate = str_replace("\&","&", sanitize_text_field(esc_html($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i . '_1']))) . ' - ' . str_replace("\&","&", sanitize_text_field(esc_html($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i . '_2'])));
							$wpdb->query($wpdb->prepare("INSERT INTO $table_name7 (id, Forms_ID, Customer_ID, Forms_Fields_Type, Forms_Fields_Text) VALUES (%d, %s, %s, %s, %s)", '', $Rich_Web_Forms, $Rich_Web_Forms_Cust_ID_New, $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1, $FromToDate));
						}
						else
						{
							$wpdb->query($wpdb->prepare("INSERT INTO $table_name7 (id, Forms_ID, Customer_ID, Forms_Fields_Type, Forms_Fields_Text) VALUES (%d, %s, %s, %s, %s)", '', $Rich_Web_Forms, $Rich_Web_Forms_Cust_ID_New, $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1, str_replace("\&","&", sanitize_text_field(esc_html($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i])))));
						}	
					}
					else if($Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'TimePicker')
					{
						if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O7 == 'FromTo')
						{
							$FromToTime = str_replace("\&","&", sanitize_text_field(esc_html($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i . '_1']))) . ' - ' . str_replace("\&","&", sanitize_text_field(esc_html($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i . '_2'])));
							$wpdb->query($wpdb->prepare("INSERT INTO $table_name7 (id, Forms_ID, Customer_ID, Forms_Fields_Type, Forms_Fields_Text) VALUES (%d, %s, %s, %s, %s)", '', $Rich_Web_Forms, $Rich_Web_Forms_Cust_ID_New, $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1, $FromToTime));
						}
						else
						{
							$wpdb->query($wpdb->prepare("INSERT INTO $table_name7 (id, Forms_ID, Customer_ID, Forms_Fields_Type, Forms_Fields_Text) VALUES (%d, %s, %s, %s, %s)", '', $Rich_Web_Forms, $Rich_Web_Forms_Cust_ID_New, $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1, str_replace("\&","&", sanitize_text_field(esc_html($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i])))));
						}
					}
					else if( $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Full Name' )
					{					
						$wpdb->query($wpdb->prepare("INSERT INTO $table_name7 (id, Forms_ID, Customer_ID, Forms_Fields_Type, Forms_Fields_Text) VALUES (%d, %s, %s, %s, %s)", '', $Rich_Web_Forms, $Rich_Web_Forms_Cust_ID_New, $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1, str_replace("\&","&", sanitize_text_field(esc_html($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i . '_1']))) . '  ' . str_replace("\&","&", sanitize_text_field(esc_html($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i . '_2'])))));
					}
					else if( $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'File' )
					{
						$wpdb->query($wpdb->prepare("INSERT INTO $table_name7 (id, Forms_ID, Customer_ID, Forms_Fields_Type, Forms_Fields_Text) VALUES (%d, %s, %s, %s, %s)", '', $Rich_Web_Forms, $Rich_Web_Forms_Cust_ID_New, $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1, $attachments[$FilesCount]));
						$FilesCount++;
					}
					else if($Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Check Box')
					{
						$Rich_Web_Forms_FEditing_CB_Names = explode('qwertyh', $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5);
						$Rich_Web_Forms_FEditing_CB_NamesCh = array();
						for($j=0; $j<count($Rich_Web_Forms_FEditing_CB_Names); $j++)
						{
							if(strlen(sanitize_text_field($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i . '_' . $j])) != 0)
							{
								array_push($Rich_Web_Forms_FEditing_CB_NamesCh, str_replace("\&","&", sanitize_text_field(esc_html($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i . '_' . $j]))));
							}
						}
						$wpdb->query($wpdb->prepare("INSERT INTO $table_name7 (id, Forms_ID, Customer_ID, Forms_Fields_Type, Forms_Fields_Text) VALUES (%d, %s, %s, %s, %s)", '', $Rich_Web_Forms, $Rich_Web_Forms_Cust_ID_New, $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1, implode(", ",$Rich_Web_Forms_FEditing_CB_NamesCh)));
					}
				}	
			}
			// Mail to Administrator
			if( $Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_16 == 'on' )
			{
				$Rich_Web_Contact_Form_Message_Body = str_replace("\&","&", sanitize_text_field(esc_html('<table style="position: relative; width: 100%; background-color: #c0c0c0;">')));
				$Rich_Web_Contact_Form_Message_Body1 = str_replace("\&","&", sanitize_text_field(esc_html('<tr><td style="font-weight: 700; text-align: center; width: 40%; background-color: white;">')));
				$Rich_Web_Contact_Form_Message_Body2 = str_replace("\&","&", sanitize_text_field(esc_html('</td><td style="font-weight: normal; text-align: justify; width: 60%; background-color: white;">')));
				$Rich_Web_Contact_Form_Message_Body3 = str_replace("\&","&", sanitize_text_field(esc_html('</td></tr>')));
			
				for( $i = 0; $i < count($Rich_Web_Forms_Fields); $i++ )
				{
					if( $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Text Box' || $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Textarea' || $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Select Menu' || $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Phone' || $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Radio Box' || $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Country' )
					{					
						$Rich_Web_Contact_Form_Message_Body .= $Rich_Web_Contact_Form_Message_Body1 . $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1 . $Rich_Web_Contact_Form_Message_Body2 . str_replace("\&","&", sanitize_text_field(esc_html($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i]))) . $Rich_Web_Contact_Form_Message_Body3;
					}
					else if( $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Email' )
					{	
						$Rich_Web_Contact_Form_Message_Body .= $Rich_Web_Contact_Form_Message_Body1 . $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1 . $Rich_Web_Contact_Form_Message_Body2 . sanitize_email($_POSTED['Rich_Web_Contact_Form_Email_' . $Rich_Web_Forms . '_' . $i]) . $Rich_Web_Contact_Form_Message_Body3;
					}
					else if($Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'DatePicker')
					{
						if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O7 == 'FromTo')
						{
							$FromToDate = str_replace("\&","&", sanitize_text_field(esc_html($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i . '_1']))) . ' - ' . str_replace("\&","&", sanitize_text_field(esc_html($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i . '_2'])));
							$Rich_Web_Contact_Form_Message_Body .= $Rich_Web_Contact_Form_Message_Body1 . $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1 . $Rich_Web_Contact_Form_Message_Body2 . $FromToDate . $Rich_Web_Contact_Form_Message_Body3;
						}
						else
						{
							$Rich_Web_Contact_Form_Message_Body .= $Rich_Web_Contact_Form_Message_Body1 . $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1 . $Rich_Web_Contact_Form_Message_Body2 . str_replace("\&","&", sanitize_text_field(esc_html($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i]))) . $Rich_Web_Contact_Form_Message_Body3;
						}	
					}
					else if($Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'TimePicker')
					{
						if($Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O7 == 'FromTo')
						{
							$FromToTime = str_replace("\&","&", sanitize_text_field(esc_html($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i . '_1']))) . ' - ' . str_replace("\&","&", sanitize_text_field(esc_html($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i . '_2'])));
							$Rich_Web_Contact_Form_Message_Body .= $Rich_Web_Contact_Form_Message_Body1 . $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1 . $Rich_Web_Contact_Form_Message_Body2 . $FromToTime . $Rich_Web_Contact_Form_Message_Body3;
						}
						else
						{
							$Rich_Web_Contact_Form_Message_Body .= $Rich_Web_Contact_Form_Message_Body1 . $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1 . $Rich_Web_Contact_Form_Message_Body2 . str_replace("\&","&", sanitize_text_field(esc_html($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i]))) . $Rich_Web_Contact_Form_Message_Body3;
						}
					}
					else if( $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Full Name' )
					{					
						$Rich_Web_Contact_Form_Message_Body .= $Rich_Web_Contact_Form_Message_Body1 . $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1 . $Rich_Web_Contact_Form_Message_Body2 . str_replace("\&","&", sanitize_text_field(esc_html($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i . '_1']))) . '  ' . str_replace("\&","&", sanitize_text_field(esc_html($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i . '_2']))) . $Rich_Web_Contact_Form_Message_Body3;
					}
					else if( $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'File' )
					{
						$Rich_Web_Contact_Form_Message_Body .= $Rich_Web_Contact_Form_Message_Body1 . $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1 . $Rich_Web_Contact_Form_Message_Body2 . $attachments[$FilesCount1] . $Rich_Web_Contact_Form_Message_Body3;
						$FilesCount1++;
					}
					else if($Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Check Box')
					{
						$Rich_Web_Forms_FEditing_CB_Names = explode('qwertyh', $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O5);
						$Rich_Web_Forms_FEditing_CB_NamesCh = array();
						for($j=0; $j<count($Rich_Web_Forms_FEditing_CB_Names); $j++)
						{
							if(strlen(sanitize_text_field($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i . '_' . $j])) != 0)
							{
								array_push($Rich_Web_Forms_FEditing_CB_NamesCh, str_replace("\&","&", sanitize_text_field(esc_html($_POSTED['Rich_Web_Contact_Form_' . $Rich_Web_Forms . '_' . $i . '_' . $j]))));
							}
						}

						$Rich_Web_Contact_Form_Message_Body .= $Rich_Web_Contact_Form_Message_Body1 . $Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O1 . $Rich_Web_Contact_Form_Message_Body2 . implode(", ",$Rich_Web_Forms_FEditing_CB_NamesCh) . $Rich_Web_Contact_Form_Message_Body3;
					}
				}
				
				$Rich_Web_Contact_Form_Message_Body .= str_replace("\&","&", sanitize_text_field(esc_html('</table>')));

				function wpdocs_set_html_mail_content_type1() {
		    		return 'text/html';
				}									
				add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type1' );
				
		 		$to = $Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_18;
				$subject = html_entity_decode($Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_19);
				if(empty($subject))
				{
					$subject=$Rich_Web_Forms_Manager[0]->Forms_name;
				}
				$body = html_entity_decode($Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_21) . html_entity_decode($Rich_Web_Contact_Form_Message_Body);
		 		$headers = array('From: ' . html_entity_decode($Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_2) . ' <' . $Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_3 . '>');

				wp_mail( $to, $subject, $body, $headers, $attachments );

				remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type1' );
			}
			//Mail to User
			for( $i = 0; $i < count($Rich_Web_Forms_Fields); $i++ )
			{
				if( $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Email')
				{
					$Rich_Web_Contact_Form_Email = $_POSTED['Rich_Web_Contact_Form_Email_' . $Rich_Web_Forms . '_' . $i];
					$wpdb->query($wpdb->prepare("INSERT INTO $table_name8 (id, Forms_ID, Email) VALUES (%d, %d, %s)", '', $Rich_Web_Forms, $Rich_Web_Contact_Form_Email));
				}
			}
			if( $Rich_Web_Contact_Form_Email )
			{
				if( $Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_17 == 'on' )
				{
					function wpdocs_set_html_mail_content_type2() {
			    		return 'text/html';
					}
					add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type2' );
					
			 		$to = $Rich_Web_Contact_Form_Email;
					$subject = html_entity_decode($Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_20);
					if(empty($subject))
					{
						$subject=$Rich_Web_Forms_Manager[0]->Forms_name;
					}
					$body = html_entity_decode($Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_22);
			 		$headers = array('From: ' . html_entity_decode($Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_2) . ' <' . $Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_3 . '>');	
					wp_mail( $to, $subject, $body, $headers );

					remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type2' );
				}			
			}
			
			for( $i = 0; $i < count($Rich_Web_Forms_Fields); $i++ )
			{			
				if( $Rich_Web_Forms_Fields[$i]->Forms_Fields_Type == 'Button')
				{
					echo json_encode(array("RichSubmit"=>$Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O3,"RichSubmitURL"=>$Rich_Web_Forms_Fields[$i]->Rich_Web_Forms_Fields_O4,"RichSubmitMessage"=>html_entity_decode($Rich_Web_Forms_Option[0]->Rich_Web_Forms_O_7)));
				}
			}
		}
		else
		{
			echo $Recaptcha;
		}

		die();		
	}
?>