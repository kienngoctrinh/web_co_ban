<?php 
require '../check_admin_login.php';
$name = $_POST['name'];
$image_new = $_FILES['image'];
$price = $_POST['price'];
$description = $_POST['description'];
$manufacturer_id = $_POST['manufacturer_id'];

$folder = 'images/';
$file_extension = explode('.',$image['name'])[1];
$file_name = time().'.'.$file_extension;
$path_file = $folder.$file_name;

move_uploaded_file($image["tmp_name"], $path_file);

require '../connect.php';
$sql = "insert into products(name,image,price,description,manufacturer_id)
values('$name','$file_name','$price','$description','$manufacturer_id')";

mysqli_query($connect,$sql);
mysqli_close($connect);
