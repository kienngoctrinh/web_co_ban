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
        $sql = "select * from manufacturers";
        $result = mysqli_query($connect,$sql);
    ?>
    <form action="process_insert.php" method="post" enctype="multipart/form-data">
        Tên
        <input type="text" name="name">
        <br>
        Ảnh
        <input type="file" name="image">
        <br>
        Giá
        <input type="number" name="price">
        <br>
        Mô tả
        <textarea name="description"></textarea>
        <br>
        Nhà sản xuất
        <select name="manufacturer_id">
            <?php foreach($result as $each){ ?>
                <option value="<?php echo $each['id'] ?>">
                    <?php echo $each['name'] ?>
                </option>
            <?php } ?>
        </select>
        <br>
        <button>Thêm</button>
    </form>
    <?php mysqli_close($connect) ?>
</body>
</html>