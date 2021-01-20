<?php
require '../../connect.php';

 $id=$_REQUEST['get_id'];

$status = 3;
 
$sql=$con->query("Update masters_client set client_status='$status' where client_id='$id'");

	


?>