<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        Điền vào
        <input type="text" name="name" id="name">
    </form>
    <div id="result"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#name").change(function () { 
                let name = $(this).val();
                $("#result").text('Đã điền: ' + name);
            });
        });
    </script>
</body>
</html>