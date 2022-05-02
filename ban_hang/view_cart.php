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
    session_start();
    $cart = $_SESSION['cart'];
    $sum = 0;
    ?>
    <table border="1" width="100%">
        <tr>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Xóa</th>
        </tr>
        <?php foreach($cart as $id => $each){ ?>
            <tr>
                <td><img height="100" src="admin/products/images/<?php echo $each['image'] ?>"></td>
                <td><?php echo $each['name'] ?></td>
                <td><?php echo $each['price'] ?></td>
                <td>
                    <a href="update_quantity_in_cart.php?id=<?php echo $id ?>&type=decre">
                        -
                    </a>
                    <?php 
                    $result = $each['price'] * $each['quantity'];
                    echo $result;
                    $sum += $result;
                    ?>
                    <a href="update_quantity_in_cart.php?id=<?php echo $id ?>&type=incre">
                        +
                    </a>
                </td>
                <td><?php echo $each['price'] * $each['quantity'] ?></td>
                <td>
                    <a href="delete_cart.php?id=<?php echo $id ?>">
                        X
                    </a>
                </td>
            </tr>
         <?php } ?>
    </table>
    <h1>
        Tổng tiền hóa đơn:
        $<?php echo $sum ?>
    </h1>
    <?php 
    $id = $_SESSION['id'];
    require 'admin/connect.php';
    $sql = "select * from customers where id = '$id'";
    $result = mysqli_query($connect,$sql);
    $each = mysqli_fetch_array($result);
    ?>
    <form action="process_checkout.php" method="post">
        Tên người nhận
        <input type="text" name="name_receiver" value="<?php echo $each ['name'] ?>">
        <br>
        Sdt người nhận
        <input type="text" name="phone_receiver" value="<?php echo $each ['phone_number'] ?>">
        <br>
        Địa chỉ người nhận
        <input type="text" name="address_receiver" value="<?php echo $each ['address'] ?>">
        <br>
        <button>Đặt hàng</button>
    </form>
</body>
</html>