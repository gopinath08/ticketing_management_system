<?php
require '../../connect.php';
include("../../user.php");
$id=$_REQUEST['id'];
$stmt = $con->prepare("SELECT * FROM `user_master`
INNER JOIN role_master ON user_master.role_master_id=role_master.id
INNER JOIN designation ON user_master.Designation_id=designation.id
INNER JOIN masters_department ON user_master.department_id=masters_department.id 
INNER JOIN masters_company ON user_master.company_name=masters_company.id
INNER JOIN masters_project ON user_master.Project_name=masters_project.id
where user_id='$id'"); 
$stmt->execute(); 
$row = $stmt->fetch();
?>
<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">EMPLOYEE DETAILS </h3>
				<a onclick="back()" style="float: right;" data-toggle="modal" class="btn btn-dark"></i>Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
<form class="form-horizontal" method="POST" action="Tickets/super_admin/employee_submit.php">
         
                <div class="card-body">
				 
				 <div class="form-group row">
                    <label for="inputrole" class="col-sm-2 col-form-label">Role</label>
					<div class="col-sm-4">
					<input type="text" class="form-control" name="role" id="role" value="<?php echo  $row['role_name'];?>"readonly>
                    </div>
                  </div>
				
				 <div class="form-group row">
                    <label for="inputDepartment" class="col-sm-2 col-form-label">Department</label>
					<div class="col-sm-4">
					<input type="text" class="form-control" name="department" id="department" value="<?php echo  $row['name'];?>"readonly>
                    </div>
                  </div>
				  
				   <div class="form-group row">
                    <label for="inputdisgnation" class="col-sm-2 col-form-label">Designation</label>
					<div class="col-sm-4">
					<input type="text" class="form-control" name="Designation" id="Designation" value="<?php echo  $row['Designation_name'];?>"readonly>
                    </div>
                  </div>
				
				  
				  <div class="form-group row">
                    <label for="inputusername" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="username" id="username" value="<?php echo  $row['user_name'];?>"readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="Password" id="inputPassword3" value="<?php echo  $row['org_password'];?>"readonly>
                    </div>
                  </div>
				 <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="name" id="name" value="<?php echo  $row['full_name'];?>"readonly>
                  </div>
				  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email ID</label>
                    <div class="col-sm-4">
                      <input type="email" class="form-control" name="email" id="email" value="<?php echo  $row['email_id'];?>"readonly>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputnumber" class="col-sm-2 col-form-label">Contact Number</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="mobile_number" id="mobile_number" value="<?php echo  $row['mobile_no'];?>"readonly>
                    </div>
                  </div>
				    <div class="form-group row">
                    <label for="inputgender" class="col-sm-2 col-form-label">Gender </label>
                    <div class="col-sm-4">
					<?php if($row['gender']==1){
						?>
                      <input type="text" class="form-control" name="Gender" id="Gender" value="Male" readonly>
					<?php } else { ?>
					<input type="text" class="form-control" name="Gender" id="Gender" value="Female" readonly>
						<?php
					}
					?>
                    </div>
                  </div>
			<div class="form-group row">
                    <label for="inputcompany" class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="Company" id="Company"value="<?php echo  $row['company_name'];?>"readonly>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputproject" class="col-sm-2 col-form-label">Project Name</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="Project" id="Project"value="<?php echo  $row['Project_name'];?>"readonly>
                    </div>
                  </div>
				  
                   <div class="form-group row">
                    <label for="inputreport" class="col-sm-2 col-form-label">Reporting To</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="reporting" id="reporting"value="<?php echo  $row['Reporting'];?>"readonly>
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
		url:"Tickets/super_admin/employee_view.php",
		success:function(data){
		$("#main_content").html(data);
		}
		})
	}
	</script>