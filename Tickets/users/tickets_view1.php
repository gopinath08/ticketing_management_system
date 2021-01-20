<?php
require '../../connect.php';
include("../../user.php");
$id=$_REQUEST['id'];
$stmt = $con->prepare("SELECT closed_tickets.closed_ticket_id,closed_tickets.start_date,closed_tickets.start_time,closed_tickets.closed_status,tickets.id as tickets_id,tickets.client_id,tickets.hod_id,tickets.subject,tickets.description,tickets.tickets_status,tickets.created_on,masters_project.Project_name,tickets.tickets_status,task_assign.due_date,task_assign.users_id,task_assign.hours FROM `task_assign` INNER JOIN tickets ON task_assign.Task_id=tickets.id INNER JOIN masters_project ON tickets.project_id=masters_project.id 
INNER JOIN closed_tickets ON tickets.id=closed_tickets.ticket_id where Task_id='$id'"); 
$stmt->execute(); 
$row = $stmt->fetch();
?>
 <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Tickets Details </h3>
				<a onclick="back()" style="float: right;" data-toggle="modal" class="btn btn-dark"></i>Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
<form class="form-horizontal" method="POST" action="Tickets/users/users_submit1.php">
         
         
                <div class="card-body">
				  
				  
				  
				    <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">Ticket Date</label>
                    <div class="col-sm-4">
					 <input type="hidden" class="form-control" name="tickets_id" id="tickets_id" value="<?php echo  $row['tickets_id'];?>"readonly>
					   <input type="hidden" class="form-control" name="users_id" id="users_id" value="<?php echo  $row['users_id'];?>"readonly>
					 <input type="hidden" class="form-control" name="closed_ticket_id" id="closed_ticket_id" value="<?php echo  $row['closed_ticket_id'];?>"readonly>
					   
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
                    <label for="inputdate" class="col-sm-2 col-form-label">Due Date</label>
                    <div class="col-sm-4">
					 
                      <input type="date" class="form-control" name="due_date" id="due_date" value="<?php echo  $row['due_date'];?>" readonly>
                  </div>
				  </div>
				  <div class="form-group row">
                    <label for="inputtime" class="col-sm-2 col-form-label">Estimate Hours</label>
                    <div class="col-sm-4">
					
                      <input type="number" class="form-control" name="hours" id="hours" value="<?php echo  $row['hours'];?>" readonly>
                  </div>
				
				  </div>
				  <div class="form-group row">
                    <label for="inputdate" class="col-sm-2 col-form-label">Start Date</label>
                    <div class="col-sm-4">
					 
                      <input type="text" class="form-control" name="start_date" id="start_date" value="<?php echo  $row['start_date'];?>" readonly>
                  </div>
				  </div>
				    <div class="form-group row">
                    <label for="inputtime" class="col-sm-2 col-form-label">Start time</label>
                    <div class="col-sm-4">
					
                      <input type="text" class="form-control" name="start_time" id="start_time" value="<?php echo  $row['start_time'];?>" readonly>
                  </div>
				  </div>
				<div class="form-group row">
                    <label for="inputdate" class="col-sm-2 col-form-label">End Date</label>
                    <div class="col-sm-4">
					 
                      <input type="date" class="form-control" name="end_date" id="end_date">
                  </div>
				  </div>
				    <div class="form-group row">
                    <label for="inputtime" class="col-sm-2 col-form-label">End time</label>
                    <div class="col-sm-4">
					
                      <input type="time" class="form-control" name="end_time" id="end_time">
                  </div>
				  </div>
				  <div class="form-group row">
                    <label for="inputtime" class="col-sm-2 col-form-label">status</label>
                    <div class="col-sm-4">
					<select class="form-control" name="change_status" id="change_status" >
						
					<option value="<?php echo  $row['closed_status'];?>">Ready To Process</option>
					<option value="3">Closed</option>
					
					</select>
					 </div>
				
				  </div>
				  <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-success">Submit</button>
                  <button type="submit" class="btn btn-default float"><b>Cancel</b></button>
                </div>
                </div>
               
              </form>
            </div>
			
			<script>
	function back()
	{
		$.ajax({
		type:"POST",
		url:"Tickets/users/task_view.php",
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
	