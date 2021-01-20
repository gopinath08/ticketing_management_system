<?php
require '../../connect.php';
include("../../user.php");

 $id=$_REQUEST['get_id'];
 
$role=$_REQUEST['role'];
$username=$_REQUEST['username'];
$org_Password=$_REQUEST['Password'];
$Password=md5($_REQUEST['Password']);
$name=$_REQUEST['name'];
$rolemaster_id=$_SESSION['rolemaster_id'];
$status = 2;
 
$sql=$con->query("Update masters_employee set employee_status='$status' where emp_id='$id'");
//echo "Update masters_employee set employee_status='$status' where emp_id='$id'";
$sql1=$con->query("insert into user_master(usertype,users_id,role_master_id,user_name,password,full_name,created_by,created_on) values('Employee','$id','$role','$username','$Password','$name','$rolemaster_id',now())"); 
//echo "insert into user_master(usertype,users_id,role_master_id,user_name,password,full_name,created_by,created_on) values('Employee','$id','$role','$username','$Password','$name','$rolemaster_id',now())";

?>