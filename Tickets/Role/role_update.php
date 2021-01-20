<?php
require '../../connect.php';
include("../../user.php");


//echo "<pre>";print_r($candidate_id);exit();
 $id=$_REQUEST['get_id'];
 $name=$_REQUEST['name'];
 $status=$_REQUEST['status'];
 
 

	$sql2= $con->query("Update role_master set role_name='$name',status='$status' where id='$id'");
	
	
	?>