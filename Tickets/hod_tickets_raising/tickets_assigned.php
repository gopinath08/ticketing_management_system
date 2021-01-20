<?php
require '../../connect.php';
include("../../user.php");
//$rolemaster_id=$_SESSION['rolemaster_id'];
//echo "$rolemaster_id";
?>
<div  class="card card-primary">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Compose</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Compose</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
         

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Folders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
            <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
				<li class="nav-item">
				  
                  <a onclick="tickets_assigned()" class="nav-link">
                      <i class="far fa-envelope"></i> Inbox
                    </a>
                  </li>
                 <li class="nav-item">
                  <a onclick="tickets_assigned()" class="nav-link">
                      <i class="far fa-file-alt"></i> Drafts
                    </a>
                  </li>
                  
				  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fas fa-filter"></i> Received
                    <!--  <span class="badge bg-warning float-right">65</span>-->
                    </a>
                  </li>
                 
                 
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
		  
      <div class="col-md-9">
		  
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Compose New Tickets</h3>
              </div>
              <!-- /.card-header -->
			 
         
             <div class="card-body">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Inbox</h3>

              
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                
               
                <!-- /.btn-group -->
                
                <!-- /.float-right -->
              </div>
             <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                  <thead>
                 <tr>
                    <th></th>
					 <th>DATE</th>
                   
					<th>PROJECT NAME</th>
                
					 <th>SUBJECT</th>
                    
                    <th>DESCRIPTION</th>
					
					<th>STATUS</th>
					
					<th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
<?php

$sql=$con->query("SELECT tickets.id as ticket_id,tickets.created_on,masters_project.Project_name,masters_employee.emp_name,tickets.subject,tickets.subject,tickets.description,tickets.tickets_status FROM `tickets`
INNER JOIN masters_client ON tickets.client_id=masters_client.client_id
INNER JOIN masters_project ON tickets.project_id=masters_project.id
INNER JOIN masters_employee ON tickets.hod_id=masters_employee.emp_id");
$cnt=1;
 while($empdetails = $sql->fetch(PDO::FETCH_ASSOC))
{

?>
<tr>
 <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
 
 <td><?php echo $empdetails['created_on'];?></td>

<td class="mailbox-subject"><?php echo $empdetails['Project_name'];?></td>

<td><?php echo $empdetails['subject'];?></td>
<td><?php echo $empdetails['description'];?></td>

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
<button class="btn btn-light btn-sm" data-id="<?php echo $empdetails['ticket_id']; ?>" onclick="tickets_view(<?php echo $empdetails['ticket_id']; ?>)"><i class="fa fa-eye"></i> </button>

</td> 
</tr>
<?php 
$cnt=$cnt+1;
 }?></tbody>
                  
                </table>
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                
                <!-- /.btn-group -->
              
              </div>
            </div>
        
          <!-- /.card -->
        </div>
               
               
             
			
           
              
            </div>
             
          </div>
    
        </div>
    
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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

   
  
  $(function () {
    //Add text editor
    $('#decription').summernote()
  })
  $(document).ready(function() {
$('#project').on('change', function() {

var project_id = this.value;
alert(project_id);
$.ajax({
url: "Tickets/Ticket_raising/find_hod.php",
type: "POST",
data: {
project_id: project_id
},
cache: false,
success: function(result){
$("#hod").html(result);


}
});
});

});

	function tickets_assigned()
	{
		$.ajax({
		type:"POST",
		url:"Tickets/hod_tickets_raising/tickets_assigned.php",
		success:function(data){
		$("#main_content").html(data);
		}
		})
	}
	function tickets_view(v){
		//alert(v);
	$.ajax({
	type:"POST",
	url:"Tickets/hod_tickets_raising/tickets_view.php?id="+v,
	success:function(data)
	{
		$("#main_content").html(data);
	}
	})
}
</script>

