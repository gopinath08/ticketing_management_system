<?php
require '../../connect.php';
include("../../user.php");
$division_id = $_POST["division_id"];
$sql=$con->query("SELECT * FROM masters_employee where division_id = $division_id AND role_id=5");

?>


<?php
   while($row = $sql->fetch(PDO::FETCH_ASSOC))
{
?>
<option value="<?php echo $row["emp_id"];?>"><?php echo $row["emp_name"];?></option>
<?php
}
?>