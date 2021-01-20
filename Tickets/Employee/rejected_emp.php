<?php
require '../../connect.php';

 $id=$_REQUEST['get_id'];

$status = 3;
 
$sql=$con->query("Update masters_employee set employee_status='$status' where emp_id='$id'");

	


?>