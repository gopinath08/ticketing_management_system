<?php
require '../../connect.php';
include("../../user.php");
$id=$_REQUEST['id'];
$stmt = $con->prepare("SELECT * FROM `masters_employee`
INNER JOIN role_master ON masters_employee.role_id=role_master.id
INNER JOIN division ON masters_employee.division_id=division.id
INNER JOIN masters_department ON masters_employee.department_id=masters_department.id where emp_id='$id'"); 
$stmt->execute(); 
$row = $stmt->fetch();
?>

<div  class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><font size="5">EMPLOYEE EDIT</font></h3>
				
				<a onclick="back()" style="float: right;" data-toggle="modal" class="btn btn-dark"></i>Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
<form role="form" name="" action="" method="post" enctype="multipart/type">
         
                <div class="card-body">
				 <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">NAME</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="name" id="name" value="<?php echo  $row['emp_name'];?>" required>
                  </div>
				  </div>
				   	   <div class="form-group row">
                    <label for="inputnumber" class="col-sm-2 col-form-label">GENDER</label>
                    <div class="col-sm-4">
				  <select  name="gender" id="gender" class="form-control" required>
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
                    <label for="inputdob" class="col-sm-2 col-form-label">DATE OF BIRTH</label>
                    <div class="col-sm-4">
                      <input type="date" class="form-control" name="dob" id="dob" value="<?php echo  $row['dob'];?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">EMAIL ID</label>
                    <div class="col-sm-4">
                      <input type="email" class="form-control" name="email" id="email" value="<?php echo  $row['email'];?>" required>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputnumber" class="col-sm-2 col-form-label">MOBILE NUMBER</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="mobile_number" id="mobile_number" value="<?php echo  $row['mobile'];?>" required>
                    </div>
                  </div>
				 <div class="form-group row">
                    <label for="inputrole" class="col-sm-2 col-form-label">USER ROLE</label>
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
                    <label for="inputDepartment" class="col-sm-2 col-form-label">DEPARTMENT</label>
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
                  <label for="inputdisgnation" class="col-sm-2 col-form-label">DIVISION</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="Designation" id="Designation" required>
					   <?php
					  $desg=$row['division_id'];
$sql=$con->query("SELECT * FROM division where id='$desg'");
$stmt->execute(); 
$row1 = $stmt->fetch();
?>
<option value="<?php echo $row1['id'];?>"><?php echo $row1['Designation_name'];?></option>			
			<?php
$sql=$con->query("SELECT * FROM division");
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
                    <label for="inputusername" class="col-sm-2 col-form-label">USERNAME</label>
                    <div class="col-sm-4">
					<input type="hidden" class="form-control" id="get_id" name="get_id" value="<?php echo  $row['emp_id']; ?>">
                      <input type="text" class="form-control" name="username" id="username" value="<?php echo  $row['username'];?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">PASSWORD</label>
                    <div class="col-sm-4">
                      <input type="password" class="form-control" name="Password" id="inputPassword3" placeholder="Password" value="<?php echo  $row['passworrd'];?>" required>
                    </div>
                  </div>
				 
			
   
				
				  
                 
                  <div class="form-group row">
                    <label for="inputstatus" class="col-sm-2 col-form-label">STATUS</label>
                    <div class="col-sm-4">
				  <select  name="status" id="status" class="form-control">
 <?php
 if($row['employee_status']==1) {
 
 ?>
  <option value="1">WAITING FOR APPROVAL</option>
  <option value="2">APPROVED</option>
  <option value="3">REJECTED</option>
  
 <?php  } else if($row['employee_status']==2) {
	 ?>
	 <option value="2">APPROVED</option>
  <option value="3"> REJECTED</option>
   <option value="1"> WAITING FOR APPROVAL</option>
  <?php
 } else if($row['employee_status']==3){
 ?>
  <option value="3"> REJECTED</option>
  <option value="1"> WAITING FOR APPROVAL</option>
 <option value="2">APPROVED</option>
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
   
  		<a onclick="back()" style="float:left;"  data-toggle="modal" class="btn btn-danger">cancel</a>		  
          </div>
                <!-- /.card-footer -->
              </form>
            </div>
			
			<script>
	function back()
	{
		$.ajax({
		type:"POST",
		url:"Tickets/Employee/employee_view.php",
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
	
    url:'Tickets/Employee/employee_update.php',
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