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
    Đây là khu vực quản lý nhà sản xuất
    <br>
    <a href="form_insert.php">
        Thêm
    </a>
    <?php 
    require '../menu.php';
    ?>
    <?php
    require '../connect.php';
    $sql = "select * from manufacturers";
    $result = mysqli_query($connect,$sql);
    ?>
    <table border="1" width="100%">
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Ảnh</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php foreach($result as $each){ ?> 
            <tr>
                <td><?php echo $each['id'] ?></td>
                <td><?php echo $each['name'] ?></td>
                <td><?php echo $each['address'] ?></td>
                <td><?php echo $each['phone'] ?></td>
                <td>
                    <img src="<?php echo $each['image'] ?>" height="100">
                </td>
                <td>
                    <a href="form_update.php?id=<?php echo $each['id'] ?>">
                        Sửa
                    </a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $each['id'] ?>">
                        Xóa
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php mysqli_close($connect) ?>
</body>
</html>