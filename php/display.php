<?php
include 'conf/db_conn.php';
$output = array();

$query  = "SELECT * FROM insert_emp_info";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_array($result)) {
$output[] = $row;
}
echo json_encode($output);
}
?> 