<?php
require '../../connect.php';
include("../../user.php");
$id=$_REQUEST['id'];
$stmt = $con->prepare("SELECT tickets.id as tickets_id,tickets.created_on,masters_project.Project_name,masters_employee.emp_name,tickets.subject,tickets.subject,tickets.description,tickets.tickets_status,tickets.project_id,tickets.client_id,tickets.created_on,tickets.hod_id FROM `tickets`
INNER JOIN masters_client ON tickets.client_id=masters_client.client_id
INNER JOIN masters_project ON tickets.project_id=masters_project.id
INNER JOIN masters_employee ON tickets.hod_id=masters_employee.emp_id
where tickets.id='$id'"); 
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
                      <select class="form-control" name="department" id="department">
					  <option value="">Select Department</option>
					  <?php
$sql=$con->query("SELECT * FROM masters_department");
      $i=1;
      while($cmp = $sql->fetch(PDO::FETCH_ASSOC))
      {
		  ?>
		  <option value="<?php echo $cmp['id'];?>"><?php echo $cmp['name'];?></option>
		  <?php
	  }
		  ?>
					  </select>
                    </div>
                  </div>
				   <div class="form-group row">
                    <label for="inputstatus" class="col-sm-2 col-form-label">DIVISION</label>
                     <div class="col-sm-4">
                     <select class="form-control" name="division" id="division">
					
</select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputusername" class="col-sm-2 col-form-label">Assigning Person</label>
                    <div class="col-sm-4">
					
					 <select class="form-control" name="users" id="users">
</select>
                   
                    </div>
                  </div>
				   <div class="form-group row">
                    <label for="inputdate" class="col-sm-2 col-form-label">Due Date</label>
                    <div class="col-sm-4">
					 
                      <input type="date" class="form-control" name="due_date" id="due_date">
                  </div>
				  </div>
				  <div class="form-group row">
                    <label for="inputtime" class="col-sm-2 col-form-label">Estimate Hours</label>
                    <div class="col-sm-4">
					
                      <input type="number" class="form-control" name="hours" id="hours">
                  </div>
				  <input type="hidden" class="form-control" name="id" id="id" value="<?php echo  $row['tickets_id'];?>"readonly>
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
	