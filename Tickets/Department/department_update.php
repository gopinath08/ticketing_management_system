<?php
require '../../connect.php';
include("../../user.php");


//echo "<pre>";print_r($candidate_id);exit();
 $id=$_REQUEST['get_id'];
 $name=$_REQUEST['name'];
 $status=$_REQUEST['status'];
 
 
	$rolemaster_id=$_SESSION['rolemaster_id'];

	$sql2= $con->query("Update masters_department set name='$name',status='$status',modified_by='$rolemaster_id',modified_on=NOW() where id='$id'");
	
	
	?>