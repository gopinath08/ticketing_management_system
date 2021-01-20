<?php
require '../../connect.php';
include("../../user.php");
$id=$_REQUEST['id'];
$stmt = $con->prepare("SELECT * FROM `masters_client` where client_id='$id'"); 
$stmt->execute(); 
$row = $stmt->fetch();
?>

<div  class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><font size="5">CLIENT EDIT</font></h3>
				
				<a onclick="back()" style="float: right;" data-toggle="modal" class="btn btn-dark"></i>Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
<form role="form" name="" action="" method="post" enctype="multipart/type">
         
                <div class="card-body">
				 <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">CLIENT NAME</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="name" id="name" value="<?php echo  $row['client_name'];?>" required>
                  </div>
				  </div>
				   		<div class="form-group row">
                    <label for="inputcode" class="col-sm-2 col-form-label">CODE</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="code" id="code" value="<?php echo  $row['code'];?>" required>
                    </div>
                  </div>		  
                  
				    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">EMAIL ID ID</label>
                    <div class="col-sm-4">
                      <input type="email" class="form-control" name="email" id="email" value="<?php echo  $row['email'];?>">
                    </div>
                  </div>
				  
				  <div class="form-group row">
                    <label for="inputnumber" class="col-sm-2 col-form-label">MOBILE NUMBER</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="mobile_number" id="mobile_number" value="<?php echo  $row['mobile'];?>" required>
                    </div>
                  </div>
				   <div class="form-group row">
                    <label for="inputbox" class="col-sm-2 col-form-label"> BOX NUMBER</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="box_no" id="box_no" value="<?php echo  $row['box_no'];?>" required>
                    </div>
                  </div>
				
				  <div class="form-group row">
                    <label for="inputGST" class="col-sm-2 col-form-label"> GST NUMBER</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="Gst_number" id="Gst_number" value="<?php echo  $row['Gst_number'];?>" required>
                    </div>
                  </div>
				      <div class="form-group row">
                    <label for="inputpan_number" class="col-sm-2 col-form-label"> PAN NUMBER</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="pan_number" id="pan_number" value="<?php echo  $row['pan_number'];?>">
                    </div>
				 </div>
				<div class="form-group row">
                    <label for="STREET" class="col-sm-2 col-form-label"> STREET</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="street" id="street"value="<?php echo  $row['street'];?>" required>
                    </div>
                  </div>
				    <div class="form-group row">
                    <label for="area" class="col-sm-2 col-form-label">AREA</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="area" id="area" value="<?php echo  $row['area'];?>" required>
                    </div>
                  </div>
				    <div class="form-group row">
                    <label for="city" class="col-sm-2 col-form-label">CITY</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="city" id="city" value="<?php echo  $row['city'];?>">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputpan_number" class="col-sm-2 col-form-label"> STATE</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="state" id="state"value="<?php echo  $row['state'];?>" required>
                    </div>
                  </div>
				   <div class="form-group row">
                    <label for="pin" class="col-sm-2 col-form-label"> PINCODE	</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="pin" id="pin" value="<?php echo  $row['pin'];?>" required>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputusername" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-4">
					<input type="hidden" class="form-control" id="get_id" name="get_id" value="<?php echo  $row['client_id']; ?>">
                      <input type="text" class="form-control" name="username" id="username" value="<?php echo  $row['city'];?>" required>
                    </div>
                  </div>
				  
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-4">
                      <input type="password" class="form-control" name="Password" id="inputPassword3" value="<?php echo  $row['passworrd'];?>" required>
                    </div>
                  </div>
				<div class="form-group row">
                    <label for="inputstatus" class="col-sm-2 col-form-label">STATUS</label>
                    <div class="col-sm-4">
				  <select  name="status" id="status" class="form-control">
 <?php
 if($row['client_status']==1) {
 
 ?>
  <option value="1">WAITING FOR APPROVAL</option>
  <option value="2">APPROVED</option>
  <option value="3">REJECTED</option>
  
 <?php  } else if($row['client_status']==2) {
	 ?>
	 <option value="2">APPROVED</option>
  <option value="3"> REJECTED</option>
   <option value="1"> WAITING FOR APPROVAL</option>
  <?php
 } else if($row['client_status']==3){
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
                 
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="button" class="btn btn-primary btn-md"  style="float:left;" name="Update" onclick="emp_update()" value="Update"> 
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
		url:"Tickets/Client/client_view.php",
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
	
    url:'Tickets/Client/client_update.php',
    success:function(data)
    {
      if(data==1)
      { 
        alert('Not');
      
      }
      else
      {
        alert("Update Successfully");
		client()
      }
      
    }       
    });
    }
	</script>
	