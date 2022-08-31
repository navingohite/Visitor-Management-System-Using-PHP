<?php
$con = mysqli_connect("localhost", "root", "", "vms_database");
if (mysqli_connect_errno()) {
  echo "Connection Fail" . mysqli_connect_error();
}

?>

<?php
$adminid = $_SESSION['navingohite'];
$ret = mysqli_query($con, "select AdminName from tbladmin where ID='$adminid'");
$row = mysqli_fetch_array($ret);
$name = $row['AdminName'];

?> 
