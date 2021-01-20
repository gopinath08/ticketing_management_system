<?php
require '../../connect.php';
include("../../user.php");
$id=$_REQUEST['id'];
$stmt = $con->prepare("SELECT mp.id as ms_pt_id,mc.company_name,mc.id as company_id,ml.client_name,mp.Project_name,md.name,d.Designation_name,me.emp_name,mp.status, mp.client_id as ms_ct_id,mp.department_id as ms_dt_id,mp.division_id as ms_cd_id,mp.hod_id as ms_hd_id  FROM `masters_project` mp
INNER JOIN masters_employee me ON mp.hod_id=me.emp_id
INNER JOIN masters_client ml ON mp.company_id=ml.client_id
 INNER JOIN masters_company mc ON mp.company_id=mc.id
INNER JOIN masters_department md ON mp.department_id=md.id
INNER JOIN division d ON mp.division_id=d.id
 where mp.id='$id'"); 
$stmt->execute(); 
$row = $stmt->fetch();
?>

<div  class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><font size="5">PROJECT EDIT</font></h3>
				
				<a onclick="back()" style="float: right;" data-toggle="modal" class="btn btn-dark"></i>Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
<form role="form" name="" action="" method="post" enctype="multipart/type">
         
                <div class="card-body">
				 
				 
				    
				  <div class="form-group row">
                    <label for="inputusername" class="col-sm-2 col-form-label">COMPANY NAME</label>
                    <div class="col-sm-4">
					 <input type="hidden" class="form-control" name="cmp_id" id="cmp_id" value="<?php echo  $row['company_id'];?>" readonly>
					 <input type="text" class="form-control" name="C_NAME" id="C_NAME" value="<?php echo  $row['company_name'];?>" required>
                   
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputclient" class="col-sm-2 col-form-label">CLIENT NAME</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="client" id="client" required>
					
					  <?php
					  $masters_client=$row['client_id'];
$sql=$con->query("SELECT * FROM masters_client where client_id='$masters_client'");

$stmt->execute(); 
$row1 = $stmt->fetch();
?>
<option value="<?php echo $row1['ms_ct_id'];?>"><?php echo $row1['client_name'];?>
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
                    <label for="inputname" class="col-sm-2 col-form-label">PROJECT NAME</label>
                    <div class="col-sm-4">
					<input type="hidden" class="form-control" id="get_id" name="get_id" value="<?php echo  $_REQUEST['id']; ?>" readonly>
                      <input type="text" class="form-control" name="name" id="name" value="<?php echo  $row['Project_name'];?>" required>
                  </div>
				  </div>
                  <div class="form-group row">
                  <label for="inputdisgnation" class="col-sm-2 col-form-label">DEPARTMENT</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="department" id="department">
					   <?php
					  $department_id=$row['ms_dt_id'];
$sql=$con->query("SELECT * FROM masters_department where ms_dt_id='$department_id'");
$stmt->execute(); 
$row1 = $stmt->fetch();
?>
<option value="<?php echo $row1['ms_dt_id'];?>"><?php echo $row1['name'];?></option>			
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
					<?php
					  $division=$row['ms_cd_id'];
$sql=$con->query("SELECT * FROM division where ms_cd_id='$division'");
$stmt->execute(); 
$row1 = $stmt->fetch();
?>
<option value="<?php echo $row1['ms_cd_id'];?>"><?php echo $row1['Designation_name'];?></option>			
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
                    <label for="inputusername" class="col-sm-2 col-form-label">HOD</label>
                    <div class="col-sm-4">
					
				<select class="form-control" name="hod" id="hod" required>
				<?php
					  $hod_id=$row['ms_hd_id'];
$sql=$con->query("SELECT * FROM masters_employee where ms_hd_id='$hod_id' AND role_id=4");
$stmt->execute(); 
$row1 = $stmt->fetch();
?>
<option value="<?php echo $row1['ms_hd_id'];?>"><?php echo $row1['emp_name'];?></option>			
			<?php
$sql=$con->query("SELECT * FROM masters_employee");
      $i=1;
      while($cmp = $sql->fetch(PDO::FETCH_ASSOC))
      {
		  ?>
		  <option value="<?php echo $cmp['emp_id'];?>"><?php echo $cmp['emp_name'];?></option>
		  <?php
	  }
		  ?>
</select>
                   
                    </div>
                  </div>
				   <div class="form-group row">
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
   </div>
       
				   
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
				<input type="button" class="btn btn-primary btn-md"  style="float:left;" name="Update" onclick="project_update()" value="Update"> 
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
 function project_update()
    {
    var id=$('#get_id').val();
	//alert(id);
   
    var data = $('form').serialize();
    $.ajax({
    type:'GET',
    data:"id="+id, data,
	
    url:'Tickets/Project_master/project_update.php',
    success:function(data)
    {
      if(data==1)
      { 
        alert('Not');
      
      }
      else
      {
        alert("Update Successfully");
		project()
      }
      
    }       
    });
    }
	
	</script>