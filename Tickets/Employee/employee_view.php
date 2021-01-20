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
                <h3 class="card-title"><font size="5">EMPLOYEE LIST</font></h3>
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
					<th>Division</th>
					<th>STATUS</th>
					 <th>Action</th>
                  </tr>
                  </thead>
                  <tbody font size="5">
<?php

$sql=$con->query("SELECT * FROM `masters_employee`
INNER JOIN role_master ON masters_employee.role_id=role_master.id
INNER JOIN division ON masters_employee.division_id=division.id
INNER JOIN masters_department ON masters_employee.department_id=masters_department.id");
$cnt=1;
 while($empdetails = $sql->fetch(PDO::FETCH_ASSOC))
{
	$emp_id = $empdetails['emp_id'] ;
?>

<tr>
<td><?php echo $cnt;?>.</td>
<td><?php echo $empdetails['emp_name'];?></td>
<td><?php echo $empdetails['email'];?></td>
<td><?php echo $empdetails['mobile'];?></td>
<td><?php echo $empdetails['role_name'];?></td>
<td><?php echo $empdetails['name'];?></td>
<td><?php echo $empdetails['Designation_name'];?></td>
<td>
	  <?php 
	  if($empdetails['employee_status'] ==1)
	  {
		  
	  echo '<span style="color:blue;text-align:center;"><b>WAITING FOR APPROVAL</b></span>';
	  ?>
	  <?php }else if($empdetails['employee_status'] ==2){
		  
		 echo '<span style="color:green;text-align:center;"><b>APPROVED</b></span>';
		 ?>
      <?php } else {
		  
		  echo '<span style="color:red;text-align:center;"><b>REJECTED</b></span>';
		  ?>
	  <?php  } ?>
	  
     </td>
<td>
<button class="btn btn-light btn-sm" data-id="<?php echo $empdetails['emp_id']; ?>" onclick="employee_view(<?php echo $empdetails['emp_id']; ?>)"><i class="fa fa-eye"></i> </button>

							<button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $empdetails['emp_id']; ?>" onclick="emp_edit(<?php echo $empdetails['emp_id']; ?>)"><i class="fa fa-edit"></i> Edit</button>
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
	url:"Tickets/Employee/employee_edit.php?id="+v,
	success:function(data)
	{
		$("#main_content").html(data);
	}
	})
}

  function employee_view(v){
		//alert(v);
	$.ajax({
	type:"POST",
	url:"Tickets/Employee/employee_details_show.php?id="+v,
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
		url:"Tickets/Employee/employee_add.php",
		success:function(data){
		$("#main_content").html(data);
		}
		})
	}
</script>
