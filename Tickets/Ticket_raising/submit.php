<?php
require '../../connect.php';
include("../../user.php");
if(isset($_POST['submit']))
{
	echo $get_client_id=$_REQUEST['get_client_id'];
	$project=$_REQUEST['project'];
	$hod=$_REQUEST['hod'];
	$subject=$_REQUEST['subject'];
    $decription=$_REQUEST['decription'];
	 $ahdarpath=$_REQUEST['ahdarpath'];
    $status=0;
$rolemaster_id=$_SESSION['rolemaster_id'];
 if (!file_exists("uploads/" . $get_client_id)) {
	mkdir("uploads/" . $get_client_id);
}
$target_Path_aggrement="uploads/$get_client_id/";
			
echo $_FILES['attachment']['name'];

echo "hiii". $ahdarpath="uploads/$get_client_id/".basename( $_FILES['attachment']['name']);
$target_Path_aggrement=$target_Path_aggrement.basename( $_FILES['attachment']['name']);
		 
move_uploaded_file( $_FILES['attachment']['tmp_name'],$target_Path_aggrement);
//echo "<pre>";print_r($performance);
 $sql=$con->query("insert into  tickets(client_id,project_id,hod_id,subject,description,attachment,tickets_status,created_by,created_on) values('$get_client_id','$project','$hod','$subject','$decription','$ahdarpath','$status','$rolemaster_id',now())"); 
//echo ("insert into  tickets(client_id,project_id,hod_id,subject,description,attachment,tickets_status,created_by,created_on) values('$get_client_id','$project','$hod','$subject','$decription','$ahdarpath','$status','$rolemaster_id',now())");
if($sql)
{
    echo "<script>alert('successfully Updated');</script>";
    
}

	//header("location:/Ticketing_system/index.php");
}