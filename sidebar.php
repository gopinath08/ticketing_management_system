<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
<li class="nav-item has-treeview menu-open">

<?php
$rolemaster_id=$_SESSION['rolemaster_id'];
$sql = $con->query("SELECT masters_menu.id as id,masters_menu.menu_name FROM `masters_menu` INNER JOIN role_mapping ON masters_menu.id = role_mapping.menu_id
WHERE role_mapping.role_id='$rolemaster_id' group by menu_name"); 

while($row = $sql->fetch(PDO::FETCH_ASSOC))
{
$menuid=$row['id'];
?>

<a href="#collapseMulti_<?php echo $row['id']; ?>" class="nav-link active">
<i class="fa fa-users" aria-hidden="true"></i>

<p><label><?php echo $row['menu_name']; ?></label></p>

</a>
<ul class="nav nav-treeview">
 <?php 
    $sql2 = $con->query("SELECT * FROM `masters_sub_menu` INNER JOIN role_mapping ON masters_sub_menu.id=role_mapping.submenu_id
 WHERE role_mapping.role_id='$rolemaster_id' and role_mapping.menu_id='$menuid'"); 
    while($res = $sql2->fetch(PDO::FETCH_ASSOC))
    { ?>     
<li class="nav-item">

<a onclick="<?php echo $res['call_method']; ?>" class="nav-link ">
<i class="far fa-circle nav-icon"></i>
 <p><label><?php echo $res['name']; ?> </label></p>
</a>
</li>
 <?php
    }
    ?>
</ul>
<?php
}
?>
</li>

</ul>
</nav>

