<?php
include 'conf/db_conn.php';
$info = json_decode(file_get_contents("php://input"));

if (count($info) > 0) {

/*Aa an alternative to prepared statements we can use 
mysqli_real_escape_string($conn, $info->name);
mysqli_real_escape_string($conn, $info->email);
mysqli_real_escape_string($conn, $info->age);
but I think prepared statements are better
*/

$name     = $info->name;
$email    = $info->email;
$age      = $info->age;
$btn_name = $info->btnName;


if ($btn_name == "Insert") {
$query = "INSERT INTO insert_emp_info(name, email, age) VALUES (?, ?, ?)";

$stmt = $conn->prepare($query);
$stmt->bind_param("sss", $name, $email, $age);
$stmt->execute();

if ($stmt) {
echo "Data Inserted Successfully...";
} else {
echo 'Failed';
}
}





if ($btn_name == 'Update') {
$id    = $info->id;
$query = "UPDATE insert_emp_info SET name = ?, email = ?, age = ? WHERE id = '$id'";

$stmt = $conn->prepare($query);
$stmt->bind_param("sss", $name, $email, $age);
$stmt->execute();


if ($stmt) {
echo 'Data Updated Successfully...';
} else {
echo 'Failed';
}
}
}
?>