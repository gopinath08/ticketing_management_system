<?php
require '../../connect.php';
include("../../user.php");


//echo "<pre>";print_r($candidate_id);exit();
 $id=$_REQUEST['get_id'];
 $name=$_REQUEST['name'];
 $company_address=$_REQUEST['company_address'];
 
 $company_contact=$_REQUEST['company_contact'];

	$sql2= $con->query("Update masters_company set company_name='$name',company_address='$company_address',company_contact='$company_contact' where id='$id'");
	
	
	?>