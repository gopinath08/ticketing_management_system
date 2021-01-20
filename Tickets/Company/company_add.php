<?php
require '../../connect.php';
include("../../user.php");

?>
 <div  class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">COMPANY ADD</h3>
				<a onclick="back()" style="float: right;" data-toggle="modal" class="btn btn-warning"></i>Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
<form class="form-horizontal" method="POST" action="Tickets/Company/company_submit.php">
         
                <div class="card-body">
				 
				  
				   
				  
				 <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="name" id="name" placeholder="Enter the company name" required>
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
		url:"Tickets/Company/company_view.php",
		success:function(data){
		$("#main_content").html(data);
		}
		})
	}
	</script>