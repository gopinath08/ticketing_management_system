<?php
require '../../connect.php';
include("../../user.php");

if(isset($_POST['submit']))
{
	$cmp_id=$_REQUEST['cmp_id'];
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

 
//echo "<pre>";print_r($performance);
 $sql=$con->query("insert into masters_client(company_id,`client_name`, `code`, `email`, `mobile`, `box_no`, `Gst_number`, `pan_number`, `street`, `area`,`state`, `city`, `pin`, `username`, `passworrd`, `client_status`, `created_by`, `created_on`) values('$cmp_id','$name','$code','$email','$mobile_number','$box_no','$Gst_number','$pan_number','$street','$area','$state','$city','$pin','$username','$Password','$status','$rolemaster_id',now())"); 


if($sql)
{
    echo "<script>alert('successfully Updated');</script>";
    
}

	header("location:/Ticketing_system/index.php");
}
?>

