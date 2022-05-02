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
        $sql = "select * from products";
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result);

        $sql = "select * from manufacturers";
        $manufacturers = mysqli_query($connect,$sql);
    ?>
    <form action="process_update.php" method="post" enctype="multipart/form-data">
        Tên
        <input type="text" name="name" value="<?php echo $each['name'] ?>">
        <br>
        Ảnh
        <input type="file" name="image">
        <br>
        Ảnh cũ
        <img src="images/<?php echo $each['image'] ?>" height="100">
        <input type="hidden" name="image_old" value="<?php echo $each['image'] ?>">
        <br>
        Giá
        <input type="number" name="price" value="<?php echo $each['price'] ?>">
        <br>
        Mô tả
        <textarea name="description"><?php echo $each['description'] ?></textarea>
        <br>
        Nhà sản xuất
        <select name="manufacturer_id">
            <?php foreach($manufacturers as $manufacturer){ ?>
                <option 
                value="<?php echo $manufacturer['id'] ?>"
                <?php if($each['manufacturer_id'] == $manufacturer['id']){ ?>
                    selected
                <?php } ?>
                >
                    <?php echo $manufacturer['name'] ?>
                </option>
            <?php } ?>
        </select>
        <br>
        <button>Sửa</button>
    </form>
    <?php mysqli_close($connect) ?>
</body>
</html>