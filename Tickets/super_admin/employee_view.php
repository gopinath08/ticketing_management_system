<?php
require '../../connect.php';
include("../../user.php");

?>
<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">EMPLOYEE LIST </h3>
			<a onclick="add()" style="float: right;" data-toggle="modal" class="btn btn-dark"><i class="fa fa-plus"></i> ADD</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>EMPLOYEE NAME</th>
					<th>EMAIL</th>
                    <th>CONTACT NUMBER</th>
					 <th>ROLE</th>
                    
                    <th>DEPARTMENT</th>
					<th>DESIGNATION</th>
					<th>STATUS</th>
					 <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
<?php

$sql=$con->query("SELECT * FROM `user_master`
INNER JOIN role_master ON user_master.role_master_id=role_master.id
INNER JOIN designation ON user_master.Designation_id=designation.id
INNER JOIN masters_department ON user_master.department_id=masters_department.id");
$cnt=1;
 while($empdetails = $sql->fetch(PDO::FETCH_ASSOC))
{
	$emp_id = $empdetails['user_id'] ;
?>
<tr>
<td><?php echo $cnt;?>.</td>
<td><?php echo $empdetails['full_name'];?></td>
<td><?php echo $empdetails['email_id'];?></td>
<td><?php echo $empdetails['mobile_no'];?></td>
<td><?php echo $empdetails['role_name'];?></td>
<td><?php echo $empdetails['name'];?></td>
<td><?php echo $empdetails['Designation_name'];?></td>
<td>
	  <?php 
	  if($empdetails['user_status'] ==1)
	  {
		  
	  echo '<span style="color:green;text-align:center;"><b>Active</b></span>';
	  ?>
	  <?php }else {
		  
		 echo '<span style="color:red;text-align:center;"><b>INActive</b></span>';
		 ?>
      <?php }?>
	 
	  
     </td>
<td>
<button class="btn btn-light btn-sm" data-id="<?php echo $empdetails['user_id']; ?>" onclick="employee_view(<?php echo $empdetails['user_id']; ?>)"><i class="fa fa-eye"></i> </button>

							<button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $empdetails['user_id']; ?>" onclick="emp_edit(<?php echo $empdetails['user_id']; ?>)"><i class="fa fa-edit"></i> Edit</button>
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

   function emp_edit(v){
		//alert(v);
	$.ajax({
	type:"POST",
	url:"Tickets/super_admin/employee_edit.php?id="+v,
	success:function(data)
	{
		$(".content").html(data);
	}
	})
}

  function employee_view(v){
		alert(v);
	$.ajax({
	type:"POST",
	url:"Tickets/super_admin/employee_details_show.php?id="+v,
	success:function(data)
	{
		$(".content").html(data);
	}
	})
}
function add()
	{
		$.ajax({
		type:"POST",
		url:"Tickets/super_admin/employee_add.php",
		success:function(data){
		$("#main_content").html(data);
		}
		})
	}
</script>
