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
                <h3 class="card-title"><font size="5">DEPARTMENT LIST </font></h3>
			<a onclick="add()" style="float: right;" data-toggle="modal" class="btn btn-dark"><i class="fa fa-plus"></i> ADD</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>DEPARTMENT NAME</th>
					<th>STATUS</th>
                    
					 <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
<?php

$sql=$con->query("SELECT * FROM `masters_department`");
$cnt=1;
 while($department_details = $sql->fetch(PDO::FETCH_ASSOC))
{
	$id = $department_details['id'] ;
?>
<tr>
<td><?php echo $cnt;?>.</td>
<td><?php echo $department_details['name'];?></td>
<td>
	  <?php 
	  if($department_details['status'] ==1)
	  {
		  
	  echo '<span style="color:green;text-align:center;"><b>Active</b></span>';
	  ?>
	  <?php }else {
		  
		 echo '<span style="color:red;text-align:center;"><b>INActive</b></span>';
		 ?>
      <?php }?>
	 
	  
     </td>
<td>

							<button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $department_details['id']; ?>" onclick="department_edit(<?php echo $department_details['id']; ?>)"><i class="fa fa-edit"></i> Edit</button>
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

   function department_edit(v){
		//alert(v);
	$.ajax({
	type:"POST",
	url:"Tickets/Department/department_edit.php?id="+v,
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
		url:"Tickets/Department/department_add.php",
		success:function(data){
		$("#main_content").html(data);
		}
		})
	}
</script>
