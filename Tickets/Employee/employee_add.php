<?php
require '../../connect.php';
include("../../user.php");
$stmt = $con->prepare("SELECT * FROM `masters_company`"); 
$stmt->execute(); 
$row = $stmt->fetch();
?>
<div  class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><font size="5">EMPLOYEE ADD</font></h3>
				<a onclick="back()" style="float: right;" data-toggle="modal" class="btn btn-warning"></i>Back</a>
              </div>
              
<form class="form-horizontal" method="POST" action="Tickets/Employee/employee_submit.php">
         
                <div class="card-body">
				<div class="form-group row">
                    <label for="inputusername" class="col-sm-2 col-form-label">COMPANY NAME</label>
                    <div class="col-sm-4">
					<input type="hidden" class="form-control" name="cmp_id" id="cmp_id" value="<?php echo  $row['id'];?>" readonly>
					 <input type="text" class="form-control" name="C_NAME" id="C_NAME" value="<?php echo  $row['company_name'];?>" readonly>
                   
                    </div>
                  </div>
				   <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">NAME</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="name" id="name" placeholder="Enter the name" required>
                    </div>
                  </div>
				  	   <div class="form-group row">
                    <label for="inputgender" class="col-sm-2 col-form-label">GENDER</label>
                    <div class="col-sm-4">
				  <select  name="gender" id="gender" class="form-control" required>
  <option value="">Select</option>
  <option value="1">Male</option>
  <option value="2">Female</option>
  
</select>
</div>
   </div>
   <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">DATE OF BIRTH</label>
                    <div class="col-sm-4">
                      <input type="date" class="form-control" name="dob" id="dob" placeholder="Enter the name" required>
                    </div>
                  </div>
				      <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">EMAIL ID</label>
                    <div class="col-sm-4">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Enter the Email" required>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputnumber" class="col-sm-2 col-form-label">MOBILE  NUMBER</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="Enter the contact number" required>
                    </div>
                  </div>
				 
				  <div class="form-group row">
                    <label for="inputDepartment" class="col-sm-2 col-form-label">DEPARTMENT</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="department" id="department" required>
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
                     <select class="form-control" name="division" id="division" required>
					  <option value="">Select DIVISION</option>
					 
					
</select>
                    </div>
                  </div>
				    
				  <div class="form-group row">
                    <label for="inputrole" class="col-sm-2 col-form-label">USER ROLE</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="role" id="role" required>
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
                    <label for="inputusername" class="col-sm-2 col-form-label">USERNAME</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="username" id="username" placeholder="Enter the username" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">PASSWORD</label>
                    <div class="col-sm-4">
                      <input type="password" class="form-control" name="Password" id="inputPassword3" placeholder="Password" required>
                    </div>
                  </div>
				<div class="form-group row">
                    <label for="inputstatus" class="col-sm-2 col-form-label">STATUS</label>
                    <div class="col-sm-1">
                      <input type="checkbox" class="form-control" name="status" id="status" value="1" placeholder="Enter the Project name" required>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
				
				
				
                <div class="card-footer">
				<a onclick="back()" style="float:right;"  data-toggle="modal" class="btn btn-danger">cancel</a>
				   <button type="submit" name="submit" style="float:right;" class="btn btn-success">Submit</button>
                 	
                </div>
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
	$(document).ready(function() {
$('#department').on('change', function() {

var department_id = this.value;
//alert(department_id);
$.ajax({
url: "Tickets/Employee/find_designation.php",
type: "POST",
data: {
department_id: department_id
},
cache: false,
success: function(result){
$("#division").html(result);

}
});
});


$('#division').on('change', function() {
var division_id = this.value;
alert(division_id);
$.ajax({
url: "Tickets/Employee/find_hod.php",
type: "POST",
data: {
division_id: division_id
},
cache: false,
success: function(result){
$("#hod").html(result);
}
});
});
});
	</script>