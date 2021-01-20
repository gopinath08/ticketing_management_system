<?php
include("connect.php");
include("user.php");
$username=$_SESSION['username'];
$fullname=$_SESSION['fullname'];
$rolemaster_id=$_SESSION['rolemaster_id'];
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Ticketing_Sytem</title>
  
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
	 <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
</style>
<body class="hold-transition sidebar-mini">
<div  class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
	  
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>


  

	
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
	<?php 
	$query1 = $con->prepare("SELECT * FROM `user_master`
INNER JOIN role_master ON user_master.role_master_id=role_master.id where role_master.id='$rolemaster_id'"); 
$query1->execute(); 
$query_run = $query1->fetch();
	?>

	<p style="margin-r: 2.5em;padding: 0 7em 2em 0;"><h4  style="color:blue;"><?php echo  $query_run['role_name'];?></h4></p>
	<br>
	<br>
	<p style="margin-left: 4.5em;padding: 0 7em 2em 0;" ><h4><?php echo strtoupper($fullname); ?></h4></p>
		<p style="margin-left: 1.5em;"></p>
	
      <!-- Messages Dropdown Menu -->
   
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item">
       
           
            <a class="btn btn-primary" href="login/logout.php">Logout</a>
      
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
     
      <span class="brand-text font-weight-light">Ticketing Sysytem</span>
    </a>

    <!-- Sidebar -->
	<?php 
	include 'sidebar.php';
	?>
 
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <div class="content">
      <div class="container-fluid">	  
		<div id="main_content">  
		
		 <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
			  <?php 
			  $sql1 = $con->prepare("SELECT COUNT(id) as id
FROM tickets"); 
$sql1->execute(); 
$row = $sql1->fetch();

			  ?>
                <h3><?php echo  $row['id'];?></h3>

                <p>New Tickets</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php 
			  $sql1 = $con->prepare("SELECT COUNT(id) as id
FROM tickets where tickets_status=1"); 
$sql1->execute(); 
$row = $sql1->fetch();

			  ?>
                <h3><?php echo  $row['id'];?></h3>
                <p>Tickets Assigned</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php 
			  $sql1 = $con->prepare("SELECT COUNT(id) as id
FROM tickets where tickets_status=2"); 
$sql1->execute(); 
$row = $sql1->fetch();

			  ?>
                <h3><?php echo  $row['id'];?></h3>

                <p>Tickets Pending</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
               <?php 
			  $sql1 = $con->prepare("SELECT COUNT(id) as id
FROM tickets where tickets_status=3"); 
$sql1->execute(); 
$row = $sql1->fetch();

			  ?>
                <h3><?php echo  $row['id'];?></h3>

                <p>Tickets closed</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
		</div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

 <?php
	include 'footer.php';
    ?>
	
</div>
 <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>






<script src="dist/js/demo.js"></script>

<script src="dist/js/demo.js"></script>

</body>
</html>
<script>
function employee()
{
	$.ajax({
    type:"POST",
    url:"Tickets/Employee/employee_view.php",
    success:function(data){
      $("#main_content").html(data);
    }
  })
}
function client()
{
	$.ajax({
    type:"POST",
    url:"Tickets/Client/client_view.php",
    success:function(data){
      $("#main_content").html(data);
    }
  })
}
function project()
{
	$.ajax({
    type:"POST",
    url:"Tickets/Project_master/Project_view.php",
    success:function(data){
      $("#main_content").html(data);
    }
  })
}
function Department()
{
	$.ajax({
    type:"POST",
    url:"Tickets/Department/department_view.php",
    success:function(data){
      $("#main_content").html(data);
    }
  })
}
function Designation()
{
	$.ajax({
    type:"POST",
    url:"Tickets/Designation/designation_view.php",
    success:function(data){
      $("#main_content").html(data);
    }
  })
}
function Role()
{
	$.ajax({
    type:"POST",
    url:"Tickets/Role/role_view.php",
    success:function(data){
      $("#main_content").html(data);
    }
  })
}
function Company()
{
	$.ajax({
    type:"POST",
    url:"Tickets/Company/company_view.php",
    success:function(data){
      $("#main_content").html(data);
    }
  })
}
function ticket_raising()
{
	$.ajax({
    type:"POST",
    url:"Tickets/Ticket_raising/ticket_raising.php",
    success:function(data){
      $("#main_content").html(data);
    }
  })
}
function projects()
{
	$.ajax({
    type:"POST",
    url:"Tickets/hod_tickets_raising/hod_tickets_raising.php",
    success:function(data){
      $("#main_content").html(data);
    }
  })
}
function task()
{
	$.ajax({
    type:"POST",
    url:"Tickets/users/task_view.php",
    success:function(data){
      $("#main_content").html(data);
    }
  })
}

</script>
