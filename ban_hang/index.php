<?php 
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #tong{
            width: 100%;
            height: 900px;
            background: black;
        }
        #tren{
            width: 100%;
            height: 20%;
            background: pink;
        }
        #giua{
            width: 100%;
            height: 70%;
            background: red;
        }
        #duoi{
            width: 100%;
            height: 10%;
            background: purple;
        }
    </style>
</head>
<body>
    <div id="tong">
        <?php require 'menu.php' ?>
        <?php require 'products.php' ?>
        <?php require 'footer.php' ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".btn-add-to-cart").click(function () { 
                let id = $(this).data('id')
                $.ajax({
                    type: "GET",
                    url: "add_to_cart.php",
                    data: {id},
                    // dataType: "dataType",
                    success: function (response) {
                        
                    }
                });
             })
        });
    </script>
</body>
</html>