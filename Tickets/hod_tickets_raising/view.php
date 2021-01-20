<?php
require '../../connect.php';
include("../../user.php");
$id=$_REQUEST['id'];
$stmt = $con->prepare("SELECT  task_assign.users_id,task_assign.due_date,task_assign.hours,division.Designation_name,masters_department.name,tickets.id as tickets_id,tickets.created_on,masters_project.Project_name,masters_employee.emp_name,tickets.subject,tickets.subject,tickets.description,tickets.tickets_status,tickets.project_id,tickets.client_id,tickets.created_on,tickets.hod_id FROM `tickets`
INNER JOIN masters_client ON tickets.client_id=masters_client.client_id
INNER JOIN masters_project ON tickets.project_id=masters_project.id
INNER JOIN masters_employee ON tickets.hod_id=masters_employee.emp_id
INNER JOIN task_assign ON tickets.id=task_assign.tickets_id
INNER JOIN masters_department ON task_assign.department_id=masters_department.id
INNER JOIN division ON task_assign.division_id=division.id
where tickets.id='$id'"); 
$stmt->execute(); 
$row = $stmt->fetch();
?>
<div  class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tickets Details </h3>
				<a onclick="back()" style="float: right;" data-toggle="modal" class="btn btn-warning"></i>Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
<form class="form-horizontal" method="POST" action="Tickets/hod_tickets_raising/hod_submit.php">
         
         
                <div class="card-body">
				  
				  
				  
				    <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">Ticket Date</label>
                    <div class="col-sm-4">
					 
                      <input type="text" class="form-control" name="date" id="date" value="<?php echo  $row['created_on'];?>"readonly>
                  </div>
				  </div>
				  
				   <div class="form-group row">
                    <label for="inputrole" class="col-sm-2 col-form-label">Project_name</label>
                    <div class="col-sm-4">
					<?php
					  
					  $client_id=$row['client_id'];

         $sql1=$con->query("SELECT * FROM masters_project where client_id='$client_id'");
      $i=1;
      while($cmp = $sql1->fetch(PDO::FETCH_ASSOC))
      {
		  ?>
		 <input type="text" class="form-control" name="project" id="project" value="<?php echo $cmp['Project_name'];?>"readonly>
                       <?php
	  }
		  ?>  
					  
					
                    </div>
                  </div>
				 
				  
				   <div class="form-group row">
                    <label for="inputrole" class="col-sm-2 col-form-label">HOD NAME</label>
                    <div class="col-sm-4">
                     
					  
					  <?php
					
					  $emp_id=$row['hod_id'];



$sql1=$con->query("SELECT * FROM masters_employee where emp_id='$emp_id'");
      $i=1;
      while($cmp = $sql1->fetch(PDO::FETCH_ASSOC))
      {
		  ?>
			 <input type="text" class="form-control" name="project" id="project" value="<?php echo $cmp['emp_name'];?>"readonly>
		  <?php
	  }
		  ?>
                    </div>
                  </div>
				 
				   
				
				  <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">Subject</label>
                    <div class="col-sm-4">
					
                      <input type="text" class="form-control" name="subject" id="subject" value="<?php echo  $row['subject'];?>"readonly>
                  </div>
				  </div>
                 
                 <div class="form-group row">
                    <label for="inputdescription" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-4">
					
                      <input type="text" class="form-control" name="Description" id="Description" value="<?php echo  $row['description'];?>"readonly>
                  </div>
				  </div>
		<div class="form-group row">
                    <label for="inputdescription" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-4">
					<?php if($row['tickets_status']==0){
						?>
                      <input type="text" class="form-control" name="status" id="status" value="pending" readonly>
					  <?php
					} else if($row['tickets_status']==1) {
					?>
					
                      <input type="text" class="form-control" name="status" id="status" value="Ready To process" readonly>
					  <?php
					} else if($row['tickets_status']==2) {
					?>
					<input type="text" class="form-control" name="status" id="status" value="Tickets Assigned" readonly>
					<?php
					} else if($row['tickets_status']==3) {
					?>
					<input type="text" class="form-control" name="status" id="status" value="Tickets closed" readonly>
					<?php }
					?>
                  </div>
				  </div>
				  
				  <div class="form-group row">
                    <label for="inputDepartment" class="col-sm-2 col-form-label">DEPARTMENT</label>
                    
                    <div class="col-sm-4">
					
                      <input type="text" class="form-control" name="Department" id="Department" value="<?php echo  $row['name'];?>" readonly>
                  </div>
				  </div>
				   <div class="form-group row">
                    <label for="inputstatus" class="col-sm-2 col-form-label">DIVISION</label>
                     <div class="col-sm-4">
                     <input type="text" class="form-control" name="Division" id="Division" value="<?php echo  $row['Designation_name'];?>" readonly>
                   
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputstatus" class="col-sm-2 col-form-label">Assigning Person</label>
                     <div class="col-sm-4">
					 <?php $user_id= $row['users_id'];
					$query= $con->prepare("select * from masters_employee where emp_id='$user_id'");
					$query->execute(); 
$row1 = $query->fetch();
					 ?>
					 
                     <input type="text" class="form-control" name="Assign" id="Assign" value="<?php echo  $row1['emp_name'];?>" readonly>
                   
                    </div>
                  </div>

				   <div class="form-group row">
                    <label for="inputdate" class="col-sm-2 col-form-label">Due Date</label>
                    <div class="col-sm-4">
					 <input type="text" class="form-control" name="Date" id="Date" value="<?php echo  $row['due_date'];?>" readonly>
                      
                  </div>
				  </div>
				  <div class="form-group row">
                    <label for="inputtime" class="col-sm-2 col-form-label">Estimate Hours</label>
                    <div class="col-sm-4">
					
                      <input type="number" class="form-control" name="hours" id="hours" value="<?php echo  $row['hours'];?>" readonly>
                  </div>
				  
				  </div>
				  
                </div>
               
              </form>
            </div>
			
			<script>
	function back()
	{
		$.ajax({
		type:"POST",
		url:"Tickets/hod_tickets_raising/hod_tickets_raising.php",
		success:function(data){
		$("#main_content").html(data);
		}
		})
	}
		$(document).ready(function() {
$('#department').on('change', function() {

var department_id = this.value;
//alert(department_id);
$.ajax({
url: "Tickets/Project_master/find_designation.php",
type: "POST",
data: {
department_id: department_id
},
cache: false,
success: function(result){
$("#division").html(result);
$('#users').html('<option value="">Select Division First</option>');

}
});
});
$('#division').on('change', function() {
var division_id = this.value;
//alert(division_id);
$.ajax({
url: "Tickets/hod_tickets_raising/find_users.php",
type: "POST",
data: {
division_id: division_id
},
cache: false,
success: function(result){
$("#users").html(result);
}
});
});
});
 
	</script>
	