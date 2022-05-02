<?php require '../check_super_admin_login.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if(empty($_GET['id'])){
            header('location:index.php?error=Phải truyền mã để sửa');
        }
        $id = $_GET['id'];
        require '../menu.php';
        require '../connect.php';
        $sql = "select * from manufacturers
        where id = '$id'";
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result);
    ?>
    <form method="post" action="process_update.php">
        <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
        Tên
        <input type="text" name="name" value="<?php echo $each['name'] ?>">
        <br>
        Địa chỉ
        <textarea name="address"><?php echo $each['address'] ?></textarea>
        <br>
        Số điện thoại
        <input type="text" name="phone" value="<?php echo $each['phone'] ?>">
        <br>
        Ảnh
        <input type="text" name="image" value="<?php echo $each['image'] ?>">
        <br>
        <button>Sửa</button>
    </form>
    <?php mysqli_close($connect) ?>
</body>
</html>