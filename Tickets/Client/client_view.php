<?php
require '../../connect.php';
include("../../user.php");

?>
<style>
td {
  font-size: 20px;
}
</style>
<div  class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><font size="5">CLIENT LIST</font> </h3>
			<a onclick="add()" style="float: right;" data-toggle="modal" class="btn btn-dark"><i class="fa fa-plus"></i> ADD</a>
			
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			 
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>CLIENT NAME</th>
					<th>EMAIL</th>
                    <th>CONTACT NUMBER</th>
					 <th>CODE</th>
                    
                    <th>GST NUMBER</th>
					<th>PAN NUMBER</th>
					<th>STATUS</th>
					 <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
<?php

$sql=$con->query("SELECT * FROM `masters_client`");
$cnt=1;
 while($empdetails = $sql->fetch(PDO::FETCH_ASSOC))
{
	$emp_id = $empdetails['client_id'] ;
?>
<tr>
<td><?php echo $cnt;?>.</td>
<td><?php echo $empdetails['client_name'];?></td>
<td><?php echo $empdetails['email'];?></td>
<td><?php echo $empdetails['mobile'];?></td>
<td><?php echo $empdetails['code'];?></td>
<td><?php echo $empdetails['Gst_number'];?></td>
<td><?php echo $empdetails['pan_number'];?></td>
<td>
	  <?php 
	  if($empdetails['client_status'] ==1)
	  {
		  
	  echo '<span style="color:blue;text-align:center;"><b>WAITING FOR APPROVAL</b></span>';
	  ?>
	  <?php }else if($empdetails['client_status'] ==2){
		  
		 echo '<span style="color:green;text-align:center;"><b>APPROVED</b></span>';
		 ?>
      <?php } else {
		  
		  echo '<span style="color:red;text-align:center;"><b>REJECTED</b></span>';
		  ?>
	  <?php  } ?>
	  
     </td>

<td>
<button class="btn btn-light btn-sm" data-id="<?php echo $empdetails['client_id']; ?>" onclick="client_view(<?php echo $empdetails['client_id']; ?>)"><i class="fa fa-eye"></i> </button>

							<button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $empdetails['client_id']; ?>" onclick="client_edit(<?php echo $empdetails['client_id']; ?>)"><i class="fa fa-edit"></i> Edit</button>
</td>

</tr>
<?php 
$cnt=$cnt+1;
 }?></tbody>
                  
                </table>
				
              </div>
              <!-- /.card-body -->
            </div>
			<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

   function client_edit(v){
		//alert(v);
	$.ajax({
	type:"POST",
	url:"Tickets/Client/client_edit.php?id="+v,
	success:function(data)
	{
		$("#main_content").html(data);
	}
	})
}

  function client_view(v){
		//alert(v);
	$.ajax({
	type:"POST",
	url:"Tickets/Client/client_details_show.php?id="+v,
	success:function(data)
	{
		$("#main_content").html(data);
	}
	})
}
function add()
	{
		$.ajax({
		type:"POST",
		url:"Tickets/Client/client_add.php",
		success:function(data){
		$("#main_content").html(data);
		}
		})
	}
</script>
