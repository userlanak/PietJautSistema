<?php
	if(!defined('ABSPATH')) exit;
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<style type="text/css">
	.Rich_Web_Forms_Send_Message{ position: absolute; right: 10px; bottom: 10px; padding: 5px 10px;	background: #47bde5; cursor: pointer; border: none; box-shadow: 0px 0px 2px #47bde5; color: #fff; text-shadow:1px 1px 1px #000000; width:100px; height:30px; transition:all 0.3s linear; }
	.Rich_Web_Forms_Send_Message:hover { color: #fff; background:#30a9d1; box-shadow: 0px 0px 2px #30a9d1; }
	.Rich_Web_Forms_Content_Message { position:relative; width:99%; }
	.Rich_Web_Forms_Content_Data2_Message { position:inherit; top:0%; left:0%; width:100% !important; margin-top:10px; z-index:1;}
	.Rich_Web_Forms_Content_Table_Message4 { position:relative; width: 49%; padding: 1px; background-color: #fff; text-align: center; font-size: 12px; margin-bottom:15px; float: left; }
	.Rich_Web_Forms_Content_Table_Message4 tr { background:rgba(255,255,255,.9); height: 35px; }
	.Rich_Web_Forms_Content_Table_Message4 tr:nth-child(even) { background: #f1f1f1; }
	.Rich_Web_Forms_Content_Table_Message4 tr td { width: 25%; }
	.Rich_Web_Forms_Content_Table_Message4 input[type=text], .Rich_Web_Forms_Content_Table_Message4 select, .Rich_Web_Forms_Content_Table_Message4 input[type=email] { width: 70%; }	
	.Rich_Web_Forms_Content_Table_Message5 { position:relative; width: 25%; padding: 1px; background-color: #fff; text-align: center; font-size: 12px; margin-bottom:15px; float: left; margin-left: 1%;}
	.Rich_Web_Forms_Content_Table_Message5 tbody { max-height:450px; overflow-y:auto; display:block; }
	.Rich_Web_Forms_Content_Table_Message5 thead { display:block; }
	.Rich_Web_Forms_Content_Table_Message5 tr { background:rgba(255,255,255,.9); height: 35px; }
	.Rich_Web_Forms_Content_Table_Message5 tr:nth-child(even) { background: #f1f1f1; }
	.Rich_Web_Forms_Content_Table_Message5 tr td { width: 25%; }
	.Rich_Web_Forms_Content_Table_Message5 input[type=text], .Rich_Web_Forms_Content_Table_Message5 select, .Rich_Web_Forms_Content_Table_Message5 input[type=email] { width: 70%; }	
	.Rich_Web_Forms_Content_Table_Message5 img { width: 18px; float: right; margin-right: 15px; cursor: pointer; }
	.Rich_Web_Forms_Content_Table_Message5 img:hover { opacity: 0.8; }
</style>