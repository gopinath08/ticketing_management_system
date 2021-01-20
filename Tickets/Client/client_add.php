<?php
require '../../connect.php';
include("../../user.php");
$stmt = $con->prepare("SELECT * FROM `masters_company`"); 
$stmt->execute(); 
$row = $stmt->fetch();
?>
<div  class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><font size="5">CLIENT ADD</font></h3>
				<a onclick="back()" style="float: right;" data-toggle="modal" class="btn btn-warning"></i>Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
<form class="form-horizontal" method="POST" action="Tickets/Client/client_submit.php">
         
                <div class="card-body">
				<div class="form-group row">
                    <label for="inputusername" class="col-sm-2 col-form-label">COMPANY NAME</label>
                    <div class="col-sm-4">
					 <input type="hidden" class="form-control" name="cmp_id" id="cmp_id" value="<?php echo  $row['id'];?>" readonly>
					 <input type="text" class="form-control" name="C_NAME" id="C_NAME" value="<?php echo  $row['company_name'];?>" required>
                   
                    </div>
                  </div>
				   <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">CLIENT NAME</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="name" id="name" placeholder="Enter the name" required>
                    </div>
                  </div>
				  	 
  <div class="form-group row">
                    <label for="inputcode" class="col-sm-2 col-form-label">CODE</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="code" id="code" placeholder="Enter the code" required>
                    </div>
                  </div>
				      <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">EMAIL ID</label>
                    <div class="col-sm-4">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Enter the Email" required>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputnumber" class="col-sm-2 col-form-label"> MOBILE NUMBER</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="Enter the contact number" required>
                    </div>
                  </div>
				<div class="form-group row">
                    <label for="inputbox" class="col-sm-2 col-form-label"> BOX NUMBER</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="box_no" id="box_no" placeholder="Enter the box number" required>
                    </div>
                  </div>
				
				  <div class="form-group row">
                    <label for="inputGST" class="col-sm-2 col-form-label"> GST NUMBER</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="Gst_number" id="Gst_number" placeholder="Enter the GST number" required>
                    </div>
                  </div>
				      <div class="form-group row">
                    <label for="inputpan_number" class="col-sm-2 col-form-label"> PAN NUMBER</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="pan_number" id="pan_number" placeholder="Enter the GST number" required>
                    </div>
                  </div>
				    <div class="form-group row">
                    <label for="STREET" class="col-sm-2 col-form-label"> STREET</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="street" id="street" placeholder="Enter the street number" required>
                    </div>
                  </div>
				    <div class="form-group row">
                    <label for="area" class="col-sm-2 col-form-label">AREA</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="area" id="area" placeholder="Enter the area number" required>
                    </div>
                  </div>
				    <div class="form-group row">
                    <label for="city" class="col-sm-2 col-form-label">CITY</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="city" id="city" placeholder="Enter the CITY number" required>
                    </div>
                  </div>
				    <div class="form-group row">
                    <label for="inputpan_number" class="col-sm-2 col-form-label"> STATE</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="state" id="state" placeholder="Enter the STATE number" required>
                    </div>
                  </div>
				   <div class="form-group row">
                    <label for="pin" class="col-sm-2 col-form-label"> PINCODE	</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="pin" id="pin" placeholder="Enter the pincode number" required>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputusername" class="col-sm-2 col-form-label">USERNAME</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="username" id="username" placeholder="Enter the username" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-4">
                      <input type="password" class="form-control" name="Password" id="inputPassword3" placeholder="Password" required>
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
		url:"Tickets/Client/client_view.php",
		success:function(data){
		$("#main_content").html(data);
		}
		})
	}
	</script>