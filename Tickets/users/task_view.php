<?php
require '../../connect.php';
include("../../user.php");

?>
<div id="employee_view" class="card card-info">
              <div class="card-header">
                <h3 class="card-title">TASK LIST </h3>
			
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
					  <th>#</th>
					  <th>PROJECT NAME</th>
                
					 <th>SUBJECT</th>
                    
                    <th>DESCRIPTION</th>
					  <th>DUE DAE</th>
					  <th>ESTIMATE HOURS</th>
					<th>STATUS</th>
					
					<th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
<?php

$sql=$con->query("SELECT * FROM `task_assign`
INNER JOIN tickets ON task_assign.Task_id=tickets.id
INNER JOIN masters_project ON tickets.project_id=masters_project.id");
$cnt=1;
 while($empdetails = $sql->fetch(PDO::FETCH_ASSOC))
{
	
?>
<tr>
<td><?php echo $cnt;?></td>
<td><?php echo $empdetails['Project_name'];?></td>
<td><?php echo $empdetails['subject'];?></td>
<td><?php echo $empdetails['description'];?></td>
<td><?php echo $empdetails['due_date'];?></td>
<td><?php echo $empdetails['hours'];?></td>

<td>
	  <?php 
	  if($empdetails['tickets_status'] ==0)
	  {
		  
	  echo '<span style="color:blue;text-align:center;"><b>Pending</b></span>';
	  ?>
	  <?php }else if($empdetails['tickets_status'] ==1){
		  
		 echo '<span style="color:green;text-align:center;"><b>Task Assigned</b></span>';
		 ?>
      <?php } elseif($empdetails['tickets_status'] ==2) {
		  
		  echo '<span style="color:Brown;text-align:center;"><b>Ready To Process</b></span>';
		  ?>
	  <?php  } elseif($empdetails['tickets_status'] ==3) {
	    echo '<span style="color:red;text-align:center;"><b>Closed</b></span>';
	  }?>
     </td>
	 <td>
<?php if($empdetails['tickets_status'] ==1){?><button class="btn btn-light btn-sm" data-id="<?php echo $empdetails['Task_id']; ?>" onclick="tickets_view(<?php echo $empdetails['Task_id']; ?>)"><i class="fa fa-eye"></i></button> <?php } ?>

<?php if($empdetails['tickets_status'] ==2){?><button class="btn btn-light btn-sm" data-id="<?php echo $empdetails['Task_id']; ?>" onclick="tickets_view1(<?php echo $empdetails['Task_id']; ?>)"><i class="fa fa-eye"></i></button> <?php } ?>
<?php if($empdetails['tickets_status'] ==3){?><button class="btn btn-light btn-sm" data-id="<?php echo $empdetails['Task_id']; ?>" onclick="tickets_view2(<?php echo $empdetails['Task_id']; ?>)"><i class="fa fa-eye"></i></button> <?php } ?>
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

  
 function tickets_view(v){
		//alert(v);
	$.ajax({
	type:"POST",
	url:"Tickets/users/tickets_view.php?id="+v,
	success:function(data)
	{
		$("#main_content").html(data);
	}
	})
}
function tickets_view1(v){
		//alert(v);
	$.ajax({
	type:"POST",
	url:"Tickets/users/tickets_view1.php?id="+v,
	success:function(data)
	{
		$("#main_content").html(data);
	}
	})
}
function tickets_view2(v){
		//alert(v);
	$.ajax({
	type:"POST",
	url:"Tickets/users/tickets_view2.php?id="+v,
	success:function(data)
	{
		$("#main_content").html(data);
	}
	})
}
</script>
