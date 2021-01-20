<?php
require '../../connect.php';
include("../../user.php");
$id=$_REQUEST['id'];
$stmt = $con->prepare("SELECT * FROM `masters_project`

where client_id='$id'"); 
$stmt->execute(); 
$row = $stmt->fetch();
?>
<div  class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Project DETAILS </h3>
				<a onclick="back()" style="float: right;" data-toggle="modal" class="btn btn-dark"></i>Back</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <font size="6">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                <div class="card-body">
				  <div class="form-group row">
                    <label for="inputcompany_id" class="col-sm-2 col-form-label">COMPANY NAME</label>
                    <div class="col-sm-4">
				  :<label for="inputname" class="col-sm-6 col-form-label"><?php echo  $row['company_id'];?></label>
						<input type="hidden" class="form-control" id="get_id" name="get_id" value="<?php echo  $row['company_id']; ?>">
                     
                  </div>
				  </div>
				  <div class="form-group row">
                    <label for="inputclient_id" class="col-sm-2 col-form-label">CLIENT NAME</label>
                    <div class="col-sm-4">
				  :<label for="inputname" class="col-sm-6 col-form-label"><?php echo  $row['client_id'];?></label>
						<input type="hidden" class="form-control" id="get_id" name="get_id" value="<?php echo  $row['client_id']; ?>">
                     
                  </div>
				  </div>
				   <div class="form-group row">
                    <label for="inputproject_name" class="col-sm-2 col-form-label">PROJECT NAME</label>
                    <div class="col-sm-4">
                    :<label for="inputname" class="col-sm-6 col-form-label"><?php echo  $row['project_name'];?></label>
                    </div>
                  </div>
				    <div class="form-group row">
                    <label for="inputdepartment_id" class="col-sm-2 col-form-label">DEPARTMENT NAME</label>
                    <div class="col-sm-4">
                      :<label for="inputname" class="col-sm-10 col-form-label"><?php echo  $row['department_id'];?></label>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputdivision_id" class="col-sm-2 col-form-label">DIVISION NAME</label>
                    <div class="col-sm-4">
                            :<label for="inputname" class="col-sm-6 col-form-label"><?php echo  $row['division_id'];?></label>
                    </div>
                  </div>
				   <div class="form-group row">
                    <label for="inputhod_id" class="col-sm-2 col-form-label">HOD NAME</label>
                    <div class="col-sm-4">
                     <div class="col-sm-4">
                            :<label for="inputname" class="col-sm-6 col-form-label"><?php echo  $row['hod_id'];?></label>
                    </div>
                  </div>
				 
				
				
			<div class="form-group row">
                    <label for="inputstatus" class="col-sm-2 col-form-label">Status </label>
                    <div class="col-sm-4">
					  
					<?php if($row['status']==2){
						?>
						:<label for="inputname" class="col-sm-6 col-form-label">active</label>
                      
					<?php } else { ?>
					:<label for="inputname" class="col-sm-6 col-form-label">inactive</label>
					
						<?php
					}
					?>
                    </div>
                  </div>
				  <br>
			
			
	
                </div>
               
              </form>
            </div>
			
			<script>
	function back()
	{
		$.ajax({
		type:"POST",
		url:"Tickets/Project_master/project_view.php",
		success:function(data){
		$("#main_content").html(data);
		}
		})
	}
	
 
	