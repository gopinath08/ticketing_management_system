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
                <h3 class="card-title"><font size="5">DIVISION LIST </font></h3>
			<a onclick="add()" style="float: right;" data-toggle="modal" class="btn btn-dark"><i class="fa fa-plus"></i> ADD</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			 
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
					<th>DEPARTMENT NAME</th>
                    <th>DIVISION NAME</th>
					<th>STATUS</th>
                    
					 <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
<?php

$sql=$con->query("SELECT * FROM `division` INNER JOIN masters_department ON division.department_id = masters_department.id
 ");
$cnt=1;
 while($designation_details = $sql->fetch(PDO::FETCH_ASSOC))
{
	$id = $designation_details['id'] ;
?>
<tr>
<td><?php echo $cnt;?>.</td>
<td><?php echo $designation_details['name'];?></td>
<td><?php echo $designation_details['Designation_name'];?></td>
<td>
	  <?php 
	  if($designation_details['division_status'] ==1)
	  {
		  
	  echo '<span style="color:green;text-align:center;"><b>Active</b></span>';
	  ?>
	  <?php }else {
		  
		 echo '<span style="color:red;text-align:center;"><b>INActive</b></span>';
		 ?>
      <?php }?>
	 
	  
     </td>
<td>

							<button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $designation_details['id']; ?>" onclick="designation_edit(<?php echo $designation_details['id']; ?>)"><i class="fa fa-edit"></i> Edit</button>
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
	url:"Tickets/Designation/desgination_edit.php?id="+v,
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
		url:"Tickets/Designation/designation_add.php",
		success:function(data){
		$("#main_content").html(data);
		}
		})
	}
</script>
