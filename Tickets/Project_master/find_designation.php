<?php
require '../../connect.php';
include("../../user.php");
$department_id = $_POST["department_id"];
$sql=$con->query("SELECT * FROM division where department_id = $department_id");

?>
<option value="">Select Division</option>

<?php
   while($row = $sql->fetch(PDO::FETCH_ASSOC))
{
?>
<option value="<?php echo $row["id"];?>"><?php echo $row["Designation_name"];?></option>
<?php
}
?>