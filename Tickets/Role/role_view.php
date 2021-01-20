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
                <h3 class="card-title"><font size="5">ROLE LIST</font> </h3>
			<a onclick="add()" style="float: right;" data-toggle="modal" class="btn btn-dark"><i class="fa fa-plus"></i> ADD</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			 
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>ROLE
 NAME</th>
					<th>STATUS</th>
                    
					 <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
<?php

$sql=$con->query("SELECT * FROM `role_master`");
$cnt=1;
 while($role_details = $sql->fetch(PDO::FETCH_ASSOC))
{
	$id = $role_details['id'] ;
?>
<tr>
<td><?php echo $cnt;?>.</td>
<td><?php echo $role_details['role_name'];?></td>
<td>
	  <?php 
	  if($role_details['status'] ==1)
	  {
		  
	  echo '<span style="color:green;text-align:center;"><b>Active</b></span>';
	  ?>
	  <?php }else {
		  
		 echo '<span style="color:red;text-align:center;"><b>INActive</b></span>';
		 ?>
      <?php }?>
	 
	  
     </td>
<td>

							<button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $role_details['id']; ?>" onclick="designation_edit(<?php echo $role_details['id']; ?>)"><i class="fa fa-edit"></i> Edit</button>
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

   function designation_edit(v){
		//alert(v);
	$.ajax({
	type:"POST",
	url:"Tickets/Role/role_edit.php?id="+v,
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
		url:"Tickets/Role/role_add.php",
		success:function(data){
		$("#main_content").html(data);
		}
		})
	}
</script>
