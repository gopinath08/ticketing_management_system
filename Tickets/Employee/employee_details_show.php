<?php
require '../../connect.php';
include("../../user.php");
$id=$_REQUEST['id'];
$stmt = $con->prepare("SELECT * FROM `masters_employee`
INNER JOIN role_master ON masters_employee.role_id=role_master.id
INNER JOIN division ON masters_employee.division_id=division.id
INNER JOIN masters_department ON masters_employee.department_id=masters_department.id
where emp_id='$id'"); 
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
<form role="form" name="" action="" method="post" enctype="multipart/type">
         
                <div class="card-body">
				  <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">NAME</label>
                    <div class="col-sm-4">
						<input type="hidden" class="form-control" id="get_id" name="get_id" value="<?php echo  $row['emp_id']; ?>">
                      <input type="text" class="form-control" name="name" id="name" value="<?php echo  $row['emp_name'];?>"readonly>
                  </div>
				  </div>
				   <div class="form-group row">
                    <label for="inputgender" class="col-sm-2 col-form-label">GENDER </label>
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
                    <label for="inputdob" class="col-sm-2 col-form-label">DATE OF BIRTH</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="dob" id="dob" value="<?php echo  $row['dob'];?>"readonly>
                    </div>
                  </div>
				    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">EMAIL ID</label>
                    <div class="col-sm-4">
                      <input type="email" class="form-control" name="email" id="email" value="<?php echo  $row['email'];?>"readonly>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputnumber" class="col-sm-2 col-form-label">PHONE NUMBER</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="mobile_number" id="mobile_number" value="<?php echo  $row['mobile'];?>"readonly>
                    </div>
                  </div>
				   <div class="form-group row">
                    <label for="inputrole" class="col-sm-2 col-form-label">USER ROLE</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="role" id="role" readonly>
					  
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
					<input type="text" class="form-control" name="department" id="department" value="<?php echo  $row['name'];?>"readonly>
                    </div>
                  </div>
				  
				   <div class="form-group row">
                    <label for="inputdisgnation" class="col-sm-2 col-form-label">DIVISION</label>
					<div class="col-sm-4">
					<input type="text" class="form-control" name="Designation" id="Designation" value="<?php echo  $row['Designation_name'];?>"readonly>
                    </div>
                  </div>
				
				  
				  <div class="form-group row">
                    <label for="inputusername" class="col-sm-2 col-form-label">USERNAME</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="username" id="username" value="<?php echo  $row['username'];?>"readonly>
                    </div>
                  </div>
				  
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">PASSWORD</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="Password" id="inputPassword3" value="<?php echo  $row['passworrd'];?>"readonly>
                    </div>
                  </div>
				
                 <div class="form-group row">
                    <label for="inputgender" class="col-sm-2 col-form-label">STATUS </label>
                    <div class="col-sm-4">
					<?php if($row['employee_status']==1){
						?>
                      <input type="text" class="form-control" name="status" id="status" value="Active" readonly>
					<?php } else { ?>
					<input type="text" class="form-control" name="status" id="status" value="In Active" readonly>
						<?php
					}
					?>
                    </div>
                  </div>
			<br>
			
	<?php if($row['employee_status']==1) {?> <input type="button" class="btn btn-success"  style="float:left;" name="Update" onclick="emp_accept()" value="ACCEPT" value="<?php echo $row['emp_id'];?>"> <?php }?>
				  
<?php if($row['employee_status']==1) {?><input type="button" class="btn btn-danger"  style="float:left;" name="Rejected" onclick="emp_rejected()" value="REJECTED" value="<?php echo $row['emp_id'];?>">  <?php }?>


                  
                </div>
               
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
	
 function emp_accept()
    {
    var id=$('#get_id').val();
 var data = $('form').serialize();
    $.ajax({
    type:'GET',
    data:"id="+id, data,
	
    url:'Tickets/Employee/accept_emp.php',
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
	
	function emp_rejected()
    {
    var id=$('#get_id').val();
 var data = $('form').serialize();
    $.ajax({
    type:'GET',
    data:"id="+id, data,
	
    url:'Tickets/Employee/rejected_emp.php',
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
	