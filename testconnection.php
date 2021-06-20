<?php
$test Connection = mysql_connect('localhost', 'root', 'root');
if (!$testConnection) {
die('Error: ' . mysql_error());
}
echo 'Database connection working!';
mysql_close($testConnection);
?> 