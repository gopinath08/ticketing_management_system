<?php
require '../../connect.php';
include("../../user.php");


//echo "<pre>";print_r($candidate_id);exit();
 $id=$_REQUEST['get_id'];
 $name=$_REQUEST['name'];
$Gender=$_REQUEST['gender'];
$dob=$_REQUEST['dob'];
$email=$_REQUEST['email'];
$mobile_number=$_REQUEST['mobile_number'];
$role=$_REQUEST['role'];
$department=$_REQUEST['department'];
$Designation=$_REQUEST['Designation']; 
$username=$_REQUEST['username'];
$Password=md5($_REQUEST['Password']);
$org_Password=$_REQUEST['Password'];
$status=$_REQUEST['status'];
$rolemaster_id=$_SESSION['rolemaster_id'];

	$sql2= $con->query("Update masters_employee set emp_name='$name',gender='$Gender',dob='$dob',email='$email',mobile='$mobile_number',role_id='$role',department_id='$department',division_id='$Designation',username='$username',passworrd='$Password',employee_status='$status',modified_by='$rolemaster_id',modified_on=NOW() where emp_id='$id'");
	
	
	?>