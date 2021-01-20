<?php
require '../../connect.php';
include("../../user.php");
$id=$_REQUEST['id'];
$stmt = $con->prepare("SELECT * FROM `user_master`
INNER JOIN role_master ON user_master.role_master_id=role_master.id
INNER JOIN designation ON user_master.Designation_id=designation.id
INNER JOIN masters_company ON user_master.company_name=masters_company.id
INNER JOIN masters_project ON user_master.Project_name=masters_project.id
INNER JOIN masters_department ON user_master.department_id=masters_department.id where user_id='$id'"); 
$stmt->execute(); 
$row = $stmt->fetch();
?>

<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">EMPLOYEE EDIT</h3>
				<a onclick="back()" style="float: right;" data-toggle="modal" class="btn btn-dark"></i>Back</a>
              </div>
              <!-- /.card-header -->
			  
			  
              <!-- form start -->
<form role="form" name="" action="" method="post" enctype="multipart/type">
         
                <div class="card-body">
				 <div class="form-group row">
                    <label for="inputrole" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="role" id="role" required>
					  
					  <?php
					  $role=$row['role_master_id'];
$sql=$con->query("SELECT * FROM role_master where id='$role'");
$stmt->execute(); 
$row1 = $stmt->fetch();
?>

<option value="<?php echo $row1['id'];?>"><?php echo $row1['role_name'];?></option>
<?php

$sql1=$con->query("SELECT * FROM role_master");
      $i=1;
      while($cmp = $sql1->fetch(PDO::FETCH_ASSOC))
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
                      <select class="form-control" name="department" id="department" required>
					 					  <?php
					  $dep=$row['department_id'];
$sql=$con->query("SELECT * FROM masters_department where id='$dep'");
$stmt->execute(); 
$row1 = $stmt->fetch();
?>
<option value="<?php echo $row1['id'];?>"><?php echo $row1['name'];?></option>
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
					   <?php
					  $desg=$row['Designation_id'];
$sql=$con->query("SELECT * FROM designation where id='$desg'");
$stmt->execute(); 
$row1 = $stmt->fetch();
?>
<option value="<?php echo $row1['id'];?>"><?php echo $row1['Designation_name'];?></option>			
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
					<input type="hidden" class="form-control" id="get_id" name="get_id" value="<?php echo  $row['user_id']; ?>">
                      <input type="text" class="form-control" name="username" id="username" value="<?php echo  $row['user_name'];?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-4">
                      <input type="password" class="form-control" name="Password" id="inputPassword3" placeholder="Password" required>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="name" id="name" value="<?php echo  $row['full_name'];?>" required>
                  </div>
				  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email ID</label>
                    <div class="col-sm-4">
                      <input type="email" class="form-control" name="email" id="email" value="<?php echo  $row['email_id'];?>" required>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputnumber" class="col-sm-2 col-form-label">Contact Number</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="mobile_number" id="mobile_number" value="<?php echo  $row['mobile_no'];?>" required>
                    </div>
                  </div>
				   <div class="form-group row">
                    <label for="inputnumber" class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-sm-4">
				  <select  name="Gender" id="Gender" class="form-control" required>
 <?php
 if($row['gender']==1) {
 
 ?>
  <option value="1">Male</option>
  <option value="2">Female</option>
  
 <?php  } else if($row['gender']==2) {
	 ?>
	 <option value="2">Female</option>
  <option value="1">male</option>
  <?php
 }
 ?>
</select>
</div>
   </div>
   <div class="form-group row">
                    <label for="inputrole" class="col-sm-2 col-form-label">Company</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="company" id="company" required>
					  
					  <?php
					  $company=$row['company_name'];
$sql=$con->query("SELECT * FROM masters_company where id='$company'");
$stmt->execute(); 
$row1 = $stmt->fetch();
?>

<option value="<?php echo $row1['id'];?>"><?php echo $row1['company_name'];?></option>
<?php

$sql1=$con->query("SELECT * FROM masters_company");
      $i=1;
      while($cmp = $sql1->fetch(PDO::FETCH_ASSOC))
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
                    <label for="inputrole" class="col-sm-2 col-form-label">Project</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="Project" id="Project">
					  
					  <?php
					  $project=$row['Project_name'];
$sql=$con->query("SELECT * FROM masters_project where id='$project'");
$stmt->execute(); 
$row1 = $stmt->fetch();
?>

<option value="<?php echo $row1['id'];?>"><?php echo $row1['Project_name'];?></option>
<?php

$sql1=$con->query("SELECT * FROM masters_project");
      $i=1;
      while($cmp = $sql1->fetch(PDO::FETCH_ASSOC))
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
                      <input type="text" class="form-control" name="reporting" id="reporting"value="<?php echo  $row['Reporting'];?>" required>
                    </div>
                  </div>
				   
                  <div class="form-group row">
                    <label for="inputstatus" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-4">
				  <select  name="Status" id="Status" class="form-control">
 <?php
 if($row['status']==1) {
 
 ?>
  <option value="1">ACTIVE</option>
  <option value="2">IN ACTIVE</option>
  
 <?php  } else if($row['status']==2) {
	 ?>
	 <option value="2">ACTIVE</option>
  <option value="1">IN ACTIVE</option>
  <?php
 }
 ?>
</select>
</div>
   </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="button" class="btn btn-primary btn-md"  style="float:left;" name="Update" onclick="emp_update()" value="Update"> 
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
 function emp_update()
    {
    var id=$('#get_id').val();
	//alert(id);
   
    var data = $('form').serialize();
    $.ajax({
    type:'GET',
    data:"id="+id, data,
	
    url:'Tickets/super_admin/employee_update.php',
    success:function(data)
    {
      if(data==1)
      { 
        alert('Not');
      
      }
      else
      {
        alert("Update Successfully");
		employee()
      }
      
    }       
    });
    }
	</script>