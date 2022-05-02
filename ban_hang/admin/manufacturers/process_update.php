<?php 
require '../check_super_admin_login.php';
if(empty($_POST['id']) || empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['image'])){
    header('location:form_insert.php?error=Phải điền đầy đủ thông tin');
}

$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$image = $_POST['image'];

require '../connect.php';
$sql = "update manufacturers
set
name = '$name',
address = '$address',
phone = '$phone',
image = '$image'
where
id = '$id'
";

mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:index.php?success=Sửa thành công');