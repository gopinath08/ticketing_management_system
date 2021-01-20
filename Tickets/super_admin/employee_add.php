<?php
require '../../connect.php';
include("../../user.php");

?>
<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">EMPLOYEE ADD</h3>
				<a onclick="back()" style="float: right;" data-toggle="modal" class="btn btn-dark"></i>Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
<form class="form-horizontal" method="POST" action="Tickets/super_admin/employee_submit.php">
         
                <div class="card-body">
				 <div class="form-group row">
                    <label for="inputrole" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="role" id="role">
					  <option value="">Select Role</option>
					  <?php
$sql=$con->query("SELECT * FROM role_master");
      $i=1;
      while($cmp = $sql->fetch(PDO::FETCH_ASSOC))
      {
		  ?>
		  <option value="<?php echo $cmp['id'];?>"><?php echo $cmp['role_name'];?></option>
		  <?php
	  }
		  ?>
					  </select>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputDepartment" class="col-sm-2 col-form-label">Department</label>
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
                  <label for="inputdisgnation" class="col-sm-2 col-form-label">Designation</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="Designation" id="Designation">
					  <option value="">Select Designation</option>
					  <?php
$sql=$con->query("SELECT * FROM Designation");
      $i=1;
      while($cmp = $sql->fetch(PDO::FETCH_ASSOC))
      {
		  ?>
		  <option value="<?php echo $cmp['id'];?>"><?php echo $cmp['Designation_name'];?></option>
		  <?php
	  }
		  ?>
					  </select>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputusername" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="username" id="username" placeholder="Enter the username">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-4">
                      <input type="password" class="form-control" name="Password" id="inputPassword3" placeholder="Password">
                    </div>
                  </div>
				 <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="name" id="name" placeholder="Enter the name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email ID</label>
                    <div class="col-sm-4">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Enter the Email">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputnumber" class="col-sm-2 col-form-label">Contact Number</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="Enter the contact number">
                    </div>
                  </div>
				   <div class="form-group row">
                    <label for="inputgender" class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-sm-4">
				  <select  name="gender" id="gender" class="form-control">
  <option value="">Select</option>
  <option value="1">Male</option>
  <option value="2">Female</option>
  
</select>
</div>
   </div>
     <div class="form-group row">
                  <label for="inputcompany" class="col-sm-2 col-form-label">Company </label>
                    <div class="col-sm-4">
                      <select class="form-control" name="company" id="company">
					  <option value="">Select Company</option>
					  <?php
$sql=$con->query("SELECT * FROM masters_company");
      $i=1;
      while($cmp = $sql->fetch(PDO::FETCH_ASSOC))
      {
		  ?>
		  <option value="<?php echo $cmp['id'];?>"><?php echo $cmp['company_name'];?></option>
		  <?php
	  }
		  ?>
					  </select>
                    </div>
                  </div>
				  <div class="form-group row">
                  <label for="inputProject" class="col-sm-2 col-form-label">Project </label>
                    <div class="col-sm-4">
                      <select class="form-control" name="Project" id="Project">
					  <option value="">Select Project</option>
					  <?php
$sql=$con->query("SELECT * FROM masters_project");
      $i=1;
      while($cmp = $sql->fetch(PDO::FETCH_ASSOC))
      {
		  ?>
		  <option value="<?php echo $cmp['id'];?>"><?php echo $cmp['Project_name'];?></option>
		  <?php
	  }
		  ?>
					  </select>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputreport" class="col-sm-2 col-form-label">Reporting To</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="reporting" id="reporting" placeholder="Enter the reporting">
                    </div>
                  </div>
				   <div class="form-group row">
                    <label for="inputstatus" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-1">
                      <input type="checkbox" class="form-control" name="status" id="status" value="1" placeholder="Enter the Project name">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-success">Submit</button>
                  <button type="submit" class="btn btn-default float"><b>Cancel</b></button>
                </div>
                <!-- /.card-footer -->
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