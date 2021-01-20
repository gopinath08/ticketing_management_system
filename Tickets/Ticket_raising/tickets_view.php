<?php
require '../../connect.php';
include("../../user.php");
$id=$_REQUEST['id'];
$stmt = $con->prepare("SELECT tickets.id,tickets.created_on,masters_project.Project_name,masters_employee.emp_name,tickets.subject,tickets.subject,tickets.description,tickets.tickets_status,tickets.project_id,tickets.client_id,tickets.created_on,tickets.hod_id FROM `tickets`
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
<form role="form" name="" action="" method="post" enctype="multipart/type">
         
                <div class="card-body">
				  
				   
				  
				    <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">Date</label>
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

                  
                </div>
               
              </form>
            </div>
			
			<script>
	function back()
	{
		$.ajax({
		type:"POST",
		url:"Tickets/Ticket_raising/tickets_send.php",
		success:function(data){
		$("#main_content").html(data);
		}
		})
	}
	
 
	</script>
	