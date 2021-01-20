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
                <h3 class="card-title"><font size="5">COMPANY PROFILE</font> </h3>
			
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			 
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>COMPANY
 NAME & ADDRESS</th>
					
                    
					 <th >Action</th>
                  </tr>
                  </thead>
                  <tbody>
<?php

$sql=$con->query("SELECT * FROM `masters_company`");
$cnt=1;
 while($company_details = $sql->fetch(PDO::FETCH_ASSOC))
{
	$id = $company_details['id'] ;
?>
<tr>
<td><?php echo $cnt;?>.</td>
<td><?php echo $company_details['company_name'];?>
<br><?php echo $company_details['company_address'];?><br><?php echo $company_details['company_contact'];?></td>

<td>

							<button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $company_details['id']; ?>" onclick="company_edit(<?php echo $company_details['id']; ?>)"><i class="fa fa-edit"></i> Edit</button>
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

   function company_edit(v){
		//alert(v);
	$.ajax({
	type:"POST",
	url:"Tickets/Company/company_edit.php?id="+v,
	success:function(data)
	{
		$("#main_content").html(data);
	}
	})
}


  
 
</script>
