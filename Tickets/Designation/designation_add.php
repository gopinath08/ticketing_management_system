<?php
require '../../connect.php';
include("../../user.php");

?>
<div  class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">DESIGNATION ADD</h3>
				<a onclick="back()" style="float: right;" data-toggle="modal" class="btn btn-warning"></i>Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
<form class="form-horizontal" method="POST" action="Tickets/Designation/designation_submit.php">
         
                <div class="card-body">
				 
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
                    <label for="inputname" class="col-sm-2 col-form-label">Division</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="name" id="name" placeholder="Enter the Designation name" required>
                    </div>
                  </div>
                  
     <div class="form-group row">
                    <label for="inputstatus" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-1">
                      <input type="checkbox" class="form-control" name="status" id="status" value="1" placeholder="Enter the Project name" required>
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
		url:"Tickets/Designation/designation_view.php",
		success:function(data){
		$("#main_content").html(data);
		}
		})
	}
	</script>