<?php
	/*
	Plugin name: Rich Forms
	Plugin URI: https://rich-web.org/wp-contact-form/
	Description: Form Builder plugin is fully responsive. Forms is awesome WordPress form plugin with many useful features and effects.
	Version: 1.2.0
	Author: richteam
	Author URI: https://rich-web.org
	License: GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
	*/

	add_action('widgets_init', 'Rich_Web_Forms_Widget');
	function Rich_Web_Forms_Widget()
	{
	 	register_widget('Rich_Web_Forms');
	}
	require_once(dirname(__FILE__) . '/Rich-Web-Forms-Widget.php');
 	require_once(dirname(__FILE__) . '/Rich-Web-Forms-Ajax.php');
	require_once(dirname(__FILE__) . '/Rich-Web-Forms-Shortcode.php');

	add_action('wp_enqueue_scripts','Rich_Web_Forms_Style');
	function Rich_Web_Forms_Style(){
		wp_register_script('Rich_Web_Forms',plugins_url('/Scripts/Rich-Web-Forms-Widget.js',__FILE__),array('jquery','jquery-ui-core'));
		wp_localize_script('Rich_Web_Forms', 'object', array('ajaxurl' => admin_url('admin-ajax.php')));
		wp_enqueue_script('Rich_Web_Forms');
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-datepicker');

		wp_enqueue_script('Rich_Web_Forms-Phone',plugins_url('/Scripts/intlTelInput.min.js',__FILE__));
		wp_enqueue_style('Rich_Web_Forms-Phone',plugins_url('/Style/intlTelInput.css',__FILE__));

		wp_enqueue_script('Rich_Web_Forms-Country',plugins_url('/Scripts/countrySelect.min.js',__FILE__));
		wp_enqueue_style('Rich_Web_Forms-Country',plugins_url('/Style/countrySelect.min.css',__FILE__));

		// wp_register_style('Rich_Web_Forms-admin-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/themes/base/jquery-ui.css');
		wp_register_style('Rich_Web_Forms-admin-ui-css', plugins_url('/Style/rw-jquery-ui.css',__FILE__));
		wp_enqueue_style( 'Rich_Web_Forms-admin-ui-css' );	
		
		wp_register_style( 'fontawesome-css', plugins_url('/Style/richwebicons.css', __FILE__)); 
   		wp_enqueue_style( 'fontawesome-css' );	
	}

	add_action("admin_menu", 'Rich_Web_Forms_Admin_Menu' );
	function Rich_Web_Forms_Admin_Menu() 
	{
		$complete_url = wp_nonce_url( $bare_url, 'edit-menu_'.$comment_id, 'Rich_Web_Forms_Nonce' );

		add_menu_page('Rich-Web Forms Admin' . $complete_url,'Contact Forms','manage_options','Rich-Web Forms Admin' . $complete_url,'Manage_Rich_Web_Forms_Admin', plugins_url('/Images/admin.png',__FILE__));
 		add_submenu_page( 'Rich-Web Forms Admin' . $complete_url, 'Rich-Web Forms Admin', 'Forms Manager', 'manage_options', 'Rich-Web Forms Admin' . $complete_url, 'Manage_Rich_Web_Forms_Admin');
		add_submenu_page( 'Rich-Web Forms Admin' . $complete_url, 'Rich-Web Forms General', 'General Options', 'manage_options', 'Rich-Web Forms General' . $complete_url, 'Manage_Rich_Web_Forms_General');
		add_submenu_page( 'Rich-Web Forms Admin' . $complete_url, 'Rich-Web Forms Themes', 'Forms Themes', 'manage_options', 'Rich-Web Forms Themes' . $complete_url, 'Manage_Rich_Web_Forms_Themes');
		add_submenu_page( 'Rich-Web Forms Admin' . $complete_url, 'Rich-Web Forms Message', 'Messages Manager', 'manage_options', 'Rich-Web Forms Messages' . $complete_url, 'Manage_Rich_Web_Forms_Messages');
		add_submenu_page( 'Rich-Web Forms Admin' . $complete_url, 'Rich-Web Forms Submissions', 'Submissions', 'manage_options', 'Rich-Web Forms Submissions' . $complete_url, 'Manage_Rich_Web_Forms_Submissions');
		add_submenu_page( 'Rich-Web Forms Admin' . $complete_url, 'Rich-Web Forms Products', 'Our Products', 'manage_options', 'Rich-Web Forms Products', 'Manage_Rich_Web_Forms_Products');
	}
	function Manage_Rich_Web_Forms_Admin()
	{
		require_once(dirname(__FILE__) . '/Rich-Web-Forms-Admin.php');
	}
	function Manage_Rich_Web_Forms_Themes()
	{
		require_once(dirname(__FILE__) . '/Rich-Web-Forms-Theme.php');
		require_once(dirname(__FILE__) . '/Scripts/Rich-Web-Forms-Themes.js.php');
		require_once(dirname(__FILE__) . '/Style/Rich-Web-Forms-Themes.css.php');
	}
	function Manage_Rich_Web_Forms_General()
	{
		require_once(dirname(__FILE__) . '/Rich-Web-Forms-General.php');
		require_once(dirname(__FILE__) . '/Scripts/Rich-Web-Forms-General.js.php');
		require_once(dirname(__FILE__) . '/Style/Rich-Web-Forms-General.css.php');
	}
	function Manage_Rich_Web_Forms_Messages()
	{
		require_once(dirname(__FILE__) . '/Rich-Web-Forms-Messages.php');
		require_once(dirname(__FILE__) . '/Scripts/Rich-Web-Forms-Messages.js.php');
		require_once(dirname(__FILE__) . '/Style/Rich-Web-Forms-Messages.css.php');
	}
	function Manage_Rich_Web_Forms_Submissions()
	{
		require_once(dirname(__FILE__) . '/Rich-Web-Forms-Submissions.php');
		require_once(dirname(__FILE__) . '/Scripts/Rich-Web-Forms-Submissions.js.php');
		require_once(dirname(__FILE__) . '/Style/Rich-Web-Forms-Submissions.css.php');
	}
	function Manage_Rich_Web_Forms_Products()
	{
		require_once(dirname(__FILE__) . '/Rich-Web-Products.php');
	}
	add_action('admin_init', 'Rich_Web_Forms_Admin_Style');	
	function Rich_Web_Forms_Admin_Style()
	{
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');
		
		wp_register_style('Rich_Web_Forms', plugins_url('/Style/Rich-Web-Forms-Admin.css',__FILE__));
		wp_enqueue_style('Rich_Web_Forms');	
		wp_register_script('Rich_Web_Forms', plugins_url('Scripts/Rich-Web-Forms-Admin.js',__FILE__),array('jquery','jquery-ui-core'));
		wp_localize_script('Rich_Web_Forms', 'object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
		wp_enqueue_script('Rich_Web_Forms');
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_style('Rich_Web_Forms-admin-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/themes/base/jquery-ui.css');

		wp_register_style( 'fontawesome-css', plugins_url('/Style/richwebicons.css', __FILE__)); 
   		wp_enqueue_style( 'fontawesome-css' );	
	}

	register_activation_hook(__FILE__,'Ric_Web_Forms_wp_activate');
	function Ric_Web_Forms_wp_activate()
	{
		require_once('Rich-Web-Forms-Install.php');
	}
	function Rich_Web_Forms_Color() 
	{
	    wp_enqueue_script(
	        'alpha-color-picker',
	        plugins_url('/Scripts/alpha-color-picker.js', __FILE__),	       
	        array( 'jquery', 'wp-color-picker' ), // You must include these here.
	        null,
	        true
	    );
	    wp_enqueue_style(
	        'alpha-color-picker',
	        plugins_url('/Style/alpha-color-picker.css', __FILE__),
	        array( 'wp-color-picker' ) // You must include these here.
	    );
	}
	add_action( 'admin_enqueue_scripts', 'Rich_Web_Forms_Color' );
?>