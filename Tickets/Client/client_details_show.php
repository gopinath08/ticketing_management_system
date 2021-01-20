<?php
require '../../connect.php';
include("../../user.php");
$id=$_REQUEST['id'];
$stmt = $con->prepare("SELECT * FROM `masters_client`

where client_id='$id'"); 
$stmt->execute(); 
$row = $stmt->fetch();
?>
 <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">CLIENT DETAILS </h3>
				<a onclick="back()" style="float: right;" data-toggle="modal" class="btn btn-dark">Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
<form role="form" name="" action="" method="post" enctype="multipart/type">
         
                <div class="card-body">
				  <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">CLIENT NAME</label>
                    <div class="col-sm-4">
					<input type="hidden" class="form-control" id="get_id" name="get_id" value="<?php echo  $row['client_id']; ?>">
                      <input type="text" class="form-control" name="name" id="name" value="<?php echo  $row['client_name'];?>"readonly>
                  </div>
				  </div>
				   		<div class="form-group row">
                    <label for="inputcode" class="col-sm-2 col-form-label">CODE</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="code" id="code" value="<?php echo  $row['code'];?>"readonly>
                    </div>
                  </div>		  
                  
				    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">EMAIL ID</label>
                    <div class="col-sm-4">
                      <input type="email" class="form-control" name="email" id="email" value="<?php echo  $row['email'];?>"readonly>
                    </div>
                  </div>
				  
				  <div class="form-group row">
                    <label for="inputnumber" class="col-sm-2 col-form-label">MOBILE NUMBER</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="mobile_number" id="mobile_number" value="<?php echo  $row['mobile'];?>"readonly>
                    </div>
                  </div>
				   <div class="form-group row">
                    <label for="inputbox" class="col-sm-2 col-form-label"> BOX NUMBER</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="box_no" id="box_no" value="<?php echo  $row['box_no'];?>"readonly>
                    </div>
                  </div>
				
				  <div class="form-group row">
                    <label for="inputGST" class="col-sm-2 col-form-label"> GST NUMBER</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="Gst_number" id="Gst_number" value="<?php echo  $row['Gst_number'];?>"readonly>
                    </div>
                  </div>
				      <div class="form-group row">
                    <label for="inputpan_number" class="col-sm-2 col-form-label"> PAN NUMBER</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="pan_number" id="pan_number" value="<?php echo  $row['pan_number'];?>"readonly>
                    </div>
				 </div>
				<div class="form-group row">
                    <label for="STREET" class="col-sm-2 col-form-label"> STREET</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="street" id="street"value="<?php echo  $row['street'];?>"readonly>
                    </div>
                  </div>
				    <div class="form-group row">
                    <label for="area" class="col-sm-2 col-form-label">AREA</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="area" id="area" value="<?php echo  $row['area'];?>"readonly>
                    </div>
                  </div>
				    <div class="form-group row">
                    <label for="city" class="col-sm-2 col-form-label">CITY</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="city" id="city" value="<?php echo  $row['city'];?>"readonly>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputpan_number" class="col-sm-2 col-form-label"> STATE</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="state" id="state"value="<?php echo  $row['state'];?>"readonly>
                    </div>
                  </div>
				   <div class="form-group row">
                    <label for="pin" class="col-sm-2 col-form-label"> PINCODE	</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="pin" id="pin" value="<?php echo  $row['pin'];?>"readonly>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputusername" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="username" id="username" value="<?php echo  $row['username'];?>"readonly>
                    </div>
                  </div>
				  
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="Password" id="inputPassword3" value="<?php echo  $row['passworrd'];?>"readonly>
                    </div>
                  </div>
				
                 <div class="form-group row">
                    <label for="inputgender" class="col-sm-2 col-form-label">Status </label>
                    <div class="col-sm-4">
					<?php if($row['client_status']==1){
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
			
	<?php if($row['client_status']==1) {?> <input type="button" class="btn btn-success"  style="float:left;" name="Update" onclick="client_accept()" value="ACCEPT" value="<?php echo $row['client_id'];?>"> <?php }?>
				  
<?php if($row['client_status']==1) {?><input type="button" class="btn btn-danger"  style="float:left;" name="Rejected" onclick="client_rejected()" value="REJECTED" value="<?php echo $row['client_id'];?>">  <?php }?>
				   
                  
                </div>
               
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
	
 function client_accept()
    {
    var id=$('#get_id').val();
 var data = $('form').serialize();
    $.ajax({
    type:'GET',
    data:"id="+id, data,
	
    url:'Tickets/Client/accept_client.php',
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
	
	function client_rejected()
    {
    var id=$('#get_id').val();
 var data = $('form').serialize();
    $.ajax({
    type:'GET',
    data:"id="+id, data,
	
    url:'Tickets/Client/rejected_client.php',
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