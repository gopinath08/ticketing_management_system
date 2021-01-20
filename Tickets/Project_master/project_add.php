<?php
require '../../connect.php';
include("../../user.php");
$stmt = $con->prepare("SELECT * FROM `masters_company`"); 
$stmt->execute(); 
$row = $stmt->fetch();
?>
<div  class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">PROJECT ADD</h3>
				<a onclick="back()" style="float: right;" data-toggle="modal" class="btn btn-warning"></i>Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
<form class="form-horizontal" method="POST" action="Tickets/Project_master/project_submit.php">
         
                <div class="card-body">
				 
				  <div class="form-group row">
                    <label for="inputusername" class="col-sm-2 col-form-label">COMPANY NAME</label>
                    <div class="col-sm-4">
					 <input type="hidden" class="form-control" name="cmp_id" id="cmp_id" value="<?php echo  $row['id'];?>" readonly>
					 <input type="text" class="form-control" name="C_NAME" id="C_NAME" value="<?php echo  $row['company_name'];?>" required>
                   
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputclient" class="col-sm-2 col-form-label">CLIENT NAME</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="client" id="client" required>
					  <option value="">SELECT CLIENT</option>
					  <?php
$sql=$con->query("SELECT * FROM masters_client");
      $i=1;
      while($cmp = $sql->fetch(PDO::FETCH_ASSOC))
      {
		  ?>
		  <option value="<?php echo $cmp['client_id'];?>"><?php echo $cmp['client_name'];?></option>
		  <?php
	  }
		  ?>
					  </select>
                    </div>
                  </div>
				 <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">Project Name</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="name" id="name" placeholder="Enter the Project name" required>
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
					
</select>
                    </div>
                  </div>
				  
                  <div class="form-group row">
                    <label for="inputusername" class="col-sm-2 col-form-label">HOD</label>
                    <div class="col-sm-4">
					
					 <select class="form-control" name="hod" id="hod">
</select>
                   
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-success">Submit</button>
				  <a onclick="back()" style="float:left;"  data-toggle="modal" class="btn btn-danger">Cancel</a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
			
			<script>
	function back()
	{
		$.ajax({
		type:"POST",
		url:"Tickets/Project_master/Project_view.php",
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
$('#hod').html('<option value="">Select Division First</option>');

}
});
});
$('#division').on('change', function() {
var division_id = this.value;
//alert(division_id);
$.ajax({
url: "Tickets/Project_master/find_hod.php",
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