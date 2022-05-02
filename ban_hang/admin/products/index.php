<?php require '../check_admin_login.php' ?>
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
        require '../menu.php';
        require '../connect.php';
        $sql = "select 
        products.*,
        manufacturers.name as manufacturer_name
        from products
        join manufacturers on products.manufacturer_id = manufacturers.id";
        $result = mysqli_query($connect,$sql);
    ?>
    <h1>Quản lý sản phẩm</h1>
    <a href="form_insert.php">
        Thêm
    </a>
    <table border="1" width="100%">
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Tên nhà sản xuất</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php foreach($result as $each){ ?>
            <tr>
                <td><?php echo $each['id'] ?></td>
                <td><?php echo $each['name'] ?></td>
                <td>
                    <img src="images/<?php echo $each['image'] ?>" height="100">
                </td>
                <td><?php echo $each['price'] ?></td>
                <td><?php echo $each['manufacturer_name'] ?></td>
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