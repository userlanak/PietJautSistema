<?php
	if(!defined('ABSPATH')) exit;
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<style type="text/css">
	.Rich_Web_Forms_Content_Submission { position:relative; width:99%; }
	.Rich_Web_Forms_Content_Data2_Submission { position:inherit; top:0%; left:0%; width:100% !important; margin-top:10px; z-index:1;}

	.Rich_Web_Forms_Content_Table_Submission4 { position:relative; width: 100%; padding: 1px; background-color: #fff; text-align: center; color: #000; font-size: 12px; margin-bottom:15px; float: left; }
	.Rich_Web_Forms_Content_Table_Submission4 tr { background:rgba(255,255,255,.9); height: 35px; }
	.Rich_Web_Forms_Content_Table_Submission4 tr:nth-child(even) { background: #f1f1f1; }
	.Rich_Web_Forms_Content_Table_Submission4 tr td { width: 25%; }
	.Rich_Web_Forms_Content_Table_Submission4 select { width: 70%; }

	.Rich_Web_Forms_Content_Table_Submission5 { position:relative; width: 100%; padding: 1px; background-color: #fff; text-align: center; color: #000; font-size: 12px; margin-bottom:15px; float: left; }
	.Rich_Web_Forms_Content_Table_Submission5 tr { background:rgba(255,255,255,.9); height: 35px; }
	.Rich_Web_Forms_Content_Table_Submission5 tr:nth-child(1) { font-size: 16px !important; font-weight: 600; }
	.Rich_Web_Forms_Content_Table_Submission5 tr:nth-child(even) { background: #f1f1f1; }
	.Rich_Web_Forms_Content_Table_Submission5 tr td:nth-child(1) { width: 15%; }
	.Rich_Web_Forms_Content_Table_Submission5 tr td:nth-child(2) { width: 15%; }
	.Rich_Web_Forms_Content_Table_Submission5 tr td:nth-child(3) { width: 10%; }
	.Rich_Web_Forms_Content_Table_Submission5 tr td:nth-child(4) { width: 15%; }
	.Rich_Web_Forms_Content_Table_Submission5 tr td:nth-child(5) { width: 15%; }
	.Rich_Web_Forms_Content_Table_Submission5 tr td:nth-child(6) { width: 15%; }
	.Rich_Web_Forms_Content_Table_Submission5 tr td:nth-child(7) { width: 5%; cursor: pointer; font-size: 16px; }
	.Rich_Web_Forms_Content_Table_Submission5 tr td:nth-child(8) { width: 5%; cursor: pointer; font-size: 16px; }
	.Rich_Web_Forms_Content_Table_Submission5 tr td:nth-child(9) { width: 5%; cursor: pointer; font-size: 16px; }
	.Rich_Web_Forms_Content_Table_Submission5 tr td:nth-child(7):hover, .Rich_Web_Forms_Content_Table_Submission5 tr td:nth-child(8):hover, .Rich_Web_Forms_Content_Table_Submission5 tr td:nth-child(9):hover { opacity: 0.8 }	
	.Rich_Web_Forms_Submission_Div { position: fixed; top: 10%; left: 30%; width: 40%; max-height: 80%; z-index: 999999999; display: none; background-color: white; overflow: auto; }
	.Rich_Web_Forms_Submission_Div_Main { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 99999999; background-color: rgba(0,0,0,0.6); display: none; cursor: pointer; }
	.Rich_Web_Forms_Submission_Div table { position: relative; width: 100%; background-color: #c0c0c0; }
	.Rich_Web_Forms_Submission_Div table td:nth-child(odd) { font-weight: 700; text-align: center; width: 40%; background-color: white; }
	.Rich_Web_Forms_Submission_Div table td:nth-child(even) { font-weight: normal; text-align: justify; width: 60%; background-color: white; }
	/* Events List custom webkit scrollbar */
	.Rich_Web_Forms_Submission_Div::-webkit-scrollbar {width: 9px;}
	.Rich_Web_Forms_Submission_Div::-webkit-scrollbar-track {background: none;}
	.Rich_Web_Forms_Submission_Div::-webkit-scrollbar-thumb { background: #c0c0c0; border:1px solid #E9EBEC; border-radius: 10px; }
	.Rich_Web_Forms_Submission_Div::-webkit-scrollbar-thumb:hover {background:#cecece;}
</style>