<?php
require '../../connect.php';
include("../../user.php");

if(isset($_POST['submit']))
{
	$id=$_REQUEST['id'];
	$department=$_REQUEST['department'];
	
	$division=$_REQUEST['division'];
$users=$_REQUEST['users'];
$due_date=$_REQUEST['due_date'];
$hours=$_REQUEST['hours'];
$rolemaster_id=$_SESSION['rolemaster_id'];
 $status =1;
//echo "<pre>";print_r($performance);
 $sql=$con->query("insert into task_assign(tickets_id,department_id,division_id,users_id,due_date,hours,created_by,created_on) values('$id','$department','$division','$users','$due_date','$hours','$rolemaster_id',now())");

 //echo "insert into task_assign(tickets_id,department_id,division_id,users_id,due_date,hours,created_by,created_on) values('$id','$department','$division','$users','$due_date','$hours','$rolemaster_id',now())";

$sql1= $con->query("Update tickets set tickets_status='$status' where id='$id'");
 if($sql)
 {
     echo "<script>alert('successfully Updated');</script>";
    
 }

	header("location:/Ticketing_system/index.php");
}
?>

