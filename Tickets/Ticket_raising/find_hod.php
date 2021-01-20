<?php
require '../../connect.php';
include("../../user.php");
$project_id = $_POST["project_id"];
$sql=$con->query("SELECT * FROM `masters_project` INNER JOIN masters_employee ON masters_project.hod_id=masters_employee.emp_id
 where id = $project_id");

?>


<?php
   while($row = $sql->fetch(PDO::FETCH_ASSOC))
{
?>
<option value="<?php echo $row["hod_id"];?>"><?php echo $row["emp_name"];?></option>
<?php
}
?>