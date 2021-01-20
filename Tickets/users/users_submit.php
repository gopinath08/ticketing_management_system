<?php
require '../../connect.php';
include("../../user.php");

if(isset($_POST['submit']))
{
	
	$tickets_id=$_REQUEST['tickets_id'];
	$users_id=$_REQUEST['users_id'];
	$start_date=$_REQUEST['start_date'];
$start_time=$_REQUEST['start_time'];
$change_status=$_REQUEST['change_status'];

//echo "<pre>";print_r($performance);
 $sql=$con->query("insert into closed_tickets(user_id,ticket_id,start_date,start_time,closed_status,created_by,created_on) values('$users_id','$tickets_id','$start_date','$start_time','$change_status','$users_id',now())"); 
//echo "insert into closed_tickets(user_id,ticket_id,start_date,start_time,closed_status,created_by,created_on) values('$users_id','$tickets_id','$start_date','$start_time','$change_status','$users_id',now())";
$sql1= $con->query("Update tickets set tickets_status='$change_status' where id='$tickets_id'");
//echo "Update tickets set tickets_status='$change_status' where id='$tickets_id'";
 if($sql)
 {
     echo "<script>alert('successfully Updated');</script>";
    
 }

	header("location:/Ticketing_system/index.php");
}
?>

