<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload</title>
    <style>
        input{
            width:100%;
            border-radius:10px;
            background-color:#DDD;
        }
        button,form{
            cursor:pointer;
            display:inline-block;
            border-radius:5px;
        }
        .noshow{
            display:none;
        }
    </style>
</head>
<body>
    <button type="button" id="btn_sub">选择文件</button>
    <form action="upload_file.php" method="post" enctype="multipart/form-data">
        <input type="file" class="noshow" name="file" id="up">
        <button type="submit">上传</button>
    </form>
    <script src="../../../js/jquery-1.10.2.js"></script>
    <script src="../../../js/bootstrap.js"></script>
    <script>
        $("#btn_sub").click(function(){
            $("#up").click(); 
        });
    </script>
</body>
</html>