<?php
require '../../connect.php';
include("../../user.php");

if(isset($_POST['submit']))
{
	
	$tickets_id=$_REQUEST['tickets_id'];
	$users_id=$_REQUEST['users_id'];
	$closed_ticket_id=$_REQUEST['closed_ticket_id'];
	$end_date=$_REQUEST['end_date'];
$end_time=$_REQUEST['end_time'];
$change_status=$_REQUEST['change_status'];

//echo "<pre>";print_r($performance);
$sql= $con->query("Update closed_tickets set end_date='$end_date',end_time='$end_time',closed_status='$change_status',modified_by='$users_id',modified_on=now() where closed_ticket_id='$closed_ticket_id'");

$sql1= $con->query("Update tickets set tickets_status='$change_status' where id='$tickets_id'");
 if($sql)
 {
     echo "<script>alert('successfully Updated');</script>";
    
 }

	header("location:/Ticketing_system/index.php");
}
?>

