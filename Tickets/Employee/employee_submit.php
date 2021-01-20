<?php
require '../../connect.php';
include("../../user.php");

if(isset($_POST['submit']))
{
	$id=$_REQUEST['id'];
	$cmp_id=$_REQUEST['cmp_id'];
	$name=$_REQUEST['name'];
$name=$_REQUEST['name'];
$Gender=$_REQUEST['gender'];
$dob=$_REQUEST['dob'];
$email=$_REQUEST['email'];
$mobile_number=$_REQUEST['mobile_number'];
$role=$_REQUEST['role'];
$department=$_REQUEST['department'];
$Designation=$_REQUEST['division']; 
$username=$_REQUEST['username'];
$Password=md5($_REQUEST['Password']);
$org_Password=$_REQUEST['Password'];
$status=$_REQUEST['status'];
$rolemaster_id=$_SESSION['rolemaster_id'];

 
//echo "<pre>";print_r($performance);
 $sql=$con->query("insert into masters_employee(company_id,emp_name,gender,dob,email,mobile,role_id,department_id,division_id,username,passworrd,employee_status,created_on,created_by) values('$cmp_id','$name','$Gender','$dob','$email','$mobile_number','$role','$department','$Designation','$username','$Password','$status',now(),'$rolemaster_id')"); 
//echo "insert into masters_employee(company_id,emp_name,gender,dob,email,mobile,role_id,department_id,division_id,username,passworrd,org_password,employee_status,created_on,created_by) values('$cmp_id','$name','$Gender','$dob','$email','$mobile_number','$role','$department','$Designation','$username','$Password','$org_Password','$status',now(),'$rolemaster_id')";
if($sql)
{
    echo "<script>alert('successfully Updated');</script>";
    
}

	header("location:/Ticketing_system/index.php");
}
?>

