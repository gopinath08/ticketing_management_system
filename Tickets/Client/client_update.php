<?php
require '../../connect.php';
include("../../user.php");


//echo "<pre>";print_r($candidate_id);exit();
 $id=$_REQUEST['get_id'];
 $name=$_REQUEST['name'];
$code=$_REQUEST['code'];
$email=$_REQUEST['email'];
$mobile_number=$_REQUEST['mobile_number'];
$box_no=$_REQUEST['box_no'];
$Gst_number=$_REQUEST['Gst_number'];
$pan_number=$_REQUEST['pan_number'];
$street=$_REQUEST['street']; 
$area=$_REQUEST['area']; 
$city=$_REQUEST['city']; 
$state=$_REQUEST['state']; 
$pin=$_REQUEST['pin']; 
$username=$_REQUEST['username'];
$Password=md5($_REQUEST['Password']);
$org_Password=$_REQUEST['Password'];
$status=$_REQUEST['status'];
$rolemaster_id=$_SESSION['rolemaster_id'];


	$sql2= $con->query("Update masters_client set client_name='$name',code='$code',email='$email',mobile='$mobile_number',box_no='$box_no',Gst_number='$Gst_number',pan_number='$pan_number',street='$street',area='$area',state='$state',city='$city',pin='$pin',username='$username',passworrd='$Password',client_status='$status',modified_by='$rolemaster_id',modified_on=NOW() where client_id='$id'");
	
	
	?>