<?php
require '../../connect.php';
include("../../user.php");
$id=$_REQUEST['id'];
$stmt = $con->prepare("SELECT * FROM `masters_company`
 where id='$id'"); 
$stmt->execute(); 
$row = $stmt->fetch();
?>

<div  class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><font size="5">COMPANY EDIT</font></h3>
				
				<a onclick="back()" style="float: right;" data-toggle="modal" class="btn btn-dark"></i>Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
<form role="form" name="" action="" method="post" enctype="multipart/type">
         
                <div class="card-body">
				 
				 
				    
				 
                
				  <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">COMPANY NAME</label>
                    <div class="col-sm-4">
					
					<input type="hidden" class="form-control" id="get_id" name="get_id" value="<?php echo  $row['id']; ?>">
					<input type="text" class="form-control" id="name" name="name" value="<?php echo  $row['company_name']; ?>" required>
                  </div>
				  </div>
                   <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">COMPANY DETAILS</label>
                    <div class="col-sm-4">
					
					
					<input type="text" class="form-control" id="company_address" name="company_address" value="<?php echo  $row['company_address'];?>" required>
                  </div>
				  </div>
				   <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">COMPANY CONTACT</label>
                    <div class="col-sm-4">
					
					
					<input type="text" class="form-control" id="company_contact" name="company_contact" value="<?php echo  $row['company_contact']; ?>" required>
                  </div>
				  </div>
				  <!-- <div class="form-group row">
                    <label for="inputstatus" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-4">
				  <select  name="status" id="status" class="form-control">
 <?php
 if($row['status']==1) {
 
 ?>
  <option value="1">Active</option>
  <option value="2">In Active</option>
  
 <?php  } else if($row['status']==2) {
	 ?>
	 <option value="2">In Active</option>
  <option value="1">Active</option>
  <?php
 }
 ?>
</select>
</div>
   </div>-->
   
				
				  
                   
				   
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="button" class="btn btn-primary btn-md"  style="float:left;" name="Update" onclick="company_update()" value="Update"> 
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
 function company_update()
    {
    var id=$('#get_id').val();
	//alert(id);
   
    var data = $('form').serialize();
    $.ajax({
    type:'GET',
    data:"id="+id, data,
	
    url:'Tickets/Company/company_update.php',
    success:function(data)
    {
      if(data==1)
      { 
        alert('Not');
      
      }
      else
      {
        alert("Update Successfully");
		Company()
      }
      
    }       
    });
    }
	</script>