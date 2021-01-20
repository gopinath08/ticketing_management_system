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
                <h3 class="card-title"><font size="5">PROJECT LIST</font> </h3>
			<a onclick="add()" style="float: right;" data-toggle="modal" class="btn btn-dark"><i class="fa fa-plus"></i> ADD</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			 
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
					<th>COMPANY NAME</th>
					<th>CLIENT NAME</th>
                    <th>PROJECT NAME</th>
					<th>DEPARTMENT NAME</th>
					<th>DIVISION NAME</th>
					<th>HOD NAME</th>
					<th>STATUS</th>
                    
					 <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
<?php

$sql=$con->query("SELECT masters_project.id as master_id,masters_project.Project_name,masters_project.status,masters_company.company_name,masters_client.client_name,division.Designation_name,masters_department.name,masters_employee.emp_name FROM `masters_project`
LEFT JOIN masters_employee ON masters_project.hod_id=masters_employee.emp_id
LEFT JOIN masters_client ON masters_project.client_id=masters_client.client_id
LEFT JOIN masters_company ON masters_project.company_id = masters_company.id
LEFT JOIN masters_department ON masters_project.department_id=masters_department.id
left JOIN division ON masters_project.division_id=division.id");
$cnt=1;
 while($project_details = $sql->fetch(PDO::FETCH_ASSOC))
{
	//$id = $project_details['ms_pt_id'] ;
?>
<tr>
<td><?php echo $cnt;?>.</td>
<td><?php echo $project_details['company_name'];?></td>
<td><?php echo $project_details['client_name'];?></td>
<td><?php echo $project_details['Project_name'];?></td>
<td><?php echo $project_details['name'];?></td>
<td><?php echo $project_details['Designation_name'];?></td>
<td><?php echo $project_details['emp_name'];?></td>
<td>
	  <?php 
	  if($project_details['status'] ==1)
	  {
		  
	  echo '<span style="color:green;text-align:center;"><b>Active</b></span>';
	  ?>
	  <?php }else {
		  
		 echo '<span style="color:red;text-align:center;"><b>INActive</b></span>';
		 ?>
      <?php }?>
	 
	  
     </td>
<td>


							<button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $project_details['master_id']; ?>" onclick="project_edit(<?php echo $project_details['master_id']; ?>)"><i class="fa fa-edit"></i> Edit</button>
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

   function project_edit(v){
	//alert(v);
	$.ajax({
	type:"POST",
	url:"Tickets/Project_master/project_edit.php?id="+v,
	success:function(data)
	{
		$("#main_content").html(data);
	}
	})
}

  function project_view(v){
		//alert(v);
	$.ajax({
	type:"POST",
	url:"Tickets/Project_master/project_details_show.php?id="+v,
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
		url:"Tickets/Project_master/project_add.php",
		success:function(data){
		$("#main_content").html(data);
		}
		})
	}
</script>
