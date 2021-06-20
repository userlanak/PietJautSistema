<?php
	function Rich_Web_Forms_ID($atts, $content = null)
	{
		$atts=shortcode_atts(
			array(
				"id"=>"1"
			),$atts
		);
		return Rich_Web_Draw_Short_Forms($atts['id']);
	}
	add_shortcode('Rich_Web_Forms', 'Rich_Web_Forms_ID');
	function Rich_Web_Draw_Short_Forms($Forms_ID)
	{
		ob_start();	
			$args = shortcode_atts(array('name' => 'Widget Area','id'=>'','description'=>'','class'=>'','before_widget'=>'','after_widget'=>'','before_title'=>'','AFTER_TITLE'=>'','widget_id'=>'','widget_name'=>'Rich-Web Forms'), $Forms_ID, 'Rich_Web_Forms' );
			$Rich_Web_Forms=new Rich_Web_Forms;

			$instance=array('Rich_Web_Forms'=>$Forms_ID);
			$Rich_Web_Forms->widget($args,$instance);	
			$cont[]= ob_get_contents();
		ob_end_clean();	
		return $cont[0];		
	}
?>