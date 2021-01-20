<?php
define("Title", 'Ticketing_Sytem');
try {
	$con = new pdo ('mysql:host=localhost;dbname=ticketing_system','root','Best2020Know');
} 
catch (Exception $e) 
{
	echo $e->getMessage();
}
?>