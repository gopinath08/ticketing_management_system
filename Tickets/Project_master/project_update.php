<?php
require '../../connect.php';
include("../../user.php");


//echo "<pre>";print_r($candidate_id);exit();
 $id=$_REQUEST['get_id'];
 $cmp_id=$_REQUEST['cmp_id'];
 $client=$_REQUEST['client'];
 $name=$_REQUEST['name'];
 $department=$_REQUEST['department'];
 $division=$_REQUEST['division'];
 $hod=$_REQUEST['hod'];
 $status=$_REQUEST['status'];
 
 
	$rolemaster_id=$_SESSION['rolemaster_id'];

	$sql2= $con->query("Update masters_project set company_id='$cmp_id',client_id='$client',Project_name='$name',department_id='$department',division_id='$division',hod_id='$hod',status='$status',modified_by='$rolemaster_id',modified_on=NOW() where id='$id'");
	//echo "Update masters_project set company_id='$cmp_id',client_id='$client',Project_name='$name',department_id='$department',division_id='$division',hod_id='$hod',status='$status',modified_by='$rolemaster_id',modified_on=NOW() where id='$id'";
	
	?>